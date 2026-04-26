<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/layout.php';

$error = null;
$values = ['business_name' => '', 'slug' => '', 'email' => '', 'name' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $values = [
        'business_name' => trim($_POST['business_name'] ?? ''),
        'slug' => strtolower(preg_replace('/[^a-z0-9-]/i', '-', trim($_POST['slug'] ?? ''))),
        'email' => trim($_POST['email'] ?? ''),
        'name' => trim($_POST['name'] ?? ''),
    ];
    $password = $_POST['password'] ?? '';

    if ($values['business_name'] === '' || $values['slug'] === '' || $values['email'] === '' || strlen($password) < 8) {
        $error = 'Compila tutti i campi. La password deve avere almeno 8 caratteri.';
    } elseif (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $error = 'Email non valida.';
    } else {
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare('SELECT 1 FROM tenants WHERE slug = ?');
            $stmt->execute([$values['slug']]);
            if ($stmt->fetch()) throw new RuntimeException('Questo slug è già in uso, scegline un altro.');

            $stmt = $pdo->prepare('SELECT 1 FROM users WHERE email = ?');
            $stmt->execute([$values['email']]);
            if ($stmt->fetch()) throw new RuntimeException('Esiste già un account con questa email.');

            $stmt = $pdo->prepare('INSERT INTO tenants (name, slug, language) VALUES (?, ?, ?)');
            $stmt->execute([$values['business_name'], $values['slug'], 'it']);
            $tenantId = (int)$pdo->lastInsertId();

            $stmt = $pdo->prepare('INSERT INTO users (tenant_id, email, password_hash, name, role) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([
                $tenantId,
                $values['email'],
                password_hash($password, PASSWORD_BCRYPT),
                $values['name'] ?: null,
                'admin',
            ]);
            $userId = (int)$pdo->lastInsertId();

            $pdo->commit();

            $_SESSION['user'] = [
                'id' => $userId,
                'tenant_id' => $tenantId,
                'email' => $values['email'],
                'name' => $values['name'] ?: null,
                'role' => 'admin',
            ];
            header('Location: /checkout.php?welcome=1');
            exit;
        } catch (RuntimeException $e) {
            $pdo->rollBack();
            $error = $e->getMessage();
        } catch (PDOException $e) {
            $pdo->rollBack();
            error_log('Register failed: ' . $e->getMessage());
            $error = 'Errore durante la registrazione. Riprova.';
        }
    }
}

layout_head('Registra il tuo centro');
?>

<section class="relative min-h-[calc(100vh-160px)] flex items-center justify-center px-6 py-16">
  <div class="absolute inset-0 grid-bg [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_30%,transparent_100%)]"></div>
  <div class="absolute inset-0 radial-spot opacity-60"></div>

  <div class="relative w-full max-w-lg">
    <div class="text-center mb-8 rise d1">
      <div class="chip mx-auto mb-4"><span class="dot pulse-dot"></span>Step 1 di 2 · Registrazione</div>
      <h1 class="h-display text-3xl md:text-4xl">Crea il tuo centro.</h1>
      <p class="text-muted mt-2 text-sm">14 giorni gratis. La carta serve solo nel passaggio successivo.</p>
    </div>

    <div class="card-soft p-7 shadow-card rise d2">
      <?php if ($error): ?>
        <div class="mb-5 px-4 py-3 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 text-sm flex items-start gap-2">
          <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form method="post" class="space-y-4">
        <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
        <div>
          <label class="block text-xs font-mono uppercase tracking-widest text-muted mb-2">Nome attività</label>
          <input name="business_name" required value="<?= htmlspecialchars($values['business_name']) ?>" placeholder="Centro Estetico Bellezza">
        </div>
        <div>
          <label class="block text-xs font-mono uppercase tracking-widest text-muted mb-2">Slug pubblico</label>
          <div class="relative">
            <input name="slug" required value="<?= htmlspecialchars($values['slug']) ?>" placeholder="centro-bellezza" class="pl-12">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 font-mono text-xs text-faint">/r/</span>
          </div>
          <p class="text-xs text-faint mt-1.5 font-mono">Solo lettere, numeri e trattini.</p>
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-mono uppercase tracking-widest text-muted mb-2">Il tuo nome</label>
            <input name="name" value="<?= htmlspecialchars($values['name']) ?>" placeholder="Anna">
          </div>
          <div>
            <label class="block text-xs font-mono uppercase tracking-widest text-muted mb-2">Email</label>
            <input type="email" name="email" required value="<?= htmlspecialchars($values['email']) ?>" placeholder="anna@centro.it">
          </div>
        </div>
        <div>
          <label class="block text-xs font-mono uppercase tracking-widest text-muted mb-2">Password (min 8 caratteri)</label>
          <input type="password" name="password" required minlength="8" placeholder="••••••••">
        </div>
        <button class="btn-primary w-full justify-center mt-2">
          Continua al pagamento
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/></svg>
        </button>
      </form>

      <div class="mt-6 pt-5 border-t border-edge text-center">
        <p class="text-xs text-faint">Hai già un account? <a href="/login.php" class="text-accent-500 hover:text-accent-400 font-medium">Accedi</a></p>
      </div>
    </div>
  </div>
</section>

<?php layout_foot();

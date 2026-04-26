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

            $pdo->commit();

            $_SESSION['user'] = [
                'id' => (int)$pdo->lastInsertId(),
                'tenant_id' => $tenantId,
                'email' => $values['email'],
                'name' => $values['name'] ?: null,
                'role' => 'admin',
            ];
            header('Location: /admin/');
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

<div class="max-w-md mx-auto bg-white rounded-lg shadow-sm p-8">
  <h1 class="text-2xl font-bold mb-2">Registra il tuo centro</h1>
  <p class="text-gray-600 text-sm mb-6">14 giorni gratis. Niente carta richiesta in fase di test.</p>

  <?php if ($error): ?>
    <div class="bg-red-50 text-red-800 border border-red-200 rounded p-3 text-sm mb-4"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" class="space-y-4">
    <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
    <div>
      <label class="block text-sm font-medium mb-1">Nome attività</label>
      <input name="business_name" required value="<?= htmlspecialchars($values['business_name']) ?>" class="w-full border-gray-300 rounded p-2 border" placeholder="Es. Centro Estetico Bellezza">
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Slug pubblico (per il link sondaggio)</label>
      <input name="slug" required value="<?= htmlspecialchars($values['slug']) ?>" class="w-full border-gray-300 rounded p-2 border" placeholder="centro-bellezza">
      <p class="text-xs text-gray-500 mt-1">Solo lettere, numeri e trattini. Il link sarà /r/&lt;slug&gt;.</p>
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Il tuo nome</label>
      <input name="name" value="<?= htmlspecialchars($values['name']) ?>" class="w-full border-gray-300 rounded p-2 border">
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Email</label>
      <input type="email" name="email" required value="<?= htmlspecialchars($values['email']) ?>" class="w-full border-gray-300 rounded p-2 border">
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Password (min 8 caratteri)</label>
      <input type="password" name="password" required minlength="8" class="w-full border-gray-300 rounded p-2 border">
    </div>
    <button class="w-full bg-brand-600 hover:bg-brand-700 text-white py-2.5 rounded font-medium">Crea account</button>
  </form>

  <p class="text-sm text-gray-600 mt-4 text-center">
    Hai già un account? <a href="/login.php" class="text-brand-700 underline">Accedi</a>
  </p>
</div>

<?php layout_foot();

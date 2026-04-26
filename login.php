<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/layout.php';

$error = null;
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_check();
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = 'Inserisci email e password.';
    } else {
        $stmt = $pdo->prepare('SELECT id, tenant_id, email, name, role, password_hash FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $u = $stmt->fetch();
        if (!$u || !password_verify($password, $u['password_hash'])) {
            $error = 'Email o password errate.';
        } else {
            unset($u['password_hash']);
            $_SESSION['user'] = $u;
            header('Location: ' . ($u['role'] === 'super_admin' ? '/super/' : '/admin/'));
            exit;
        }
    }
}

layout_head('Accedi');
?>

<section class="relative min-h-[calc(100vh-160px)] flex items-center justify-center px-6 py-20">
  <div class="absolute inset-0 grid-bg [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_30%,transparent_100%)]"></div>
  <div class="absolute inset-0 radial-spot opacity-60"></div>

  <div class="relative w-full max-w-md">
    <div class="text-center mb-8 rise d1">
      <div class="chip mx-auto mb-4"><span class="dot pulse-dot"></span>Area riservata</div>
      <h1 class="h-display text-3xl md:text-4xl">Bentornato.</h1>
      <p class="text-muted mt-2 text-sm">Accedi per gestire il tuo centro.</p>
    </div>

    <div class="card-soft p-7 shadow-card rise d2">
      <?php if ($error): ?>
        <div class="mb-5 px-4 py-3 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 text-sm flex items-start gap-2">
          <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form method="post" action="/login.php" class="space-y-4">
        <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
        <div>
          <label class="block text-xs font-mono uppercase tracking-widest text-muted mb-2">Email</label>
          <input type="email" name="email" required autofocus value="<?= htmlspecialchars($email) ?>" placeholder="tu@centro.it">
        </div>
        <div>
          <label class="block text-xs font-mono uppercase tracking-widest text-muted mb-2">Password</label>
          <input type="password" name="password" required placeholder="••••••••">
        </div>
        <button class="btn-primary w-full justify-center mt-2">
          Accedi
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/></svg>
        </button>
      </form>

      <div class="mt-6 pt-5 border-t border-edge text-center">
        <p class="text-xs font-mono uppercase tracking-widest text-faint mb-2">Sei un nuovo centro?</p>
        <a href="/register.php" class="text-sm text-accent-500 hover:text-accent-400 font-medium inline-flex items-center gap-1.5">
          Registra il tuo centro
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<?php layout_foot();

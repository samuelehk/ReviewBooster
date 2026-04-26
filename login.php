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

<div class="max-w-md mx-auto bg-white rounded-lg shadow-sm p-8">
  <h1 class="text-2xl font-bold mb-6">Accedi</h1>

  <?php if ($error): ?>
    <div class="bg-red-50 text-red-800 border border-red-200 rounded p-3 text-sm mb-4"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="post" class="space-y-4">
    <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
    <div>
      <label class="block text-sm font-medium mb-1">Email</label>
      <input type="email" name="email" required value="<?= htmlspecialchars($email) ?>" class="w-full border-gray-300 rounded p-2 border">
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Password</label>
      <input type="password" name="password" required class="w-full border-gray-300 rounded p-2 border">
    </div>
    <button class="w-full bg-brand-600 hover:bg-brand-700 text-white py-2.5 rounded font-medium">Accedi</button>
  </form>

  <p class="text-sm text-gray-600 mt-4 text-center">
    Nuovo? <a href="/register.php" class="text-brand-700 underline">Registra il tuo centro</a>
  </p>
</div>

<?php layout_foot();

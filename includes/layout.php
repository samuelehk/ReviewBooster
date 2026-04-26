<?php
function layout_head(string $title = 'ReviewBoost', bool $marketing = false): void {
    $u = effective_user();
    $imp = impersonating_as();
    ?><!doctype html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?> · ReviewBoost</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = { theme: { extend: { colors: { brand: { 50:'#f0fdf4',100:'#dcfce7',500:'#22c55e',600:'#16a34a',700:'#15803d',800:'#166534' } } } } };
</script>
</head>
<body class="bg-gray-50 text-gray-900">
<?php if ($imp): ?>
<div class="bg-amber-100 border-b border-amber-300 text-amber-900 text-sm py-2 px-4 text-center">
  Stai impersonando <strong><?= htmlspecialchars($imp['email']) ?></strong> ·
  <a href="/super/stop-impersonate.php" class="underline font-medium">Torna a Super Admin</a>
</div>
<?php endif; ?>
<header class="bg-white shadow-sm">
  <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
    <a href="/" class="flex items-center gap-2 font-bold text-brand-700">
      <span class="inline-block w-7 h-7 rounded bg-brand-600 text-white grid place-items-center text-sm">★</span>
      ReviewBoost
    </a>
    <nav class="flex items-center gap-4 text-sm">
      <?php if ($u && !$marketing): ?>
        <?php if (($u['role'] ?? null) === 'super_admin' && !$imp): ?>
          <a href="/super/" class="text-gray-700 hover:text-brand-700">Super Admin</a>
        <?php else: ?>
          <a href="/admin/" class="text-gray-700 hover:text-brand-700">Area</a>
        <?php endif; ?>
        <span class="text-gray-500">|</span>
        <span class="text-gray-600"><?= htmlspecialchars($u['email']) ?></span>
        <a href="/logout.php" class="text-gray-700 hover:text-brand-700">Esci</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
<main class="max-w-6xl mx-auto px-4 py-8">
<?php
}

function layout_foot(): void {
?>
</main>
<footer class="max-w-6xl mx-auto px-4 py-8 text-sm text-gray-500">
  © <?= date('Y') ?> ReviewBoost
</footer>
</body>
</html>
<?php
}

function flash_set(string $key, string $msg): void { $_SESSION['flash'][$key] = $msg; }
function flash_get(string $key): ?string { $m = $_SESSION['flash'][$key] ?? null; unset($_SESSION['flash'][$key]); return $m; }

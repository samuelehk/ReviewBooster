<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/layout.php';

if (!current_user()) { header('Location: /login.php'); exit; }

$user = require_admin_area();
$tenantId = (int)$user['tenant_id'];

$stmt = $pdo->prepare('SELECT name, slug FROM tenants WHERE id = ?');
$stmt->execute([$tenantId]);
$tenant = $stmt->fetch();

$stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE tenant_id = ?');
$stmt->execute([$tenantId]);
$customersTotal = (int)$stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE tenant_id = ? AND DATE(created_at) = CURDATE()');
$stmt->execute([$tenantId]);
$customersToday = (int)$stmt->fetchColumn();

layout_head('Dashboard ' . ($tenant['name'] ?? ''));
?>

<div class="flex items-center justify-between mb-6">
  <div>
    <h1 class="text-2xl font-bold"><?= htmlspecialchars($tenant['name'] ?? 'Area') ?></h1>
    <p class="text-sm text-gray-500">Sondaggio pubblico: <code>/r/<?= htmlspecialchars($tenant['slug'] ?? '') ?></code></p>
  </div>
</div>

<div class="grid md:grid-cols-3 gap-4 mb-8">
  <div class="bg-white p-5 rounded-lg shadow-sm">
    <p class="text-sm text-gray-500">Clienti caricati oggi</p>
    <p class="text-3xl font-bold mt-1"><?= $customersToday ?></p>
  </div>
  <div class="bg-white p-5 rounded-lg shadow-sm">
    <p class="text-sm text-gray-500">Clienti totali</p>
    <p class="text-3xl font-bold mt-1"><?= $customersTotal ?></p>
  </div>
  <div class="bg-white p-5 rounded-lg shadow-sm">
    <p class="text-sm text-gray-500">Recensioni Google generate</p>
    <p class="text-3xl font-bold mt-1 text-gray-400">—</p>
    <p class="text-xs text-gray-400 mt-1">In arrivo</p>
  </div>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
  <h2 class="text-lg font-bold mb-2">Coda di oggi</h2>
  <p class="text-gray-600 text-sm">Qui apparirà la lista dei clienti del giorno con il bottone WhatsApp accanto a ogni nome. Funzione in arrivo.</p>
</div>

<?php layout_foot();

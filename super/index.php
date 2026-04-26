<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/layout.php';

if (impersonating_as()) { header('Location: /admin/'); exit; }
require_super_admin();

$rows = $pdo->query('
    SELECT t.id, t.name, t.slug, t.created_at,
           (SELECT COUNT(*) FROM users WHERE tenant_id = t.id) AS users_count,
           (SELECT COUNT(*) FROM customers WHERE tenant_id = t.id) AS customers_count,
           (SELECT email FROM users WHERE tenant_id = t.id ORDER BY id LIMIT 1) AS first_admin_email,
           (SELECT id FROM users WHERE tenant_id = t.id ORDER BY id LIMIT 1) AS first_admin_id
    FROM tenants t
    ORDER BY t.id DESC
')->fetchAll();

layout_head('Super Admin');
?>

<div class="flex items-center justify-between mb-6">
  <div>
    <h1 class="text-2xl font-bold">Super Admin</h1>
    <p class="text-sm text-gray-500"><?= count($rows) ?> centri registrati</p>
  </div>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-gray-50 text-gray-600 text-left">
      <tr>
        <th class="p-3">Centro</th>
        <th class="p-3">Slug</th>
        <th class="p-3">Admin</th>
        <th class="p-3 text-right">Utenti</th>
        <th class="p-3 text-right">Clienti</th>
        <th class="p-3">Iscritto</th>
        <th class="p-3"></th>
      </tr>
    </thead>
    <tbody class="divide-y">
      <?php if (!$rows): ?>
        <tr><td colspan="7" class="p-6 text-center text-gray-500">Nessun centro registrato.</td></tr>
      <?php else: foreach ($rows as $r): ?>
        <tr class="hover:bg-gray-50">
          <td class="p-3 font-medium"><?= htmlspecialchars($r['name']) ?></td>
          <td class="p-3 text-gray-600"><?= htmlspecialchars($r['slug']) ?></td>
          <td class="p-3 text-gray-600"><?= htmlspecialchars($r['first_admin_email'] ?? '—') ?></td>
          <td class="p-3 text-right"><?= $r['users_count'] ?></td>
          <td class="p-3 text-right"><?= $r['customers_count'] ?></td>
          <td class="p-3 text-gray-600"><?= htmlspecialchars(substr($r['created_at'], 0, 10)) ?></td>
          <td class="p-3 text-right">
            <?php if ($r['first_admin_id']): ?>
              <form method="post" action="/super/impersonate.php" class="inline">
                <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                <input type="hidden" name="user_id" value="<?= (int)$r['first_admin_id'] ?>">
                <button class="text-brand-700 hover:text-brand-800 underline">Impersona</button>
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>

<?php layout_foot();

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

$totalTenants = count($rows);
$totalUsers = array_sum(array_column($rows, 'users_count'));
$totalCustomers = array_sum(array_column($rows, 'customers_count'));

layout_head('Super Admin');
?>

<section class="max-w-7xl mx-auto px-6 py-10 md:py-14">
  <div class="mb-10 rise d1">
    <div class="flex items-center gap-3 mb-2">
      <span class="chip"><span class="dot pulse-dot bg-gold" style="background:#F4C400"></span>Super Admin</span>
      <span class="text-xs font-mono uppercase tracking-widest text-faint">platform / overview</span>
    </div>
    <h1 class="h-display text-3xl md:text-5xl">Tutti i centri sulla piattaforma.</h1>
    <p class="text-muted mt-3 max-w-2xl">Vedi ogni tenant, naviga le metriche aggregate, impersona qualunque admin per assistenza diretta.</p>
  </div>

  <!-- Stats globali -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
    <div class="card p-5 rise d2 relative overflow-hidden">
      <div class="absolute -top-8 -right-8 w-32 h-32 bg-accent-500/10 rounded-full blur-2xl"></div>
      <div class="relative">
        <div class="text-xs font-mono uppercase tracking-widest text-muted">Centri totali</div>
        <div class="mt-2 h-display text-4xl text-accent-500"><?= $totalTenants ?></div>
        <div class="mt-1 text-xs text-faint">registrati sulla piattaforma</div>
      </div>
    </div>
    <div class="card p-5 rise d3">
      <div class="text-xs font-mono uppercase tracking-widest text-muted">Utenti</div>
      <div class="mt-2 h-display text-4xl"><?= $totalUsers ?></div>
      <div class="mt-1 text-xs text-faint">admin + receptionist</div>
    </div>
    <div class="card p-5 rise d4">
      <div class="text-xs font-mono uppercase tracking-widest text-muted">Clienti gestiti</div>
      <div class="mt-2 h-display text-4xl"><?= $totalCustomers ?></div>
      <div class="mt-1 text-xs text-faint">aggregati cross-tenant</div>
    </div>
    <div class="card p-5 rise d5">
      <div class="text-xs font-mono uppercase tracking-widest text-muted">Stato sistema</div>
      <div class="mt-2 flex items-center gap-2 h-display text-2xl text-accent-500">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-accent-500 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-accent-500"></span>
        </span>
        Operativo
      </div>
      <div class="mt-1 text-xs text-faint">tutti i servizi attivi</div>
    </div>
  </div>

  <!-- Tabella centri -->
  <div class="card overflow-hidden rise d6">
    <div class="px-6 py-5 border-b border-edge flex items-center justify-between">
      <div>
        <h2 class="font-semibold tracking-tight">Centri registrati</h2>
        <p class="text-xs text-muted mt-0.5">Più recenti in alto.</p>
      </div>
      <div class="flex items-center gap-2">
        <span class="chip"><?= $totalTenants ?> totali</span>
      </div>
    </div>

    <?php if (!$rows): ?>
      <div class="px-6 py-16 text-center">
        <div class="w-14 h-14 mx-auto rounded-full bg-elev grid place-items-center mb-4">
          <svg class="w-6 h-6 text-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z"/></svg>
        </div>
        <h3 class="font-semibold tracking-tight">Nessun centro registrato</h3>
        <p class="text-muted text-sm mt-1.5">Quando un nuovo cliente si iscriverà apparirà qui.</p>
      </div>
    <?php else: ?>
      <div class="overflow-x-auto">
        <table class="tbl">
          <thead><tr>
            <th>Centro</th>
            <th>Slug</th>
            <th>Admin</th>
            <th class="text-right">Utenti</th>
            <th class="text-right">Clienti</th>
            <th>Iscritto</th>
            <th></th>
          </tr></thead>
          <tbody>
            <?php foreach ($rows as $r): ?>
              <tr>
                <td>
                  <div class="flex items-center gap-3">
                    <div class="grid place-items-center w-8 h-8 rounded-lg bg-elev border border-edge font-mono text-xs text-muted">
                      <?= strtoupper(substr($r['name'], 0, 2)) ?>
                    </div>
                    <span class="font-medium"><?= htmlspecialchars($r['name']) ?></span>
                  </div>
                </td>
                <td><code class="font-mono text-xs text-accent-500 bg-accent-500/10 px-2 py-1 rounded">/r/<?= htmlspecialchars($r['slug']) ?></code></td>
                <td class="text-muted text-sm"><?= htmlspecialchars($r['first_admin_email'] ?? '—') ?></td>
                <td class="text-right font-mono text-sm"><?= $r['users_count'] ?></td>
                <td class="text-right font-mono text-sm"><?= $r['customers_count'] ?></td>
                <td class="text-muted text-sm font-mono"><?= htmlspecialchars(substr($r['created_at'], 0, 10)) ?></td>
                <td class="text-right">
                  <?php if ($r['first_admin_id']): ?>
                    <form method="post" action="/super/impersonate.php" class="inline">
                      <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                      <input type="hidden" name="user_id" value="<?= (int)$r['first_admin_id'] ?>">
                      <button class="btn-ghost text-xs px-3 py-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Impersona
                      </button>
                    </form>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php layout_foot();

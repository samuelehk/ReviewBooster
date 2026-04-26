<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/layout.php';

if (!current_user()) { header('Location: /login.php'); exit; }

$user = require_admin_area();
$tenantId = (int)$user['tenant_id'];

$stmt = $pdo->prepare('SELECT name, slug, language FROM tenants WHERE id = ?');
$stmt->execute([$tenantId]);
$tenant = $stmt->fetch();

$stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE tenant_id = ?');
$stmt->execute([$tenantId]);
$customersTotal = (int)$stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE tenant_id = ? AND DATE(created_at) = CURDATE()');
$stmt->execute([$tenantId]);
$customersToday = (int)$stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE tenant_id = ? AND contacted_at IS NOT NULL');
$stmt->execute([$tenantId]);
$contacted = (int)$stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE tenant_id = ? AND rating = 5');
$stmt->execute([$tenantId]);
$fiveStars = (int)$stmt->fetchColumn();

$pubUrl = '/r/' . ($tenant['slug'] ?? '');

layout_head('Dashboard ' . ($tenant['name'] ?? ''));
?>

<section class="max-w-7xl mx-auto px-6 py-10 md:py-14">
  <!-- Header dashboard -->
  <div class="flex flex-wrap items-end justify-between gap-6 mb-10 rise d1">
    <div>
      <div class="flex items-center gap-3 mb-2">
        <span class="chip"><span class="dot pulse-dot"></span>Operativo</span>
        <span class="text-xs font-mono uppercase tracking-widest text-faint">/ <?= htmlspecialchars($tenant['slug'] ?? '') ?></span>
      </div>
      <h1 class="h-display text-3xl md:text-5xl"><?= htmlspecialchars($tenant['name'] ?? 'Area') ?></h1>
      <div class="mt-3 flex items-center gap-3 text-sm text-muted">
        <span>Sondaggio pubblico:</span>
        <code class="font-mono text-accent-500 bg-accent-500/10 border border-accent-500/30 px-2 py-1 rounded text-xs"><?= htmlspecialchars($pubUrl) ?></code>
        <button onclick="navigator.clipboard.writeText(window.location.origin + '<?= htmlspecialchars($pubUrl) ?>')" class="text-xs font-mono text-muted hover:text-ink transition">copia</button>
      </div>
    </div>
    <div class="flex gap-2">
      <a href="#" class="btn-ghost">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Aggiungi cliente
      </a>
      <a href="#" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
        Importa CSV
      </a>
    </div>
  </div>

  <!-- Stats cards -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
    <?php
    $stats = [
      ['label' => 'Clienti oggi',      'value' => $customersToday, 'sub' => 'Da contattare',     'accent' => true,  'delay' => 'd2'],
      ['label' => 'Inviati WhatsApp',  'value' => $contacted,      'sub' => 'In totale',         'accent' => false, 'delay' => 'd3'],
      ['label' => 'Recensioni 5★',     'value' => $fiveStars,      'sub' => 'Generate',          'accent' => false, 'delay' => 'd4'],
      ['label' => 'Conversion',        'value' => $contacted ? round(($fiveStars / max(1,$contacted)) * 100) . '%' : '—', 'sub' => '5★ / contattati',  'accent' => false, 'delay' => 'd5'],
    ];
    foreach ($stats as $s): ?>
      <div class="card p-5 rise <?= $s['delay'] ?> relative overflow-hidden group">
        <?php if ($s['accent']): ?>
          <div class="absolute -top-8 -right-8 w-32 h-32 bg-accent-500/10 rounded-full blur-2xl"></div>
        <?php endif; ?>
        <div class="relative">
          <div class="text-xs font-mono uppercase tracking-widest text-muted"><?= $s['label'] ?></div>
          <div class="mt-2 flex items-baseline gap-1.5">
            <span class="h-display text-4xl <?= $s['accent'] ? 'text-accent-500' : '' ?>"><?= $s['value'] ?></span>
          </div>
          <div class="mt-1 text-xs text-faint"><?= $s['sub'] ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Coda di oggi -->
  <div class="card overflow-hidden rise d6">
    <div class="px-6 py-5 border-b border-edge flex items-center justify-between">
      <div>
        <h2 class="font-semibold tracking-tight">Coda di oggi</h2>
        <p class="text-xs text-muted mt-0.5">Lista dei clienti da contattare via WhatsApp.</p>
      </div>
      <span class="chip"><?= $customersToday ?> oggi</span>
    </div>

    <?php if ($customersToday === 0): ?>
      <div class="px-6 py-16 text-center">
        <div class="w-14 h-14 mx-auto rounded-full bg-elev grid place-items-center mb-4">
          <svg class="w-6 h-6 text-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
        </div>
        <h3 class="font-semibold tracking-tight">Nessun cliente caricato oggi</h3>
        <p class="text-muted text-sm mt-1.5 max-w-sm mx-auto">Carica la lista dei clienti del giorno per iniziare. Bastano nome e numero WhatsApp.</p>
        <div class="mt-6 inline-flex gap-2">
          <button class="btn-ghost text-sm">Incolla lista</button>
          <button class="btn-primary text-sm">Carica CSV</button>
        </div>
      </div>
    <?php else: ?>
      <table class="tbl">
        <thead><tr>
          <th>Cliente</th><th>Servizio</th><th>Telefono</th><th>Stato</th><th class="text-right">Azione</th>
        </tr></thead>
        <tbody>
          <!-- popolare quando aggiungeremo customers -->
        </tbody>
      </table>
    <?php endif; ?>
  </div>

  <!-- Azioni rapide / settings -->
  <div class="grid md:grid-cols-3 gap-4 mt-10">
    <a href="#" class="card p-5 hover:border-accent-500/50 transition group">
      <div class="w-9 h-9 rounded-lg bg-accent-500/10 border border-accent-500/30 grid place-items-center text-accent-500 mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75"/></svg>
      </div>
      <h3 class="font-semibold tracking-tight mb-1">Personalizza messaggio</h3>
      <p class="text-sm text-muted">Modifica il testo WhatsApp inviato ai clienti.</p>
    </a>
    <a href="#" class="card p-5 hover:border-accent-500/50 transition group">
      <div class="w-9 h-9 rounded-lg bg-accent-500/10 border border-accent-500/30 grid place-items-center text-accent-500 mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
      </div>
      <h3 class="font-semibold tracking-tight mb-1">Imposta il regalo</h3>
      <p class="text-sm text-muted">Cosa offri a chi lascia 5 stelle.</p>
    </a>
    <a href="#" class="card p-5 hover:border-accent-500/50 transition group">
      <div class="w-9 h-9 rounded-lg bg-accent-500/10 border border-accent-500/30 grid place-items-center text-accent-500 mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
      </div>
      <h3 class="font-semibold tracking-tight mb-1">Statistiche</h3>
      <p class="text-sm text-muted">Andamento recensioni nel tempo.</p>
    </a>
  </div>
</section>

<?php layout_foot();

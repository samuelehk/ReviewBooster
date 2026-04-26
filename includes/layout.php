<?php
function layout_head(string $title = 'ReviewBoost', bool $marketing = false, string $theme = 'dark'): void {
    $u = effective_user();
    $imp = impersonating_as();
    ?><!doctype html>
<html lang="it" class="<?= $theme === 'dark' ? 'theme-dark' : 'theme-light' ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?> · ReviewBoost</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@300..800&family=Geist+Mono:wght@400..600&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        sans:    ['Geist', 'system-ui', 'sans-serif'],
        serif:   ['"Instrument Serif"', 'Georgia', 'serif'],
        mono:    ['"Geist Mono"', 'ui-monospace', 'monospace'],
      },
      colors: {
        // Dark theme palette (default)
        canvas:  '#07090A',
        surface: '#0F1213',
        elev:    '#181B1C',
        edge:    '#22272A',
        ink:     '#ECEEF0',
        muted:   '#8E9296',
        faint:   '#5A5E62',
        accent:  { 400:'#34D17F', 500:'#22C55E', 600:'#16A34A', 700:'#15803D' },
        gold:    '#F4C400',
        // Alias retrocompatibili
        brand: { 50:'#0F2E1F', 100:'#173E2A', 500:'#22C55E', 600:'#16A34A', 700:'#15803D', 800:'#0E5C2D' },
      },
      letterSpacing: {
        tightest: '-0.04em',
      },
      boxShadow: {
        'glow':  '0 0 0 1px rgba(34,197,94,.35), 0 0 40px -10px rgba(34,197,94,.45)',
        'card':  '0 1px 0 rgba(255,255,255,.04) inset, 0 0 0 1px rgba(255,255,255,.06), 0 8px 30px -12px rgba(0,0,0,.6)',
      }
    }
  }
};
</script>
<style>
  :root {
    --canvas:#07090A; --surface:#0F1213; --elev:#181B1C; --edge:#22272A;
    --ink:#ECEEF0; --muted:#8E9296; --faint:#5A5E62;
    --accent:#22C55E; --accent-soft:rgba(34,197,94,.12);
    --gold:#F4C400;
  }
  html, body { background: var(--canvas); color: var(--ink); }
  body { font-family: 'Geist', system-ui, sans-serif; -webkit-font-smoothing: antialiased; font-feature-settings: 'ss01','ss02','cv11'; }
  .font-serif { font-family: 'Instrument Serif', Georgia, serif; font-style: italic; letter-spacing: -0.01em; }
  .font-mono  { font-family: 'Geist Mono', ui-monospace, monospace; }

  /* Bordo sottile gradient su card */
  .card { background: var(--surface); border: 1px solid var(--edge); border-radius: 14px; }
  .card-soft { background: linear-gradient(180deg, rgba(255,255,255,.02), rgba(255,255,255,0)) , var(--surface); border:1px solid var(--edge); border-radius: 14px; }

  /* Grid pattern di sfondo (decorativo) */
  .grid-bg {
    background-image:
      linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px);
    background-size: 56px 56px;
    background-position: -1px -1px;
  }
  .radial-spot {
    background: radial-gradient(60% 50% at 80% 0%, rgba(34,197,94,.18), transparent 60%),
                radial-gradient(40% 40% at 10% 100%, rgba(34,197,94,.10), transparent 60%);
  }

  /* Spotlight noise overlay leggera */
  .noise::after {
    content:''; position:absolute; inset:0; pointer-events:none; opacity:.5; mix-blend-mode: overlay;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence baseFrequency='.95' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 .07 0'/></filter><rect width='100%25' height='100%25' filter='url(%23n)'/></svg>");
  }

  /* Pulsante primario */
  .btn-primary {
    display:inline-flex; align-items:center; gap:.5rem;
    background: var(--accent); color: #052414;
    padding: .7rem 1.05rem; border-radius: 10px; font-weight: 600;
    font-feature-settings: 'cv11'; letter-spacing: -.005em;
    box-shadow: 0 0 0 1px rgba(34,197,94,.55), 0 8px 30px -8px rgba(34,197,94,.55), inset 0 1px 0 rgba(255,255,255,.25);
    transition: transform .15s, box-shadow .25s, background .15s;
  }
  .btn-primary:hover { background:#34D17F; transform: translateY(-1px); }
  .btn-ghost {
    display:inline-flex; align-items:center; gap:.5rem;
    background: transparent; color: var(--ink);
    padding: .7rem 1.05rem; border-radius: 10px; font-weight: 500;
    border: 1px solid var(--edge);
    transition: border-color .15s, background .15s;
  }
  .btn-ghost:hover { border-color:#3a4145; background:rgba(255,255,255,.03); }

  /* Chip/badge */
  .chip { display:inline-flex; align-items:center; gap:.45rem; padding:.3rem .7rem; border-radius:999px; border:1px solid var(--edge); background: rgba(255,255,255,.02); font-size:.75rem; color: var(--muted); font-family:'Geist Mono', monospace; letter-spacing:.05em; text-transform: uppercase; }
  .chip .dot { width:6px; height:6px; border-radius:99px; background:var(--accent); box-shadow: 0 0 0 3px rgba(34,197,94,.18); }

  /* Animazioni page load */
  @keyframes rise { from { opacity:0; transform: translateY(14px); } to { opacity:1; transform: translateY(0); } }
  .rise { animation: rise .7s cubic-bezier(.2,.8,.2,1) both; }
  .d1 { animation-delay:.04s } .d2 { animation-delay:.12s } .d3 { animation-delay:.22s }
  .d4 { animation-delay:.34s } .d5 { animation-delay:.48s } .d6 { animation-delay:.62s }

  @keyframes pulseDot { 0%,100% { box-shadow: 0 0 0 0 rgba(34,197,94,.6); } 70% { box-shadow: 0 0 0 8px rgba(34,197,94,0); } }
  .pulse-dot { animation: pulseDot 2.4s infinite; }

  /* Tipografia titoli */
  .h-display { font-weight:600; letter-spacing:-0.04em; line-height:1; }

  /* Stelle inline */
  .stars { color: var(--gold); letter-spacing:.05em; }

  /* Form inputs (default per tutte le pagine secondarie) */
  input[type=text], input[type=email], input[type=password], input[type=tel], textarea, select {
    background: var(--surface); border: 1px solid var(--edge); color: var(--ink);
    border-radius: 10px; padding: .65rem .8rem; width: 100%;
    transition: border-color .15s, box-shadow .15s;
  }
  input:focus, textarea:focus, select:focus {
    outline:none; border-color: var(--accent);
    box-shadow: 0 0 0 4px rgba(34,197,94,.12);
  }
  ::placeholder { color: var(--faint); }

  /* Tabella admin */
  table.tbl { width:100%; border-collapse: collapse; }
  table.tbl th { text-align:left; padding: 12px 14px; font-family:'Geist Mono',monospace; font-size:.72rem; letter-spacing:.08em; text-transform:uppercase; color: var(--muted); border-bottom: 1px solid var(--edge); }
  table.tbl td { padding: 14px; border-bottom: 1px solid var(--edge); font-size: .92rem; }
  table.tbl tr:hover td { background: rgba(255,255,255,.02); }
</style>
</head>
<body class="min-h-screen relative">

<?php if ($imp): ?>
<div class="bg-gold/95 text-black text-xs py-2 px-4 text-center font-mono uppercase tracking-wider">
  Stai impersonando <strong><?= htmlspecialchars($imp['email']) ?></strong> ·
  <a href="/super/stop-impersonate.php" class="underline font-bold">Torna a Super Admin</a>
</div>
<?php endif; ?>

<header class="relative z-20 border-b border-edge/70 backdrop-blur bg-canvas/70">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <a href="/" class="flex items-center gap-2 group">
      <span class="relative grid place-items-center w-8 h-8 rounded-lg bg-accent-500 text-black shadow-glow">
        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="currentColor"><path d="M12 .8l3 7.5 8.2.6-6.3 5.3 2 8L12 17.7 5.1 22.2l2-8L.8 8.9l8.2-.6z"/></svg>
      </span>
      <span class="text-[15px] font-semibold tracking-tight">ReviewBoost</span>
      <span class="hidden sm:inline-block ml-1 text-[10px] font-mono uppercase tracking-widest text-muted">v1.0</span>
    </a>
    <nav class="flex items-center gap-2 text-sm">
      <?php if ($u && !$marketing): ?>
        <?php if (($u['role'] ?? null) === 'super_admin' && !$imp): ?>
          <a href="/super/" class="btn-ghost">Super Admin</a>
        <?php else: ?>
          <a href="/admin/" class="btn-ghost">Area</a>
        <?php endif; ?>
        <span class="hidden md:inline-block text-xs font-mono text-muted px-2"><?= htmlspecialchars($u['email']) ?></span>
        <a href="/logout.php" class="btn-ghost">Esci</a>
      <?php elseif ($marketing): ?>
        <a href="tel:+390000000000" class="btn-primary text-sm">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372a1.125 1.125 0 00-.852-1.091l-4.423-1.106a1.125 1.125 0 00-1.173.417l-.97 1.293a.75.75 0 01-.93.225 12.75 12.75 0 01-5.586-5.586.75.75 0 01.225-.93l1.293-.97a1.125 1.125 0 00.417-1.173L7.345 4.852A1.125 1.125 0 006.255 4H4.875A2.625 2.625 0 002.25 6.625v.125z"/></svg>
          Chiamaci
        </a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main class="relative z-10">
<?php
}

function layout_foot(): void {
?>
</main>

<footer class="relative z-10 mt-24 border-t border-edge/70">
  <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
    <div class="flex items-center gap-2">
      <span class="grid place-items-center w-7 h-7 rounded-lg bg-accent-500 text-black">
        <svg viewBox="0 0 24 24" class="w-3.5 h-3.5" fill="currentColor"><path d="M12 .8l3 7.5 8.2.6-6.3 5.3 2 8L12 17.7 5.1 22.2l2-8L.8 8.9l8.2-.6z"/></svg>
      </span>
      <span class="text-sm font-semibold tracking-tight">ReviewBoost</span>
    </div>
    <div class="text-xs font-mono uppercase tracking-widest text-faint">© <?= date('Y') ?> · Costruito con ossessione per il dettaglio</div>
  </div>
</footer>
</body>
</html>
<?php
}

function flash_set(string $key, string $msg): void { $_SESSION['flash'][$key] = $msg; }
function flash_get(string $key): ?string { $m = $_SESSION['flash'][$key] ?? null; unset($_SESSION['flash'][$key]); return $m; }

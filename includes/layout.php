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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..900;1,9..144,300..900&family=Geist:wght@300..800&family=Geist+Mono:wght@400..600&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        display: ['Fraunces', 'Georgia', 'serif'],
        body:    ['Geist',  'system-ui', 'sans-serif'],
        mono:    ['"Geist Mono"', 'ui-monospace', 'monospace'],
      },
      colors: {
        cream:   '#F4EFE6',
        cream2:  '#EAE2D2',
        ink:     '#0A1812',
        bottle:  { 50:'#E7EFEA', 600:'#0F4A35', 700:'#0B3826', 800:'#072619' },
        stem:    '#1A8559',
        gold:    '#FFCB1F',
        ember:   '#D9412F',
        // Alias retrocompatibile per le pagine login/register/admin/super
        brand: {
          50:  '#E7EFEA',
          100: '#D4E5DB',
          500: '#1A8559',
          600: '#0F4A35',
          700: '#0B3826',
          800: '#072619',
        },
      },
      letterSpacing: {
        tightest: '-0.045em',
      }
    }
  }
};
</script>
<style>
  html, body { background:#F4EFE6; color:#0A1812; }
  body { font-family: 'Geist', system-ui, sans-serif; -webkit-font-smoothing: antialiased; }
  .font-display { font-family: 'Fraunces', Georgia, serif; font-optical-sizing: auto; }
  .font-mono { font-family: 'Geist Mono', ui-monospace, monospace; }

  /* Grain overlay sottile */
  .grain::before {
    content: '';
    position: fixed; inset: 0; pointer-events: none; z-index: 1;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='160' height='160'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 .15 0'/></filter><rect width='100%25' height='100%25' filter='url(%23n)'/></svg>");
    opacity: .35; mix-blend-mode: multiply;
  }
  .relative > * { position: relative; z-index: 2; }

  @keyframes rise { from { opacity:0; transform: translateY(20px); } to { opacity:1; transform: translateY(0); } }
  .rise { animation: rise .9s cubic-bezier(.2,.8,.2,1) both; }
  .d1 { animation-delay: .05s; } .d2 { animation-delay: .18s; } .d3 { animation-delay: .32s; }
  .d4 { animation-delay: .48s; } .d5 { animation-delay: .65s; } .d6 { animation-delay: .82s; }

  /* Stella custom */
  .star-mark { display:inline-block; vertical-align: -0.1em; }

  /* Underline animato per link "magazine" */
  .ed-link { position:relative; }
  .ed-link::after { content:''; position:absolute; left:0; right:0; bottom:-3px; height:1px; background:currentColor; transform-origin:right; transform: scaleX(1); transition: transform .5s cubic-bezier(.2,.8,.2,1); }
  .ed-link:hover::after { transform-origin:left; transform: scaleX(0); }
</style>
</head>
<body class="grain relative">
<?php if ($imp): ?>
<div class="bg-gold border-b border-ink text-ink text-sm py-2 px-4 text-center font-mono uppercase tracking-wide">
  Stai impersonando <strong><?= htmlspecialchars($imp['email']) ?></strong> ·
  <a href="/super/stop-impersonate.php" class="underline font-semibold">Torna a Super Admin</a>
</div>
<?php endif; ?>

<header class="border-b border-ink/15">
  <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
    <a href="/" class="flex items-baseline gap-2 group">
      <span class="font-display text-2xl font-bold tracking-tightest text-ink">Review</span>
      <span class="font-display text-2xl font-bold italic text-bottle-600 tracking-tightest">Boost</span>
      <span class="text-gold text-2xl leading-none">★</span>
    </a>
    <nav class="flex items-center gap-5 text-sm font-mono uppercase tracking-wider">
      <?php if ($u && !$marketing): ?>
        <?php if (($u['role'] ?? null) === 'super_admin' && !$imp): ?>
          <a href="/super/" class="ed-link text-ink/70 hover:text-ink">Super Admin</a>
        <?php else: ?>
          <a href="/admin/" class="ed-link text-ink/70 hover:text-ink">Area</a>
        <?php endif; ?>
        <span class="text-ink/30">/</span>
        <span class="text-ink/60 normal-case font-body tracking-normal"><?= htmlspecialchars($u['email']) ?></span>
        <a href="/logout.php" class="ed-link text-ink/70 hover:text-ink">Esci</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main>
<?php
}

function layout_foot(): void {
?>
</main>
<footer class="border-t border-ink/15 mt-20">
  <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
    <div class="font-display text-xl">
      Review<span class="italic text-bottle-600">Boost</span> <span class="text-gold">★</span>
    </div>
    <div class="text-xs font-mono uppercase tracking-widest text-ink/50">
      © <?= date('Y') ?> · Tutti i diritti riservati
    </div>
  </div>
</footer>
</body>
</html>
<?php
}

function flash_set(string $key, string $msg): void { $_SESSION['flash'][$key] = $msg; }
function flash_get(string $key): ?string { $m = $_SESSION['flash'][$key] ?? null; unset($_SESSION['flash'][$key]); return $m; }

<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/layout.php';
layout_head('Recensioni Google a 5 stelle, automatizzate', true);
?>

<!-- ────────────  HERO  ──────────── -->
<section class="relative overflow-hidden">
  <div class="absolute inset-0 grid-bg [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_50%,transparent_100%)]"></div>
  <div class="absolute inset-0 radial-spot"></div>

  <div class="relative max-w-7xl mx-auto px-6 pt-20 pb-24 md:pt-28 md:pb-36 grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">
    <!-- LEFT: copy -->
    <div class="lg:col-span-6">
      <div class="chip rise d1"><span class="dot pulse-dot"></span> Live · operativo in 24h</div>

      <h1 class="h-display mt-6 text-5xl md:text-6xl lg:text-[4.6rem] rise d2">
        Trasforma <span class="font-serif text-accent-500">ogni cliente</span><br>
        in una recensione<br>
        a <span class="relative inline-block">
          5 stelle
          <span class="stars absolute -right-3 -top-2 text-base">★</span>
        </span>.
      </h1>

      <p class="mt-7 text-lg text-muted max-w-lg leading-relaxed rise d3">
        ReviewBoost è la piattaforma che la tua receptionist apre la mattina:
        clicca un bottone, parte un WhatsApp, il cliente lascia recensione.
        <span class="text-ink">Le 5 stelle vanno su Google. Le lamentele restano private.</span>
      </p>

      <div class="mt-9 flex flex-wrap items-center gap-3 rise d4">
        <a href="tel:+390000000000" class="btn-primary">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372a1.125 1.125 0 00-.852-1.091l-4.423-1.106a1.125 1.125 0 00-1.173.417l-.97 1.293a.75.75 0 01-.93.225 12.75 12.75 0 01-5.586-5.586.75.75 0 01.225-.93l1.293-.97a1.125 1.125 0 00.417-1.173L7.345 4.852A1.125 1.125 0 006.255 4H4.875A2.625 2.625 0 002.25 6.625v.125z"/></svg>
          Chiama +39 XXX XXX XXXX
        </a>
        <a href="#come-funziona" class="btn-ghost">
          Come funziona
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
        </a>
      </div>

      <div class="mt-10 flex items-center gap-6 text-xs text-faint font-mono uppercase tracking-widest rise d5">
        <span>Centri estetici</span>
        <span class="text-edge">/</span>
        <span>Parrucchieri</span>
        <span class="text-edge">/</span>
        <span>Ristoranti</span>
        <span class="text-edge">/</span>
        <span>Studi medici</span>
      </div>
    </div>

    <!-- RIGHT: product preview -->
    <div class="lg:col-span-6 relative rise d4">
      <!-- card flottante "queue" -->
      <div class="card-soft p-5 shadow-card relative noise overflow-hidden">
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-2">
            <div class="flex items-center gap-1">
              <span class="w-2.5 h-2.5 rounded-full bg-[#FF5F57]"></span>
              <span class="w-2.5 h-2.5 rounded-full bg-[#FEBC2E]"></span>
              <span class="w-2.5 h-2.5 rounded-full bg-[#28C840]"></span>
            </div>
            <span class="ml-3 text-xs font-mono text-muted">app.reviewboost.io / coda di oggi</span>
          </div>
          <span class="chip"><span class="dot"></span> 7 da contattare</span>
        </div>

        <div class="flex items-center justify-between mb-4">
          <div>
            <div class="text-xs font-mono uppercase tracking-widest text-faint">Coda · oggi</div>
            <div class="text-2xl font-semibold tracking-tight mt-1">Centro Estetico Bellezza</div>
          </div>
          <div class="text-right">
            <div class="text-xs font-mono uppercase tracking-widest text-faint">Recensioni Google</div>
            <div class="text-2xl font-semibold tracking-tight mt-1 flex items-center gap-1.5 justify-end">
              <span class="stars text-lg">★</span> 4.8 <span class="text-muted text-sm">· 312</span>
            </div>
          </div>
        </div>

        <!-- mini grafico SVG -->
        <div class="rounded-lg bg-canvas border border-edge p-4 mb-4">
          <div class="flex items-end justify-between h-20 gap-2">
            <?php $bars = [22,30,28,42,38,55,48,62,58,75,70,88]; foreach ($bars as $i => $h): ?>
              <div class="flex-1 rounded-sm bg-accent-500/70 hover:bg-accent-500 transition" style="height: <?= $h ?>%; min-width: 6px;"></div>
            <?php endforeach; ?>
          </div>
          <div class="flex justify-between mt-2 text-[10px] font-mono text-faint uppercase">
            <span>Lun</span><span>Mar</span><span>Mer</span><span>Gio</span><span>Ven</span><span>Sab</span><span>Oggi</span>
          </div>
        </div>

        <!-- righe coda -->
        <div class="space-y-2">
          <?php
          $queue = [
            ['Anna Russo', 'Manicure gel', '+39 333 ••• 4521', false],
            ['Marco Bianchi', 'Piega + tinta', '+39 348 ••• 2010', true],
            ['Giulia Conti', 'Massaggio 60min', '+39 392 ••• 8744', false],
          ];
          foreach ($queue as $row): ?>
            <div class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-canvas border border-edge">
              <div class="grid place-items-center w-8 h-8 rounded-full bg-elev text-xs font-mono text-muted">
                <?= strtoupper(substr($row[0],0,1) . substr(explode(' ', $row[0])[1] ?? '',0,1)) ?>
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2">
                  <span class="text-sm font-medium truncate"><?= $row[0] ?></span>
                  <?php if ($row[3]): ?><span class="text-[10px] font-mono uppercase tracking-wider text-accent-500 bg-accent-500/10 px-1.5 py-0.5 rounded">contattato</span><?php endif; ?>
                </div>
                <div class="text-xs text-muted font-mono"><?= $row[1] ?> · <?= $row[2] ?></div>
              </div>
              <button class="<?= $row[3] ? 'btn-ghost opacity-50 cursor-default' : 'btn-primary' ?> text-xs px-3 py-1.5">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.32A7.85 7.85 0 0 0 12.05 4 7.94 7.94 0 0 0 4.1 12a7.9 7.9 0 0 0 1.05 3.95L4 20l4.18-1.1a7.93 7.93 0 0 0 3.87 1h.01a7.94 7.94 0 0 0 7.95-7.95 7.9 7.9 0 0 0-2.41-5.63zm-5.55 12.22h-.01a6.6 6.6 0 0 1-3.36-.92l-.24-.14-2.49.65.66-2.42-.16-.25a6.58 6.58 0 0 1-1.01-3.5 6.6 6.6 0 0 1 11.27-4.66 6.55 6.55 0 0 1 1.93 4.66 6.6 6.6 0 0 1-6.59 6.58zm3.62-4.93c-.2-.1-1.18-.58-1.36-.65-.18-.07-.31-.1-.45.1-.13.2-.51.65-.63.78-.12.13-.23.15-.43.05-.2-.1-.83-.31-1.59-.98-.59-.52-.99-1.17-1.1-1.37-.12-.2-.01-.31.09-.41.09-.09.2-.23.3-.35.1-.12.13-.2.2-.33.07-.13.03-.25-.02-.35-.05-.1-.45-1.08-.62-1.48-.16-.39-.33-.34-.45-.35-.12 0-.25-.02-.38-.02-.13 0-.35.05-.53.25-.18.2-.7.68-.7 1.66 0 .98.71 1.92.81 2.05.1.13 1.41 2.15 3.41 3.01.48.21.85.33 1.14.42.48.15.91.13 1.26.08.38-.06 1.18-.48 1.34-.95.17-.47.17-.86.12-.95-.05-.08-.18-.13-.38-.23z"/></svg>
                <?= $row[3] ? 'Inviato' : 'Invia' ?>
              </button>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="mt-3 pt-3 border-t border-edge flex items-center justify-between text-xs">
          <span class="font-mono text-faint">+ 4 altri clienti</span>
          <span class="font-mono text-accent-500">3/7 contattati</span>
        </div>
      </div>

      <!-- card piccola sotto -->
      <div class="card-soft p-4 mt-4 max-w-xs ml-auto shadow-card">
        <div class="flex items-center gap-2 mb-2">
          <span class="stars">★★★★★</span>
          <span class="text-xs text-muted font-mono">Anna · 12 min fa</span>
        </div>
        <p class="text-sm text-ink/90">"Servizio top, le ragazze sono bravissime. Tornerò!"</p>
        <div class="mt-2 text-xs font-mono text-accent-500 flex items-center gap-1">
          <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 16.8 5.8 21.3l2.4-7.4L2 9.4h7.6z"/></svg>
          pubblicata su Google
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ────────────  STRIP NUMERI  ──────────── -->
<section class="border-y border-edge/70 bg-surface/40">
  <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-edge">
    <div class="py-6 md:py-0 md:px-10">
      <div class="font-mono text-[11px] uppercase tracking-widest text-faint">Aumento medio</div>
      <div class="mt-2 flex items-baseline gap-1">
        <span class="h-display text-5xl md:text-6xl">+47</span>
        <span class="h-display text-3xl text-accent-500">%</span>
      </div>
      <div class="mt-1 text-sm text-muted">recensioni Google in 90 giorni</div>
    </div>
    <div class="py-6 md:py-0 md:px-10">
      <div class="font-mono text-[11px] uppercase tracking-widest text-faint">Operativi in</div>
      <div class="mt-2 flex items-baseline gap-1">
        <span class="h-display text-5xl md:text-6xl">24</span>
        <span class="h-display text-3xl text-accent-500">h</span>
      </div>
      <div class="mt-1 text-sm text-muted">dalla telefonata. Niente integrazioni.</div>
    </div>
    <div class="py-6 md:py-0 md:px-10">
      <div class="font-mono text-[11px] uppercase tracking-widest text-faint">Investimento</div>
      <div class="mt-2 flex items-baseline gap-1">
        <span class="h-display text-5xl md:text-6xl">50</span>
        <span class="h-display text-3xl text-accent-500">€</span>
        <span class="text-muted text-sm ml-2 font-mono">/mese</span>
      </div>
      <div class="mt-1 text-sm text-muted">14 giorni gratis · disdici quando vuoi</div>
    </div>
  </div>
</section>

<!-- ────────────  COME FUNZIONA  ──────────── -->
<section id="come-funziona" class="max-w-7xl mx-auto px-6 py-24 md:py-32">
  <div class="flex items-end justify-between flex-wrap gap-6 mb-14">
    <div>
      <div class="chip mb-4"><span class="dot"></span>Come funziona</div>
      <h2 class="h-display text-4xl md:text-5xl max-w-2xl">Tre passi. <span class="font-serif text-accent-500">Trenta secondi</span> di lavoro al giorno.</h2>
    </div>
    <p class="text-muted max-w-md">Pensata per la receptionist. Mobile-first, tablet-friendly. Niente da imparare: si apre, si clicca.</p>
  </div>

  <div class="grid lg:grid-cols-3 gap-5">
    <!-- step 1 -->
    <article class="card p-7 relative overflow-hidden group">
      <div class="absolute -top-10 -right-10 w-48 h-48 bg-accent-500/5 rounded-full blur-3xl group-hover:bg-accent-500/10 transition"></div>
      <div class="relative">
        <div class="font-mono text-xs text-accent-500 mb-6">01 — IMPORT</div>
        <h3 class="h-display text-2xl mb-3">Carichi i clienti del giorno</h3>
        <p class="text-muted text-sm leading-relaxed">Incolla la lista o carica un CSV. Bastano nome e numero. Il sistema genera un link sondaggio personalizzato per ognuno.</p>
        <div class="mt-6 rounded-lg bg-canvas border border-edge p-3 font-mono text-xs space-y-1">
          <div class="flex justify-between"><span class="text-muted">Anna Russo</span><span class="text-accent-500">+39 333•••</span></div>
          <div class="flex justify-between"><span class="text-muted">Marco Bianchi</span><span class="text-accent-500">+39 348•••</span></div>
          <div class="flex justify-between"><span class="text-muted">Giulia Conti</span><span class="text-accent-500">+39 392•••</span></div>
        </div>
      </div>
    </article>

    <!-- step 2 -->
    <article class="card p-7 relative overflow-hidden group">
      <div class="absolute -top-10 -right-10 w-48 h-48 bg-accent-500/5 rounded-full blur-3xl group-hover:bg-accent-500/10 transition"></div>
      <div class="relative">
        <div class="font-mono text-xs text-accent-500 mb-6">02 — INVIO</div>
        <h3 class="h-display text-2xl mb-3">La receptionist clicca</h3>
        <p class="text-muted text-sm leading-relaxed">Bottone WhatsApp accanto a ogni nome. Si apre la chat con messaggio già scritto e link al sondaggio. Lei lo invia. Fine.</p>
        <div class="mt-6 rounded-lg bg-[#063C2A] border border-accent-500/30 p-3 text-xs">
          <div class="text-accent-500 font-mono mb-1.5">→ WhatsApp</div>
          <p class="text-ink/90 leading-relaxed">"Ciao Anna, grazie per essere passata oggi! Ci dai un feedback in 10 secondi? <span class="text-accent-500">link.it/r/anna</span>"</p>
        </div>
      </div>
    </article>

    <!-- step 3 -->
    <article class="card p-7 relative overflow-hidden group">
      <div class="absolute -top-10 -right-10 w-48 h-48 bg-accent-500/5 rounded-full blur-3xl group-hover:bg-accent-500/10 transition"></div>
      <div class="relative">
        <div class="font-mono text-xs text-accent-500 mb-6">03 — RISULTATO</div>
        <h3 class="h-display text-2xl mb-3">Le 5 stelle vanno su Google</h3>
        <p class="text-muted text-sm leading-relaxed">Chi mette 5★ viene reindirizzato a Google + riceve il regalo. Chi mette meno scrive a te in privato — e tu hai 24h per recuperarlo.</p>
        <div class="mt-6 grid grid-cols-2 gap-2">
          <div class="rounded-lg bg-accent-500/10 border border-accent-500/30 p-3">
            <div class="stars text-base">★★★★★</div>
            <div class="text-xs text-accent-500 mt-1 font-mono">→ Google</div>
          </div>
          <div class="rounded-lg bg-elev border border-edge p-3">
            <div class="stars text-base">★★<span class="text-edge">★★★</span></div>
            <div class="text-xs text-muted mt-1 font-mono">→ Privato</div>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>

<!-- ────────────  FEATURES GRID  ──────────── -->
<section class="max-w-7xl mx-auto px-6 py-20">
  <div class="mb-14">
    <div class="chip mb-4"><span class="dot"></span>Cosa ottieni</div>
    <h2 class="h-display text-4xl md:text-5xl max-w-3xl">Tutto incluso. <span class="font-serif text-accent-500">Niente sorprese</span> in fattura.</h2>
  </div>

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-px bg-edge/70 rounded-2xl overflow-hidden">
    <?php
    $feats = [
      ['icon' => 'M3 7.5h18M3 12h18M3 16.5h18', 'title' => 'Importa clienti veloce', 'desc' => 'Incolla, oppure carica CSV. Riconosce nome/telefono in automatico.'],
      ['icon' => 'M21 12a9 9 0 11-18 0 9 9 0 0118 0z M12 8v4l3 2', 'title' => 'Coda quotidiana', 'desc' => 'Una vista, ordinata per priorità. La receptionist apre e va.'],
      ['icon' => 'M3 9l9-6 9 6v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9z M9 21V13h6v8', 'title' => 'Multi-tenant rigoroso', 'desc' => 'Ogni centro vede solo i propri dati. Zero contaminazione.'],
      ['icon' => 'M5 13l4 4L19 7', 'title' => 'Tracking completo', 'desc' => 'Sai chi ha cliccato, chi ha risposto, chi ha lasciato la recensione.'],
      ['icon' => 'M3 3h18v18H3z M9 9h6v6H9z', 'title' => 'Sondaggio brandizzato', 'desc' => 'URL pubblico personalizzato per ogni centro. Look in linea.'],
      ['icon' => 'M12 6V4 M12 20v-2 M4.93 4.93l1.41 1.41 M17.66 17.66l1.41 1.41 M2 12h2 M20 12h2 M4.93 19.07l1.41-1.41 M17.66 6.34l1.41-1.41 M12 8a4 4 0 100 8 4 4 0 000-8z', 'title' => 'Recovery feedback', 'desc' => 'Lamentele in privato + alert email al titolare. Zero esposizione pubblica.'],
    ];
    foreach ($feats as $f): ?>
      <div class="bg-surface p-7 hover:bg-elev transition relative group">
        <div class="w-9 h-9 rounded-lg bg-accent-500/10 border border-accent-500/30 grid place-items-center text-accent-500 mb-5">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="<?= $f['icon'] ?>"/></svg>
        </div>
        <h3 class="font-semibold tracking-tight mb-2"><?= $f['title'] ?></h3>
        <p class="text-sm text-muted leading-relaxed"><?= $f['desc'] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ────────────  CTA FINALE  ──────────── -->
<section class="max-w-7xl mx-auto px-6 py-24">
  <div class="card relative overflow-hidden p-10 md:p-16">
    <div class="absolute inset-0 radial-spot opacity-50"></div>
    <div class="absolute inset-0 grid-bg opacity-30 [mask-image:radial-gradient(ellipse_50%_50%_at_50%_50%,#000,transparent_70%)]"></div>

    <div class="relative grid md:grid-cols-12 gap-10 items-center">
      <div class="md:col-span-7">
        <div class="chip mb-5"><span class="dot pulse-dot"></span>Pronto in 24h</div>
        <h2 class="h-display text-4xl md:text-6xl">
          Una telefonata.<br>
          <span class="font-serif text-accent-500">Sei online stasera</span>.
        </h2>
        <p class="mt-6 text-muted text-lg max-w-xl">14 giorni gratuiti, senza vincoli. Carta richiesta solo per attivare. Ti spieghiamo come funziona, configuriamo il sondaggio, sei attivo entro la giornata.</p>
      </div>
      <div class="md:col-span-5">
        <div class="card-soft p-6 backdrop-blur-sm">
          <div class="font-mono text-[11px] uppercase tracking-widest text-faint mb-3">Numero diretto</div>
          <a href="tel:+390000000000" class="block text-3xl md:text-4xl font-semibold tracking-tightest hover:text-accent-500 transition">
            +39 XXX XXX XXXX
          </a>
          <div class="mt-5 grid grid-cols-2 gap-3 text-xs font-mono">
            <div class="rounded-lg bg-canvas border border-edge px-3 py-2">
              <div class="text-faint uppercase tracking-widest text-[10px]">Lun–Ven</div>
              <div class="text-ink mt-0.5">9:00 — 19:00</div>
            </div>
            <div class="rounded-lg bg-canvas border border-edge px-3 py-2">
              <div class="text-faint uppercase tracking-widest text-[10px]">Risposta</div>
              <div class="text-accent-500 mt-0.5">Entro 1h</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php layout_foot();

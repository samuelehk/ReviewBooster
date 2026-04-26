<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/layout.php';
layout_head('Più recensioni Google a 5 stelle, ogni giorno', true);
?>

<!-- ─────────────────  HERO  ───────────────── -->
<section class="relative overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-sage to-white -z-10"></div>
  <div class="absolute inset-x-0 top-0 h-full -z-10" style="background-image: radial-gradient(60% 50% at 80% 0%, rgba(15,142,92,.10), transparent 60%);"></div>

  <div class="max-w-6xl mx-auto px-6 pt-16 pb-20 md:pt-24 md:pb-28 text-center">
    <div class="inline-flex flex-col items-center gap-6 rise d1">
      <span class="chip"><span class="dot"></span> Operativo per oltre 200 centri in Italia</span>
    </div>

    <h1 class="h-display mt-7 text-5xl sm:text-6xl md:text-7xl lg:text-[5.4rem] max-w-4xl mx-auto rise d2">
      Più recensioni Google.<br>
      <span class="hl-mint">Ogni giorno.</span> <span class="text-primary-500">Senza fatica.</span>
    </h1>

    <p class="mt-7 text-lg md:text-xl text-body max-w-2xl mx-auto leading-relaxed rise d3">
      ReviewBoost è la piattaforma che la tua receptionist apre la mattina, clicca un bottone e parte un WhatsApp ai clienti del giorno prima. Loro lasciano la recensione su Google. <span class="text-ink font-semibold">Tu vedi crescere il tuo punteggio.</span>
    </p>

    <div class="mt-9 flex flex-wrap items-center justify-center gap-3 rise d4">
      <a href="tel:+390000000000" class="btn-primary">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372a1.125 1.125 0 00-.852-1.091l-4.423-1.106a1.125 1.125 0 00-1.173.417l-.97 1.293a.75.75 0 01-.93.225 12.75 12.75 0 01-5.586-5.586.75.75 0 01.225-.93l1.293-.97a1.125 1.125 0 00.417-1.173L7.345 4.852A1.125 1.125 0 006.255 4H4.875A2.625 2.625 0 002.25 6.625v.125z"/></svg>
        Inizia 14 giorni gratis
      </a>
      <a href="#come-funziona" class="btn-secondary">Guarda come funziona</a>
    </div>

    <div class="mt-8 flex items-center justify-center gap-6 text-sm text-muted rise d5">
      <span class="flex items-center gap-2">
        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        Carta richiesta solo all'attivazione
      </span>
      <span class="flex items-center gap-2">
        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        Disdici quando vuoi
      </span>
    </div>
  </div>

  <!-- Mock prodotto -->
  <div class="max-w-5xl mx-auto px-6 pb-16 rise d6">
    <div class="bg-white rounded-2xl border border-line shadow-lift overflow-hidden">
      <div class="px-5 py-3 border-b border-line bg-bone flex items-center gap-3">
        <div class="flex gap-1.5">
          <span class="w-2.5 h-2.5 rounded-full bg-line2 border border-line"></span>
          <span class="w-2.5 h-2.5 rounded-full bg-line2 border border-line"></span>
          <span class="w-2.5 h-2.5 rounded-full bg-line2 border border-line"></span>
        </div>
        <div class="flex-1 text-center text-xs text-muted font-medium">app.reviewboost.it · Centro Estetico Bellezza</div>
      </div>
      <div class="grid md:grid-cols-3 gap-5 p-6">
        <!-- Stat -->
        <div class="bg-mint rounded-xl p-5 border border-primary-100">
          <div class="text-xs font-semibold uppercase tracking-wider text-primary-700">Recensioni questo mese</div>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="h-display text-4xl">+34</span>
            <span class="text-sm text-primary-700 font-semibold">▲ 47%</span>
          </div>
          <div class="flex items-end gap-1 h-10 mt-3">
            <?php $bars = [30,42,38,52,48,62,58,72,68,82,76,90]; foreach ($bars as $h): ?>
              <div class="flex-1 rounded-sm bg-primary-500/80" style="height: <?= $h ?>%; min-width: 4px;"></div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="bg-cream rounded-xl p-5 border border-yellow-200/50">
          <div class="text-xs font-semibold uppercase tracking-wider text-yellow-800">Punteggio Google</div>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="h-display text-4xl">4.8</span>
            <span class="stars text-lg">★★★★★</span>
          </div>
          <div class="text-xs text-muted mt-3">su 312 recensioni · <span class="text-yellow-800 font-semibold">+0.4 quest'anno</span></div>
        </div>
        <div class="bg-sage rounded-xl p-5 border border-line">
          <div class="text-xs font-semibold uppercase tracking-wider text-muted">Coda di oggi</div>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="h-display text-4xl">7</span>
            <span class="text-sm text-muted">clienti</span>
          </div>
          <div class="text-xs text-muted mt-3"><span class="text-primary-600 font-semibold">3 contattati</span> · 4 da fare</div>
        </div>
      </div>
      <!-- Lista clienti -->
      <div class="border-t border-line">
        <div class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-muted bg-bone border-b border-line">Clienti di oggi</div>
        <?php
        $queue = [
          ['Anna Russo', 'Manicure gel', false],
          ['Marco Bianchi', 'Piega + tinta', true],
          ['Giulia Conti', 'Massaggio 60min', false],
        ];
        foreach ($queue as $i => $row): ?>
          <div class="flex items-center gap-4 px-6 py-3.5 <?= $i < count($queue)-1 ? 'border-b border-line2' : '' ?>">
            <div class="grid place-items-center w-9 h-9 rounded-full bg-sage text-primary-700 font-semibold text-sm">
              <?= strtoupper(substr($row[0],0,1) . substr(explode(' ', $row[0])[1] ?? '',0,1)) ?>
            </div>
            <div class="flex-1 min-w-0">
              <div class="font-medium text-ink text-sm"><?= $row[0] ?></div>
              <div class="text-xs text-muted"><?= $row[1] ?></div>
            </div>
            <?php if ($row[2]): ?>
              <span class="text-xs font-semibold text-primary-700 bg-mint px-3 py-1 rounded-full">✓ Inviato</span>
            <?php else: ?>
              <button class="inline-flex items-center gap-1.5 bg-[#25D366] text-white text-xs font-semibold px-3 py-1.5 rounded-full hover:bg-[#1faa54]">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.32A7.85 7.85 0 0 0 12.05 4 7.94 7.94 0 0 0 4.1 12a7.9 7.9 0 0 0 1.05 3.95L4 20l4.18-1.1a7.93 7.93 0 0 0 3.87 1h.01a7.94 7.94 0 0 0 7.95-7.95 7.9 7.9 0 0 0-2.41-5.63z"/></svg>
                Invia WhatsApp
              </button>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ─────────────────  SOCIAL PROOF / LOGOS  ───────────────── -->
<section class="border-y border-line bg-bone">
  <div class="max-w-6xl mx-auto px-6 py-10">
    <p class="text-center text-sm text-muted font-medium mb-6">Scelto da centri estetici, parrucchieri, ristoranti e studi medici in tutta Italia</p>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6 items-center justify-items-center opacity-70">
      <?php
      $logos = ['BELLEZZA', 'CAPELLI&CO', 'TRATTORIA·DA·MARIA', 'STUDIO·BIANCHI', 'GLAM&GO', 'NAILS·HOUSE'];
      foreach ($logos as $l): ?>
        <span class="font-display font-semibold text-muted tracking-tight text-sm md:text-base whitespace-nowrap"><?= $l ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ─────────────────  PROBLEMA / SOLUZIONE  ───────────────── -->
<section class="max-w-6xl mx-auto px-6 py-24 md:py-32 grid lg:grid-cols-2 gap-16 items-center">
  <div>
    <span class="chip mb-5"><span class="dot"></span> Il problema</span>
    <h2 class="h-display text-4xl md:text-5xl mb-6">
      I tuoi clienti escono <span class="hl-cream">contenti</span>.<br>
      Ma su Google non scrivono niente.
    </h2>
    <p class="text-lg text-body leading-relaxed">
      Lo sai bene: la gente quando è soddisfatta non dice nulla. Quando è arrabbiata corre a scrivere. Risultato? Il tuo Google appare peggio di quello che sei davvero — e perdi i clienti che ti cercavano online.
    </p>
    <ul class="mt-7 space-y-3 text-body">
      <li class="flex items-start gap-3">
        <span class="grid place-items-center w-5 h-5 rounded-full bg-red-100 text-red-600 mt-0.5 text-xs font-bold flex-shrink-0">×</span>
        Chiedere a voce è imbarazzante e non funziona
      </li>
      <li class="flex items-start gap-3">
        <span class="grid place-items-center w-5 h-5 rounded-full bg-red-100 text-red-600 mt-0.5 text-xs font-bold flex-shrink-0">×</span>
        Mandare l'SMS a mano è una rottura
      </li>
      <li class="flex items-start gap-3">
        <span class="grid place-items-center w-5 h-5 rounded-full bg-red-100 text-red-600 mt-0.5 text-xs font-bold flex-shrink-0">×</span>
        Quando arriva una recensione brutta, è già troppo tardi
      </li>
    </ul>
  </div>

  <div class="bg-mint rounded-3xl p-10 border border-primary-100 relative overflow-hidden">
    <div class="absolute -top-12 -right-12 w-48 h-48 bg-primary-500/10 rounded-full blur-3xl"></div>
    <span class="chip bg-white border-primary-100 mb-5"><span class="dot"></span> La soluzione</span>
    <h3 class="h-display text-3xl md:text-4xl mb-5 leading-tight">
      Un click, un WhatsApp, una recensione.
    </h3>
    <p class="text-body leading-relaxed mb-6">
      ReviewBoost gira la cosa. Ogni mattina la receptionist apre l'app, vede chi è venuto ieri, e con un click manda a tutti un sondaggino via WhatsApp. <span class="text-ink font-semibold">Chi è soddisfatto va su Google. Chi non lo è, scrive solo a te.</span>
    </p>
    <div class="bg-white rounded-2xl p-5 border border-line">
      <div class="flex items-start gap-3">
        <div class="grid place-items-center w-9 h-9 rounded-full bg-[#25D366] text-white flex-shrink-0">
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6 6.32A7.85 7.85 0 0 0 12.05 4 7.94 7.94 0 0 0 4.1 12a7.9 7.9 0 0 0 1.05 3.95L4 20l4.18-1.1a7.93 7.93 0 0 0 3.87 1h.01a7.94 7.94 0 0 0 7.95-7.95 7.9 7.9 0 0 0-2.41-5.63z"/></svg>
        </div>
        <div class="text-sm text-body leading-relaxed">
          "Ciao Anna! Grazie di essere passata oggi 💚 Ci dai un feedback in 10 secondi? <span class="text-primary-600 font-semibold">link.it/r/bellezza</span>"
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─────────────────  COME FUNZIONA  ───────────────── -->
<section id="come-funziona" class="bg-bone py-24 md:py-32 border-y border-line">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-16">
      <span class="chip mb-5"><span class="dot"></span> Come funziona</span>
      <h2 class="h-display text-4xl md:text-5xl">Tre passaggi. <span class="hl-mint">Trenta secondi</span> al giorno.</h2>
      <p class="mt-5 text-lg text-body">Pensata per la receptionist, non per il programmatore. Si apre, si clicca, si chiude.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      <article class="card p-8 relative">
        <div class="absolute top-7 right-7 font-display text-6xl text-primary-100 leading-none">01</div>
        <div class="w-12 h-12 rounded-2xl bg-mint grid place-items-center text-primary-600 mb-6">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
        </div>
        <h3 class="font-display text-xl font-semibold mb-3">Carichi la lista</h3>
        <p class="text-body text-sm leading-relaxed">Incolli i clienti del giorno o trascini un file Excel. Bastano nome e numero. Trenta secondi.</p>
      </article>

      <article class="card p-8 relative">
        <div class="absolute top-7 right-7 font-display text-6xl text-primary-100 leading-none">02</div>
        <div class="w-12 h-12 rounded-2xl bg-mint grid place-items-center text-primary-600 mb-6">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25"/></svg>
        </div>
        <h3 class="font-display text-xl font-semibold mb-3">Lei clicca</h3>
        <p class="text-body text-sm leading-relaxed">Bottone WhatsApp accanto a ogni nome. Si apre la chat con il messaggio già scritto. Lei lo invia.</p>
      </article>

      <article class="card p-8 relative">
        <div class="absolute top-7 right-7 font-display text-6xl text-primary-100 leading-none">03</div>
        <div class="w-12 h-12 rounded-2xl bg-mint grid place-items-center text-primary-600 mb-6">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.32.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
        </div>
        <h3 class="font-display text-xl font-semibold mb-3">Recensioni a 5 stelle</h3>
        <p class="text-body text-sm leading-relaxed">I clienti soddisfatti vanno su Google. Quelli scontenti scrivono solo a te, in privato.</p>
      </article>
    </div>
  </div>
</section>

<!-- ─────────────────  FEATURES  ───────────────── -->
<section class="max-w-6xl mx-auto px-6 py-24 md:py-32">
  <div class="max-w-2xl mb-14">
    <span class="chip mb-5"><span class="dot"></span> Cosa c'è dentro</span>
    <h2 class="h-display text-4xl md:text-5xl">Tutto quello che ti serve. <span class="hl-mint">Niente di più.</span></h2>
  </div>

  <div class="grid md:grid-cols-2 gap-5">
    <?php
    $feats = [
      ['Recupero feedback negativi', 'Le valutazioni sotto 5 stelle non vanno su Google. Arrivano in privato a te, con tutto il dettaglio. Hai 24 ore per recuperare il cliente.', 'M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z'],
      ['Sondaggio brandizzato',     'Ogni centro ha il suo URL pubblico (/r/nome) con i tuoi colori, il tuo logo e il tuo regalo. I clienti vedono te, non noi.', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
      ['Receptionist friendly',    'Funziona da telefono, tablet, computer. Niente da imparare: una vista, un bottone, fatto. La tua receptionist sarà operativa in 5 minuti.', 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'],
      ['Statistiche & andamento',   'Vedi quante recensioni hai generato, il punteggio Google nel tempo, quanti clienti hanno cliccato il sondaggio. In un grafico chiaro.',  'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
      ['Multi-tenant rigoroso',    'Ogni centro vede solo i propri clienti, le proprie recensioni, le proprie statistiche. Zero rischio di mescolare i dati con un altro centro.',  'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
      ['Configurazione in 24h',    'Una telefonata, ti spieghiamo come funziona, configuriamo il tuo sondaggio, sei online entro la giornata. Niente di tecnico da imparare.',   'M13 10V3L4 14h7v7l9-11h-7z'],
    ];
    foreach ($feats as $f): ?>
      <div class="card p-7 hover:shadow-soft transition group">
        <div class="flex items-start gap-4">
          <div class="w-11 h-11 rounded-xl bg-mint grid place-items-center text-primary-600 flex-shrink-0 group-hover:bg-primary-500 group-hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="<?= $f[2] ?>"/></svg>
          </div>
          <div>
            <h3 class="font-display text-lg font-semibold mb-1.5"><?= $f[0] ?></h3>
            <p class="text-sm text-body leading-relaxed"><?= $f[1] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ─────────────────  TESTIMONIALS  ───────────────── -->
<section class="bg-bone py-24 md:py-32 border-y border-line">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <span class="chip mb-5"><span class="dot"></span> Storie vere</span>
      <h2 class="h-display text-4xl md:text-5xl">Dicono di noi.</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-5">
      <?php
      $testimonials = [
        ['Da 2 recensioni alla settimana siamo passati a 8. In 3 mesi il punteggio è salito da 4.3 a 4.7. Cose che si sentono al telefono — la gente ci trova prima.', 'Laura M.', 'Centro Estetico Bellezza, Milano', 'LM', 'mint'],
        ['La cosa che mi piace di più è che le lamentele non finiscono più su Google. Mi arrivano in mail e le sistemo prima. Ne sto recuperando 1 su 3.', 'Marco C.', 'Trattoria da Marco, Bologna', 'MC', 'cream'],
        ['Le ragazze in reception ci hanno messo cinque minuti a capire come funziona. Ora è abitudine, come fare il caffè la mattina. Zero stress.', 'Giulia R.', 'Capelli & Co, Firenze', 'GR', 'sage'],
      ];
      foreach ($testimonials as $t): ?>
        <article class="card p-7 flex flex-col">
          <div class="stars text-base mb-4">★★★★★</div>
          <p class="text-body leading-relaxed flex-1 text-[15px]">"<?= $t[0] ?>"</p>
          <div class="mt-6 pt-5 border-t border-line2 flex items-center gap-3">
            <div class="grid place-items-center w-10 h-10 rounded-full bg-<?= $t[4] ?> text-primary-700 font-display font-semibold text-sm"><?= $t[3] ?></div>
            <div>
              <div class="font-semibold text-sm text-ink"><?= $t[1] ?></div>
              <div class="text-xs text-muted"><?= $t[2] ?></div>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ─────────────────  PRICING  ───────────────── -->
<section id="prezzi" class="max-w-6xl mx-auto px-6 py-24 md:py-32">
  <div class="text-center max-w-2xl mx-auto mb-14">
    <span class="chip mb-5"><span class="dot"></span> Prezzo</span>
    <h2 class="h-display text-4xl md:text-5xl">Un piano. <span class="hl-cream">Tutto incluso.</span></h2>
    <p class="mt-5 text-lg text-body">Niente trabocchetti, niente costi nascosti, niente tier "Enterprise" assurdi.</p>
  </div>

  <div class="max-w-2xl mx-auto">
    <div class="card p-10 md:p-12 shadow-lift relative overflow-hidden">
      <div class="absolute -top-12 -right-12 w-56 h-56 bg-primary-500/10 rounded-full blur-3xl"></div>

      <div class="relative">
        <div class="flex items-start justify-between flex-wrap gap-4 mb-8">
          <div>
            <span class="chip mb-3"><span class="dot"></span> ReviewBoost Pro</span>
            <h3 class="h-display text-3xl">Tutto, sempre, per tutti i tuoi clienti.</h3>
          </div>
          <div class="text-right">
            <div class="flex items-baseline gap-1 justify-end">
              <span class="h-display text-6xl">50</span>
              <span class="font-display text-3xl">€</span>
            </div>
            <div class="text-sm text-muted">/ mese · IVA inclusa</div>
          </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-x-6 gap-y-3 mb-8">
          <?php
          $included = [
            'Clienti illimitati',
            'Sondaggio personalizzato',
            'Recupero feedback negativi',
            'Statistiche e grafici',
            'Multi-utente (titolare + receptionist)',
            'Supporto WhatsApp dedicato',
            'Aggiornamenti automatici',
            'Backup giornalieri',
          ];
          foreach ($included as $i): ?>
            <div class="flex items-center gap-2.5 text-sm">
              <svg class="w-4 h-4 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              <span class="text-body"><?= $i ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="bg-mint rounded-2xl p-5 border border-primary-100 mb-7 flex items-center gap-4">
          <div class="grid place-items-center w-10 h-10 rounded-full bg-primary-500 text-white flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.32.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/></svg>
          </div>
          <div>
            <div class="font-semibold text-ink">14 giorni gratis</div>
            <div class="text-sm text-body">Carta di credito richiesta solo all'attivazione. Niente addebiti per i primi 14 giorni. Disdici quando vuoi.</div>
          </div>
        </div>

        <a href="tel:+390000000000" class="btn-primary w-full justify-center text-base py-4">
          Chiamaci e parti oggi
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─────────────────  FAQ  ───────────────── -->
<section id="faq" class="bg-bone py-24 md:py-32 border-y border-line">
  <div class="max-w-3xl mx-auto px-6">
    <div class="text-center mb-12">
      <span class="chip mb-5"><span class="dot"></span> Domande frequenti</span>
      <h2 class="h-display text-4xl md:text-5xl">Le risposte che cercavi.</h2>
    </div>

    <div>
      <details class="faq" open>
        <summary>Devo installare qualcosa?</summary>
        <p>No, niente. Apri il sito, fai login, sei dentro. Funziona da computer, tablet o telefono. La receptionist usa quello che ha sotto mano.</p>
      </details>
      <details class="faq">
        <summary>Quanto ci mette ad essere operativo?</summary>
        <p>Una telefonata di 15 minuti per spiegarti come funziona, poi configuriamo insieme il tuo sondaggio. Sei online entro la giornata.</p>
      </details>
      <details class="faq">
        <summary>I miei clienti devono installare app?</summary>
        <p>Assolutamente no. Ricevono un WhatsApp normale con un link. Cliccano, vedono una pagina web semplice con 5 stelline, scelgono. Fine.</p>
      </details>
      <details class="faq">
        <summary>Cosa succede se un cliente è scontento?</summary>
        <p>Se mette meno di 5 stelle, il sistema NON lo manda su Google. Gli chiede invece di scrivere cosa non è andato — quel feedback arriva direttamente a te in mail. Hai 24 ore per chiamarlo e recuperarlo prima che ne parli con qualcun altro.</p>
      </details>
      <details class="faq">
        <summary>Posso disdire quando voglio?</summary>
        <p>Sì, in qualsiasi momento, dalla tua area. Niente penali, niente vincoli. Se disdici durante i 14 giorni di prova non ti viene addebitato nulla.</p>
      </details>
      <details class="faq">
        <summary>I dati dei miei clienti sono al sicuro?</summary>
        <p>Sì. Ogni centro vede solo i propri dati, server in Italia, backup giornalieri, tutto in linea col GDPR. I numeri di telefono non vengono mai venduti né condivisi.</p>
      </details>
    </div>
  </div>
</section>

<!-- ─────────────────  CTA FINALE  ───────────────── -->
<section class="max-w-6xl mx-auto px-6 py-24 md:py-32">
  <div class="card-soft p-10 md:p-16 text-center relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-72 h-72 bg-primary-500/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-cream rounded-full blur-3xl"></div>

    <div class="relative">
      <span class="chip mb-6"><span class="dot"></span> Pronti in 24h</span>
      <h2 class="h-display text-4xl md:text-6xl max-w-3xl mx-auto">
        Una telefonata. <span class="hl-mint">Sei online stasera.</span>
      </h2>
      <p class="mt-6 text-lg text-body max-w-xl mx-auto">14 giorni gratuiti, senza vincoli. Ti spieghiamo come funziona, configuriamo tutto, ti accompagniamo.</p>

      <div class="mt-9 inline-flex flex-col items-center">
        <a href="tel:+390000000000" class="font-display text-4xl md:text-5xl text-primary-600 hover:text-primary-700 font-medium tracking-tightest">
          +39 XXX XXX XXXX
        </a>
        <span class="text-sm text-muted mt-1">Lun–Ven 9:00 — 19:00 · Risposta entro 1h</span>
      </div>
    </div>
  </div>
</section>

<?php layout_foot();

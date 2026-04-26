<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/layout.php';
layout_head('Più recensioni Google a 5 stelle, ogni giorno', true);
?>

<!-- ─────────────────  HERO MANIFESTO  ───────────────── -->
<section class="max-w-7xl mx-auto px-6 pt-12 md:pt-20 pb-20 md:pb-28">
  <div class="flex items-center gap-3 mb-10 rise d1">
    <span class="font-mono text-xs uppercase tracking-[0.3em] text-bottle-600">Volume 01</span>
    <span class="h-px flex-1 bg-ink/20"></span>
    <span class="font-mono text-xs uppercase tracking-[0.3em] text-ink/50">Numero unico</span>
  </div>

  <h1 class="font-display font-light tracking-tightest leading-[0.92] text-ink">
    <span class="block text-7xl md:text-[10rem] rise d2">Più <span class="italic font-normal text-bottle-600">stelle</span>.</span>
    <span class="block text-7xl md:text-[10rem] pl-0 md:pl-32 -mt-2 md:-mt-6 rise d3">Più <em class="italic font-normal text-bottle-600">clienti</em>.</span>
    <span class="block text-7xl md:text-[10rem] -mt-2 md:-mt-6 rise d4">
      <span class="relative inline-block">
        Stop
        <svg class="absolute -right-10 md:-right-20 -top-4 md:-top-8 w-12 md:w-24 h-12 md:h-24 text-gold" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .8l3 7.5 8.2.6-6.3 5.3 2 8-6.9-4.5L5 22l2-8L.8 8.9l8.2-.6z"/></svg>
      </span>.
    </span>
  </h1>

  <div class="grid md:grid-cols-12 gap-6 mt-16 md:mt-24">
    <p class="md:col-span-7 md:col-start-2 font-display text-2xl md:text-3xl leading-snug text-ink/80 rise d5">
      Il tuo cliente esce contento. <em class="italic text-bottle-600">Tu glielo ricordi.</em>
      In un click, parte un WhatsApp con il sondaggio. Le 5 stelle volano su Google. Le lamentele restano private — e arrivano dritte al titolare.
    </p>
    <div class="md:col-span-3 md:col-start-10 flex flex-col items-start md:items-end justify-end gap-3 rise d6">
      <p class="font-mono text-xs uppercase tracking-[0.25em] text-ink/50">Per attivare</p>
      <a href="tel:+390000000000" class="font-display text-3xl md:text-4xl font-medium text-bottle-600 hover:text-bottle-800 leading-none transition">
        +39 XXX&nbsp;XXX&nbsp;XXXX
      </a>
      <p class="font-mono text-xs text-ink/40">Risposta in giornata</p>
    </div>
  </div>
</section>

<!-- ─────────────────  FASCIA NUMERI  ───────────────── -->
<section class="bg-bottle-700 text-cream relative overflow-hidden">
  <div class="absolute inset-0 opacity-10" style="background-image: repeating-linear-gradient(45deg, transparent 0 16px, rgba(255,203,31,.4) 16px 17px);"></div>
  <div class="relative max-w-7xl mx-auto px-6 py-16 md:py-24 grid md:grid-cols-3 gap-10 md:gap-6">
    <div>
      <p class="font-mono text-xs uppercase tracking-[0.25em] text-cream/60 mb-3">01 — Aumento medio</p>
      <p class="font-display text-7xl md:text-8xl font-light leading-none">+47<span class="text-gold">%</span></p>
      <p class="font-display italic text-xl mt-4 text-cream/85">recensioni Google in tre mesi.</p>
    </div>
    <div class="md:border-l md:border-r md:border-cream/15 md:px-10">
      <p class="font-mono text-xs uppercase tracking-[0.25em] text-cream/60 mb-3">02 — Prova</p>
      <p class="font-display text-7xl md:text-8xl font-light leading-none">14<span class="text-gold italic">gg</span></p>
      <p class="font-display italic text-xl mt-4 text-cream/85">gratis, senza sorprese.</p>
    </div>
    <div>
      <p class="font-mono text-xs uppercase tracking-[0.25em] text-cream/60 mb-3">03 — Investimento</p>
      <p class="font-display text-7xl md:text-8xl font-light leading-none">50<span class="text-gold">€</span><span class="text-cream/50 text-3xl align-top ml-1">/mese</span></p>
      <p class="font-display italic text-xl mt-4 text-cream/85">disdici quando vuoi, davvero.</p>
    </div>
  </div>
</section>

<!-- ─────────────────  COME FUNZIONA  ───────────────── -->
<section id="come-funziona" class="max-w-7xl mx-auto px-6 py-24 md:py-32 relative">
  <div class="flex items-baseline gap-4 mb-16">
    <span class="font-mono text-xs uppercase tracking-[0.3em] text-bottle-600">§</span>
    <h2 class="font-display text-4xl md:text-5xl font-medium tracking-tightest">Come funziona, davvero.</h2>
  </div>

  <div class="grid md:grid-cols-12 gap-y-20 gap-x-8">
    <!-- step 1 -->
    <article class="md:col-span-5">
      <p class="font-display text-[10rem] md:text-[14rem] font-light leading-none text-bottle-600/15 -mb-12 md:-mb-20 select-none">01</p>
      <h3 class="font-display text-3xl md:text-4xl leading-tight">
        Carichi i clienti del giorno.
      </h3>
      <p class="mt-4 text-lg text-ink/75 max-w-md">
        Incolli la lista nella dashboard o trascini un file CSV. Bastano nome e numero WhatsApp. Trenta secondi.
      </p>
    </article>

    <!-- step 2 -->
    <article class="md:col-span-6 md:col-start-7 md:mt-32">
      <p class="font-display text-[10rem] md:text-[14rem] font-light leading-none text-bottle-600/15 -mb-12 md:-mb-20 select-none text-right">02</p>
      <h3 class="font-display text-3xl md:text-4xl leading-tight md:text-right">
        La receptionist <em class="italic text-bottle-600">clicca</em>.
      </h3>
      <p class="mt-4 text-lg text-ink/75 md:text-right md:ml-auto max-w-md">
        Un bottone WhatsApp accanto a ogni nome. Si apre la chat con il messaggio già scritto, il link al sondaggio già personalizzato. Lei lo manda. Fine.
      </p>
    </article>

    <!-- step 3 -->
    <article class="md:col-span-7 md:col-start-3 md:mt-16">
      <p class="font-display text-[10rem] md:text-[14rem] font-light leading-none text-bottle-600/15 -mb-12 md:-mb-20 select-none">03</p>
      <h3 class="font-display text-3xl md:text-4xl leading-tight">
        Le 5 stelle vanno su Google.<br>
        <span class="italic text-bottle-600">Le lamentele restano qui.</span>
      </h3>
      <p class="mt-4 text-lg text-ink/75 max-w-2xl">
        Chi ha amato il servizio lascia una recensione su Google e riceve in cambio il regalo che hai scelto. Chi non era convinto scrive a te in privato — e tu hai 24 ore per recuperarlo prima che ne parli con qualcun altro.
      </p>
    </article>
  </div>
</section>

<!-- ─────────────────  PER CHI È  ───────────────── -->
<section class="bg-ink text-cream py-24 md:py-32">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex items-baseline gap-4 mb-16">
      <span class="font-mono text-xs uppercase tracking-[0.3em] text-gold">Indice</span>
      <h2 class="font-display text-4xl md:text-5xl font-light tracking-tightest">
        Per chi è. <em class="italic text-gold">E per chi non è.</em>
      </h2>
    </div>

    <ul class="font-display text-3xl md:text-5xl font-light leading-[1.15] divide-y divide-cream/10">
      <li class="py-5 md:py-6 flex items-baseline gap-6 group">
        <span class="font-mono text-sm text-gold tracking-widest">I.</span>
        <span class="flex-1">Centri estetici e <em class="italic text-gold">SPA</em></span>
        <span class="font-mono text-xs text-cream/40 hidden md:inline">— bellezza</span>
      </li>
      <li class="py-5 md:py-6 flex items-baseline gap-6">
        <span class="font-mono text-sm text-gold tracking-widest">II.</span>
        <span class="flex-1">Parrucchieri & <em class="italic">barber shop</em></span>
        <span class="font-mono text-xs text-cream/40 hidden md:inline">— stile</span>
      </li>
      <li class="py-5 md:py-6 flex items-baseline gap-6">
        <span class="font-mono text-sm text-gold tracking-widest">III.</span>
        <span class="flex-1">Ristoranti e <em class="italic">trattorie</em></span>
        <span class="font-mono text-xs text-cream/40 hidden md:inline">— ospitalità</span>
      </li>
      <li class="py-5 md:py-6 flex items-baseline gap-6">
        <span class="font-mono text-sm text-gold tracking-widest">IV.</span>
        <span class="flex-1">Studi <em class="italic text-gold">dentistici</em> e medici</span>
        <span class="font-mono text-xs text-cream/40 hidden md:inline">— cura</span>
      </li>
      <li class="py-5 md:py-6 flex items-baseline gap-6">
        <span class="font-mono text-sm text-gold tracking-widest">V.</span>
        <span class="flex-1">Chiunque abbia clienti che <em class="italic">escono soddisfatti</em>.</span>
      </li>
    </ul>

    <p class="mt-12 font-display italic text-xl text-cream/60 max-w-xl">
      Se i tuoi clienti escono indifferenti, ReviewBoost non ti salverà. Lavora <em class="not-italic font-medium">sopra</em> un buon servizio, non al posto suo.
    </p>
  </div>
</section>

<!-- ─────────────────  MANIFESTO FINALE  ───────────────── -->
<section class="max-w-7xl mx-auto px-6 py-24 md:py-40">
  <div class="grid md:grid-cols-12 gap-8 items-end">
    <div class="md:col-span-7">
      <p class="font-mono text-xs uppercase tracking-[0.3em] text-bottle-600 mb-6">Si comincia così</p>
      <h2 class="font-display text-6xl md:text-8xl leading-[0.95] tracking-tightest">
        Una<br>
        <em class="italic text-bottle-600">telefonata</em>.<br>
        E sei dentro.
      </h2>
    </div>
    <div class="md:col-span-5 border-l border-ink/15 pl-8 py-4">
      <p class="font-mono text-xs uppercase tracking-[0.25em] text-ink/50 mb-3">Numero diretto</p>
      <a href="tel:+390000000000" class="font-display text-4xl md:text-6xl text-bottle-600 hover:text-bottle-800 leading-none block transition">
        +39<br>
        XXX<br>
        XXX&nbsp;XXXX
      </a>
      <p class="mt-6 font-display italic text-lg text-ink/60">
        Ti spieghiamo come funziona, attiviamo i 14 giorni gratuiti, sei online stasera.
      </p>
    </div>
  </div>
</section>

<?php layout_foot();

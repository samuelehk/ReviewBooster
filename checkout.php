<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/layout.php';

$user = require_login();
if (($user['role'] ?? null) === 'super_admin') { header('Location: /super/'); exit; }

layout_head('Attiva la prova gratuita');
?>

<section class="relative min-h-[calc(100vh-160px)] flex items-center justify-center px-6 py-16">
  <div class="absolute inset-0 grid-bg [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,#000_30%,transparent_100%)]"></div>
  <div class="absolute inset-0 radial-spot opacity-60"></div>

  <div class="relative w-full max-w-2xl">
    <div class="text-center mb-8 rise d1">
      <div class="chip mx-auto mb-4"><span class="dot pulse-dot"></span>Step 2 di 2 · Pagamento</div>
      <h1 class="h-display text-3xl md:text-4xl">Attiva i 14 giorni gratis.</h1>
      <p class="text-muted mt-2 text-sm">Niente addebito per i primi 14 giorni. Disdici quando vuoi dalla tua area.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-5">
      <!-- Riepilogo a sinistra -->
      <div class="card-soft p-6 md:col-span-1 rise d2">
        <div class="text-xs font-mono uppercase tracking-widest text-faint mb-4">Riepilogo</div>
        <div class="space-y-3 text-sm">
          <div class="flex justify-between">
            <span class="text-muted">Piano</span>
            <span class="font-medium">ReviewBoost Pro</span>
          </div>
          <div class="flex justify-between">
            <span class="text-muted">Prova</span>
            <span class="text-accent-500 font-medium">14 giorni · 0€</span>
          </div>
          <div class="flex justify-between">
            <span class="text-muted">Poi</span>
            <span class="font-medium">50€/mese</span>
          </div>
        </div>
        <div class="border-t border-edge mt-5 pt-5 space-y-2 text-xs text-muted">
          <div class="flex items-center gap-2">
            <svg class="w-3.5 h-3.5 text-accent-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            Disdici in qualsiasi momento
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-3.5 h-3.5 text-accent-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            Nessun vincolo contrattuale
          </div>
          <div class="flex items-center gap-2">
            <svg class="w-3.5 h-3.5 text-accent-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            Pagamento sicuro Stripe
          </div>
        </div>
      </div>

      <!-- Pagamento -->
      <div class="card-soft p-7 md:col-span-2 rise d3">
        <div class="text-xs font-mono uppercase tracking-widest text-muted mb-4">Dati carta</div>
        <div class="rounded-xl bg-canvas border border-edge p-8 text-center">
          <div class="w-12 h-12 mx-auto rounded-full bg-elev grid place-items-center mb-4">
            <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/></svg>
          </div>
          <p class="text-sm text-muted">Modulo di pagamento Stripe</p>
          <p class="text-xs text-faint font-mono mt-1">Integrazione in arrivo</p>
        </div>
        <button disabled class="btn-primary w-full justify-center mt-5 opacity-40 cursor-not-allowed">
          Attiva 14 giorni gratuiti
        </button>
        <p class="text-[11px] text-faint mt-3 text-center font-mono">Pagamento sicuro · Crittografato 256-bit · Stripe</p>

        <div class="mt-7 pt-5 border-t border-edge">
          <div class="flex items-center gap-2 mb-2">
            <span class="text-[10px] font-mono uppercase tracking-widest text-gold bg-gold/10 px-2 py-0.5 rounded">Modalità sviluppo</span>
          </div>
          <a href="/admin/" class="text-sm text-muted hover:text-ink underline-offset-4 hover:underline inline-flex items-center gap-1.5">
            Salta il pagamento ed entra nell'area
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php layout_foot();

<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/layout.php';

$user = require_login();
if (($user['role'] ?? null) === 'super_admin') { header('Location: /super/'); exit; }

layout_head('Attiva la prova gratuita');
?>

<div class="max-w-lg mx-auto bg-white rounded-lg shadow-sm p-8 mt-4 relative">
  <h1 class="text-2xl font-bold mb-2">Attiva i tuoi 14 giorni gratis</h1>
  <p class="text-gray-600 text-sm mb-6">
    Inserisci una carta di credito per attivare la prova. <strong>Non verrà addebitato nulla per 14 giorni.</strong>
    Puoi annullare in qualsiasi momento dalla tua area.
  </p>

  <div class="bg-gray-50 border rounded p-6 text-center text-gray-500">
    <p class="text-sm">[Qui apparirà il modulo di pagamento Stripe]</p>
    <p class="text-xs mt-2">Integrazione Stripe in arrivo</p>
  </div>

  <button disabled class="mt-4 w-full bg-brand-600 text-white py-2.5 rounded font-medium opacity-60 cursor-not-allowed">
    Attiva prova gratuita di 14 giorni
  </button>
  <p class="text-xs text-gray-500 mt-2 text-center">50€/mese al termine della prova. Disdici quando vuoi.</p>

  <div class="mt-8 pt-6 border-t text-center">
    <p class="text-xs text-amber-700 mb-2">⚙️ Modalità sviluppo</p>
    <a href="/admin/" class="text-sm text-gray-700 hover:text-gray-900 underline">
      Salta il pagamento ed entra nell'area →
    </a>
  </div>
</div>

<?php layout_foot();

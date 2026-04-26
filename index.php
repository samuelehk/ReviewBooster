<?php
require __DIR__ . '/includes/auth.php';
require __DIR__ . '/includes/layout.php';
layout_head('Più recensioni Google, ogni giorno', true);
?>

<section class="text-center py-16">
  <h1 class="text-4xl md:text-5xl font-bold tracking-tight">
    Più recensioni Google a 5 stelle.<br>
    <span class="text-brand-600">Ogni giorno. In automatico.</span>
  </h1>
  <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">
    ReviewBoost trasforma i tuoi clienti soddisfatti in recensioni Google. La tua receptionist clicca un bottone, parte un WhatsApp, il cliente lascia una recensione. Semplice.
  </p>
  <div class="mt-8 flex items-center justify-center gap-3">
    <a href="#come-funziona" class="bg-brand-600 hover:bg-brand-700 text-white px-6 py-3 rounded-lg font-medium">
      Scopri come funziona
    </a>
  </div>
  <p class="mt-3 text-sm text-gray-500">Per attivare il servizio chiama il numero <strong>+39 XXX XXX XXXX</strong></p>
</section>

<section id="come-funziona" class="grid md:grid-cols-3 gap-6 py-12">
  <div class="bg-white p-6 rounded-lg shadow-sm">
    <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-700 grid place-items-center font-bold mb-3">1</div>
    <h3 class="font-bold text-lg">Carichi i clienti del giorno</h3>
    <p class="mt-2 text-gray-600 text-sm">Incolli la lista o carichi un CSV. Bastano nome e numero WhatsApp.</p>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-sm">
    <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-700 grid place-items-center font-bold mb-3">2</div>
    <h3 class="font-bold text-lg">La receptionist clicca</h3>
    <p class="mt-2 text-gray-600 text-sm">Un bottone WhatsApp accanto a ogni nome. Apre la chat con il messaggio già scritto.</p>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-sm">
    <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-700 grid place-items-center font-bold mb-3">3</div>
    <h3 class="font-bold text-lg">Le 5 stelle vanno su Google</h3>
    <p class="mt-2 text-gray-600 text-sm">Chi è soddisfatto lascia recensione + riceve il regalo. Chi è scontento lo sai solo tu.</p>
  </div>
</section>

<section class="bg-white rounded-lg shadow-sm p-8 my-8 text-center">
  <h2 class="text-2xl font-bold">Per chi è ReviewBoost</h2>
  <p class="mt-3 text-gray-600">Centri estetici · Parrucchieri · Ristoranti · Dentisti · Studi medici · Chiunque abbia clienti che escono soddisfatti.</p>
</section>

<section class="text-center py-12">
  <h2 class="text-3xl font-bold">Pronto a partire?</h2>
  <p class="mt-3 text-gray-600">Chiamaci per attivare la prova gratuita di 14 giorni.</p>
  <p class="mt-6 text-2xl font-bold text-brand-700">+39 XXX XXX XXXX</p>
</section>

<?php layout_foot();

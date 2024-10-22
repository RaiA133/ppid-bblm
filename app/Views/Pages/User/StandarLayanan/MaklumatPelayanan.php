<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<!-- Judul Halaman Maklumat Pelayanan -->
<div class="flex flex-col items-center">
  <section class="flex justify-center w-full" data-scroll>
    <div class="h-full w-fit shadow-xl rounded-xl">
      <!-- Dynamic Heading -->
      <h2 class="text-2xl font-semibold mb-4 text-center">
        Maklumat Pelayanan
      </h2>

      <!-- Dynamic Image -->
      <figure class="lg:w-auto p-0 md:p-10">
        <img class="w-full max-w-3xl h-auto mx-auto"
          src="<?= esc(base_url('img/standarLayanan/' . ($results['gambar_maklumat'] ?? ''))) ?>"
          alt="Maklumat Pelayanan" />
      </figure>
    </div>
  </section>
</div>

<?php $this->endSection(); ?>
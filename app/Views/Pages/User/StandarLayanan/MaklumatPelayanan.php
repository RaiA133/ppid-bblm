<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<!-- Judul Halaman Maklumat Pelayanan -->
<div class="flex flex-col items-center">
  <section class="flex justify-center w-full" data-scroll>
    <div class="h-full w-fit shadow-xl rounded-xl">
      <!-- Dynamic Heading -->
      <h2 class="text-2xl font-semibold mb-4 text-center">
        <?= esc($results['judul_maklumat'] ?? 'Maklumat Pelayanan') ?>
      </h2>

      <!-- Dynamic Image -->
      <figure class="lg:w-auto p-0 md:p-10">
        <img class="w-full max-w-3xl h-auto mx-auto"
          src="<?= esc(base_url('img/standarLayanan/' . ($results['gambar_maklumat'] ?? 'MaklumatPelayanan.png'))) ?>"
          alt="Maklumat Pelayanan" />
      </figure>
    </div>
  </section>

  <!-- Additional Dynamic Content -->
  <?php
  $additionalContent = json_decode($results['additional_content'] ?? '[]');
  ?>

  <div class="p-6">
    <?php if (!empty($additionalContent)) : ?>
      <ul class="list-disc list-inside space-y-4">
        <?php foreach ($additionalContent as $content) : ?>
          <li><?= esc($content) ?></li>
        <?php endforeach; ?>
      </ul>
    <?php else : ?>
      <p>Informasi tambahan.</p>
    <?php endif; ?>
  </div>
</div>

<?php $this->endSection(); ?>
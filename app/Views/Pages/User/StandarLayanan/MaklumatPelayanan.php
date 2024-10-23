<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<!-- Judul Halaman Maklumat Pelayanan -->
<div class="flex flex-col items-center">
  <section class="flex justify-center w-full" data-scroll>
    <div class="h-full w-fit shadow-xl rounded-xl">
      <h2 class="text-2xl font-semibold mb-4 text-center">Maklumat Pelayanan</h2>
      <?= $results['content'] ?>
    </div>
  </section>
</div>

<!-- CONTENT -->
<!-- <?php if (!empty($results['content'])) : ?>
  <?= $results['content'] ?>
<?php else : ?>
  <li class="text-xs">-</li>
<?php endif; ?> -->

<?php $this->endSection(); ?>
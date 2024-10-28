<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<!-- CONTENT -->
<div class="flex flex-col items-center p-10">
  <section class="flex justify-center w-full" data-scroll>
    <div class="h-full w-fit shadow-xl rounded-xl">
      <h2 class="text-2xl font-semibold mb-4 text-center">Maklumat Pelayanan</h2>
      <?php if (!empty($results['content'])) : ?>
        <?= $results['content'] ?>
      <?php else : ?>
        <li class="text-xs">-</li>
      <?php endif; ?>
    </div>
  </section>
</div>

<?php $this->endSection(); ?>
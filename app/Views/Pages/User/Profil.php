<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<!-- Hero -->
<section class="relative h-screen w-full bg-neutral flex items-center justify-center">
  <!-- Background Image -->
  <img src="<?= base_url() ?>img/profile/<?= $results['link_gambar'] ?? '-' ?>" alt="Profile Background" class="absolute w-auto h-full object-cover z-0">

  <!-- Content Wrapper for Flexbox -->
  <div class="relative z-10 w-full flex flex-col md:flex-row justify-between p-8 md:p-9 h-full bg-gradient-to-t from-black from-10% via-transparent via-30%  to-transparent to-90%">

    <!-- Left Content (Name and Position) -->
    <div class="text-white my-auto mb-8 md:mb-0">
      <h1 class="text-base md:text-lg lg:text-xl font-bold mb-6"><?= $results['nama'] ?? '-' ?></h1>
      <h2 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-2 leading-tight w- 9/12 sm:w-2/3"><?= $results['judul'] ?? '-' ?></h2>
    </div>

    <?php
    $latarBelakangPendidikan = json_decode($results['latar_belakang_pendidikan'] ?? '[]');
    $penghargaan = json_decode($results['penghargaan'] ?? '[]');
    $content = json_decode($results['content'] ?? '[]');
    ?>

    <!-- Right Content (Educational Background and Awards) -->
    <div class="text-white text-left self-end h-fit">
      <h3 class="text-sm mb-4 font-bold">Latar Belakang Pendidikan:</h3>
      <ul class="list-disc list-inside mb-4 space-y-2">
        <?php if (!empty($latarBelakangPendidikan)) : ?>
          <?php foreach (json_decode($results['latar_belakang_pendidikan']) as $list_latar_belakang) : ?>
            <li class="text-xs"><?= $list_latar_belakang ?></li>
          <?php endforeach ?>
        <?php else : ?>
          <li class="text-xs">-</li>
        <?php endif; ?>
      </ul>
      <h3 class="text-sm font-bold">Penghargaan:</h3>
      <ul class="list-disc list-inside mb-4 space-y-2">
        <?php if (!empty($penghargaan)) : ?>
          <?php foreach (json_decode($results['penghargaan']) as $list_penghargaan) : ?>
            <li class="text-xs"><?= $list_penghargaan ?></li>
          <?php endforeach ?>
        <?php else : ?>
          <li class="text-xs">-</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</section>

<!-- CONTENT -->
<section class="p-7 m-7 card bg-base-100" data-scroll data-scroll-speed="2">
  <div data-scroll data-scroll-speed="1">
    <?php if (!empty($content)) : ?>
      <?php foreach (json_decode($results['content']) as $list_content) : ?>
        <?= $list_content ?>
      <?php endforeach ?>
    <?php else : ?>
      <li class="text-xs">-</li>
    <?php endif; ?>
  </div>
</section>

<?php $this->endSection(); ?>
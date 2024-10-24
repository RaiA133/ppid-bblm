<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<section class="flex flex-col mx-10" id="header-profil">
  <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Informasi Setiap Saat</div>
  <div class="divider"></div>
</section>

<section class="mx-10 mb-10 flex justify-center" data-scroll data-scroll-speed="5">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 w-full justify-center">

    <!-- Iterasi melalui judul informasi setiap saat -->
    <?php foreach ($judulInformasiSetiapSaat as $judul) : ?>
      <div class="card h-fit mb-3 bg-neutral rounded-xl">
        <ul class="menu max-w-full shadow-lg text-neutral-content">
          <!-- Menampilkan judul utama -->
          <li class="menu-title text-center text-neutral-content"><?= $judul['judul'] ?></li>
          <div class="divider before:bg-primary after:bg-secondary my-0"></div>

          <!-- Iterasi melalui informasi yang sesuai dengan judul saat ini -->
          <?php 
          // Menyaring informasi yang sesuai dengan id judul
          $filteredInformasi = array_filter($informasiSetiapSaat, function($informasi) use ($judul) {
              return $informasi['id_informasi_setiap_saat_judul'] == $judul['id_informasi_setiap_saat_judul'];
          });
          ?>

          <!-- Menampilkan list informasi yang sesuai -->
          <?php foreach ($filteredInformasi as $informasi) : ?>
            <li class="hover:bg-gray-950"><a target="_blank" href="<?= $informasi['informasi'] ?>"><?= $informasi['jenis_informasi'] ?></a></li>
          <?php endforeach; ?>

        </ul>
      </div>
    <?php endforeach; ?>

  </div>
</section>

<?php $this->endSection(); ?>

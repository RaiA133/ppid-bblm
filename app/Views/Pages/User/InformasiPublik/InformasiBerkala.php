<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<style>
  .table td a {
    text-decoration: underline;
    color: blue;
  }
</style>

<section class="flex flex-col mx-10" id="header-profil">
  <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Informasi Berkala</div>
  <div class="divider"></div>
</section>

<section class="mx-10 h-screen" data-scroll data-scroll-speed="5">

  <link rel="stylesheet" href="<?= base_url() ?>src/carousel/style.css">

  <div class="relative">

    <!-- Left and right buttons -->
    <button id="prevBtn" class="absolute left-5 top-1/2 transform -translate-y-1/2 z-10 bg-base-100 text-neutral text-md font-bold shadow-md rounded-full p-2 sm:p-5 px-3 sm:px-6">←</button>
    <button id="nextBtn" class="absolute right-5 top-1/2 transform -translate-y-1/2 z-10 bg-base-100 text-neutral text-md font-bold shadow-md rounded-full p-2 sm:p-5 px-3 sm:px-6">→</button>

    <!-- Carousel container -->
    <div id="carousel" class="flex gap-6 w-full overflow-x-auto scroll-smooth snap-x snap-mandatory cursor-grab">

      <?php $no = 1; ?>
      <?php foreach ($judulInformasiBerkala as $judul) : ?>
        <a id="card_carousel" class="flex-shrink-0 snap-center w-full md:w-[500px] xl:w-[700px]" onclick="informasiBerkalaModal<?= $judul['id_informasi_berkala_judul'] ?>.showModal()">
          <div class="card hover:shadow-2xl hover:pb-3 hover:bg-base-200 bg-neutral hover:text-stone-900 text-neutral-content transition-all rounded-xl">
            <div class="p-5">
              <h2 class="card-title text-7xl sm:text-[100px] mb-6 sm:mb-10">00<?= $no++ ?></h2>
              <div class="h-96 flex items-end">
                <div class="text-6xl sm:text-7xl"><?= $judul['judul'] ?></div>
              </div>
            </div>
          </div>
        </a>

        <dialog id="informasiBerkalaModal<?= $judul['id_informasi_berkala_judul'] ?>" class="modal modal-bottom sm:modal-middle">
          <div class="modal-box sm:w-11/12 sm:max-w-5xl">
            <h3 class="text-lg font-bold"><?= $judul['judul'] ?></h3>
            <ul class="py-4">
              <?php
              $filteredInformasi = array_filter($informasiBerkala, function ($info) use ($judul) {
                return $info['id_informasi_berkala_judul'] == $judul['id_informasi_berkala_judul'];
              });
              ?>

              <div class="overflow-x-auto">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Jenis Dokumen</th>
                      <th>Dokumen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $noInfo = 1; ?>
                    <?php foreach ($filteredInformasi as $info) : ?>
                      <tr class="hover">
                        <th><?= $noInfo++ ?></th>
                        <td><?= $info['jenis_informasi'] ?></td>
                        <td><?= $info['informasi'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

            </ul>
            <div class="modal-action">
              <form method="dialog">
                <button class="btn">Close</button>
              </form>
            </div>
          </div>
        </dialog>

      <?php endforeach; ?>


    </div>

    <!-- Dots indicator -->
    <div id="dots" class="flex sm:hidden justify-center mt-4 space-x-2"></div>

  </div>

  <script src="<?= base_url() ?>src/carousel/script.js"></script>

</section>

<?php $this->endSection(); ?>
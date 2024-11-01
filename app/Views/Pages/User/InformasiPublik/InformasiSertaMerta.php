<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<section class="flex flex-col mx-10" id="header-profil">
  <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Informasi Serta Merta</div>
  <div class="divider"></div>
</section>

<section class="mx-10 mt-10" data-scroll data-scroll-speed="3">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 w-full justify-center">

    <div class="card h-fit mb-3">
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Judul</li>
        <div class="divider"></div>
        <li><a href="">Link</a></li>
        <li><a href="">Link</a></li>
        <li><a href="">Link</a></li>
      </ul>
    </div>

    <div class="card h-fit mb-3">
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Judul</li>
        <div class="divider"></div>
        <li><a href="">Link</a></li>
        <li><a href="">Link</a></li>
        <li><a href="">Link</a></li>
      </ul>
    </div>

    <div class="card h-fit mb-3">
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Judul</li>
        <div class="divider"></div>
        <li><a href="">Link</a></li>
        <li><a href="">Link</a></li>
        <li><a href="">Link</a></li>
      </ul>
    </div>

  </div>
</section>

<section>
  <div data-scroll data-scroll-speed="5" class="mb-10 w-full flex justify-center">
    <a class="relative group py-1.5 px-2.5 text-neutral-content-950 text-4xl ml-4" href="<?= base_url() ?>">
      <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-neutral-500  transition-all duration-300 group-hover:w-full"></span>
      Kembali ke Home
    </a>
  </div>
</section>

<?php $this->endSection(); ?>
<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<section class="flex flex-col mx-10" id="header-profil">
  <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Informasi Serta Merta</div>
  <div class="divider"></div>
</section>

<section class="mx-10">
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

<?php $this->endSection(); ?>
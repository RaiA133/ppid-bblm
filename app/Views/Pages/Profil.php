<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="mx-10 h-screen">
  <div class="flex flex-col" id="header-profil">
    <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Halaman Profil</div>
    <div class="divider"></div>
  </div>

  <div class="w-full flex justify-center">
    <div class="dropdown absolute dropdown-left">
      <div tabindex="0" role="button" class="btn m-1">Click</div>
      <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
        <li><a>Item 1</a></li>
        <li><a>Item 2</a></li>
      </ul>
    </div>
  </div>
  
</div>

<?php $this->endSection(); ?>
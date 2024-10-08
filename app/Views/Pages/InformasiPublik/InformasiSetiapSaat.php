<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<section class="flex flex-col mx-10" id="header-profil">
  <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Informasi Setiap Saat</div>
  <div class="divider"></div>
</section>

<section class="mx-10 flex justify-center" data-scroll data-scroll-speed="5">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 w-full justify-center">

    <div class="card h-fit mb-3"> 
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Brosur Pelayanan Jasa BBSPJILM</li>
        <div class="divider"></div>
        <li><a href="">Lab Kalibrasi</a></li>
        <li><a href="">Lab Pengujian</a></li>
        <li><a href="">Sertifikasi Produk</a></li>
        <li><a href="">Pelatihan Teknis</a></li>
        <li><a href="">Workshop Pengelasan</a></li>
        <li><a href="">Workshop Pemesinan</a></li>
        <li><a href="">Workshop Pengecoran</a></li>
        <li><a href="">Printer 3D</a></li>
        <li><a href="">Mesin CNC</a></li>
        <li><a href="">Mesin Pakan Ikan</a></li>
      </ul>
    </div>

    <div class="card h-fit mb-3">
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Jurnal Metal Indonesia</li>
        <div class="divider"></div>
        <li><a href="">Link</a></li>
      </ul>
    </div>

    <div class="card h-fit mb-3">
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Standar Pelayanan, SPM dan Tarif Layanan BBSPJILM</li>
        <div class="divider"></div>
        <li><a href="">PP No 54 Tahun 2021</a></li>
        <li><a href="">Permenperin No. 19 Tahun 2021 </a></li>
        <li><a href="">PMK No. 108/PMK.02/2022 Tentang Jenis dan Tarif PNBP yang Bersifat Volatil yang Berlaku pada Kementerian Perindustrian</a></li>
        <li><a href="">SPM Layanan</a></li>
        <li><a href="">Standar Pelayanan Publik</a></li>
        <li><a href="">Standar Layanan Informasi Publik</a></li>
      </ul>
    </div>

    <div class="card h-fit mb-3">
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Perjanjian Kerja Sama</li>
        <div class="divider"></div>
        <li><a href="">Daftar MoU/Perjanjian Kerja Sama</a></li>
      </ul>
    </div>

    <div class="card h-fit mb-3">
      <ul class="menu border rounded-xl max-w-full shadow-lg">
        <li class="menu-title text-center">Prosedur Penanganan Keadaan Darurat</li>
        <div class="divider"></div>
        <li><a href="">Prosedur Evakuasi Tanggap Darurat</a></li>
      </ul>
    </div>

  </div>
</section>

<?php $this->endSection(); ?>
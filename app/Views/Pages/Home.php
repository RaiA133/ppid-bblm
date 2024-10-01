<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col" id="header-home">
  <div data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-home">
    <div class="text-2xl">Halaman Home</div>
    <!-- <div class="divider"></div> -->
  </div>

  <div class="flex flex-col gap-4">

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="1" data-scroll data-scroll-speed="2">
      <div class="flex items-center" data-scroll data-scroll-speed="1">
        <div class="ml-4 my-3">001</div>
        <div class="text-4xl ml-4"><a href="<?= base_url() ?>">Informasi Berkala</a></div>
      </div>
      <div class="mt-4 ml-4 text-justify" data-scroll data-scroll-speed="2">
        informasi berkala tentang kinerja, laporan keuangan, laporan kepegawaian, akses informasi publik, serta dokumen terkait kegiatan dan program instansi dari tahun 2015 hingga Sekarang.
      </div>
    </div>
    
    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="3">
      <div class="flex items-center" data-scroll data-scroll-speed="2">
        <div class="ml-4 my-3">002</div>
        <div class="text-4xl ml-4"><a href="<?= base_url() ?>">Informasi Setiap Saat</a></div>
      </div>
      <div class="mt-4 ml-4 text-justify" data-scroll data-scroll-speed="1">
      informasi setiap saat terkait layanan BBSPJILM, jurnal, standar pelayanan, peraturan tarif, perjanjian kerja sama, serta prosedur penanganan keadaan darurat.
      </div>
    </div>

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="3">
      <div class="flex items-center"  data-scroll data-scroll-speed="1">
        <div class="ml-4 my-3">003</div>
        <div class="text-4xl ml-4"><a href="<?= base_url() ?>">Informai Sertamerta</a></div>
      </div>
      <div class="mt-4 ml-4 text-justify"  data-scroll data-scroll-speed="2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur earum deserunt in. Ipsa maiores adipisci provident vel reiciendis! Praesentium perspiciatis nobis, beatae ut neque sunt cupiditate necessitatibus libero illum dolor.
      </div>
    </div>

  </div>

</div>

<?php $this->endSection(); ?>
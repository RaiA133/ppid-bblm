<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col" id="header-home">
  <div data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-home">
    <div class="text-2xl">Halaman Home</div>
    <div class="divider"></div>
  </div>

  <div class="flex flex-col gap-4">

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="2">
      <div class="flex items-center" data-scroll data-scroll-speed="1">
        <div class="ml-4 my-3">001</div>
        <a class="relative group  py-1.5 px-2.5 text-stone-900 text-4xl ml-4" href="<?= base_url() ?>">
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
          Informasi Berkala
        </a>
      </div>
      <div class="mt-4 ml-4 text-justify" data-scroll data-scroll-speed="2">
        informasi berkala tentang kinerja, laporan keuangan, laporan kepegawaian, akses informasi publik, serta dokumen terkait kegiatan dan program instansi dari tahun 2015 hingga Sekarang.
      </div>
    </div>

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="3">
      <div class="flex items-center" data-scroll data-scroll-speed="2">
        <div class="ml-4 my-3">002</div>
        <a class="relative group  py-1.5 px-2.5 text-stone-900 text-4xl ml-4" href="<?= base_url() ?>">
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
          Informasi Setiap Saat
        </a>
      </div>
      <div class="mt-4 ml-4 text-justify" data-scroll data-scroll-speed="1">
        informasi setiap saat terkait layanan BBSPJILM, jurnal, standar pelayanan, peraturan tarif, perjanjian kerja sama, serta prosedur penanganan keadaan darurat.
      </div>
    </div>

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="3">
      <div class="flex items-center" data-scroll data-scroll-speed="1">
        <div class="ml-4 my-3">003</div>
        <a class="relative group  py-1.5 px-2.5 text-stone-900 text-4xl ml-4" href="<?= base_url() ?>">
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
          Informai Sertamerta
        </a>
      </div>
      <div class="mt-4 ml-4 text-justify" data-scroll data-scroll-speed="2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur earum deserunt in. Ipsa maiores adipisci provident vel reiciendis! Praesentium perspiciatis nobis, beatae ut neque sunt cupiditate necessitatibus libero illum dolor.
      </div>
    </div>

  </div>

  <div data-scroll class="relative h-screen mt-10">
    <video autoplay loop muted src="<?= base_url() ?>/vid/video_profile_bblm.mp4" class="absolute top-0 left-0 w-full h-full object-cover"></video>
    <div class="absolute inset-0 flex justify-center items-center text-center bg-stone-900 bg-opacity-50 px-10 xl:px-72">
      <div class="flex">
        <div class="text-lg lg:text-2xl text-stone-200">
          Balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) berkomitmen untuk memberikan layanan terbaik dalam bidang pengujian, kalibrasi, dan sertifikasi, serta mendukung pengembangan industri yang mandiri, berdaya saing, dan sesuai dengan prinsip industri hijau melalui standardisasi dan optimalisasi teknologi.
          <button class="relative group  py-1.5 px-2.5 text-stone-50">
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-50 transition-all duration-300 group-hover:w-full"></span>
            Jelajahi
          </button>

          </span>
        </div>

      </div>
    </div>
  </div>

  <div class="flex flex-col md:flex-row gap-4 justify-end items-end mt-10">

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="1">
      <div class="flex items-center">
        <div class="ml-4 my-3">004</div>
        <a class="relative group  py-1.5 px-2.5 text-stone-900 text-3xl ml-4" href="<?= base_url() ?>">
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
          Layanan informasi
        </a>
      </div>
      <div class="mt-4 ml-4 text-justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, eum numquam necessitatibus ab, minima voluptate quis porro quaerat optio soluta cupiditate, consequatur consectetur! Sunt obcaecati ea aut, quaerat fuga sed.
      </div>
    </div>

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="3">
      <div class="flex items-center">
        <div class="ml-4 my-3">005</div>
        <a class="relative group  py-1.5 px-2.5 text-stone-900 text-3xl ml-4" href="<?= base_url() ?>">
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
          Unit Pelayanan Publik
        </a>
      </div>
      <div class="mt-4 ml-4 text-justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias ullam cum tempora sapiente nam earum odio eos, eaque quod magnam voluptatem amet molestiae eum! Aspernatur optio et sint ab animi.
      </div>
    </div>

    <div class="flex flex-col w-full sm:w-8/12 md:w-5/12 my-32" data-scroll data-scroll-speed="5">
      <div class="flex items-center">
        <div class="ml-4 my-3">006</div>
        <!-- <div class="text-3xl ml-4"><a href="<?= base_url() ?>">Laporan Layanan Informasi</a></div> -->
        <a class="relative group  py-1.5 px-2.5 text-stone-900 text-3xl ml-4" href="<?= base_url() ?>">
          <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
          Laporan Layanan Informasi
        </a>
      </div>
      <div class="mt-4 ml-4 text-justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur earum deserunt in. Ipsa maiores adipisci provident vel reiciendis! Praesentium perspiciatis nobis, beatae ut neque sunt cupiditate necessitatibus libero illum dolor.
      </div>
    </div>

  </div>




</div>

<?php $this->endSection(); ?>
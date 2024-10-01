<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col">
  <div>
    <div class="text-2xl">Halaman Home</div>
    <!-- <div class="divider"></div> -->
  </div>

  <div class="flex flex-col gap-4">

    <!-- <div class="card bg-base-100 w-96 shadow-xl">
      <figure class="px-10 pt-10">
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
          alt="Shoes"
          class="rounded-xl" />
      </figure>
      <div class="card-body items-center text-center">
        <h2 class="card-title">Shoes!</h2>
        <p>If a dog chews shoes whose shoes does he choose?</p>
        <div class="card-actions">
          <button class="btn btn-neutral">Buy Now</button>
        </div>
      </div>
    </div> -->

    <div class="flex flex-col w-5/12 my-52">
      <div class="flex items-center">
        <div class="ml-4 my-3">001</div>
        <div class="text-4xl ml-4"><a href="<?= base_url() ?>">Informasi Berkala</a></div>
      </div>
      <div class="mt-4 ml-4 text-justify">
        informasi berkala tentang kinerja, laporan keuangan, laporan kepegawaian, akses informasi publik, serta dokumen terkait kegiatan dan program instansi dari tahun 2015 hingga Sekarang.
      </div>
    </div>
    
    <div class="flex flex-col w-5/12 my-52">
      <div class="flex items-center">
        <div class="ml-4 my-3">002</div>
        <div class="text-4xl ml-4"><a href="<?= base_url() ?>">Informasi Setiap Saat</a></div>
      </div>
      <div class="mt-4 ml-4 text-justify">
      informasi setiap saat terkait layanan BBSPJILM, jurnal, standar pelayanan, peraturan tarif, perjanjian kerja sama, serta prosedur penanganan keadaan darurat.
      </div>
    </div>

    <div class="flex flex-col w-5/12 my-52">
      <div class="flex items-center">
        <div class="ml-4 my-3">003</div>
        <div class="text-4xl ml-4"><a href="<?= base_url() ?>">Informai Sertamerta</a></div>
      </div>
      <div class="mt-4 ml-4 text-justify">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur earum deserunt in. Ipsa maiores adipisci provident vel reiciendis! Praesentium perspiciatis nobis, beatae ut neque sunt cupiditate necessitatibus libero illum dolor.
      </div>
    </div>

  </div>

</div>

<?php $this->endSection(); ?>
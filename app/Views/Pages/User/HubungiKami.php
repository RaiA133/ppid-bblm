<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col mx-0 md:mx-10">

  <!-- Judul Halaman -->
  <section class="flex flex-col text-center" id="header-regulasi">
    <div class="text-2xl" data-scroll data-scroll-direction="vertical" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-regulasi">Hubungi Kami</div>
    <div class="divider"></div>
  </section>

  <!-- List Link Regulasi -->
  <section class="flex justify-center h-fit" data-scroll-section>
    <div class="flex flex-col xl:flex-row gap-4 border shadow-xl rounded-xl w-full sm:w-9/12 h-fit">

      <div class="basis-3/4 p-10 pb-0 xl:pb-10">
        <div class="italic text-xl font-bold mb-10">
          PPID BBLM
        </div>
        <div class="text-xl mb-10">
          Tolong masukan Nama, Email, Perusahaan, No Telp, Kota serta deskripsi dari pesan yang ingin disampaikan. Kami akan menghubungi anda sesegera mungkin.
        </div>
        <div class="mb-10">

          <form action="">
            <div class="flex flex-row gap-4">
              <input type="text" placeholder="Nama*" class="input input-bordered w-full mb-3" required />
              <input type="email" placeholder="Email*" class="input input-bordered w-full mb-3" required />
            </div>
            <div class="flex flex-row gap-4">
              <input type="text" placeholder="Perusahaan" class="input input-bordered w-full mb-3" />
              <input type="number" placeholder="No Telp" class="input input-bordered w-full mb-3" />
            </div>
            <textarea placeholder="Deskripsi Pesan" class="textarea textarea-bordered w-full p-4 mb-2"></textarea>
            <div class="flex flex-row gap-4">
              <input type="text" placeholder="Kota" class="input input-bordered w-full mb-3" />
              <button type="submit" class="btn btn-neutral px-10">Kirim</button>
            </div>
          </form>

        </div>
      </div>

      <div class="basis-1/2 p-20 pt-0 xl:pt-20">
        <div class="text-4xl lg:text-5xl xl:text-6xl">
          Hubungi dan Beri Tahu kami
        </div>
      </div>

    </div>
  </section>

</div>

<?php $this->endSection(); ?>
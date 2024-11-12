<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('flashDataCreated'); ?>

<?php if ($flashDataCreated) : ?>
  <div class="z-10 absolute top-3 w-fit left-1/2 -translate-x-1/2 transition-opacity duration-[5000ms] opacity-100" id="alertBox">
    <div role="alert" class="alert shadow-lg bg-base-100 pr-6">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="stroke-info h-6 w-6 shrink-0">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <div class="text-sm">
        <p><?= esc($flashDataCreated['title']) ?></p>
        <p><?= esc($flashDataCreated['message']) ?></p>
      </div>
    </div>
  </div>
  <script>
    setTimeout(function() { // akan hilang dalam 5 detik
      document.getElementById('alertBox').classList.add('opacity-0');
    }, 5000);
  </script>
<?php endif; ?>

<div class="flex flex-col" id="header-home">

  <!-- Judul Halaman -->
  <section class="mx-10" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-home">
    <div class="text-2xl">Home</div>
    <div class="divider"></div>
  </section>

  <!-- Informasi Utama -->
  <section class="flex flex-col items-start md:flex-row mx-10 " id="fixed-elements">

    <section class="flex flex-col gap-4">

      <div class="flex flex-col w-full my-32" data-scroll data-scroll-speed="2">
        <div class="flex items-center" data-scroll data-scroll-speed="1">
          <div class="ml-0 md:ml-4 my-3">001</div>
          <a class="relative group py-1.5 px-2.5 text-neutral-content-950 text-4xl ml-4" href="<?= base_url() ?>informasi-berkala">
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-neutral-500 transition-all duration-300 group-hover:w-full"></span>
            Informasi Berkala
          </a>
        </div>
        <div class="ml-0 md:ml-4 mt-4 text-justify" data-scroll data-scroll-speed="2">
          Informasi yang wajib disediakan dan diumumkan secara rutin atau berkala sekurang-kurangnya setiap 6 bulan sekali.
        </div>
      </div>

      <div class="flex flex-col w-full my-32" data-scroll data-scroll-speed="3">
        <div class="flex items-center" data-scroll data-scroll-speed="2">
          <div class="ml-0 md:ml-4 my-3">002</div>
          <a class="relative group py-1.5 px-2.5 text-neutral-content-950 text-4xl ml-4" href="<?= base_url() ?>informasi-setiap-saat">
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-neutral-500 transition-all duration-300 group-hover:w-full"></span>
            Informasi Setiap Saat
          </a>
        </div>
        <div class="ml-0 md:ml-4 mt-4 text-justify" data-scroll data-scroll-speed="1">
          Informasi yang wajib disediakan untuk bisa langsung diberikan kepada Pemohon Informasi Publik ketika terdapat permohonan.
        </div>
      </div>

      <div class="flex flex-col w-full my-32" data-scroll data-scroll-speed="3">
        <div class="flex items-center" data-scroll data-scroll-speed="1">
          <div class="ml-0 md:ml-4 my-3">003</div>
          <a class="relative group py-1.5 px-2.5 text-neutral-content-950 text-4xl ml-4" href="<?= base_url() ?>informasi-serta-merta">
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-neutral-500 transition-all duration-300 group-hover:w-full"></span>
            Informasi Sertamerta
          </a>
        </div>
        <div class="ml-0 md:ml-4 mt-4 text-justify" data-scroll data-scroll-speed="2">
          Informasi yang wajib disediakan dan diumumkan terkait hajat hidup orang banyak dan ketertiban umum.
        </div>
      </div>

    </section>

    <!-- Logo MIDC Animated -->
    <section>
      <div class="h-fit w-fit sm:max-w-[50vw]" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
        <div data-scroll-offset>
          <video src="<?= base_url() ?>/vid/animasi_logo_bblm.mp4" autoplay loop muted class=""></video>
        </div>
      </div>
      <script>
        let isAttributesRemoved = false; // Status apakah atribut telah dihapus
        let isAttributesAdded = false; // Status apakah atribut telah ditambahkan

        function adjustAttributes() {
          const div = document.getElementById('customHeight');

          if (window.innerWidth <= 768 && !isAttributesRemoved) {
            
            div.removeAttribute('data-scroll');
            div.removeAttribute('data-scroll-sticky');
            // div.removeAttribute('data-scroll-offset');
            div.removeAttribute('data-scroll-target');
            isAttributesRemoved = true;
            isAttributesAdded = false;
          } else if (window.innerWidth > 768 && !isAttributesAdded) {
            
            div.setAttribute('data-scroll', '');
            div.setAttribute('data-scroll-sticky', '');
            // div.setAttribute('data-scroll-offset', '200%');
            div.setAttribute('data-scroll-target', '#fixed-elements');
            isAttributesAdded = true;
            isAttributesRemoved = false;
          }
        }

        // Menggunakan addEventListener untuk menangani perubahan ukuran jendela
        window.addEventListener('resize', (event) => {
          adjustAttributes();
        });

        // Menggunakan onresize untuk menangani perubahan ukuran jendela
        window.onresize = (event) => {
          adjustAttributes();
        };

        adjustAttributes();
      </script>
    </section>

  </section>

  <!-- Video Autoplay -->
  <section data-scroll class="relative h-screen mt-32 md:mt-0">
    <video autoplay loop muted src="<?= base_url() ?>/vid/video_profile_bblm.mp4" class="absolute top-0 left-0 w-full h-full object-cover"></video>
    <div class="absolute inset-0 flex justify-center items-center text-center bg-stone-900 bg-opacity-50 px-10 xl:px-64">
      <div class="flex">
        <div class="text-lg lg:text-2xl text-stone-200">
          Balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) berkomitmen untuk memberikan layanan terbaik dalam bidang pengujian, kalibrasi, dan sertifikasi, standardisasi, dan optimalisasi teknologi untuk mendukung pengembangan industri yang mandiri & berdaya saing.
          <a class="relative group  py-1.5 px-2.5 text-stone-50" href="<?= base_url() ?>profil">
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-50 transition-all duration-300 group-hover:w-full"></span>
            Jelajahi
          </a>
          </span>
        </div>
      </div>
    </div>
  </section>

  <!-- Informasi Lainnya -->
  <section class="flex flex-col justify-center items-center my-7 relative">

    <div class="flex flex-wrap justify-center gap-6 w-full" data-scroll>

      <a href="<?= base_url() ?>profil" class="flex justify-center" data-scroll data-scroll-speed="4">
        <div class="card hover:shadow-2xl hover:pb-3 hover:bg-base-200 bg-neutral hover:text-neutral text-neutral-content transition-all w-40 sm:w-52 rounded-xl">
          <div class="p-5">
            <h2 class="card-title text-4xl sm:text-5xl mb-6 sm:mb-10">004</h2>
            <div class="h-32 flex items-end">
              <p class="text-xl sm:text-2xl">Profil</p>
            </div>
          </div>
        </div>
      </a>

      <a href="<?= base_url() ?>regulasi" class="flex justify-center" data-scroll data-scroll-speed="3">
        <div class="card hover:shadow-2xl hover:pb-3 hover:bg-base-200 bg-neutral hover:text-neutral text-neutral-content transition-all w-40 sm:w-52 rounded-xl">
          <div class="p-5">
            <h2 class="card-title text-4xl sm:text-5xl mb-6 sm:mb-10">005</h2>
            <div class="h-32 flex items-end">
              <p class="text-xl sm:text-2xl">Regulasi</p>
            </div>
          </div>
        </div>
      </a>

      <a href="<?= base_url() ?>permohonan-informasi" class="flex justify-center" data-scroll data-scroll-speed="4">
        <div class="card hover:shadow-2xl hover:pb-3 hover:bg-base-200 bg-neutral hover:text-neutral text-neutral-content transition-all w-40 sm:w-52 rounded-xl">
          <div class="p-5">
            <h2 class="card-title text-4xl sm:text-5xl mb-6 sm:mb-10">006</h2>
            <div class="h-32 flex items-end">
              <p class="text-xl sm:text-2xl">Permohonan Informasi</p>
            </div>
          </div>
        </div>
      </a>

      <a href="<?= base_url() ?>unit-pelayanan-publik" class="flex justify-center" data-scroll data-scroll-speed="2">
        <div class="card hover:shadow-2xl hover:pb-3 hover:bg-base-200 bg-neutral hover:text-neutral text-neutral-content transition-all w-40 sm:w-52 rounded-xl">
          <div class="p-5">
            <h2 class="card-title text-4xl sm:text-5xl mb-6 sm:mb-10">007</h2>
            <div class="h-32 flex items-end">
              <p class="text-xl sm:text-2xl">Unit Layanan Publik</p>
            </div>
          </div>
        </div>
      </a>

      <a href="<?= base_url() ?>laporan-layanan-informasi" class="flex justify-center" data-scroll data-scroll-speed="1.5">
        <div class="card hover:shadow-2xl hover:pb-3 hover:bg-base-200 bg-neutral hover:text-neutral text-neutral-content transition-all w-40 sm:w-52 rounded-xl">
          <div class="p-5">
            <h2 class="card-title text-4xl sm:text-5xl mb-6 sm:mb-10">008</h2>
            <div class="h-32 flex items-end">
              <p class="text-xl sm:text-2xl">Laporan Layanan Informasi</p>
            </div>
          </div>
        </div>
      </a>

      <a href="<?= base_url() ?>hubungi-kami" class="flex justify-center" data-scroll data-scroll-speed="6">
        <div class="card hover:shadow-2xl hover:pb-3 hover:bg-base-200 bg-neutral hover:text-neutral text-neutral-content transition-all w-40 sm:w-52 rounded-xl">
          <div class="p-5">
            <h2 class="card-title text-4xl sm:text-5xl mb-6 sm:mb-10">009</h2>
            <div class="h-32 flex items-end">
              <p class="text-xl sm:text-2xl">Hubungi Kami</p>
            </div>
          </div>
        </div>
      </a>

    </div>

  </section>

  <!-- Judul Informasi lainnya -->
  <section class="absoulte z-40 w-full bg-primary py-20">
    <div class="text-6xl md:text-9xl text-center font-bold text-base-100">PELAYANAN KAMI</div>
  </section>

</div>

<?php $this->endSection(); ?>
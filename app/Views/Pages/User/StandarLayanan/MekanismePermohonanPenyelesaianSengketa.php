<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<!-- Image & Content Section -->
<section class="flex flex-col md:flex-row items-center justify-center mx-10 mb-40" id="fixed-elements" data-scroll>
  <?php if (!empty($results['link_gambar']) && !empty($results['content'])) : ?>
    <!-- Jika Gambar dan Konten Tersedia, Tampilkan Kanan-Kiri -->

    <div class="flex flex-col sm:flex-row justify-center w-full gap-4 mt-20">

      <div id="customHeight" class="h-fit" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
        <div class="card border w-full shadow-xl rounded-xl">
          <figure class="px-4 pt-4">
            <img
              src="<?= base_url() ?>img/standarLayanan/mekanismePermohonanPenyelesaianSengketa/<?= $results['link_gambar'] ?>"
              alt="Waktu Pelayanan"
              class="rounded-xl bg-base-200 border" />
          </figure>
          <div class="py-5 pr-5 text-end self-end w-1/2">
            <h2 class="text-xl text-indigo-500 font-extrabold">WAKTU PELAYANAN</h2>
          </div>
        </div>
      </div>

      <!-- Konten di Samping Gambar -->
      <div id="customHeight" class="h-fit sm:w-1/2" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
        <div class="w-full max-w-2xl shadow-xl rounded-xl">
          <div class="w-full py-10 px-10 rounded-xl border">
            <article class="prose prose-sm prose-headings:text-indigo-500 max-w-full">
              <?= $results['content'] ?>
            </article>
          </div>
        </div>
      </div>

    <?php else : ?>
      <!-- Jika Hanya Gambar atau Hanya Konten -->
      <div class="flex justify-center w-full mt-20">
        <div data-scroll-offset class="w-fit max-w-2xl text-start border shadow-xl rounded-xl">

          <?php if (!empty($results['link_gambar'])) : ?>
            <div class="card w-full">
              <figure class="px-4 pt-4">
                <img
                  src="<?= base_url() ?>img/standarLayanan/mekanismePermohonanPenyelesaianSengketa/<?= $results['link_gambar'] ?>"
                  alt="Waktu Pelayanan"
                  class="rounded-xl bg-base-200 border" />
              </figure>
              <div class="py-5 pr-5 text-end self-end w-1/2">
                <h2 class="text-xl text-indigo-500 font-extrabold">WAKTU PELAYANAN</h2>
              </div>
            </div>
          <?php endif; ?>

          <?php if (!empty($results['content'])) : ?>
            <div class="w-full max-w-2xl">
              <div class="w-full py-8 px-10">
                <article class="prose prose-sm prose-headings:text-indigo-500 max-w-full">
                  <?= $results['content'] ?>
                </article>
                <div class="divider"></div>
                <h2 class="text-xl text-indigo-500 font-extrabold mt-5 text-end">WAKTU PELAYANAN</h2>
              </div>
            </div>

          <?php endif; ?>

        </div>
      </div>
    <?php endif; ?>

    <script>
      let isAttributesRemoved = false; // Status apakah atribut telah dihapus
      let isAttributesAdded = false; // Status apakah atribut telah ditambahkan

      function adjustAttributes() {
        const div = document.getElementById('customHeight');

        if (window.innerWidth <= 768 && !isAttributesRemoved) {
          console.log('hapus');
          div.removeAttribute('data-scroll');
          div.removeAttribute('data-scroll-sticky');
          div.removeAttribute('data-scroll-target');
          isAttributesRemoved = true;
          isAttributesAdded = false;
        } else if (window.innerWidth > 768 && !isAttributesAdded) {
          console.log('ada');
          div.setAttribute('data-scroll', '');
          div.setAttribute('data-scroll-sticky', '');
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

<?php $this->endSection(); ?>
<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<!-- Image & Content Section -->
<section class="flex flex-col md:flex-row items-center justify-center mx-10 my-20 h-full" id="fixed-elements" data-scroll>
  <?php if (!empty($results['link_gambar']) && !empty($results['content'])) : ?>
    <!-- Jika Gambar dan Konten Tersedia, Tampilkan Kanan-Kiri -->

    <div class="flex justify-center w-full">
      <div id="customHeight" class="h-fit pb-20" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
        <div data-scroll-offset class="w-full max-w-2xl mt-20 shadow-xl rounded-xl">
          <h2 class="text-2xl font-semibold mb-4 text-center">Mekanisme Permohonan Penyelesaian Sengketa</h2>
          <div class="w-full p-4 bg-white rounded-xl">
            <img src="<?= base_url() ?>img/standarLayanan/mekanismePermohonanPenyelesaianSengketa/<?= $results['link_gambar'] ?>" alt="Mekanisme Permohonan Penyelesaian Sengketa" class="w-full h-full object-cover">
          </div>
        </div>
      </div>

      <!-- Konten di Samping Gambar -->
      <div class="flex justify-center w-full md:w-1/2 mb-10 p-2" data-scroll>
        <div id="customHeight" class="h-fit pb-20" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
          <div class="w-full max-w-2xl shadow-xl rounded-xl">
            <div class="w-full py-20 px-10 bg-white rounded-xl">
              <?= $results['content'] ?>
            </div>
          </div>
        </div>
      </div>

    <?php else : ?>
      <!-- Jika Hanya Gambar atau Hanya Konten -->
      <div class="flex justify-center w-full mb-10">
        <div data-scroll-offset class="w-full max-w-2xl shadow-xl rounded-xl text-center">
          <h2 class="text-2xl font-semibold mb-4">Mekanisme Permohonan Penyelesaian Sengketa</h2>
          <div class="w-full p-4 bg-white rounded-xl">
            <?php if (!empty($results['link_gambar'])) : ?>
              <!-- Tampilkan Gambar di Tengah -->
              <img src="<?= base_url() ?>img/standarLayanan/mekanismePermohonanPenyelesaianSengketa/<?= $results['link_gambar'] ?>" alt="Mekanisme Permohonan Penyelesaian Sengketa" class="w-full h-full object-cover">
            <?php endif; ?>

            <?php if (!empty($results['content'])) : ?>
              <!-- Tampilkan Konten di Tengah -->
              <div class="mt-4">
                <?= $results['content'] ?>
              </div>
            <?php endif; ?>
          </div>
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
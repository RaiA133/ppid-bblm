<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<!-- Image & Content Section -->
<section class="flex flex-col md:flex-row items-center justify-center mx-4 md:mx-10 mb-20 md:mb-40" id="fixed-elements" data-scroll>
  <?php if (!empty($results['link_gambar']) && !empty($results['content'])) : ?>
    <!-- Jika Gambar dan Konten Tersedia, Tampilkan Kanan-Kiri -->

    <div class="flex flex-col md:flex-row justify-center w-full gap-4 mt-10 md:mt-20">

      <!-- Image Section -->
      <div id="customHeight" class="h-fit w-full md:w-1/2" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
        <div class="border shadow-xl rounded-xl w-full">
          <figure class="px-4 pt-4">
            <img
              src="<?= base_url() ?>img/layananInformasi/unitPelayananPublik/<?= $results['link_gambar'] ?>"
              alt="Unit Pelayanan Publik"
              class="rounded-xl bg-base-200 border w-full" />
          </figure>
          <div class="py-5 pr-5 text-end w-full">
            <h2 class="text-xl md:text-2xl text-indigo-500 font-extrabold">UNIT PELAYANAN PUBLIK</h2>
          </div>
        </div>
      </div>

      <!-- Content Section -->
      <div id="customHeight" class="h-fit w-full md:w-1/2" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
        <div class="shadow-xl rounded-xl border w-full">
          <div class="py-6 md:py-10 px-6 md:px-10 rounded-xl">
            <article class="prose prose-sm md:prose lg:prose-lg prose-headings:text-indigo-500 max-w-full">
              <?= $results['content'] ?>
            </article>
          </div>
        </div>
      </div>

    <?php else : ?>
      <!-- Jika Hanya Gambar atau Hanya Konten -->
      <div class="flex justify-center w-full mt-10 md:mt-20">
        <div class="max-w-2xl shadow-xl border rounded-xl w-full">

          <?php if (!empty($results['link_gambar'])) : ?>
            <!-- Only Image Display -->
            <figure class="px-4 pt-4">
              <img
                src="<?= base_url() ?>img/layananInformasi/unitPelayananPublik/<?= $results['link_gambar'] ?>"
                alt="Unit Pelayanan Publik"
                class="rounded-xl bg-base-200 border w-full" />
            </figure>
            <div class="py-5 pr-5 text-end w-full">
              <h2 class="text-xl md:text-2xl text-indigo-500 font-extrabold">UNIT PELAYANAN PUBLIK</h2>
            </div>
          <?php endif; ?>

          <?php if (!empty($results['content'])) : ?>
            <!-- Only Content Display -->
            <div class="px-6 md:px-10 py-6 md:py-8">
              <article class="prose prose-sm md:prose lg:prose-lg prose-headings:text-indigo-500 max-w-full">
                <?= $results['content'] ?>
              </article>
              <div class="border-t mt-4 pt-4">
                <h2 class="text-xl md:text-2xl text-indigo-500 font-extrabold text-end">UNIT PELAYANAN PUBLIK</h2>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>
    <?php endif; ?>

    <script>
      let isAttributesRemoved = false;
      let isAttributesAdded = false;

      function adjustAttributes() {
        const divs = document.querySelectorAll('#customHeight');

        divs.forEach(div => {
          if (window.innerWidth <= 768 && !isAttributesRemoved) {
            div.removeAttribute('data-scroll');
            div.removeAttribute('data-scroll-sticky');
            div.removeAttribute('data-scroll-target');
            isAttributesRemoved = true;
            isAttributesAdded = false;
          } else if (window.innerWidth > 768 && !isAttributesAdded) {
            div.setAttribute('data-scroll', '');
            div.setAttribute('data-scroll-sticky', '');
            div.setAttribute('data-scroll-target', '#fixed-elements');
            isAttributesAdded = true;
            isAttributesRemoved = false;
          }
        });
      }

      // Attach resize event listener
      window.addEventListener('resize', adjustAttributes);

      // Initial adjustment on page load
      adjustAttributes();
    </script>
</section>

<?php $this->endSection(); ?>
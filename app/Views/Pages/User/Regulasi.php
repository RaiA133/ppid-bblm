<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col mx-10">

  <!-- Judul Halaman -->
  <section class="flex flex-col" id="header-regulasi">
    <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-regulasi">Regulasi</div>
    <div class="divider"></div>
  </section>

  <!-- List Link Regulasi -->
  <section data-scroll-section>
    <div class="">
      <div class="" data-scroll>
        <div class="flex flex-col md:flex-row gap-4">

          <div class="basis-1/2 lg:basis-1/4 border rounded-xl w-full">
            <p class="p-10">
              Dalam upaya meningkatkan transparansi dan akuntabilitas, beberapa peraturan telah ditetapkan untuk mendukung Keterbukaan Informasi Publik. Berikut adalah beberapa regulasi penting beserta penjelasan singkatnya:
            </p>
          </div>

          <div class="basis-3/4 border rounded-xl w-full p-10">

            <div class="join join-vertical w-full">

              <?php $no = 1; ?>
              <?php foreach ($results as $result) : ?>
                <div class="collapse collapse-arrow join-item border-base-300 border group">
                  <input type="radio" name="my-accordion-4" />
                  <div class="collapse-title text-xl font-medium relative">
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
                    <?= "0" . $no++ . ". " . $result['judul'] ?>
                  </div>
                  <div class="collapse-content">
                    <p class="mt-4">
                      <iframe src="<?= $result['link_drive'] ?>/preview" width="100%" height="600px"></iframe>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

</div>

<?php $this->endSection(); ?>
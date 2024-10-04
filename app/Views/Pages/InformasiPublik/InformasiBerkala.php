<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<section class="flex flex-col mx-10" id="header-profil">
  <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Informasi Berkala</div>
  <div class="divider"></div>
</section>

<section class="mx-10">
  <div class="flex flex-wrap justify-center gap-6 w-full">
    
    <div class="mb-3">
      <div class="text-xl font-bold w-full text-center mb-4 text-underline">Kegiatan dan Kinerja</div>
      <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Jenis Dokumen</th>
              <th>Dokumen</th>
              <!-- <th>Favorite Color</th> -->
            </tr>
          </thead>
          <tbody>
            <tr class="hover">
              <th>1</th>
              <td>Cy Ganderton</td>
              <td>Quality Control Specialist lorem lorem</td>
              <!-- <td>Blue</td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="mb-3">
      <div class="text-xl font-bold w-full text-center mb-4 text-underline">Laporan Keuangan</div>
      <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Jenis Dokumen</th>
              <th>Dokumen</th>
              <!-- <th>Favorite Color</th> -->
            </tr>
          </thead>
          <tbody>
            <tr class="hover">
              <th>1</th>
              <td>Cy Ganderton</td>
              <td>Quality Control Specialist lorem</td>
              <!-- <td>Blue</td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="mb-3">
      <div class="text-xl font-bold w-full text-center mb-4 text-underline">Laporan Kepegawaian</div>
      <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Jenis Dokumen</th>
              <th>Dokumen</th>
              <!-- <th>Favorite Color</th> -->
            </tr>
          </thead>
          <tbody>
            <tr class="hover">
              <th>1</th>
              <td>Cy Ganderton</td>
              <td>Quality Control Specialist lorem</td>
              <!-- <td>Blue</td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="mb-3">
      <div class="text-xl font-bold w-full text-center mb-4 text-underline">Akses Informasi Publik</div>
      <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Jenis Dokumen</th>
              <th>Dokumen</th>
              <!-- <th>Favorite Color</th> -->
            </tr>
          </thead>
          <tbody>
            <tr class="hover">
              <th>1</th>
              <td>Cy Ganderton</td>
              <td>Quality Control Specialist lorem</td>
              <!-- <td>Blue</td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>

<?php $this->endSection(); ?>
<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message'); ?>

<!-- Flash Data / Notif -->
<?php if ($flashDataCreated) : ?>
  <div class="absolute top-3 w-fit left-4 transition-opacity duration-[5000ms] opacity-100" id="alertBox">
    <div role="alert" class="alert shadow-lg bg-base-100 pr-6">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span><?= esc($flashDataCreated['title']) ?></span>
    </div>
  </div>
  <script>
    setTimeout(function() { // akan hilang dalam 5 detik
      document.getElementById('alertBox').classList.add('opacity-0');
    }, 5000);
  </script>
<?php endif; ?>

<!-- Preview Data -->
<section class="join join-vertical mx-5 sm:mx-10 mt-10 mb-5 rounded-lg">
  <div class="collapse collapse-arrow join-item bg-base-100">
    <input type="radio" name="my-accordion-4" />
    <div class="collapse-title text-xl font-medium text-center">Preview</div>

    <div class="flex flex-col items-center">
      <section class="flex justify-center w-full" data-scroll>
        <div class="h-full w-fit shadow-xl rounded-xl">
          <h2 class="text-2xl font-semibold mb-4 text-center">Maklumat Pelayanan</h2>
          <figure class="lg:w-auto p-0 md:p-10">
            <img class="w-full max-w-3xl h-auto mx-auto"
              src="<?= esc(base_url('img/standarLayanan/MaklumatPelayanan.png')) ?>"
              alt="Maklumat Pelayanan" />
          </figure>
        </div>
      </section>
    </div>

    <!-- CONTENT -->
    <section dir="ltr" class="p-7 m-7 card bg-base-100">
      <div>
        <?= !empty($results['content']) ? $results['content'] : '<li class="text-xs">-</li>'; ?>
      </div>
    </section>

    <!-- Edit Data Maklumat Pelayanan -->
    <section class="mx-5 sm:mx-10 bg-base-100 shadow-lg rounded-lg p-10 mb-5 my-4">
      <!-- Title & Edit Button -->
      <div class="flex justify-between items-center w-full">
        <div class="text-xl font-bold">Edit Data Maklumat Pelayanan</div>
      </div>

      <!-- Form -->
      <form action="" method="post" enctype="multipart/form-data">

        <!-- Image Input -->
        <!-- <div class="flex flex-col mb-4">
          <input id="img-input-admin-profil" name="link_gambar" type="file" class="file-input file-input-bordered w-full" onchange="previewImgAdminProfil()" />
          <div class="relative border bg-neutral w-full">
            <img id="img-preview-admin-profil" class="w-full h-auto" src="<?= base_url($results['link_gambar'] ?? 'img/icon/default-image.jpg') ?>" alt="">
          </div>
        </div> -->

        <!-- JavaScript for Image Preview -->
        <script>
          function previewImgAdminProfil() {
            const cover = document.querySelector('#img-input-admin-profil');
            const imgPreview = document.querySelector('#img-preview-admin-profil');
            const fileCover = new FileReader();
            fileCover.readAsDataURL(cover.files[0]);
            fileCover.onload = function(e) {
              imgPreview.src = e.target.result;
            };
          }
        </script>

        <!-- Content -->
        <div class="flex gap-3 justify-center mb-3">
          <textarea class="textarea textarea-bordered w-full" placeholder="MaklumatPelayanan" name="content_edit" id="content">
            <?= esc($results['content'] ?? '-') ?>
          </textarea>
          <?php if ($validation?->hasError('content_edit')) : ?>
            <div class="label"><span class="label-text-alt text-error"><?= esc($validation->getError('content_edit')) ?></span></div>
          <?php endif; ?>
        </div>

        <!-- CKEditor Script -->
        <script>
          CKEDITOR.replace('content', {
            extraPlugins: 'uploadimage',
            uploadUrl: '<?= base_url('maklumatpelayanan/uploadImage') ?>',
            filebrowserUploadUrl: '<?= base_url('maklumatpelayanan/uploadImage') ?>',
            filebrowserUploadMethod: "form",
            width: '100%',
            height: 600,
          });
        </script>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </section>
  </div>
</section>

<?php $this->endSection(); ?>
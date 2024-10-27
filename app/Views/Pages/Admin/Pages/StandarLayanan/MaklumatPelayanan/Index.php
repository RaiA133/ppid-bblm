<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message'); ?>
<?php $errors = validation_errors() ?>

<!-- Flash Data / Notif -->
<?php if ($flashDataCreated) : ?>
  <div class="z-10 absolute top-3 w-fit left-4 transition-opacity duration-[5000ms] opacity-100" id="alertBox">
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
      <span><?= $flashDataCreated['title'] ?></span>
    </div>
  </div>
  <script>
    setTimeout(function() { // akan hilang dalam 5 detik
      document.getElementById('alertBox').classList.add('opacity-0');
    }, 5000);
  </script>
<?php endif; ?>

<!-- Preview Data -->
<section class="join join-vertical mx-5 sm:mx-10 mt-10 mb-5 rounded-lg flex justify-center">
  <div class="collapse collapse-arrow join-item bg-base-100">
    <input type="radio" name="my-accordion-4" />
    <div class="collapse-title text-xl font-medium text-center">Preview</div>
    <div class="collapse-content px-0">


      <div class="h-[900px] overflow-auto mb-5" dir="rtl">
        <div class="flex justify-center w-full" data-scroll>
          <div class="h-full w-fit shadow-xl rounded-xl">
            <h2 class="text-2xl font-semibold mb-4 text-center">Maklumat Pelayanan</h2>
          </div>
        </div>


        <!-- CONTENT -->
        <section dir="ltr">
          <?php if (!empty($results['content'])) : ?>
            <?= $results['content'] ?>
          <?php else : ?>
            <li class="text-xs">-</li>
          <?php endif; ?>
        </section>
      </div>
    </div>
</section>


<!-- Edit Data Maklumat Pelayanan -->
<section class="mx-5 sm:mx-10 bg-base-100 shadow-lg rounded-lg p-10 mb-5">

  <form id="myForm" action="<?= base_url() ?>/api/admin/maklumat-pelayanan/edit/<?= $results['id_maklumat_pelayanan'] ?>" method="POST" enctype="multipart/form-data">

    <!-- Title & Edit Button -->
    <div class="flex justify-between items-center w-full">
      <div class="text-xl font-bold">Edit Data Maklumat Pelayanan</div>
      <button type="submit" class="btn w-32 btn-neutral">Edit</button>
    </div>

    <!-- Form -->
    <div class="flex flex-col xl:flex-row gap-4">

      <input type="hidden" id="link_gambar_content_edit" name="link_gambar_content_edit" value="<?= $results['link_gambar_content'] ?>">

      <div class="w-full">
        <div class="flex flex-col sm:flex-row gap-3 justify-center w-full mb-3">

        </div>

        <div class="divider"></div>

        <!-- Content -->
        <div class="flex gap-3 justify-center mb-3 flex-col">
          <?php if (isset($errors['content_edit'])) : ?>
            <div class="label"><span class="label-text-alt text-error"><?= $errors['content_edit']; ?></span></div>
          <?php endif ?>
          <textarea class="textarea textarea-bordered w-full" placeholder="MaklumatPelayanan" name="content_edit" id="content">
          <?php if (!empty($results['content'])) : ?>
            <?= $results['content'] ?>
          <?php else : ?>
            <li class="text-xs">-</li>
          <?php endif; ?>
          </textarea>


          <!-- CKEditor Script -->
          <script>
            // Replace the textarea with CKEditor
            CKEDITOR.config.width = '100%'
            CKEDITOR.config.height = '900'
            CKEDITOR.replace('content', {
              extraPlugins: 'uploadimage',
              uploadUrl: '<?= base_url('/api/admin/maklumat-pelayanan/upload-image') ?>',
              filebrowserUploadUrl: '<?= base_url('/api/admin/maklumat-pelayanan/upload-image') ?>',
              filebrowserUploadMethod: "form",
            });

            document.getElementById('myForm').addEventListener('submit', function(e) {
              let editorContent = CKEDITOR.instances['content'].getData();
              const tempDiv = document.createElement('div');
              tempDiv.innerHTML = editorContent;

              let images = tempDiv.querySelectorAll('img');
              let imageSrcArray = [];

              images.forEach(function(image) {
                let fullPath = image.src;
                let fileName = fullPath.split('/').pop();
                imageSrcArray.push(fileName);
              });

              let imageSrcJson = JSON.stringify(imageSrcArray);

              document.getElementById('link_gambar_content_edit').value = imageSrcJson;
              CKEDITOR.instances['content'].updateElement();
            });
          </script>
        </div>
  </form>

</section>

<?php $this->endSection(); ?>
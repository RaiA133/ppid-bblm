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
    <input type="checkbox" name="my-accordion-4" />
    <div class="collapse-title text-xl font-medium text-center">Preview</div>
    <div class="collapse-content px-0">


      <div class="h-[1000px] overflow-auto mb-5">
        <div class="flex justify-center w-full" data-scroll>
          <div class="h-full w-fit shadow-xl rounded-xl">

            <!-- Image & Content Section -->
            <section class="flex flex-col md:flex-row items-center justify-center mx-10 my-20 h-full" id="fixed-elements" data-scroll>
              <?php if (!empty($results['content']) && !empty($results['link_gambar'])) : ?>

                <!-- Jika Gambar dan Konten Tersedia, Tampilkan Kanan-Kiri -->
                <div class="flex justify-center w-full">
                  <div id="customHeight" class="h-fit pb-20" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                    <div data-scroll-offset class="w-full max-w-2xl mt-20 shadow-xl rounded-xl">
                      <h2 class="text-2xl font-semibold mb-4 text-center">Unit Pelayanan Publik</h2>
                      <div class="w-full p-4 bg-white rounded-xl">
                        <img src="<?= base_url() ?>img/layananInformasi/unitPelayananPublik/<?= $results['link_gambar'] ?>" alt="Unit Pelayanan Publik" class="w-full h-full object-cover">
                      </div>
                    </div>
                  </div>

                  <!-- Konten di Samping Gambar -->
                  <div class="flex justify-center w-full " data-scroll>
                    <div id="customHeight" class="h-fit pb-20" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                      <div class="w-full max-w-2xl shadow-xl rounded-xl">
                        <div class="w-full p-4 bg-white rounded-xl">
                          <?= $results['content'] ?>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php else : ?>
                  <!-- Jika Hanya Gambar atau Hanya Konten -->
                  <div class="flex justify-center w-full mb-10">
                    <div data-scroll-offset class="w-full max-w-2xl shadow-xl rounded-xl text-start">
                      <h2 class="text-2xl font-semibold mb-4 text-center">Unit Pelayanan Publik</h2>
                      <div class="w-full p-4 bg-white rounded-xl">
                        <?php if (!empty($results['link_gambar'])) : ?>
                          <!-- Tampilkan Gambar di Tengah -->
                          <img src="<?= base_url() ?>img/layananInformasi/unitPelayananInformasi/<?= $results['link_gambar'] ?>" alt="Unit Pelayanan Informasi" class="w-full h-full object-cover">
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
          </div>
        </div>
      </div>
    </div>
</section>


<!-- Edit Data Unit Pelayanan Publik -->
<section class="mx-5 sm:mx-10 bg-base-100 shadow-lg rounded-lg p-10 mb-5">

  <form id="myForm" action="<?= base_url() ?>/api/admin/unit-pelayanan-publik/edit/<?= $results['id_unit_pelayanan_publik'] ?>" method="POST" enctype="multipart/form-data">

    <!-- Title & Edit Button -->
    <div class="flex justify-between items-center w-full">
      <div class="text-xl font-bold">Edit Data Unit Pelayanan Publik</div>
      <button type="submit" class="btn w-32 btn-neutral">Edit</button>
    </div>

    <div class="divider"></div>

    <!-- Form -->
    <h2 class="flex justify-center p-5 text-xl font-bold mr-32">Gambar</h2>
    <div class="flex flex-col xl:flex-row gap-4">

      <input type="hidden" name="link_gambar_edit_old" value="<?= $results['link_gambar'] ?>">
      <input type="hidden" id="link_gambar_content_edit" name="link_gambar_content_edit" value="<?= $results['link_gambar_content'] ?>">

      <div class="w-full">
        <div class="flex flex-col sm:flex-row gap-3 justify-center w-full mb-3">
          <div class="w-full sm:w-4/12">
            <input id="img-input-admin-unitpelayananpublik" name="link_gambar_edit" type="file" class="file-input file-input-bordered w-full <?= (isset($errors['link_gambar_edit'])) ? 'input-error' : 'mb-4' ?>" onchange=" previewImgAdminUnitPelayananPublik()" />
            <?php if (isset($errors['link_gambar_edit'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['link_gambar_edit'] ?></span></div>
            <?php endif ?>
            <div class="relative border bg-neutral w-full">
              <img id="img-preview-admin-unitpelayananpublik" class="w-full h-auto" src="<?= base_url() ?>img/layananInformasi/unitPelayananPublik/<?= $results['link_gambar'] ?? 'img/icon/default-image.jpg' ?>" alt="">
              <div class="absolute bottom-0 left-0 right-0 z-10 h-2/4 bg-gradient-to-t"></div>
            </div>

            <script>
              function previewImgAdminUnitPe() {
                const cover = document.querySelector('#img-input-admin-unitpelayananpublik');
                const imgPreview = document.querySelector('#img-preview-admin-unitpelayananpublik');
                const fileCover = new FileReader();
                fileCover.readAsDataURL(cover.files[0]);
                fileCover.onload = function(e) {
                  imgPreview.src = e.target.result;
                }
              }
            </script>
          </div>
        </div>

        <div class="divider"></div>

        <h2 class="flex justify-center p-5 text-xl font-bold">Konten</h2>

        <!-- Content -->
        <div class="flex gap-3 justify-center mb-3 flex-col">
          <?php if (isset($errors['content_edit'])) : ?>
            <div class="label"><span class="label-text-alt text-error"><?= $errors['content_edit']; ?></span></div>
          <?php endif ?>
          <textarea class="textarea textarea-bordered w-full" placeholder="UnitPelayananPublik" name="content_edit" id="content">
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
              allowedContent: true,
              extraPlugins: 'uploadimage',
              uploadUrl: '<?= base_url('/api/admin/unit-pelayanan-publik/upload-image') ?>',
              filebrowserUploadUrl: '<?= base_url('/api/admin/unit-pelayanan-publik/upload-image') ?>',
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
      </div>
  </form>

  <!-- Form Delete -->
  <div class="flex justify-center w-32">
    <form action="<?= base_url('api/admin/unit-pelayanan-publik/delete-image/' . $results['id_unit_pelayanan_publik']) ?>" method="POST" class="inline">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-xs btn-error" onclick="return confirm('Are you sure ?')">Delete Image</button>
    </form>
  </div>

</section>

<?php $this->endSection(); ?>
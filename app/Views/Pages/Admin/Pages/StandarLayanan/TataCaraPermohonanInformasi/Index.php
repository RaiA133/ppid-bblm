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
    <div class="collapse-content">
      <div class="h-full overflow-auto flex justify-center">

        <section class="flex flex-col md:flex-row items-center justify-center mx-2 mb-40" id="fixed-elements" data-scroll>
          <?php if (!empty($results['link_gambar']) && !empty($results['content'])) : ?>
            <!-- Jika Gambar dan Konten Tersedia, Tampilkan Kanan-Kiri -->

            <div class="flex flex-col sm:flex-row justify-center w-full gap-4 mt-20">

              <div class="h-fit sm:w-1/2 sm:max-w-[50vw]" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                <div class="card border w-full shadow-xl rounded-xl">
                  <figure class="px-4 pt-4">
                    <img
                      id="img-preview-admin-tataCaraPermohonanInformasi-preview"
                      src="<?= base_url() ?>img/standarLayanan/tataCaraPermohonanInformasi/<?= $results['link_gambar'] ?>"
                      alt="Tata Cara Permohonan Informasi"
                      class="rounded-xl bg-base-200 border" />
                  </figure>
                  <div class="py-5 pr-5 text-end self-end w-1/2">
                    <h2 class="text-xl text-indigo-500 font-extrabold">TATA CARA PERMOHONAN INFORMASI</h2>
                  </div>
                </div>
              </div>

              <!-- Konten di Samping Gambar -->
              <div class="h-fit sm:w-1/2 sm:max-w-[50vw]" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
                <div class="w-full max-w-2xl shadow-xl rounded-xl">
                  <div class="w-full py-10 px-10 rounded-xl border">
                    <article class="prose prose-sm prose-headings:text-indigo-500">
                      <?= $results['content'] ?>
                    </article>
                  </div>
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
                        src="<?= base_url() ?>img/standarLayanan/tataCaraPermohonanInformasi/<?= $results['link_gambar'] ?>"
                        alt="Tata Cara Permohonan Informasi"
                        class="rounded-xl bg-base-200 border" />
                    </figure>
                    <div class="py-5 pr-5 text-end self-end w-1/2">
                      <h2 class="text-xl text-indigo-500 font-extrabold">TATA CARA PERMOHONAN INFORMASI</h2>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if (!empty($results['content'])) : ?>
                  <div class="w-full max-w-2xl">
                    <div class="w-full py-8 px-10">
                      <article class="prose prose-sm prose-headings:text-indigo-500" id="content-preview-tata-cara-permohonan-informasi">
                        <?= $results['content'] ?>
                      </article>
                      <div class="divider"></div>
                      <h2 class="text-xl text-indigo-500 font-extrabold mt-5 text-end">TATA CARA PERMOHONAN INFORMASI</h2>
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

      </div>
    </div>
  </div>
</section>

<!-- Edit Data Standar Tata cara Permohonan Informasi -->
<section class="relative mx-5 sm:mx-10 bg-base-100 shadow-lg rounded-lg p-4 sm:p-10 mb-5">

  <!-- Form Delete -->
  <div class="absolute transform translate-x-[1px] translate-y-[190px]">
    <form action="<?= base_url('api/admin/tata-cara-permohonan-informasi/delete-image/' . $results['id_tata_cara_permohonan_informasi']) ?>" method="POST" class="inline">
      <?= csrf_field() ?>
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-xs btn-error w-[120px]" onclick="return confirm('Are you sure?')">Delete Image</button>
    </form>
  </div>

  <form id="myForm" action="<?= base_url() ?>/api/admin/tata-cara-permohonan-informasi/edit/<?= $results['id_tata_cara_permohonan_informasi'] ?>" method="POST" enctype="multipart/form-data">

    <!-- Title & Edit Button -->
    <div class="flex justify-between items-center w-full gap-3">
      <div class="text-md sm:text-xl font-bold">Edit Data Tata Cara permohonan Informasi</div>
      <button type="submit" class="btn w-32 btn-neutral">Edit</button>
    </div>

    <div class="divider"></div>

    <!-- Form -->

    <div class="flex flex-col xl:flex-row gap-4">

      <input type="hidden" name="link_gambar_edit_old" value="<?= $results['link_gambar'] ?>">
      <input type="hidden" id="link_gambar_content_edit" name="link_gambar_content_edit" value="<?= $results['link_gambar_content'] ?>">

      <div class="w-full">
        <div class="flex flex-col sm:flex-row gap-3 justify-center w-full mb-3">
          <div class="w-full sm:w-8/12">
            <h2 class="flex justify-center font-bold mb-3 ml-1 text-md sm:text-xl">Gambar Utama</h2>
            <input id="img-input-admin-tataCaraPermohonanInformasi" name="link_gambar_edit" type="file" class="file-input file-input-bordered w-full <?= (isset($errors['link_gambar_edit'])) ? 'input-error' : 'mb-4' ?>" onchange=" previewImgAdmintataCaraPermohonanInformasi()" />
            <?php if (isset($errors['link_gambar_edit'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['link_gambar_edit'] ?></span></div>
            <?php endif ?>

          </div>
          <div class="w-4/12">
            <div class="relative border bg-neutral w-full mt-7">
              <img id="img-preview-admin-tataCaraPermohonanInformasi" class="w-full h-auto" src="<?= base_url() ?>img/standarLayanan/tataCaraPermohonanInformasi/<?= $results['link_gambar'] ?? 'img/icon/default-image.jpg' ?>" alt="">
              <div class="absolute bottom-0 left-0 right-0 z-10 h-2/4 bg-gradient-to-t"></div>
            </div>

            <script>
              function previewImgAdmintataCaraPermohonanInformasi() {
                const cover = document.querySelector('#img-input-admin-tataCaraPermohonanInformasi');
                const imgPreview = document.querySelector('#img-preview-admin-tataCaraPermohonanInformasi');
                const imgPreviewDropdown = document.querySelector('#img-preview-admin-tataCaraPermohonanInformasi-preview');
                const fileCover = new FileReader();
                fileCover.readAsDataURL(cover.files[0]);
                fileCover.onload = function(e) {
                  imgPreviewDropdown.src = e.target.result;
                  imgPreview.src = e.target.result;
                }
              }
            </script>
          </div>
        </div>

        <div class="divider"></div>

        <h2 class="flex justify-center p-5 text-md sm:text-xl font-bold">Konten</h2>

        <!-- Content -->
        <div class="flex gap-3 justify-center mb-3 flex-col">
          <?php if (isset($errors['content_edit'])) : ?>
            <div class="label"><span class="label-text-alt text-error"><?= $errors['content_edit']; ?></span></div>
          <?php endif ?>
          <textarea class="textarea textarea-bordered w-full" placeholder="Tata cara Permohonan Informasi" name="content_edit" id="content">
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
              uploadUrl: '<?= base_url('/api/admin/tata-cara-permohonan-informasi/upload-image') ?>',
              filebrowserUploadUrl: '<?= base_url('/api/admin/tata-cara-permohonan-informasi/upload-image') ?>',
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
    </div>
  </form>

</section>

<?php $this->endSection(); ?>
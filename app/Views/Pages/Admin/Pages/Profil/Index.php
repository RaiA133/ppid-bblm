<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message'); ?>
<?php $errors = validation_errors(); ?>

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
<section class="join join-vertical mx-5 sm:mx-10 mt-10 mb-5 rounded-lg">
  <div class="collapse collapse-arrow join-item bg-base-100">
    <input type="radio" name="my-accordion-4" />
    <div class="collapse-title text-xl font-medium text-center">Preview</div>
    <div class="collapse-content px-0">

      <div class="h-[900px] overflow-auto mb-5" dir="rtl">
        <!-- Hero -->
        <section dir="ltr" class="relative h-screen w-full bg-neutral flex items-center justify-center mb-5 sm:mb-10">
          <!-- Background Image -->
          <img src="<?= base_url() ?>img/profile/<?= $results['link_gambar'] ?? '-' ?>" alt="Profile Background" class="absolute w-auto h-full object-cover z-0">

          <!-- Content Wrapper for Flexbox -->
          <div class="relative z-10 w-full flex flex-col md:flex-row justify-between p-8 md:p-9 h-full bg-gradient-to-t from-black from-10% via-transparent via-30%  to-transparent to-90%">

            <!-- Left Content (Name and Position) -->
            <div class="text-white my-auto mb-8 md:mb-0">
              <h1 class="text-base md:text-lg lg:text-xl font-bold mb-6"><?= $results['nama'] ?? '-' ?></h1>
              <h2 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-2 leading-tight w- 9/12 sm:w-2/3"><?= $results['judul'] ?? '-' ?></h2>
            </div>

            <?php
            $latarBelakangPendidikan = json_decode($results['latar_belakang_pendidikan'] ?? '[]');
            $penghargaan = json_decode($results['penghargaan'] ?? '[]');
            ?>

            <!-- Right Content (Educational Background and Awards) -->
            <div class="text-white text-left self-end h-fit">
              <h3 class="text-sm mb-4 font-bold">Latar Belakang Pendidikan:</h3>
              <ul class="list-disc list-inside mb-4 space-y-2">
                <?php if (!empty($latarBelakangPendidikan)) : ?>
                  <?php foreach (json_decode($results['latar_belakang_pendidikan']) as $list_latar_belakang) : ?>
                    <li class="text-xs"><?= $list_latar_belakang ?></li>
                  <?php endforeach ?>
                <?php else : ?>
                  <li class="text-xs">-</li>
                <?php endif; ?>
              </ul>
              <h3 class="text-sm font-bold">Penghargaan:</h3>
              <ul class="list-disc list-inside mb-4 space-y-2">
                <?php if (!empty($penghargaan)) : ?>
                  <?php foreach (json_decode($results['penghargaan']) as $list_penghargaan) : ?>
                    <li class="text-xs"><?= $list_penghargaan ?></li>
                  <?php endforeach ?>
                <?php else : ?>
                  <li class="text-xs">-</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </section>

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
  </div>
</section>

<!-- Edit Data Profil-->
<section class="mx-5 sm:mx-10 bg-base-100 shadow-lg rounded-lg p-10 mb-5">

  <form action="<?= base_url() ?>api/admin/profil/edit/<?= $results['id_profil'] ?>" method="POST" enctype="multipart/form-data">

    <!-- Title & Edit Button -->
    <div class="flex justify-between items-center w-full">
      <div class="text-xl font-bold">Edit Data Profil</div>
      <button type="submit" class="btn w-20 sm:w-32 btn-neutral">Edit</button>
    </div>

    <div class="divider"></div>

    <!-- Form -->
    <div class="flex flex-col xl:flex-row gap-4">

      <input type="hidden" name="link_gambar_edit_old" value="<?= $results['link_gambar'] ?>">

      <div class="w-full">
        <div class="flex flex-col sm:flex-row gap-3 justify-center w-full mb-3">

          <div class="w-full">
            <label class="input input-bordered flex items-center gap-2 w-full <?= (isset($errors['nama_edit'])) ? 'input-error' : 'mb-3' ?>"> <span class=" font-bold">Nama</span>
              <input name="nama_edit" type="text" class="grow w-full" placeholder="Nama" value="<?= old('nama_edit', htmlspecialchars($results['nama'])) ?>" />
            </label>
            <?php if (isset($errors['nama_edit'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['nama_edit'] ?></span></div>
            <?php endif ?>
          </div>

          <div class="w-full">
            <label class="input input-bordered flex items-center gap-2 w-full <?= (isset($errors['judul_edit'])) ? 'input-error' : 'mb-3' ?>"> <span class=" font-bold">Judul</span>
              <input name="judul_edit" type="text" class="grow w-full" placeholder="Judul" value="<?= old('judul_edit', htmlspecialchars($results['judul'])) ?>" />
            </label>
            <?php if (isset($errors['judul_edit'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['judul_edit'] ?></span></div>
            <?php endif ?>
          </div>

        </div>
        <div class="flex flex-col sm:flex-row  gap-3 justify-center mb-3">

          <script>
            // Function to add input field for Latar Belakang
            function addInputLatarBelakang() {
              const formContainer = document.getElementById("formContainerLatarBelakang");

              const newDiv = document.createElement("div");
              newDiv.classList.add("join", "gap-3", "w-full");

              const newInput = document.createElement("input");
              newInput.type = "text";
              newInput.name = "latar_belakang_pendidikan_edit[]";
              newInput.placeholder = "Type here";
              newInput.classList.add("input", "input-bordered", "w-full", "mb-3");

              newDiv.appendChild(newInput);
              formContainer.appendChild(newDiv);
            }

            // Function to remove the last input field for Latar Belakang
            function removeInputLatarBelakang() {
              const formContainer = document.getElementById("formContainerLatarBelakang");
              if (formContainer.children.length > 0) {
                formContainer.removeChild(formContainer.lastElementChild);
              }
            }

            // Function to add input field for Penghargaan
            function addInputPenghargaan() {
              const formContainer = document.getElementById("formContainerPenghargaan");

              const newDiv = document.createElement("div");
              newDiv.classList.add("join", "gap-3", "w-full");

              const newInput = document.createElement("input");
              newInput.type = "text";
              newInput.name = "penghargaan_edit[]";
              newInput.placeholder = "Type here";
              newInput.classList.add("input", "input-bordered", "w-full", "mb-3");

              newDiv.appendChild(newInput);
              formContainer.appendChild(newDiv);
            }

            // Function to remove the last input field for Penghargaan
            function removeInputPenghargaan() {
              const formContainer = document.getElementById("formContainerPenghargaan");
              if (formContainer.children.length > 0) {
                formContainer.removeChild(formContainer.lastElementChild);
              }
            }
          </script>

          <div class="w-full">
            <div class="flex justify-between items-center mb-3">
              <div class="text-md ml-4 font-bold">Latar Belakang Pendidikan : </div>
              <div class="flex gap-2">
                <button type="button" class="btn btn-sm text-xl font-bold" onclick="removeInputLatarBelakang()">--</button>
                <button type="button" class="btn btn-sm text-xl font-bold" onclick="addInputLatarBelakang()">+</button>
              </div>
            </div>

            <div id="formContainerLatarBelakang">
              <?php if (isset($results['latar_belakang_pendidikan'])): ?>
                <?php foreach (json_decode($results['latar_belakang_pendidikan']) as $inputValue): ?>
                  <input type="text" name="latar_belakang_pendidikan_edit[]" value="<?= htmlspecialchars($inputValue); ?>" class="input input-bordered w-full mb-3 <?= (isset($errors['latar_belakang_pendidikan_edit'])) ? 'input-error' : '' ?>" />
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>


          <div class="w-full ">
            <div class="flex justify-between items-center mb-3">
              <div class="text-md ml-4 font-bold">Penghargaan : </div>
              <div class="flex gap-2">
                <button type="button" class="btn btn-sm text-xl font-bold" onclick="removeInputPenghargaan()">--</button>
                <button type="button" class="btn btn-sm text-xl font-bold" onclick="addInputPenghargaan()">+</button>
              </div>
            </div>

            <div id="formContainerPenghargaan">
              <?php if (isset($results['penghargaan'])): ?>
                <?php foreach (json_decode($results['penghargaan']) as $inputValue): ?>
                  <div class="join gap-3 w-full">
                    <input type="text" name="penghargaan_edit[]" value="<?= htmlspecialchars($inputValue); ?>" class="input input-bordered w-full mb-3" />
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>


        </div>
      </div>

      <div class="w-full sm:w-4/12">
        <input id="img-input-admin-profil" name="link_gambar_edit" type="file" class="file-input file-input-bordered w-full <?= (isset($errors['link_gambar_edit'])) ? 'input-error' : 'mb-4' ?>" onchange=" previewImgAdminProfil()" />
        <?php if (isset($errors['link_gambar_edit'])) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $errors['link_gambar_edit'] ?></span></div>
        <?php endif ?>
        <div class="relative border bg-neutral w-full">
          <img id="img-preview-admin-profil" class="w-full h-auto" src="<?= base_url() ?>img/profile/<?= $results['link_gambar'] ?? 'img/icon/default-image.jpg' ?>" alt="">
          <div class="absolute bottom-0 left-0 right-0 z-10 h-2/4 bg-gradient-to-t from-black to-transparent"></div>
        </div>

        <script>
          function previewImgAdminProfil() {
            const cover = document.querySelector('#img-input-admin-profil');
            const imgPreview = document.querySelector('#img-preview-admin-profil');
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

    <!-- Content -->
    <div class="flex gap-3 justify-center mb-3 flex-col">
      <?php if (isset($errors['content_edit'])) : ?>
        <div class="label"><span class="label-text-alt text-error"><?= $errors['content_edit']; ?></span></div>
      <?php endif ?>
      <textarea class="textarea textarea-bordered w-full" placeholder="Bio" name="content_edit" id="content">
      <?php if (!empty($results['content'])) : ?>
        <?= $results['content'] ?>
      <?php else : ?>
        <li class="text-xs">-</li>
      <?php endif; ?>
      </textarea>

      <script>
        CKEDITOR.config.width = '100%'
        CKEDITOR.config.height = '900'
        CKEDITOR.replace('content');
      </script>
    </div>

  </form>

</section>

<?php $this->endSection(); ?>
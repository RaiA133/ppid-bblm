<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>
<!-- Hero -->
<section class="relative h-screen w-full bg-neutral flex items-center justify-center mb-5 sm:mb-10">
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
    $content = json_decode($results['content'] ?? '[]');
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

<section>
  <div class="mx-5 sm:mx-10 bg-base-100 shadow-lg rounded-lg p-10 mb-5">

    <div class="flex justify-between items-center w-full">
      <div class="text-xl font-bold">Edit Data Profil</div>
      <button type="submit" class="btn btn-neutral">Submit</button>
    </div>

    <div class="divider"></div>

    <div class="flex gap-4">
      <div class="w-9/12">
        <div class="flex gap-3 justify-center mb-3">
          <label class="input input-bordered flex items-center gap-2 w-full mb-3"> <span class="font-bold">Nama</span>
            <input type="text" class="grow" placeholder="Nama" value="<?= $results['nama'] ?>" />
          </label>

          <label class="input input-bordered flex items-center gap-2 w-full mb-3"> <span class="font-bold">Judul</span>
            <input type="text" class="grow" placeholder="Judul" value="<?= $results['judul'] ?>" />
          </label>
        </div>
        <div class="flex gap-3 justify-center mb-3">

          <script>
            // Function to add input field for Latar Belakang
            function addInputLatarBelakang() {
              const formContainer = document.getElementById("formContainerLatarBelakang");

              const newDiv = document.createElement("div");
              newDiv.classList.add("join", "gap-3", "w-full");

              const newInput = document.createElement("input");
              newInput.type = "text";
              newInput.name = "inputsLatarBelakang[]";
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
              newInput.name = "inputsPenghargaan[]";
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
                  <input type="text" name="inputsLatarBelakang[]" value="<?= htmlspecialchars($inputValue); ?>" class="input input-bordered w-full mb-3" />
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
                    <input type="text" name="inputsPenghargaan[]" value="<?= htmlspecialchars($inputValue); ?>" class="input input-bordered w-full mb-3" />
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>

          </form>

        </div>
      </div>
      <div class="w-3/12">
        <input name="link_gambar" type="file" class="file-input file-input-bordered w-full mb-4" />
        <div class="border bg-base-200 w-full">
          <img src="<?= base_url() ?>img/profile/<?= $results['link_gambar'] ?? '-' ?>" alt="">
        </div>
      </div>
    </div>

    <div class="divider"></div>

    <div class="flex gap-3 justify-center mb-3">
      <textarea class="textarea textarea-bordered w-full" placeholder="Bio" name="content" id="content"></textarea>
      <script>
        CKEDITOR.config.width = '100%'
        CKEDITOR.replace('content');
      </script>
    </div>

</section>

<!-- CONTENT -->
<!-- <section class="p-7 m-7 card bg-base-100" data-scroll data-scroll-speed="2">
  <div data-scroll data-scroll-speed="1">
    <?php if (!empty($content)) : ?>
      <?php foreach (json_decode($results['content']) as $list_content) : ?>
        <?= $list_content ?>
      <?php endforeach ?>
    <?php else : ?>
      <li class="text-xs">-</li>
    <?php endif; ?>
  </div>
</section> -->

<?php $this->endSection(); ?>
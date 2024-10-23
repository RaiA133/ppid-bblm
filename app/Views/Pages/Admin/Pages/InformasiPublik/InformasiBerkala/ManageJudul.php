<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message') ?>
<?php $errors = validation_errors() ?>

<!-- Flash Data / Notif -->
<?php if ($flashDataCreated) : ?>
  <div class="absolute top-3 w-fit left-4 transition-opacity duration-[5000ms] opacity-100" id="alertBox">
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

<div class="flex flex-col bg-base-200" id="header-home" data-scroll>

  <section class="container py-5 px-2 sm:px-5 md:px-7 mx-auto">
    <!-- Title and Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">

      <div class="my-2 flex justify-center w-full sm:w-fit">
        <?= $pager->links('informasi_berkala', 'daisyui_pagination'); ?>
      </div>

      <div class="flex items-center gap-2 flex-col sm:flex-row w-full sm:w-fit">

        <!-- Searching Data -->
        <div class="join">
          <form action="" method="GET" class="w-full">
            <input name="keyword" class="input input-bordered input-sm join-item" placeholder="Search" />
            <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
          </form>
        </div>

        <!-- Add Data -->
        <button class="btn px-4 sm:px-6 btn-sm normal-case btn-neutral text-neutral-content py-2 border w-fit" onclick="addDataInformasiBerkalaJudul.showModal()">Add Data</button>
        <?= $this->include('Pages/Admin/Pages/InformasiPublik/InformasiBerkala/ManageJudulCreate') ?> 
      </div>

    </div>

    <!-- Leads Table -->
    <div class="mt-5 overflow-x-auto w-full shadow-xl rounded-xl mb-5">
      <table class="table table-xs bg-base-100">
        <thead>
          <tr class="bg-base-300 text-base-900">
            <th class="text-center">No</th>
            <th class="p-2 sm:p-4 text-left">Judul</th>
            <th class="p-2 sm:p-4 text-left">Created At</th>
            <th class="p-2 sm:p-4 text-left">Updated At</th>
            <th class="p-2 sm:p-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $no = 1 + ($dataCountOnePage * ($currentPage - 1)); ?>
          <?php foreach ($results as $result) : ?>
            <tr class="border-b">
              <td class="text-center font-bold"><?= $no++ ?></td>
              <td class="w-fit">
                <p class="badge w-fit h-fit badge-outline text-xs"><?= $result['judul'] ?></p>
              </td>
              <td class="min-w-24"><?= $result['created_at'] ? $result['created_at'] : 'none' ?></td>
              <td class=""><?= $result['updated_at'] ? $result['updated_at'] : 'none' ?></td>

              <td class="">

                <!-- Modal untuk EDIT Data Informasi Berkala -->
                <a class="btn btn-xs btn-neutral w-14 mb-1 lg:xl-0" onclick="editDataInformasiBerkalaJudul<?= $result['id_informasi_berkala_judul'] ?>.showModal()">Edit</a>

                <?php if (session()->getFlashdata('openModalEditDataInformasiBerkalaJudul' . $result['id_informasi_berkala_judul'])): ?>
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      document.getElementById("editDataInformasiBerkalaJudul<?= $result['id_informasi_berkala_judul'] ?>").showModal();
                    });
                  </script>
                <?php endif; ?>

                <dialog id="editDataInformasiBerkalaJudul<?= $result['id_informasi_berkala_judul'] ?>" class="modal">
                  <div class="modal-box">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold">Edit <?= $title ?></h3>
                    <div class="divider"></div>
                    <div class="py-4">

                      <form action="<?= base_url() ?>api/admin/informasi-berkala/manage-judul/edit/<?= $result['id_informasi_berkala_judul'] ?>" method="post">

                        <input name="judul_edit" type="text" placeholder="Jenis Informasi" class="input input-bordered w-full <?= (isset($errors['judul_edit'])) ? 'input-error' : 'mb-3' ?>" value="<?= $result['judul'] ?>" />
                        <?php if (isset($errors['judul_edit'])) : ?>
                          <div class="label"><span class="label-text-alt text-error"><?= $errors['judul_edit'] ?></span></div>
                        <?php endif ?>

                        <button type="submit" class="btn btn-neutral mt-5">Edit</button>
                      </form>

                    </div>
                  </div>
                </dialog>
                <!-- END Modal untuk Edit Data Regulasi -->

                <!-- HTTP METHOD SPOOFING for Delete-->
                <form action="<?= base_url() ?>api/admin/informasi-berkala/manage-judul/delete/<?= $result['id_informasi_berkala_judul'] ?>" method="POST" class="inline">
                  <?= csrf_field() ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-xs btn-error" onclick="return confirm('Are you sure ?')">Delete</button>
                </form>
                <!-- END HTTP METHOD SPOOFING for Delete-->

              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>

  </section>

</div>

<?php $this->endSection(); ?>
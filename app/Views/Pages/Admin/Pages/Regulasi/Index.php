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
      <h1 class="text-lg sm:text-2xl font-semibold ml-1 sm:ml-4">Regulasi</h1>

      <div class="my-2 flex justify-center w-full sm:w-fit">
        <?= $pager->links('regulasi', 'daisyui_pagination'); ?>
      </div>

      <div class="flex items-center gap-2 flex-col sm:flex-row w-full sm:w-fit">
        <div class="join">
          <form action="" method="GET" class="w-full">
            <input name="keyword" class="input input-bordered input-sm join-item" placeholder="Search" />
            <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
          </form>
        </div>

        <button class="btn px-4 sm:px-6 btn-sm normal-case btn-neutral text-neutral-content py-2 border w-fit" onclick="addDataRegulasi.showModal()">Add Data</button>
        <?= $this->include('Pages/Admin/Pages/Regulasi/Create') ?> <!-- Load Modal Add Data -->
      </div>

    </div>

    <!-- Leads Table -->
    <div class="mt-5 overflow-x-auto w-full shadow-xl rounded-xl mb-5">
      <table class="table bg-base-100 text-sm">
        <thead>
          <tr class="bg-base-300 text-base-900">
            <th class="text-center">No</th>
            <th class="p-2 sm:p-4 text-left">Judul</th>
            <th class="p-2 sm:p-4 text-center">Dokumen</th>
            <th class="p-2 sm:p-4 text-left">Created At</th>
            <th class="p-2 sm:p-4 text-left">Updated At</th>
            <th class="p-2 sm:p-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $no = 1 + ($dataCountOnePage * ($currentPage - 1)); ?>
          <?php foreach ($results as $result) : ?>
            <tr class="border-b">
              <td class="text-center"><?= $no++ ?></td>
              <td class="p-2 sm:p-4 max-w-64 min-w-24 truncate ...">
                <div class="w-fit">
                  <p class=""><?= $result['judul'] ?></p>
                </div>
              </td>
              <td class="p-2 sm:p-4 w-fit text-center">
                <button class="btn btn-neutral btn-xs" onclick="modalLihatDokumen<?= $result['id_regulasi'] ?>.showModal(); loadPDF(<?= $result['id_regulasi'] ?>)">View</button>
                <dialog id="modalLihatDokumen<?= $result['id_regulasi'] ?>" class="modal">
                  <div class="modal-box w-11/12 max-w-5xl">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold"><?= $result['judul'] ?></h3>
                    <div class="py-4">
                      <a class="" target="_blank" href="<?= $result['link_drive'] ?>"><?= $result['link_drive'] ?></a>
                      <iframe src="" width="100%" height="600px" title="<?= $result['judul'] ?>" id="iframe<?= $result['id_regulasi'] ?>"></iframe>
                    </div>
                  </div>
                </dialog>
                
                <script> 
                  function loadPDF(id_regulasi) {  // Load Link For Iframe Only when View Button Clicked, to reduce alot of console error
                    const iframe = document.getElementById('iframe' + id_regulasi);
                    iframe.src = '<?= $result['link_drive'] ?>/preview';
                  }
                </script>

              </td>
              <td class="p-2 sm:p-4 min-w-24"><?= $result['created_at'] ? $result['created_at'] : 'none' ?></td>
              <td class="p-2 sm:p-4"><?= $result['updated_at'] ? $result['updated_at'] : 'none' ?></td>

              <td class="p-2 sm:p-4">

                <!-- Modal untuk EDIT Data Regulasi -->
                <a class="btn btn-xs btn-neutral w-14 mb-1 xl:mb-0" onclick="editDataRegulasi<?= $result['id_regulasi'] ?>.showModal()">Edit</a>

                <?php if (session()->getFlashdata('openModalEditDataRegulasi'. $result['id_regulasi'])): ?>
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      document.getElementById("editDataRegulasi<?= $result['id_regulasi'] ?>").showModal();
                    });
                  </script>
                <?php endif; ?>

                <dialog id="editDataRegulasi<?= $result['id_regulasi'] ?>" class="modal">
                  <div class="modal-box">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold">Edit <?= $title ?></h3>
                    <div class="divider"></div>
                    <div class="py-4">

                      <form action="<?= base_url() ?>/api/admin/regulasi/edit/<?= $result['id_regulasi'] ?>" method="post">
                        <input name="judul_edit" type="text" placeholder="Judul" class="input input-bordered w-full <?= ($validation?->hasError('judul_edit')) ? 'input-error' : 'mb-3' ?>" value="<?= $result['judul'] ?>" />
                        <?php if ($validation?->hasError('judul_edit')) : ?>
                          <div class="label"><span class="label-text-alt text-error"><?= $validation?->getError('judul_edit') ?></span></div>
                        <?php endif ?>

                        <input name="link_drive_edit" type="text" placeholder="Link Goggle Drive PDF" class="input input-bordered w-full <?= ($validation?->hasError('link_drive_edit')) ? 'input-error' : 'mb-3' ?>" value="<?= $result['link_drive'] ?>" />
                        <?php if ($validation?->hasError('link_drive_edit')) : ?>
                          <div class="label"><span class="label-text-alt text-error"><?= $validation?->getError('link_drive_edit') ?></span></div>
                        <?php endif ?>

                        <button type="submit" class="btn btn-neutral">Edit</button>
                      </form>

                    </div>
                  </div>
                </dialog>
                <!-- END Modal untuk Edit Data Regulasi -->

                <!-- HTTP METHOD SPOOFING for Delete-->
                <form action="<?= base_url() ?>api/admin/regulasi/delete/<?= $result['id_regulasi'] ?>" method="POST" class="inline">
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
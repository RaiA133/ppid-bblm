<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<div class="flex flex-col bg-base-200" id="header-home" data-scroll>

  <section class="container p-5 sm:p-10 lg:p-20">
    <!-- Title and Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
      <h1 class="text-lg sm:text-2xl font-semibold ml-4">Regulasi</h1>

      <form action="" method="GET">
        <div class="flex gap-2">
          <div class="join">
            <input name="keyword" class="input input-bordered input-sm join-item" placeholder="Search" />
            <div class="indicator">
              <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
            </div>
          </div>
          <button class="mt-4 sm:mt-0 btn px-4 sm:px-6 btn-sm normal-case btn-neutral text-neutral-content py-2">Add Data</button>
        </div>
      </form>

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
                <button class="btn btn-neutral btn-xs" onclick="modalLihatDokumen<?= $result['id_regulasi'] ?>.showModal()">View</button>
                <dialog id="modalLihatDokumen<?= $result['id_regulasi'] ?>" class="modal">
                  <div class="modal-box w-11/12 max-w-5xl">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold"><?= $result['judul'] ?></h3>
                    <div class="py-4">
                      <iframe src="<?= $result['link_drive'] ?>/preview" width="100%" height="600px"></iframe>
                    </div>
                  </div>
                </dialog>
              </td>
              <td class="p-2 sm:p-4">03 Oct 23</td>
              <td class="p-2 sm:p-4">none</td>
              <td class="p-2 sm:p-4">
                <button class="btn btn-xs btn-neutral">Edit</button>
                <button class="btn btn-xs btn-error">Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>

    <div class="flex justify-center">
      <?= $pager->links('regulasi', 'daisyui_pagination'); ?>
    </div>

  </section>

</div>

<?php $this->endSection(); ?>
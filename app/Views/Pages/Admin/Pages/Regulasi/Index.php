<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message') ?>

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

  <section class="container p-5 sm:p-10 lg:p-20">
    <!-- Title and Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
      <h1 class="text-lg sm:text-2xl font-semibold ml-4">Regulasi</h1>

      <div class="flex gap-2">
        <div class="join">
          <form action="" method="GET">
            <input name="keyword" class="input input-bordered input-sm join-item" placeholder="Search" />
            <div class="indicator">
              <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
            </div>
          </form>
        </div>
        <button class="mt-4 sm:mt-0 btn px-4 sm:px-6 btn-sm normal-case btn-neutral text-neutral-content py-2" onclick="addDataRegulasi.showModal()">Add Data</button>
        <?= $this->include('Pages/Admin/Pages/Regulasi/Create') ?>
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
              <td class="p-2 sm:p-4"><?= $result['created_at'] ?></td>
              <td class="p-2 sm:p-4"><?= $result['updated_at'] ? $result['updated_at'] : 'none' ?></td>
              <td class="p-2 sm:p-4">
                <a class="btn btn-xs btn-neutral">Edit</a>

                <form action="<?= base_url() ?>api/admin/regulasi/delete/<?= $result['id_regulasi'] ?>" method="POST" class="inline">
                  <?= csrf_field() ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-xs btn-error" onclick="return confirm('Are you sure ?')">Delete</button>
                </form>

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
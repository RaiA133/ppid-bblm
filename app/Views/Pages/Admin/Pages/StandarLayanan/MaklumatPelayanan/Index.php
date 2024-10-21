<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message'); ?>

<!-- Flash Data / Notif -->
<?php if (!empty($flashDataCreated)) : ?>
  <div class="absolute top-3 w-fit left-4 transition-opacity duration-[5000ms] opacity-100" id="alertBox">
    <div role="alert" class="alert shadow-lg bg-base-100 pr-6">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span><?= esc($flashDataCreated['title']) ?></span>
    </div>
  </div>
  <script>
    setTimeout(function() {
      document.getElementById('alertBox').classList.add('opacity-0');
    }, 5000);
  </script>
<?php endif; ?>

<div class="flex flex-col bg-base-200" id="header-home" data-scroll>

  <section class="container py-5 px-2 sm:px-5 md:px-7 mx-auto">
    <!-- Title and Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
      <h1 class="text-lg sm:text-2xl font-semibold ml-1 sm:ml-4">Maklumat Pelayanan</h1>

      <div class="my-2 flex justify-center w-full sm:w-fit">
        <?= $pager->links('maklumat_pelayanan', 'daisyui_pagination'); ?>
      </div>

      <div class="flex items-center gap-2 flex-col sm:flex-row w-full sm:w-fit">
        <div class="join">
          <form action="" method="GET" class="w-full">
            <input name="keyword" value="<?= esc($keyword) ?>" class="input input-bordered input-sm" placeholder="Search" />
            <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
          </form>
        </div>

        <button class="btn px-4 sm:px-6 btn-sm normal-case btn-neutral text-neutral-content py-2 border w-fit" onclick="addDataMaklumatPelayanan.showModal()">Add Data</button>
        <?= $this->include('Pages/Admin/Pages/StandarLayanan/MaklumatPelayanan/Create') ?> <!-- Load Modal Add Data -->
      </div>
    </div>

    <!-- Leads Table -->
    <div class="mt-5 overflow-x-auto w-full shadow-xl rounded-xl mb-5">
      <table class="table bg-base-100 text-sm">
        <thead>
          <tr class="bg-base-300 text-base-900">
            <th class="text-center">No</th>
            <th class="p-2 sm:p-4 text-left">Gambar</th>
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
              <td class="p-2 sm:p-4">
                <img src="<?= esc(base_url($result['link_gambar'])) ?>" alt="Maklumat Pelayanan Image" width="100">
              </td>
              <td class="p-2 sm:p-4"><?= $result['created_at'] ?? 'none' ?></td>
              <td class="p-2 sm:p-4"><?= $result['updated_at'] ?? 'none' ?></td>

              <td class="p-2 sm:p-4">
                <?php if (isset($result['id_maklumat_pelayanan'])): ?>
                  <a class="btn btn-xs btn-neutral" onclick="editDataMaklumatPelayanan<?= $result['id_maklumat_pelayanan'] ?>.showModal()">Edit</a>

                  <?php if (session()->getFlashdata('openModalEditDataMaklumatPelayanan' . $result['id_maklumat_pelayanan'])): ?>
                    <script>
                      document.addEventListener("DOMContentLoaded", function() {
                        document.getElementById("editDataMaklumatPelayanan<?= $result['id_maklumat_pelayanan'] ?>").showModal();
                      });
                    </script>
                  <?php endif; ?>

                  <!-- Edit Modal -->
                  <dialog id="editDataMaklumatPelayanan<?= $result['id_maklumat_pelayanan'] ?>" class="modal">
                    <div class="modal-box">
                      <h3 class="text-lg font-bold">Edit Maklumat Pelayanan</h3>
                      <div class="divider"></div>
                      <div class="py-4">
                        <form action="<?= base_url('api/admin/maklumat-pelayanan/update/' . $result['id_maklumat_pelayanan']) ?>" method="POST" enctype="multipart/form-data">
                          <?= csrf_field() ?>

                          <!-- <div class="mb-4">
                            <label for="judul_edit" class="label">Id:</label>
                            <input type="text" name="judul_edit" class="input input-bordered w-full" value="<?= esc($result['id_maklumat_pelayanan']) ?>" required>
                          </div> -->

                          <div class="mb-4">
                            <label for="link_gambar_edit" class="label font-normal text-xs">Link Gambar:</label>
                            <input type="file" name="link_gambar_edit" class="file-input file-input-bordered w-full">
                            <!-- <img src="<?= esc(base_url($result['link_gambar'])) ?>" alt="Gambar Sebelumnya" width="100" class="mt-2"> -->
                          </div>

                          <div class="mb-4">
                            <label for="content_edit" class="label">Konten:</label>
                            <textarea name="content_edit" class="textarea textarea-bordered w-full" required><?= esc($result['content']) ?></textarea>
                          </div>

                          <div class="flex justify-start">
                            <button type="submit" class="btn btn-neutral">Update</button>
                            <button type="button" onclick="this.closest('dialog').close()" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </dialog>


                  <!-- HTTP METHOD SPOOFING for Delete-->
                  <form action="<?= base_url() ?>api/admin/maklumat-pelayanan/delete/<?= $result['id_maklumat_pelayanan'] ?>" method="POST" class="inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-error" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                  <!-- END HTTP METHOD SPOOFING for Delete-->
                <?php else: ?>
                  <span class="text-gray-500">ID not available</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</div>

<?php $this->endSection(); ?>
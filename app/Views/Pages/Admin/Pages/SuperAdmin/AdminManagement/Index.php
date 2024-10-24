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
        <?= $pager->links('admin_management', 'daisyui_pagination'); ?>
      </div>

      <div class="flex items-center gap-2 flex-col sm:flex-row w-full sm:w-fit">
        <div class="join">
          <form action="" method="GET" class="w-full">
            <input name="keyword" class="input input-bordered input-sm join-item" placeholder="Search" />
            <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
          </form>
        </div>

      </div>

    </div>

    <!-- Leads Table -->
    <div class="mt-5 overflow-x-auto w-full shadow-xl rounded-xl mb-5">
      <table class="table bg-base-100 text-sm">
        <thead>
          <tr class="bg-base-300 text-base-900">
            <th class="text-center">No</th>
            <th class="p-2 sm:p-4 text-left">Email</th>
            <th class="p-2 sm:p-4 text-left">Username</th>
            <th class="p-2 sm:p-4 text-ledt">Image</th>
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
              <td class="p-2 sm:p-4 max-w-64 min-w-24 truncate ...">
                <div class="w-fit">
                  <p class=""><?= $result->email ?></p>
                </div>
              </td>
              <td class="p-2 sm:p-4 w-fit text-center">
                <div class="w-fit">
                  <p class=""><?= $result->username ?></p>
                </div>
              </td>
              <td class="p-2 sm:p-4 w-fit text-center">
                <div class="w-fit">
                  <div class="w-10 rounded-full">
                    <img src="<?= base_url('img/icon/') . $result->user_image ?? 'default-profile.jpg' ?>" alt="profile" />
                  </div>
                </div>
              </td>
              <td class="p-2 sm:p-4 min-w-24"><?= $result->created_at ? $result->created_at : 'none' ?></td>
              <td class="p-2 sm:p-4"><?= $result->updated_at ? $result->updated_at : 'none' ?></td>

              <td class="p-2 sm:p-4">

                <!-- Modal untuk EDIT Data AdminManagement -->
                <a class="btn btn-xs btn-neutral w-14 mb-1 xl:mb-0" onclick="editDataAdminManagement<?= $result->id ?>.showModal()">Edit</a>

                <?php if (session()->getFlashdata('openModalEditDataAdminManagement' . $result->id)): ?>
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      document.getElementById("editDataAdminManagement<?= $result->id ?>").showModal();
                    });
                  </script>
                <?php endif; ?>

                <dialog id="editDataAdminManagement<?= $result->id ?>" class="modal">
                  <div class="modal-box">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold">Edit <?= $title ?></h3>
                    <div class="divider"></div>
                    <div class="py-4">

                      <form action="<?= base_url() ?>/api/admin/admin-management/edit/<?= $result->id ?>" method="post">
                        <input name="email_edit" type="email" placeholder="Judul" class="input input-bordered w-full <?= (isset($errors['email_edit'])) ? 'input-error' : 'mb-3' ?>" value="<?= $result->email ?>" />
                        <?php if (isset($errors['email_edit'])) : ?>
                          <div class="label"><span class="label-text-alt text-error"><?= $errors['email_edit'] ?></span></div>
                        <?php endif ?>

                        <button type="submit" class="btn btn-neutral">Edit</button>
                      </form>

                    </div>
                  </div>
                </dialog>
                <!-- END Modal untuk Edit Data admin-management -->

                <!-- HTTP METHOD SPOOFING for Delete-->
                <form action="<?= base_url() ?>api/admin/admin-management/delete/<?= $result->id ?>" method="POST" class="inline">
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
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
      <span class="text-sm"><?= $flashDataCreated['title'] ?></span>
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
          <!-- Filter Data By Judul -->
          <form action="" method="GET" class="w-fit">
            <select name="role" class="select select-bordered select-sm w-fit text-xs" onchange="this.form.submit()">
              <option selected value="">All</option>
              <?php foreach ($roleList as $list) : ?>
                <option value="<?= $list->role ?>" <?= ($request->getVar('role') == $list->role) ? 'selected' : '' ?>><?= $list->role ?></option>
              <?php endforeach; ?>
            </select>
          </form>

          <form action="" method="GET" class="w-full">
            <input name="keyword" class="input input-bordered input-sm join-item" placeholder="Search" />
            <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
          </form>
        </div>

      </div>

    </div>

    <!-- Leads Table -->
    <div class="mt-5 overflow-x-auto w-full shadow-xl rounded-xl mb-5">
      <table class="table table-xs bg-base-100 text-sm">
        <thead>
          <tr class="bg-base-300 text-base-900">
            <th class="text-center">No</th>
            <th class="p-2 sm:p-4 text-left">Email</th>
            <th class="p-2 sm:p-4 text-left">Username</th>
            <th class="p-2 sm:p-4 text-ledt">Image</th>
            <th class="p-2 sm:p-4 text-ledt">Role</th>
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

                <?php
              $userImagePath = 'img/userProfilePics/' . $result->user_image;
              if (file_exists(FCPATH . $userImagePath) && !empty($result->user_image)) $profileImage = base_url($userImagePath);
              else $profileImage = base_url('img/icon/default-profile.jpg');
              ?>
 

                <div class="w-fit" onclick="viewImageProfile<?= $result->userid ?>.showModal()">
                  <div class="w-10 rounded-full">
                    <img src="<?= $profileImage ?>" alt="profile" />
                  </div>
                </div>

                <dialog id="viewImageProfile<?= $result->userid ?>" class="modal">
                  <div class="modal-box">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <div class="w-full rounded-full">
                      <img src="<?= $profileImage ?>" alt="profile" />
                    </div>
                  </div>
                </dialog>

              </td>
              <td class=" p-2 sm:p-4 w-fit text-center">
                <div class="w-fit">
                  <p class=""><?= $result->role ? $result->role : '-' ?></p>
                </div>
              </td>
              <td class="p-2 sm:p-4 min-w-24"><?= $result->created_at ? $result->created_at : 'none' ?></td>
              <td class="p-2 sm:p-4"><?= $result->updated_at ? $result->updated_at : 'none' ?></td>

              <td class="p-2 sm:p-4">

                <!-- Modal untuk EDIT Data AdminManagement -->
                <a class="btn btn-xs btn-neutral w-14 mb-1 2xl:mb-0" onclick="editDataAdminManagement<?= $result->userid ?>.showModal()">Edit</a>

                <?php if (session()->getFlashdata('openModalEditDataAdminManagement' . $result->userid)): ?>
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      document.getElementById("editDataAdminManagement<?= $result->userid ?>").showModal();
                    });
                  </script>
                <?php endif; ?>

                <dialog id="editDataAdminManagement<?= $result->userid ?>" class="modal">
                  <div class="modal-box w-10/12 max-w-4xl">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold">Edit <?= $title ?></h3>
                    <div class="divider"></div>
                    <div class="mb-4 flex gap-4">

                      <div class="w-8/12">
                        <form action="<?= base_url() ?>api/admin/admin-management/edit/<?= $result->userid ?>" method="POST" enctype="multipart/form-data">

                          <input type="hidden" name="user_image_edit_old" value="<?= user()->user_image ?>">

                          <label class="form-control w-full">
                            <div class="label"><span class="label-text">Email : </span></div>
                            <input name="email_edit" type="email" disabled placeholder="Judul" class="input input-bordered w-full <?= (isset($errors['email_edit'])) ? 'input-error' : '' ?>" value="<?= $result->email ?>" />
                            <?php if (isset($errors['email_edit'])) : ?>
                              <div class="label"><span class="label-text-alt text-error"><?= $errors['email_edit'] ?></span></div>
                            <?php endif ?>
                          </label>

                          <label class="form-control w-full">
                            <div class="label"><span class="label-text">Username : </span></div>
                            <input name="username_edit" type="text" placeholder="Judul" class="input input-bordered w-full <?= (isset($errors['username_edit'])) ? 'input-error' : '' ?>" value="<?= $result->username ?>" />
                            <?php if (isset($errors['username_edit'])) : ?>
                              <div class="label"><span class="label-text-alt text-error"><?= $errors['username_edit'] ?></span></div>
                            <?php endif ?>
                          </label>

                          <label class="form-control w-full">
                            <div class="label"><span class="label-text">Role : </span></div>
                            <select name="role_edit" class="select select-bordered w-full <?= (isset($errors['role_edit'])) ? 'input-error' : '' ?>">
                              <?php foreach ($roleList as $list) : ?>
                                <option value="<?= $list->id ?>" <?= ($list->id == $result->roleid) ? 'selected' : '' ?>>
                                  <?= $list->role ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['role_edit'])) : ?>
                              <div class="label"><span class="label-text-alt text-error"><?= $errors['role_edit'] ?></span></div>
                            <?php endif ?>
                          </label>

                          <button type="submit" class="btn btn-neutral mt-5">Edit</button>
                        </form>
                      </div>

                      <div class="w-4/12">
                        <label class="form-control w-full">
                          <div class="label"><span class="label-text">Image : </span></div>
                          <input id="img-edit-admin-profil" name="user_image_edit" disabled type="file" class="file-input file-input-bordered w-full <?= (isset($errors['user_image_edit'])) ? 'input-error' : 'mb-4' ?>" onchange=" previewImgAdminManagementProfil()" />
                          <?php if (isset($errors['user_image_edit'])) : ?>
                            <div class="label"><span class="label-text-alt text-error"><?= $errors['user_image_edit'] ?></span></div>
                          <?php endif ?>
                        </label>

                        <div class="relative border bg-neutral w-full">
                          <img id="img-edit-preview-admin-profil" class="w-full h-auto" src="<?= base_url() ?>img/profile/users/<?= $result->user_image ?? 'img/icon/default-profile.jpg' ?>" alt="">
                          <div class="absolute bottom-0 left-0 right-0 z-10 h-2/4"></div>
                        </div>

                        <script>
                          function previewImgAdminManagementProfil() {
                            const cover = document.querySelector('#img-edit-admin-profil');
                            const imgPreview = document.querySelector('#img-edit-preview-admin-profil');
                            const fileCover = new FileReader();
                            fileCover.readAsDataURL(cover.files[0]);
                            fileCover.onload = function(e) {
                              imgPreview.src = e.target.result;
                            }
                          }
                        </script>
                      </div>

                    </div>
                  </div>
                </dialog>
                <!-- END Modal untuk Edit Data admin-management -->

                <!-- HTTP METHOD SPOOFING for Delete-->
                <?php if ($result->role !== 'superadmin') : ?>  <!-- Tombol Delete User hanya bisa digunakan untuk role user & admin -->
                  <form action="<?= base_url() ?>api/admin/admin-management/delete/<?= $result->userid ?>" method="POST" class="inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-xs btn-error" onclick="return confirm('Are you sure ?')">Delete</button>
                  </form>
                <?php endif; ?>
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
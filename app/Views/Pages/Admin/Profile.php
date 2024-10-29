<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message'); ?>
<?php $errors = validation_errors(); ?>

<!-- Flash Data / Notif -->
<?php if ($flashDataCreated) : ?>
  <div class="z-10 absolute top-2 w-fit left-8 transition-opacity duration-[5000ms] opacity-100" id="alertBox">
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

<div class="flex flex-col bg-base-200 py-10" id="header-home" data-scroll>

  <section class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-base-100 shadow-md rounded-lg p-6">

      <form action="<?= base_url() ?>api/admin/profil/user/edit/<?= user_id() ?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="user_image_edit_old" value="<?= user()->user_image ?>">

        <div class="flex justify-between items-center">
          <h2 class="text-2xl font-semibold">Profile</h2>
          <div class="col-span-1 md:col-span-2 lg:col-span-1 flex items-center gap-4 justify-between">
            <button type="submit" class="btn btn-sm w-32 md:w-auto lg:w-auto btn-neutral px-4 py-2 text-neutral-content font-semibold rounded-md">
              Update
            </button>
          </div>
        </div>

        <div class="divider"></div>

        <div class="flex flex-col md:flex-row w-full gap-6">
          <div class="w-full">
            <div class="mb-3">
              <label class="block text-sm font-medium text-base-700 mb-1">Username :</label>
              <input type="text" name="username_edit" class="input input-bordered w-full rounded-md <?= (isset($errors['username_edit'])) ? 'input-error' : 'mb-3' ?>" value="<?= user()->username ?>" />
              <?php if (isset($errors['username_edit'])) : ?>
                <div class="label"><span class="label-text-alt text-error"><?= $errors['username_edit'] ?></span></div>
              <?php endif ?>
            </div>
            <div class="mb-3">
              <label class="block text-sm font-medium text-base-700 mb-1">Email :</label>
              <input type="Email" name="email_edit" class="input input-bordered w-full rounded-md <?= (isset($errors['email_edit'])) ? 'input-error' : 'mb-3' ?>" value="<?= user()->email ?>" />
              <?php if (isset($errors['email_edit'])) : ?>
                <div class="label"><span class="label-text-alt text-error"><?= $errors['email_edit'] ?></span></div>
              <?php endif ?>
            </div>
            <div class="mb-3">
              <label class="block text-sm font-medium text-base-700 mb-1">Profile Picture :</label>
              <input type="file" name="user_image_edit" class="file-input file-input-bordered w-full rounded-md <?= (isset($errors['user_image_edit'])) ? 'input-error' : 'mb-3' ?>" value="<?= user()->user_image ?>" id="img-input-admin-profile" onchange=" previewImgAdminProfile()" />
              <?php if (isset($errors['user_image_edit'])) : ?>
                <div class="label"><span class="label-text-alt text-error"><?= $errors['user_image_edit'] ?></span></div>
              <?php endif ?>
            </div>
          </div>
          <div class="flex justify-center">
            <div class="w-64 rounded-full">
              <?php
                $userImagePath = 'img/userProfilePics/' . user()->user_image;
                if (file_exists(FCPATH . $userImagePath) && !empty(user()->user_image)) $profileImage = base_url($userImagePath);
                else $profileImage = base_url('img/icon/default-profile.jpg');
              ?>
              <img
                src="<?= $profileImage ?>"
                alt="profile"
                id="img-preview-admin-profile" />
            </div>
          </div>

          <script>
            function previewImgAdminProfile() {
              const cover = document.querySelector('#img-input-admin-profile');
              const imgPreview = document.querySelector('#img-preview-admin-profile');
              const fileCover = new FileReader();
              fileCover.readAsDataURL(cover.files[0]);
              fileCover.onload = function(e) {
                imgPreview.src = e.target.result;
              }
            }
          </script>

        </div>

      </form>

    </div>
  </section>

</div>

<?php $this->endSection(); ?>
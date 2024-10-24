<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<div class="flex flex-col bg-base-200 py-10" id="header-home" data-scroll>

  <section class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-base-100 shadow-md rounded-lg p-6">

      <form action="">

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
              <input type="text" class="input input-bordered w-full rounded-md" value="<?= user()->username ?>" />
            </div>
            <div class="mb-3">
              <label class="block text-sm font-medium text-base-700 mb-1">Email :</label>
              <input type="Email" class="input input-bordered w-full rounded-md" value="<?= user()->email ?>" />
            </div>
            <div class="mb-3">
              <label class="block text-sm font-medium text-base-700 mb-1">Profile Picture :</label>
              <input type="file" class="file-input file-input-bordered w-full rounded-md" value="<?= user()->user_image ?>" id="img-input-admin-profile" onchange=" previewImgAdminProfile()"/>
            </div>
          </div>
          <div class="flex justify-center">
            <div class="w-64 rounded-full">
              <img src="<?= base_url('img/icon/') . user()->user_image ?>" alt="profile" id="img-preview-admin-profile" />
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
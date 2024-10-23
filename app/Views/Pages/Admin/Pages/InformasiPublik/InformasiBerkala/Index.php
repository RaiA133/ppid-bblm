<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message') ?>
<?php $errors = validation_errors() ?>

<style>
  .table .informasi a {
    text-decoration: underline;
    color: blue;
  }
</style>

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

        <div class="join">

          <!-- Filter Data By Judul -->
          <form action="" method="GET" class="w-fit">
            <select name="judul" class="select select-bordered select-sm w-fit" onchange="this.form.submit()">
              <option selected value="">All</option>
              <?php foreach ($informasiBerkalaJudul as $list) : ?>
                <option value="<?= $list['judul'] ?>" <?= ($request->getVar('judul') == $list['judul']) ? 'selected' : '' ?>><?= $list['judul'] ?></option>
              <?php endforeach; ?>
            </select>
          </form>

          <!-- Modal tambah data Judul -->
          <a class="btn btn-sm btn-neutral" href="<?= base_url() ?>admin/informasi-berkala/manage-judul">
            <img style="width: 20px;" src="<?= base_url() ?>img/icon/gear-icon.svg" alt="Logo MIDC">
          </a>

        </div>

        <!-- Searching Data -->
        <div class="join">
          <form action="" method="GET" class="w-full">
            <input name="keyword" class="input input-bordered input-sm join-item" placeholder="Search" />
            <button type="submit" class="btn btn-sm btn-neutral join-item">Search</button>
          </form>
        </div>

        <!-- Add Data -->
        <button class="btn px-4 sm:px-6 btn-sm normal-case btn-neutral text-neutral-content py-2 border w-fit" onclick="addDataInformasiBerkala.showModal()">Add Data</button>
        <?= $this->include('Pages/Admin/Pages/InformasiPublik/InformasiBerkala/Create') ?> <!-- Load Modal Add Data -->
      </div>

    </div>

    <!-- Leads Table -->
    <div class="mt-5 overflow-x-auto w-full shadow-xl rounded-xl mb-5">
      <table class="table table-xs bg-base-100">
        <thead>
          <tr class="bg-base-300 text-base-900">
            <th class="text-center">No</th>
            <th class="p-2 sm:p-4 text-left">Judul</th>
            <th class="p-2 sm:p-4 text-center">Jenis Informasi</th>
            <th class="p-2 sm:p-4 text-center">Informasi</th>
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
              <td class="max-w-fit">
                <p><?= $result['jenis_informasi'] ? $result['jenis_informasi'] : 'none' ?></p>
              </td>
              <td class="informasi max-w-64 min-w-24">
                <p><?= $result['informasi'] ? $result['informasi'] : 'none' ?></p>
              </td>
              <td class="min-w-24"><?= $result['created_at'] ? $result['created_at'] : 'none' ?></td>
              <td class=""><?= $result['updated_at'] ? $result['updated_at'] : 'none' ?></td>

              <td class="">

                <!-- Modal untuk EDIT Data Informasi Berkala -->
                <a class="btn btn-xs btn-neutral w-14 mb-1 lg:xl-0" onclick="editDataInformasiBerkala<?= $result['id_informasi_berkala'] ?>.showModal(); lazyLoadContent(<?= $result['id_informasi_berkala'] ?>)">Edit</a>

                <?php if (session()->getFlashdata('openModalEditDataInformasiBerkala' . $result['id_informasi_berkala'])): ?>
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      document.getElementById("editDataInformasiBerkala<?= $result['id_informasi_berkala'] ?>").showModal();
                      lazyLoadContent(<?= $result['id_informasi_berkala'] ?>)
                    });
                  </script>
                <?php endif; ?>
                

                <dialog id="editDataInformasiBerkala<?= $result['id_informasi_berkala'] ?>" class="modal">
                  <div class="modal-box w-11/12 max-w-5xl">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <h3 class="text-lg font-bold">Edit <?= $title ?></h3>
                    <div class="divider"></div>
                    <div class="py-4">

                      <form action="<?= base_url() ?>api/admin/informasi-berkala/edit/<?= $result['id_informasi_berkala'] ?>" method="post">

                        <select name="judul_edit" class="select select-bordered w-full mb-3">
                          <?php foreach ($informasiBerkalaJudul as $list) : ?>
                            <option value="<?= $list['id_informasi_berkala_judul'] ?>" <?= ($list['id_informasi_berkala_judul'] == $result['id_informasi_berkala_judul']) ? 'selected' : '' ?>>
                              <?= $list['judul'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>

                        <input name="jenis_informasi_edit" type="text" placeholder="Jenis Informasi" class="input input-bordered w-full <?= (isset($errors['jenis_informasi_edit'])) ? 'input-error' : 'mb-3' ?>" value="<?= $result['jenis_informasi'] ?>" />
                        <?php if (isset($errors['jenis_informasi_edit'])) : ?>
                          <div class="label"><span class="label-text-alt text-error"><?= $errors['jenis_informasi_edit'] ?></span></div>
                        <?php endif ?>

                        <textarea name="informasi_edit" class="textarea textarea-bordered w-full mb-3" placeholder="Bio" id="infomasi<?= $result['id_informasi_berkala'] ?>"><?= $result['informasi'] ?></textarea>
                        <?php if (isset($errors['informasi_edit'])) : ?>
                          <div class="label"><span class="label-text-alt text-error"><?= $errors['informasi_edit'] ?></span></div>
                        <?php endif ?>

                        <script>
                          function lazyLoadContent(id_informasi_berkala) {
                            CKEDITOR.config.width = '100%'
                            CKEDITOR.replace("infomasi" + id_informasi_berkala);
                          }
                        </script>

                        <button type="submit" class="btn btn-neutral mt-5">Edit</button>
                      </form>

                    </div>
                  </div>
                </dialog>
                <!-- END Modal untuk Edit Data Regulasi -->

                <!-- HTTP METHOD SPOOFING for Delete-->
                <form action="<?= base_url() ?>api/admin/informasi-berkala/delete/<?= $result['id_informasi_berkala'] ?>" method="POST" class="inline">
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
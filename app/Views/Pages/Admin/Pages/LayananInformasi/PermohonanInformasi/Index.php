<?php

use CodeIgniter\I18n\Time; ?>
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
        <?= $pager->links('permohonan_informasi', 'daisyui_pagination'); ?>
      </div>

      <div class="flex items-center gap-1 flex-col sm:flex-row w-full sm:w-fit">
        <div class="join">
          <form action="" method="GET" class="w-full">
            <?= csrf_field() ?>
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
            <th class="p-2 sm:p-4 text-center">Profile Pic</th>
            <th class="p-2 sm:p-4 text-left">Name</th>
            <th class="p-2 sm:p-4 text-center">Detail</th>
            <th class="p-2 sm:p-4 text-left">Created At</th>
            <th class="p-2 sm:p-4 text-left">Updated At</th>
            <th class="p-2 sm:p-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $no = 1 + ($dataCountOnePage * ($currentPage - 1)); ?>
          <?php foreach ($results as $result) : ?>
            <tr class="border-b border-base-300 <?= ($result['read']) ? 'bg-base-200' : '' ?>">
              <td class="text-center font-bold"><?= $no++ ?></td>



              <td class="p-2 sm:p-4 w-fit text-center" onclick="viewImageProfilePermohonanInformasi<?= $result['id_permohonan_informasi'] ?>.showModal()">
                <?php
                $userImagePath = 'img/userProfilePics/' . $result['user_image'];
                if (file_exists(FCPATH . $userImagePath) && !empty($result['user_image'])) $profileImage = base_url($userImagePath);
                else $profileImage = base_url('img/icon/default-profile.jpg');
                ?>
                <div class="w-10 h-10 rounded-full flex justify-center items-center mx-auto">
                  <img src="<?= esc($profileImage) ?>" alt="profile" class="rounded-full" />
                </div>

                <dialog id="viewImageProfilePermohonanInformasi<?= $result['id_permohonan_informasi'] ?>" class="modal modal-bottom sm:modal-middle">
                  <div class="modal-box">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <div class="rounded-full flex justify-center items-center mx-auto">
                      <img src="<?= esc($profileImage) ?>" alt="profile" />
                    </div>
                  </div>
                </dialog>
              </td>


              <td class="p-2 sm:p-4 max-w-64 min-w-24 truncate ...">
                <div class="w-fit">
                  <p class="flex gap-3 items-center"><?= esc($result['nama']) ?>
                    <?php if ($result['read'] === null && Time::parse($result['created_at'])->toDateString() === Time::today()->toDateString()) : ?>
                      <span class="badge badge-xs badge-accent">New</span>
                    <?php endif ?>
                  </p>
                </div>
              </td>

              <td class="p-2 sm:p-4 w-fit text-center">

                <form action="<?= base_url() ?>api/admin/permohonan-informasi/edit/<?= $result['id_permohonan_informasi'] ?>" method="post">
                  <button class="btn btn-neutral btn-xs" onclick="">Detail</button>
                </form>

                <?php if (session()->getFlashdata('openModalLihatPesanPermohonanInformasi' . $result['id_permohonan_informasi'])): ?>
                  <script>
                    document.addEventListener("DOMContentLoaded", function() {
                      document.getElementById("modalLihatPesanPermohonanInformasi<?= $result['id_permohonan_informasi'] ?>").showModal();
                    });
                  </script>
                <?php endif; ?>

                <dialog id="modalLihatPesanPermohonanInformasi<?= $result['id_permohonan_informasi'] ?>" class="modal modal-bottom sm:modal-middle">
                  <div class="modal-box">
                    <form method="dialog">
                      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <div class="py-4">
                      <div class="w-16 h-16 rounded-full flex justify-center items-center mx-auto mb-2">
                        <img src="<?= esc($profileImage) ?>" alt="profile" class="rounded-full" />
                      </div>
                      <div class="text-lg"><?= esc($result['nama']) ?></div>
                      <div><span class="font-medium">Email : </span><span class="italic"><?= esc($result['email']) ?></span></div>
                      <div><span class="font-medium">No Telp : </span><?= $result['no_telp'] ?></div>

                      <div class="divider">Detail</div>

                      <div class="flex justify-start flex-col">
                        <div class="overflow-x-auto">
                          <table class="table table-xs">
                            <tbody>
                              <tr>
                                <th>Alamat</th>
                                <td><?= $result['alamat'] ?></td>
                              </tr>
                              <tr>
                                <th>No Idetitas</th>
                                <td><?= $result['no_id'] ?></td>
                              </tr>
                              <tr>
                                <th>Tujuan Penggunaan Informasi</th>
                                <td><?= $result['tujuan_penggunaan_info'] ?></td>
                              </tr>
                              <tr>
                                <th>Cara Memperoleh Informasi</th>
                                <td><?= $result['cara_memperoleh_info'] ?></td>
                              </tr>
                              <tr>
                                <th>Jenis Dokumen Informasi yang Diminta</th>
                                <td><?= $result['jenis_dokumen_info'] ?></td>
                              </tr>
                              <tr>
                                <th>Cara Mendapatkan Salinan Informasi</th>
                                <td><?= $result['cara_dapat_salinan_info'] ?></td>
                              </tr>
                              <tr>
                                <th>Agreement</th>
                                <td><?= $result['agreement'] ? 'Yes' : 'No' ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="divider">Pertanyaan</div>
                      <div class="p-5 border rounded-md"><?= esc($result['pertanyaan']) ?></div>
                    </div>
                </dialog>

              </td>

              <td class="p-2 sm:p-4 min-w-24"><?= esc($result['created_at']) ? esc($result['created_at']) : 'none' ?></td>

              <td class="p-2 sm:p-4"><?= esc($result['updated_at']) ? esc($result['updated_at']) : 'none' ?></td>

              <td class="p-2 sm:p-4">

                <!-- HTTP METHOD SPOOFING for Delete-->
                <form action="<?= base_url() ?>api/admin/permohonan-informasi/delete/<?= $result['id_permohonan_informasi'] ?>" method="POST" class="inline">
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
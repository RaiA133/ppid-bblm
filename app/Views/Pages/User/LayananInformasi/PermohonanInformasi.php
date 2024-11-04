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
      <span class="text-sm"><?= esc($flashDataCreated['title']) ?></span>
    </div>
  </div>
  <script>
    setTimeout(function() { // akan hilang dalam 5 detik
      document.getElementById('alertBox').classList.add('opacity-0');
    }, 5000);
  </script>
<?php endif; ?>

<div class="flex flex-col mx-10">

  <!-- Judul Halaman -->
  <section class="flex flex-col text-center" id="header-regulasi">
    <div class="text-2xl" data-scroll data-scroll-direction="vertical" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-regulasi">Perhomonan Informasi</div>
    <div class="divider"></div>
  </section>

  <!-- Google Form -->
  <section class="flex justify-center mb-10" data-scroll data-scroll-speed="2">
    <div class="p-10 shadow-xl border rounded-2xl max-w-[946px]">

      <form action="<?= base_url('api/permohonan-informasi/create') ?>" method="post">
        <?= csrf_field() ?>

        <div class="flex flex-col md:flex-row">

          <div class="flex-col mr-3">

            <input name="nama_create" type="text" placeholder="Nama" class="input input-bordered w-full <?= (isset($errors['nama_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('nama_create', user()?->username) ?>" <?= logged_in() ? 'disabled' : '' ?> />
            <?php if (isset($errors['nama_create'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['nama_create'] ?></span></div>
            <?php endif ?>

            <input name="no_id_create" type="text" placeholder="No Identitas (Misal KTP)" class="input input-bordered w-full <?= (isset($errors['no_id_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('no_id_create') ?>" />
            <?php if (isset($errors['no_id_create'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['no_id_create'] ?></span></div>
            <?php endif ?>

            <input name="alamat_create" type="text" placeholder="Alamat" class="input input-bordered w-full <?= (isset($errors['alamat_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('alamat_create') ?>" />
            <?php if (isset($errors['alamat_create'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['alamat_create'] ?></span></div>
            <?php endif ?>

            <label class="input input-bordered flex items-center gap-2 <?= (isset($errors['email_create'])) ? 'input-error' : 'mb-3' ?>">Email
              <input name="email_create" type="email" class="grow" placeholder="example@gmail.com" value="<?= old('nama_create', user()?->email) ?>" <?= logged_in() ? 'disabled' : '' ?> />
            </label>
            <?php if (isset($errors['email_create'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['email_create'] ?></span></div>
            <?php endif ?>

            <input name="no_telp_create" type="number" placeholder="No Telp/HP" class="input input-bordered w-full <?= (isset($errors['no_telp_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('no_telp_create') ?>" />
            <?php if (isset($errors['no_telp_create'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['no_telp_create'] ?></span></div>
            <?php endif ?>

            <input name="pertanyaan_create" type="text" placeholder="Pertanyaan /Rincian Informasi yg Dibutuhkan" class="input input-bordered w-full <?= (isset($errors['pertanyaan_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('pertanyaan_create') ?>" />
            <?php if (isset($errors['pertanyaan_create'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['pertanyaan_create'] ?></span></div>
            <?php endif ?>

            <input name="tujuan_penggunaan_info_create" type="text" placeholder="Tujuan Penggunaan Informasi" class="input input-bordered w-full <?= (isset($errors['tujuan_penggunaan_info_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('tujuan_penggunaan_info_create') ?>" />
            <?php if (isset($errors['tujuan_penggunaan_info_create'])) : ?>
              <div class="label"><span class="label-text-alt text-error"><?= $errors['tujuan_penggunaan_info_create'] ?></span></div>
            <?php endif ?>

            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Cara Memperoleh Informasi</div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_memperoleh_info_create" class="radio" value="Melihat" <?= old('cara_memperoleh_info_create') == 'Melihat' ? 'checked' : '' ?> />
                  <span class="label-text">Melihat</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_memperoleh_info_create" class="radio" value="Membaca" <?= old('cara_memperoleh_info_create') == 'Membaca' ? 'checked' : '' ?> />
                  <span class="label-text">Membaca</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_memperoleh_info_create" class="radio" value="Mendengar" <?= old('cara_memperoleh_info_create') == 'Mendengar' ? 'checked' : '' ?>  />
                  <span class="label-text">Mendengar</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_memperoleh_info_create" class="radio" value="Mencatat" <?= old('cara_memperoleh_info_create') == 'Mencatat' ? 'checked' : '' ?> />
                  <span class="label-text">Mencatat</span>
                </label>
              </div>
              <?php if (isset($errors['cara_memperoleh_info_create'])) : ?>
                <div class="label pb-0"><span class="label-text-alt text-error"><?= $errors['cara_memperoleh_info_create'] ?></span></div>
              <?php endif ?>
            </div>

          </div>

          <div class="flex-col">
            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Jenis dokumen informasi yang diminta</div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="jenis_dokumen_info_create" class="radio" value="Hardcopy" <?= old('jenis_dokumen_info_create') == 'Hardcopy' ? 'checked' : '' ?> />
                  <span class="label-text">Hardcopy</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="jenis_dokumen_info_create" class="radio" value="Softcopy" <?= old('jenis_dokumen_info_create') == 'Softcopy' ? 'checked' : '' ?> />
                  <span class="label-text">Softcopy</span>
                </label>
              </div>
              <?php if (isset($errors['jenis_dokumen_info_create'])) : ?>
                <div class="label pb-0"><span class="label-text-alt text-error"><?= $errors['jenis_dokumen_info_create'] ?></span></div>
              <?php endif ?>
            </div>

            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Cara Mendapatkan Salinan Informasi</div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_dapat_salinan_info_create" class="radio" value="Mengambil langsung" <?= old('cara_dapat_salinan_info_create') == 'Mengambil langsung' ? 'checked' : '' ?> />
                  <span class="label-text">Mengambil langsung</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_dapat_salinan_info_create" class="radio" value="Kurir" <?= old('cara_dapat_salinan_info_create') == 'Kurir' ? 'checked' : '' ?> />
                  <span class="label-text">Kurir</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_dapat_salinan_info_create" class="radio" value="Pos" <?= old('cara_dapat_salinan_info_create') == 'Pos' ? 'checked' : '' ?> />
                  <span class="label-text">Pos</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_dapat_salinan_info_create" class="radio" value="Faksimili" <?= old('cara_dapat_salinan_info_create') == 'Faksimili' ? 'checked' : '' ?> />
                  <span class="label-text">Faksimili</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="cara_dapat_salinan_info_create" class="radio" value="Email" <?= old('cara_dapat_salinan_info_create') == 'Email' ? 'checked' : '' ?> />
                  <span class="label-text">Email</span>
                </label>
              </div>
              <?php if (isset($errors['cara_dapat_salinan_info_create'])) : ?>
                <div class="label pb-0"><span class="label-text-alt text-error"><?= $errors['cara_dapat_salinan_info_create'] ?></span></div>
              <?php endif ?>
            </div>

            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Pertanyaan</div>

              <div class="form-control">
                <label class="label cursor-pointer">
                  <span class="label-text text-xs">Identitas dan data yang saya isikan benar adanya</span>
                  <input type="checkbox" name="agreement1" class="checkbox ml-4" <?= old('agreement1') ? 'checked' : '' ?> />
                </label>
                <?php if (isset($errors['agreement1'])) : ?>
                  <div class="label pb-0 max-w-[500px]">
                    <span class="label-text-alt text-error"><?= $errors['agreement1'] ?></span>
                  </div>
                <?php endif ?>
              </div>

              <div class="form-control">
                <label class="label cursor-pointer">
                  <span class="label-text text-xs">Data dan informasi akan saya gunakan sesuai dengan ketentuan yang berlaku</span>
                  <input type="checkbox" name="agreement2" class="checkbox ml-4" <?= old('agreement2') ? 'checked' : '' ?> />
                </label>
                <?php if (isset($errors['agreement2'])) : ?>
                  <div class="label pb-0 max-w-[500px]">
                    <span class="label-text-alt text-error"><?= $errors['agreement2'] ?></span>
                  </div>
                <?php endif ?>
              </div>

            </div>


          </div>

        </div>

        <div class="flex justify-end">
          <button type="submit" class="btn btn-neutral w-32 ">Submit</button>
        </div>

      </form>

    </div>
  </section>

  <section>
    <div data-scroll data-scroll-speed="5" class="mb-10 w-full flex justify-center">
      <a class="relative group py-1.5 px-2.5 text-neutral-content-950 text-4xl" href="<?= base_url() ?>">
        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-neutral-500  transition-all duration-300 group-hover:w-full"></span>
        Kembali ke Home
      </a>
    </div>
  </section>

</div>

<?php $this->endSection(); ?>
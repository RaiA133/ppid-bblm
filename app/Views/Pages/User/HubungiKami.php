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

<div class="flex flex-col mx-0 md:mx-10">

  <!-- Judul Halaman -->
  <section class="flex flex-col text-center" id="header-regulasi">
    <div class="text-2xl" data-scroll data-scroll-direction="vertical" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-regulasi">Hubungi Kami</div>
    <div class="divider"></div>
  </section>

  <!-- List Link Regulasi -->
  <section class="flex justify-center h-fit my-20" data-scroll-section>
    <div class="flex flex-col items-center xl:flex-row gap-4 border shadow-xl rounded-xl w-full sm:w-9/12 h-fit">

      <div class="basis-3/4 p-10 pb-0 xl:pb-10">
        <div class="italic text-xl font-bold mb-10">
          PPID BBLM
        </div>
        <div class="text-xl mb-10">
          Tolong masukan Nama, Email, Perusahaan, No Telp, Kota serta deskripsi dari pesan yang ingin disampaikan. Kami akan menghubungi anda sesegera mungkin.
        </div>
        <div class="mb-10">

          <form action="<?= base_url('api/hubungi-kami/create') ?>" method="post">
            <?= csrf_field() ?>

            <div class="flex flex-row gap-4">

              <div class="flex flex-col w-full">
                <input name="nama_create" type="text" placeholder="Nama*" class="input input-bordered w-full <?= (isset($errors['nama_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= user()?->username ?>" <?= logged_in() ? 'disabled' : '' ?> />
                <?php if (isset($errors['nama_create'])) : ?>
                  <div class="label"><span class="label-text-alt text-error"><?= $errors['nama_create'] ?></span></div>
                <?php endif ?>
              </div>

              <div class="flex flex-col w-full">
                <input name="email_create" type="email" placeholder="Email*" class="input input-bordered w-full <?= (isset($errors['email_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= user()?->email ?>" <?= logged_in() ? 'disabled' : '' ?> />
                <?php if (isset($errors['email_create'])) : ?>
                  <div class="label"><span class="label-text-alt text-error"><?= $errors['email_create'] ?></span></div>
                <?php endif ?>
              </div>

            </div>

            <div class="flex flex-row gap-4">

              <div class="flex flex-col w-full">
                <input name="perusahaan_create" type="text" placeholder="Perusahaan" class="input input-bordered w-full <?= (isset($errors['perusahaan_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('perusahaan_create') ?>" />
                <?php if (isset($errors['perusahaan_create'])) : ?>
                  <div class="label"><span class="label-text-alt text-error"><?= $errors['perusahaan_create'] ?></span></div>
                <?php endif ?>
              </div>

              <div class="flex flex-col w-full">
                <input name="no_telp_create" type="text" placeholder="No Telp" class="input input-bordered w-full <?= (isset($errors['no_telp_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('no_telp_create') ?>" />
                <?php if (isset($errors['no_telp_create'])) : ?>
                  <div class="label"><span class="label-text-alt text-error"><?= $errors['no_telp_create'] ?></span></div>
                <?php endif ?>
              </div>

            </div>

            <div class="flex flex-col w-full">
              <textarea name="pesan_create" placeholder="Deskripsi Pesan" class="textarea textarea-bordered w-full p-4 <?= (isset($errors['pesan_create'])) ? 'textarea-error' : 'mb-2' ?>" value="<?= old('pesan_create') ?>"></textarea>
              <?php if (isset($errors['pesan_create'])) : ?>
                <div class="label"><span class="label-text-alt text-error"><?= $errors['pesan_create'] ?></span></div>
              <?php endif ?>
            </div>

            <div class="flex flex-row gap-4">
              <input name="kota_create" type="text" placeholder="Kota" class="input input-bordered w-full <?= (isset($errors['kota_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('kota_create') ?>" />
              <?php if (isset($errors['kota_create'])) : ?>
                <div class="label"><span class="label-text-alt text-error"><?= $errors['kota_create'] ?></span></div>
              <?php endif ?>
              <button type="submit" formmethod="post" class="btn btn-neutral px-10">Kirim</button>
            </div>

          </form>

        </div>
      </div>

      <div class="basis-1/2 p-20 pt-0 xl:pt-20">
        <div class="text-4xl lg:text-5xl xl:text-6xl">
          Hubungi dan Beri Tahu kami
        </div>
      </div>

    </div>
  </section>

  <section>
  <div data-scroll data-scroll-speed="5" class="mb-10 w-full flex justify-center">
    <a class="relative group py-1.5 px-2.5 text-stone-900 text-4xl ml-4" href="<?= base_url() ?>">
      <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-stone-900 transition-all duration-300 group-hover:w-full"></span>
      Kembali ke Home
    </a>
  </div>
</section>

</div>

<?php $this->endSection(); ?>
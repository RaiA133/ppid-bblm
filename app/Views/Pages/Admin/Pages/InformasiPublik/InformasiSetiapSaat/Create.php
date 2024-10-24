<?php if (session()->getFlashdata('openModalAddDataInformasiSetiapSaat')): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('addDataInformasiSetiapSaat').showModal();
    });
  </script>
<?php endif; ?>

<?php $errors = validation_errors(); ?>

<dialog id="addDataInformasiSetiapSaat" class="modal">
  <div class="modal-box w-11/12 max-w-5xl">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Add <?= $title ?></h3>
    <div class="divider"></div>
    <div class="py-4">

      <form action="<?= base_url() ?>/api/admin/informasi-setiap-saat/create" method="post">
        <select name="judul_create" class="select select-bordered w-full mb-3">
          <?php foreach ($informasiSetiapSaatJudul as $list) : ?>
            <option value="<?= $list['id_informasi_setiap_saat_judul'] ?>">
              <?= $list['judul'] ?>
            </option>
          <?php endforeach; ?>
        </select>

        <input name="jenis_informasi_create" type="text" placeholder="Informasi" class="input input-bordered w-full <?= (isset($errors['jenis_informasi_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('jenis_informasi_create') ?>" />
        <?php if (isset($errors['jenis_informasi_create'])) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $errors['jenis_informasi_create'] ?></span></div>
        <?php endif ?>

        <input name="informasi_create" type="text" placeholder="Link" class="input input-bordered w-full <?= (isset($errors['informasi_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('informasi_create') ?>" />
        <?php if (isset($errors['informasi_create'])) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $errors['informasi_create'] ?></span></div>
        <?php endif ?>

        <button type="submit" class="btn btn-neutral mt-5">Add</button>
      </form>

    </div>
  </div>
</dialog>
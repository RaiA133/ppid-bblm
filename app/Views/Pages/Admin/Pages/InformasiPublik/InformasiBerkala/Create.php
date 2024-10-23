<?php if (session()->getFlashdata('openModalAddDataInformasiBerkala')): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('addDataInformasiBerkala').showModal();
    });
  </script>
<?php endif; ?>

<?php $errors = validation_errors(); ?>

<dialog id="addDataInformasiBerkala" class="modal">
  <div class="modal-box w-11/12 max-w-5xl">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Add <?= $title ?></h3>
    <div class="divider"></div>
    <div class="py-4">

      <form action="<?= base_url() ?>/api/admin/informasi-berkala/create" method="post">
        <select name="judul_create" class="select select-bordered w-full mb-3">
          <?php foreach ($informasiBerkalaJudul as $list) : ?>
            <option value="<?= $list['id_informasi_berkala_judul'] ?>">
              <?= $list['judul'] ?>
            </option>
          <?php endforeach; ?>
        </select>

        <input name="jenis_informasi_create" type="text" placeholder="Jenis Informasi" class="input input-bordered w-full <?= (isset($errors['jenis_informasi_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('jenis_informasi_create') ?>" />
        <?php if (isset($errors['jenis_informasi_create'])) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $errors['jenis_informasi_create'] ?></span></div>
        <?php endif ?>

        <textarea name="informasi_create" class="textarea textarea-bordered w-full" placeholder="Bio" id="infomasi"></textarea>
        <?php if (isset($errors['informasi_create'])) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $errors['informasi_create'] ?></span></div>
        <?php endif ?>

        <script>
          CKEDITOR.config.width = '100%'
          CKEDITOR.replace("infomasi");
        </script>

        <button type="submit" class="btn btn-neutral mt-5">Add</button>
      </form>

    </div>
  </div>
</dialog>
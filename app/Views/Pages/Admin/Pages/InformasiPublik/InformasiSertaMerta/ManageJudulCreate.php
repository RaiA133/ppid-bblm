<?php if (session()->getFlashdata('openModalAddDataInformasiBerkalaJudul')): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('addDataInformasiBerkalaJudul').showModal();
    });
  </script>
<?php endif; ?>

<?php $errors = validation_errors(); ?>

<dialog id="addDataInformasiBerkalaJudul" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Add <?= $title ?></h3>
    <div class="divider"></div>
    <div class="py-4">

      <form action="<?= base_url() ?>/api/admin/informasi-berkala/manage-judul/create" method="post">

        <input name="judul_create" type="text" placeholder="Jenis Informasi" class="input input-bordered w-full <?= (isset($errors['judul_create'])) ? 'input-error' : 'mb-3' ?>" value="<?= old('judul_create') ?>" />
        <?php if (isset($errors['judul_create'])) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $errors['judul_create'] ?></span></div>
        <?php endif ?>

        <button type="submit" class="btn btn-neutral mt-5">Add</button>
      </form>

    </div>
  </div>
</dialog>
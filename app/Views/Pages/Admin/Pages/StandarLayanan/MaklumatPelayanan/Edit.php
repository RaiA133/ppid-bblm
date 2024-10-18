<?php if (session()->getFlashdata('openModalEditDataRegulasi')): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('editDataRegulasi').showModal();
    });
  </script>
<?php endif; ?>

<dialog id="editDataRegulasi" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Edit <?= $title ?></h3>
    <div class="divider"></div>
    <div class="py-4">

      <form action="<?= base_url() ?>/api/admin/regulasi/create" method="post">
        <input name="judul" type="text" placeholder="Judul" class="input input-bordered w-full <?= ($validation?->hasError('judul')) ? 'input-error' : 'mb-3' ?>" value="<?= old('judul') ?>" />
        <?php if ($validation?->hasError('judul')) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $validation?->getError('judul') ?></span></div>
        <?php endif ?>

        <input name="link_drive" type="text" placeholder="Link Goggle Drive PDF" class="input input-bordered w-full <?= ($validation?->hasError('link_drive')) ? 'input-error' : 'mb-3' ?>" value="<?= old('link_drive') ?>" />
        <?php if ($validation?->hasError('link_drive')) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $validation?->getError('link_drive') ?></span></div>
        <?php endif ?>

        <button type="submit" class="btn btn-neutral">Edit</button>
      </form>

    </div>
  </div>
</dialog>
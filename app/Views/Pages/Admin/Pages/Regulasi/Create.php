<?php if(session()->getFlashdata('openModalAddDataRegulasi')): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('addDataRegulasi').showModal();
    });
</script>
<?php endif; ?>

<dialog id="addDataRegulasi" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Add <?= $title ?></h3>
    <div class="divider"></div>
    <div class="py-4">

      <form action="<?= base_url() ?>/api/admin/regulasi/create" method="post">
        <input name="judul_create" type="text" placeholder="Judul" class="input input-bordered w-full <?= ($validation?->hasError('judul_create')) ? 'input-error' : 'mb-3' ?>" value="<?= old('judul_create') ?>" />
        <?php if ($validation?->hasError('judul_create')) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $validation?->getError('judul_create') ?></span></div>
        <?php endif ?>

        <input name="link_drive_create" type="text" placeholder="Link Goggle Drive PDF" class="input input-bordered w-full <?= ($validation?->hasError('link_drive_create')) ? 'input-error' : 'mb-3' ?>" value="<?= old('link_drive_create') ?>" />
        <?php if ($validation?->hasError('link_drive_create')) : ?>
          <div class="label"><span class="label-text-alt text-error"><?= $validation?->getError('link_drive_create') ?></span></div>
        <?php endif ?>

        <button type="submit" class="btn btn-neutral">Add</button>
      </form>

    </div>
  </div>
</dialog>
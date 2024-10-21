<?php if (session()->getFlashdata('openModalAddDataMaklumatPelayanan')): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('addDataMaklumatPelayanan').showModal();
    });
  </script>
<?php endif; ?>

<!-- Modal untuk Add Data Maklumat Pelayanan -->
<dialog id="addDataMaklumatPelayanan" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Add <?= esc($title) ?></h3>
    <div class="divider"></div>
    <div class="py-4">

      <form action="<?= base_url('api/admin/maklumat-pelayanan/create') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <!-- Input for Judul -->
        <!-- <input
          name="judul_create"
          type="text"
          placeholder="Judul"
          class="input input-bordered w-full <?= ($validation?->hasError('judul_create')) ? 'input-error' : 'mb-3' ?>"
          value="<?= old('judul_create') ?>" />
        <?php if ($validation?->hasError('judul_create')) : ?>
          <div class="label">
            <span class="label-text-alt text-error"><?= esc($validation->getError('judul_create')) ?></span>
          </div>
        <?php endif ?> -->

        <!-- Input for Link Gambar -->
        <input
          name="link_gambar_create"
          type="file"
          placeholder="Link Gambar"
          class="file-input file-input-bordered w-full <?= ($validation?->hasError('link_gambar_create')) ? 'input-error' : 'mb-3' ?>" />
        <?php if ($validation?->hasError('link_gambar_create')) : ?>
          <div class="label">
            <span class="label-text-alt text-error"><?= esc($validation->getError('link_gambar_create')) ?></span>
          </div>
        <?php endif ?>

        <!-- Input for Content -->
        <textarea
          name="content_create"
          placeholder="Konten"
          class="textarea textarea-bordered w-full <?= ($validation?->hasError('content_create')) ? 'input-error' : 'mb-3' ?>"><?= old('content_create') ?></textarea>
        <?php if ($validation?->hasError('content_create')) : ?>
          <div class="label">
            <span class="label-text-alt text-error"><?= esc($validation->getError('content_create')) ?></span>
          </div>
        <?php endif ?>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-neutral">Add</button>
      </form>

    </div>
  </div>
</dialog>
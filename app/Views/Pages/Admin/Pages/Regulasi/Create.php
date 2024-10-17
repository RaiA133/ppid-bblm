<dialog id="addDataRegulasi" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Add <?= $title ?></h3>
    <div class="divider"></div>
    <div class="py-4">

      <form action="<?= base_url() ?>/api/admin/regulasi/create" method="post">
        <input name="judul" type="text" placeholder="Judul" class="input input-bordered w-full mb-3" />
        <input name="link_drive" type="text" placeholder="Link Goggle Drive PDF" class="input input-bordered w-full mb-3" />
        <button type="submit" class="btn btn-neutral">Add</button>
      </form>

    </div>
  </div>
</dialog>
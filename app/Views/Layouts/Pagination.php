<!-- INI ADALAH JUMLAH ANGKA HALAMAN YG MENGELILINGI YG AKTIF -->
<?php $pager->setSurroundCount(2) ?> 

<div class="join">
  <?php if ($pager->hasPrevious()) : ?>
    <a href="<?= $pager->getFirst() ?>" class="join-item btn bg-base-100"><?= lang('Pager.first') ?></a>
    <a href="<?= $pager->getPrevious() ?>" class="join-item btn bg-base-100">«</a>
  <?php endif ?>
  <div class="join-ite mx-1">
    <?php foreach ($pager->links() as $link): ?>
      <a href="<?= $link['uri'] ?>" class="join-item btn <?= $link['active'] ? 'btn-active' : 'bg-base-100' ?>"><?= $link['title'] ?></a>
    <?php endforeach ?>
  </div>
  <?php if ($pager->hasNext()) : ?>
    <a href="<?= $pager->getNext() ?>" class="join-item btn bg-base-100">»</a>
    <a href="<?= $pager->getLast() ?>" class="join-item btn bg-base-100"><?= lang('Pager.last') ?></a>
  <?php endif ?>
</div>
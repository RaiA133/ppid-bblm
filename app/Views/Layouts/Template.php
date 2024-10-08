<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPID | BBLM</title>
  <link rel="stylesheet" href="<?= base_url() ?>src/output.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<?php $currentRoute = service('request')->getPath(); ?>

<body data-theme="corporate" class="flex">

  <?php if (strpos($currentRoute, 'admin') === 0) : ?>
    <div class="z-50">
      <div class="drawer lg:drawer-open relative">
        <input id="admin-sidebar" type="checkbox" class="drawer-toggle" />

        <?= $this->include('Pages/Admin/Layouts/Sidebar') ?>

      </div>
    </div>
  <?php endif; ?>

  <div class="w-full">
    <div data-scroll-container>

      <?php if (strpos($currentRoute, 'admin') === 0) : ?>   <!-- Jika admin tampilkan navbar admin -->
        <?= $this->include("Pages/Admin/Layouts/Navbar"); ?>
      <?php else : ?>
        <?= $this->include("Layouts/Navbar"); ?>
      <?php endif; ?>

      <div class="my-0" data-scroll-section>
        <?= $this->renderSection('content') ?>
      </div>

      <?php if (strpos($currentRoute, 'admin') === 0) : ?>
          <span></span>
        <?php else : ?>
          <?= $this->include("Layouts/Footer") ?>
      <?php endif; ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    const scroll = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true
    });
  </script>


</body>

</html>
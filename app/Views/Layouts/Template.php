<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPID | BBLM</title>
  <link rel="stylesheet" href="<?= base_url() ?>src/output.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.css">
</head>

<body data-theme="corporate">
  <div>
    <div data-scroll-container>
      <?= $this->include("Layouts/Navbar"); ?>

      <div class="my-10" data-scroll-section>
        <?= $this->renderSection('content') ?>
      </div>

      <?= $this->include("Layouts/Footer") ?>

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
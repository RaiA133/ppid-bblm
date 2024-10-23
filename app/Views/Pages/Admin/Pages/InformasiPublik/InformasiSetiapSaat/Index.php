<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<?php $flashDataCreated = session()->getFlashdata('Message') ?>
<?php $errors = validation_errors() ?>

<!-- Flash Data / Notif -->
<?php if ($flashDataCreated) : ?>
  <div class="absolute top-3 w-fit left-4 transition-opacity duration-[5000ms] opacity-100" id="alertBox">
    <div role="alert" class="alert shadow-lg bg-base-100 pr-6">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="stroke-info h-6 w-6 shrink-0">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <span><?= $flashDataCreated['title'] ?></span>
    </div>
  </div>
  <script>
    setTimeout(function() { // akan hilang dalam 5 detik
      document.getElementById('alertBox').classList.add('opacity-0');
    }, 5000);
  </script>
<?php endif; ?>

<section>
  
</section>

<?php $this->endSection(); ?>
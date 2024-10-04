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

      <!-- FOOTER -->
      <footer class="footer bg-base-200 text-base-content p-10" data-scroll-section>
        <nav>
          <h6 class="footer-title">Services</h6>
          <a class="link link-hover">Informasi Berkala</a>
          <a class="link link-hover">Informasi Setiap Saat</a>
          <a class="link link-hover">Informai Sertamerta</a>
        </nav>
        <nav>
          <h6 class="footer-title">Kontak Kami</h6>
          <a class="link link-hover">Sangkuriang No. 12 – Bandung 40135.</a>
          <a class="link link-hover">Telp : (022) 2503171 ext. 226</a>
          <a class="link link-hover">Hotline : (022) 2503172</a>
          <a class="link link-hover">Fax : (022) 2503978</a>
          <a class="link link-hover">WA : 0812 8288 2917</a>
          <a class="link link-hover">E-mail : bblm(@)kemenperin.go.id</a>
          <a class="link link-hover">Website : www.bblm.go.id</a>
        </nav>
        <nav>
          <h6 class="footer-title">Link Terkait</h6>
          <a class="link link-hover" href="https://komisiinformasi.go.id/">KIP Pusat</a>
          <a class="link link-hover" href="https://ombudsman.go.id/">Ombudsman</a>
          <a class="link link-hover" href="http://ppid.kemenperin.go.id/">PPID Kemenperin</a>
        </nav>
      </footer>
      <footer class="footer bg-base-200 text-base-content border-base-300 border-t px-10 py-4">
        <aside class="grid-flow-col items-center">
          <img style="width: 70px; margin-right: 10px;" src="<?= base_url() ?>img/icon/Logo-MIDC.svg" alt="Logo MIDC">
          <p>
            PPID BBSPJILM Industries.
            <br />
            Copyright © 2024 BBSPJILM
          </p>
        </aside>
        <nav class="md:place-self-center md:justify-self-end">
          <div class="grid grid-flow-col gap-4">
            <a target="_blank" href="https://www.youtube.com/channel/UCVJOsIwa66pGE2BPdKpX-tA">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                class="fill-current">
                <path
                  d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
              </svg>
            </a>
            <a target="_blank" href="https://www.instagram.com/bbspjilm.midc/">
              <svg
                width="24"
                height="24"
                xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" stroke-width="0.00032" viewBox="5 5 22 22">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="2.304"></g>
                <g id="SVGRepo_iconCarrier">
                  <path d="M20.445 5h-8.891A6.559 6.559 0 0 0 5 11.554v8.891A6.559 6.559 0 0 0 11.554 27h8.891a6.56 6.56 0 0 0 6.554-6.555v-8.891A6.557 6.557 0 0 0 20.445 5zm4.342 15.445a4.343 4.343 0 0 1-4.342 4.342h-8.891a4.341 4.341 0 0 1-4.341-4.342v-8.891a4.34 4.34 0 0 1 4.341-4.341h8.891a4.342 4.342 0 0 1 4.341 4.341l.001 8.891z"></path>
                  <path d="M16 10.312c-3.138 0-5.688 2.551-5.688 5.688s2.551 5.688 5.688 5.688 5.688-2.551 5.688-5.688-2.55-5.688-5.688-5.688zm0 9.163a3.475 3.475 0 1 1-.001-6.95 3.475 3.475 0 0 1 .001 6.95zM21.7 8.991a1.363 1.363 0 1 1-1.364 1.364c0-.752.51-1.364 1.364-1.364z"></path>
                </g>
              </svg>
            </a>
          </div>
        </nav>

      </footer>
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
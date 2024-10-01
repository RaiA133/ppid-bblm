<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>

<div class="flex flex-col" id="header-profil">
  <div class="text-2xl" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-profil">Halaman Profil</div>
  <div class="divider"></div>
</div>

<div class="p-20 m-10 card card-side bg-base-80 shadow-xl tracking-normal">
  <figure>
    <img class="p-10 h-50 w-50 md:w-40 lg:w-60"
      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
      alt="Profil" />
  </figure>
  <div class="card-body">
    <h1 class="text-3xl">Profil</h1>
    <h2 class="card-title">Kepala Balai Besar Logam dan Mesin</h2>
    <h2 class="font-semibold">Latar Belakang Pendidikan:</h2>
    <p>– S3 – Materials Science & Engineering Nagoya Institute of Technology – 2006</p>
    <p>– S3 – Materials Science & Engineering Nagoya Institute of Technology – 2006</p>
    <p>– S3 – Materials Science & Engineering Nagoya Institute of Technology – 2006</p>
    <h2>Penghargaan : Satyalancana Karya Satya XX Tahun</h2>
  </div>
</div>

<div class="p-20 m-10 card card-side bg-base-80 shadow-xl tracking-normal">
  <div class="card-body justify-normal flex flex-col p-5 m-5 leading-normal p-3 bg-blue-50 rounded">
    <h2 class="card-title">Sambutan Kepala BBSPJILM</h2>
    <p>" Puji dan syukur kita panjatkan kepada Tuhan yang Maha Kuasa karena hanya atas Rahmat dan hidayahNya sehingga Profil
      balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) ini dapat diterbitkan. Profil ini berisi tentang tugas pokok dan fungsi BBSPJILM
      sebagai salah satu Lembaga pemerintah yang memberikan layanan di bidang Pengujian, Kalibrasi, Sertifikasi , Pemesinan , pengelasan, Penerapan Industri 4.0, Pelatihan Teknis.
      Bapak/Ibu dapat memanfaatkan berbagai layanan yang ada di BBSPJILM dalam mendukung pengembangan industry yang terstandar dengan baik.
      Kami di BBSPJILM terus berkomitmen untuk memberikan pelayanan terbaik, serta siap untuk membuka diri dan bekerjasama dengan berbagai pihak industry,
      perguruan tinggi, BUMN, kementerian dan Lembaga atau pihak-pihak lain yang terkait. Besar harapan kami, profil BBSPJILM ini dapat menjadi manfaat bagi kita semua.</p><br>

    <p>All praise and gratitude to Allah, The Greatest One because it is only for His grace and guidance that the
      Profile of Balai Besar Standardisasi dan pelayanan Jasa Industri Logam dan mesin (BBSPJILM) can be published.
      This profile contains the main tasks and functions of BBSPJILM as a government agency that provides services in the fields of Testing,
      Calibration, Certification, Machining, Welding, Application of Industry 4.0, Technical Training. We Relly hope that You can utilize
      the various services available at BBSPJILM in supporting the development of a well-standardized industry. We at BBSPJILM continue to be committed to providing
      the best service, and are ready to open up and cooperate with various institution including Industries, Universities, Government Own Coorporation,
      Ministries and other Institutions or other related parties. We really hope that this BBSPJILM profile can be of benefit to all of us. ”</p>
  </div>
</div>

<div class="p-20 m-10 card card-side bg-base-80 shadow-xl tracking-normal">
  <div class="card-body">
    <h2 class="card-title"></h2>
    <div class="max-w-lg mx-auto bg-white p-5 shadow-lg rounded-lg">
      <h2 class="text-2xl font-bold mb-4 text-center">SEJARAH BBSPJILM</h2>
      <ul class="list-disc pl-5 space-y-2 text-gray-700">
        <li class="p-3 bg-blue-50 rounded">Balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) berdiri pada tahun 1969 berdasarkan SK Direktorat Jenderal Perindustrian Dasar No. 48/Kpts.DD/Perdas, dengan nama Proyek Pusat Pengembangan Industri Pengerjaan Logam atau lebih dikenal dengan nama Metal Industries Development Center (MIDC).</li>
        <li class="p-3 bg-blue-50 rounded">Pada tanggal 9 Maret 1979 berdasarkan Surat Keputusan Menteri Perindustrian No. 45/M/SK/1979, Proyek MIDC berubah status menjadi Balai Besar Logam dan Mesin (BBLM) yang berada dibawah lingkungan Badan Penelitian dan Pengembangan Industri (BPPI) Departemen Perindustrian Republik Indonesia.</li>
        <li class="p-3 bg-blue-50 rounded">Berdasarkan Peraturan Menteri Perindustrian Nomor 1 Tahun 2022 Balai Besar Logam dan Mesin berubah nomenklatur menjadi Balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) yang merupakan salah satu unit pelaksana teknis di Badan Standardisasi dan Kebijakan Jasa Industri (BSKJI) Kementerian Perindustrian</li>
      </ul>
    </div>
  </div>
  <figure>
    <img
      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
      alt="Shoes" />
  </figure>
</div>

<div class="p-20 m-10 card card-side bg-base-80 shadow-xl tracking-normal">
  <div class="flex flex-col p-5 m-5 leading-normal p-3 bg-blue-50 rounded">
    <h2 class="card-title">VISI BBSPJILM</h2><br>
    <p>“Menjadi badan yang akuntabel, adaptif, kolaboratif dan berorientasi pelayanan dalam mewujudkan industri nasional yang mandiri dan berdaya saing.”</p>
  </div>

  <div class="flex flex-col p-5 m-5 leading-normal p-3 bg-blue-50 rounded">
    <h2 class="card-title">MISI BBSPJILM</h2><br>
    <p>“Peningkatan kemandirian, daya saing dan kolaborasi industri melalui pemanfaatan infrastruktur dan revitalisasi standardisasi, optimalisasi pemanfaatan teknologi industri, jasa industri dan industri hijau.“</p><br>
    <p class="font-medium">Yang bercirikan:</p>
    <ol>
      <li>1. Standardisasi industri yang mandiri (mengurangi ketergantungan pada asing), produktif (efektif, efisien dan optimasi teknologi), dan berorientasi industri dalam negeri.</li>
      <li>2. Pengawasan implementasi standardisasi industri yang efektif.</li>
      <li>3. Optimalisasi pemanfaatan teknologi industri untuk meningkatkan kemandirian dan daya saing industri.</li>
      <li>4. Peningkatan peran jasa industri pendukung pembangunan industri secara profesional.</li>
      <li>5. Penguatan industri hijau secara bertahap.</li>
      <li>6. Pelayanan pembangunan industri yang berdaya saing.</li>
    </ol>
  </div>
</div>

<div class="p-20 m-10 card card-side bg-base-80 shadow-xl tracking-tighter">
  <div class="flex flex-col p-5 m-5 leading-normal p-3 bg-blue-50 rounded">
    <h2 class="card-title">TUGAS POKOK BBSPJILM</h2><br>
    <h3 class="font-medium">Permen Perindustrian RI No. 01 tahun 2022 Organisasi dan Tata Kerja UPT di Lingkungan BSKJI</h3><br>
    <p>“Mempunyai tugas melaksanakan standardisasi industri, optimalisasi pemanfaatan teknologi industri dan industri 4.0, industri hijau dan pelayanan jasa industri logam dan mesin.”</p>
  </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
</body>

</html>


<?php $this->endSection(); ?>
<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<section class="relative h-screen w-full bg-black flex items-center justify-center">
  <!-- Background Image -->
  <img src="<?= base_url() ?>img/profile/profile.png" alt="Profile Background" class="absolute w-auto h-full object-cover z-0">

  <!-- Content Wrapper for Flexbox -->
  <div class="relative z-10 w-full flex flex-col md:flex-row justify-between p-8 md:p-9 h-full bg-gradient-to-t from-black from-10% via-transparent via-30%  to-transparent to-90%">

    <!-- Left Content (Name and Position) -->
    <div class="text-white my-auto mb-8 md:mb-0">
      <h1 class="text-base md:text-lg lg:text-xl font-bold mb-6">Dr. Gunawan, S.Si., M.Eng.</h1>
      <h2 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-2 leading-tight">KEPALA BALAI BESAR</h2>
      <h2 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-2 leading-tight">LOGAM DAN MESIN</h2>
    </div>

    <!-- Right Content (Educational Background and Awards) -->
    <div class="text-white text-left self-end h-fit">
      <h3 class="text-sm mb-4 font-bold">Latar Belakang Pendidikan:</h3>
      <ul class="list-disc list-inside mb-4 space-y-2">
        <li class="text-xs">S3 – Materials Science & Engineering Nagoya Institute of Technology – 2006</li>
        <li class="text-xs">S2 – Mechanical Engineering University of Indonesia – 2002</li>
        <li class="text-xs">S1 – Teknik Mesin Universitas Indonesia – 1998</li>
      </ul>
      <h3 class="text-sm font-bold">Penghargaan: Satyalancana Karya Satya XX Tahun</h3>
    </div>

  </div>
</section>

<section class="p-7 m-7 card bg-base-100" data-scroll data-scroll-speed="1" data-scroll data-scroll-speed="2">
  <div class="card-body text-black mt-5 rounded p-5" data-scroll data-scroll-speed="1">
    <h2 class="text-2xl text-black font-bold mb-4">Sambutan Kepala BBSPJILM</h2>
    <p class="mt-4">"Puji dan syukur kita panjatkan kepada Tuhan yang Maha Kuasa karena hanya atas Rahmat dan hidayahNya sehingga Profil balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) ini dapat diterbitkan. Profil ini berisi tentang tugas pokok dan fungsi BBSPJILM sebagai salah satu Lembaga pemerintah yang memberikan layanan di bidang Pengujian, Kalibrasi, Sertifikasi, Pemesinan, Pengelasan, Penerapan Industri 4.0, Pelatihan Teknis. Bapak/Ibu dapat memanfaatkan berbagai layanan yang ada di BBSPJILM dalam mendukung pengembangan industri yang terstandar dengan baik. Kami di BBSPJILM terus berkomitmen untuk memberikan pelayanan terbaik, serta siap untuk membuka diri dan bekerjasama dengan berbagai pihak industri, perguruan tinggi, BUMN, kementerian, dan Lembaga atau pihak-pihak lain yang terkait. Besar harapan kami, profil BBSPJILM ini dapat menjadi manfaat bagi kita semua."</p>
    <br>
    <p>All praise and gratitude to Allah, The Greatest One because it is only for His grace and guidance that the Profile of Balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) can be published. This profile contains the main tasks and functions of BBSPJILM as a government agency that provides services in the fields of Testing, Calibration, Certification, Machining, Welding, Application of Industry 4.0, Technical Training. We really hope that you can utilize the various services available at BBSPJILM in supporting the development of a well-standardized industry. We at BBSPJILM continue to be committed to providing the best service and are ready to open up and cooperate with various institutions including industries, universities, government-owned corporations, ministries, and other related parties. We really hope that this BBSPJILM profile can be of benefit to all of us."</p>
  </div>
</section>

<section class="p-7 m-7 card bg-base-100" data-scroll data-scroll-speed="1" data-scroll data-scroll-speed="2">
  <div class="flex flex-col lg:flex-row text-black" data-scroll data-scroll-speed="1">
    <div class="card-body lg:w-80">
      <h2 class="text-2xl font-bold mb-4">SEJARAH BBSPJILM</h2>
      <ul class="list-disc list-inside pl-5 space-y-4">
        <li class="p-3">
          Balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) berdiri pada tahun 1969 berdasarkan SK Direktorat Jenderal Perindustrian Dasar No. 48/Kpts.DD/Perdas, dengan nama Proyek Pusat Pengembangan Industri Pengerjaan Logam atau lebih dikenal dengan nama Metal Industries Development Center (MIDC).
        </li>
        <li class="p-3">
          Pada tanggal 9 Maret 1979 berdasarkan Surat Keputusan Menteri Perindustrian No. 45/M/SK/1979, Proyek MIDC berubah status menjadi Balai Besar Logam dan Mesin (BBLM) yang berada dibawah lingkungan Badan Penelitian dan Pengembangan Industri (BPPI) Departemen Perindustrian Republik Indonesia.
        </li>
        <li class="p-3">
          Berdasarkan Peraturan Menteri Perindustrian Nomor 1 Tahun 2022, Balai Besar Logam dan Mesin berubah nomenklatur menjadi Balai Besar Standardisasi dan Pelayanan Jasa Industri Logam dan Mesin (BBSPJILM) yang merupakan salah satu unit pelaksana teknis di Badan Standardisasi dan Kebijakan Jasa Industri (BSKJI) Kementerian Perindustrian.
        </li>
      </ul>
    </div>
    <figure class="lg:w-1/2 flex justify-center lg:justify-end p-5">
      <img class=" w-full h-5/6"
        src="<?= base_url() ?>img/profile/sejarah.png"
        alt="Sejarah BBLM" />
    </figure>
  </div>
</section>

<section class="p-7 m-7 bg-base-100 rounded-lg" data-scroll data-scroll-speed="1" data-scroll data-scroll-speed="2">
  <div class="flex flex-col lg:flex-row space-y-8 lg:space-y-0 lg:space-x-8" data-scroll data-scroll-speed="1">

    <div class="text-black p-6">
      <h2 class="text-2xl font-bold mb-4">VISI BBSPJILM</h2>
      <p class="leading-relaxed">
        “Menjadi badan yang akuntabel, adaptif, kolaboratif, dan berorientasi pelayanan dalam mewujudkan industri nasional yang mandiri dan berdaya saing.”
      </p>
    </div>

    <div class="text-black p-6">
      <h2 class="text-2xl font-bold mb-4">MISI BBSPJILM</h2>
      <p class="leading-relaxed mb-4">
        “Peningkatan kemandirian, daya saing, dan kolaborasi industri melalui pemanfaatan infrastruktur dan revitalisasi standardisasi, optimalisasi pemanfaatan teknologi industri, jasa industri dan industri hijau.”
      </p>
      <p class="font-semibold text-gray-700 mb-4">Yang bercirikan:</p>
      <ol class="list-decimal list-inside space-y-2 text-gray-700">
        <li>Standardisasi industri yang mandiri (mengurangi ketergantungan pada asing), produktif (efektif, efisien dan optimasi teknologi), dan berorientasi industri dalam negeri.</li>
        <li>Pengawasan implementasi standardisasi industri yang efektif.</li>
        <li>Optimalisasi pemanfaatan teknologi industri untuk meningkatkan kemandirian dan daya saing industri.</li>
        <li>Peningkatan peran jasa industri pendukung pembangunan industri secara profesional.</li>
        <li>Penguatan industri hijau secara bertahap.</li>
        <li>Pelayanan pembangunan industri yang berdaya saing.</li>
      </ol>
    </div>
  </div>
</section>

<section class="p-7 m-7 bg-base-100 rounded-lg" data-scroll data-scroll-speed="1" data-scroll data-scroll-speed="2">
  <div class="text-black p-6" data-scroll data-scroll-speed="1">
    <h2 class="text-2xl font-bold mb-4">TUGAS POKOK BBSPJILM</h2>
    <h3 class="font-semibold mb-4">
      Permen Perindustrian RI No. 01 tahun 2022 Organisasi dan Tata Kerja UPT di Lingkungan BSKJI
    </h3>
    <p class="leading-relaxed">
      “Mempunyai tugas melaksanakan standardisasi industri, optimalisasi pemanfaatan teknologi industri dan industri 4.0, industri hijau dan pelayanan jasa industri logam dan mesin.”
    </p>
  </div>
</section>

<?php $this->endSection(); ?>
<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<!-- Judul Halaman Maklumat Pelayanan -->
<section class="flex justify-center" data-scroll>
    <div class="h-full w-fit shadow-xl rounded-xl">
        <h2 class="text-2xl font-semibold mb-4 text-center">Maklumat Pelayanan</h2>
        <figure class="lg:w-auto p-0 md:p-10">
            <img class="w-full max-w-3xl h-auto mx-auto"
                src="<?= base_url() ?>img/standarLayanan/MaklumatPelayanan.png"
                alt="Maklumat Pelayanan" />
        </figure>
    </div>
</section>


<?php $this->endSection(); ?>
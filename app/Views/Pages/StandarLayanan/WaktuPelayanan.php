<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>


<!-- Judul Halaman Waktu Pelayanan -->
<section class="flex justify-center" data-scroll>
    <div class="h-full w-fit shadow-xl rounded-xl">
        <h2 class="text-2xl font-semibold mb-4 text-center">Waktu Pelayanan</h2>
        <figure class="lg:w-auto p-0 md:p-10">
            <img class="w-full max-w-3xl h-auto mx-auto"
                src="<?= base_url() ?>img/standarLayanan/WaktuPelayanan.jpg"
                alt="Waktu Pelayanan" />
        </figure>
    </div>
</section>

<?php $this->endSection(); ?>
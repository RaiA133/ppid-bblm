<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<!-- Judul Halaman Permohonana Penyelesaian Sengketa -->
<section class="h-full" data-scroll>
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-4 text-center">Mekanisme Permohonan Penyelesaian Sengketa</h2>

        <!-- Container untuk gambar menggunakan grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Gambar pertama (kiri atas) -->
            <figure class="w-fit shadow-xl rounded-xl lg:w-auto flex justify-center p-5 md:p-20">
                <img class="w-full max-w-3xl h-auto mx-auto"
                    src="<?= base_url() ?>img/standarLayanan/MekanismePermohonanPenyelesaianSengketa1.jpg"
                    alt="Mekanisme Permohonan Penyelesaian Sengketa 1" />
            </figure>

            <!-- Gambar kedua (kanan atas) -->
            <figure class="w-fit shadow-xl rounded-xl lg:w-auto flex justify-center p-5 md:p-20">
                <img class="w-full max-w-3xl h-auto mx-auto"
                    src="<?= base_url() ?>img/standarLayanan/MekanismePermohonanPenyelesaianSengketa2.jpg"
                    alt="Mekanisme Permohonan Penyelesaian Sengketa 2" />
            </figure>
        </div>

        <!-- Gambar ketiga (ditengah bawah) -->
        <div class="flex justify-center mt-6">
            <figure class="w-fit shadow-xl rounded-xl lg:w-auto flex justify-center p-5 md:p-20">
                <img class="w-full max-w-lg h-auto mx-auto"
                    src="<?= base_url() ?>img/standarLayanan/MekanismePermohonanPenyelesaianSengketa3.jpg"
                    alt="Mekanisme Permohonan Penyelesaian Sengketa 3" />
            </figure>
        </div>
    </div>
</section>



<?php $this->endSection(); ?>
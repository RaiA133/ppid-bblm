<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<!-- Judul Halaman Tata Cara Permohonan Informasi -->
<section class="flex flex-col items-start md:flex-row mx-10 my-20 h-full" id="fixed-elements" data-scroll>

    <div class="flex flex-col gap-4 my-20">
        <div data-scroll-offset>
            <h2 class="text-2xl font-semibold mb-4 text-center">Tata Cara Permohonan Informasi</h2>
            <figure class="lg:w-auto flex justify-center lg:justify-end p-0 md:p-10">
                <img class=" w-full h-3/5"
                    src="<?= base_url() ?>img/standarLayanan/TataCaraPermohonanInformasi.jpg"
                    alt="Tata Cara Permohonan Informasi" />
            </figure>
        </div>
    </div>

    <div class="px-2 pt-0 md:pt-20" data-scroll>
        <div id="customHeight" class="h-fit pb-20" data-scroll data-scroll-sticky data-scroll-target="#fixed-elements">
            <h2 class="text-base font-bold mb-4">Hak Pemohon Informasi Publik:</h2>
            <ol class="list-decimal list-inside text-sm space-y-2">
                <li>Setiap orang berhak memperoleh Informasi Publik,</li>
                <li>Setiap orang berhak:
                    <ul class="list-disc list-inside ml-4 space-y-2">
                        <li>Melihat dan mengetahui Informasi Publik,</li>
                        <li>Menghadiri pertemuan publik yang terbuka untuk umum memperoleh Informasi Publik,</li>
                        <li>Mendapatkan salinan Informasi Publik melalui permohonan Informasi publik,</li>
                        <li>Menyebarluaskan Informasi Publik.</li>
                    </ul>
                </li>
                <li>Setiap Pemohon Informasi Publik berhak mengajukan permintaan Informasi Publik disertai alasan permintaan tersebut,</li>
                <li>Setiap Pemohon Informasi Publik berhak mengajukan gugatan ke pengadilan apabila dalam memperoleh Informasi Publik mendapat hambatan atau kegagalan.</li>
            </ol>

            <p class="mt-6 text-sm">Untuk pelayanan Informasi Publik di BBSPJILM dapat menghubungi: Tim Pejabat Pengelola Informasi dan Dokumentasi (PPID) BBSPJILM melalui surat, telepon, e-mail, website, dan media sosial:</p>

            <ul class="list-disc list-inside space-y-2 mt-4">
                <li><strong>Surat dialamatkan ke:</strong>
                    <p class="ml-4 text-sm">
                        Jl. Sangkuriang No. 12 – Bandung 40135. <br>
                        Up. Pejabat Pengelola Informasi dan Dokumentasi (PPID)
                    </p>
                </li>
                <li><strong>Telepon:</strong>
                    <p class="ml-4 text-sm">+62-2503171 ext. 22</p>
                </li>
                <li><strong>E-mail:</strong>
                    <p class="ml-4 text-sm">ppid.midc@gmail.com</p>
                </li>
                <li><strong>Website:</strong>
                    <p class="ml-4 text-sm"><a href="https://www.bblm.go.id/" class="text-blue-500 hover:underline">http://bblm.go.id</a></p>
                </li>
                <li><strong>Media Sosial:</strong>
                    <ul class="list-disc list-inside text-sm ml-4">
                        <li><a href="https://www.youtube.com/channel/UCVJOsIwa66pGE2BPdKpX-tA" class="text-blue-500 hover:underline">Youtube</a></li>
                        <li><a href="https://www.instagram.com/bbspjilm.midc/" class="text-blue-500 hover:underline">Instagram</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <script>
            let isAttributesRemoved = false; // Status apakah atribut telah dihapus
            let isAttributesAdded = false; // Status apakah atribut telah ditambahkan

            function adjustAttributes() {
                const div = document.getElementById('customHeight');

                if (window.innerWidth <= 768 && !isAttributesRemoved) {
                    console.log('hapus');
                    div.removeAttribute('data-scroll');
                    div.removeAttribute('data-scroll-sticky');
                    div.removeAttribute('data-scroll-target');
                    isAttributesRemoved = true;
                    isAttributesAdded = false;
                } else if (window.innerWidth > 768 && !isAttributesAdded) {
                    console.log('ada');
                    div.setAttribute('data-scroll', '');
                    div.setAttribute('data-scroll-sticky', '');
                    div.setAttribute('data-scroll-target', '#fixed-elements');
                    isAttributesAdded = true;
                    isAttributesRemoved = false;
                }
            }

            // Menggunakan addEventListener untuk menangani perubahan ukuran jendela
            window.addEventListener('resize', (event) => {
                adjustAttributes();
            });

            // Menggunakan onresize untuk menangani perubahan ukuran jendela
            window.onresize = (event) => {
                adjustAttributes();
            };

            adjustAttributes();
        </script>
    </div>
</section>


<?php $this->endSection(); ?>
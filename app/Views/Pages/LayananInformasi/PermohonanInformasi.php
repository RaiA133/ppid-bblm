<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col mx-10">

  <!-- Judul Halaman -->
  <section class="flex flex-col text-center" id="header-regulasi">
    <div class="text-2xl" data-scroll data-scroll-direction="vertical" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-regulasi">Perhomonan Informasi</div>
    <div class="divider"></div>
  </section>

  <!-- Google Form -->
  <section class="flex justify-center" data-scroll data-scroll-speed="5">
    <div class="p-10 shadow-xl border rounded-2xl w-fit">

      <form action="">

        <div class="flex flex-col md:flex-row">

          <div class="flex-col mr-3">
            <input type="text" placeholder="Nama" class="input input-bordered w-full mb-3" required />
            <input type="text" placeholder="No Identitas (Misal KTP)" class="input input-bordered w-full mb-3" required />
            <input type="text" placeholder="Alamat" class="input input-bordered w-full mb-3" required />
            <label class="input input-bordered flex items-center gap-2 mb-3">Email
              <input type="text" class="grow" placeholder="example@gmail.com" required />
            </label>
            <input type="number" placeholder="No Telp/HP" class="input input-bordered w-full mb-3" required />
            <input type="text" placeholder="Pertanyaan /Rincian Informasi yg Dibutuhkan" class="input input-bordered w-full mb-3" required />
            <input type="text" placeholder="Tujuan Penggunaan Informasi" class="input input-bordered w-full mb-3" required />

            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Cara Memperoleh Informasi</div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-1" class="radio" />
                  <span class="label-text">Melihat</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-1" class="radio" />
                  <span class="label-text">Membaca</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-1" class="radio" />
                  <span class="label-text">Mendengar</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-1" class="radio" />
                  <span class="label-text">Mencatat</span>
                </label>
              </div>
            </div>
          </div>

          <div class="flex-col">
            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Jenis dokumen informasi yang diminta</div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-2" class="radio" />
                  <span class="label-text">Hardcopy</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-2" class="radio" />
                  <span class="label-text">Softcopy</span>
                </label>
              </div>
            </div>

            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Cara Mendapatkan Salinan Informasi</div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-3" class="radio" />
                  <span class="label-text">Mengambil langsung</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-3" class="radio" />
                  <span class="label-text">Kurir</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-3" class="radio" />
                  <span class="label-text">Poss</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-3" class="radio" />
                  <span class="label-text">Faksimili</span>
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer flex justify-start gap-4">
                  <input type="radio" name="radio-3" class="radio" />
                  <span class="label-text">Email</span>
                </label>
              </div>
            </div>

            <div class="border border-base-300 p-5 mb-3">
              <div class="mb-3">Pertanyaan</div>
              <div class="form-control">
                <label class="label cursor-pointer">
                  <span class="label-text">Identitas dan data yang saya isikan benar adanya</span>
                  <input type="checkbox" class="checkbox ml-4" />
                </label>
              </div>
              <div class="form-control">
                <label class="label cursor-pointer">
                  <span class="label-text">Data dan informasi akan saya gunakan sesuai dengan ketentuan yang berlaku</span>
                  <input type="checkbox" class="checkbox ml-4" />
                </label>
              </div>
            </div>

          </div>

        </div>

        <div class="flex justify-end">
          <button type="submit" class="btn btn-neutral w-32 ">Submit</button>
        </div>
        
      </form>

    </div>
  </section>

</div>

<?php $this->endSection(); ?>
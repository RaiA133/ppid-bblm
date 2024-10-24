<!-- Navbar -->
<div class="navbar bg-base-100">
  <div class="navbar-start">

    <button class="btn btn-ghost btn-circle z-50">
      <div class="indicator">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <span class="badge badge-xs badge-primary indicator-item"></span>
      </div>
    </button>

    <button class="btn btn-ghost btn-circle z-50">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-5 w-5"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </button>

  </div>
  <div class="navbar-center">
    <a class="btn btn-ghost text-xl z-50" href="<?= base_url() ?>">PPID BBSPJILM</a>
  </div>
  <div class="navbar-end">

    <div class="drawer drawer-end flex justify-end z-50">
      <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content">
        <!-- Page content here -->
        <label tabindex="0" role="button" class="drawer-button btn btn-ghost btn-circle" for="my-drawer-4">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </label>
      </div>
      <div class="drawer-side z-50">
        <label for="my-drawer-4" aria-label="close sidebar" class="drawer-overlay" style="background-color: #0000;"></label>
        <ul class="menu backdrop-blur-md bg-white/30 text-base-content min-h-full w-full sm:w-5/12 md:w-4/12 p-4">

          <!-- Sidebar content here -->
          <label class="btn btn-sm btn-circle btn-ghost absolute pt-[1px] text-2xl font-light" for="my-drawer-4" aria-label="close sidebar">✕</label>
          <div class="mt-[80px]">
            <div class="ml-4 my-2" style="font-size: 10px;">001</div>
            <li class="text-2xl"><a href="<?= base_url() ?>">Home</a></li>
            <div class="ml-4 my-2" style="font-size: 10px">002</div>
            <li class="text-2xl"><a href="<?= base_url() ?>profil">Profil</a></li>
            <div class="ml-4 my-2" style="font-size: 10px">003</div>
            <li class="text-2xl"><a href="<?= base_url() ?>regulasi">Regulasi</a></li>
            <div class="ml-4 my-2" style="font-size: 10px">004</div>
            <li class="">
              <div class="dropdown dropdown-bottom md:dropdown-left w-full" tabindex="0" role="button">
                <div tabindex="0" role="button" class="text-2xl">
                  Informasi Publik
                  <span class="text-4xl ml-2">↓</span>
                </div>
                <!-- Arrow animated like accordion -->
                <!-- <div class="collapse collapse-arrow">
                  <input tabindex="0" role="button" type="radio" name="my-accordion-2" class="" />
                  <div class="collapse-title text-2xl">Informasi Publik</div>
                </div> -->
                <ul tabindex="0" class="dropdown-content menu bg-base-200 rounded-box z-[1] w-64 p-2 shadow">
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>informasi-berkala">Informasi Berkala</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>informasi-setiap-saat">Informasi Setiap Saat</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>informasi-serta-merta">Informasi Serta Merta</a></li>
                </ul>
              </div>
            </li>
            <div class="ml-4 my-2" style="font-size: 10px">005</div>
            <li class="">
              <div class="dropdown dropdown-bottom md:dropdown-left w-full" tabindex="0" role="button">
                <div class="text-2xl">
                  Standar Pelayanan
                  <span class="text-4xl ml-2">↓</span>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-200 rounded-box z-[1] w-64 p-2 shadow">
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>tata-cara-permohonan-informasi">Tata Cara Permohonan Informasi</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>mekanisme-keberatan">Mekanisme Keberatan</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>mekanisme-permohonan-penyelesaian-sengketa">Mekanisme Permohonan Penyelesaian Sengketa</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>maklumat-pelayanan">Maklumat Pelayanan</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>standar-biaya-pelayanan">Standar Biaya Pelayanan</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>waktu-pelayanan">Waktu Pelayanan</a></li>
                </ul>
              </div>
            </li>
            <div class="ml-4 my-2" style="font-size: 10px">006</div>
            <li class="">
              <div class="dropdown dropdown-bottom md:dropdown-left w-full" tabindex="0" role="button">
                <div class="text-2xl">
                  Layanan Informasi
                  <span class="text-4xl ml-2">↓</span>
                </div>
                <ul tabindex="0" class="dropdown-content menu bg-base-200 rounded-box z-[1] w-64 p-2 shadow">
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>permohonan-informasi">Permohonan Informasi</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>unit-pelayanan-publik">Unit Pelayanan Publik</a></li>
                  <li class="hover:bg-neutral bg-base-200 hover:text-neutral-content text-base-900 transition-all"><a href="<?= base_url() ?>laporan-layanan-informasi">Laporan Layanan Informasi</a></li>
                </ul>
              </div>
            </li>
            <div class="ml-4 my-2" style="font-size: 10px">007</div>
            <li class="text-2xl"><a href="<?= base_url() ?>hubungi-kami">Hubungi Kami</a></li>
          </div>
          
        </ul>
      </div>




    </div>

  </div>
</div>
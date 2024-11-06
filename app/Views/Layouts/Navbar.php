<!-- Navbar -->
<div class="navbar bg-base-100">
  <div class="navbar-start gap-4">

    <?php if (logged_in()) : ?>
      <div class="z-10">
        <!-- <div class="indicator">
      <span class="indicator-item indicator-bottom badge badge-primary">new</span> -->
        <div class="dropdown dropdown-start bg-base-100 rounded-full">
          <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
              <?php
              $userImagePath = 'img/userProfilePics/' . user()->user_image;
              if (file_exists(FCPATH . $userImagePath) && !empty(user()->user_image)) $profileImage = base_url($userImagePath);
              else $profileImage = base_url('img/icon/default-profile.jpg');
              ?>
              <img
                src="<?= esc($profileImage) ?>"
                alt="profile"
                id="img-preview-admin-profile" />
            </div>
          </label>
          <ul tabIndex="0" class="menu menu-compact dropdown-content mt-5 p-2 shadow bg-base-100 rounded-box w-52">
            <?php if (in_groups('superadmin') || in_groups('admin')) : ?>
              <li class="justify-between">
                <a href="<?= base_url() ?>admin/profile">
                  Profile Settings
                </a>
              </li>
            <?php endif; ?>
            <li><a href="<?= base_url('logout') ?>">Logout</a></li>
          </ul>
        </div>
        <!-- </div> -->

      </div>
    <?php endif; ?>

    <?php // get data list theme langsung dari tailwind.config.js
    $fileContent = file_get_contents(APPPATH . '../tailwind.config.js');
    preg_match('/daisyui\s*:\s*\{[^}]*themes\s*:\s*\[([^\]]+)\]/', $fileContent, $matches);

    if (isset($matches[1])) $themes = array_map('trim', explode(',', $matches[1]));
    else $themes = [];

    $themes = array_map(function ($theme) {
      return str_replace('"', '', $theme); // Menghapus tanda kutip
    }, $themes);
    ?>

    <div class="indicator z-20">
      <span class="indicator-item indicator-middle badge badge-secondary px-0">
        <div class="dropdown">
          <div tabindex="0" role="button" class="z-50 text-base-100 font-bold focus:rotate-90 transition-all px-1.5 hover:px-2"> &gt; </div>

          <script>
            const currentTheme = localStorage.getItem("theme") || "light";
          </script>

          <div tabindex="0" class="dropdown-content bg-base-200 rounded-sm z-[50] w-fit pl-3 shadow-md max-h-96 overflow-y-auto">
            <?php foreach ($themes as $theme) : ?>

              <a href="<?= current_url() ?>" onclick="setTheme('<?= $theme ?>')">
                <div class="w-full text-start mt-2 px-2 py-1" data-theme="<?= $theme ?>">
                  <?php if ($currentTheme = $theme) ?>
                  <span id="selectedThemeCheck_<?= $theme ?>"></span>
                  <?= $theme ?>
                </div>
              </a>

              <script>
                if (currentTheme == '<?= $theme ?>') {
                  selectedThemeClick = document.getElementById('selectedThemeCheck_<?= $theme ?>');
                  selectedThemeClick.innerHTML = ' ✓ ';
                }
              </script>

            <?php endforeach ?>
          </div>
        </div>
      </span>

      <div class="grid h-fit w-fit place-items-center">
        <label class="swap swap-rotate bg-base-200 rounded-full p-3 transition-all ease-in-out delay-150">
          <input type="checkbox" id="theme-checkbox" onclick="window.location.href='<?= current_url() ?>'" />
          <script>
            const checkbox = document.getElementById("theme-checkbox");

            // Load theme from localStorage and set the initial state
            document.addEventListener("DOMContentLoaded", () => {
              const savedTheme = localStorage.getItem("theme") || "light";
              checkbox.checked = savedTheme === "dark";
            });

            // Update localStorage and apply theme when checkbox is toggled
            checkbox.addEventListener("change", () => {
              const theme = checkbox.checked ? "dark" : "light";
              setTheme(theme);
            });

            // Function to update theme in localStorage and apply it to the page
            function setTheme(theme) {
              localStorage.setItem("theme", theme);
              checkbox.checked = theme === "dark";
            }
            
          </script>

          <!-- sun icon -->
          <svg
            class="swap-on h-6 w-6 fill-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24">
            <path
              d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
          </svg>

          <!-- moon icon -->
          <svg
            class="swap-off h-6 w-6 fill-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24">
            <path
              d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
          </svg>
        </label>
      </div>
    </div>

    <button class="btn btn-ghost btn-circle z-10 bg-base-100">
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

    <button class="btn btn-ghost btn-circle z-10 bg-base-100">
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
    <a class="btn btn-ghost text-xl z-40 bg-base-100 rounded-full" href="<?= base_url() ?> ">PPID BBSPJILM</a>
  </div>
  <div class="navbar-end">

    <div class="drawer drawer-end flex justify-end z-50 w-fit bg-base-100 rounded-full">
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
        <ul class="menu backdrop-blur-md bg-white/60 text-black min-h-full w-full sm:w-5/12 md:w-4/12 p-4">

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
                <div class="text-2xl">
                  Informasi Publik
                  <span class="text-4xl ml-2">↓</span>
                </div>
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
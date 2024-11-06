<div class="navbar sticky top-0 bg-base-100 z-10 shadow-md">

  <div class="flex-1 ">

    <div class="drawer-content flex flex-col items-center justify-center">
      <!-- Tombol Sidebar Admin -->
      <label tabindex="0" role="button" class="drawer-button btn btn-ghost btn-circle lg:hidden" for="admin-sidebar">
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

    <h1 class="text-md sm:text-xl md:text-2xl font-semibold ml-2"><?= esc($title) ?></h1>
  </div>

  <?php // get data list theme langsung dari tailwind.config.js
  $fileContent = file_get_contents(APPPATH . '../tailwind.config.js');
  preg_match('/daisyui\s*:\s*\{[^}]*themes\s*:\s*\[([^\]]+)\]/', $fileContent, $matches);

  if (isset($matches[1])) $themes = array_map('trim', explode(',', $matches[1]));
  else $themes = [];

  $themes = array_map(function ($theme) {
    return str_replace('"', '', $theme); // Menghapus tanda kutip
  }, $themes);
  ?>

  <div class="indicator z-20 mr-5">
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
        <input type="checkbox" id="theme-checkbox-admin" onclick="window.location.href='<?= current_url() ?>'" />

        <script>
          const checkbox = document.getElementById("theme-checkbox-admin");

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

  <div class="flex-none ">
    <span><?= esc(user()->username) ?></span>
    <!-- <div class="indicator">
      <span class="indicator-item indicator-bottom badge badge-primary">new</span> -->
    <div class="dropdown dropdown-end ml-4 mr-2">
      <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <?php
          $userImagePath = 'img/userProfilePics/' . user()->user_image;
          if (file_exists(FCPATH . $userImagePath) && !empty(user()->user_image)) $profileImage = base_url($userImagePath);
          else $profileImage = base_url('img/icon/default-profile.jpg');
          ?>
          <img
            src="<?= esc($profileImage) ?>"
            alt="profile" />
        </div>
      </label>
      <ul tabIndex="0" class="menu menu-compact dropdown-content mt-5 p-2 shadow bg-base-100 rounded-box w-52">
        <li class="justify-between">
          <a href="<?= base_url() ?>admin/profile">
            Profile Settings
          </a>
        </li>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
    <!-- </div> -->

  </div>
</div>
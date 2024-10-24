<div class="navbar sticky top-0 bg-base-100 z-10 shadow-md">

  <div class="flex-1">

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

    <h1 class="text-2xl font-semibold ml-2"><?= $title ?></h1>
  </div>

  <div class="flex-none ">
    <span><?= user()->username  ?></span>
    <div class="dropdown dropdown-end ml-4 mr-2">
      <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="<?= base_url('img/icon/') . user()->user_image ?>" alt="profile" />
        </div>
      </label>
      <ul tabIndex="0" class="menu menu-compact dropdown-content mt-5 p-2 shadow bg-base-100 rounded-box w-52">
        <li class="justify-between">
          <a href="">
            Profile Settings
          </a>
        </li>
        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
    </div>

  </div>
</div>
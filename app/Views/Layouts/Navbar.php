<!-- Navbar -->
<div class="navbar bg-base-100">
  <div class="navbar-start">
    
    <button class="btn btn-ghost btn-circle">
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

    <button class="btn btn-ghost btn-circle">
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
    <a class="btn btn-ghost text-xl" href="<?= base_url() ?>">PPID BBSPJILM</a>
  </div>
  <div class="navbar-end">

    <div class="drawer drawer-end flex justify-end">
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
        <ul class="menu backdrop-blur-md bg-white/30 text-base-content min-h-full w-full md:w-4/12 p-4">
          <!-- Sidebar content here -->
          <label class="btn btn-sm btn-circle btn-ghost absolute pt-[1px] text-2xl font-light"for="my-drawer-4" aria-label="close sidebar">✕</label>
          <div class="mt-32">
            <div class="ml-4 my-3">001</div>
            <li class=" text-4xl"><a href="<?= base_url() ?>">Home</a></li>
            <div class="ml-4 my-3">002</div>
            <li class=" text-4xl"><a href="<?= base_url() ?>profil">Profil</a></li>
            <div class="ml-4 my-3">003</div>
            <li class=" text-4xl"><a href="<?= base_url() ?>regulasi">Regulasi</a></li>
          </div>
        </ul>
      </div>
    </div>

  </div>
</div>
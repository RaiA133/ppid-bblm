<div>
  <div class="navbar sticky top-0 bg-base-100  z-10 shadow-md ">


    <div class="flex-1">
      <label htmlFor="left-sidebar-drawer" class="btn btn-primary drawer-button lg:hidden">
        <Bars3Icon class="h-5 inline-block w-5" />
      </label>
      <h1 class="text-2xl font-semibold ml-2">Dashboard</h1>
    </div>

    <div class="flex-none ">

      <div class="dropdown dropdown-end ml-4">
        <label tabIndex={0} class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" alt="profile" />
          </div>
        </label>
        <ul tabIndex={0} class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li class="justify-between">
            <a href="">Profile Settings
              <span class="badge">New</span>
            </a>
          </li>
          <li class=''>
            <a href="">
              Bill History
            </a>
          </li>
          <div class="divider mt-0 mb-0"></div>
          <li><a onClick={logoutUser}>Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
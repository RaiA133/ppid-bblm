<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col" id="header-home">

  <!-- Judul Halaman -->
  <section class="mx-10" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2" data-scroll-position="top" data-scroll-target="#header-home">
    <div class="text-2xl">Admin</div>
    <div class="divider"></div>
  </section>

  <section class="mx-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <!-- Datepicker Placeholder: Implement with your preferred datepicker in PHP -->
        <input type="text" class="input input-bordered w-72" placeholder="Select date range" />
      </div>
      <div class="text-right">
        <button class="btn btn-ghost btn-sm normal-case">
          <svg class="w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.75 15.75a.75.75 0 010-1.5h14.5a.75.75 0 010 1.5H4.75zM6.25 12a.75.75 0 010-1.5h11.5a.75.75 0 010 1.5H6.25zM8.5 8.25a.75.75 0 010-1.5h7a.75.75 0 010 1.5h-7z" />
          </svg>
          Refresh Data
        </button>
        <button class="btn btn-ghost btn-sm normal-case ml-2">
          <svg class="w-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 8h.01M9 12h.01M15 16h.01M19 12h2M21 16v4m-6-4v4m2-4v4M9 8h2m6 8h2" />
          </svg>
          Share
        </button>

        <div class="dropdown dropdown-bottom dropdown-end ml-2">
          <label tabIndex="0" class="btn btn-ghost btn-sm normal-case btn-square">
            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12 11.25a.75.75 0 100-1.5.75.75 0 000 1.5zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5z" />
            </svg>
          </label>
          <ul tabIndex="0" class="dropdown-content menu menu-compact p-2 shadow bg-base-100 rounded-box w-52">
            <li><a><svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16M4 8h16M4 12h7m-7 4h7m-7 4h16" />
                </svg>Email Digests</a></li>
            <li><a><svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.75a.75.75 0 01.75.75v13.5a.75.75 0 01-1.5 0V5.5A.75.75 0 0112 4.75z" />
                </svg>Download</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>


</div>

<?php $this->endSection(); ?>
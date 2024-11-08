<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col bg-base-200 py-5" id="header-home" data-scroll>

  <section class="sm:mx-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 ">
      <div class="my-auto mb-4 md:mb-0 mx-auto sm:mx-0">
        <!-- Datepicker Placeholder: Implement with your preferred datepicker in PHP -->
        <form action="" method="GET" class="flex items-center gap-2 flatpickr">
          <input id="datepicker" name="range" class="input input-sm input-bordered w-45 sm:w-72 rounded-md" type="text" placeholder="Select a date range" value="<?= $stringRange ?>">
          <a class="btn btn-sm border" href="<?= base_url('/admin') ?>" title="clear">X</a>
          <button type="submit" class="btn btn-neutral btn-sm">Submit</button>
        </form>
      </div>
      <div class="text-right gap-4 flex items-center justify-center md:justify-end">

        <a class="btn btn-ghost btn-sm normal-case" href="<?= current_url() . '?' . $_SERVER['QUERY_STRING'] ?>">
          Refresh Data
        </a>
        <button class="btn btn-ghost btn-sm normal-case">
          Share
        </button>

        <div class="dropdown dropdown-bottom dropdown-end">
          <label tabIndex="0" class="btn btn-ghost btn-sm normal-case btn-square">
            <svg class="w-5 pr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12 11.25a.75.75 0 100-1.5.75.75 0 000 1.5zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5z" />
            </svg>
          </label>
          <ul tabIndex="0" class="dropdown-content menu menu-compact p-2 shadow bg-base-100 rounded-box w-52">
            <li>
              <a>
                Email Digests
              </a>
            </li>
            <li>
              <a>
                Download
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="divider"></div>

  <!-- Stats -->
  <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mx-4 justify-center mb-4">

    <div class="stats shadow-md">
      <div class="stat">
        <div class="stat-title">Total Page Views</div>
        <div class="stat-value">89,400</div>
        <div class="stat-desc">21% more than last month</div>
      </div>
    </div>

    <div class="stats shadow-md">
      <div class="stat">
        <div class="stat-figure text-secondary">
          <svg
            onclick="successLoginModal.showModal()"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            class="inline-block h-8 w-8 stroke-current cursor-pointer">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <div class="stat-title">Success Login</div>
        <div class="stat-value"><?= $totalLoginAttemptSuccess['count'] ?></div>
        <div class="stat-desc"><?= $totalLoginAttemptSuccess['formattedDateRange'] ?? 'All Time' ?></div>
      </div>
    </div>

    <dialog id="successLoginModal" class="modal">
      <div class="modal-box">
        <form method="dialog">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-md font-bold mb-2">List User Success Login Attempt</h3>
        <hr>
        <p class="py-2">
        <div class="overflow-x-auto">
          <table class="table table-xs">
            <thead>
              <tr>
                <th>No</th>
                <th>Email</th>
                <th>Login At</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($totalLoginAttemptSuccess['data'] as $dataLoginAttemptSuccess) : ?>
                <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $dataLoginAttemptSuccess->email ?></td>
                  <td><?= $dataLoginAttemptSuccess->date ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        </p>
      </div>
    </dialog>

    <div class="stats shadow-md">
      <div class="stat">
        <div class="stat-figure text-secondary">
          <svg
            onclick="totalAdminModal.showModal()"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            class="inline-block h-8 w-8 stroke-current cursor-pointer">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
          </svg>
        </div>
        <div class="stat-title">New Admin</div>
        <div class="stat-value"><?= $totalAdmin['count'] ?></div>
        <div class="stat-desc">↗︎ 400 (22%)</div>
      </div>
    </div>

    <dialog id="totalAdminModal" class="modal">
      <div class="modal-box">
        <form method="dialog">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-md font-bold mb-2">List New Admin</h3>
        <hr>
        <p class="py-2">
        <div class="overflow-x-auto">
          <table class="table table-xs">
            <thead>
              <tr>
                <th>No</th>
                <th>Email</th>
                <th>Admin At</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($totalAdmin['data'] as $newRegisterData) : ?>
                <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $newRegisterData->email ?></td>
                  <td><?= $newRegisterData->adminUpdatedAt ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        </p>
      </div>
    </dialog>

    <div class="stats shadow-md">
      <div class="stat">
        <div class="stat-figure text-secondary">
          <svg
            onclick="newRegisterModal.showModal()"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            class="inline-block h-8 w-8 stroke-current cursor-pointer">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
          </svg>
        </div>
        <div class="stat-title">New Register</div>
        <div class="stat-value"><?= $newRegister['count'] ?></div>
        <div class="stat-desc">↘︎ 90 (14%)</div>
      </div>
    </div>

    <dialog id="newRegisterModal" class="modal">
      <div class="modal-box">
        <form method="dialog">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-md font-bold mb-2">List New Register</h3>
        <hr>
        <p class="py-2">
        <div class="overflow-x-auto">
          <table class="table table-xs">
            <thead>
              <tr>
                <th>No</th>
                <th>Email</th>
                <th>Register At</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($newRegister['data'] as $datanewRegisterData) : ?>
                <tr>
                  <th><?= $no++ ?></th>
                  <td><?= $datanewRegisterData->email ?></td>
                  <td><?= $datanewRegisterData->created_at ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        </p>
      </div>
    </dialog>

  </section>

  <!-- Chart -->
  <section class="mx-4 grid grid-cols-1 sm:grid-cols-2 gap-4 justify-center mb-4">

    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">New Registers</div>
      <div class="divider"></div>
      <div class="h-72"><canvas id="active-user"></canvas></div>

      <script>
        const activeUser = document.getElementById('active-user');
        const labels = <?= json_encode($charts['newRegisterCountChart']['labels']) ?>;
        const data = <?= json_encode($charts['newRegisterCountChart']['data']) ?>;
        new Chart(activeUser, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: 'New Register Accounts',
              data: data,
              fill: false,
              borderColor: 'rgb(75, 192, 192)',
              tension: 0.1
            }]
          },
          options: {
            maintainAspectRatio: false,
            scales: {
              y: {
                ticks: {
                  callback: function(value) {
                    return Math.round(value); // Membulatkan nilai pada sumbu Y
                  }
                }
              }
            }
          }
        });
      </script>



    </div>
    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">New Admin</div>
      <div class="divider"></div>
      <div class="h-72"><canvas id="dashboard-revenue"></canvas></div>
      <script>
        const dashboardRevenue = document.getElementById('dashboard-revenue');
        const totalAdminLabels = <?= json_encode($charts['totalAdminCountChart']['labels']) ?>;
        const totalAdminData = <?= json_encode($charts['totalAdminCountChart']['data']) ?>;

        new Chart(dashboardRevenue, {
          type: 'bar',
          data: {
            labels: totalAdminLabels,
            datasets: [{
              label: 'New Admin Accounts',
              data: totalAdminData,
              borderWidth: 1,
              backgroundColor: 'rgba(54, 162, 235, 0.5)',
              borderColor: 'rgba(54, 162, 235, 1)'
            }]
          },
          options: {
            maintainAspectRatio: false,
            scales: {
              y: {
                ticks: {
                  callback: function(value) {
                    return Math.round(value); // Membulatkan nilai pada sumbu Y
                  }
                }
              }
            }
          }
        });
      </script>
    </div>

    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">Total Data & Dokumen</div>
      <div class="divider"></div>
      <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th></th>
              <th>Jenis Data</th>
              <th>Jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <tr class="hover">
              <th>1</th>
              <td>Hubungi Kami</td>
              <td><?= $totalDataDanDokumen['totalHubungiKami'] ?></td>
              <td>
                <a class="btn btn-neutral btn-xs" href="<?= base_url('admin/hubungi-kami') ?>">Detail</a>
              </td>
            </tr>

            <tr class="hover">
              <th>2</th>
              <td>Regulasi</td>
              <td><?= $totalDataDanDokumen['totalRegulasi'] ?></td>
              <td>
                <a class="btn btn-neutral btn-xs" href="<?= base_url('admin/regulasi') ?>">Detail</a>
              </td>
            </tr>

            <tr class="hover">
              <th>3</th>
              <td>Informasi Berkala</td>
              <td><?= $totalDataDanDokumen['totalInformasiBerkala'] ?></td>
              <td>
                <a class="btn btn-neutral btn-xs" href="<?= base_url('admin/informasi-berkala') ?>">Detail</a>
              </td>
            </tr>

            <tr class="hover">
              <th>4</th>
              <td>Informasi Setiap Saat</td>
              <td><?= $totalDataDanDokumen['totalInformasiSetiapSaat'] ?></td>
              <td>
                <a class="btn btn-neutral btn-xs" href="<?= base_url('admin/informasi-setiap-saat') ?>">Detail</a>
              </td>
            </tr>

            <tr class="hover">
              <th>5</th>
              <td>Permohonan Informasi</td>
              <td><?= $totalDataDanDokumen['totalPermohonanInformasi'] ?></td>
              <td>
                <a class="btn btn-neutral btn-xs" href="<?= base_url('admin/permohonan-informasi') ?>">Detail</a>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">Account Categories</div>
      <div class="divider"></div>
      <div class="h-72"><canvas id="user-category"></canvas></div>
      <script>
        const userCategory = document.getElementById('user-category');
        const totalAccountCategories = <?= json_encode(array_values($charts['totalAccountCategories'])); ?>;

        new Chart(userCategory, {
          type: 'doughnut',
          data: {
            labels: [
              'superadmin',
              'admin',
              'user'
            ],
            datasets: [{
              label: 'My First Dataset',
              data: totalAccountCategories,
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
              ],
              hoverOffset: 4
            }]
          },
          options: {
            maintainAspectRatio: false,
          },
        });
      </script>

    </div>

  </section>

  <script>
    // Initialize Flatpickr datepicker with range option
    flatpickr("#datepicker", {
      mode: "range",
      dateFormat: "Y-m-d",
    });

    // Date Picker initialization
    $(function() {
      $("#datepicker").datepicker();
    });
  </script>

</div>

<?php $this->endSection(); ?>
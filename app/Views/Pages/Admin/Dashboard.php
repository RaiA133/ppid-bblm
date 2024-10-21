<?php $this->extend('Layouts/Template'); ?>


<?php $this->section('content') ?>

<div class="flex flex-col bg-base-200 py-10" id="header-home" data-scroll>

  <section class="mx-10">
    <div class="grid grid-cols-1 sm:grid-cols-2">
      <div class="my-auto mb-4 md:mb-0">
        <!-- Datepicker Placeholder: Implement with your preferred datepicker in PHP -->
        <input type="date" class="input input-bordered input-sm w-30" placeholder="Select date range" />
        <span> - </span>
        <input type="date" class="input input-bordered input-sm w-30" placeholder="Select date range" />
      </div>
      <div class="text-right gap-4 flex items-center justify-center md:justify-end">
        <button class="btn btn-ghost btn-sm normal-case">
          Refresh Data
        </button>
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

  <div class="divider mb-3"></div>

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
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            class="inline-block h-8 w-8 stroke-current">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <div class="stat-title">Downloads</div>
        <div class="stat-value">31K</div>
        <div class="stat-desc">Jan 1st - Feb 1st</div>
      </div>
    </div>
    <div class="stats shadow-md">

      <div class="stat">
        <div class="stat-figure text-secondary">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            class="inline-block h-8 w-8 stroke-current">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
          </svg>
        </div>
        <div class="stat-title">New Users</div>
        <div class="stat-value">4,200</div>
        <div class="stat-desc">↗︎ 400 (22%)</div>
      </div>
    </div>
    <div class="stats shadow-md">

      <div class="stat">
        <div class="stat-figure text-secondary">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            class="inline-block h-8 w-8 stroke-current">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
          </svg>
        </div>
        <div class="stat-title">New Registers</div>
        <div class="stat-value">1,200</div>
        <div class="stat-desc">↘︎ 90 (14%)</div>
      </div>
    </div>

  </section>

  <!-- Chart -->
  <section class="mx-4 grid grid-cols-1 sm:grid-cols-2 gap-4 justify-center mb-4">

    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">Montly Active Users (in K)</div>
      <div class="divider"></div>
      <div class="h-72"><canvas id="active-user"></canvas></div>
      <script>
        const activeUser = document.getElementById('active-user');

        new Chart(activeUser, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'April', 'Mei'],
            datasets: [{
              label: 'My First Dataset',
              data: [65, 59, 80, 81, 56, 55, 40],
              fill: false,
              borderColor: 'rgb(75, 192, 192)',
              tension: 0.1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
          },
        });
      </script>

    </div>
    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">Revenue</div>
      <div class="divider"></div>
      <div class="h-72"><canvas id="dashboard-revenue"></canvas></div>
      <script>
        const dashboardRevenue = document.getElementById('dashboard-revenue');

        new Chart(dashboardRevenue, {
          type: 'bar',
          data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1
            }]
          },
          options: {
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>

    </div>
    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">User Signup Source</div>
      <div class="divider"></div>
      <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Job</th>
              <th>Favorite Color</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            <tr>
              <th>1</th>
              <td>Cy Ganderton</td>
              <td>Quality Control Specialist</td>
              <td>Blue</td>
            </tr>
            <!-- row 2 -->
            <tr class="hover">
              <th>2</th>
              <td>Hart Hagerty</td>
              <td>Desktop Support Technician</td>
              <td>Purple</td>
            </tr>
            <!-- row 3 -->
            <tr>
              <th>3</th>
              <td>Brice Swyre</td>
              <td>Tax Accountant</td>
              <td>Red</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="w-full rounded-md shadow-md p-5 bg-base-100">
      <div class="text-md font-bold">Orders by Category</div>
      <div class="divider"></div>
      <div class="h-72"><canvas id="user-category"></canvas></div>
      <script>
        const userCategory = document.getElementById('user-category');

        new Chart(userCategory, {
          type: 'doughnut',
          data: {
            labels: [
              'Red',
              'Blue',
              'Yellow'
            ],
            datasets: [{
              label: 'My First Dataset',
              data: [300, 50, 100],
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

</div>

<?php $this->endSection(); ?>
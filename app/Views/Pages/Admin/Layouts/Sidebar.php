<div class="drawer-side">
  <label for="admin-sidebar" aria-label="close sidebar" class="drawer-overlay"></label>
  <ul class="menu bg-base-100 text-base-content min-h-full w-80 p-4">
    <a class="btn btn-ghost text-xl z-50 mb-3" href="<?= base_url() ?>">PPID BBSPJILM</a>
    <!-- Sidebar content here -->
    <li><a href="<?= base_url() ?>admin/dashboard">Dashboard</a></li>
    <li><a href="<?= base_url() ?>admin/leads">Leads</a></li>
    <li><a href="<?= base_url() ?>admin/transactions">Transactions</a></li>
    <li><a href="<?= base_url() ?>admin/analytics">Analytics</a></li>
    <li><a href="<?= base_url() ?>admin/integration">Integration</a></li>
    <li>
      <!-- <details open> -->
      <details>
        <summary>User</summary>
        <ul>
          <li><a href="<?= base_url() ?>admin/login">Login</a></li>
          <li><a href="<?= base_url() ?>admin/profile">Profile</a></li>
          <li><a href="<?= base_url() ?>admin/forgot-password">Forgot Password</a></li>
          <li><a href="<?= base_url() ?>admin/blank-page">Blank Page</a></li>
          <li><a href="<?= base_url() ?>admin/404">404</a></li>
        </ul>
      </details>
    </li>

    <div class="divider"></div>

    <?php if (in_groups('superadmin')) : ?>
      <li><a href="<?= base_url() ?>admin/admin-management">Admin Management</a></li>
    <?php endif; ?>


    <li><a href="<?= base_url() ?>admin/regulasi">Regulasi</a></li>
    <li><a href="<?= base_url() ?>admin/profil">Profil</a></li>
    <li>
      <details>
        <summary>Informasi Publik</summary>
        <ul>
          <li><a href="<?= base_url() ?>admin/informasi-berkala">Informasi Berkala</a></li>
          <li><a href="<?= base_url() ?>admin/informasi-setiap-saat">Informasi Setiap Saat</a></li>
          <li><a href="<?= base_url() ?>admin/informasi-serta-merta">Informasi Serta Merta</a></li>
        </ul>
      </details>
    </li>

  </ul>
</div>
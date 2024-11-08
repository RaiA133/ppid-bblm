<div class="drawer-side">
  <label for="admin-sidebar" aria-label="close sidebar" class="drawer-overlay"></label>
  <ul class="menu bg-base-100 text-base-content min-h-full w-80 p-4">
    <a class="btn btn-ghost text-xl z-50 mb-3" href="<?= base_url() ?>">PPID BBSPJILM</a>

    <div class="divider">Administrator</div>

    <?php if (in_groups('superadmin')) : ?>
      <li><a href="<?= base_url('admin/admin-management') ?>" class="<?= (current_url() == base_url('admin/admin-management')) ? 'bg-base-200' : '' ?>">Admin Management</a></li>
    <?php endif; ?>

    <li><a href="<?= base_url() ?>admin/dashboard" class="<?= (current_url() == base_url('admin/dashboard')) ? 'bg-base-200' : '' ?>">Dashboard</a></li>
    <li><a href="<?= base_url() ?>admin/hubungi-kami" class="<?= (current_url() == base_url('admin/hubungi-kami')) ? 'bg-base-200' : '' ?>">Hubungi Kami</a></li>
    <li><a href="<?= base_url() ?>admin/regulasi" class="<?= (current_url() == base_url('admin/regulasi')) ? 'bg-base-200' : '' ?>">Regulasi</a></li>
    <li><a href="<?= base_url() ?>admin/profil" class="<?= (current_url() == base_url('admin/profil')) ? 'bg-base-200' : '' ?>">Profil</a></li>
    <li>
      <details
        <?= (
          current_url() == base_url('admin/informasi-berkala') ||
          current_url() == base_url('admin/informasi-setiap-saat') ||
          current_url() == base_url('admin/informasi-serta-merta'))
          ? 'open' : ''
        ?>>
        <summary>Informasi Publik</summary>
        <ul>
          <li><a href="<?= base_url() ?>admin/informasi-berkala" class="<?= (current_url() == base_url('admin/informasi-berkala')) ? 'bg-base-200' : '' ?>">Informasi Berkala</a></li>
          <li><a href="<?= base_url() ?>admin/informasi-setiap-saat" class="<?= (current_url() == base_url('admin/informasi-setiap-saat')) ? 'bg-base-200' : '' ?>">Informasi Setiap Saat</a></li>
          <li><a href="<?= base_url() ?>admin/informasi-serta-merta" class="<?= (current_url() == base_url('admin/informasi-serta-merta')) ? 'bg-base-200' : '' ?>">Informasi Serta Merta</a></li>
        </ul>
      </details>
    </li>

    <li>
      <details
        <?= (
          current_url() == base_url('admin/tata-cara-permohonan-informasi') ||
          current_url() == base_url('admin/mekanisme-keberatan') ||
          current_url() == base_url('admin/mekanisme-permohonan-penyelesaian-sengketa') ||
          current_url() == base_url('admin/maklumat-pelayanan') ||
          current_url() == base_url('admin/standar-biaya-pelayanan') ||
          current_url() == base_url('admin/waktu-pelayanan'))
          ? 'open' : ''
        ?>>
        <summary>Standar Layanan</summary>
        <ul>
          <li><a href="<?= base_url() ?>admin/tata-cara-permohonan-informasi" class="<?= (current_url() == base_url('admin/tata-cara-permohonan-informasi')) ? 'bg-base-200' : '' ?>">Tata Cara Permohonan Informasi</a></li>
          <li><a href="<?= base_url() ?>admin/mekanisme-keberatan" class="<?= (current_url() == base_url('admin/mekanisme-keberatan')) ? 'bg-base-200' : '' ?>">Mekanisme Keberatan</a></li>
          <li><a href="<?= base_url() ?>admin/mekanisme-permohonan-penyelesaian-sengketa" class="<?= (current_url() == base_url('admin/mekanisme-permohonan-penyelesaian-sengketa')) ? 'bg-base-200' : '' ?>">Mekanisme Permohonan Penyelesaian Sengketa</a></li>
          <li><a href="<?= base_url() ?>admin/maklumat-pelayanan" class="<?= (current_url() == base_url('admin/maklumat-pelayanan')) ? 'bg-base-200' : '' ?>">Maklumat Pelayanan</a></li>
          <li><a href="<?= base_url() ?>admin/standar-biaya-pelayanan" class="<?= (current_url() == base_url('admin/standar-biaya-pelayanan')) ? 'bg-base-200' : '' ?>">Standar Biaya Pelayanan</a></li>
          <li><a href="<?= base_url() ?>admin/waktu-pelayanan" class="<?= (current_url() == base_url('admin/waktu-pelayanan')) ? 'bg-base-200' : '' ?>">Waktu Pelayanan</a></li>
        </ul>
      </details>
    </li>

    <li>
      <details
        <?= (
          current_url() == base_url('admin/permohonan-informasi') ||
          current_url() == base_url('admin/unit-pelayanan-publik') ||
          current_url() == base_url('admin/laporan-layanan-informasi'))
          ? 'open' : ''
        ?>>
        <summary>Layanan Informasi</summary>
        <ul>
          <li><a href="<?= base_url() ?>admin/permohonan-informasi" class="<?= (current_url() == base_url('admin/permohonan-informasi')) ? 'bg-base-200' : '' ?>">Permohonan Informasi</a></li>
          <li><a href="<?= base_url() ?>admin/unit-pelayanan-publik" class="<?= (current_url() == base_url('admin/unit-pelayanan-publik')) ? 'bg-base-200' : '' ?>">Unit Pelayanan Publik</a></li>
          <li><a href="<?= base_url() ?>admin/laporan-layanan-informasi" class="<?= (current_url() == base_url('admin/laporan-layanan-informasi')) ? 'bg-base-200' : '' ?>">Laporan Layanan Informasi</a></li>
        </ul>
      </details>
    </li>




    <!-- TEMPLATES ADMIN | TURN THIS ON IF YOU NEED TO SEE PREVIEW OF ADMIN TEMPLATES -->

    <!-- <div class="divider">Templates Admin</div>

    <li><a href="<?= base_url() ?>admin/templates/dashboard" class="<?= (current_url() == base_url('admin/templates/dashboard')) ? 'bg-base-200' : '' ?>">Dashboard</a></li>
    <li><a href="<?= base_url() ?>admin/templates/leads" class="<?= (current_url() == base_url('admin/templates/leads')) ? 'bg-base-200' : '' ?>">Leads</a></li>
    <li><a href="<?= base_url() ?>admin/templates/transactions" class="<?= (current_url() == base_url('admin/templates/transactions')) ? 'bg-base-200' : '' ?>">Transactions</a></li>
    <li><a href="<?= base_url() ?>admin/templates/analytics" class="<?= (current_url() == base_url('admin/templates/analytics')) ? 'bg-base-200' : '' ?>">Analytics</a></li>
    <li><a href="<?= base_url() ?>admin/templates/integration" class="<?= (current_url() == base_url('admin/templates/integration')) ? 'bg-base-200' : '' ?>">Integration</a></li>
    <li>
      <details
        <?= (
          current_url() == base_url('login') ||
          current_url() == base_url('admin/profile') ||
          current_url() == base_url('forgot-password"')) ||
          current_url() == base_url('admin/templates/blank-page') ||
          current_url() == base_url('admin/templates/404')
          ? 'open' : ''
        ?>>
        <summary>User</summary>
        <ul>
          <li><a href="<?= base_url() ?>login" class="<?= (current_url() == base_url('login')) ? 'bg-base-200' : '' ?>">Login</a></li>
          <li><a href="<?= base_url() ?>admin/profile" class="<?= (current_url() == base_url('admin/profile')) ? 'bg-base-200' : '' ?>">Profile</a></li>
          <li><a href="<?= base_url() ?>forgot" class="<?= (current_url() == base_url('forgot')) ? 'bg-base-200' : '' ?>">Forgot Password</a></li>
          <li><a href="<?= base_url() ?>admin/templates/blank-page" class="<?= (current_url() == base_url('admin/templates/blank-page')) ? 'bg-base-200' : '' ?>">Blank Page</a></li>
          <li><a href="<?= base_url() ?>admin/templates/404" class="<?= (current_url() == base_url('admin/templates/404')) ? 'bg-base-200' : '' ?>">404</a></li>
        </ul>
      </details>
    </li> -->




    
  </ul>
</div>
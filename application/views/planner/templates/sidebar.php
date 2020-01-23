<div class="row">
  <?php if ($this->session->userdata('level') === '1') { ?>
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('planner/planner') ?>">
              <i class="fas fa-tachometer-alt"></i>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('superadmin/crud_data/cari_workcenter') ?>">
              <i class="fas fa-cogs"></i>
              Proses Perangkingan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('superadmin/crud_data') ?>">
              <i class="fas fa-cogs"></i>
              Data Work Center
            </a>
          </li>
        </ul>
      </div>
    </nav>
  <?php } else if ($this->session->userdata('level') === '4') { ?>
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('kriteria') ?>">
                <span data-feather="shopping-cart"></span>
                Data Kriteria
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('proses') ?>">
                <span data-feather="bar-chart-2"></span>
                Proses dan Perhitungan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('riwayat') ?>">
                <span data-feather="layers"></span>
                riwayat
              </a>
            </li>
          </ul>
        </div>
      </nav>
    <?php } ?>
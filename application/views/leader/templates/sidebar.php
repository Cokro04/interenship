<div class="row">
  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('leader/leader') ?>">
            <span data-feather="home"></span>
            <i class="fas fa-tachometer-alt"></i> Dashboard <span class="sr-only">(current)</span>
          </a>
        </li>
        <?php $id_workcenter = $this->session->userdata('id_workcenter'); ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('leader/leader/detail_operator/' . $id_workcenter); ?>">
            <span data-feather="file"></span>
            <i class="far fa-address-book"></i> Data Operator
          </a>
        </li>

      </ul>
      <!-- <?php if ($profile->level == 'superadmin') : ?>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Pengaturan</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('staff') ?>">
              <span data-feather="file-text"></span>
              Staff
            </a>
          </li>
        </ul>
        <?php endif ?> -->
    </div>
  </nav>
<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <br>
    <div class="container-fluid">
      <h2>
        Halaman Planner
        <?php echo $this->session->userdata('username'); ?>
      </h2>
      <?php date_default_timezone_set('Asia/Jakarta'); ?>
      <!-- <?= date('Y-m-d H;m;s'); ?> -->
      <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Perangkingan</h5>
              <p class="card-text">Merupakan cara untuk Pengurutan Operasi Di Setiap Work Center</p>
            </div>
            <div class="card-footer">
              <center><a href="<?= base_url('superadmin/crud_data/cari_workcenter') ?>" class="btn btn-primary">Proses Rangking</a></center>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Data Work Center</h5>
              <p class="card-text">Merupakan Data mengenai work center terdiri dari nama dan id work center</p>
            </div>
            <div class="card-footer">
              <center> <a href="<?= base_url('superadmin/crud_data') ?>" class="btn btn-primary">Data Work Center</a></center>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Data Historis Hail Perangkingan</h5>
        </div>
        <div class="card-body">
          <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">lihat Data</button>
            <div id="demo" class="collapse">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <label>Cetak data berdasarkan tanggal</label>
                    <form class="form-inline" action="<?php echo base_url('planner/planner/cetak_rangking_where'); ?>" method="POST">
                      <input type="date" class="form-control mb-2 mr-sm-2" placeholder="cari berdasarkan id" name="date">
                      <button type="submit" class="btn btn-primary mb-2">cetak</button>
                    </form>
                  </div>
                  <div class="col-lg-4">
                    <label>Cari data berdasarkan tanggal</label>
                    <form class="form-inline" action="<?php echo base_url('planner/planner/where'); ?>" method="POST">
                      <input type="date" class="form-control mb-2 mr-sm-2" placeholder="cari berdasarkan id" name="date">
                      <button type="submit" class="btn btn-primary mb-2">cari</button>
                    </form>
                  </div>

                </div>
                <div class="panel-body table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>urutan</th>
                        <th>operasi</th>
                        <th>nama operasi</th>
                        <th>workcenter</th>
                        <th>workorder</th>
                        <th>tanggal</th>
                      </tr>
                    </thead>
                    <?php foreach ($rangking as $row) { ?>
                      <tbody>
                        <tr>
                          <td><?= $row->urutan ?></td>
                          <td><?= $row->id_operasi ?></td>
                          <td><?= $row->nama_operasi ?></td>
                          <td><?= $row->id_workcenter ?></td>
                          <td><?= $row->id_workorder ?></td>
                          <td><?= $row->date ?></td>
                        </tr>
                      </tbody>
                    <?php } ?>
                  </table>
                </div>
              </div>

            </div>
          </div>

        </div>
        <div class="card-footer">Footer</div>
      </div>
  </main>
</div>

<?php include('templates/footer.php'); ?>
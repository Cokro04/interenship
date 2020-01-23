<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <br>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Data Historis Hasil Perangkingan</h5>
        </div>
        <div class="card-body">
          <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">lihat Data</button>
            <div id="demo" class="collapse">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
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
                        <th>workcenter</th>
                        <th>tanggal</th>
                      </tr>
                    </thead>
                    <?php foreach ($rangking as $row) { ?>
                      <tbody>
                        <tr>
                          <td><?= $row->urutan ?></td>
                          <td><?= $row->id_operasi ?></td>
                          <td><?= $row->id_workcenter ?></td>
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
        <div class="card-footer">

        </div>
      </div>
  </main>
</div>

<?php include('templates/footer.php'); ?>
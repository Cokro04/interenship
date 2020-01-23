<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>

<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        </br>
        </br>
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Data User</h5>
                        <p class="card-text">Data User meruapak data dari user planner, user leader, dan user operator</p>
                    </div>
                    <div class="card-footer">
                        <center><a href="<?= base_url('superadmin/crud_data/user') ?>" class="btn btn-primary">Data User</a></center>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Data Kriteria</h5>
                        <p class="card-text">Data Kriteria meruapakan data yang di gunakakan untuk penentuan urutan dan berdasarkan work center</p>
                    </div>
                    <div class="card-footer">
                        <center><a href="<?= base_url('superadmin/crud_data/cari_workcenter') ?>" class="btn btn-primary">Data Kriteria</a></center>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Data Work Center</h5>
                        <p class="card-text">Data Work Center merupakan data tempat penggerjaan pekerjaan yang berisikan leader dan operasi pada setiap work center</p>
                    </div>
                    <div class="card-footer">
                        <center><a href="<?= base_url('superadmin/crud_data/index') ?>" class="btn btn-primary">Data Work Center</a></center>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3">
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Data Riwayat Rangking</h5>
                        <p class="card-text">merupakan data hasil perangkingan dari semua work center</p>
                    </div>
                    <div class="card-footer">
                        <center><a href="<?= base_url('planner/planner/index') ?>" class="btn btn-primary">Riwatat Rangking</a></center>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Data Work Order</h5>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <center><a href="<?= base_url('superadmin/crud_data/workorder') ?>" class="btn btn-primary">Data Work Order</a></center>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include('templates/footer.php'); ?>
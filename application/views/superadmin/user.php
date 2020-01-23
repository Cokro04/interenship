<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <br>
        <h2>Halaman Kelola Data User</h2>
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data leader</h5>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id User</th>
                                        <th scope="col">username</th>
                                        <th scope="col">Aksi
                                            <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#simpanLeader">
                                                tambah data
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <?php foreach ($data_leader as $row) { ?>
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td><?= $row->id_leader ?></td>
                                            <td><?= $row->nama_lengkap ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-leader<?= $row->id_user; ?>" class="badge badge-pill badge-warning" data-popup="tooltip" data-placement="top" title="Edit Data">Edit Data</button>
                                                <a href="<?php echo site_url('superadmin/crud_data/delete_leader/' . $row->id_user); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->nama_lengkap; ?> ?');" data-popup="tooltip" data-placement="top" title="Hapus Data">Hapus Data</a>
                                                <!-- <td>button <td> -->
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Operator</h5>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id User</th>
                                        <th scope="col">username</th>
                                        <th scope="col">Aksi
                                            <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#simpanOperator">
                                                tambah data
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <?php foreach ($data_operator as $row) { ?>
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td><?= $row->id_operator ?></td>
                                            <td><?= $row->nama_lengkap ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-operator<?= $row->id_user; ?>" class="badge badge-pill badge-warning" data-popup="tooltip" data-placement="top" title="Edit Data">Edit Data</button>
                                                <a href="<?php echo site_url('superadmin/crud_data/delete_operator/' . $row->id_user); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->nama_lengkap; ?> ?');" data-popup="tooltip" data-placement="top" title="Hapus Data">Hapus Data</a>
                                                <!-- <td>button <td> -->
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Planner</h5>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id User</th>
                                        <th scope="col">username</th>
                                        <th scope="col">Aksi
                                            <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#simpanPlanner">
                                                tambah data
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <?php foreach ($data_planner as $row) { ?>
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td><?= $row->id_planner ?></td>
                                            <td><?= $row->nama_lengkap ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#modal-edit-planner<?= $row->id_user; ?>" class="badge badge-pill badge-warning" data-popup="tooltip" data-placement="top" title="Edit Data">Edit Data</button>
                                                <a href="<?php echo site_url('superadmin/crud_data/delete_planner/' . $row->id_user); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->nama_lengkap; ?> ?');" data-popup="tooltip" data-placement="top" title="Hapus Data">Hapus Data</a>
                                                <!-- <td>button <td> -->
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Tabel User</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id User</th>
                                    <th scope="col">username</th>
                                    <th scope="col">user email</th>
                                    <th scope="col">password</th>
                                    <th scope="col">user level</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <?php foreach ($data_user as $row) { ?>
                                <tbody>
                                    <tr>
                                        <!-- <th scope="row">1</th> -->
                                        <td><?= $row->user_id ?></td>
                                        <td><?= $row->user_name ?></td>
                                        <td><?= $row->user_email ?></td>
                                        <td><?= decryptIt($row->user_password) ?></td>
                                        <td><?php if ($row->user_level == 1) {
                                                echo 'planner';
                                            } elseif ($row->user_level == 2) {
                                                echo 'leader';
                                            } elseif ($row->user_level == 3) {
                                                echo 'operator';
                                            } elseif ($row->user_level == 4) {
                                                echo 'superadmin';
                                            } ?></td>
                                        <td><?php if ($row->status == 1) {
                                                echo 'user aktif';
                                            } else {
                                                echo 'user tidak aktif';
                                            }
                                            ?></td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                    </<div>
                </div>
    </main>
</div>

<div class="modal fade" id="simpanLeader">
    <?php echo form_open_multipart('superadmin/crud_data/create_leader'); ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Input Data Leader</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="container">
                <div class=" form-group">
                    <label for="id">Id User :</label>
                    <input type="text" name="user_id" class="form-control" id="id">
                </div>
                <div class="form-group">
                    <label for="nama">User Name :</label>
                    <input type="text" name="user_name" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="nama">User Email :</label>
                    <input type="email" name="user_email" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="nama">User Password :</label>
                    <input type="password" name="user_password" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <input type="text" value="2" name="user_level" class="form-control" id="nama" hidden>
                    <input type="text" value="1" name="status" class="form-control" id="nama" hidden>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<div class="modal fade" id="simpanOperator">
    <?php echo form_open_multipart('superadmin/crud_data/create_operator'); ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Input Data Operator</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="container">
                <div class=" form-group">
                    <label for="id">Id User :</label>
                    <input type="text" name="user_id" class="form-control" id="id">
                </div>
                <div class="form-group">
                    <label for="nama">User Name :</label>
                    <input type="text" name="user_name" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="nama">User Email :</label>
                    <input type="text" name="user_email" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="nama">User Password :</label>
                    <input type="text" name="user_password" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <input type="text" value="3" name="user_level" class="form-control" id="nama" hidden>
                    <input type="text" value="1" name="status" class="form-control" id="nama" hidden>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<div class="modal fade" id="simpanPlanner">
    <?php echo form_open_multipart('superadmin/crud_data/create_planner'); ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Input Data Planner</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="container">
                <div class=" form-group">
                    <label for="id">Id User :</label>
                    <input type="text" name="user_id" class="form-control" id="id">
                </div>
                <div class="form-group">
                    <label for="nama">User Name :</label>
                    <input type="text" name="user_name" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="nama">User Email :</label>
                    <input type="text" name="user_email" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="nama">User Password :</label>
                    <input type="text" name="user_password" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <input type="text" value="1" name="user_level" class="form-control" id="nama" hidden>
                    <input type="text" value="1" name="status" class="form-control" id="nama" hidden>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<?php $no = 0;
foreach ($join_leader as $row) : $no++;
?>
    <div class="modal fade" id="modal-edit-leader<?= $row->user_id; ?>">
        <?php echo form_open_multipart('superadmin/crud_data/update_leader'); ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Leader</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class=" form-group">
                        <label for="id">Id user :</label>
                        <input type="text" name="id_leader" class="form-control" value="<?= $row->id_leader ?>" id="id" required>
                    </div>
                    <div class=" form-group">
                        <label for="id">Id user :</label>
                        <input type="text" name="user_id" class="form-control" value="<?= $row->user_id ?>" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama lengkap :</label>
                        <input type="text" name="user_name" class="form-control" value="<?= $row->user_name ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Email User :</label>
                        <input type="text" name="user_email" class="form-control" value="<?= $row->user_email ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password User :</label>
                        <input type="text" name="user_password" class="form-control" value="<?= decryptIt($row->user_password) ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="user_level" class="form-control" value="<?= $row->user_level ?>">
                        <input type="text" name="status" class="form-control" value="<?= $row->status ?>" hidden>
                        <input type="text" name="jenis_kelamin" class="form-control" value="<?= $row->jenis_kelamin ?>" hidden>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
<?php endforeach; ?>

<?php $no = 0;
foreach ($join_operator as $row) : $no++; ?>
    <div class="modal fade" id="modal-edit-operator<?= $row->user_id; ?>">
        <?php echo form_open_multipart('superadmin/crud_data/update_operator'); ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Operator</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class=" form-group">
                        <label for="id">Id user :</label>
                        <input type="text" name="id_operator" class="form-control" value="<?= $row->id_operator ?>" id="id" required>
                    </div>
                    <div class=" form-group">
                        <label for="id">Id User :</label>
                        <input type="text" name="user_id" class="form-control" value="<?= $row->user_id ?>" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap :</label>
                        <input type="text" name="user_name" class="form-control" value="<?= $row->user_name ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Email User :</label>
                        <input type="text" name="user_email" class="form-control" value="<?= $row->user_email ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password User :</label>
                        <input type="text" name="user_password" class="form-control" value="<?= decryptIt($row->user_password) ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="user_level" class="form-control" value="<?= $row->user_level ?>" id="nama" hidden>
                        <input type="text" name="status" class="form-control" value="<?= $row->status ?>" id="nama" hidden>
                        <input type="text" name="jenis_kelamin" class="form-control" value="<?= $row->jenis_kelamin ?>" hidden>
                        <input type="text" name="id_workcenter" class="form-control" value="<?= $row->id_workcenter ?>" hidden>
                        <input type="text" name="id_operasi" class="form-control" value="<?= $row->id_operasi ?>" hidden>
                        <input type="text" name="keterangan" class="form-control" value="<?= $row->keterangan ?>" hidden>
                        <input type="text" name="laporan" class="form-control" value="<?= $row->laporan ?>">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
<?php endforeach; ?>

<?php $no = 0;
foreach ($join_planner as $row) : $no++; ?>
    <div class="modal fade" id="modal-edit-planner<?= $row->user_id; ?>">
        <?php echo form_open_multipart('superadmin/crud_data/update_planner'); ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Planner</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class=" form-group">
                        <label for="id">Id user :</label>
                        <input type="text" name="id_planner" class="form-control" value="<?= $row->id_planner ?>" id="id" required>
                    </div>
                    <div class=" form-group">
                        <label for="id">Id User :</label>
                        <input type="text" name="user_id" class="form-control" value="<?= $row->user_id ?>" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap :</label>
                        <input type="text" name="user_name" class="form-control" value="<?= $row->user_name ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Email User :</label>
                        <input type="text" name="user_email" class="form-control" value="<?= $row->user_email ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Password User :</label>
                        <input type="text" name="user_password" class="form-control" value="<?= decryptIt($row->user_password) ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="user_level" class="form-control" value="<?= $row->user_level ?>" id="nama" hidden>
                        <input type="text" name="status" class="form-control" value="<?= $row->status ?>" id="nama" hidden>
                        <input type="text" name="jenis_kelamin" class="form-control" value="<?= $row->jenis_kelamin ?>" hidden>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
<?php endforeach; ?>
<?php
function decryptIt($q)
{
    $cryptKey  = '1212';
    $qDecoded      = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return ($qDecoded);
}
?>

<script>
    function cDelete() {
        return confirm('Apakah anda yakin akan menghapus data ini?')
    }

    function cEdit() {
        return confirm('Apakah anda yakin akan mengedit data ini?')
    }
</script>
<?php include('templates/footer.php'); ?>
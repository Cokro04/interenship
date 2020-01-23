<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Operator Pada Work Center <?= $this->session->userdata('id_workcenter'); ?></h3>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id operator</th>
                    <th scope="col">nama lengkap</th>
                    <th scope="col">jenis kelamin</th>
                    <th scope="col">id user</th>
                    <th scope="col">work center</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($operator as $row) { ?>
                <tbody>
                    <tr>
                        <td><?= $row->id_operator ?></td>
                        <td><?= $row->nama_lengkap ?></td>
                        <td><?= $row->jenis_kelamin ?></td>
                        <td><?= $row->id_user ?></td>
                        <td><?= $row->id_workcenter ?></td>
                        <td>
                            <a data-toggle="modal" data-target="#modal-edit<?= $row->id_operator; ?>" class="btn btn-warning" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-pencil">tambah ke operasi</i></a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

    </main>
</div>

<?php $no = 0;
foreach ($operator as $row) : $no++; ?>
    <div class="row">
        <div id="modal-edit<?= $row->id_operator; ?>" class="modal fade">
            <div class="modal-dialog">
                <form action="<?php echo site_url('leader/leader/edit'); ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" readonly value="<?= $row->id_operator; ?>" name="id_operator" class="form-control">

                            <div class="form-group">
                                <label class='col-md-3'>Modal</label>
                                <div class='col-md-9'><input type="text" name="id_operasi" autocomplete="off" value="<?= $id_operasi; ?>" required placeholder="Masukkan Modal" class="form-control"></div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php include('templates/footer.php'); ?>
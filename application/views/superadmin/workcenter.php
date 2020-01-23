<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Data Work Center Pada Superadmin</h2>
        <?php if ($this->session->flashdata('berhasil')) { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= $this->session->flashdata('berhasil') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('gagal')) { ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="alert alert-danger"> <?= $this->session->flashdata('gagal') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('delete')) { ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="alert alert-success"> <?= $this->session->flashdata('delete') ?> </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-8">
            </div>
            <div class="col-lg-4">
                <form class="form-inline" action="<?php echo base_url('superadmin/crud_data/where'); ?>" method="POST">
                    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="cari berdasarkan id" name="id">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>

        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id Work Center</th>
                    <th scope="col">Nama Work Center</th>
                    <th scope="col">tambah operator</th>
                    <th scope="col">tambah leader</th>
                    <th scope="col">Aksi
                        <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#myModal">
                            Open modal
                        </button>
                    </th>
                </tr>
            </thead>
            <?php foreach ($workcenter as $row) { ?>
                <tbody>
                    <tr>
                        <!-- <th scope="row">1</th> -->
                        <td><?= $row->id_workcenter ?></td>
                        <td><?= $row->Nama_Work_Center ?></td>
                        <td>
                            <div class="clearfix well">
                                <a class="btn btn-primary" href="<?php echo base_url('superadmin/superadmin/operator/' . $row->id_workcenter); ?>"><i class="fas fa-user"></i></a>
                            </div>
                        </td>
                        <td>
                            <div class="clearfix well">
                                <a class="btn btn-primary" href="<?php echo base_url('superadmin/superadmin/leader/' . $row->id_workcenter); ?>"><i class="fas fa-user"></i></a>
                            </div>
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#modal-edit<?= $row->id_workcenter; ?>" class="badge badge-pill badge-warning" data-popup="tooltip" data-placement="top" title="Edit Data">Edit Data</button>
                            <a href="<?php echo site_url('superadmin/crud_data/delete/' . $row->id_workcenter); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->Nama_Work_Center; ?> ?');" data-popup="tooltip" data-placement="top" title="Hapus Data">Hapus Data</a>
                            <!-- <td>button <td> -->
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </main>
</div>
<!-- The Modal1 -->
<div class="modal fade" id="myModal">
    <?php echo form_open_multipart('superadmin/crud_data/create_aksi'); ?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Input WorkCenter</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class=" form-group">
                    <label for="id">Id Work Center :</label>
                    <input type="text" name="id_workcenter" class="form-control" placeholder="Enter Id Work Center" id="id" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Work Center :</label>
                    <input type="text" name="Nama_Work_Center" class="form-control" placeholder="Enter Nama Work Center" id="nama" required>
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
<!-- The Modal2 -->
<?php $no = 0;
foreach ($workcenter as $row) : $no++; ?>
    <div class="modal fade" id="modal-edit<?= $row->id_workcenter; ?>">
        <?php echo form_open_multipart('superadmin/crud_data/update_aksi'); ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data WorkCenter</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class=" form-group">
                        <label for="id">Id Work Center :</label>
                        <input type="text" name="id_workcenter" class="form-control" value="<?= $row->id_workcenter ?>" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Work Center :</label>
                        <input type="text" name="Nama_Work_Center" class="form-control" value="<?= $row->Nama_Work_Center ?>" id="nama" required>
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
<?php include('templates/footer.php'); ?>
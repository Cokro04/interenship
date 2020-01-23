<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Data Work Order</h2>
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
        <!-- <div class="row">
            <div class="col-lg-8">
            </div>
            <div class="col-lg-4">
                <form class="form-inline" action="<?php echo base_url('superadmin/crud_data/where'); ?>" method="POST">
                    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="cari berdasarkan id" name="id">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>

        </div> -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id Work Order</th>
                    <th scope="col">Part Number</th>
                    <th scope="col">Part Number Descrption</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">standard time</th>
                    <th scope="col">setup time</th>
                    <th scope="col">Aksi
                        <button type="button" class="badge badge-pill badge-success" data-toggle="modal" data-target="#myModal">
                            Tambah Data
                        </button>
                    </th>
                </tr>
            </thead>
            <?php foreach ($workorder as $row) { ?>
                <tbody>
                    <tr>
                        <!-- <th scope="row">1</th> -->
                        <td><?= $row->id_wo ?></td>
                        <td><?= $row->Part_Number ?></td>
                        <td><?= $row->Part_Number_Desk ?></td>
                        <td><?= $row->Qty ?></td>
                        <td><?= $row->Standar_time ?></td>
                        <td><?= $row->Setup_time ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#modal-edit<?= $row->id_wo; ?>" class="badge badge-pill badge-warning" data-popup="tooltip" data-placement="top" title="Edit Data">Edit Data</button>
                            <a href="<?php echo site_url('superadmin/crud_data/delete_workorder/' . $row->id_wo); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->id_wo; ?> ?');" data-popup="tooltip" data-placement="top" title="Hapus Data">Hapus Data</a>
                            <!-- <td>button <td> -->
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </main>
</div>
<!-- The Modal1 -->
<div class="modal fade" id="myModal">
    <?php echo form_open_multipart('superadmin/crud_data/create_workorder'); ?>
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
                    <label for="id">Id Work Order :</label>
                    <input type="text" name="id_wo" class="form-control" id="id" required>
                </div>
                <div class="form-group">
                    <label for="nama">Part Number :</label>
                    <input type="text" name="Part_Number" class="form-control" id="nama" required>
                </div>
                <div class=" form-group">
                    <label for="id">Part Number Description :</label>
                    <input type="text" name="Part_Number_Desk" class="form-control" id="id" required>
                </div>
                <div class="form-group">
                    <label for="nama">Quantity :</label>
                    <input type="text" name="Qty" class="form-control" id="nama" required>
                </div>
                <div class=" form-group">
                    <label for="id">Standard Time :</label>
                    <input type="text" name="Standar_time" class="form-control" id="id" required>
                </div>
                <div class="form-group">
                    <label for="nama">Setup time :</label>
                    <input type="text" name="Setup_time" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="nama">Satuan :</label>
                    <input type="text" name="Satuan" class="form-control" id="nama" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
        <!-- Modal footer -->

    </div>
</div>
<?php echo form_close(); ?>
</div>
<!-- The Modal2 -->
<?php $no = 0;
foreach ($workorder as $row) : $no++; ?>
    <div class="modal fade" id="modal-edit<?= $row->id_wo; ?>">
        <?php echo form_open_multipart('superadmin/crud_data/update_workorder'); ?>
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
                        <label for="id">Id Work Order :</label>
                        <input type="text" name="id_wo" class="form-control" value="<?= $row->id_wo ?>" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Part Number :</label>
                        <input type="text" name="Part_Number" class="form-control" value="<?= $row->Part_Number ?>" id="nama" required>
                    </div>
                    <div class=" form-group">
                        <label for="id">Part Number Description :</label>
                        <input type="text" name="Part_Number_Desk" class="form-control" value="<?= $row->Part_Number_Desk ?>" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Quantity :</label>
                        <input type="text" name="Qty" class="form-control" value="<?= $row->Qty ?>" id="nama" required>
                    </div>
                    <div class=" form-group">
                        <label for="id">Standard Time :</label>
                        <input type="text" name="Standar_time" class="form-control" value="<?= $row->Standar_time ?>" id="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Setup time :</label>
                        <input type="text" name="Setup_time" class="form-control" value="<?= $row->Setup_time ?>" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Satuan :</label>
                        <input type="text" name="Satuan" class="form-control" value="<?= $row->Satuan ?>" id="nama" required>
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
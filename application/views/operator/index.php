<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Pekerjaaan Untuk <?= $this->session->userdata('id_user') ?></h3>
            </div>
        </div>
        <?php if ($this->session->flashdata('berhasil')) { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= $this->session->flashdata('berhasil') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('gagal')) { ?>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="alert alert-danger"> <?= $this->session->flashdata('gagal') ?> </div>
        <?php } ?>
        <?php foreach ($data as $row) { ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nama Operator</th>
                        <td><?= $row->nama_lengkap ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Operasi</th>
                        <td><?= $row->nama_operasi ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Jam Mulai Pekerjaan</th>
                        <td><?= $row->plan_start_date ?></td>
                    </tr>
                    <!-- <tr>
                        <th scope="col">Jam Selesai Pekerjaan</th>
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        <td><?= date('Y-m-d H:m:s'); ?></td>
                    </tr> -->
                </thead>
            </table>
            <center>
                <button data-toggle="modal" data-target="#modal-edita<?= $row->id_operator; ?>" class="btn btn-primary" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i> status pekerjaan</button>
                <button data-toggle="modal" data-target="#modal-edit<?= $row->id_operator; ?>" class="btn btn-primary" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-book"></i> Laporan</button>
            </center>

        <?php } ?>

        <?php if (count($data) < 1) { ?>
            <?= 'DATA PEKERJAAN MASIH DALAM PROSES' ?>
        <?php } ?>
    </main>
</div>
<?php $no = 0;
foreach ($data as $row) : $no++; ?>
    <div class="modal fade" id="modal-edit<?= $row->id_operator; ?>">
        <?php echo form_open_multipart('operator/operator/laporan'); ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Perkembangan Pekerjaan </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class=" form-group">
                        <input type="text" name="id_operator" class="form-control" value="<?= $row->id_operator; ?>" id="id" hidden>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $row->nama_lengkap; ?>" id="id" hidden>
                        <input type="text" name="jenis_kelamin" class="form-control" value="<?= $row->jenis_kelamin; ?>" id="id" hidden>
                        <input type="text" name="id_user" class="form-control" value="<?= $row->id_user; ?>" id="id" hidden>
                        <input type="text" name="id_workcenter" class="form-control" value="<?= $row->id_workcenter; ?>" id="id" hidden>
                        <input type="text" name="id_operasi" class="form-control" value="<?= $row->id_operasi; ?>" id="id" hidden>
                        <input type="text" name="keterangan" class="form-control" value="<?= $row->keterangan; ?>" id="id" hidden>
                    </div>
                    <div class="form-group">
                        <label for="comment">Laporan:</label>
                        <textarea class="form-control" name="laporan" rows="5" id="comment"></textarea>
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
foreach ($data as $row) : $no++; ?>
    <div class="modal fade" id="modal-edita<?= $row->id_operator; ?>">
        <?php echo form_open_multipart('operator/operator/status'); ?>
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Status Pekerjaan </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class=" form-group">
                        <input type="text" name="id_operator" class="form-control" value="<?= $row->id_operator; ?>" id="id" hidden>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $row->nama_lengkap; ?>" id="id" hidden>
                        <input type="text" name="jenis_kelamin" class="form-control" value="<?= $row->jenis_kelamin; ?>" id="id" hidden>
                        <input type="text" name="id_user" class="form-control" value="<?= $row->id_user; ?>" id="id" hidden>
                        <input type="text" name="id_workcenter" class="form-control" value="<?= $row->id_workcenter; ?>" id="id" hidden>
                        <input type="text" name="id_operasi" class="form-control" value="<?= $row->id_operasi; ?>" id="id" hidden>
                        <input type="text" name="laporan" class="form-control" value="<?= $row->laporan; ?>" id="id" hidden>
                    </div>
                    <center><button type="submit" name="submit" value="dalam progres" class="btn btn-primary">Di Proses</button>
                        <button type="submit" name="submit" value="di tunda" class="btn btn-warning">Di tunda</button></center>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">

                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
<?php endforeach; ?>
<?php include('templates/footer.php'); ?>
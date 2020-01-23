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
                    <th scope="col">id Operator</th>
                    <th scope="col">Nama Lengkap Operator</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Operasi Yang di kerjakan</th>
                    <th scope="col">Status / Keterangan</th>
                    <th scope="col">Laporan Operator</th>
                </tr>
            </thead>
            <?php foreach ($operator as $row) { ?>
                <tbody>
                    <tr>
                        <td><?= $row->id_operator ?></td>
                        <td><?= $row->nama_lengkap ?></td>
                        <td><?= $row->jenis_kelamin ?></td>
                        <td><?= $row->id_operasi ?></td>
                        <td><?= $row->keterangan ?></td>
                        <td>
                            <div class="clearfix well">
                                <button data-toggle="modal" data-target="#tampil<?= $row->id_operator; ?>" class="btn btn-primary" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-edit"></i> Laporan</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </main>
</div>
<?php $no = 0;
foreach ($operator as $row) : $no++; ?>
    <div class="modal fade" id="tampil<?= $row->id_operator; ?>">
        <?php echo form_open_multipart('operator/operator/update_aksi'); ?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Laporan Perkembangan Pekerjaan </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- <div class=" form-group">
                        <input type="text" name="id_laporan" class="form-control" value="<?= $row->id_operator ?>" id="id">
                        <input type="text" name="id_user" class="form-control" value="<?= $row->id_operator ?>" id="id">
                    </div> -->
                    <div class="form-group">
                        <p for="comment"> <?= $row->laporan ?></p>
                    </div>
                    <!-- <div class="form-group">
                        <label for="comment">Laporan</label>
                        <textarea class="form-control" name="catatan" aria-valuemax="<?= $row->id_user ?>" rows="5" id="comment"></textarea>
                    </div> -->
                </div>
                <!-- Modal footer -->
                <!-- <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
                </div> -->
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>

<?php endforeach; ?>
<?php include('templates/footer.php'); ?>
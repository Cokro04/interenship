<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Operasi Pada Work Center <?= $id_workcenter ?></h3>

            </div>
            <!-- /.col-lg-12 -->
        </div>


        <table class="table">


            <thead class="thead-dark">
                <tr>
                    <!-- <th scope="col">no</th> -->
                    <th scope="col">Nama Operasi </th>
                    <th scope="col">Urgensi </th>
                    <th scope="col">Plan Start Date</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Standard Time</th>
                    <th scope='col'>Setup Time</th>
                    <th scope='col'>Aksi </th>
                    <th scope="col"><?php echo anchor('superadmin/crud_data/tambah_criteria/' . $id_workcenter, 'Tambah Data', ['class' => 'badge badge-success']); ?> </th>
                </tr>
            </thead>
            <?php foreach ($data as $row) { ?>
                <tbody>
                    <tr>
                        <td>
                            <?= $row->nama_operasi ?>
                        </td>
                        <!-- <th scope="row">1</th> -->
                        <td>
                            <?php
                            if ($row->urgensi == 1) {
                                echo "sangat tidak dianjurkan";
                            } else if ($row->urgensi == 2) {
                                echo "tidak dianjurkan";
                            } else if ($row->urgensi == 3) {
                                echo "cukup dianjurkan";
                            } else if ($row->urgensi == 4) {
                                echo "dianjurkan";
                            } else if ($row->urgensi == 5) {
                                echo "sangat dianjurkan";
                            }
                            // echo $row->urgensi;
                            ?></td>
                        <td>
                            <?php
                            if ($row->psd == 1) {
                                echo "sangat tidak dianjurkan";
                            } else if ($row->psd == 2) {
                                echo "tidak dianjurkan";
                            } else if ($row->psd == 3) {
                                echo "cukup dianjurkan";
                            } else if ($row->psd == 4) {
                                echo "dianjurkan";
                            } else if ($row->psd == 5) {
                                echo "sangat dianjurkan";
                            }
                            // echo $row->psd;
                            ?>
                        </td>
                        <td><?= $row->qty; ?></td>
                        <td><?= $row->standard_time; ?></td>
                        <td><?= $row->setup_time; ?></td>
                        <td>
                            <?php echo anchor('superadmin/crud_data/edit_criteria/' . $row->id, 'Edit Data', ['class' => 'badge badge-pill badge-warning', 'onclick' => "return cEdit();"]); ?>
                        </td>
                        <td>
                            <form action="<?php echo base_url() . 'superadmin/crud_data/delete_criteria' ?>" method="POST">
                                <input type="text" name="id" value="<?= $row->id  ?>" hidden />
                                <input type="text" name="id_workcenter" value="<?= $id_workcenter ?>" hidden />
                                <button type="submit" name="submit" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $row->id; ?> ?');" class="badge badge-pill badge-danger">Hapus Data</button>
                            </form>
                        </td>
                        <!-- <td>button <td> -->
                    </tr>
                </tbody>
            <?php } ?>
        </table>
        <table class="table">
            <tbody>
                <form action="<?php echo base_url() . 'planner/planner/proses_entropy' ?>" method="POST">
                    <?php foreach ($data as $row) { ?>
                        <center><input type="text" name="coba" value=" <?= $row->id_workcenter; ?>" hidden /></center>
                    <?php } ?>
                    <?php foreach ($data_sum as $row) { ?> <tr>
                            <td><input type="text" name="C1" value="<?= $row->t_dua; ?>" hidden /></td>
                            <td><input type="text" name="C2" value="<?= $row->t_tiga; ?>" hidden /></td>
                            <td><input type="text" name="C3" value="<?= $row->t_empat; ?>" hidden /></td>
                            <td><input type="text" name="C4" value="<?= $row->t_lima; ?>" hidden /></td>
                            <td><input type="text" name="C5" value="<?= $row->t_enam; ?>" hidden /></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
        <?php if (count($data) > 1) { ?>
            <center><input type="submit" name="submit" value="Lanjutkan Ke Proses Pembobotan" class="btn btn-success" /></center>
        <?php } ?>
        </form>
    </main>
</div>
<script>
    function cDelete() {
        return confirm('Apakah anda yakin akan menghapus data ini?')
    }

    function cEdit() {
        return confirm('Apakah anda yakin akan mengedit data ini?')
    }
</script>


<?php include('templates/footer.php'); ?>
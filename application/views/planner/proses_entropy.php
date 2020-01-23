<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Bobot untuk setiap criteria</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kriteria</th>
                    <th scope="col">Nilai Bobot Kriteria</th>
                </tr>
            </thead>
            <?php $c = count($data); ?>
            <?php $counter = 0; ?>
            <?php $A = 0; ?>
            <?php $B = 0; ?>
            <?php $C = 0; ?>
            <?php $D = 0; ?>
            <?php $E = 0; ?>
            <?php $Q = 1; ?>
            <?php foreach ($data as $row) { ?>
                <?php $A += $row->urgensi / $C1 * log($row->urgensi / $C1); ?>
                <?php $B += $row->psd / $C2 * log($row->psd / $C2); ?>
                <?php $C += $row->qty / $C3 * log($row->qty / $C3); ?>
                <?php $D += $row->standard_time / $C4 * log($row->standard_time / $C4); ?>
                <?php $E += $row->setup_time / $C5 * log($row->setup_time / $C5); ?>
                <?php $total_ej = (1 - ((-1 / log($c)) * $A)) + (1 - ((-1 / log($c)) * $B)) + (1 - ((-1 / log($c)) * $C)) + (1 - ((-1 / log($c)) * $D)) + (1 - ((-1 / log($c)) * $E)); ?>
                <?php if (++$counter === $c) { ?>
                    <form action="<?php echo base_url() . 'planner/planner/proses_promethee'; ?>" method="POST">
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>Tingkat Urgensi</td>
                                <td><input type="text" name="W1" value="<?= (1 - ((-1 / log($c)) * $A)) / $total_ej; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Plan Start Date(operasi)</td>
                                <td><input type="text" name="W2" value="<?= (1 - ((-1 / log($c)) * $B)) / $total_ej; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Quantity</td>
                                <td><input type="text" name="W3" value="<?= (1 - ((-1 / log($c)) * $C)) / $total_ej; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Standard Time</td>
                                <td><input type="text" name="W4" value="<?= (1 - ((-1 / log($c)) * $D)) / $total_ej; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>Setup Time</td>
                                <td><input type="text" name="W5" value="<?= (1 - ((-1 / log($c)) * $E)) / $total_ej; ?>" readonly />
                                    <input type="text" name="coba" value="<?= $row->id_workcenter ?>" hidden /></td>
                            </tr>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Aksi</th>
                                <th scope="col"><input type="submit" name="submit" value="Lanjutkan Ke Proses Promethee" class="btn btn-success" /></th>
                            </tr>
                        </tbody>
                    </form>
                <?php } ?>
            <?php } ?>
        </table>
        <!-- <?php $total_w = ((1 - ((-1 / log($c)) * $A)) / $total_ej) + ((1 - ((-1 / log($c)) * $B)) / $total_ej) + ((1 - ((-1 / log($c)) * $C)) / $total_ej) + ((1 - ((-1 / log($c)) * $D)) / $total_ej) + ((1 - ((-1 / log($c)) * $E)) / $total_ej) ?>
                <?= $total_w; ?> -->
    </main>
</div>
<?php include('templates/footer.php'); ?>
<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <div class="col-lg-12">
            <div class="panel-group">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1">Ranking</a>
                        </h4>
                    </div> -->
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h3>Tabel Ranking</h3>
                            <div class="panel panel-info">
                                <!-- /.panel-heading -->
                                <div class="panel-body table-responsive">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">no</th>
                                                <th scope="col">Urgensi</th>
                                                <th scope="col">Plan Start Date</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Standard Time</th>
                                                <th scope='col'>Setup Time</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($datacoba as $row) { ?>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td><?= $row->urgensi; ?></td>
                                                    <td><?= $row->psd; ?></td>
                                                    <td><?= $row->qty; ?></td>
                                                    <td><?= $row->standard_time; ?></td>
                                                    <td><?= $row->id_leader; ?></td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php ?>


        <!-- <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data </h3>
            </div>
           
        </div> -->

        <!-- <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Keterangan</th>
            <th scope="col">Urgensi</th>
            <th scope="col">Plan Start Date</th>
            <th scope="col">Quantity</th>
            <th scope="col">Standard Time</th>
            <th scope='col'>Setup Time</th>
            </tr>
        </thead>
        
        <tbody>
        <?php foreach ($data_maxmin as $row) { ?>
            <tr>
            <th scope="row">max</th>
            <td><?= $row->max_dua; ?></td>
            <td><?= $row->max_tiga; ?></td>
            <td><?= $row->max_empat; ?></td>
            <td><?= $row->max_lima; ?></td>
            <td><?= $row->max_enam; ?></td>
            </tr>
            <tr>
            <th scope="row">min</th>
            <td><?= $row->min_dua; ?></td>
            <td><?= $row->min_tiga; ?></td>
            <td><?= $row->min_empat; ?></td>
            <td><?= $row->min_lima; ?></td>
            <td><?= $row->min_enam; ?></td>
            </tr>
            <?php } ?>
            <?php foreach ($datakurang as $row) { ?>
            <tr>
            <th scope="row">selisih</th>
            <td><?= $row->hasil_dua; ?></td>
            <td><?= $row->hasil_tiga; ?></td>
            <td><?= $row->hasil_empat; ?></td>
            <td><?= $row->hasil_lima; ?></td>
            <td><?= $row->hasil_enam; ?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table> -->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Detail Perhitungan</h3>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse2">Data Perbandingan Nilai Kali Bobot</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h3>Tabel Data Perbandingan Nilai Kali Bobot</h3>
                            <div class="panel panel-info">
                                <!-- /.panel-heading -->
                                <div class="panel-body table-responsive">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">no</th>
                                                <th scope="col">Urgensi</th>
                                                <th scope="col">Plan Start Date</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Standard Time</th>
                                                <th scope="col">Setup Time</th>
                                                <th scope="col">Nilai Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $data_fix = array();
                                            $i = 1;
                                            for ($a = 0; $a < sizeOf($data); $a++) {
                                                $row = $data[$a];
                                            ?>
                                                <?php foreach ($datakurang as $row1) { ?>
                                                    <?php foreach ($data_maxmin as $row2) { ?>
                                                        <?php $data_fix[$a]['a'] = (($row->urgensi - $row2->min_dua) / $row1->hasil_dua); ?>
                                                        <?php $A1 = (($row->urgensi - $row2->min_dua) / $row1->hasil_dua); ?>
                                                        <?php $data_fix[$a]['b'] = (($row->psd - $row2->min_tiga) / $row1->hasil_tiga); ?>
                                                        <?php $data_fix[$a]['c'] = (($row->qty - $row2->min_empat) / $row1->hasil_empat); ?>
                                                        <?php $data_fix[$a]['d'] = (($row2->max_lima - $row->standard_time) / $row1->hasil_lima); ?>
                                                        <?php $data_fix[$a]['e'] = (($row2->max_enam - $row->setup_time) / $row1->hasil_enam); ?>
                                                        <?php $data_fix[$a]['id'] = $row->id; ?>
                                                        <?php $data_fix[$a]['nama_operasi'] = $row->nama_operasi; ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php }
                                            $data_matrix = array();
                                            for ($a = 0; $a < sizeOf($data_fix); $a++) {
                                                $A = "";
                                                $B = "";
                                                $C = "";
                                                $D = "";
                                                $E = "";
                                                for ($b = 0; $b < sizeOf($data_fix); $b++) {
                                                    if ($a != $b) {
                                                        $A = ($data_fix[$a]['a'] - $data_fix[$b]['a']) * $W1;
                                                        $B = ($data_fix[$a]['b'] - $data_fix[$b]['b']) * $W2;
                                                        $C = ($data_fix[$a]['c'] - $data_fix[$b]['c']) * $W3;
                                                        $D = ($data_fix[$a]['d'] - $data_fix[$b]['d']) * $W4;
                                                        $E = ($data_fix[$a]['e'] - $data_fix[$b]['e']) * $W5;
                                                ?>
                                                        <tr>
                                                            <th scope="row"><?= $i++ ?></th>
                                                            <td><?= ($A < 0 ? '0' : $A) ?></td>
                                                            <td><?= ($B < 0 ? '0' : $B) ?></td>
                                                            <td><?= ($C < 0 ? '0' : $C) ?></td>
                                                            <td><?= ($D < 0 ? '0' : $D) ?></td>
                                                            <td><?= ($E < 0 ? '0' : $E) ?></td>
                                                            <td><?= (($A < 0 ? '0' : $A)) + (($B < 0 ? '0' : $B)) + (($C < 0 ? '0' : $C)) + (($D < 0 ? '0' : $D)) + (($E < 0 ? '0' : $E)) ?></td>
                                                        </tr>
                                                <?php
                                                    }
                                                    $data_matrix[$a][$b] = 0;
                                                    $data_matrix[$a][$b] = (($A < 0 ? '0' : $A)) + (($B < 0 ? '0' : $B)) + (($C < 0 ? '0' : $C)) + (($D < 0 ? '0' : $D)) + (($E < 0 ? '0' : $E));
                                                    $data_matrix[$a]['id'] = $data_fix[$a]['id'];
                                                    $data_matrix[$a]['nama_operasi'] = $data_fix[$a]['nama_operasi'];
                                                }
                                                ?>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse3">Matrix Berpasangan</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h3>Tabel Matrix Berpasangan</h3>
                            <div class="panel panel-info">
                                <!-- /.panel-heading -->
                                <div class="panel-body table-responsive">
                                    <table class="table">
                                        <thead class="thead-dark">

                                        </thead>
                                        <tbody>
                                            <?php
                                            $data_dump_total_row = array();
                                            $data_dump_total_rank_col = array();
                                            for ($b = 0; $b < sizeOf($data_matrix); $b++) {
                                                echo "<tr>";

                                                $data_dump_total_col = 0;
                                                for ($a = 0; $a < sizeOf($data_matrix); $a++) {
                                                    $data_dump = $data_matrix[$b][$a];
                                                    $data_dump_total_col += $data_dump;
                                                    if (!isset($data_dump_total_row[$a])) {
                                                        $data_dump_total_row[$a] = 0;
                                                    }
                                                    if ($a != $b) {
                                                        $data_dump_total_row[$a] += $data_dump;
                                                    }

                                                    if ($a == 3) {
                                                        // echo 'ss'.$data_dump;
                                                    }

                                            ?>
                                                    <th scope="col"> <?= ($b == $a ? '' : $data_dump) ?> </th>
                                                <?php

                                                }
                                                $data_dump_total_rank_col[$b] = 1 / (sizeOf($data_matrix) - 1) * $data_dump_total_col;
                                                ?>
                                                <!-- <th scope="col"><?= $data_dump_total ?></th> -->
                                                <th scope="col"><?= 1 / (sizeOf($data_matrix) - 1) * $data_dump_total_col ?></th>
                                                <?php
                                                // echo $data_dump_total_row[1];
                                                ?>


                                                </tr>
                                            <?php
                                            }

                                            ?>
                                            <tr>
                                                <?php
                                                for ($a = 0; $a < sizeOf($data_dump_total_row); $a++) {
                                                    $data_dump_total_row[$a] = 1 / (sizeOf($data_matrix) - 1) * $data_dump_total_row[$a];
                                                ?><th scope="col"><?= $data_dump_total_row[$a] ?></th><?php
                                                                                                    }
                                                                                                        ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">DATA RANGKING</h3>
            </div>

        </div>
        <!-- <div class="col-lg-12">
            <div class="panel-group">
                <div class="panel panel-default"> -->
        <!-- <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse4">Ranking</a>
                        </h4>
                    </div> -->
        <!-- <div id="collapse4" class="panel-collapse collapse"> -->
        <div class="panel-body">
            <h3>Tabel Ranking</h3>
            <div class="panel panel-info">
                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Urutan Operasi</th>
                                <th scope="col">ID Operasi</th>
                                <th scope="col">Nama Operasi</th>
                                <th scope="col"></th>
                                <!-- <th scope="col">id_leader</th> -->
                            </tr>

                        </thead>
                        <form method="post" action="<?php echo base_url("planner/planner/save_rangking"); ?>">
                            <tbody>
                                <?php
                                $data_temp = array();
                                for ($a = 0; $a < sizeOf($data_dump_total_rank_col); $a++) {
                                    $temp = 0;
                                    $data_temp[$a]['data'] = $data_dump_total_rank_col[$a] - $data_dump_total_row[$a];
                                    $data_temp[$a]['nama_operasi'] = $data_matrix[$a]['nama_operasi'];
                                    $data_temp[$a]['id'] = $data_matrix[$a]['id'];
                                }
                                $arr = $data_temp;
                                $n = sizeOf($data_temp);
                                for ($i = 0; $i < $n; $i++) {
                                    $low = $i;
                                    for ($j = $i + 1; $j < $n; $j++) {
                                        if ($arr[$j] > $arr[$low]) {
                                            $low = $j;
                                        }
                                    }

                                    // swap the minimum value to $ith node 
                                    if ($arr[$i] < $arr[$low]) {
                                        $tmp = $arr[$i];
                                        $arr[$i] = $arr[$low];
                                        $arr[$low] = $tmp;
                                    }
                                }
                                $data_temp = $arr;
                                for ($a = 0; $a < sizeOf($data_temp); $a++) {
                                ?>
                                    <tr>
                                        <td><input type="text" name="urutan[]" value="<?= $a + 1 ?>" required></td>
                                        <td><input type="text" name="id_operasi[]" value="<?= $data_temp[$a]['id'] ?>" required></td>
                                        <?php $data_temp[$a]['data'] ?>
                                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                        <td><?= $data_temp[$a]['nama_operasi'] ?></td>

                                        <td><input type="text" name="id_workcenter[]" value="<?= $id_workcenter ?>" hidden>
                                            <input type="text" name="date[]" value="<?= date('Y-m-d'); ?>" hidden>
                                        </td>
                                        <!-- <td>100</td> -->
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>


                    </table>
                </div>
                <center><input type="submit" value="Simpan" class="btn btn-success"></center>
                </form>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="panel-footer"></div>
        <!-- </div> -->
        <!-- </div>
            </div>
        </div> -->
        </table>



        <!-- <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Nilai Total Setiap data </h3>
            </div>
              
        </div> -->
        <!-- <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Urgensi</th>
            <th scope="col">Plan Start Date</th>
            <th scope="col">Quantity</th>
            <th scope="col">Standard Time</th>
            <th scope='col'>Setup Time</th>
            </tr>
        </thead>
        <tbody>
        <form action="<?php echo base_url() . 'planner/simpan'; ?>" method="POST">
        <?php foreach ($data as $row) { ?>
            <?php foreach ($datakurang as $row1) { ?>
                <?php foreach ($data_maxmin as $row2) { ?>
            <tr>
        
            <td><input type="text" name="nilai1[]" value="<?= ($row->urgensi - $row2->min_dua) / $row1->hasil_dua ?>"/></td>
            <td><input type="text" name="nilai2[]" value="<?= ($row->psd - $row2->min_tiga) / $row1->hasil_tiga; ?>"/></td>
            <td><input type="text" name="nilai3[]" value="<?= ($row->qty - $row2->min_empat) / $row1->hasil_empat; ?>"/></td>
            <td><input type="text" name="nilai4[]" value="<?= ($row2->max_lima - $row->standard_time) / $row1->hasil_lima; ?>"/></td>
            <td><input type="text" name="nilai5[]" value="<?= ($row2->max_enam - $row->setup_time) / $row1->hasil_enam; ?>"/></td>
            </tr>
                <?php } ?>
            <?php } ?>
        <?php } ?>
        <input type="submit" name="submit" value="Proses Data" />
        </form>
        </tbody>
        </table>
    </main>
  </div> -->

        <?php include('templates/footer.php'); ?>
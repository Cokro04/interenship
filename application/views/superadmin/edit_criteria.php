<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Form Edit Data Criteria</h2>

        <div class="row justify-content-md-center">
            <div class="col-8">
                <?php echo form_open_multipart('superadmin/crud_data/edit_criteria'); ?>
                <?php foreach ($data as $row) { ?>
                    <div class="form-group">
                        <input type="text" name="id" class="form-control" value="<?= $row->id ?>" id="nama_operasi" hidden>
                    </div>
                    <div class="form-group">
                        <label for="nama_operasi">Nama Operasi :</label>
                        <input type="text" name="nama_operasi" class="form-control" value="<?= $row->nama_operasi ?>" id="nama_operasi" required>
                    </div>
                    <label for="id">Id workorder :</label>
                    <select type="text" name="id_workorder" id="id_workorder" class="form-control" placeholder="Enter Id Work Center">
                        <option value=""></option>

                        <?php
                        foreach ($workorder as $data) { // Lakukan looping pada variabel siswa dari controller
                            echo "<option value='" . $data->id_wo . "'>" . $data->id_wo . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group">
                        <label>quantity :</label>
                        <select name="qty" id="qty" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>standard time :</label>
                        <select name="standard_time" id="standard_time" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>setup time :</label>
                        <select name="setup_time" id="setup_time" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="setup_time">tanggal pengiriman :</label>
                        <div class='input-group date' id='tanggal'>
                            <input name="urgensi" type="text" class="form-control" value="<?= $row->tgl_kirim ?>" id="input_dtp_default" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="setup_time">plan start date :</label>
                        <div class='input-group date' id='tanggal1'>
                            <input name="psd" type="text" class="form-control" value="<?= $row->plan_start_date ?>" id="input_dtp_default" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_workcenter">Work Center :</label>
                        <input type="text" name="id_workcenter" class="form-control" value="<?= $row->id_workcenter ?>" id="id_workcenter">
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                <?php } ?>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </main>
</div>
<?php include('templates/footer.php'); ?>
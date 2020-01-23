<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Form Cari Work Center</h2>

        <div class="row justify-content-md-center">
            <div class="col-8">
                <?php foreach ($workcenter as $row) { ?>
                    <form action="<?php echo base_url() . 'superadmin/crud_data/update_operator_aksi'; ?>" method="post">
                        <div class=" form-group">
                            <label for="id">Id Operator :</label>
                            <input type="text" name="id_operator" class="form-control" placeholder="id User" id="id">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap :</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="username" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">Jenis Kelamin :</label>
                            <input type="text" name="jenis_kelamin" class="form-control" placeholder="username" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">id user :</label>
                            <input type="text" name="id_user" class="form-control" placeholder="username" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">id workcenter :</label>
                            <input type="text" name="id_workcenter" class="form-control" placeholder="username" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="nama">id operasi :</label>
                            <input type="text" name="id_operasi" class="form-control" value="" id="nama">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </main>
</div>

<?php include('templates/footer.php'); ?>
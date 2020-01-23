<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Rangking</h3>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Urutan </th>
                    <th scope="col">Nama Operasi</th>
                    <th scope="col">Menu Pilih Operator</th>
                </tr>
            </thead>
            <?php foreach ($data as $row) { ?>
                <tbody>
                    <tr>
                        <td><?= $row->urutan ?></td>
                        <td><?= $row->nama_operasi ?></td>
                        <td>
                            <div class="clearfix well">
                                <a class="btn btn-primary" href="<?php echo base_url('leader/leader/operator/' . $row->id_operasi); ?>"><i class="fas fa-user"></i> Pilih Operator</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </main>
</div>

<?php include('templates/footer.php'); ?>
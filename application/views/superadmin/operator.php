<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Tabel Data User</h3>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id operator</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Aksi <?php echo anchor('superadmin/crud_data/create_operator/', 'Tambah Data', ['class' => 'badge badge-pill badge-success']); ?></th>
                </tr>
            </thead>
            <?php foreach ($operator as $row) { ?>
                <tbody>
                    <tr>
                        <!-- <th scope="row">1</th> -->
                        <td><?= $row->id_operator ?></td>
                        <td><?= $row->nama_lengkap ?></td>
                        <td> <?php echo anchor('superadmin/crud_data/update_operator/' . $row->id_operator, 'Edit', ['class' => 'badge badge-pill badge-warning', 'onclick' => "return cEdit();"]); ?>
                            <?php echo anchor('superadmin/crud_data/delete_operator/' . $row->id_operator, 'Hapus', ['class' => 'badge badge-pill badge-danger', 'onclick' => "return cDelete();"]); ?></td>
                        <!-- <td>button <td> -->
                    </tr>
                </tbody>
            <?php } ?>
        </table>
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
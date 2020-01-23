<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
<?php include('templates/sidebar.php'); ?>
<div class="container-fluid">
   <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <h2>Data work center dan operasi</h2>
      <table class="table">
         <thead class="thead-dark">
            <tr>
               <th scope="col">Id Work Center</th>
               <th scope="col">Nama Work Center</th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <?php foreach ($work_center as $row) { ?>
            <tbody>
               <tr>
                  <!-- <th scope="row">1</th> -->
                  <td><?= $row->id_workcenter ?></td>
                  <td><?= $row->Nama_Work_Center ?></td>
                  <td> <?php echo anchor('superadmin/crud_data/view/' . $row->id_workcenter, 'Data Operasi', ['class' => 'btn btn-success btn-sm']); ?></td>
                  <!-- <td>button <td> -->
               </tr>
            </tbody>
         <?php } ?>
      </table>
   </main>
</div>

<?php include('templates/footer.php'); ?>
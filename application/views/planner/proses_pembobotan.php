<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>
<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data ej = N * SUM nij</h3>
            </div>
                <!-- /.col-lg-12 -->
        </div>

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
        <?php $i = 1 ?>
       
        <tbody>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?=  (-1/log($N))*$A1; ?></td>
            <td><?= (-1/log($N))*$A2; ?></td>
            <td><?= (-1/log($N))*$A3; ?></td>
            <td><?= (-1/log($N))*$A4; ?></td>
            <td><?= (-1/log($N))*$A5; ?></td>
            </tr>
        </tbody>
      
        </table>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data 1-ej</h3>
            </div>
                <!-- /.col-lg-12 -->
        </div>

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
        <?php $i = 1 ?>
       
        <tbody>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?=  1-((-1/log($N))*$A1); ?></td>
            <td><?= 1-((-1/log($N))*$A2); ?></td>
            <td><?= 1-((-1/log($N))*$A3); ?></td>
            <td><?= 1-((-1/log($N))*$A4); ?></td>
            <td><?= 1-((-1/log($N))*$A5); ?></td>
            </tr>
        </tbody>
      
        </table>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Total 1-ej</h3>
            </div>
                <!-- /.col-lg-12 -->
        </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nilai total</th>
            </tr>
        </thead>
        <?php $sum_ej= (1-((-1/log($N))*$A1))+(1-((-1/log($N))*$A2))+(1-((-1/log($N))*$A3))+(1-((-1/log($N))*$A4))+(1-((-1/log($N))*$A5)) ?>
        <tbody>
            <tr>
            <th scope="row"><?= $sum_ej ?></th>
            </tr>
        </tbody>
        </table>


        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Bobot</h3>
            </div>
                <!-- /.col-lg-12 -->
        </div>

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
        <?php $i = 1 ?>
       
        <tbody>
            <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= (1-((-1/log($N))*$A1))/$sum_ej; ?></td>
            <td><?= (1-((-1/log($N))*$A2))/$sum_ej; ?></td>
            <td><?= (1-((-1/log($N))*$A3))/$sum_ej; ?></td>
            <td><?= (1-((-1/log($N))*$A4))/$sum_ej; ?></td>
            <td><?= (1-((-1/log($N))*$A5))/$sum_ej; ?></td>
            </tr>
        </tbody>
        </table>

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Total BOBOT</h3>
            </div>
                <!-- /.col-lg-12 -->
        </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Total penjumlahan bobot</th>
            </tr>
        </thead>
        <?php $sum_bobot = ((1-((-1/log($N))*$A1))/$sum_ej)+((1-((-1/log($N))*$A2))/$sum_ej)+((1-((-1/log($N))*$A3))/$sum_ej)+((1-((-1/log($N))*$A4))/$sum_ej)+((1-((-1/log($N))*$A5))/$sum_ej) ?>
        <tbody>
            <tr>
            <th scope="row"><?= $sum_bobot ?></th>
            </tr>
        </tbody>
        </table>



    </main>
  </div>

<?php $this->load->view('templates/footer') ?>
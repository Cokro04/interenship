<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <link href="<?php echo base_url('assets/image/aa.ico') ?>" rel="icon" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>dist/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>dist/css/bootstrap-reboot.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>dist/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>dist/css/bootstrap-grid.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>dist/css/floating-labels.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <form class="form-signin" action="" method="post">
        <div class="text-center mb-4">
            <img class="mb-4" src="<?php echo base_url(); ?>assets/image/aa.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Form Login</h1>
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
        <?php echo $this->session->flashdata('msg'); ?>
        <div class="form-label-group">
            <input type="text" id="inputText" class="form-control" name="username" placeholder="username" required autofocus>
            <label for="inputText">Username</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>
        <!-- <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div> -->
        <button class="btn btn-lg btn-primary btn-block" value="Login" name="kirim" type="submit">Sign in</button>
        <!-- <input type="submit" name="kirim" value="Login" class="btn btn-lg btn-success btn-block"> -->
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
    </form>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>js/dist/jquery.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>dist/js/metisMenu.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/metisMenu.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/dashboard.js"></script>

    <!-- Page level plugin JavaScript-->



    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script>
        $(document).on('click', '#Chose', function() {

            var ParamId = $('#CobaCount').val();
            console.log(ParamId);
            var ParamA = $(this).attr("data-A");
            var ParamB = $(this).attr("data-B");
            var ParamC = $(this).attr("data-C");
            var ParamD = $(this).attr("data-D");
            var ParamE = $(this).attr("data-E");
            $('#ParA').html("");
            $('#ParB').html("");
            $('#ParC').html("");
            $('#ParD').html("");
            $('#ParE').html("");
            $('#ParI').html("");

            $('#ParA').append($('<input>', {
                type: 'text',
                name: 'A1',
                value: ParamA
            }));
            $('#ParB').append($('<input>', {
                type: 'text',
                name: 'A2',
                value: ParamB
            }));
            $('#ParC').append($('<input>', {
                type: 'text',
                name: 'A3',
                value: ParamC
            }));
            $('#ParD').append($('<input>', {
                type: 'text',
                name: 'A4',
                value: ParamD
            }));
            $('#ParE').append($('<input>', {
                type: 'text',
                name: 'A5',
                value: ParamE
            }));
            $('#ParI').append($('<input>', {
                type: 'text',
                name: 'N',
                value: ParamId
            }));
        });
    </script>

    <!-- Demo scripts for this page-->
</body>

</html>
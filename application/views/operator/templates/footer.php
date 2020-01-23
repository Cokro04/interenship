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
            type:'text', name:'A1', value: ParamA
        }));
        $('#ParB').append($('<input>', {
            type:'text', name:'A2', value: ParamB
        }));
        $('#ParC').append($('<input>', {
            type:'text', name:'A3', value: ParamC
        }));
        $('#ParD').append($('<input>', {
            type:'text', name:'A4', value: ParamD
        }));
        $('#ParE').append($('<input>', {
            type:'text', name:'A5', value: ParamE
        }));
        $('#ParI').append($('<input>', {
            type:'text', name:'N', value: ParamId
        }));
    });
</script>

<!-- Demo scripts for this page-->
</body>

</html>
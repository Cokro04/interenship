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
<script src="<?= base_url('assets/') ?>dist/js/bootstrap-datetimepicker.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/bootstrap-datetimepicker.min.js"></script>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<!-- Page level plugin JavaScript-->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script type="text/javascript">
    $("#tanggal").datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
    });
    $("#tanggal1").datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
    });
</script>

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#loading").hide();

        $("#id_workorder").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#qty").hide(); // Sembunyikan dulu combobox kota nya
            $("#standard_time").hide();
            $("#setup_time").hide();
            $("#loading").show(); // Tampilkan loadingnya
            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("superadmin/crud_data/listWorkorder"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_workorder: $("#id_workorder").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#qty").html(response.list_qty).show();
                    $("#standard_time").html(response.list_standard_time).show();
                    $("#setup_time").html(response.list_setup_time).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>

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
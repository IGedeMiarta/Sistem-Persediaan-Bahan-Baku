</div> <!-- content -->

<footer class="footer">
    © 2020 Gayo-Coffee <span class="d-none d-md-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> </span>
</footer>

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->




<!-- jQuery  -->
<script src="<?= base_url('vendor/admin/assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/modernizr.min.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/detect.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/fastclick.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/jquery.slimscroll.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/jquery.blockUI.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/waves.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/jquery.nicescroll.js') ?>"></script>
<script src="<?= base_url('vendor/admin/assets/js/jquery.scrollTo.min.js') ?>"></script>

<!-- Required datatable js -->
<script src="<?= base_url('vendor/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('vendor/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!--Morris Chart-->
<!-- <script src="<?= base_url('vendor/plugins/morris/morris.min.js') ?>"></script>
<script src="<?= base_url('vendor/plugins/raphael/raphael.min.js') ?>"></script> -->

<!-- dashboard js -->
<!-- <script src="<?= base_url('vendor/admin/assets/pages/dashboard.int.js') ?>"></script> -->

<!-- Responsive examples -->
<script src="<?= base_url('vendor/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('vendor/plugins/datatables/responsive.bootstrap4.min.js') ?>"></script>

<!-- Datatable init js -->
<script src="<?= base_url('vendor/admin/assets/pages/datatables.init.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('vendor/admin/assets/js/app.js') ?>"></script>


<script type="text/javascript">
    function autofill() {
        var material = $("#material").val();
        $.ajax({
            url: "<?= base_url('gudang/cari') ?>",
            data: 'material=' + material,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('stok').value = val.stok;
                });
            }
        });
    }
</script>

<script type="text/javascript">
    function fill1() {
        var produk = $("#produk1").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga1').value = val.harga;
                });
            }
        });
    }
</script>
<script type="text/javascript">
    function fill2() {
        var produk = $("#produk2").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga2').value = val.harga;
                });
            }
        });
    }
</script>
<script type="text/javascript">
    function fill3() {
        var produk = $("#produk3").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga3').value = val.harga;
                });
            }
        });
    }
</script>
<script type="text/javascript">
    function fill4() {
        var produk = $("#produk4").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga4').value = val.harga;
                });
            }
        });
    }
</script>


<script>
    $(document).ready(function() {
        for (B = 1; B <= 1; B++) {
            Barisbaru();
        }
        $('#BarisBaru').click(function(e) {
            e.preventDefault();
            Barisbaru();
        });
        $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus
    });

    function Barisbaru() {
        $(document).ready(function() {
            $("[data-toogle='tooltip'").tooltip();
        })
        var Nomor = $("#tableLoop tbody tr").length + 1;
        var Baris = '<tr>';
        Baris += '<td class="text-center">' + Nomor + '</td>';
        Baris += '<td>';
        Baris += '<input type="text" name="produk[]"  class="form-control" placeholder="Nama Produk" required="">';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="text" name="harga[]" class="form-control" placeholder="Harga" required="">';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah Beli" required="">';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<a class="btn btn-sm btn-danger text-center" id="hapusBaris" data-toggle="tooltip" title="Hapus Baris"><i class="fa fa-times text-white"></i></a>';
        Baris += '</td>';
        Baris += '</tr>';

        $("#tableLoop tbody").append(Baris);
        $("#tableLoop tbody tr").each(function() {
            $(this).find('td:nth-child(2) input').focus();
        });

    }
    $(document).on('click', '#hapusBaris', function(e) {
        e.preventDefault();
        var Nomor = 1;
        $(this).parent().parent().remove();
        $('tableLoop tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html(Nomor);
            Nomor++;
        });
    });
</script>

</body>

</html>
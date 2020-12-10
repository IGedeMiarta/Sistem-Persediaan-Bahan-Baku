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

<!--Morris Chart-->
<script src="<?= base_url('vendor/plugins/morris/morris.min.js') ?>"></script>
<script src="<?= base_url('vendor/plugins/raphael/raphael.min.js') ?>"></script>

<!-- dashboard js -->
<script src="<?= base_url('vendor/admin/assets/pages/dashboard.int.js') ?>"></script>

<!-- Bootstrap inputmask js -->
<script src="<?= base_url('vendor/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('vendor/admin/assets/js/app.js') ?>"></script>

<!-- <script>
    jQuery.browser = {};
    (function() {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script> -->
<script>
    jQuery.browser = {};
    $("perhitungan").keyup(function() {
        var harga = parseInt($("#harga").val())
        var bayar = parseInt($("#bayar").val())

        var hasil = bayar - harga;
        $("#kambali").attr("value", hasil);
    });
</script>
</body>

</html>
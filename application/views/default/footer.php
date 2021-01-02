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
<script src="<?= base_url('vendor/plugins/morris/morris.min.js') ?>"></script>
<script src="<?= base_url('vendor/plugins/raphael/raphael.min.js') ?>"></script>

<!-- dashboard js -->
<script src="<?= base_url('vendor/admin/assets/pages/dashboard.int.js') ?>"></script>

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


</body>

</html>
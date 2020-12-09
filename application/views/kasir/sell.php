<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Penjualan</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right d-none d-md-block">

                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <?php foreach ($produk as $p) { ?>
                <div class="col-xl-4 ">
                    <img class="card-img-top img-fluid" src="<?= base_url('assets/image/product/es.jpg') ?>" alt="Card image cap">
                    <div class="card m-b-30 card-body text-center">
                        <h4 class="card-title font-16 mt-0"><?= $p->nama; ?></h4>
                        <p class="card-text"><?= $p->deskripsi; ?></p>
                        <h4>Rp.<?= $p->harga; ?></h4>
                        <a href="#" class="btn btn-primary waves-effect waves-light">Beli</a>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
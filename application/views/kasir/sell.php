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
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
                                    </ol>
                                </nav>
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
                        <?php
                        $text = $p->deskripsi;
                        ?>
                        <p class="card-text"><?= substr($text, 0, 50) . '...' ?></p>
                        <h4>Rp.<?= $p->harga; ?></h4>
                        <a href="<?= base_url('kasir/sell_add/' . $p->kd_produk) ?>" class="btn btn-primary waves-effect waves-light">Beli</a>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
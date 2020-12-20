<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Pembelian</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Pembalian</li>
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

        <div class="card">

            <div class="card-body">
                <?php foreach ($produk  as $p) { ?>
                    <form method="POST" action="<?= base_url('kasir/sell_act') ?>">
                        <div class="form-group row ">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Pemebli</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-3" id="pembeli" name="pembeli" placeholder="Nama pembeli">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mb-3" id="" name="" value="<?= $p->nama ?>" readonly>
                            </div>
                        </div>
                        <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Nama Produk" value="<?= $p->kd_produk ?>" hidden>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Harga Produk</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="" class="form-control" name="harga" id="harga" value="<?= $p->harga ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Bayar</label>
                            <div class="col-sm-10">
                                <input type="number" placeholder="" name="bayar" class="form-control" id="bayar" onkeyup="kembali()">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Kembalian</label>
                            <div class="col-sm-10">
                                <input type="number" placeholder="" name="kembali" id="kembali" class="form-control" id="bayar" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3">Check Out</button>
                            </div>
                        </div>

                    </form>
                <?php } ?>


            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
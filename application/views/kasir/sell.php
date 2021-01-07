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
        <div class="card">
            <div class="card-body">

                <form method="POST" action="<?= base_url('kasir/sell_act') ?>" target="_blank">
                    <div class="form-group row ">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Pembeli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mb-3" id="pembeli" name="pembeli" placeholder="Nama pembeli">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Menu #1</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="produk1" id="produk1" onchange="fill1()">
                                <option value="null" selected>-- Pilih</option>
                                <?php foreach ($produk as $mtrl) { ?>
                                    <option value="<?= $mtrl->nama ?>"><?= $mtrl->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="harga1" name="harga1" placeholder="00000" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="jumlah1" name="jumlah1" placeholder="Jumlah Beli">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Menu #2</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="produk2" id="produk2" onchange="fill2()">
                                <option value="null" selected>-- Pilih</option>
                                <?php foreach ($produk as $mtrl) { ?>
                                    <option value="<?= $mtrl->nama; ?>"><?= $mtrl->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="harga2" name="harga2" placeholder="00000" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="jumlah2" name="jumlah2" placeholder="Jumlah Beli">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Menu #3</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="produk3" id="produk3" onchange="fill3()">
                                <option value="null" selected>-- Pilih</option>
                                <?php foreach ($produk as $mtrl) { ?>
                                    <option value="<?= $mtrl->nama; ?>"><?= $mtrl->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="harga3" name="harga3" placeholder="00000" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="jumlah3" name="jumlah3" placeholder="Jumlah Beli">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Menu #4</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="produk4" id="produk4" onchange="fill4()">
                                <option value="null" selected>-- Pilih</option>
                                <?php foreach ($produk as $mtrl) { ?>
                                    <option value="<?= $mtrl->nama; ?>"><?= $mtrl->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="harga4" name="harga4" placeholder="Harga" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control mb-3" id="jumlah4" name="jumlah4" placeholder="Jumlah Beli">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <button type="submit pull-right" class="btn btn-primary mt-3">Check Out</button>
                            <!-- <a href="" target="_blank" type="submit" class="btn btn-primary mt-3">Check Out</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- <div class="row">
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
        </div> -->

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
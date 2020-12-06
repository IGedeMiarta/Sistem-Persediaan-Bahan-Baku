<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Edit Produk</h4>
                        </div>

                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <?php foreach ($prod as $p) { ?>
                    <form method="POST" action="<?= base_url('kasir/product_edt_act/' . $p->kd_produk) ?>">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" value="<?= $p->nama_produk ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Material Digunakan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="material">
                                    <option selected value="<?= $p->mtrl ?>"><?= $p->nama_material ?></option>
                                    <?php foreach ($material as $m) { ?>
                                        <option value="<?= $m->kd_material ?>"><?= $m->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Gram yg digunakan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="use" name="use" placeholder="Berapa Gram Material Yang Digunakan" value="<?= $p->material_cost ?>">
                                <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga" name="harga" placeholder=" Harga Produk" value="<?= $p->harga; ?>">
                                <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>

        </div>
        <!-- end page title -->


    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
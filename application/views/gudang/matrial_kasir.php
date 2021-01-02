<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tambah Material Keluar</h4>
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
                <form method="POST" action="<?= base_url('gudang/material_kasir_act') ?>">

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Material</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="material" id="material">
                                <option selected value="<?= $out['kd_material']; ?>"> <?= $out['nama']; ?></option>
                                <!-- <option value="<?= $out['kd_material']; ?>"><?= $out['nama']; ?></option> -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Tersedia</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="stok" name="jumlah" placeholder="Material Tersedia / gram" value="<?= $out['stok']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" onkeyup="autofill()" placeholder="Jumlah Material Keluar / gram">
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
            </div>

        </div>
        <!-- end page title -->


    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
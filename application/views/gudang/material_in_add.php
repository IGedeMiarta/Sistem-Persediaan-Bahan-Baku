<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tambah Material Masuk</h4>
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
                <form method="POST" action="<?= base_url('gudang/material_in_act') ?>">

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Material</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="material">
                                <option selected>-- Pilih</option>
                                <?php foreach ($material as $mtrl) { ?>
                                    <option value="<?= $mtrl->kd_material; ?>"><?= $mtrl->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Material Masuk / gram" value="<?= set_value('jumlah'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Supplier</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="supplier">
                                <option selected>-- Pilih</option>
                                <?php foreach ($supplier as $s) { ?>
                                    <option value="<?= $s->id_sup; ?>"><?= $s->nama_sup; ?></option>
                                <?php } ?>
                            </select>
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
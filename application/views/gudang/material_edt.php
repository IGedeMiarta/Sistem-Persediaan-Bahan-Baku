<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tambah Material</h4>
                        </div>

                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div>

        <?php

        // var_dump($tipe);
        // die;
        ?>
        <div class="card">
            <div class="card-body">
                <?php foreach ($edit as $edt) { ?>
                    <form method="POST" action="<?= base_url('gudang/material_edt_act/' . $edt->kd_material) ?>">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Material</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Material" value="<?= $edt->nama ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Varian</label>
                            <div class="col-sm-10">
                                <?php
                                $style = 'class="form-control input-sm"';
                                echo form_dropdown('varian', $varian, '', $style);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tipe</label>
                            <div class="col-sm-10">
                                <?php
                                $style = 'class="form-control input-sm"';
                                echo form_dropdown('tipe', $tipe, '', $style);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>

        </div>
        <!-- end page title -->


    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
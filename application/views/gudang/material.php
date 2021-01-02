<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Stok Material</h4>
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

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header badge badge-primary" id="headingOne">
                    <h5>Tambah Data Material</h5>
                    <h2 class="mt-n5 mb-n1">
                        <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <a href="#" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('gudang/material_add_act') ?>">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nama Material</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Material" value="<?= set_value('name'); ?>">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header badge badge-dark">
                <h5>Stok Gudang</h5>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama </th>
                            <th scope="col">Varian</th>
                            <th scope="col">Tipe</th>
                            <th class="text-center" scope="col">
                                Stok </br> (gram)
                            </th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($material as $mtrl) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>

                                <td><?= $mtrl->nama ?></td>
                                <td><?= $mtrl->varian ?></td>
                                <td><?= $mtrl->tipe ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($mtrl->stok != 0) {
                                        echo $mtrl->stok . ' gram';
                                    } else {
                                        echo ' - ';
                                    }
                                    ?>
                                </td>
                                <td class="text-center" width=10px>
                                    <a href="<?= base_url('gudang/material_edt/' . $mtrl->kd_material) ?>" class="badge badge-warning"><i class="dripicons-document-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header badge badge-warning">
                <h5>Stok Kasir</h5>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama </th>
                            <th scope="col">Varian</th>
                            <th scope="col">Tipe</th>
                            <th class="text-center" scope="col">
                                Stok </br> (gram)
                            </th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kasir as $k) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>

                                <td><?= $k->nama ?></td>
                                <td><?= $k->varian ?></td>
                                <td><?= $k->tipe ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($k->stok >= 5) {
                                        echo $k->stok . ' gram';
                                    } else if ($k->stok <= 5 && $k->stok != 0) {
                                        echo '<h1 class="badge badge-danger">' . $k->stok . '</h1>';
                                    } else {
                                        echo '<h1 class="badge badge-danger">Kosong</h1>';
                                    }
                                    ?>
                                </td>
                                <td class="text-center" width=10px>
                                    <a href="<?= base_url('gudang/material_kasir/' . $k->kd_material) ?>" class="badge badge-success"><i class="dripicons-document-edit"></i> Tambah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
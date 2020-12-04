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

        <div class="card">
            <div class="card-body">
                <!-- <a href="<?= base_url('owner/material_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a> -->
                <div class="float-left d-none d-md-block mb-3">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="dripicons-plus mr-1"></i> Tambah
                        </button>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-animated">
                            <a class="dropdown-item" href="<?= base_url('gudang/material_add') ?>">Data Material</a>
                            <a class="dropdown-item" href="<?= base_url('gudang/material_in') ?>">Material Masuk</a>
                            <a class="dropdown-item" href="<?= base_url('gudang/material_out') ?>">Material Keluar</a>
                        </div>
                    </div>
                </div>
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
                                    <!-- <a href="<?= base_url('owner/pegawai_del/' . $mtrl->kd_material) ?>" class="badge badge-danger"><i class="dripicons-trash"></i> Hapus</a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
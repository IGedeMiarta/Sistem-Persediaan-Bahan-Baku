<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Material Masuk</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Stok Material</li>
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
        <?php if ($alert['alert'] != 0) { ?>
            <div class="card">
                <div class="card-header badge badge-warning">
                    <h5>Material Masuk</h5>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Material </th>
                                <th scope="col">Varian</th>
                                <th scope="col">Tipe</th>
                                <th class="text-center" scope="col">
                                    Jumlah Masuk
                                </th>
                                <!-- <th scope="col">Detail</th> -->
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($material as $mtrl) { ?>
                                <tr>
                                    <th width="10px" scope="row"><?= $no++ ?></th>
                                    <td><?= $mtrl->waktu ?></td>
                                    <td><?= $mtrl->nama ?></td>
                                    <td><?= $mtrl->varian ?></td>
                                    <td><?= $mtrl->tipe ?></td>
                                    <td class="text-center"><?= $mtrl->jumlah ?> gram</td>
                                    <td>
                                        <a href="<?= base_url('kasir/terima?material=' . $mtrl->kd_material . '&kd=' . $mtrl->kd_keluar) ?>" class="badge badge-success"><i class="dripicons-document-edit"></i> Terima</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>

        <div class="card">
            <div class="card-header badge badge-dark">
                <h5>Data Material</h5>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Material </th>
                            <th scope="col">Varian</th>
                            <th scope="col">Tipe</th>
                            <th class="text-center" scope="col">
                                Jumlah Masuk
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($masuk as $m) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>
                                <td><?= $m->waktu ?></td>
                                <td><?= $m->nama ?></td>
                                <td><?= $m->varian ?></td>
                                <td><?= $m->tipe ?></td>
                                <td class="text-center"><?= $m->jumlah ?> gram</td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
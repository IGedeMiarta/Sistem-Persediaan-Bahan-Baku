<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Data Transkaksi</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
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
                            <th scope="col">Nama pembeli </th>
                            <th scope="col">waktu</th>
                            <th scope="col">Nama produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Bayar</th>


                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sell as $s) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>

                                <td><?= $s->pembeli ?></td>
                                <td><?= $s->waktu ?></td>
                                <td><?= $s->nama ?></td>
                                <td><?= $s->harga ?></td>
                                <td><?= $s->bayar ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
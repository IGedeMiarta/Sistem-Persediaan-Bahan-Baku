<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Laporan Stok</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Laporan Stok</li>
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
                <a href="<?= base_url('report/lap_stok_cetak') ?>" class="btn btn-success mb-3">Export Excel</a>
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">nama </th>
                            <th scope="col">varian </th>
                            <th scope="col">tipe</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($stok as $m) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>
                                <td><?= $m->nama ?></td>
                                <td><?= $m->varian ?></td>
                                <td><?= $m->tipe ?></td>
                                <td><?= $m->stok . ' gram' ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
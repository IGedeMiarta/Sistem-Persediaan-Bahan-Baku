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

        <div class="card">
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
                                    if ($mtrl->stok > 50) {
                                        echo $mtrl->stok . ' gram';
                                    } else if ($mtrl->stok <= 50 && $mtrl->stok != 0) {
                                        echo '<h1 class="badge badge-warning"> <i class="fas fa-exclamation"> </i>' . ' ' . $mtrl->stok . ' gram' . '</h1>';
                                    } else {
                                        echo '<h1 class="badge badge-danger">Kosong</h1>';
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
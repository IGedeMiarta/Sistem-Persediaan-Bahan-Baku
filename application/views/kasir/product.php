<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Product</h4>
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
                <a href="<?= base_url('kasir/product_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a>

                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama </th>
                            <th scope="col">Harga</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($product as $p) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>
                                <td><?= $p->nama ?></td>
                                <td><?= $p->harga ?></td>

                                <td>
                                    <a href="<?= base_url('kasir/product_edt/' . $p->kd_produk) ?>" class="badge badge-warning"><i class="dripicons-document-edit"></i> Edit</a>
                                    <a href="<?= base_url('kasir/product_del/' . $p->kd_produk) ?>" class="badge badge-danger"><i class="dripicons-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
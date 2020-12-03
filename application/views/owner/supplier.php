<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Suppliers</h4>
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
                <a href="<?= base_url('owner/supplier_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a>

                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Supplier</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Otion</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($supplier as $sup) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>
                                <td><?= $sup->nama_sup ?></td>
                                <td><?= $sup->owner ?></td>
                                <td><?= $sup->no_hp ?></td>
                                <td><?= $sup->alamat ?></td>
                                <td>
                                    <a href="<?= base_url('owner/supplier_edt/' . $sup->id_sup) ?>" class="badge badge-warning"><i class="dripicons-document-edit"></i> Edit</a>
                                    <a href="<?= base_url('owner/supplier_del/' . $sup->id_sup) ?>" class="badge badge-danger"><i class="dripicons-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
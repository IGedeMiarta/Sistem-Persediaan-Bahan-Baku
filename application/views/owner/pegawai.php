<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Pegawai</h4>
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
                <?php echo $this->session->flashdata('messege'); ?>
                <a href="<?= base_url('owner/pegawai_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a>

                <!-- <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle mb-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="dripicons-plus mr-1"></i> Tambah
                    </button>
                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-animated">
                        <a class="dropdown-item" href="<?= base_url('owner/pegawai_add') ?>">Tambah Pegawai</a>
                        <a class="dropdown-item" href="<?= base_url('owner/regist') ?>">Tambah User</a>
                    </div>
                </div> -->


                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama </th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Nomor Hp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Role</th>
                            <th scope="col">Akun</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pegawai as $p) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>
                                <td><?= $p->nama ?></td>
                                <td><?php
                                    if ($p->jenkel == 'L') {
                                        echo "Laki-Laki";
                                    } else {
                                        echo "Perempuan";
                                    }
                                    ?></td>
                                <td><?= $p->tgl_lahir ?></td>
                                <td><?= $p->no_hp ?></td>
                                <td><?= $p->alamat ?></td>
                                <td><?php
                                    if ($p->role == 2) {
                                        echo " Kasir";
                                    } else {
                                        echo " Gudang";
                                    }
                                    ?></td>
                                <td class="text-center">
                                    <?php if ($p->user == 'null') { ?>
                                        <a href="<?= base_url('owner/regist/' . $p->id_pegawai) ?>" class="badge badge-success"><i class="dripicons-document-edit"></i> Buat</a>
                                    <?php } else {
                                        echo "-";
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('owner/pegawai_edt/' . $p->id_pegawai) ?>" class="badge badge-warning pull-right"><i class="dripicons-document-edit"></i> Edit</a>
                                    <a href="<?= base_url('owner/pegawai_del/' . $p->id_pegawai) ?>" class="badge badge-danger pull-right"><i class="dripicons-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
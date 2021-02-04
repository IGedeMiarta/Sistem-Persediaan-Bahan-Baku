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
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Produk</li>
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
        <?php echo $this->session->flashdata('messege'); ?>

        <div class="card">
            <div class="card-body badge badge-primary">
                <h4>Tambah Produk</h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="<?= base_url('kasir/product_add_act') ?>">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" value="<?= set_value('name'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi Produk</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="desk" name="desk" placeholder="Deskripsi Produk" value="<?= set_value('deskipsi'); ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Material Digunakan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="material">
                                    <option selected>-- Pilih</option>
                                    <?php foreach ($material as $m) { ?>
                                        <option value="<?= $m->kd_material ?>"><?= $m->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Gram yg digunakan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="use" name="use" placeholder="Berapa Gram Material Yang Digunakan" value="<?= set_value('tgl'); ?>">
                                <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder=" Harga Produk" value="<?= set_value('hp'); ?>">
                                <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header badge badge-info">
                <h4>Data Produk</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama </th>
                            <th scope="col">Bahan Baku </th>
                            <th scope="col">Deskripsi </th>
                            <th scope="col">Varian</th>
                            <th scope="col">Tipe</th>
                            <!-- <th scope="col">Stok material</th> -->
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
                                <td><?= $p->nama_produk ?></td>
                                <td><?= $p->nama_material ?></td>
                                <td width="500px"><?= $p->deskripsi ?></td>
                                <td><?= $p->varian ?></td>
                                <td><?= $p->tipe ?></td>
                                <!-- <td><?= $p->stok ?></td> -->
                                <td><?= $p->harga ?></td>

                                <td>
                                    <a href="<?= base_url('kasir/product_edt/' . $p->kd_produk) ?>" class="badge badge-warning"><i class="dripicons-document-edit"></i> Edit</a>
                                    <a href="<?= base_url('kasir/product_del/' . $p->kd_produk) ?>" class="badge badge-danger" onclick="return confirm('Yakin Hapus?')"><i class="dripicons-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tambah User</h4>
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
                <?php foreach ($pegawai as $p) ?>
                <form method="POST" action="<?= base_url('owner/regist_act/' . $p->id_pegawai) ?>">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pegawai" value="<?= $p->nama; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tgl" name="username" placeholder="Username">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="hp" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Ulangi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="hp" name="password2" placeholder="Retype Password" value="<?= set_value('hp'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Job Desk</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="role">
                                <option selected>-- Pilih</option>
                                <option value="2">Bagian Kasir</option>
                                <option value="3">Bagian Gudang</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </div>
                    <?php ?>
                </form>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
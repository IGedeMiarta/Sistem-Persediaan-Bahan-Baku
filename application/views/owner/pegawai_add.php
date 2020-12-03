<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tambah Pegawai</h4>
                        </div>

                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title-box -->
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?= base_url('owner/pegawai_add_act') ?>">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenkel">
                                <option selected>-- Pilih</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Lahir" value="<?= set_value('tgl'); ?>">
                            <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="<?= set_value('hp'); ?>">
                            <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?= set_value('alamat'); ?>"></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Job Desk</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="desk">
                                <option selected>-- Pilih</option>
                                <option value="1">Bagian Kasir</option>
                                <option value="2">Bagian Gudang</option>
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

                </form>
            </div>

        </div>
        <!-- end page title -->


    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
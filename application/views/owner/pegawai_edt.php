<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Edit Pegawai</h4>
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
                <?php foreach ($pegawai as $pegawai) { ?>
                    <form method="POST" action="<?= base_url('owner/pegawai_edt_act/' . $pegawai->id_pegawai) ?>">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= $pegawai->nama ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenkel">
                                    <option selected value="<?= $pegawai->jenkel ?>"><?php if ($pegawai->jenkel == 'L') {
                                                                                            echo 'Laki-Laki';
                                                                                        } else {
                                                                                            echo 'perempuan';
                                                                                        }
                                                                                        ?></option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Lahir" value="<?= $pegawai->tgl_lahir ?>">
                                <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="<?= $pegawai->no_hp ?>">
                                <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat lengkap" value="<?= $pegawai->alamat ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Job Desk</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="desk">
                                    <option selected value="<?= $pegawai->desk ?>"><?php
                                                                                    if ($pegawai->desk == 1) {
                                                                                        echo "Bagian Kasir";
                                                                                    } else {
                                                                                        echo "Bagian Gudang";
                                                                                    }

                                                                                    ?></option>
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
                <?php } ?>
            </div>

        </div>
        <!-- end page title -->


    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Tambah Supplier </h4>
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
                <form method="POST" action="<?= base_url('owner/supplier_add_act') ?>">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" id="sup_name" name="sup_name" placeholder="Nama Supplier" value="<?= set_value('sup_name'); ?>">
                        <?= form_error('sup_name', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label>Pemilik Usaha</label>
                        <input type="text" class="form-control" id="owner" name="owner" placeholder="Nama Pemilik" value="<?= set_value('owner'); ?>">
                        <?= form_error('owner', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label>Nomer Hp</label>
                        <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan No Hp" value="<?= set_value('hp'); ?>">
                        <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('sup_name'); ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>

        </div>
        <!-- end page title -->


    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
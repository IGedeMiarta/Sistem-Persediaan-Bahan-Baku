<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Penjualan</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
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
            <form action="">
                <table class="table table-bordered" id="tableLoop">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th><button class="btn btn-success btn-block" id="BarisBaru"> <i class="fa fa-plus"></i> Baris Baru</button></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="box-footer">
                    <div class="form-group text-right">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        <button class="btn btn-warning mr-3" type="reset">Batal</button>
                    </div>
                </div>

            </form>

        </div>

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
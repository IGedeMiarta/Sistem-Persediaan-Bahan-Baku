<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Laporan Penjualan</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Lap. Penjualan</li>
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <h6>Filter Berdasarkan Tanggal</h6>
                            </div>
                            <div class="card-body">

                                <form method="get" action="">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="tanggal_mulai">Tanggal Mulai</label>
                                        <input type="date" class="form-control" name="tanggal_mulai" placeholder="Masukkan tanggal mulai pinjam">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="tanggal_sampai">Tanggal Sampai</label>
                                        <input type="date" class="form-control" name="tanggal_sampai" placeholder="Masukkan tanggal pinjam sampai">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Filter">
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <?php
                // membuat tombol cetak jika data sudah di filter
                if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
                    $mulai = $_GET['tanggal_mulai'];
                    $sampai = $_GET['tanggal_sampai'];
                ?>
                    <a class='btn btn-primary' target="_blank" href='<?php echo base_url() . 'owner/penjualan_print?tanggal_mulai=' . $mulai . '&tanggal_sampai=' . $sampai ?>'><i class='fa fa-print'></i> CETAK</a>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Waktu </th>
                            <th scope="col">pemebeli </th>
                            <th scope="col">produk </th>
                            <th scope="col">harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penjualan as $m) { ?>
                            <tr>
                                <th width="10px" scope="row"><?= $no++ ?></th>
                                <td><?= date('d M Y', strtotime($m->waktu)); ?></td>
                                <td><?= $m->pembeli ?></td>
                                <td><?= $m->nama ?></td>
                                <td><?= $m->harga ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>

    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
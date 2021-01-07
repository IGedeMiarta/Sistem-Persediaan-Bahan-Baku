<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title m-0">Data Transkaksi</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('kasir') ?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Struk</li>
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
        <?php
        ?>
        <div class="card">
            <div class="card-header badge badge-dark">
                <h3><small class="text-white">Pembeli : </small><?= $pembeli ?></h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <?php if ($sel1 == 'nul') {
                        $total1 = 0;
                    } else { ?>
                        <tr>
                            <td><?php echo $sel1['produk']  ?></td>
                            <td><?php echo $sel1['harga']  ?></td>
                            <td><?php echo $sel1['jumlah']  ?></td>
                            <td><?php
                                $total1 = $sel1['harga'] * $sel1['jumlah'];
                                echo $total1;
                                ?></td>
                        </tr>
                    <?php } ?>
                    <?php if ($sel2 == 'nul') {
                        $total2 = 0;
                    } else { ?>
                        <tr>
                            <td><?php echo $sel2['produk']  ?></td>
                            <td><?php echo $sel2['harga']  ?></td>
                            <td><?php echo $sel2['jumlah']  ?></td>
                            <td><?php
                                $total2 = $sel2['harga'] * $sel2['jumlah'];
                                echo $total2;
                                ?></td>
                        </tr>
                    <?php  } ?>
                    <?php if ($sel3 == 'nul') {
                        $total3 = 0;
                    } else { ?>
                        <tr>
                            <td><?php echo $sel3['produk']  ?></td>
                            <td><?php echo $sel3['harga']  ?></td>
                            <td><?php echo $sel3['jumlah']  ?></td>
                            <td><?php
                                $total3 = $sel3['harga'] * $sel3['jumlah'];
                                echo $total3;
                                ?></td>
                        </tr>
                    <?php } ?>

                    <?php if ($sel4 == 'nul') {
                        $total4 = 0;
                    } else { ?>
                        <tr>
                            <td><?php echo $sel4['produk']  ?></td>
                            <td><?php echo $sel4['harga']  ?></td>
                            <td><?php echo $sel4['jumlah']  ?></td>
                            <td><?php
                                $total4 = $sel4['harga'] * $sel4['jumlah'];
                                echo $total4;
                                ?></td>
                        </tr>
                    <?php  } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <th class="pull-right"> Jumlah Bayar</th>
                        <th>
                            <?php
                            $sum = $total1 + $total2 + $total3 + $total4;
                            echo $sum;
                            ?>
                        </th>
                    </tr>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- container fluid -->

</div> <!-- Page content Wrapper -->
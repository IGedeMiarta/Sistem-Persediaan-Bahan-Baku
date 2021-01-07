<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Nota: <?= $pembeli ?></title>
</head>

<body>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <h2 class="text-center">Nota</h2>
                <div class="card-header badge badge-light">
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
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
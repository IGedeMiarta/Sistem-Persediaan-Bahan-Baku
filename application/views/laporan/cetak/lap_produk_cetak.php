<html>

<head>
    <title>Export Data Stok Excel </title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=ProdukReport.xls");
    ?>

    <center>
        <h5>Laporan Stok Material <br /></h5>
    </center>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Material</th>
            <th>Harga Jual</th>

        </tr>
        <?php
        $no = 1;
        foreach ($produk as $p) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $p->nama_produk; ?></td>
                <td><?php echo $p->deskripsi ?></td>
                <td><?php echo $p->nama_mtrl; ?></td>
                <td><?php echo $p->harga; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
<html>

<head>
    <title>Contoh Perhitungan Langsung</title>
    <script src="code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#diskon").keyup(function() {
                var harga = parseInt($("#harga").val());
                var diskon = parseInt($("#diskon").val());
                var total = harga - (harga * (diskon / 100));
                $("#totBayar").val(total);
            });
        });
    </script>
</head>

<body>
    <table border="0" cellpadding="5" align="center">
        <form action="" method="post">
            <tr>
                <td>Harga :</td>
                <td><input type="text" name="harga" id="harga" /></td>
            </tr>
            <tr>
                <td>Diskon :</td>
                <td><input type="text" name="diskon" id="diskon" /></td>
            </tr>
            <tr>
                <td>Yang Harus Dibayar :</td>
                <td><input type="text" name="totBayar" id="totBayar" disabled /></td>
            </tr>
        </form>
    </table>
</body>

</html>
<?php
include "./function/koneksi.php";
include "./function/tgl_indo.php";

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

$bln = array(
    '01' => 'JANUARI',
    '02' => 'FEBRUARI',
    '03' => 'MARET',
    '04' => 'APRIL',
    '05' => 'MEI',
    '06' => 'JUNI',
    '07' => 'JULI',
    '08' => 'AGUSTUS',
    '09' => 'SEPTEMBER',
    '10' => 'OKTOBER',
    '11' => 'NOVEMBER',
    '12' => 'DESEMBER',
);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crystallo Admin - Cetak Pemesanan</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/logo.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<style type="text/css">
    div.kanan {
        position: absolute;
        bottom: 100px;
        right: 50px;

    }

    div.tengah {
        position: absolute;
        bottom: 100px;
        right: 330px;

    }

    div.kiri {
        position: absolute;
        bottom: 100px;
        left: 10px;
    }
</style>
<section class="invoice">
    <center>
        <img src="images/logo.png">
    </center>
    <hr>
    <!-- /.row -->
    <p style="font-weight: bold; font-size: 18px; text-align: center;"><u>Pemesanan Crsytallo</u></p>
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Nama Pelanggan</th>
                        <th>Kode Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Qty Pemesanan</th>
                        <th>Grand Total</th>
                        <th>Metode Pengiriman</th>
                        <th>Status Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $database = "SELECT * FROM tabel_pemesanan JOIN tabel_produk ON tabel_pemesanan.Id_produk = tabel_produk.Id_Produk JOIN tabel_pelanggan ON tabel_pemesanan.Id_Pelanggan = tabel_pelanggan.Id_Pelanggan ORDER BY Kode_Pemesanan DESC";
                    $query = mysqli_query($koneksi, $database);
                    while ($mysql = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $mysql['Nama_Produk']; ?></td>
                            <td><?php echo $mysql['Nama_Pelanggan']; ?></td>
                            <td><?php echo $mysql['Kode_Pemesanan']; ?></td>
                            <td><?php echo $mysql['Tgl_Pemesanan']; ?></td>
                            <td><?php echo $mysql['Qty_Pemesanan']; ?></td>
                            <td><?php echo rupiah($mysql['Grand_Total']); ?></td>
                            <td><?php echo $mysql['Metode_Pengiriman']; ?></td>
                            <td><?php echo $mysql['Status_Bayar']; ?></td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
    <!-- /.col -->
    </div>
    <p style="float: right;">Surabaya, <?php echo date('d') . ' ' . (strtolower($bln[date('m')])) . ' ' . date('Y') ?></p>
</section>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>

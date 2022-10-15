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
    <title>Oakwood Admin - Cetak Produk</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

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
        <img src="images/header1.png">
    </center>
    <hr>
    <!-- /.row -->
    <p style="font-weight: bold; font-size: 18px; text-align: center;"><u>Data Bahan Baku Masuk UD. Crystallo Footwear</u></p>
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Bahan Baku Masuk</th>
                        <th>Nama Bahan Baku</th>
                        <th>Nama Supplier</th>
                        <th>Jumlah Bahan Baku</th>
                        <th>Harga Bahan Baku</th>
                        <th>Total</th>
                        <th>Tanggal Produk Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $database = "SELECT * FROM tabel_bahanmasuk JOIN tabel_bahanbaku ON tabel_bahanmasuk.id_bahan = tabel_bahanbaku.Id_Bahan JOIN tabel_supplier ON tabel_bahanmasuk.id_supplier = tabel_supplier.Id_Supplier ORDER BY id_bahanmasuk DESC";
                    $query = mysqli_query($koneksi, $database);
                    while ($mysql = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $mysql['id_bahanmasuk']; ?></td>
                            <td><?php echo $mysql['Nama_Bahan']; ?></td>
                            <td><?php echo $mysql['Nama_Supplier']; ?></td>
                            <td><?php echo $mysql['jumlah']; ?></td>
                            <td><?php echo rupiah($mysql['harga']); ?></td>
                            <td><?php echo rupiah($mysql['total']); ?></td>
                            <td><?= tanggal_indo($mysql['tgl_masuk']); ?></td>
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
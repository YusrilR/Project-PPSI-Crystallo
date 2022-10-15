<?php
error_reporting(0);
include "koneksi.php";
include "./function/tgl_indo.php";

if ($_GET['act'] == 'tambahpengumuman') {
    $IdProduk = $_POST['Id_Produk'];
    $Nama_Prod = $_POST['Nama_Produk'];
    $IdPel = $_POST['Id_Pelanggan'];
    $NamaPel = $_POST['Nama_Pelanggan'];
    $KodePemesanan = $_POST['Kode_Pemesanan'];
    $TGLPemesanan = $_POST['Tgl_Pemesanan'];
    $Harga = $_POST['harga'];
    $QTY = $_POST['QTY'];
    $GrandTotal = $_POST['Grand_Total'];
    $MetodePengiriman = $_POST['Metode_Pengiriman'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_pemesanan (Id_Produk,Id_Pelanggan,Kode_Pemesanan, Tgl_Pemesanan, Qty_Pemesanan, Grand_Total, Metode_Pengiriman,Status_Bayar) VALUES('$IdProduk' , '$IdPel' , '$KodePemesanan' , '$TGLPemesanan','$QTY','$GrandTotal','$MetodePengiriman','$Status_Bayar')");

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
    <title>Crystallo - Nota Pemesanan</title>
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
        <img src="../images/header1.png">
    </center>
    <hr>
    <!-- /.row -->
    <p style="font-weight: bold; font-size: 18px; text-align: center;"><u>Nota Pemesanan</u></p>
    <!-- Table row -->

    <div class="row ">
        <div class="col-12 table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th align="left">Kode Pemesanan</th>
                        <th>:</th>
                        <th align="left"><?php echo $KodePemesanan?></th>
                    </tr>
                    <tr>
                        <th align="left">Nama Pelanggan</th>
                        <th>:</th>
                        <th align="left"><?php echo $NamaPel ?></th>
                    </tr>
                    <tr>
                        <th align="left">Tanggal Pemesanan</th>
                        <th>:</th>
                        <th align="left"><?php echo $TGLPemesanan?></th>
                    </tr>
                    <tr>
                        <th align="left">Nama Produk</th>
                        <th>:</th>
                        <th align="left"><?php echo $Nama_Prod ?></th>
                    </tr>
                    <tr>
                        <th align="left">Harga Produk</th>
                        <th>:</th>
                        <th align="left"><?php echo rupiah($Harga) ?></th>
                    </tr>
                    <tr>
                        <th align="left">Qty Pemesanan</th>
                        <th>:</th>
                        <th align="left"><?php echo $QTY ?></th>
                    </tr>
                    <tr>
                        <th align="left">Grand Total</th>
                        <th>:</th>
                        <th align="left"><?php echo rupiah($GrandTotal) ?></th>
                    </tr>
                    <tr>
                        <th align="left">Metode Pengiriman</th>
                        <th>:</th>
                        <th align="left"><?php echo $MetodePengiriman?></th>
                    </tr>
                </thead>
            </table>
           <p style="font-weight: bold; font-size: 18px; text-align: center;">Anda bisa mentransfer melalui berikut </p>
           <table class="table table-striped">
               <thead>
                    <tr>
                        <th align="left">BCA</th>
                        <th>:</th>
                        <th align="left">1840290138 a/n anik sri nuryani</th>
                    </tr>
               </thead>
               <tbody>
                 <th align="left">NB</th>
                 <th>:</th>
                 <th align="left"> Untuk bukti pembayaran silahkan kirim ke nomor berikut 081331888481 dan silahkan disimpan. </th>
               </tbody>
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
<?php

    if ($querytambah) {
      // echo "Pemesanan berhasil".mysqli_error($koneksi);
        # code redicet setelah insert ke index
        header("location:../frontend/formpembelian.php");
    } else {
        echo "ERROR, tidak berhasil".mysqli_error($koneksi);
    }
}else if($_GET['act'] == 'getidproduk'){
  $Nama_Produk = $_GET['Nama_Produk'];
  $query = mysqli_query($koneksi,"Select * from tabel_produk where Nama_Produk='$Nama_Produk'");
  $row=mysqli_fetch_array($query);
  echo json_encode($row);
}

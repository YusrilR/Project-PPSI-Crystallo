<?php
error_reporting(0);
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT max(Id_Pelanggan) as kodeTerbesar FROM tabel_pelanggan");
$data = mysqli_fetch_array($query);
$Id_Pelanggan = $data['kodeTerbesar'];

$urutan = (int) substr($Id_Pelanggan, 3, 3);

$urutan++;

$huruf = "PL";
$Id_Pelanggan = $huruf . sprintf("%03s", $urutan);

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}


?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Crystallo Footwear </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<!-- cek pesan notifikasi -->



	<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="modal-body">
                    <form action="./function/function_pelanggan.php?act=tambahpelanggan" method="post" role="form">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Pelanggan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Id_Pelanggan" name="Id_Pelanggan" placeholder="Text" class="form-control" value="<?php echo $Id_Pelanggan ?>" readonly></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pelanggan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Nama_Pelanggan" name="Nama_Pelanggan" placeholder="Nama Pelanggan" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Alamat Pelanggan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Alamat_Pelanggan" name="Alamat_Pelanggan" placeholder="Alamat Pelanggan" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">No Telp Pelanggan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="No_Telp_Pelanggan" name="No_Telp_Pelanggan" placeholder="Nomor Telp Pelanggan" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="Password" name="Password" placeholder="Password" class="form-control"></div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <a style="color:white;" href="LoginPelanggan.php">Batal</a>  </button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Tambah Data"></input>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Validasi Login -->

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>

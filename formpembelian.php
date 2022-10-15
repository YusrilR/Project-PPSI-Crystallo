<?php
include "koneksi.php";
error_reporting(0);
session_start();

$query = mysqli_query($koneksi, "SELECT max(Kode_Pemesanan) as kodeTerbesar FROM tabel_pemesanan");
$data = mysqli_fetch_array($query);
$Kode_Pemesanan = $data['kodeTerbesar'];

$urutan = (int) substr($Kode_Pemesanan, 3, 3);

$urutan++;

$huruf = "PM";
$Kode_Pemesanan = $huruf . sprintf("%03s", $urutan);

if ($_SESSION['pelanggan'] == "") {

    echo "<script>alert('Silahkan Login Terlebih Dahulu')</script>";
    echo "<script>location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
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



    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"> <img src="images/logo.png" width="200px" height="50px" alt=""> </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item "><a class="nav-link" href="shop.php">Product</a></li>
                      <li class="nav-item active"><a class="nav-link" href="formpembelian.php">Shop</a></li>


                        <li class="nav-item "><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="Logout.php">Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <!-- <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
					</a></li>
                    </ul>
                </div> -->
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Form Pembelian</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
          <form target="_blank" action="./function/function_Pemesanan.php?act=tambahpengumuman" method="post" role="form">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Pemesanan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Kode_Pemesanan" name="Kode_Pemesanan" placeholder="Text" class="form-control" value="<?php echo $Kode_Pemesanan ?>" readonly></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Produk</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Id_Produk" id="Id_Produk" placeholder="Text" class="form-control" value="" readonly></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Produk</label></div>
                            <div class="col-12 col-md-9">
                              <select name="Nama_Produk" id="Nama_Produk" class="form-control">
                                    <?php

                                      $sql = "SELECT * FROM tabel_produk";

                                      $hasil=mysqli_query($koneksi,$sql);
                                      $no=0;
                                      while ($data = mysqli_fetch_array($hasil)) {
                                      $no++;
                                     ?>
                                      <option value="<?php echo $data['Nama_Produk'];?>"><?php echo $data['Nama_Produk'];?></option>
                                    <?php
                                    }
                                    ?>
                              </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Pelanggan</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Id_Pelanggan" id="Id_Pelanggan" placeholder="Text" class="form-control" value="<?php echo $_SESSION["pelanggan"]['Id_Pelanggan']; ?>" readonly></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pelanggan</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Nama_Pelanggan" id="Nama_Pelanggan" placeholder="Text" class="form-control" value="<?php echo $_SESSION["pelanggan"]['Nama_Pelanggan']; ?>" readonly></div>
                        </div>


                        <div class="row form-group">
                                  <div class="col col-sm-3"><label for="serahterima" class=" form-control-label">Tanggal Pemesanan</label></div>
                                  <div class="col col-sm-6">
                                    <input type="date" name="Tgl_Pemesanan" value="<?php echo htmlentities($TGLPemesanan); ?>" />
                                  </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Produk</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="harga" name="harga" placeholder="Harga" class="form-control" readonly></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">QTY Pemesanan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="QTY"  name="QTY" placeholder="QTY Pemesanan" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Grand Total</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Grand_Total" name="Grand_Total" placeholder="Grand Total" class="form-control" readonly></div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Metode Pengiriman</label></div>
                            <div class="col-12 col-md-9">
                                <select name="Metode_Pengiriman" id="Metode_Pengiriman" class="form-control">
                                    <option>Ambil Sendiri</option>
                                    <option>Ekspedisi</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status Bayar</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="status" name="status" placeholder="Status Bayar" class="form-control"></div>
                        </div> -->
                        <div class="modal-footer">
                            <input type="submit" name="submit" class="btn btn-primary"  value="Beli"></input>
                        </div>

                  </div>

                  </form>
        </div>
    </div>


    <!-- End Cart -->






    <!-- Start copyright  -->
    <div class="footer-copyright">
          <p class="footer-company">All Rights Reserved. &copy; 2021 <a href="#">Crystallo Footwear</a> </p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

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
    <script type="text/javascript">
            $(document).ready(function() {
              $('#Nama_Produk').on('change',function(){
                var nama = $(this).val()
                $.ajax({
                  url:'./function/function_pemesanan.php',
                  method:'GET',
                  data:{
                    'act':'getidproduk',
                    'Nama_Produk':nama
                  },
                  success:function(data){
                    data=JSON.parse(data)
                    $('#Id_Produk').val(data['Id_Produk'])
                    $('#harga').val(data['Harga'])
                    console.log(data);
                  }
                })
              })
              $('#QTY').on('keyup',function(){
                var qty=$(this).val()
                var harga = $('#harga').val()
                var gt= qty*harga
                $('#Grand_Total').val(gt)
                console.log(gt);
              })
            });
        </script>
        <!-- <script type="text/javascript">

         var harga=document.getElementById('harga');
         var kuantitas =document.getElementById('QTY');
          var total=document.getElementById('Grand_Total');
          // var gtotal =document.getElementById('');
        function subtotal(){
          for ( i = 0; i < harga.length; i++) {
          total[i].innerText=((harga[i].value)*(kuantitas[i].value));

            // gt=gt+(harga[i].value)*(kuantitas[i].value)
          }
          // gtotal.innerText=gt;

        }
        subtotal();
        </script> -->
</body>

</html>

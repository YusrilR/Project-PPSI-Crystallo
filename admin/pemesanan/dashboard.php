<?php
include "../fungsi/koneksi.php";
include "./function/tgl_indo.php";

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

$produk = mysqli_query($koneksi, "SELECT * FROM tabel_produk");
while ($row = mysqli_fetch_array($produk)) {
    $nama_produk[] = $row['Nama_Produk'];



    $query = mysqli_query($koneksi, "SELECT COUNT(Id_Produk) as Id_Produk from tabel_pemesanan where Id_Produk='" . $row['Id_Produk'] . "'");
    $row = $query->fetch_array();
    $jumlah_produk[] = $row['Id_Produk'];
}

$label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

for ($bulan = 1; $bulan < 13; $bulan++) {
    $query = mysqli_query($koneksi, "SELECT COUNT(Kode_Pemesanan) as Kode_Pemesanan from tabel_pemesanan where MONTH(Tgl_Pemesanan)='$bulan'");
    $row = $query->fetch_array();
    $jumlah_bulan[] = $row['Kode_Pemesanan'];
}

session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=gagal");
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Oakwood Admin - Dashboard</title>
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
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="dashboard.php"><img src="images/header.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="dashboard.php"><img src="images/header.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data Master</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data Master</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tabel-pelanggan.php">Pelanggan</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data Transaksi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="transaksi-produkkeluar.php">Produk Keluar Gudang</a></li>
                            <li><i class="fa fa-table"></i><a href="tabel-pemesanan.php">Pemesanan</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i><?= $_SESSION['username']; ?></a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard Pemesanan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">

                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-users bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tabel_pelanggan");
                            $jumlah = mysqli_num_rows($data);
                            ?>
                            <div class="h5 text-secondary mb-0 mt-1"><span class="count"><?php echo $jumlah; ?></span></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Pelanggan</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="tabel-pelanggan.php">Lihat Data <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-bullhorn bg-info p-3 font-2xl mr-3 float-left text-light"></i>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tabel_pemesanan");
                            $jumlah = mysqli_num_rows($data);
                            ?>
                            <div class="h5 text-secondary mb-0 mt-1"><span class="count"><?php echo $jumlah; ?></span></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Pemesanan</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="tabel-pemesanan.php">Lihat Data <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <i class="fa fa-truck bg-warning p-3 font-2xl mr-3 float-left text-light"></i>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tabel_produkkeluar");
                            $jumlah = mysqli_num_rows($data);
                            ?>
                            <div class="h5 text-secondary mb-0 mt-1"><span class="count"><?php echo $jumlah; ?></span></div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs small">Produk Keluar Gudang</div>
                        </div>
                        <div class="b-b-1 pt-3"></div>
                        <hr>
                        <div class="more-info pt-2" style="margin-bottom:-10px;">
                            <a class="font-weight-bold font-xs btn-block text-muted small" href="transaksi-produkkeluar.php">Lihat Data <i class="fa fa-angle-right float-right font-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="content mt-12">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Penjualan Produk Terlaris </h4>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Penjualan Setiap Bulan </h4>
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div><!-- /# column -->
                    </div>
                </div>
            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Charts -->
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($nama_produk); ?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($jumlah_produk); ?>,
                    backgroundColor: [
                        '#29B0D0',
                        '#2A516E',
                        '#F07124',
                        '#979193',
                        '#1ABC9C',
                        '#2ECC71',
                        '#3498DB',
                        '#9B59B6',
                        '#F1C40F',
                        '#E74C3C',
                        '#95A5A6',
                        '#34495E'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>

    <script>
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: '',
                    data: <?php echo json_encode($jumlah_bulan); ?>,
                    backgroundColor: [
                        '#29B0D0',
                        '#2A516E',
                        '#F07124',
                        '#979193',
                        '#1ABC9C',
                        '#2ECC71',
                        '#3498DB',
                        '#9B59B6',
                        '#F1C40F',
                        '#E74C3C',
                        '#95A5A6',
                        '#34495E'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/lib/chart-js/chartjs-init.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>


</body>

</html>
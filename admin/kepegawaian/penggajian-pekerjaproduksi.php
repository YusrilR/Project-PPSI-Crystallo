<?php
error_reporting(0);
include "./function/koneksi.php";

$query = mysqli_query($koneksi, "SELECT max(Id_PenggajianPekerja) as kodeTerbesar FROM penggajian_pekerja");
$data = mysqli_fetch_array($query);
$Id_Penggajian = $data['kodeTerbesar'];

$urutan = (int) substr($Id_Penggajian, 3, 3);

$urutan++;

$huruf = "GD";
$Id_Penggajian = $huruf . sprintf("%03s", $urutan);

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
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
    <title>Crystallo Kepegawaian - Penggajian Pekerja</title>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data Tabel</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tabel-gaji.php">Gaji</a></li>
                            <li><i class="fa fa-table"></i><a href="tabel-pegawai.php">Pegawai</a></li>
                            <li><i class="fa fa-table"></i><a href="tabel-pekerjaproduksi.php">Pekerja</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Transaksi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="penggajian-pegawai.php">Penggajian Pegawai</a></li>
                            <li><i class="fa fa-table"></i><a href="penggajian-pekerjaproduksi.php">Penggajian Pekerja</a></li>
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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Transaksi Penggajian Pegawai</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Penggajian Pekerja</strong>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mediumModal" style="float: right;"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data</button>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#laporanModal" style="float: right; margin-right: 10px" mr-5><i class="fa fa-print"></i>&nbsp; Export PDF</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Id</th>
                                            <th>Tgl</th>
                                            <th>Nama Pekerja</th>
                                            <th>Jumlah Produksi</th>
                                            <th>Deskripsi</th>
                                            <th>Besaran Gaji</th>
                                            <th>Grand Total</th>
                                            <th>Disetujui Keuangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    $database = "SELECT * FROM tabel_pekerja P JOIN penggajian_pekerja PP on PP.Id_Pekerja = P.Id_Pekerja JOIN tabel_gaji G on G.Id_Gaji = PP.Id_Gaji ORDER BY PP.Id_PenggajianPekerja DESC";
                                    $query = mysqli_query($koneksi, $database);
                                    while ($mysql = mysqli_fetch_array($query)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $mysql['Id_PenggajianPekerja']; ?></td>
                                                <td><?php echo $mysql['Tgl_PenggajianPekerja']; ?></td>
                                                <td><?php echo $mysql['Nama_Pekerja']; ?></td>
                                                <td><?php echo $mysql['Jml_Produksi']; ?></td>
                                                <td><?php echo $mysql['Deskripsi']; ?></td>
                                                <td><?php echo rupiah($mysql['Besar_Gaji']); ?></td>
                                                <td><?php echo rupiah($mysql['Grand_Total']); ?></td>
                                                <td><?php echo $mysql['ApprovalPekerja_Keuangan']; ?></td>
                                                <td style="text-align: center; width: 15%">
                                                    <button type="button" class="edit btn btn-primary btn-sm btn-flat btn-xs" data-toggle="modal" id="btn_edit" data-id="<?php echo $mysql['Id_PenggajianPekerja']; ?>" data-target='#updateModal<?php echo $mysql["Id_PenggajianPekerja"] ?>'><i class="fa fa-pencil"></i> Edit</button>
                                                    <button class="delete btn btn-danger btn-sm btn-flat btn-xs" type="button" id="delete" data-id="<?php echo $mysql['Id_PenggajianPekerja']; ?>"><i class="fa fa-trash-o"></i> Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- Modals Tambah Data -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Tambah Data Penggajian Pekerja</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="./function/function_penggajianpekerja.php?act=tambahpenggajian" method="post" role="form">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Penggajian</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="Id_PenggajianPekerja" name="Id_PenggajianPekerja" placeholder="Text" class="form-control" value="<?php echo $Id_Penggajian ?>" readonly></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Penggajian</label></div>
                                <div class="col-12 col-md-9"><input type="date" id="Tgl_PenggajianPekerja" name="Tgl_PenggajianPekerja" placeholder="Deskripsi" class="form-control" required></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Pekerja</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="Id_Pekerja" id="Id_Pekerja" class="form-control" required>
                                        <option disabled selected>Pilih Pekerja</option>
                                        <?php
                                        $sql = "SELECT * FROM tabel_pekerja";
                                        $result = mysqli_query($koneksi, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['Id_Pekerja']; ?>"><?php echo $row['Nama_Pekerja']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Gaji</label></div>
                                    <div class="col col-md-9"><input type="text" id="Id_Gaji" name="Id_Gaji" class="form-control" readonly required ></div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Deskripsi Gaji</label></div>
                                    <div class="col col-md-9"><input type="text" id="Deskripsi_Gaji" name="Deskripsi_Gaji" class="form-control" readonly required></div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah Produksi</label></div>
                                    <div class="col col-md-9"><input type="text" id="Jumlah_Produksi" name="Jumlah_Produksi" class="form-control"required></div>
                            </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Besar Gaji</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input type="text" id="Besar_Gaji" name="Besar_Gaji" class="form-control" readonly required>
                                        <div class="input-group-addon">,00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Grand Total</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input type="text" id="Grand_Total" name="Grand_Total" class="form-control" readonly required>
                                        <div class="input-group-addon">,00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Approval Keuangan</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="ApprovalPekerja_Keuangan"  id="ApprovalPekerja_Keuangan" class="form-control" required>
                                        <option selected>Belum Disetujui</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Tambah Data"></input>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modals Tambah Data -->

        <?php
        $Id_PenggajianPekerja = $mysql['Id_PenggajianPekerja'];
        $query = "SELECT * FROM penggajian_pekerja ORDER BY Id_PenggajianPekerja DESC";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- Modals Edit Data -->
            <div class="modal fade" id="updateModal<?php echo $row["Id_PenggajianPekerja"] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Edit Data Penggajian Pekerja</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./function/function_penggajianpekerja.php?act=updatepenggajian" method="post" role="form">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Penggajian</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="Id_PenggajianPekerja" name="Id_PenggajianPekerja_edit"class="form-control" value="<?php echo $row['Id_PenggajianPekerja']; ?>" readonly></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Penggajian</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="Tgl_PenggajianPekerja" name="Tgl_PenggajianPekerja_edit" class="form-control" value="<?php echo $row['Tgl_PenggajianPekerja']; ?>" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Pekerja</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="Id_Pekerja_edit" id="Id_Pekerja_edit" class="Id_Pekerja_edit form-control" required >
                                            <?php
                                            $queryJenis = mysqli_query($koneksi, "SELECT * FROM tabel_pekerja");
                                            if (mysqli_num_rows($queryJenis)) {
                                                $selected = "";
                                                while ($row2 = mysqli_fetch_assoc($queryJenis)) :

                                            ?>
                                                    <option <?php if ($row['Id_Pekerja'] == $row2['Id_Pekerja']) echo "selected"; ?> value="<?= $row2['Id_Pekerja']; ?>"><?= $row2['Nama_Pekerja']; ?></option>
                                            <?php endwhile;
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Gaji</label></div>
                                    <div class="col col-md-9"><input type="text" id="Id_Gaji_edit" name="Id_Gaji_edit"class="Id_Gaji_edit form-control" readonly required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Deskripsi Gaji</label></div>
                                    <div class="col col-md-9"><input type="text" id="Deskripsi_Gaji_edit" name="Deskripsi_Gaji_edit" class="Deskripsi_Gaji_edit form-control" readonly required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah Produksi</label></div>
                                    <div class="col col-md-9"><input type="text" id="Jumlah_Produksi_edit" name="Jumlah_Produksi_edit" class="Jumlah_Produksi_edit form-control" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Besar Gaji</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                            <input type="text" id="Besar_Gaji_edit" name="Besar_Gaji_edit" class="Besar_Gaji_edit form-control" readonly required>
                                            <div class="input-group-addon">,00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Grand Total</label></div>
                                    <div class="col-12 col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                            <input type="text" id="Grand_Total_edit" name="Grand_Total_edit" class="Grand_Total_edit form-control" readonly required>
                                            <div class="input-group-addon">,00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Approval Keuangan</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="ApprovalPekerja_Keuangan_edit"  id="ApprovalPekerja_Keuangan" class="form-control" required>
                                            <option selected>Belum Disetujui</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" name="submit" class="btn btn-primary" value="Perbarui Data"></input>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modals Edit Data -->
        <?php } ?>

        <?php
            error_reporting (E_ALL ^ E_NOTICE);
            $id_pp = $mysql['Id_PenggajianPekerja'];
            $query = "SELECT *, MIN(Tgl_PenggajianPekerja) AS TGL_MIN , MAX(Tgl_PenggajianPekerja) AS TGL_MAX FROM penggajian_pekerja";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- Modals Laporan -->
            <div class="modal fade" id="laporanModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Cetak Laporan Penggajian Pekerja</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./cetak-penggajian-pekerja.php" method="post" role="form" name="modallaporan">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Approval Keuangan</label></div>
                                <div class="col-12 col-md-9">
                                        <select name="ApprovalPekerja_Keuangan" id="ApprovalPekerja_Keuangan" class="form-control" required >
                                            <option selected>Semua Approval</option>
                                            <?php
                                            $queryJenis = mysqli_query($koneksi, "SELECT DISTINCT ApprovalPekerja_Keuangan FROM penggajian_pekerja");
                                            if (mysqli_num_rows($queryJenis)) {
                                                while ($row2 = mysqli_fetch_assoc($queryJenis)) :

                                            ?>
                                                    <option <?php if ($row['ApprovalPekerja_Keuangan'] == $row2['ApprovalPekerja_Keuangan']); ?> value="<?= $row2['ApprovalPekerja_Keuangan']; ?>"><?= $row2['ApprovalPekerja_Keuangan']; ?></option>
                                            <?php endwhile;
                                            } ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pekerja</label></div>
                                <div class="col-12 col-md-9">
                                        <select name="Id_Pekerja" id="Id_Pekerja" class="form-control" required >
                                            <option selected value='Semua'>Semua Pekerja</option>
                                            <?php
                                            $queryJenis = mysqli_query($koneksi, "SELECT * FROM tabel_pekerja");
                                            if (mysqli_num_rows($queryJenis)) {
                                                while ($row2 = mysqli_fetch_assoc($queryJenis)) :

                                            ?>
                                                    <option <?php if ($row['Id_Pekerja'] == $row2['Id_Pekerja']); ?> value="<?= $row2['Id_Pekerja']; ?>"><?= $row2['Nama_Pekerja']; ?></option>
                                            <?php endwhile;
                                            } ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="row form-group" id="tanggal_laporan">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dari</label></div>
                                <div class="col col-md-4"><input type="date" id="Tgl_Dari" name="Tgl_Dari" placeholder="Nama" class="form-control" value="<?php echo $row['TGL_MIN']; ?>" autofocus></div>
                                <div class="col col-md-1"><label for="text-input" class=" form-control-label">s/d</label></div>
                                <div class="col col-md-4"><input type="date" id="Tgl_Sampai" name="Tgl_Sampai" placeholder="Nama" class="form-control" value="<?php echo $row['TGL_MAX']; ?>" autofocus></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" name="submit" class="btn btn-success" value="Cetak Laporan"></input>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modals Laporan -->
        <?php 
            }
        ?>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();

            $('.delete').on('click', function() {
                var id = $(this).data('id');
                swal({
                        title: "Hapus Data " + id + "?",
                        text: "Data " + id + " Akan Dihapus, Apakah Anda Yakin?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // $.get('/uasweb/oakwood/admin/tabel-pengumuman.php?act='+id, function(data){
                            //     console.log(data);
                            // })
                            $.ajax({
                                url: './function/function_penggajianpekerja.php',
                                method: 'GET',
                                data: {
                                    act: 'deletepenggajian',
                                    id: id
                                },
                                success: function(data) {
                                    console.log(data);
                                    swal("Data " + id + " Berhasil Dihapus !", {
                                        icon: "success",
                                        buttons: false,
                                    });
                                    window.setTimeout(function() {
                                        window.location.href = 'penggajian-pekerjaproduksi.php';
                                    }, 1500);
                                }
                            })
                        } else {
                            swal("Data " + id + " Batal Dihapus");
                        }
                    });
            })
            //ketika pilih gaji - tambah
            $('#Id_Gaji').on('change',function(){
                var id = $(this).val()
                $.ajax({
                    url:'../kepegawaian/function/function_gaji.php',
                    method: 'GET',
                    data: {'act':'getgaji',
                            'Id_Gaji': id},
                    success: function(data){
                        data = JSON.parse(data)
                        $('#Besar_Gaji').val(data['Besar_Gaji'])
                        var besargaji = $('#Besar_Gaji').val()
                        var jml = $('#Jumlah_Produksi').val()
                        var hasil = jml * besargaji
                        $('#Grand_Total').val(hasil)
                        console.log(data);
                    }
                })
            })
            //ketika klik btn edit auto hitung - edit
            $('.edit').on('click',function(){
                var id = $(this).data('id')
                var jumlah = $('.Jumlah_Produksi_edit').val()
                $.ajax({
                    url:'../kepegawaian/function/function_gaji.php',
                    method: 'GET',
                    data: {'act':'getgajipkedit',
                            'Id_PenggajianPekerja': id},
                    success: function(data){
                        data = JSON.parse(data)
                        var hasil = jumlah * data['Besar_Gaji']
                        $('.Grand_Total_edit').val(hasil)
                        $('.Besar_Gaji_edit').val(data['Besar_Gaji'])
                        console.log(data);
                    }
                })
            })
            $('#Jumlah_Produksi').on('keyup',function(){
                var jml = $(this).val()
                var besargaji = $('#Besar_Gaji').val()
                var hasil = jml * besargaji
                $('#Grand_Total').val(hasil)
                console.log(hasil)
            })
            $('.Jumlah_Produksi_edit').on('keyup',function(){
                var jml = $(this).val()
                var besargaji = $('.Besar_Gaji_edit').val()
                var hasil = jml * besargaji
                $('.Grand_Total_edit').val(hasil)
                console.log(hasil)
            })
            $('#Id_Pekerja').on('change',function(){
                var id = $(this).val()
                $.ajax({
                    url:'../kepegawaian/function/function_gaji.php',
                    method: 'GET',
                    data: {'act':'getgajipkall',
                            'Id_Pekerja': id},
                    success: function(data){
                        data = JSON.parse(data)
                        $('#Id_Gaji').val(data['Id_Gaji'])
                        $('#Deskripsi_Gaji').val(data['Deskripsi'])
                        $('#Besar_Gaji').val(data['Besar_Gaji'])
                        console.log(data);
                    }
                })
            })
            $('.Id_Pekerja_edit').on('change',function(){
                var id = $(this).val()
                $.ajax({
                    url:'../kepegawaian/function/function_gaji.php',
                    method: 'GET',
                    data: {'act':'getgajipkalledit',
                            'Id_Pekerja_edit': id},
                    success: function(data){
                        data = JSON.parse(data)
                        $('.Id_Gaji_edit').val(data['Id_Gaji'])
                        $('.Deskripsi_Gaji_edit').val(data['Deskripsi'])
                        $('.Besar_Gaji_edit').val(data['Besar_Gaji'])
                        console.log(data);
                    }
                })
            })
        });
    </script>
</body>

</html>
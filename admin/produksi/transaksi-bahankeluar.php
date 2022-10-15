<?php
error_reporting(0);
include "./function/koneksi.php";
include "./function/tgl_indo.php";

$query = mysqli_query($koneksi, "SELECT max(id_bahankeluar) as kodeTerbesar FROM tabel_bahankeluar");
$data = mysqli_fetch_array($query);
$id_bahankeluar = $data['kodeTerbesar'];

$urutan = (int) substr($id_bahankeluar, 3, 3);

$urutan++;

$huruf = "BK";
$id_bahankeluar = $huruf . sprintf("%03s", $urutan);

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
    <title>Crystallo Admin - Bahan Baku Keluar Gudang</title>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data Master</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tabel-bahan.php">Bahan Baku</a></li>
                            <li><i class="fa fa-table"></i><a href="tabel-produk.php">Produk</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data Transaksi</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="transaksi-produkmasuk.php">Produk Masuk Gudang</a></li>
                            <li><i class="fa fa-table"></i><a href="transaksi-produkkeluar.php">Produk Keluar Gudang</a></li>
                            <li><i class="fa fa-table"></i><a href="transaksi-bahanmasuk.php">Bahan Baku Masuk</a></li>
                            <li><i class="fa fa-table"></i><a href="transaksi-bahankeluar.php">Bahan Baku Keluar</a></li>
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
                            <li class="active">Data Bahan Baku Keluar</li>
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
                                <strong class="card-title">Data Bahan Baku Keluar</strong>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mediumModal" style="float: right;"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data</button>
                                <a target="_blank" href="cetak-bahankeluar.php" class="btn btn-warning btn-sm" style="float: right; margin-right: 10px"><i class="fa fa-print"></i>&nbsp; Export PDF</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Bahan Keluar</th>
                                            <th>Nama Bahan Baku</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jumlah Bahan Baku Keluar</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Bahan Baku Keluar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    $database = "SELECT * FROM tabel_bahankeluar JOIN tabel_bahanbaku ON tabel_bahankeluar.id_bahan = tabel_bahanbaku.Id_Bahan JOIN tabel_pegawai ON tabel_bahankeluar.id_pegawai = tabel_pegawai.Id_Pegawai ORDER BY id_bahankeluar DESC";
                                    $query = mysqli_query($koneksi, $database);
                                    while ($mysql = mysqli_fetch_array($query)) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $mysql['id_bahankeluar']; ?></td>
                                                <td><?php echo $mysql['Nama_Bahan']; ?></td>
                                                <td><?php echo $mysql['Nama_Pegawai']; ?></td>
                                                <td><?php echo $mysql['jumlah']; ?></td>
                                                <td><?php echo $mysql['deskripsi']; ?></td>
                                                <td><?= tanggal_indo($mysql['tgl_keluar']); ?></td>
                                                <td style="text-align: center; width: 15%">
                                                    <button type="button" class="btn btn-primary btn-sm btn-flat btn-xs" data-toggle="modal" data-target='#updateModal<?php echo $mysql["id_bahankeluar"] ?>'><i class="fa fa-pencil"></i> Edit</button>
                                                    <button class="delete btn btn-danger btn-sm btn-flat btn-xs" type="button" id="delete" data-id="<?php echo $mysql['id_bahankeluar']; ?>"><i class="fa fa-trash-o"></i> Delete</button>
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
                        <h5 class="modal-title" id="mediumModalLabel">Tambah Data Bahan Baku Keluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="./function/function_bahankeluar.php?act=tambahbahankeluar" method="post" role="form">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Bahan Keluar</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="id_bahankeluar" name="id_bahankeluar" placeholder="Text" class="form-control" value="<?php echo $id_bahankeluar ?>" readonly></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Bahan Baku</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="id_bahan" class="form-control">
                                        <option disabled selected>Pilih Bahan Baku</option>
                                        <?php
                                        $sql = "SELECT * FROM tabel_bahanbaku";
                                        $result = mysqli_query($koneksi, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $row['Id_Bahan']; ?>"><?php echo $row['Nama_Bahan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pegawai</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="id_pegawai" class="form-control">
                                        <option disabled selected>Pilih Nama Pegawai</option>
                                        <?php
                                        $sql = "SELECT * FROM tabel_pegawai";
                                        $result = mysqli_query($koneksi, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $row['Id_Pegawai']; ?>"><?php echo $row['Nama_Pegawai']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah Bahan Keluar</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="jumlah" name="jumlah" placeholder="Jumlah Bahan Baku Keluar" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Deskripsi</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="deskirpsi" name="deskripsi" placeholder="Deskripsi" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Bahan Baku Keluar</label></div>
                                <div class="col-12 col-md-9"><input type="date" id="tgl_keluar" name="tgl_keluar" placeholder="Tanggal Bahan Baku Keluar" class="form-control"></div>
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
        $id_bahankeluar = $mysql['id_bahankeluar'];
        $query = "SELECT * FROM tabel_bahankeluar ORDER BY id_bahankeluar DESC";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <!-- Modals Edit Data -->
            <div class="modal fade" id="updateModal<?php echo $row["id_bahankeluar"] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Edit Data Produk Keluar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./function/function_bahankeluar.php?act=updatebahankeluar" method="post" role="form">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Id Produk Keluar</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="id_bahankeluar" name="id_bahankeluar" placeholder="Text" class="form-control" value="<?php echo $row['id_bahankeluar']; ?>" readonly></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Bahan Baku</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="id_bahan" class="form-control">
                                            <option disabled selected>Pilih Bahan Baku</option>
                                            <?php
                                                $queryJenis = mysqli_query($koneksi, "SELECT * FROM tabel_bahanbaku");
                                                if (mysqli_num_rows($queryJenis)) {
                                                    $selected = "";
                                                    while ($row2 = mysqli_fetch_assoc($queryJenis)) :

                                                        ?>
                                                    <option <?php if ($row['Id_Bahan'] == $row2['Id_Bahan']) echo "selected"; ?> value="<?= $row2['Id_Bahan']; ?>"><?= $row2['Nama_Bahan']; ?></option>
                                            <?php endwhile;
                                                } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pegawai</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="id_pegawai" class="form-control">
                                            <option disabled selected>Pilih Nama Pegawai</option>
                                            <?php
                                                $queryJenis = mysqli_query($koneksi, "SELECT * FROM tabel_pegawai");
                                                if (mysqli_num_rows($queryJenis)) {
                                                    $selected = "";
                                                    while ($row2 = mysqli_fetch_assoc($queryJenis)) :

                                                        ?>
                                                    <option <?php if ($row['Id_Pegawai'] == $row2['Id_Pegawai']) echo "selected"; ?> value="<?= $row2['Id_Pegawai']; ?>"><?= $row2['Nama_Pegawai']; ?></option>
                                            <?php endwhile;
                                                } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jumlah Bahan Keluar</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="jumlah" name="jumlah" placeholder="Jumlah Bahan Baku Keluar" class="form-control" value="<?php echo $row['jumlah']; ?>"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Deskripsi</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="deskripsi" name="deskripsi" placeholder="Deskripsi" class="form-control" value="<?php echo $row['deskripsi']; ?>"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tanggal Bahan Baku Keluar</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="tgl_keluar" name="tgl_keluar" placeholder="Tanggal Bahan Baku Keluar" class="form-control" value="<?php echo $row['tgl_keluar']; ?>"></div>
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
                                url: './function/function_bahankeluar.php',
                                method: 'GET',
                                data: {
                                    delete: 'deletebahankeluar',
                                    id_bahankeluar: id
                                },
                                success: function(data) {
                                    console.log(data);
                                    swal("Data " + id + " Berhasil Dihapus !", {
                                        icon: "success",
                                        buttons: false,
                                    });
                                    window.setTimeout(function() {
                                        window.location.href = 'transaksi-bahankeluar.php';
                                    }, 1500);
                                }
                            })
                        } else {
                            swal("Data " + id + " Batal Dihapus");
                        }
                    });
            })
        });
    </script>

    <!-- <script type="text/javascript">
        var rupiah = document.getElementById("HargaProduk");
        rupiah.addEventListener("keyup", function(e) {
            rupiah.value = formatRupiah(this.value, "Rp " + ",00");
        });

        
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
        }
    </script> -->

</body>

</html>
<?php
include "./function/koneksi.php";


$query = mysqli_query($koneksi, "SELECT max(Kode_Pemesanan) as kodeTerbesar FROM tabel_pemesanan");
$data = mysqli_fetch_array($query);
$Kode_Pemesanan = $data['kodeTerbesar'];

$urutan = (int) substr($Kode_Pemesanan, 3, 3);

$urutan++;

$huruf = "PM";
$Kode_Pemesanan = $huruf . sprintf("%03s", $urutan);

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
    <title>Crystallo Admin - Pemesanan</title>
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
                <a class="navbar-brand" href="dashboard.php"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="dashboard.php"><img src="images/logo.png" alt="Logo"></a>
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
                            <a class="nav-link" href="#"><i class="fa fa- user"></i><?= $_SESSION['username'];?></a>
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
                            <li class="active">Data Tabel Pemesanan</li>
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
                                <strong class="card-title">Data Tabel Pemesanan</strong>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#mediumModal" style="float: right;"><i class="fa fa-plus-square"></i>&nbsp; Tambah Data</button>
                                <a target="_blank" href="cetak-pemesanan.php" class="btn btn-warning btn-sm" style="float: right; margin-right: 10px"><i class="fa fa-print"></i>&nbsp; Export PDF</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Pemesanan</th>
                                            <th>Nama Produk</th>
                                            <th>Nama Pelanggan</th>

                                            <th>Tanggal Pemesanan</th>
                                            <th>Qty Pemesanan</th>
                                            <th>Grand Total</th>
                                            <th>Metode Pengiriman</th>
                                            <th>Status Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    $database = "SELECT * FROM tabel_pemesanan JOIN tabel_produk ON tabel_pemesanan.Id_produk = tabel_produk.Id_Produk JOIN tabel_pelanggan ON tabel_pemesanan.Id_Pelanggan = tabel_pelanggan.Id_Pelanggan ORDER BY Kode_Pemesanan DESC";
                                    $query = mysqli_query($koneksi, $database);
                                    while ($mysql = mysqli_fetch_array($query)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $mysql['Kode_Pemesanan']; ?></td>
                                                <td><?php echo $mysql['Nama_Produk']; ?></td>
                                                <td><?php echo $mysql['Nama_Pelanggan']; ?></td>

                                                <td><?php echo $mysql['Tgl_Pemesanan']; ?></td>
                                                <td><?php echo $mysql['Qty_Pemesanan']; ?></td>
                                                <td><?php echo $mysql['Grand_Total']; ?></td>
                                                <td><?php echo $mysql['Metode_Pengiriman']; ?></td>
                                                <td><?php echo $mysql['Status_Bayar']; ?></td>
                                                <td style="text-align: center; width: 15%">
                                                    <button type="button" class="btn btn-primary btn-sm btn-flat btn-xs" data-toggle="modal" data-target='#updateModal<?php echo $mysql["Kode_Pemesanan"] ?>'><i class="fa fa-pencil"></i> Edit</button>
                                                    <button class="delete btn btn-danger btn-sm btn-flat btn-xs" type="button" id="delete" data-id="<?php echo $mysql['Kode_Pemesanan']; ?>"><i class="fa fa-trash-o"></i> Delete</button>
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
                        <h5 class="modal-title" id="mediumModalLabel">Tambah Data Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="./function/function_Pemesanan.php?act=tambahpengumuman" method="post" role="form">
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Pemesanan</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="Kode_Pemesanan" name="Kode_Pemesanan" placeholder="Text" class="form-control" value="<?php echo $Kode_Pemesanan ?>" readonly></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Produk</label></div>
                              <div class="col-12 col-md-9">
                                <select name="Id_Produk" id="Id_Produk" class="form-control">
                                      <?php

                                        $sql = "SELECT * FROM tabel_produk";

                                        $hasil=mysqli_query($koneksi,$sql);
                                        $no=0;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                        $no++;
                                       ?>
                                        <option value="<?php echo $data['Id_Produk'];?>"><?php echo $data['Nama_Produk'];?></option>
                                      <?php
                                      }
                                      ?>
                                </select>
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pelanggan</label></div>
                              <div class="col-12 col-md-9">
                                <select name="Id_Pelanggan" id="Id_Pelanggan" class="form-control">
                                      <?php

                                        $sql = "SELECT * FROM tabel_pelanggan";

                                        $hasil=mysqli_query($koneksi,$sql);
                                        $no=0;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                        $no++;
                                       ?>
                                        <option value="<?php echo $data['Id_Pelanggan'];?>"><?php echo $data['Nama_Pelanggan'];?></option>
                                      <?php
                                      }
                                      ?>
                                </select>
                              </div>
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
                              <div class="col-12 col-md-9"><input type="text" id="QTY" name="QTY" placeholder="QTY Pemesanan" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Grand Total</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="Grand_Total" name="Grand_Total" placeholder="Grand Total" class="form-control"></div>
                          </div>

                          <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Metode Pengiriman</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="Metode_Pengiriman" name="Metode_Pengiriman" placeholder="Metode Pengiriman" class="form-control"></div>
                          </div>

                          <!-- <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status Bayar</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="status" name="status" placeholder="Status Bayar" class="form-control"></div>
                          </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" name="submit" class="btn btn-primary" value="Tambah Data"></input>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modals Tambah Data -->

        <?php
        error_reporting (E_ALL ^ E_NOTICE);
        $id = $mysql['Kode_Pemesanan'];
        $query = "SELECT * FROM tabel_pemesanan ORDER BY Kode_Pemesanan DESC";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- Modals Edit Data -->
            <div class="modal fade" id="updateModal<?php echo $row["Kode_Pemesanan"] ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Edit Data Pemesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form action="./function/function_Pemesanan.php?act=updatepengumuman" method="post" role="form">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kode Pemesanan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="Kode_Pemesanan" name="Kode_Pemesanan" class="form-control" value="<?php echo $row['Kode_Pemesanan']; ?>"  ></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Produk</label></div>
                                <div class="col-12 col-md-9">
                                  <select name="Id_Produk" id="Id_Produk" class="form-control ">
                                        <?php

                                          $sql = "SELECT * FROM tabel_produk";

                                          $hasil=mysqli_query($koneksi,$sql);
                                          $no=0;
                                          while ($data = mysqli_fetch_array($hasil)) {
                                          $no++;
                                         ?>
                                          <option value="<?php echo $data['Id_Produk'];?>"><?php echo $data['Nama_Produk'];?></option>
                                        <?php
                                        }
                                        ?>
                                  </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Pelanggan</label></div>
                                <div class="col-12 col-md-9">
                                  <select name="Id_Pelanggan" id="Id_Pelanggan" class="form-control">
                                        <?php

                                          $sql = "SELECT * FROM tabel_pelanggan";

                                          $hasil=mysqli_query($koneksi,$sql);
                                          $no=0;
                                          while ($data = mysqli_fetch_array($hasil)) {
                                          $no++;
                                         ?>
                                          <option value="<?php echo $data['Id_Pelanggan'];?>"><?php echo $data['Nama_Pelanggan'];?></option>
                                        <?php
                                        }
                                        ?>
                                  </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                      <div class="col col-sm-3"><label for="serahterima" class=" form-control-label">Tanggal Pemesanan</label></div>
                                      <div class="col col-sm-6">
                                        <input type="date" name="Tgl_Pemesanan" value="<?php echo htmlentities($TGLPemesanan); ?>" />
                                      </div>
                                  </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">QTY Pemesanan</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="QTY" name="QTY" placeholder="QTY Pemesanan" class="form-control" value="<?php echo $row['Qty_Pemesanan']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Grand Total</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="Grand_Total" name="Grand_Total" placeholder="Grand Total" class="form-control" value="<?php echo $row['Grand_Total']; ?>"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Metode Pengiriman</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="Metode_Pengiriman" name="Metode_Pengiriman" placeholder="Metode Pengiriman" class="form-control" value="<?php echo $row['Metode_Pengiriman']; ?>"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status Bayar</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="status" name="status" placeholder="Status Bayar" class="form-control" value="<?php echo $row['Status_Bayar']; ?>"></div>
                            </div>

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <input type="submit" name="submit" class="btn btn-primary" value="Edit Data"></input>
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
                                url: './function/function_Pemesanan.php',
                                method: 'GET',
                                data: {
                                    act: 'deletepengumuman',
                                    Kode_Pemesanan: id
                                },
                                success: function(data) {
                                    console.log(data);
                                    swal("Data " + id + " Berhasil Dihapus !", {
                                        icon: "success",
                                        buttons: false,
                                    });
                                    window.setTimeout(function() {
                                        window.location.href = 'tabel-Pemesanan.php';
                                    }, 1500);
                                }
                            })
                        } else {
                            swal("Data " + id + " Batal Dihapus");
                        }
                    });
            })
            $('#Id_Produk').on('change',function(){
              var id = $(this).val()
              $.ajax({
                url:'./function/function_Pemesanan.php',
                method:'GET',
                data:{
                  'act':'getidproduk',
                  'Id_Produk':id
                },
                success:function(data){
                  data=JSON.parse(data)
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


</body>

</html>
<?php
include "./function/koneksi.php";

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
    <title>Cetak Laporan Penggajian Pekerja Produksi</title>
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
    <p style="font-weight: bold; font-size: 18px; text-align: center;"><u>Ud. Crystallo Footwear</u></p>
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Penggajian</th>
                        <th>Tgl Penggajian</th>
                        <th>Nama Pekerja</th>
                        <th>Jumlah Produksi</th>
                        <th>Deskripsi</th>
                        <th>Besaran Gaji</th>
                        <th>Grand Total</th>
                        <th>Disetujui Keuangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $Tgl_Dari= $_POST['Tgl_Dari'];
                    $Tgl_Sampai = $_POST['Tgl_Sampai'];
                    $Id_Pekerja = $_POST['Id_Pekerja'];
                    $ApprovalPekerja_Keuangan = $_POST['ApprovalPekerja_Keuangan'];

                    $sql = mysqli_query($koneksi, "SELECT * FROM penggajian_pekerja WHERE Id_Pekerja = '$Id_Pekerja'");
                    $cekid = mysqli_fetch_array($sql);

                    if($cekid){

                        $sql = mysqli_query($koneksi, "SELECT * FROM penggajian_pekerja WHERE ApprovalPekerja_Keuangan = '$ApprovalPekerja_Keuangan'");
                        $cekapproval = mysqli_fetch_array($sql);

                        if($cekapproval){
                            $no = 1;
                            $database = "SELECT * FROM tabel_pekerja P JOIN penggajian_pekerja PP on PP.Id_Pekerja = P.Id_Pekerja JOIN tabel_gaji G on G.Id_Gaji = PP.Id_Gaji
                                WHERE PP.Id_Pekerja ='$Id_Pekerja' AND PP.ApprovalPekerja_Keuangan = '$ApprovalPekerja_Keuangan' AND PP.Tgl_PenggajianPekerja BETWEEN '$Tgl_Dari' AND '$Tgl_Sampai' ORDER BY PP.Id_PenggajianPekerja";
                            $query = mysqli_query($koneksi, $database);
                            while ($mysql = mysqli_fetch_array($query)) {
                            ?>
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
                                </tr>
                            <?php
                            }
                        } else {
                            $no = 1;
                            $database = "SELECT * FROM tabel_pekerja P JOIN penggajian_pekerja PP on PP.Id_Pekerja = P.Id_Pekerja JOIN tabel_gaji G on G.Id_Gaji = PP.Id_Gaji
                                WHERE PP.Id_Pekerja ='$Id_Pekerja' AND PP.Tgl_PenggajianPekerja BETWEEN '$Tgl_Dari' AND '$Tgl_Sampai' ORDER BY PP.Id_PenggajianPekerja";
                            $query = mysqli_query($koneksi, $database);
                            while ($mysql = mysqli_fetch_array($query)) {
                            ?>
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
                                </tr>
                            <?php
                            }
                        }
                    }else{  

                        $sql = mysqli_query($koneksi, "SELECT * FROM penggajian_pekerja WHERE ApprovalPekerja_Keuangan = '$ApprovalPekerja_Keuangan'");
                        $cekapproval = mysqli_fetch_array($sql);

                        if($cekapproval){
                            $no = 1;
                            $database = "SELECT * FROM tabel_pekerja P JOIN penggajian_pekerja PP on PP.Id_Pekerja = P.Id_Pekerja JOIN tabel_gaji G on G.Id_Gaji = PP.Id_Gaji
                                WHERE PP.ApprovalPekerja_Keuangan = '$ApprovalPekerja_Keuangan' AND PP.Tgl_PenggajianPekerja BETWEEN '$Tgl_Dari' AND '$Tgl_Sampai' ORDER BY PP.Id_PenggajianPekerja";
                            $query = mysqli_query($koneksi, $database);
                            while ($mysql = mysqli_fetch_array($query)) {
                            ?>
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
                                </tr>
                            <?php
                            }
                        } else {
                            $no = 1;
                            $database = "SELECT * FROM tabel_pekerja P JOIN penggajian_pekerja PP on PP.Id_Pekerja = P.Id_Pekerja JOIN tabel_gaji G on G.Id_Gaji = PP.Id_Gaji
                                WHERE PP.Tgl_PenggajianPekerja BETWEEN '$Tgl_Dari' AND '$Tgl_Sampai' ORDER BY PP.Id_PenggajianPekerja";
                            $query = mysqli_query($koneksi, $database);
                            while ($mysql = mysqli_fetch_array($query)) {
                            ?>
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
                                </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>
                    <?php } ?>
            </table>
        </div>
    </div>
    <!-- /.col -->
    </div>
    <p style="float: right;">Sidoarjo, <?php echo date('d') . ' ' . (strtolower($bln[date('m')])) . ' ' . date('Y') ?></p>
</section>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
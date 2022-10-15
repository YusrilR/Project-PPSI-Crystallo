<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahgaji') {
    $IdGaji = $_POST['Id_Gaji'];
    $Deskripsi = $_POST['Deskripsi'];
    $BesarGaji = $_POST['Besar_Gaji'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_gaji (Id_Gaji, Deskripsi, Besar_Gaji) VALUES('$IdGaji', '$Deskripsi', '$BesarGaji')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-gaji.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletegaji') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_gaji WHERE Id_Gaji = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-gaji.php");
        return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updategaji') {
    $IdGaji = $_POST['Id_Gaji'];
    $Deskripsi = $_POST['Deskripsi'];
    $BesarGaji = $_POST['Besar_Gaji'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_gaji SET Deskripsi='$Deskripsi' , Besar_Gaji='$BesarGaji' WHERE Id_Gaji='$IdGaji' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-gaji.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'getgaji') {
    $Id_Gaji = $_GET['Id_Gaji'];

    $query = mysqli_query($koneksi, "SELECT * FROM tabel_gaji WHERE Id_Gaji='$Id_Gaji'");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);
} elseif ($_GET['act'] == 'getgajiedit') {
    $Id_PenggajianPegawai = $_GET['Id_PenggajianPegawai'];

    $query = mysqli_query($koneksi, "SELECT * FROM penggajian_pegawai WHERE Id_PenggajianPegawai='$Id_PenggajianPegawai'");
    $row = mysqli_fetch_array($query);
    $idgaji = $row['Id_Gaji'];

    $querygaji = mysqli_query($koneksi, "SELECT * FROM tabel_gaji WHERE Id_Gaji='$idgaji'");
    $rowgaji = mysqli_fetch_array($querygaji);

    echo json_encode($rowgaji);
}

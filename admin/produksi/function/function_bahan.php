<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahbahan') {
    $KodeBahan = $_POST['Id_Bahan'];
    $NamaBahan = $_POST['Nama_Bahan'];
    $StokBahan = $_POST['Stok'];
    $HargaBahan = $_POST['Harga'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_bahanbaku (Id_Bahan, Nama_Bahan, Stok_Bahan, HargaBahan) VALUES('$KodeBahan', '$NamaBahan', '$StokBahan','$HargaBahan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-bahan.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deletebahan') {
    $KodeBahan = $_GET['Id_Bahan'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_bahanbaku WHERE Id_Bahan = '$KodeBahan'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-bahan.php");
        return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatebahan') {
    $KodeBahan = $_POST['Id_Bahan'];
    $NamaBahan = $_POST['Nama_Bahan'];
    $StokBahan = $_POST['Stok'];
    $HargaBahan = $_POST['Harga'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_bahanbaku SET Nama_Bahan='$NamaBahan' , Stok_Bahan='$StokBahan' , HargaBahan='$HargaBahan' WHERE Id_Bahan='$KodeBahan' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-bahan.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

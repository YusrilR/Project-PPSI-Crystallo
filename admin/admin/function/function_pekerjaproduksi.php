<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahpekerja') {
    $Id_Pekerja = $_POST['Id_Pekerja'];
    $Nama_Pekerja = $_POST['Nama_Pekerja'];
    $Alamat_Pekerja = $_POST['Alamat_Pekerja'];
    $No_Telp_Pekerja = $_POST['No_Telp_Pekerja'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_pekerja (Id_Pekerja, Nama_Pekerja, Alamat_Pekerja, No_Telp_Pekerja) VALUES('$Id_Pekerja' , '$Nama_Pekerja' , '$Alamat_Pekerja' , '$No_Telp_Pekerja')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-pekerjaproduksi.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deletepekerja') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_pekerja WHERE Id_Pekerja = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatepekerja') {
    $Id_Pekerja = $_POST['Id_Pekerja'];
    $Nama_Pekerja = $_POST['Nama_Pekerja'];
    $Alamat_Pekerja = $_POST['Alamat_Pekerja'];
    $No_Telp_Pekerja = $_POST['No_Telp_Pekerja'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_pekerja SET No_Telp_Pekerja='$No_Telp_Pekerja', Nama_Pekerja='$Nama_Pekerja' , Alamat_Pekerja='$Alamat_Pekerja' WHERE Id_Pekerja='$Id_Pekerja' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-pekerjaproduksi.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

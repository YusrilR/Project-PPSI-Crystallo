<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahpegawai') {
    $Id_Pegawai = $_POST['Id_Pegawai'];
    $Nama_Pegawai = $_POST['Nama_Pegawai'];
    $Alamat_Pegawai = $_POST['Alamat_Pegawai'];
    $No_Telp_Pegawai = $_POST['No_Telp_Pegawai'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_pegawai (Id_Pegawai, Nama_Pegawai, Alamat_Pegawai, No_Telp_Pegawai) VALUES('$Id_Pegawai' , '$Nama_Pegawai' , '$Alamat_Pegawai' , '$No_Telp_Pegawai')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-pegawai.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deletepegawai') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_pegawai WHERE Id_Pegawai = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatepegawai') {
    $Id_Pegawai = $_POST['Id_Pegawai'];
    $Nama_Pegawai = $_POST['Nama_Pegawai'];
    $Alamat_Pegawai = $_POST['Alamat_Pegawai'];
    $No_Telp_Pegawai = $_POST['No_Telp_Pegawai'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_pegawai SET No_Telp_Pegawai='$No_Telp_Pegawai', Nama_Pegawai='$Nama_Pegawai' , Alamat_Pegawai='$Alamat_Pegawai' WHERE Id_Pegawai='$Id_Pegawai' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-pegawai.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahpelanggan') {
    $IdPelanggan = $_POST['Id_Pelanggan'];
    $NamaPelanggan = $_POST['Nama_Pelanggan'];
    $AlamatPelanggan = $_POST['Alamat_Pelanggan'];
    $NoTelpPelanggan = $_POST['No_Telp_Pelanggan'];


    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_pelanggan (Id_Pelanggan, Nama_Pelanggan, Alamat_Pelanggan, No_Telp_Pelanggan) VALUES('$IdPelanggan' , '$NamaPelanggan' , '$AlamatPelanggan','$NoTelpPelanggan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-pelanggan.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deletepelanggan') {
    $IdPelanggan = $_GET['Id_Pelanggan'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_pelanggan WHERE Id_Pelanggan = '$IdPelanggan'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatepelanggan') {
    $IdPelanggan = $_POST['Id_Pelanggan'];
    $NamaPelanggan = $_POST['Nama_Pelanggan'];
    $AlamatPelanggan = $_POST['Alamat_Pelanggan'];
    $NoTelpPelanggan = $_POST['No_Telp_Pelanggan'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_pelanggan SET Nama_Pelanggan='$NamaPelanggan' , Alamat_Pelanggan='$AlamatPelanggan',No_Telp_Pelanggan='$NoTelpPelanggan' WHERE Id_Pelanggan='$IdPelanggan' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-pelanggan.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

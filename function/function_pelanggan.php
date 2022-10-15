<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahpelanggan') {
    $IdPelanggan = $_POST['Id_Pelanggan'];
    $NamaPelanggan = $_POST['Nama_Pelanggan'];
    $AlamatPelanggan = $_POST['Alamat_Pelanggan'];
    $NoTelpPelanggan = $_POST['No_Telp_Pelanggan'];
    $Passwod = $_POST['Password'];


    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_pelanggan (Id_Pelanggan, Nama_Pelanggan, Alamat_Pelanggan, No_Telp_Pelanggan,Password) VALUES('$IdPelanggan' , '$NamaPelanggan' , '$AlamatPelanggan','$NoTelpPelanggan','$Passwod')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../LoginPelanggan.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}

<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahproduk') {
    $KodeProduk = $_POST['Id_Produk'];
    $NamaProduk = $_POST['Nama_Produk'];
    $StokProduk = $_POST['Stok'];
    $HargaProduk = $_POST['Harga'];
    $file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../../images/produk/';

    move_uploaded_file($source, $folder.$file);

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO Tabel_Produk (Id_Produk, Nama_Produk, Stok, Harga, file_gambar) VALUES('$KodeProduk', '$NamaProduk', '$StokProduk','$HargaProduk','$file')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-produk.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deleteproduk') {
    $KodeProduk = $_GET['Id_Produk'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM Tabel_Produk WHERE Id_Produk = '$KodeProduk'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-produk.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateproduk') {
    $KodeProduk = $_POST['Id_Produk'];
    $NamaProduk = $_POST['Nama_Produk'];
    $StokProduk = $_POST['Stok'];
    $HargaProduk = $_POST['Harga'];
    $file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../../images/produk/';

    move_uploaded_file($source, $folder.$file);

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE Tabel_Produk SET Nama_Produk='$NamaProduk' , Stok='$StokProduk' , Harga='$HargaProduk', file_gambar='$file' WHERE Id_Produk='$KodeProduk' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-produk.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

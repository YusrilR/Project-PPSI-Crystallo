<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahproduksi') {
    $KodeProduksi = $_POST['Id_Produksi'];
    $KodeProduk = $_POST['Id_Produk'];
    $KodeBahan = $_POST['Id_Bahan'];
    $KodePekerja = $_POST['Id_Pekerja'];
    $TglProduksi = $_POST['Tgl_Produksi'];
    $QtyProduksi = $_POST['Qty_Produksi'];
    
    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO produksi (Id_Produksi, Id_Produk, Id_Bahan, Id_Pekerja, Tgl_Produksi, Qty_Produksi) VALUES('$KodeProduksi', '$KodeProduk', '$KodeBahan','$KodePekerja','$TglProduksi','$QtyProduksi')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-produksi.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deleteproduksi') {
    $KodeProduksi = $_GET['Id_Produksi'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM produksi WHERE Id_Produksi = '$KodeProduksi'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-produk.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateproduksi') {
    $KodeProduksi = $_POST['Id_Produksi'];
    $KodeProduk = $_POST['Id_Produk'];
    $KodeBahan = $_POST['Id_Bahan'];
    $KodePekerja = $_POST['Id_Pekerja'];
    $TglProduksi = $_POST['Tgl_Produksi'];
    $QtyProduksi = $_POST['Qty_Produksi'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE produksi SET Id_Produk='$KodeProduk' , Id_bahan='$KodeBahan' , Id_Pekerja='$KodePekerja', Tgl_Produksi='$TglProduksi', Qty_Produksi='$QtyProduksi'  WHERE Id_Produksi='$KodeProduksi' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-produksi.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

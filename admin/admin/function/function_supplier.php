<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahsupplier') {
    $IdSupplier = $_POST['Id_Supplier'];
    $NamaSupplier = $_POST['Nama_Supplier'];
    $AlamatSupplier = $_POST['Alamat_Supplier'];
    $NotelpSupplier = $_POST['No_Telp_Supplier'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_supplier (Id_Supplier,Nama_Supplier,Alamat_Supplier,No_Telp_Supplier) 
    VALUES('$IdSupplier', '$NamaSupplier', '$AlamatSupplier','$NotelpSupplier')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-supplier.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deletesupplier') {
    $IdSupplier = $_GET['Id_Supplier'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_supplier WHERE Id_Supplier = '$IdSupplier'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-supplier.php");
        return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatesupplier') {
    $IdSupplier = $_POST['Id_Supplier'];
    $NamaSupplier = $_POST['Nama_Supplier'];
    $AlamatSupplier = $_POST['Alamat_Supplier'];
    $NotelpSupplier = $_POST['No_Telp_Supplier'];
    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_supplier SET Nama_Supplier='$NamaSupplier' , Alamat_Supplier='$AlamatSupplier',No_Telp_Supplier='$NotelpSupplier' WHERE Id_Supplier='$IdSupplier' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-supplier.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

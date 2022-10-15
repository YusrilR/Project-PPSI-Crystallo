<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahpengumuman') {
    $IdProduk = $_POST['Id_Produk'];
    $IdPel = $_POST['Id_Pelanggan'];
    $KodePemesanan = $_POST['Kode_Pemesanan'];
    $TGLPemesanan = $_POST['Tgl_Pemesanan'];
    $QTY = $_POST['QTY'];
    $GrandTotal = $_POST['Grand_Total'];
    $MetodePengiriman = $_POST['Metode_Pengiriman'];


    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_pemesanan (Id_Produk,Id_Pelanggan,Kode_Pemesanan, Tgl_Pemesanan, Qty_Pemesanan, Grand_Total, Metode_Pengiriman) VALUES('$IdProduk' , '$IdPel' , '$KodePemesanan' , '$TGLPemesanan','$QTY','$GrandTotal','$MetodePengiriman')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-pemesanan.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletepengumuman') {
    $KodePemesanan = $_GET['Kode_Pemesanan'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_pemesanan WHERE Kode_Pemesanan = '$KodePemesanan'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatepengumuman') {
    $IdProduk = $_POST['Id_Produk'];
    $IdPel = $_POST['Id_Pelanggan'];
    $KodePemesanan = $_POST['Kode_Pemesanan'];
    $TGLPemesanan = $_POST['Tgl_Pemesanan'];
    $QTY = $_POST['QTY'];
    $GrandTotal = $_POST['Grand_Total'];
    $MetodePengiriman = $_POST['Metode_Pengiriman'];
    $Status_Bayar = $_POST['status'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_pemesanan SET Id_Produk='$IdProduk' , Id_Pelanggan='$IdPel' , Tgl_Pemesanan='$TGLPemesanan',Qty_Pemesanan='$QTY',Grand_Total='$GrandTotal',Metode_Pengiriman='$MetodePengiriman', Status_Bayar='$Status_Bayar' WHERE Kode_Pemesanan='$KodePemesanan' ");

    $query = mysqli_query($koneksi, "SELECT max(id_produkkeluar) as kodeTerbesar FROM tabel_produkkeluar");
    $data = mysqli_fetch_array($query);
    $id_produkkeluar = $data['kodeTerbesar'];

    $urutan = (int) substr($id_produkkeluar, 3, 3);

    $urutan++;

    $huruf = "PK";
    $id_produkkeluar = $huruf . sprintf("%03s", $urutan);

    $stok = mysqli_query($koneksi, "SELECT * FROM tabel_produk WHERE Id_Produk='$id_produk'");
    $stok = mysqli_fetch_array($stok);

    if ($queryupdate) {
        # credirect ke page index
        $stok_sisa = $stok['Stok'] - $QTY;
        $update_stok = mysqli_query($koneksi, "UPDATE tabel_produk SET Stok='$stok_sisa' WHERE Id_Produk='$id_produk'");
        $tambah =  mysqli_query($koneksi, "INSERT INTO tabel_produkkeluar (id_produkkeluar, id_produk, id_pelanggan, jumlah, tgl_keluar) VALUES('$id_produkkeluar' , '$IdProduk' , '$IdPel' , '$QTY' , '$TGLPemesanan')");
        header("location:../tabel-pemesanan.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} else if ($_GET['act'] == 'getidproduk') {
    $Id_Produk = $_GET['Id_Produk'];

    $query = mysqli_query($koneksi, "Select * from tabel_produk where Id_Produk='$Id_Produk'");
    $row = mysqli_fetch_array($query);
    echo json_encode($row);
}

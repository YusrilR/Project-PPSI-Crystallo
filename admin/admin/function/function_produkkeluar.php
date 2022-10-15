<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahprodukkeluar') {
    $id_produkkeluar = $_POST['id_produkkeluar'];
    $id_produk = $_POST['id_produk'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $jumlah = $_POST['jumlah'];
    $tgl_keluar = $_POST['tgl_keluar'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_produkkeluar (id_produkkeluar, id_produk, id_pelanggan, jumlah, tgl_keluar) VALUES('$id_produkkeluar' , '$id_produk' , '$id_pelanggan' , '$jumlah' , '$tgl_keluar')");

    $stok = mysqli_query($koneksi, "SELECT * FROM tabel_produk WHERE Id_Produk='$id_produk'");
    $stok = mysqli_fetch_array($stok);

    if ($querytambah) {
        # code redicet setelah insert ke index
        $stok_sisa = $stok['Stok'] - $jumlah;
        $update_stok = mysqli_query($koneksi, "UPDATE tabel_produk SET Stok='$stok_sisa' WHERE Id_Produk='$id_produk'");
        header("location:../transaksi-produkkeluar.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deleteprodukkeluar') {
    $id_produkkeluar = $_GET['id_produkkeluar'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_produkkeluar WHERE id_produkkeluar='$id_produkkeluar'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateprodukkeluar') {
    $id_produkkeluar = $_POST['id_produkkeluar'];
    $id_produk = $_POST['id_produk'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $jumlah = $_POST['jumlah'];
    $tgl_keluar = $_POST['tgl_keluar'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_produkkeluar SET id_produk='$id_produk' , id_pelanggan='$id_pelanggan' , jumlah='$jumlah' , tgl_keluar='$tgl_keluar' WHERE id_produkkeluar='$id_produkkeluar' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../transaksi-produkkeluar.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

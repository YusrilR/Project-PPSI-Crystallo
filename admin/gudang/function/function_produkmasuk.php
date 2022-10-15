<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahprodukmasuk') {
    $id_produkmasuk = $_POST['id_produkmasuk'];
    $id_pekerja = $_POST['id_pekerja'];
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $tgl_masuk = $_POST['tgl_masuk'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_produkmasuk (id_produkmasuk, id_pekerja, id_produk, jumlah, tgl_masuk) VALUES('$id_produkmasuk' , '$id_pekerja' , '$id_produk' , '$jumlah' , '$tgl_masuk')");

    $stok = mysqli_query($koneksi, "SELECT * FROM tabel_produk WHERE Id_Produk='$id_produk'");
    $stok = mysqli_fetch_array($stok);

    if ($querytambah) {
        # code redicet setelah insert ke index
        $stok_sisa = $stok['Stok'] + $jumlah;
        $update_stok = mysqli_query($koneksi, "UPDATE tabel_produk SET Stok='$stok_sisa' WHERE Id_Produk='$id_produk'");
        header("location:../transaksi-produkmasuk.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deleteprodukmasuk') {
    $id_produkmasuk = $_GET['id_produkmasuk'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_produkmasuk WHERE id_produkmasuk='$id_produkmasuk'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateprodukmasuk') {
    $id_produkmasuk = $_POST['id_produkmasuk'];
    $id_pekerja = $_POST['id_pekerja'];
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $tgl_masuk = $_POST['tgl_masuk'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_produkmasuk SET id_pekerja='$id_pekerja' , id_produk='$id_produk' , jumlah='$jumlah' , tgl_masuk='$tgl_masuk' WHERE id_produkmasuk='$id_produkmasuk' ");

    $stok = mysqli_query($koneksi, "SELECT * FROM tabel_produk JOIN tabel_produkmasuk ON tabel_produk.Id_Produk = tabel_produkmasuk.id_produk WHERE Id_Produk='$id_produk'");
    $stok = mysqli_fetch_array($stok);
    $stok = $stok['Stok'] - $stok['jumlah'];

    if ($queryupdate) {
        # credirect ke page index
        $stok_sisa = $stok['Stok'] + $jumlah;
        $update_stok = mysqli_query($koneksi, "UPDATE tabel_produk SET Stok='$stok_sisa' WHERE Id_Produk='$id_produk'");
        header("location:../transaksi-produkmasuk.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

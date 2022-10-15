<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahbahanmasuk') {
    $id_bahanmasuk = $_POST['id_bahanmasuk'];
    $id_bahan = $_POST['id_bahan'];
    $id_supplier = $_POST['id_supplier'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];
    $tgl_masuk = $_POST['tgl_masuk'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_bahanmasuk (id_bahanmasuk, id_bahan, id_supplier, jumlah, harga, total, tgl_masuk) VALUES('$id_bahanmasuk' , '$id_bahan' , '$id_supplier' , '$jumlah' , '$harga' , '$total' , '$tgl_masuk')");

    $stok = mysqli_query($koneksi, "SELECT * FROM tabel_bahanbaku WHERE Id_Bahan='$id_bahan'");
    $stok = mysqli_fetch_array($stok);

    if ($querytambah) {
        # code redicet setelah insert ke index
        $stok_sisa = $stok['Stok_Bahan'] + $jumlah;
        $update_stok = mysqli_query($koneksi, "UPDATE tabel_bahanbaku SET Stok_Bahan='$stok_sisa' WHERE id_bahan='$id_bahan'");
        header("location:../transaksi-bahanmasuk.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deletebahanmasuk') {
    $id_bahanmasuk = $_GET['id_bahanmasuk'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_bahanmasuk WHERE id_bahanmasuk='$id_bahanmasuk'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatebahanmasuk') {
    $id_bahanmasuk = $_POST['id_bahanmasuk'];
    $id_bahan = $_POST['id_bahan'];
    $id_supplier = $_POST['id_supplier'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];
    $tgl_masuk = $_POST['tgl_masuk'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_bahanmasuk SET id_bahan='$id_bahan' , id_supplier='$id_supplier' , jumlah='$jumlah' , harga='$harga' , total='$total' , tgl_masuk='$tgl_masuk' WHERE id_bahanmasuk='$id_bahanmasuk' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../transaksi-bahanmasuk.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

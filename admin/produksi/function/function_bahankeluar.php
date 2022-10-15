<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahbahankeluar') {
    $id_bahankeluar = $_POST['id_bahankeluar'];
    $id_bahan = $_POST['id_bahan'];
    $id_pegawai = $_POST['id_pegawai'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_keluar = $_POST['tgl_keluar'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_bahankeluar (id_bahankeluar, id_bahan, id_pegawai, jumlah, deskripsi, tgl_keluar) VALUES('$id_bahankeluar' , '$id_bahan' , '$id_pegawai' , '$jumlah' , '$deskripsi' , '$tgl_keluar')");

    $stok = mysqli_query($koneksi, "SELECT * FROM tabel_bahanbaku WHERE Id_Bahan='$id_bahan'");
    $stok = mysqli_fetch_array($stok);

    if ($querytambah) {
        # code redicet setelah insert ke index
        $stok_sisa = $stok['Stok_Bahan'] - $jumlah;
        $update_stok = mysqli_query($koneksi, "UPDATE tabel_bahanbaku SET Stok_Bahan='$stok_sisa' WHERE Id_Bahan='$id_bahan'");
        header("location:../transaksi-bahankeluar.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deletebahankeluar') {
    $id_bahankeluar = $_GET['id_bahankeluar'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_bahankeluar WHERE id_bahankeluar='$id_bahankeluar'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatebahankeluar') {
    $id_bahankeluar = $_POST['id_bahankeluar'];
    $id_bahan = $_POST['id_bahan'];
    $id_pegawai = $_POST['id_pegawai'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_keluar = $_POST['tgl_keluar'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_bahankeluar SET id_bahan='$id_bahan' , id_pegawai='$id_pegawai' , jumlah='$jumlah' , deskripsi='$deskripsi' , tgl_keluar='$tgl_keluar' WHERE id_bahankeluar='$id_bahankeluar' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../transaksi-bahankeluar.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

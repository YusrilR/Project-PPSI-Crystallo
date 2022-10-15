<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahadmin') {
    $id = $_POST['id'];
    $nama_pekerja = $_POST['nama_pekerja'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];


    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_pekerja (id_pekerja, nama_pekerja, alamat_pekerja, no_telp_pekerja) VALUES('$id' , '$nama_pekerja' , '$alamat','$no_telp')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-pekerjaproduksi.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deleteadmin') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_pekerja WHERE Id_pekerja = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateadmin') {
  $id = $_POST['id'];
  $nama_pekerja = $_POST['nama_pekerja'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_pekerja SET Nama_pekerja='$nama_pekerja' , Alamat_pekerja='$alamat',No_Telp_Pekerja='$no_telp' WHERE Id_pekerja='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-pekerjaproduksi.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahadmin') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tabel_user (username, password, level) VALUES('$username' , '$password' , '$level')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-admin.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['delete'] == 'deleteadmin') {
    $username = $_GET['username'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tabel_user WHERE username = '$username'");

    if ($querydelete) {
        # redirect ke index.php
        // header("location:../tabel-pengumuman.php");
        // return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateadmin') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tabel_user SET password='$password' , level='$level' WHERE username='$username' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-admin.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

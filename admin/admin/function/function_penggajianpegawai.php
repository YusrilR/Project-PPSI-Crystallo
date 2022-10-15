<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahpenggajian') {
    $Id_PenggajianPegawai = $_POST['Id_PenggajianPegawai'];
    $Id_Pegawai = $_POST['Id_Pegawai'];
    $Id_Gaji = $_POST['Id_Gaji'];
    $Tgl_PenggajianPegawai = $_POST['Tgl_PenggajianPegawai'];
    $Jumlah_Kehadiran = $_POST['Jumlah_Kehadiran'];
    $Grand_Total = $_POST['Grand_Total'];
    $ApprovalPegawai_Keuangan = $_POST['ApprovalPegawai_Keuangan'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO penggajian_pegawai 
    (Id_PenggajianPegawai, Id_Pegawai, Id_Gaji, Tgl_PenggajianPegawai, Jumlah_Kehadiran, Grand_Total, ApprovalPegawai_Keuangan	) 
    VALUES
    ('$Id_PenggajianPegawai' , '$Id_Pegawai' , '$Id_Gaji' , '$Tgl_PenggajianPegawai' , '$Jumlah_Kehadiran' , '$Grand_Total' , '$ApprovalPegawai_Keuangan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../penggajian-pegawai.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletepenggajian') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM penggajian_pegawai WHERE Id_PenggajianPegawai = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../penggajian-pegawai.php");
        return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatepenggajian') {
    $Id_PenggajianPegawai = $_POST['Id_PenggajianPegawai_edit'];
    $Id_Pegawai = $_POST['Id_Pegawai_edit'];
    $Id_Gaji = $_POST['Id_Gaji_edit'];
    $Tgl_PenggajianPegawai = $_POST['Tgl_PenggajianPegawai_edit'];
    $Jumlah_Kehadiran = $_POST['Jumlah_Kehadiran_edit'];
    $Grand_Total = $_POST['Grand_Total_edit'];
    $ApprovalPegawai_Keuangan = $_POST['ApprovalPegawai_Keuangan_edit'];

    // var_dump($Grand_Total);

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE penggajian_pegawai SET 
    Id_Pegawai='$Id_Pegawai', 
    Id_Gaji='$Id_Gaji' , 
    Tgl_PenggajianPegawai='$Tgl_PenggajianPegawai', 
    Jumlah_Kehadiran='$Jumlah_Kehadiran' , 
    Grand_Total='$Grand_Total', 
    ApprovalPegawai_Keuangan='$ApprovalPegawai_Keuangan' 
    WHERE Id_PenggajianPegawai='$Id_PenggajianPegawai' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../penggajian-pegawai.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

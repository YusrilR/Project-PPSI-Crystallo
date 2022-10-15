<?php

include "koneksi.php";

if ($_GET['act'] == 'tambahpenggajian') {
    $Id_PenggajianPekerja = $_POST['Id_PenggajianPekerja'];
    $Id_Pekerja = $_POST['Id_Pekerja'];
    $Id_Gaji = $_POST['Id_Gaji'];
    $Tgl_PenggajianPekerja = $_POST['Tgl_PenggajianPekerja'];
    $Jumlah_Produksi = $_POST['Jumlah_Produksi'];
    $Grand_Total = $_POST['Grand_Total'];
    $ApprovalPekerja_Keuangan = $_POST['ApprovalPekerja_Keuangan'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO penggajian_pekerja 
    (Id_PenggajianPekerja, Id_Pekerja, Id_Gaji, Tgl_PenggajianPekerja, Jml_Produksi, Grand_Total, ApprovalPekerja_Keuangan	) 
    VALUES
    ('$Id_PenggajianPekerja' , '$Id_Pekerja' , '$Id_Gaji' , '$Tgl_PenggajianPekerja' , '$Jumlah_Produksi' , '$Grand_Total' , '$ApprovalPekerja_Keuangan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../penggajian-pekerjaproduksi.php");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deletepenggajian') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM penggajian_pekerja WHERE Id_PenggajianPekerja = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../penggajian-pekerjaproduksi.php");
        return json_encode(array('sukses' => '1'));
        echo 'succes';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updatepenggajian') {
    $Id_PenggajianPekerja = $_POST['Id_PenggajianPekerja'];
    $Id_Pekerja = $_POST['Id_Pekerja'];
    $Id_Gaji = $_POST['Id_Gaji'];
    $Tgl_PenggajianPekerja = $_POST['Tgl_PenggajianPekerja'];
    $Jumlah_Produksi = $_POST['Jumlah_Produksi_edit'];
    $Grand_Total = $_POST['Grand_Total_edit'];
    $ApprovalPekerja_Keuangan = $_POST['ApprovalPekerja_Keuangan'];
    // var_dump($Grand_Total);

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE penggajian_pekerja SET 
    Id_Pekerja='$Id_Pekerja', 
    Id_Gaji='$Id_Gaji' , 
    Tgl_PenggajianPekerja='$Tgl_PenggajianPekerja', 
    Jml_Produksi='$Jumlah_Produksi' , 
    Grand_Total='$Grand_Total', 
    ApprovalPekerja_Keuangan='$ApprovalPekerja_Keuangan' 
    WHERE Id_PenggajianPekerja='$Id_PenggajianPekerja' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../penggajian-pekerjaproduksi.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
}

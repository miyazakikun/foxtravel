<?php
session_start();
include '../connection/koneksi.php';

$pesawat = $_POST["pesawat"];
$tglberangkat = $_POST["tglberangkat"];
$jamberangkat = $_POST["jamberangkat"];
$tujuan = $_POST["tujuan"];
$kouta = $_POST["kouta"];
$harga = $_POST["harga"];

$sql = "INSERT INTO pesawat (pesawat,jam,tanggal,tujuan,harga,kuota) VALUES ('".$pesawat."','".$jamberangkat."','".$tglberangkat."','".$tujuan."','".$harga."','".$kouta."')";

// die(mysqli_error($mysqli));
if (!mysqli_query($mysqli,$sql))
{
  //die(mysqli_error($mysqli));
  header("location:../halaman_depan.php?result=Tambah Gagal");
}
  else {
    //die(mysqli_error($mysqli));
    header("location:../halaman_depan.php?result=Tambah Sukses ");
  }



 ?>

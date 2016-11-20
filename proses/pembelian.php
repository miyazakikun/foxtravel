<?php
session_start();
include '../connection/koneksi.php';

$pesawatid = $_GET["id"];
$userid = $_SESSION["id"];



$sql = "INSERT INTO cart (pesawat_id,pengguna_id) VALUES ('".$pesawatid."','".$userid."')";

// die(mysqli_error($mysqli));
if (!mysqli_query($mysqli,$sql))
{
  header("location:../halaman_depan.php?result=Pembelian Gagal");
}
  else {
    header("location:../halaman_depan.php?result=Pembelian Sukses ");
  }
  ?>

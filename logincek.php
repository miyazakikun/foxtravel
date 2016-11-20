<?php
session_start();

include ("connection/koneksi.php");
$us = htmlspecialchars($_POST['username'],ENT_QUOTES);
$us1 = stripslashes(strip_tags($us));
$username = $mysqli->real_escape_string($us1);
$password = $_POST['password'];

$cek      = $mysqli->query("select * from pengguna where username='$username' and password='$password'");
$data     = $cek->fetch_array();
$jumlah   = $cek->num_rows;

if ($jumlah > 0) {

$_SESSION['id'] = $data['id'];
$_SESSION['username'] = $data['username'];
$_SESSION['password'] = $data['password'];
$_SESSION['level'] = $data['level'];
header("location:halaman_depan.php");
}
else {
  header("location:login.php?info=Login Gagal");
}

?>

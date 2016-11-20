<?php
session_start();
include '../connection/koneksi.php';

mysqli_query($mysqli,"delete from pesawat where id='$_GET[id]'") or die(mysqli_error($mysqli));
header('Location:../halaman_depan.php?result=Hapus Berhasil');
 ?>

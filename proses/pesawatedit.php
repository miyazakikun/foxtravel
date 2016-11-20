<?php
session_start();
include '../connection/koneksi.php';

$mysqli->query("UPDATE pesawat SET
		pesawat='$_POST[pesawat]',
		tanggal='$_POST[tglberangkat]',
		jam='$_POST[jamberangkat]',
    tujuan='$_POST[tujuan]',
    kuota='$_POST[kouta]',
    harga='$_POST[harga]'
	WHERE id='$_POST[id]'") or die($mysqli->error);
  header("location:../halaman_depan.php?result=Edit Berhasil");
  ?>

<?php
session_start();
include '../connection/koneksi.php';

if ($_GET['result'] == 'terima') {
  # code...
  $kodebooking = $_POST['kodebooking'];
  $mysqli->query("UPDATE pembelian set
  kode = '$kodebooking',
  status = 'diterima'
  where
  id = '$_POST[pembelian_id]'
  ");
  $pesawat = $mysqli->query("SELECT *from pesawat where id = '$_POST[pesawat_id]' ");
  $data = $pesawat->fetch_array();
  $datakuota = $data['ambilkuota']+1;
  if ($mysqli->query("UPDATE pesawat set ambilkuota = '$datakuota' where id = '$_POST[pesawat_id]'")) {
    header("location:../halaman_depan.php?halaman=pembelian");
  }else {
    die(mysqli_error($mysqli));
    echo "gagal";
  }
}else {
  $mysqli->query("UPDATE pembelian set status = 'ditolak' where id = '$_GET[pembelian_id]'") or die($mysqli->error());
    header("location:../halaman_depan.php?halaman=pembelian");
}
 ?>

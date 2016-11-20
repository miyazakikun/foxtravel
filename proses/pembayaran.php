<?php
session_start();
include '../connection/koneksi.php';
require '../vendor/autoload.php';
use Intervention\Image\ImageManager;
use Carbon\Carbon;
$id = $_SESSION['id'];
$file 	= $_FILES['gambarPembayaran'];
$filename 	= $_FILES['gambarPembayaran']['name'];
$filealamat 	= $_FILES['gambarPembayaran']['tmp_name'];
$tipe_gambar	= $_FILES['gambarPembayaran']['type'];
$total = $_POST['total'];
$manager = new ImageManager(array('driver' => 'gd'));
$fileName = 'buktipembayaran_'.rand(111111111,999999999).$filename;
$formid = rand(123789,456012);
$gambar =  $manager->make($filealamat);
$path = '../img/bukti/'.$fileName;
$gambar->save($path);




$sql = "INSERT INTO pembayaran (pengguna_id,formid,tandabukti,total) VALUES ('".$_SESSION['id']."','".$formid."','".$fileName."','".$total."')";
// die(mysqli_error($mysqli));
if (!mysqli_query($mysqli,$sql))
{
  header("location:../halaman_depan.php?result=Pembelian Gagal");
}
  else {

    $cartcek = mysqli_query($mysqli,"SELECT * from cart where pengguna_id = '$id' AND status = 'aktif'");
    $row = mysqli_num_rows($cartcek);
    //or die(mysqli_error($mysqli)
  //   if($datacart == FALSE) {
  //   die(mysqli_error($mysqli));
  // }
    while ($datacart = mysqli_fetch_array($cartcek))
    {
      $bayar = mysqli_query($mysqli,"SELECT * from pembayaran where formid = '$formid' ");
      $databayar = mysqli_fetch_array($bayar);
      $sqllanjut = "INSERT INTO pembelian (pembayaran_id,pesawat_id,formid) VALUES ('".$databayar['id']."','".$datacart['pesawat_id']."','".$databayar['formid']."')";
      mysqli_query($mysqli,$sqllanjut) or die(mysqli_error($mysqli));

      echo $row;
    }
    if (mysqli_query($mysqli,"UPDATE cart SET status='mati' WHERE pengguna_id='$id' AND status = 'aktif' ")) {
      header("location:../halaman_depan.php?result=Pembelian Sukses ");
    }else {
      header("location:../halaman_depan.php?result=Pembelian Gagal");
    }

  }





  ?>

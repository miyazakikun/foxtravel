<?php


include 'connection/koneksi.php';



$nama = $_POST["nama"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$alamat   = $_POST["alamat"];
$no     = $_POST["no"];
if ($username == "" || $password == "") {
  header("location:login.php?info=register gagal Username atau Password tidak boleh kosong!");
}else {
if(isset($_POST['submit'])){

$sql = "INSERT INTO pengguna (nama,username,email,password,alamat,no) VALUES ('".$nama."','".$username."','".$email."','".$password."','".$alamat."','".$no."')";

if (!mysqli_query($mysqli,$sql))
{

  echo "gagal input data";}

  else {
    $registrasi = 'registrasi berhasil';
    header("location:login.php?info=registrasi berhasil");
  }
  }
  }
 ?>

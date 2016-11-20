<?php
include 'connection/koneksi.php';


 ?>
<html>
  <head>
    <title>Form Pendaftaran Online</title>
  </head>
  <body>
    <form action="" method="POST">
      <div class="panel-body">
        <form class="form-horizontal" action="" method="POST" role="form">
          <div class="form-group">
            <div class="col-sm-2">
              <label for="nama" class="control-label">Nama</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control"  placeholder="Nama" name="nama">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2">
              <label for="email" class="control-label">Email</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control"  placeholder="Email" name="email">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-2">
              <label for="username" class="control-label">Username</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control"  placeholder="Email" name="username">
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-2">
              <label for="password" class="control-label">Password</label>
            </div>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-2">
              <label for="alamat" class="control-label">Alamat</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Email" name="alamat">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-2">
              <label for="no" class="control-label">Nomor Telepon</label>
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control"  placeholder="Nomor Telepon" name="no">
            </div>
          </div>

      <input type="submit" name="submit" value="DAFTAR">
    </form>

<?php

include 'connection/koneksi.php';
$nama = $_POST["nama"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

if(isset($_POST['submit'])){

$sql = "INSERT INTO user (nama,username,email,password) VALUES ('".$nama."','".$username."','".$email."','".$password."')";

if (!mysqli_query($mysqli,$sql))
{

  echo "gagal input data";}

  else {
    echo "berhasil";
  }
  }



 ?>


  </body>
</html>

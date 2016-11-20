<?php
 session_start();
 include '../connection/koneksi.php';
 $id = $_SESSION['id'];
 ?>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
    rel="stylesheet" type="text/css">
  </head>

  <body>
    <?php if (!empty($_SESSION['id'])): ?>

    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Brand</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <a href="home.php">Beranda</a>
            </li>
            <li>
              <a href="#">About Me </a>
            </li>
            <li>
              <a href="pembelian.php">Cart <span class="fa fa-cart">
                <?php
                $cek = mysqli_query($mysqli,"SELECT *from cart where status = 'aktif' AND pengguna_id = '$_SESSION[id]' ");
                $row = mysqli_num_rows($cek);
                if ($row > 0) {
                  # code...
                  echo '('.$row.')';
                }
                 ?>
              </span></a>
            </li>
            <li>
              <a href="historypembelian.php">Pembelian <span class="fa fa-cart">

              </span></a>
            </li>
            <li>
              <a href="#">Cara Pembelian Tiket</a>
            </li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title text-center">List Pembelian</h3>
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>

                      <th>Nama Pesawat</th>
                      <th>Tujuan Pesawat</th>
                      <th>Tanggal Berangkat</th>
                      <th>Jam Berangkat</th>
                      <th>Harga Tiket</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      $tampil = $mysqli->query("SELECT pesawat.pesawat,pesawat.harga,pesawat.tujuan,pesawat.jam,pesawat.tanggal,cart.* FROM cart
                        JOIN pesawat
                        ON cart.pesawat_id=pesawat.id
                      where
                      cart.pengguna_id = '$_SESSION[id]'
                      AND
                      cart.status = 'aktif'
                      AND
                      cart.pesawat_id = pesawat.id
                      ") or die($mysqli->error);

                      $carisum = $mysqli->query("SELECT pesawat.pesawat,
                        pesawat.harga,
                        pesawat.tujuan,
                        pesawat.jam,
                        pesawat.tanggal,
                        cart.*,
                        SUM(pesawat.harga) as kucing FROM cart JOIN pesawat
                        ON cart.pesawat_id=pesawat.id
                      where
                      cart.pengguna_id = '$_SESSION[id]'
                      AND
                      cart.status = 'aktif'
                      AND
                      cart.pesawat_id = pesawat.id") or die($mysqli->error);
                      $cekharga = $carisum->fetch_array();
                    ?>
                    <?php while ($data=$tampil->fetch_array()) {?>

                        <tr class="text-center">
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['pesawat'] ?></td>
                          <td><?php echo $data['tujuan'] ?></td>
                          <td><?php echo $data['tanggal'] ?></td>
                          <td>
                            <?php echo $data['jam'] ?>
                          </td>
                          <td>
                            <?php echo $data['harga'] ?>
                          </td>
                        </tr>

                  <?php
                  } ?>
                  </tbody>
                </table>
              </div>
              <div class="panel-footer text-right">
                <a data-toggle="modal" href="#myModal" class="btn btn-lg btn-primary"><span class="fa fa-shopping-cart"> Pembayaran <?php echo $cekharga['kucing'] ?> IDR</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pembelian</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="../proses/pembayaran.php" enctype="multipart/form-data">
          <ul class="list-group">
            <li class="list-group-item">Mandiri : 14123123123<span class="badge">Active</span></li>
            <li class="list-group-item">BRI : 14123123123<span class="badge">Active</span></li>
            <li class="list-group-item">BNI : 14123123123<span class="badge">Active</span></li>
          </ul>
          <fieldset class="form-group">
            <label for="exampleInputFile">Foto Bukti Pembayaran</label>
            <input type="file" class="form-control-file" accept=".jpg, .png, .gif, ,image/" name="gambarPembayaran">
            <small class="text-muted">Masukan Foto Bukti Transfer</small>
          </fieldset>
          <input type="hidden" name="total" value="<?php echo $cekharga['kucing'] ?>">
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
        </div>
    </div>

  </div>
</div>
  <?php else: ?>
    <?php include 'view/404.php'; ?>
  <?php endif; ?>
  </body>

</html>

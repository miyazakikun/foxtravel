<div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span>Fox Travel</span></a>
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
          <a href="view/pembelian.php">Cart <span class="fa fa-cart">
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
          <a href="view/historypembelian.php">Pembelian <span class="fa fa-cart">

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
        <img src="fox.jpg" class="center-block img-thumbnail img-responsive" width="250">
        <div class="text-center">Fox Travel Penjualan Tiket Khusus Bandara Temindung</div>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title text-center">Fox Travel Tiket</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="text-center">
                <?php if (!empty($_GET['result'])): ?>
                <div class="alert alert-success">
                  <?php echo $_GET{'result'} ?>
                </div>
              <?php endif; ?>
              </div>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-4">
              <form role="form" action="view/caritiket.php" method="GET">
                <input type="hidden" name="asal" value="samarinda">

                <div class="form-group">
                  Kota Tujuan
                    <select name="tujuan" class="form-control">
                      <option value="">Masukkan Tujuan</option>
                      <option value="berau">Berau</option>
                      <option value="balikpapan">Balikpapan</option>
                      <option value="kubar">Kubar</option>
                      <option value="melinau">Melinau</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  Tanggal Berangkat
                  <input class="form-control" name="tglberangkat" id="exampleInputEmail1" placeholder="Tanggal Berangkat" type="date">
                </div>
                <button type="submit" class="btn btn-default">Cari Tiket</button>
            </div>

          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="section section-primary">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Fox Travel</h1>
        <p>Di buat Untuk Memenuhi Tugas Basis Data Lanjut
          <br>Credit By :
          <br>Yonatan Suhariyadi &amp; Azhar Yuda Pratama</p>
      </div>
      <div class="col-sm-6">
        <p class="text-info text-right">
          <br>
          <br>
        </p>
        <div class="row">
          <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
            <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
            <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
            <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
            <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 hidden-xs text-right">
            <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
            <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
            <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
            <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

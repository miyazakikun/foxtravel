
<?php
include 'connection/koneksi.php';
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
              <a href="login.php">Login</a>
            </li>
            <li>
              <a href="#">Cara Pembelian Tiket</a>
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
                <h3 class="panel-title text-center">Daftar User</h3>
              </div>
              <div class="panel-body">
                <form class="form-horizontal" action="prosesdaftar.php" method="POST" role="form">
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="nama" class="control-label">Nama</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  placeholder="Nama" name="nama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="email" class="control-label">Email</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="email" class="form-control"  placeholder="Email" name="email" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="username" class="control-label">Username</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  placeholder="Username" name="username" >
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
                      <textarea class="form-control" rows="3" name="alamat"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="no" class="control-label">Nomor Telepon</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="number" class="form-control"  placeholder="Nomor Telepon" name="no">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="submit" values="daftar">Daftar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




  </body>

</html>

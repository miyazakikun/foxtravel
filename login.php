<?php
session_start();
if (!empty($_SESSION['id']));
?>
<!DOCTYPE html>
<html lang="en">

<!-- HEAD-->

<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Fox Travel</span><br></a>
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
              <a href="daftar.php">Daftar</a>
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
            <div class="btn-link panel panel-danger">
              <div class="panel-heading">
                <h1 class="panel-title text-center">Halaman Login</h1>
              </div>
              <div class="bg-info">
                <div class="row">
                  <div class="text-center">
                    <?php if (!empty($_GET['info'])): ?>
                      <?php echo $_GET['info']; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <form class="form-group" method="POST" action="logincek.php" >
								<div>
									<input class="form-control" type="text" name="username" placeholder="masukkan username">
								</div>
								<br>
								<div>
									<input class="form-control" type="password" name="password" placeholder="masukkan password">
								</div>
								<hr>
								<div class="text-right">
									<input class="btn btn-primary" type="submit" name="submit" value="Masuk">
								</div>
							</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</body></html>

<?php
 session_start();
 include '../connection/koneksi.php';
 $id = $_GET['id'];
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
    <?php if (!empty($_SESSION['id']) && $_SESSION['level'] == "admin"): ?>


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
              <li>
                <a href="../logout.php">logout</a>
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
                  <h3 class="panel-title text-center">

                    Edit

                   Data Pesawat</h3>
                </div>
                <?php
                $sql = mysqli_query($mysqli,"SELECT * FROM pesawat WHERE id='$id'") or die(mysqli_error($mysqli));
                $data  	= $sql->fetch_array();
                 ?>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="../proses/pesawatedit.php">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                      <div class="col-sm-2">
                        <label for="inputEmail3" class="control-label">Nama Pesawat</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" name="pesawat" placeholder="Nama Pesawat" value="<?php echo $data['pesawat'] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2">
                        <label for="inputPassword3" class="control-label">Tanggal Berangkat</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputPassword3" name="tglberangkat" placeholder="Tanggal Berangkat" value="<?php echo $data['tanggal'] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2">
                        <label for="inputPassword3" class="control-label">Jam Berangkat</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="time" class="form-control" id="inputPassword3" name="jamberangkat" placeholder="Jam Berangkat" value="<?php echo $data['jam'] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2">
                        <label for="inputPassword3" class="control-label">Tujuan</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="tujuan" placeholder="Tujuan" value="<?php echo $data['tujuan'] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2">
                        <label for="inputPassword3" class="control-label">Kuota Pesawat</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputPassword3" name="kouta" placeholder="Kuota Pesawat" value="<?php echo $data['kuota'] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2">
                        <label for="inputPassword3" class="control-label">Harga</label>
                      </div>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputPassword3" name="harga" placeholder="Harga" value="<?php echo $data['harga'] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Proses</button>
                        <a href="../halaman_depan.php?" class="btn btn-danger">Kembali</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php else: ?>
        <?php include '404.php'; ?>
    <?php endif; ?>
  </body>

</html>

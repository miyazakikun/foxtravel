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
              <a href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Panel Options</h3>
              </div>
              <div class="panel-body">
                <a class="btn btn-primary" href="halaman_depan.php">Kembali<br></a>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Penerbangan Pesawat
                  <br>
                </h3>
              </div>
              <div class="panel-body">
                <!-- <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukan Pencarian">
                        <span class="input-group-btn">
                          <a class="btn btn-success" type="submit">Search</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div> -->
                <?php if (!empty($_GET['result'])): ?>
                  <div class="alert alert-dismissable alert-success">
                    <strong><?php echo $_GET['result'] ?></strong></div>
                <?php endif; ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Pesawat</th>
                      <th>
                        Tanggal Berangkat
                      </th>
                      <th>Jam Berangt</th>
                      <th>Tujuan</th>
                      <th>
                        Kouta Pesawat
                      </th>
                      <th>
                        Harga
                      </th>
                      <th>
                        Edit Penerbangan
                      </th>
                      <th>
                        Hapus Penerbangan
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      $tampil = $mysqli->query("SELECT * FROM pesawat where status != 'Aktif'") or die($mysqli->error);
                    ?>
                    <?php while ($data=$tampil->fetch_array()) {?>
                    <tr class="text-center">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['pesawat'] ?></td>
                      <td><?php echo $data['tanggal'] ?></td>
                      <td>
                        <?php echo $data['jam'] ?>
                      </td>
                      <td><?php echo $data['tujuan'] ?></td>
                      <td>
                        <?php echo $data['ambilkuota']."/".$data['kuota']; ?>
                      </td>
                      <td>
                        <?php echo $data['harga'] ?>
                      </td>
                      <td>
                        <a href="view/admineditpesawat.php?id=<?php echo $data['id'] ?>" class="btn btn-danger"><span class="fa fa-pencil"></span></a>
                      </td>
                      <td>
                        <a href="proses/pesawatdelete.php?id=<?php echo $data['id'] ?>" class="btn btn-warning"><span class="fa fa-trash-o"></span></a>
                      </td>
                    </tr>
                  <?php
                  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

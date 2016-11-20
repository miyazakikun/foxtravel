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

          <div class="col-md-2">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Panel Options</h3>
              </div>
              <div class="panel-body">
                <a class="btn btn-primary" href="halaman_depan.php">Kembali<br></a>
              </div>
            </div>
          </div>
          <div class="col-md-10">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">List Pembelian
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
                      <th>No</th>
                      <th>Formid</th>
                      <th>Nama Pesawat</th>
                      <th>Tujuan Pesawat</th>
                      <th>Tanggal Berangkat</th>
                      <th>Jam Berangkat</th>
                      <th>Bukti Pembayaran</th>
                      <th>Harga Tiket</th>
                      <th>Kode Booking</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      $tampil = $mysqli->query("SELECT pesawat.pesawat,
                        pesawat.harga,
                        pesawat.tujuan,
                        pesawat.jam,
                        pesawat.tanggal,
                        pembayaran.formid,
                        pembayaran.tandabukti,
                        pembayaran.total,
                        pembayaran.created_at,
                        pembelian.* FROM pembelian
                        JOIN pesawat
                        ON pembelian.pesawat_id = pesawat.id
                        JOIN pembayaran
                        ON pembelian.pembayaran_id = pembayaran.id
                        where
                        pembelian.status = 'menunggu'
                      ") or die($mysqli->error);


                    ?>

                    <?php while ($data=$tampil->fetch_array()) {?>
                        <tr class="text-center">
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['formid'] ?></td>
                          <td><?php echo $data['pesawat'] ?></td>
                          <td><?php echo $data['tujuan'] ?></td>
                          <td><?php echo $data['tanggal'] ?></td>
                          <td>
                            <?php echo $data['jam'] ?>
                          </td>
                          <td>
                          <a class="fancybox btn btn-default" href="img/bukti/<?php echo $data['tandabukti'] ?>" >Bukti
                            <a class="fancybox" rel="group" href="img/bukti/<?php echo $data['tandabukti'] ?>"></a>
                          </a>

                          </td>
                          <td>
                            <?php echo $data['harga'] ?>
                          </td>
                          <form role="form" action="proses/pembelianticket.php?result=terima" method="POST">
                          <td>
                            <input type="hidden" name="pembelian_id" value="<?php echo $data['id'] ?>">
                            <input type="hidden" name="pesawat_id" value="<?php echo $data['pesawat_id'] ?>">
                            <input class="form-control" name="kodebooking" id="exampleInputEmail1" placeholder="Masukan Kode Booking" type="text">
                            <div class="text-muted">
                              Masukan bila diterima
                            </div>
                          </td>
                          <td>
                            <button data-toggle="tooltip" data-placement="top" title="Terima" type="submit" class="btn btn-primary"><span class="fa fa-check"></span></button>
                            <a data-toggle="tooltip" data-placement="top" title="Tolak"
                            href="proses/pembelianticket.php?result=tolak&pembelian_id=<?php echo $data['id']; ?>"
                            class="btn btn-danger"><span class="fa fa-trash-o">
                            </span></a>
                          </td>
                        </form>
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

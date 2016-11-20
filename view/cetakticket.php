<?php
 session_start();
 include '../connection/koneksi.php';
 require '../vendor/autoload.php';
 use Carbon\Carbon;

 $id = $_SESSION['id'];
 $idpembelian = $_GET['pembelian_id'];
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
   pembelian.id = '$idpembelian'
 ") or die($mysqli->error);
 $user = $mysqli->query("SELECT * from pengguna where id = '$id' ");

$databeli = $tampil->fetch_array();
$pesawat = $mysqli->query("SELECT * from pesawat where id = '$databeli[pesawat_id]' ");
$datauser = $user->fetch_array();
$datapesawat = $pesawat->fetch_array();

 ?>
  <html><head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head><body>
 <script type="text/javascript">
   window.print();
 </script>
 <div class="row">
   <div class="container-fluid">
     <br><br>
     <img src="../fox.jpg" class="center-block img-thumbnail img-responsive" width="250">
     <div class="text-center"><h1>Fox Travel Penjualan Tiket Khusus Bandara Temindung</h1></div>
     <div class="col-md-6 col-md-offset-3">

       <table class='table  table-bordered '>
         <thead>
           <tr align="center">
             <th colspan="4" >
               <div class="text-center">

                 Detail Ticket Booking
               </div>
             </th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>
               Customer
             </td>
             <td>
               <?php echo $datauser['username'] ?>
             </td>
             <td>
               Kode Booking
             </td>
             <td>
               <?php echo $databeli['kode'] ?>
             </td>
           </tr>
           <tr>
             <td>Pesawat</td>
             <td>
               <?php echo $datapesawat['pesawat']; ?>
             </td>
             <td>
               Keberangkatan
             </td>
             <td>
               <?php  Carbon::setLocale('id'); ?>
               <?php $dt=Carbon::parse($datapesawat['tanggal']. $datapesawat['jam']); ?>
               <?php echo $dt->toDayDateTimeString()  ?>
             </td>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
 </div>

  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>





  </body>
  </html>

<?php
 session_start();
 include 'connection/koneksi.php';
 $id = $_SESSION['id'];
 ?>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  </head><body>
<?php if (!empty($_SESSION['id'])): ?>
  <?php if ($_SESSION['level'] == "admin"): ?>
    <?php if (!empty($_GET['halaman'])): ?>
      <!-- admin route -->
      <?php if ($_GET['halaman'] == 'tidakaktif'): ?>
        <?php include 'view/homeadminhistory.php'; ?>
      <?php endif; ?>

      <?php if ($_GET['halaman'] == 'pembelian'): ?>
        <?php include 'view/pembelianticket.php'; ?>
      <?php endif; ?>

      <?php if ($_GET['halaman'] == 'historypembelian'): ?>
        <?php include 'view/historypembelianticket.php'; ?>
      <?php endif; ?>
      <!-- end adminr route -->
    <?php else: ?>
      <?php include 'view/homeadmin.php'; ?>
    <?php endif; ?>

  <?php else: ?>
    <?php include 'view/homeuser.php'; ?>
  <?php endif; ?>

<?php else: ?>
  <?php include 'view/404.php'; ?>
<?php endif; ?>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="js/app.js"></script>





</body>
</html>

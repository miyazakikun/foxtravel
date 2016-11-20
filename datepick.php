<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Datepicker Sederhana</title>
  <link rel="stylesheet" href="jquery-ui.css" type="text/css"/>
  <script src="jquery-1.10.2.js" type="text/javascript"></script>
  <script src="jquery-ui.js" type="text/javascript"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <style>
  body {
    background: #f5f5f5;
    margin: 0;
    padding: 20px 0 0 0;
    text-align: center;
    font-size: 16px;
  }
  h1 {
    color: #222;
    font-size: 24px;
  }
  </style>
</head>
<body>
<h1>jQuery UI DatePicker Sederhana</h1>
<form>
    <label>Tanggal: </label>
    <input type="text" id="datepicker" />
</form>

</body>
</html>

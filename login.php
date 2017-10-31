<?php
    session_start();
    require('connection.php');
    require('functs.php');

    $object = new resultChecker();
    $object->setDB($serverName,$serverDatabase,$serverUsername,$serverPassword);
    $object->getDB();
  

   if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
   {
      if(isset($_POST['regNumber']) && isset($_POST['pinNumber']))
      {
        $stdReg = strip_tags($_POST['regNumber']);
        $code = strip_tags($_POST['pinNumber']);

        $object->login($stdReg,$code);

      }
  }
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Result | login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  

  <style type="text/css">
  body{
    padding: 0;
    margin: 0;
    background: url('dist/img/student.png') no-repeat center center;
    -webkit-background-size:cover;
    -moz-background-size:cover;
    o-background-size:cover;
    background-size: cover;
    display: table;
    opacity: 0.8;
    width: 100%;
    height:100%;
    filter: alpha(opacity=60); /* For IE8 and earlier */
    font-weight: bold;
  }

  .navbar, a{
    color: #FFF;
  }
    .transbox{
      width: 700px;
      height:450px;
      background-color: #FFF;
      padding: 2%;
      margin: auto;
      margin-top: 5%
    }
    .btn-primary{
        padding:10px 20px;
        border-radius: 0;
        font-weight: 600;
        color:#FFF;
    }


    .footer{
      border-top: 1px solid #ccc;
    }
  </style>

</head>

<body>

  <nav id="mainNav" class="nav navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="index.php"></b>e</b>-Result</a>
      </div>
	  
    </div>
  </nav>
<div class="wrapper">
  <div class="transbox">
    <div class="col-md-12">

      <form class="" role="form" action="login.php" method="post">
        <h2><i class="fa fa-users"></i> e-Result Student Login</h2><br>
        <div class="alert alert-warning">Please, ensure your registration number and pin are correct</div>
        <div class="form-group has-feedback">
          <label for="text">Registration Number </label>
          <input type="text" name="regNumber" class="form-control" placeholder="Regno" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label for="text">Pin Code</label>
          <input type="text" name="pinNumber" class="form-control" placeholder="Enter your access pin code here" required>
          <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
        </div>
        <hr>

          <!-- /.col -->
          <div class="col-md-4 col-md-offset-4">
            <button type="submit" name="submit" class="btn btn-flat btn-primary btn-block btn-lg">View Result<span class="fa fa-check-circle"></span></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
  </div>

  <!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>

</body>
</html>

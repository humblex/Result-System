<?php
include('connection.php'); //database connection file 

  if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
  { 
  	//checks if field was filled
	if(isset($_POST['surname']) && isset($_POST['firstname']) && isset($_POST['othernames']) && isset($_POST['password']) && isset($_POST['emailaddress']))
	{
  
		    //insert data
	   $surname = $_POST['surname'];
	   $firstname = $_POST['firstname'];
	   $othernames = $_POST['othernames'];
	   $emailaddress = $_POST['emailaddress'];
	   $password = $_POST['password'];
	   
		    
		db_insert("INSERT INTO leturertable (surname,firstname,othernames,coursecode,emailaddress,password) 
		    	VALUES ('$surname','$firstname','$othernames','$coursecode','$emailaddress','$password')");
		   
			header('location:lecturerlogin.php');
   }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Result | Signup</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->

  <style type="text/css">
  body{
    padding: 0;
    margin: 0;
    background: url('dist/img/student.png') no-repeat center fixed;
    -webkit-background-size:cover;
    -moz-background-size:over;
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
      height:750px;
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
			background: red;
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
        <a class="navbar-brand" href="hero.php"><b>e</b>-Result</a>
      </div>

      </div>
  </nav>

<div class="wrapper">

  <div class="transbox">
    <div class="col-md-12">
    
	<form action="signup.php" method="post" class="sky-form boxed" validate="validate">
			  <header>Create Account</header>
			<h2><i class="fa fa-users"></i> Lecturer <small class="note bold">IT'S FREE</small></h2>
			
			<div class="alert alert-danger margin-bottom-30" hidden><!-- DANGER -->
				  <?php 
					  if(isset($_POST['submit']))
					  {
						if(isset($_POST['password']) == isset($_POST['confirmpassword']))
						{
						}
						else
						{
							echo "Password mismatch, try again!";
							header('location:signup.php');
						}
					  }
					?>
			</div>
			
				<label class="input"> Surname </label>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">
					<i class="glyphicon glyphicon-user"></i>
				  </span>
				  <input type="text" name="surname" class="form-control" placeholder="Enter your Surname" required>
				</div><br>

				<label class="input">Firstname</label>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">
					<i class="glyphicon glyphicon-user"></i>
				  </span>
				  <input type="text" name="firstname" class="form-control" placeholder="Enter your Firstname" required>
				</div><br>

				<label class="input">Othername </label>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">
					<i class="glyphicon glyphicon-user"></i>
				  </span>
				  <input type="text" name="othernames" class="form-control" placeholder="Enter your Othername" required>
				</div><br>
				
				<label for="Email">Email Address</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
				  <input type="text" name="emailaddress" class="form-control" placeholder="Email address" required>
				</div><br>

				<label class="input">Password</label>
				<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
				  <input type="password" name="password" class="form-control" placeholder="Password" required>
				  <b class="tooltip tooltip-bottom-right">password should be easily remembered</b>
				</div><br>

				<label class="input">Confirm Password</label>
				<div class="input-group">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
				  <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
				  <b class="tooltip tooltip-bottom-right">password should be easily remembered</b>
				</div><br>		
		<hr>
			  <button type="submit" name="submit" class="btn btn-primary btn-flat btn-block btn-lg "> Create Account &nbsp<span class="fa fa-check-circle"></span></button>

      </form>
    </div>
  </div>

  <!-- Control Sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>


</body>
</html>

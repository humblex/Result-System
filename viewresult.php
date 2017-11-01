<?php
    session_start();
    $std = $_SESSION["student"];

    require('connection.php');
    require('functs.php');

    $obj = new resultChecker();
    $obj->setDB($serverName,$serverDatabase,$serverUsername,$serverPassword);
    $obj->getDB();
    
    $students = $obj->fetchingStudents(); //fetches all students
    
    foreach ($students as $person) {
      if($person["reg_number"] == $std){
         $student_name = $person["std_name"];
      }
    }


  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Result | Processing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  

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
          height:650px;
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
        <a class="navbar-brand" href="index.php"><b>e</b>-Result</a>
      </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav pull-right">
                <li class="dropdown"> <a class="dropdown-toggle"  href="logout.php">LOGOUT</a>
                </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
  </nav>

<div class="wrapper">

  <div class="transbox">
    <div class="col-md-12">
    
	<form action="viewresult.php" method="post" class="sky-form boxed" novalidate="novalidate">
                <div class="nav navbar-nav pull-right">
                  <img src="images/unn.jpg" width="120" height="100"/><br/><br/>
                </div>
                  <h3><b>CANDIDATE RESULT SHEET</b></h3>
      
                  <strong>Name:</strong> <?php echo "$student_name";?><br/>
                  <strong>Reg. Number:</strong> <?php echo "$std";?><br/>

                  <br/><br/>

                <div class="row">

                        <div class="col-md-4">
                            <th>COURSE</th>
                        </div>
                        <div class="col-md-2">
                            <th>CA SCORE</th>
                        </div>
                        <div class="col-md-2">
                            <th>EXAM SCORE</th>
                        </div>
                        <div class="col-md-2">
                            <th>TOTAL SCORE</th>
                        </div>
                        <div class="col-md-2">
                            <th>LETTER GRADE</th>
                        </div>
                </div>
                      <hr/>

                      <br/>

               <?php $obj->fetchingResults($std); //fetches results Particular to the student?>
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

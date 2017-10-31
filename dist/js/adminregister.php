<?php
  include('connection.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['surname']))
  {
   if(isset($_POST['firstname']) && isset($_POST['othernames']))
   {
   	 if(isset($_POST['institution']) && isset($_POST['password']))
   	 {

   	  if(isset($_POST['emailaddress']) && isset($_POST['confirmpassword']))
   	  {
   	    if(isset($_POST['phonenumber']) && isset($_POST['checkbox']))
   	    {
		    //insert data
		    $surname = $_POST['surname'];
		    $firstname = $_POST['firstname'];
		    $othernames = $_POST['othernames'];
		    $institution = $_POST['institution'];
		    $password = $_POST['password'];
		    $emailaddress = $_POST['emailaddress'];
		    $phonenumber = $_POST['phonenumber'];


		    //use later to confirm password
		    //$confirmpassword = $_POST['confirmpassword'];
		    //echo "$surname $firstname $othernames of $institution with password $password and $emailaddress and $phonenumber";

		    db_insert("INSERT INTO admin (surname,firstname,othernames,institution,password,emailaddress,phonenumber)
		    	VALUES ('$surname','$firstname','$othernames','$institution','$password','$emailaddress','$phonenumber')");

			}
		}
  	}
  }

}

header('location:mylogin.php');

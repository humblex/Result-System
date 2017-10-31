<?php

class resultChecker{

	private $serverName;
	private $serverUsername;
	private $serverDatabase;
	private $serverPassword;


	public function setDB($serverName,$serverDatabase,$serverUsername,$serverPassword)
	{
	$this->serverName = $serverName;
	$this->serverDatabase=$serverDatabase;
	$this->serverUsername=$serverUsername;
	$this->serverPassword=$serverPassword;
	}

	public function getDB(){

		return $this->serverName;
		return $this->serverDatabase;
		return $this->serverUsername;
		return $this->serverPassword;
	}

	public function fetchingResults($regno){

		$this->getDB();
		$connection = new PDO("mysql:host=$this->serverName;dbname=$this->serverDatabase",$this->serverUsername,$this->serverPassword);
	    $execute_student = $connection->prepare("SELECT course,CA,exam,total,grade FROM results WHERE std_regno='$regno' ORDER BY course ASC");
	    $execute_student->execute();

	    while($rows = $execute_student->fetch(PDO::FETCH_ASSOC)){
	    
		   	echo " <div class='row'>

	                              <div class='col-md-4'>
	                                  <th>".$rows['course']."</th>
	                              </div>
	                              <div class='col-md-2'>
	                                  <th>".$rows['CA']."</th>
	                              </div>
	                              <div class='col-md-2'>
	                                  <th>".$rows['exam']."</th>
	                              </div>
	                              <div class='col-md-2'>
	                                  <th>".$rows['total']."</th>
	                              </div>
	                              <div class='col-md-2'>
	                                  <th>".$rows['grade']."</th>
	                              </div>
	                              
	                             
	               </div> <hr/><br/>";
	    }

	}

	public function login($regNumber,$access) 
	{
		$loginStudent = $this->fetchingStudents();
		$loginPin = $this->fetchingPin();

        foreach ($loginStudent as $student) {
        	foreach($loginPin as $pin){
	        	if(($student["reg_number"] == $regNumber) && ($pin["pin_number"] == $access))
	        	{
		 				$_SESSION["student"] = $regNumber;       		
	        			header('location:viewresult.php');
	        	}
        	}
        }
         
    }

	public function fetchingStudents()
	{
		$this->getDB();
		$conn = new PDO("mysql:host=$this->serverName;dbname=$this->serverDatabase",$this->serverUsername,$this->serverPassword);
	    
		$execute_student =$conn->prepare("SELECT * FROM students");
		$execute_student->execute();

	    return $execute_student->fetchAll();
	}

	public function fetchingPin()
	{
		$this->getDB();
		$conn = new PDO("mysql:host=$this->serverName;dbname=$this->serverDatabase",$this->serverUsername,$this->serverPassword);
	    
		$execute_access =$conn->prepare("SELECT * FROM access");
		$execute_access->execute();

	    return $execute_access->fetchAll();
	}


}

?>
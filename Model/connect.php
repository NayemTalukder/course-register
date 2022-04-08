<?php  
	$con= new mysqli("localhost","root","","student_management_system");

	//check connection
	if(!$con){
		die("Connection failed: ".$con-> connect_error);
	}
?>	
<?php 
  session_start();
  include('controller.php');

  if(isset($_GET['section']) && isset($_GET['faculty'])){
		$_SESSION['section'] = $_GET['section'];
		$_SESSION['faculty'] = $_GET['faculty'];
		
		if ($model->deleteAdvisedCourse()) {

			$sql2 = "UPDATE section set seat_remaining= seat_remaining+1 where faculty='".$faculty."' and section='".$section."'";
			if ($model->updateSeatStatus()) {
				echo '<script type ="text/Javascript">alert("THE COURSE THAT YOU CHOSE TO DELETE, HAS BEEN REMOVED SUCCESSFULLY.");</script>';
				header("Location:../View/advisedCourse.php");
			}
		}
	}

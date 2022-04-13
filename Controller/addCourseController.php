<?php 
  session_start();
  include('controller.php');

  if(isset($_GET['course_id']) && isset($_GET['section'])&& isset($_GET['faculty'])){
    $_SESSION['course_id'] = $_GET['course_id'];
    $_SESSION['section'] = $_GET['section'];
    $_SESSION['faculty'] = $_GET['faculty'];

    $row1 = $model->seatStatusGet();

    if($row1['seat_remaining'] == 0){
      echo '<script type ="text/Javascript">alert("THERE IS NO SEAT REMAINGING. GO BACK TO CHECK ANOTHER SECTION");</script>';
    }else{
      $result = $model->addCourse();
      if ($result) {
        echo "<script type='text/javascript'>
            alert('COURSE ADDED SUCCESSFULLY');
            history.go(-2);
        </script>";
      } else {
        
        echo "<script type='text/javascript'>
                alert('COURSE HAS BEEN ADDED ALREADY. TRY ANOTHER COURSE');
                history.back();
            </script>";
      }
    }
  }

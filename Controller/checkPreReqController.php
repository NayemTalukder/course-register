<?php 
  session_start();
  include('controller.php');

  if(isset($_GET['course_id'])){ 
      $_SESSION['course_id'] = $_GET['course_id'];

      $result = $model->preReqCheck();

    //   var_dump($result);

      if($result[0][0]['completed_preq'] != $result[1]['TOTALNUMBER_OF_PRE_REQ_COURSE']){
        echo "<script type='text/javascript'>
                alert('DO THE PREREQUISITE COURSES WITH PROPER CGPA REQUIREMENTS');
                window.location='../View/unfinished.php';
            </script>";
      } else header('Location: ../View/section.php?course_id='.$_GET['course_id']);

  }


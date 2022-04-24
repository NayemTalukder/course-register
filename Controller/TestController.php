<?php
  session_start();
  include('controller.php');
  
  $_SESSION['status'] = false;
  $_SESSION['method'] = $_POST['method'];
  $_SESSION['dataType'] = $_POST['dataType'];
  $_SESSION['flag'] = true;

  try {
    if($_SESSION['method'] == 'login') $_SESSION['status'] = $modelTest->loginTest();
    else if($_SESSION['method'] == 'courseView') $_SESSION['status'] = $modelTest->courseViewTest();
    else if($_SESSION['method'] == 'addCourseView') $_SESSION['status'] = $modelTest->addCourseViewTest();
    else if($_SESSION['method'] == 'addCourse') {
      $_SESSION['status'] = $modelTest->addCourseTest();
      if ($_SESSION['status']) {
        $modelTest->deleteAdvisedCourseTest('1', 'AAJ');
        $model->updateSeatStatus('1', 'AAJ');
      }
    }
    else if($_SESSION['method'] == 'seatStatusGet') $_SESSION['status'] = $modelTest->seatStatusGetTest();
    else if($_SESSION['method'] == 'seatStatusView') $_SESSION['status'] = $modelTest->seatStatusViewTest();
    else if($_SESSION['method'] == 'updateSeatStatus') $_SESSION['status'] = $modelTest->updateSeatStatusTest();
    else if($_SESSION['method'] == 'advisedCourseView') $_SESSION['status'] = $modelTest->advisedCourseViewTest();
    else if($_SESSION['method'] == 'deleteAdvisedCourse') $_SESSION['status'] = $modelTest->deleteAdvisedCourseTest();
    else if($_SESSION['method'] == 'finishedCourseView') $_SESSION['status'] = $modelTest->finishedCourseViewTest();
    else if($_SESSION['method'] == 'preReqCourseView') $_SESSION['status'] = $modelTest->preReqCourseViewTest();
    else if($_SESSION['method'] == 'preReqCheck') $_SESSION['status'] = $modelTest->preReqCheckTest();
  } catch (exception $e) {} finally {
    header("Location: ../View/Test.php");
  }


  // header("Location: ../View/Test.php");
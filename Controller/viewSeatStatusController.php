<?php 
  session_start();
  include('controller.php');

  if (isset($_GET['course_id'])) {
    $_SESSION['course_id'] = $_GET['course_id'];
    $rows = $model->seatStatusView();
  }

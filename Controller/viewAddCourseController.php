<?php 
  session_start();
  include('controller.php');

  $rows = $model->addCourseView();
  $count = count($rows);


<?php
  session_start();
  include('controller.php');

  if (isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['username'];

    $result = $model->login();

    if($result['PASSWORD'] == $_POST['password']){
      header("Location:../View/unfinished.php");
      exit();
    } else echo '<script type ="text/Javascript">alert("NOT A STUDENT OF THIS UNIVERSITY");</script>';
  }


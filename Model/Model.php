<?php
  class Model {

    // Delete Query
    public function deleteAdvisedCourse() {
      include('connect.php');
      $section = $_SESSION['section'];
		  $faculty = $_SESSION['faculty'];
    
      $query = "DELETE FROM `advised_course` WHERE section='".$section."' and faculty='".$faculty."'";

      return mysqli_query($con, $query);
    }
    

    // Login Query
    public function login() {
      session_start();
      include('connect.php');
      $stid = $_SESSION['username'];
    
      $user_check_query = "SELECT PASSWORD FROM student WHERE STID=$stid LIMIT 1";
      $results = mysqli_query($con, $user_check_query);
      $user = mysqli_fetch_assoc($results);

      return $user;
    }
    
    // View Queries
    public function courseView() {
      include('connect.php');

      $sql = "SELECT * from courses";
      $result = mysqli_query($con, $sql);
  
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function preReqCourseView() {
      include('connect.php');

      $sql = "SELECT * from pre_req_course";
      $result = mysqli_query($con, $sql);
  
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addCourseView() {
      include('connect.php');
      $stid =  $_SESSION['username'];
      $query = "SELECT  courses.course_id FROM courses WHERE courses.course_id not in (SELECT course_finished.finished_course_id from course_finished WHERE course_finished.stid = '".$stid."') union SELECT course_finished.finished_course_id from course_finished WHERE course_finished.stid= '".$stid."' and course_result < 3";
      
      $result = mysqli_query($con, $query);
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function seatStatusView() {
      include('connect.php');
      $course_id = $_SESSION['course_id'];

      $query = "SELECT * from section WHERE course_id='".$course_id."'";
      $result = mysqli_query($con, $query);

      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function advisedCourseView() {
      include('connect.php');
      $stid =  $_SESSION['username'];

      $sql = "SELECT * from advised_course WHERE STID='".$stid."'";
      $result = mysqli_query($con, $sql);

      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function finishedCourseView() {
      include('connect.php');
      $stid =  $_SESSION['username'];

      $sql = "SELECT * from course_finished WHERE STID='".$stid."'";
      $result = mysqli_query($con, $sql);

      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Check Query
    public function preReqCheck() {
      include('connect.php');
      $course_id = $_SESSION['course_id'];
      $stid = $_SESSION['username'];

      $sql1 = "SELECT count(*) completed_preq from course_finished,pre_req_course where course_finished.FINISHED_COURSE_ID=pre_req_course.PRE_REQ_COURSE_ID and pre_req_course.course_id='" . $course_id ."' and course_finished.stid='". $stid ."' and course_finished.course_result>=pre_req_course.pre_req_requirement";
      
      $sql2 = "SELECT TOTALNUMBER_OF_PRE_REQ_COURSE from courses where course_id='" . $course_id ."'";
      
      $result1 = mysqli_query($con, $sql1);
      $result2 = mysqli_query($con, $sql2);

      $rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
      $row2 = mysqli_fetch_assoc($result2);

      return [$rows1, $row2];
    }

    // Get Query
    public function seatStatusGet() {
      include('connect.php');
      $course_id = $_SESSION['course_id'];
      $section = $_SESSION['section'];
      $faculty = $_SESSION['faculty'];
  
      $sql1 = "SELECT seat_remaining from section where course_id='".$course_id."' and section='".$section."'";
  
      $result1 = mysqli_query($con, $sql1);

      return mysqli_fetch_assoc($result1);
    }

    // Edit Queries
    public function addCourse() {
      include('connect.php');
      $stid = $_SESSION['username'];
      $course_id = $_SESSION['course_id'];
      $section = $_SESSION['section'];
      $faculty = $_SESSION['faculty'];

      $sql = "SELECT * from advised_course where COURSE_ID='".$course_id."' and STID='".$stid."' ";
      $result = mysqli_query($con, $sql);
  
      if (mysqli_fetch_all($result, MYSQLI_ASSOC)) return FALSE;
      else {
        $sql2 = "INSERT INTO advised_course VALUES('".$stid."','".$course_id."', '".$section."', '".$faculty."')";
        $con-> query($sql2); 

        $sql3 = "UPDATE section set seat_remaining= seat_remaining-1 where course_id='".$course_id."' and section='".$section."'";
        $con-> query($sql3); 

        return True;
      }
    }

    public function updateSeatStatus() {
      include('connect.php');
      $section = $_SESSION['section'];
		  $faculty = $_SESSION['faculty'];
    
      $query = "UPDATE section set seat_remaining= seat_remaining+1 where faculty='".$faculty."' and section='".$section."'";

      return mysqli_query($con, $query);
    }
  }
<?php
  class ModelTest {

    // Delete Query
    public function deleteAdvisedCourseTest($s='ss', $f='ss') {
      include('connect.php');
      $section = $s;
		  $faculty = $f;
    
      if ($_SESSION['dataType'] == 'wrongData') $query = "DELETE FROM `advised_cours` WHERE section='' and faculty=''";
      else $query = "DELETE FROM `advised_course` WHERE section='".$section."' and faculty='".$faculty."'";

      return mysqli_query($con, $query);
    }

    // Login Query
    public function loginTest() {
      session_start();
      include('connect.php');
      $stid = $_SESSION['username'];
    
      if ($_SESSION['dataType'] == 'wrongData') $user_check_query = "SELECT PASSWORD FROM stu WHERE STID='' LIMIT 1";
      else $user_check_query = "SELECT PASSWORD FROM student WHERE STID=$stid LIMIT 1";
      $results = mysqli_query($con, $user_check_query);
      $user = mysqli_fetch_assoc($results);

      return $user;
    }
    
    // View Queries
    public function courseViewTest() {
      include('connect.php');

      if ($_SESSION['dataType'] == 'wrongData') $sql = "SELECT * from course";
      else $sql = "SELECT * from courses";
      $result = mysqli_query($con, $sql);
  
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function preReqCourseViewTest() {
      include('connect.php');

      if ($_SESSION['dataType'] == 'wrongData') $sql = "SELECT * from pre_req_coursee";
      else $sql = "SELECT * from pre_req_course";
      $result = mysqli_query($con, $sql);
  
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addCourseViewTest() {
      include('connect.php');
      $stid =  $_SESSION['username'];
      if ($_SESSION['dataType'] == 'wrongData') $query = "SELECT  course.course_id FROM courses WHERE courses.course_id not in (SELECT course_finished.finished_course_id from course_finished WHERE course_finished.stid = '".$stid."') union SELECT course_finished.finished_course_id from course_finished WHERE course_finished.stid= '".$stid."' and course_result < 3";
      else $query = "SELECT  courses.course_id FROM courses WHERE courses.course_id not in (SELECT course_finished.finished_course_id from course_finished WHERE course_finished.stid = '".$stid."') union SELECT course_finished.finished_course_id from course_finished WHERE course_finished.stid= '".$stid."' and course_result < 3";
      
      $result = mysqli_query($con, $query);
      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function seatStatusViewTest() {
      include('connect.php');
      $course_id = 'CSE110';

      if ($_SESSION['dataType'] == 'wrongData') $query = "SELECT * from sectionnnn WHERE course_id='".$course_id."'";
      else $query = "SELECT * from section WHERE course_id='".$course_id."'";
      $result = mysqli_query($con, $query);

      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function advisedCourseViewTest() {
      include('connect.php');
      $stid =  $_SESSION['username'];

      if ($_SESSION['dataType'] == 'wrongData') $sql = "SELECT * from advised_courseee WHERE STID='".$stid."'";
      else $sql = "SELECT * from advised_course WHERE STID='".$stid."'";
      $result = mysqli_query($con, $sql);

      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function finishedCourseViewTest() {
      include('connect.php');
      $stid =  $_SESSION['username'];

      if ($_SESSION['dataType'] == 'wrongData') $sql = "SELECT * from course_finisheddd WHERE STID='".$stid."'";
      else $sql = "SELECT * from course_finished WHERE STID='".$stid."'";
      $result = mysqli_query($con, $sql);

      return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Check Query
    public function preReqCheckTest() {
      include('connect.php');
      $course_id = $_SESSION['course_id'];
      $stid = $_SESSION['username'];

      if ($_SESSION['dataType'] == 'wrongData') $sql1 = "SELECT count(*) completed_preq from course_finished,pre_req_course where course_finished.FINISHED_COURSE_ID=pre_req_course.PRE_REQ_COURSE_ID and pre_req_course.course_id='" . $course_id ."' and course_finished.stid='". $stid ."' and course_finished.course_result>=pre_req_course.pre_req_requirement";
      else $sql1 = "SELECT count(*) completed_preq from course_finished,pre_req_course where course_finished.FINISHED_COURSE_ID=pre_req_course.PRE_REQ_COURSE_ID and pre_req_course.course_id='" . $course_id ."' and course_finished.stid='". $stid ."' and course_finished.course_result>=pre_req_course.pre_req_requirement";
      
      if ($_SESSION['dataType'] == 'wrongData') $sql2 = "SELECT TOTALNUMBER_OF_PRE_REQ_COURSEEE from courses where course_id='" . $course_id ."'";
      else $sql2 = "SELECT TOTALNUMBER_OF_PRE_REQ_COURSE from courses where course_id='" . $course_id ."'";
      
      $result1 = mysqli_query($con, $sql1);
      $result2 = mysqli_query($con, $sql2);

      $rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
      $row2 = mysqli_fetch_assoc($result2);

      return [$rows1, $row2];
    }

    // Get Query
    public function seatStatusGetTest() {
      include('connect.php');
      $course_id = 'CSE110';
      $section = '1';
      $faculty = $_SESSION['faculty'];
  
      if ($_SESSION['dataType'] == 'wrongData') $sql1 = "SELECT seat_remaininggg from section where course_id='".$course_id."' and section='".$section."'";
      else $sql1 = "SELECT seat_remaining from section where course_id='".$course_id."' and section='".$section."'";
  
      $result1 = mysqli_query($con, $sql1);

      return mysqli_fetch_assoc($result1);
    }

    // Edit Queries
    public function addCourseTest() {
      include('connect.php');
      $stid = '66';
      $course_id = 'CSE110';
      $section = '1';
      $faculty = 'AAJ';

      if ($_SESSION['dataType'] == 'wrongData') $sql = "SELECT * from advised_courseeee where COURSE_ID='".$course_id."' and STID='".$stid."' ";
      else $sql = "SELECT * from advised_course where COURSE_ID='".$course_id."' and STID='".$stid."' ";
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

    public function updateSeatStatusTest($s='ss', $f='ss') {
      include('connect.php');
      $section = $s;
		  $faculty = $f;
    
      if ($_SESSION['dataType'] == 'wrongData') $query = "UPDATE sectionnnn set seat_remaining= seat_remaining+1 where faculty='".$faculty."' and section='".$section."'";
      else $query = "UPDATE section set seat_remaining= seat_remaining+1 where faculty='".$faculty."' and section='".$section."'";

      return mysqli_query($con, $query);
    }
  }
<?php include('../Controller/viewPreReqCourseController.php'); ?>

<html>
  <?php include('templates/header.php'); ?>
  <body align="center">
    <br><br><br><br><br>
    <h1>Prerequisite Courses of CSE Department</h1>
    <div>
      <table align="center">
        <thead>
          <tr><th>COURSE CODE</th><th>PREQUISITE COURSE CODE</th><th>GRADE REQUIREMENT</th></tr>
        </thead>
        <tbody>
          <?php 
            foreach ($rows as $row):
              echo "<tr><td>".$row["COURSE_ID"]."</td><td><b>".$row["PRE_REQ_COURSE_ID"]."</b></td><td><b>".$row["PRE_REQ_REQUIREMENT"]."</b></td></tr>";
            endforeach;            
          ?>
        </tbody>
      </table>
    </div>

    </body> 
</html>

<script>handleActive('prereq-course')</script>
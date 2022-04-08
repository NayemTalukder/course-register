<?php include('../Controller/viewCourseController.php'); ?>

<html>
  <?php include('templates/header.php'); ?>
  <body align="center">
    <br><br><br><br><br>
    <h1>Courses</h1>
    <div>
      <table align="center">
        <thead>
          <tr><th>COURSE CODE</th><th>COURSE NAME</th></tr>
        </thead>
        <tbody>

          <?php 
            foreach ($rows as $row):
              echo "<tr><td><a href='#'>".$row["COURSE_ID"]."</a></td><td><b>".$row["COURSE_NAME"]."</b></td></tr>";
            endforeach;            
          ?>
        </tbody>
      </table>
    </div>
  </body>   
</html>

<script>handleActive('courses')</script>
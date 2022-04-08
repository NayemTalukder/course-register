<?php include('../Controller/viewFinishedCourseController.php') ?>

<html>
  <?php include('templates/header.php'); ?>
  <body align="center">
    <br><br><br><br><br>
    <h1 style="margin-top: 10vh" >Finished Courses</h1>
    <div>
      <h2><table align="center">
        <thead>
        	<tr><th>COURSE CODE</th><th>RESULT</th></tr>
        </thead>
        <tbody>
          <?php  
            foreach ($rows as $row):
              echo "<tr><td><b>".$row['FINISHED_COURSE_ID']."</b></td><td><b>".$row['COURSE_RESULT']."</b></td></tr>";
            endforeach;            
          ?>
        </tbody>
      </table></h2>
    </div>
  </body> 
</html>

<script>handleActive('finished-course')</script>
<html>
<?php include('templates/header.php'); ?>
<?php include('../Controller/viewAddCourseController.php'); ?>

  <body align="center">
    <br><br><br><br><br>
    <div>
      <h2><table align="center" class="mrt-7">
        <thead>
          <tr><th>Courses To Add</th></tr>
        </thead>
        <tbody>
          <?php for ($i = 0; $i < $count; $i++) { 
                  echo "<tr><td><a href='../Controller/checkPreReqController.php?course_id=".$rows[$i]['course_id']."'>".$rows[$i]['course_id']."</a></td></tr>";
                } 
          ?>
        </tbody>
      </table></h2>
    </div>
    </body> 
</html>

<script>handleActive('add-course')</script>
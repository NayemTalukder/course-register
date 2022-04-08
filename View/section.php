
<?php include('../Controller/viewSeatStatusController.php'); ?>
<html>
  <?php include('templates/header.php'); ?>
  <body align="center">
    <br><br><br><br><br>
    <h1>Seat Status</h1>
    <div>
      <h3><table align="center">
        <thead>
          <tr><th>COURSE CODE</th><th>SECTION</th><th>FACULTY</th><th>SEAT REMAINING</th><th>TOTAL SEAT</th><th></th></tr>
        </thead>
        <tbody>
          <?php 
            foreach ($rows as $row):
                echo "<tr><td>".$row['COURSE_ID']."</td><td><b>".$row['SECTION']."</b></td><td><b>".$row['FACULTY']."</b></td><td><b>".$row['SEAT_REMAINING']."</b></td><td><b>".$row[
                  'TOTAL_SEAT']."</b></td><td><b><a href='../Controller/addCourseController.php?course_id=".$row['COURSE_ID']."&section=".$row['SECTION']."&faculty=".$row['FACULTY']."'>Add</a></b></td></tr>";
            endforeach;            
          ?>
        </tbody>
      </table></h3>
    </div>

    </body> 
</html>
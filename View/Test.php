<?php 
  session_start();
  include('templates/header.php');
  if(isset($_SESSION['flag']) && !$_SESSION['flag']) {
    $_SESSION['method'] = 'not-set';
  } else $_SESSION['flag'] = false;
?>

<br><br><br><br><br>
<div class="test-container">
  <div class="test-heading">
    <h4>Unit Testing</h4>
  </div>
  <div class="test-body" >
    <form class="mt-2 mx-auto" action="../Controller/TestController.php" method="POST">
      <label class="mr-3 font-body" for="methods">Select a Method From Class <span class="button ml-1" > ModelTest</span></label>
      <select class="button drp width-40 float-right cursor-pointer" name="method" id="methods">
        <option value="login">login</option>
        <option value="courseView">courseView</option>
        <option value="addCourseView">addCourseView</option>
        <option value="addCourse">addCourse</option>
        <option value="seatStatusGet">seatStatusGet</option>
        <option value="seatStatusView">seatStatusView</option>
        <option value="updateSeatStatus">updateSeatStatus</option>
        <option value="advisedCourseView">advisedCourseView</option>
        <option value="deleteAdvisedCourse">deleteAdvisedCourse</option>
        <option value="finishedCourseView">finishedCourseView</option>
        <option value="preReqCourseView">preReqCourseView</option>
        <option value="preReqCheck">preReqCheck</option>
      </select>
      <div class="test-with">
        <label class="mr-4 font-body" for="methods">Test With</label>
        <select class="button drp width-40 cursor-pointer ml-1_5" name="dataType" >
          <option value="correctData">Correct Data</option>
          <option value="wrongData">Wrong Data</option>
        </select>
        <input class="button width-40 float-right cursor-pointer" type="submit" value="Test">  
      </div>
    </form>
    <!-- Result -->
    <div class="result-container  <?php if ($_SESSION['method'] == 'not-set') echo 'd-none' ?>" >
      <div class="test-heading">
        <h4 class="card-title text-white my-2">Test Result</h4>
      </div>
      <div class="result-body">
        <h5 class='font-body' >Tested Method: <span class="button" > <?php echo $_SESSION['method'] ?> </span></h5>
        <h5 class='font-body' >Status: 
          <?php 
            if($_SESSION['status']) echo '<span class="button" >success</span>';
            else echo '<span class="btn btn-danger" >failed</span>'; ?>
        </h5>
      </div>
    </div>
  </div>
</div>
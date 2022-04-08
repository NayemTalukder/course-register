<!DOCTYPE html>
<html>  
  <head>
    <title>LOGIN</title>
    <div class="container">
        <nav>
          <div class="logo">
            <a href="#"><img class="resize" src="assets/image/Capture.PNG" alt=""></a>
          </div>
          <div class="nav-wrapper">
            <ul>
            </ul>
          </div>
        </nav>

        <div class="form-container">
          <form action="../Controller/loginController.php" method="POST" class="form" >
            <b><li>Username: <input type="text" name ="username" class="text" autocomplete ="off" placeholder="Enter your Username" required></li></b>
            <b><li>Password: <input type="password" name ="password" class="text"  placeholder="Enter your Password" required=""></li></b>
            <b><li><input type="submit" name ="submit" class="login" value ="Login" id="sub"></li></b>
          </form>
        </div>

      </div>
      <link rel="stylesheet" href="assets/css/style.css">
  </head>
</html>
            
              
              
              
            
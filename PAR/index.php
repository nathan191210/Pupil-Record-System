<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once("functions.php");
require_once("db_const.php");
session_start();
if (logged_in() == true) {
redirect_to("nathanbarlowdean.com/dashboard.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PAR - Splash</title>
<style type="text/css">
</style>
<link href="CSS/SplashCSS.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container-main">
      
      <div class="top">
		<img src="images/logo.png" width="351" height="186" alt="logo" />
      </div>
  
  	  <hr>
  
  <div class="bottom">
		<?php
			if (!isset($_POST['submit'])){
		?>
        <!-- The HTML login form -->
      
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <p><label for="username">Username</label><input type="text" name="username" /></p>
        <p><label for="password">Password</label><input type="password" name="password" />       
        <input type="submit" name="submit" value="Login" />
        </form>
        
        
		<?php
			} else {
			require_once("db_const.php");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			# check connection
			if ($mysqli->connect_errno) {
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
			}
			 
			$username = $_POST['username'];
			$password = $_POST['password'];
			 
			$sql = "SELECT * from admin WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
			$result = $mysqli->query($sql);
			if (!$result->num_rows == 1) {
				redirect_to("index.php");
			echo "<p>Invalid username/password combination</p>";
			
			} else {
			echo "<p>Logged in successfully</p>";
				$user = $result->fetch_array();
				$_SESSION['user_id'] = $user['Admin_id'];
				$_SESSION['username'] = $user['Username'];
				redirect_to("/dashboard.php");
				
			}
			}
        ?>	
    </div>

</div>


</body>
</html>
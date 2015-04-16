<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Staff Editor</title>
<link href="CSS/pupilStyle.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
	<header>
        <p><img src="images/logo.png" width="407" height="217" longdesc="http://index.php"></p> 
        <div class="nav2">
          <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
      	</div> 
	</header>
   
  
	<div class="sidebar1">
    	<ul class="nav">
          <li><a href="#">link 1</a></li>
          <li><a href="#">link 2</a></li>
          <li><a href="#">link 3</a></li>
          <li><a href="#">link 4 </a></li>
          <li><a href="#">link 5</a></li>
    	</ul>
   		<div class = "new2">
    		</hr>
    	</div>
	</div>
    
	<article class="content">
    	<h1>Staff Editor</h1>
    	<section>
    		<h3>New Staff</h3>
				
            <form method="post">
            	Forename: <input type="text" name="forename" /><br />
                Surname: <input type="text" name="surname" /><br />
                Role:<select name="role" size="1">
					<option>Admin</option>
					<option>Teacher</option>
				</select><br />                
				Username: <input type="text" name="username" /><br />
				Password: <input type="text" name="password" /><br />			 
				<input type="submit" name="submit" value="add" />
			</form>
			
			<?php 
				if (isset($_POST['submit'])){
				require_once("db_const.php");
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
				if(isset($_POST['forename'])){ $forename = $_POST['forename']; }
				if(isset($_POST['surname'])){ $surname = $_POST['surname']; }
				if(isset($_POST['role'])){ $role = $_POST['role']; }
				if(isset($_POST['username'])){ $username = $_POST['username']; }
				if(isset($_POST['password'])){ $password = $_POST['password']; }	
			
				$sql = "INSERT INTO admin(Username, Password)VALUES('$username','$password')";
				$mysqli->query($sql);
							
				
				$sql2 = "INSERT INTO person(Forename, Surname)VALUES('$forename', '$surname')";
				$mysqli->query($sql2);			
				
				$sql3 = "INSERT INTO staff(Role, Person_Person_ID)VALUES (('$role'),(SELECT Person_ID FROM person Where person.Forename = '$forename' and person.Surname = '$surname'))";	
				$mysqli->query($sql3);	
				}		
			?>
				
		</section>
	</article>


  <footer>
    <p><center><a href="dashboard.php">Home</a> | <a href="#">Contact Us</a> | <a href="#">Terms of Use</a></center></p>
    <address>
     PAR - Pupil Assessment Record
    </address>
  </footer>
</div>
</body>
</html>

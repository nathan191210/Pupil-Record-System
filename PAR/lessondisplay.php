<!doctype html>
<html>
<head>

<meta charset="utf-8">

<title>Lesson Display</title>

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
    <h1>Lesson Details</h1>
    <section>  
    <form method="post">
		Lesson: <select name="lesson" >
        <?php 
            require_once("db_const.php");
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql= "SELECT * FROM lesson";
            $result=mysqli_query($mysqli,$sql);
            
            while($row=mysqli_fetch_assoc($result))
            {
            echo '<option value="'.$row['Lesson_ID'].'">'.$row['Lesson_Title'].'</option>';
            }
         ?>               
		<input type="submit" name="submit" value="Open" />
	</form>
      <?php	
		if (isset($_POST['submit'])){
			require_once("db_const.php");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if(isset($_POST['lesson'])){ $lesson = $_POST['lesson']; }
		
			$sql1 = "SELECT * FROM lesson_pupil INNER JOIN pupil on pupil.Pupil_ID = Pupil_Pupil_ID INNER JOIN person on person.Person_ID = Pupil_Pupil_ID WHERE Lesson_Lesson_ID = '$lesson'";		
				
			if(!$result = $mysqli->query($sql1)){
					die('There was an error running the query [' . $mysqli->error . ']');
			}
			
			while($row = $result->fetch_assoc()){
				echo $row['Forename'] . '<br />';
			}
		
			$sql2 = "SELECT * FROM assessment WHERE Lesson_Lesson_ID = '$lesson'";
			
			if(!$result2 = $mysqli->query($sql2)){
					die('There was an error running the query [' . $mysqli->error . ']');
			}
			
			while($row2 = $result2->fetch_assoc()){
				echo $row2['Assessment_Title'] . '<br />';
			}
			
			$sql3 = "SELECT * FROM assessment_pupil WHERE Lesson_Lesson_ID = '$lesson'";
			
			if(!$result2 = $mysqli->query($sql2)){
					die('There was an error running the query [' . $mysqli->error . ']');
			}
			
			while($row2 = $result2->fetch_assoc()){
				echo $row2['Assessment_Title'] . '<br />';
			}
			
		}
	?> 
  
  
  
  
  
  
  
  
  
    </section>
  </article>
  <!-- end .content -->
  <footer>
    <p><center><a href="dashboard.php">Home</a> | <a href="#">Contact Us</a> | <a href="#">Terms of Use</a></center></p>
    <address>
     PAR - Pupil Assessment Record
    </address>
  </footer>
<!-- end .container --></div>
</body>
</html>

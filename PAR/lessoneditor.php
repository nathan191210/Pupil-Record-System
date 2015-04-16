<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Lesson Editor</title>
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
    <h1>Lesson Editor</h1>
    <section>
    <h3>Add new Pupil</h3>
  
    <form method="post">
		Lesson Title: <input type="text" name="lessonTitle" /><br />
		Start Date: <input type="text" name="startDate" /><br /> 
        End Date: <input type="text" name="endDate" /><br /> 
        Subject:  <select name="subject" >    
            <?php 
				require_once("db_const.php");
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				$sql= "SELECT * FROM subject";
				$result=mysqli_query($mysqli,$sql);
				
				while($row=mysqli_fetch_assoc($result))
				{
				echo '<option value="'.$row['Subject_ID'].'">'.$row['Subject_Name'].'</option>';
				}
             ?>
		</select><br />  
        Staff: <select name="staff" >
            <?php 
				require_once("db_const.php");
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				$sql= "SELECT * FROM staff INNER JOIN person on Person_ID = Person_Person_ID";
				$result=mysqli_query($mysqli,$sql);
				
				while($row=mysqli_fetch_assoc($result))
				{
				echo '<option value="'.$row['Staff_ID'].'">'.$row['Forename']." ".$row['Surname'].'</option>';
				}
             ?>
		</select><br />
        Students: <select name="pupil[]" multiple="multiple" size="3" draggable="true">
            <?php 
				require_once("db_const.php");
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				$sql= "SELECT * FROM pupil INNER JOIN person on Person_ID = Person_Person_ID";
				$result=mysqli_query($mysqli,$sql);
				
				while($row=mysqli_fetch_assoc($result))
				{
				echo '<option value="'.$row['Pupil_ID'].'">'.$row['Forename']." ".$row['Surname'].'</option>';
				}
             ?>
		</select><br />
        <input type="submit" name="submit" value="Login" />
        
    </form>
     
    <?php
	
	if (isset($_POST['submit'])){
		require_once("db_const.php");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
				
		if(isset($_POST['lessonTitle'])){ $lessonTitle = $_POST['lessonTitle']; }
		if(isset($_POST['subject'])){ $subject = $_POST['subject']; }
		if(isset($_POST['startDate'])){ $startDate = $_POST['startDate']; }
		if(isset($_POST['endDate'])){ $endDate = $_POST['endDate']; }	
		if(isset($_POST['staff'])){ $staff = $_POST['staff']; }
		
		
			$sql1 = "INSERT INTO lesson(Lesson_Title, Start_Date, End_Date, Staff_Staff_ID, Subject_Subject_ID)VALUES ('$lessonTitle', '$startDate', '$endDate', '$staff', '$subject');"  ;	
			$mysqli->query($sql1);
			
			$sql2 = "SELECT Lesson_ID FROM lesson WHERE Lesson_Title = '$lessonTitle' && Start_Date ='$startDate' LIMIT 1";

			if(!$resultss = $mysqli->query($sql2)){
    			die('There was an error running the query [' . $mysqli->error . ']');
			}
			while($row = $resultss->fetch_assoc()){
				$temp = $row['Lesson_ID'] . '<br />';
			}
										
			foreach ($_POST['pupil'] as $pupil){    			
				$sql3 = "INSERT INTO lesson_pupil(Pupil_Pupil_ID, Lesson_Lesson_ID) VALUES ('$pupil','$temp')";
				$mysqli->query($sql3);	
			}
				
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

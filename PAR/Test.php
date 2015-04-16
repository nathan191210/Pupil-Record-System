<!doctype html>
<html>
<head>

<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>TEST</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="CSS/pupilStyle.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

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
   
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>Assessment Editor</h1>
    <section>
	<h3>Create New Assessment</h3>
  
   <form method="post">
   <button type="button" onclick="document.getElementById('demo').innerHTML = Date()">Click me to display Date and Time.</button>

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
		if(isset($_POST['lesson'])){ $lesson = $_POST['lesson']; }
		require_once("db_const.php");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		$sql= "SELECT Assessment_Title FROM assessment WHERE Lesson_Lesson_ID = $lesson";
        $result=mysqli_query($mysqli,$sql);
		
			
		echo "<input type='text' name='userid'>";
		while($row = mysqli_fetch_row($result))
		{
			foreach($row as $cell){	
				echo "<input type='text' name='userid' value='$cell'>";
			}
				
		}	
		mysqli_free_result($result);
		
		$sql2= "SELECT DISTINCT Lesson_Pupil_Lesson_Pupil_ID,Forename, Surname FROM assessment_pupil INNER JOIN lesson_pupil ON Lesson_Pupil_Lesson_Pupil_ID = Lesson_Pupil_ID INNER JOIN pupil ON Pupil_Pupil_ID = Pupil_ID INNER JOIN person ON Person_ID = Person_Person_ID WHERE Lesson_Lesson_ID = $lesson";
        $result2=mysqli_query($mysqli,$sql2);
		
		
		if(!$result2 = $mysqli->query($sql2)){
    			die('There was an error running the query [' . $mysqli->error . ']');
			}
			echo"</br>";
		while($row = $result2->fetch_assoc()){
			$assPupilID = $row['Lesson_Pupil_Lesson_Pupil_ID'];
			$name = $row['Forename']." ".$row['Surname'];
			echo "<input type='text' name='any' value='$name'>";	
			
			$sql3 = "SELECT Assessment_Score, Assessment_Pupil_ID FROM assessment_pupil INNER JOIN assessment ON Assessment_Assessment_ID = Assessment_ID WHERE Lesson_Pupil_Lesson_Pupil_ID = '$assPupilID' AND Lesson_Lesson_ID = '$lesson'";		
			$result3=mysqli_query($mysqli,$sql3);
			
			while($row2 = $result3->fetch_assoc()){
				$score = $row2['Assessment_Score'];
				$assPupID = $row2['Assessment_Pupil_ID'];
				$sub = "sub$assPupilID";
				echo "<input type='text' name='$assPupID' value='$score'>";
				
				
			}
			echo "<input type='submit' name='$sub' value='Open' />";
			echo"</br>";		
		}	
	}
	
	
	?> 
    
    </section>
  </article>
  
<footer>
   <p><center><a href="dashboard.php">Home</a> | <a href="#">Contact Us</a> | <a href="#">Terms of Use</a></center></p>
     PAR - Pupil Assessment Record
 </footer>
  
</div>
</body>
</html>

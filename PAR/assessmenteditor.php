<!doctype html>
<html>
<head>

<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Assessment Editor</title>
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
		Assement Name: 
		  <input type="text" name="assname" /><br />
        Out of: 
		  <input type="text" name="assout" /><br />
        Pass Mark: 
		  <input type="text" name="asspass" /><br />      
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
		<input type="submit" name="submit" value="Add" />
	</form>
     
    <?php	
		if (isset($_POST['submit'])){
		require_once("db_const.php");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		if(isset($_POST['assname'])){ $assname = $_POST['assname']; }
		if(isset($_POST['assout'])){ $assout = $_POST['assout']; }
		if(isset($_POST['asspass'])){ $asspass = $_POST['asspass']; }
		if(isset($_POST['lesson'])){ $lesson = $_POST['lesson']; }
	
		$sql1 = "INSERT INTO assessment(Assessment_Title, Out_Of, Pass_Mark, Lesson_Lesson_ID)VALUES('$assname', 'assout', 'asspass', '$lesson')";	
			$mysqli->query($sql1);			
		
						
		$sql2 = "SELECT Assessment_ID FROM assessment WHERE Assessment_Title = '$assname' LIMIT 1";
		
		if(!$resultss = $mysqli->query($sql2)){
    			die('There was an error running the query [' . $mysqli->error . ']');
			}
			
		while($row = $resultss->fetch_assoc()){
			$temp = $row['Assessment_ID'] . '<br />';
		}	
		
		$sql3 = "SELECT Lesson_Pupil_ID FROM lesson_pupil WHERE Lesson_Lesson_ID = '$lesson'";	
		$results = $mysqli->query($sql3);
				
		while($row = $results->fetch_assoc()){
   		 $temp2= $row['Lesson_Pupil_ID'];
		 echo($temp2).'<br />';
		 $sql4 = "INSERT INTO assessment_pupil(Assessment_Assessment_ID, Lesson_Pupil_Lesson_Pupil_ID)VALUES('$temp','$temp2')";
		 $mysqli->query($sql4);	
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

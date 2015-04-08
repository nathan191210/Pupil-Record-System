<!doctype html>
<html>
<head>

<meta charset="utf-8">

<title>Pupil Editor</title>

<style type="text/css">
<!--
@media screen and (min-width: 600px) {
-->
</style>
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
  </div>
  
  <article class="content">
    <h1>Pupil Editor</h1>
    <section>
    
  
    <form method="post">
		Forname: <input type="text" name="forname" /><br />
		Surname: <input type="text" name="Surname" /><br /> 
		<input type="submit" name="submit" value="Login" />
	</form>
     
    <?php
	
	if (isset($_POST['submit'])){
		require_once("db_const.php");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		if(isset($_POST['forname'])){ $forname = $_POST['forname']; }
		if(isset($_POST['Surname'])){ $Surname = $_POST['Surname']; }	
		
		$sql = "
				INSERT person(Forename, Surname)
				VALUES('Milk', 'eater');	
				
				INSERT INTO class_person(Person_Person_ID,Class_Class_ID)
				VALUES((
				SELECT Person_ID
				FROM person
    			WHERE person.Forename = 'Milk' and person.Surname = 'eater'
				),(
				SELECT Class_ID
   				FROM class 
    			WHERE class.Class_Name = 'Class 1'
				));

				INSERT INTO pupil(Person_Person_ID)
				VALUES(
				(SELECT Person_ID
   				FROM person
   				WHERE person.Forename = 'Milk' and person.Surname = 'eater')
				);
		";				
					
		
		$mysqli->query($sql);
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

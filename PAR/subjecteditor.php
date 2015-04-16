<!doctype html>
<html>
<head>

<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Subject Editor</title>
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
    <h1>Subject Editor</h1>
    <section>
	<h3>Add New Subject</h3>
  
    <form method="post">
		Subject Name: <input type="text" name="subname" /><br />
		<input type="submit" name="submit" value="Add" />
	</form>
     
    <?php	
	if (isset($_POST['submit'])){
		require_once("db_const.php");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		if(isset($_POST['subname'])){ $subname = $_POST['subname']; }
	
		$sql1 = "INSERT INTO subject(Subject_Name)VALUES('$subname')";	
		$mysqli->query($sql1);
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

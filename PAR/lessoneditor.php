<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Pupil Editor</title>
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
   
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>Lesson Editor</h1>
    <section>
<?php
if (!isset($_POST['submit'])){
?>
     <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
Lesson Name: <input type="text" name="lessonname" /><br />
Lesson Description: <input type="text" name="lessondescription" /><br />
 
<input type="submit" name="submit" value="add" />
</form>

<?php
require_once("db_const.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
# check connection
if ($mysqli->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}
if(isset($_POST['forename'])){ $forename = $_POST['forename']; }
if(isset($_POST['surname'])){ $surname = $_POST['surname']; }


$sql = "INSERT INTO person(Forename, Surname) VALUES({$forename},{$surname});
";

$mysqli->query($sql);
}?>
    
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

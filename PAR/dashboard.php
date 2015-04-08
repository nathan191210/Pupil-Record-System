<!doctype html>
<html>
<head>
<script type="text/javascript" src="Extensions/CanvasJS/canvasjs.min.js"></script>
        <script type="text/javascript">
    window.onload = function () {
    var chart1 = new CanvasJS.Chart("chart1", {
	backgroundColor: "#FFFEF7",
    title:{
		text: "Progress of 2B"},
	data: [
    {
    type: "pie",
    dataPoints: [
    { x: 10, y: 10 },
    { x: 20, y: 15 },
    { x: 30, y: 25 },
    { x: 40, y: 30 },
    { x: 50, y: 28 }
    ]
    }
    ]
    });
    var chart2 = new CanvasJS.Chart("chart2", {
	backgroundColor: "#FFFEF7",
    title:{
		text: "Progress of 3B"},
	data: [
    {
    type: "line",
    dataPoints: [
    { x: 10, y: 10 },
    { x: 20, y: 15 },
    { x: 30, y: 25 },
    { x: 40, y: 30 },
    { x: 50, y: 28 }
    ]
    }
    ]
    });
     
    chart2.render();
	chart1.render();
    }
    </script>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Admin Home Page</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
<!--
 
@media screen and (min-width: 600px) {
-->
</style>
<link href="CSS/DashboardCSS.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--></head>

<body>

<div class="container">
  <header>
    <p><img src="images/logo.png" width="407" height="217" longdesc="http://index.php"></p> 
    <div class="nav2">
      <ul>
        <li><a  class="active" href="dashboard.php">Home</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
      </div> 
  </header>
   
 
 
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="pupileditor.php">Pupil Editor</a></li>
      <li><a href="staffeditor.php">Staff Editor</a></li>
      <li><a href="subjecteditor.php">Subject Editor</a></li>
      <li><a href="lessoneditor.php">Lesson Editor</a></li>
      
    </ul>
    <div class = "new2">
    </hr>
    </div>
   
  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>Admin Dashboard</h1>
    <section>
     <div id="chart1"></div> 
     <div id="chart2" style="height: 200px; width: 50%;"></div>
    
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

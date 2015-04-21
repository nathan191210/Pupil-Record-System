<?php
	if (isset($_GET['a'])) {
		$a = strval($_GET['a']);
		
	}
	if (isset($_GET['b'])) {
		$b = strval($_GET['b']);
	}

	
	$sql = "UPDATE assessment_pupil SET Assessment_Score = '$a' WHERE Assessment_Pupil_ID = '$b' ";
	
	require_once("db_const.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$mysqli->query($sql);
	

?>
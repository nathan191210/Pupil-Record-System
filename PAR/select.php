<?php
	if (isset($_GET['q'])) {
		$q = strval($_GET['q']);
		
	}
	if (isset($_GET['l'])) {
		$l = strval($_GET['l']);
		
	}
	
	$sql = "SELECT Assessment_Pupil_ID FROM assessment_pupil INNER JOIN assessment on Assessment_Assessment_ID = Assessment_ID WHERE Lesson_Pupil_Lesson_Pupil_ID = $q AND Lesson_Lesson_ID = $l";
	
	require_once("db_const.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$result = $mysqli->query($sql);

	$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
	echo json_encode($json);

?>
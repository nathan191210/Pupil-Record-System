<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_PAR = "localhost";
$database_PAR = "pupil_assessment_record";
$username_PAR = "root";
$password_PAR = "";
$PAR = mysqli_connect($hostname_PAR, $username_PAR, $password_PAR) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
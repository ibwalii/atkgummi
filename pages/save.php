<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "atk";
$connect_db = mysql_connect($host, $username, $password) or die(mysql_error());

$connection = mysql_select_db($database, $connect_db);
foreach($_GET['period'] as $per){
	
	$update = "UPDATE TIMETABLE SET tt_title = '{$per[0]}', tt_from = '{$per[1]}', tt_to = '{$per[2]}',  alert_type = '{$per[3]}' WHERE tt_id = '{$per[4]}' ";
	$query = mysql_query($update, $connect_db) or die(mysql_error());
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
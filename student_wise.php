<?php
	include "connection.php"
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dropdown list</title>
</head>
<body>
		<form action = "student_wise_chart.php" method = "post">
		<th>Enter Stundent ID</th>
		<td><input type = "text" name = "id" ></td>
		<br>
		<td><input type = "submit" name = "submit" ></td>
		<br>


		<form action = "student_wise_radar_chart.php" method = "post">
		<th>Enter Stundent ID</th>
		<td><input type = "text" name = "id" ></td>
		<br>
		<td><input type = "submit" name = "submit" ></td>
		<br>

</body>
</html>

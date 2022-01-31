<?php
	include "connection.php";
	   session_start();
       $id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dropdown list</title>
</head>
<body>
	<form action = "coursewise_plo_chart.php" method = "post">
		<th>Enter Course ID</th>
		<select name = "section_name" >
			<?php

				$sql= "SELECT section_name FROM section WHERE faculty_id = '$id' ";
				$result = mysqli_query($conn,$sql);

				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name']; 
					echo "<option value= '$section_name'>$section_name</option>"; 
				}

			?> 
		</select>
		<br>
		<td><input type = "submit" name = "submit" ></td>

</body>
</html>

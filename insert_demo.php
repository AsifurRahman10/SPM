<?php

	include "connection.php"

?>




<!DOCTYPE html>
<html>
<head>
	<title>Insert Demo</title>
</head>
<body>

	<form action = "" method = "post">
		<table>
			<div>
				<tr>
				<th>ID</th>
				<td><input type = "text" name = "id" required></td>
				</tr>
				<tr>
				<th>Password</th>
				<td><input type = "text" name = "password" required></td>
				</tr>
				<tr>
				<th>Name</th>
				<td><input type = "text" name = "student_name" required></td>	
				</tr>
				
				<tr>
				<th>Email</th>
				<td><input type = "text" name = "email" required></td>
				</tr>
				<tr>
				<td></td>
				<td><input type = "submit" name = "submit" required></td>
				</tr>

				<?php


				if(isset($_POST['submit'])){

					$id = $_POST['id'];
					$password = $_POST['password'];
					$student_name = $_POST['student_name'];
					$email = $_POST['email'];

					$sql = "INSERT INTO student (id,password,student_name,email) VALUES ('$id','$password','$student_name','$email')"; 

					if(mysqli_query($conn,$sql)){
						echo "DONE";
					}
					else{
						echo"ERROR";
					}
				}


				?>
				
			</div>
		</table>


</body>
</html>
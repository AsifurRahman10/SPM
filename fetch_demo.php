<?php

	require "connection.php";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Reading from the database</title>
	
</head>
<body>

	<h3>Reading from the database</h3>
	<div>

	<?php

	 $sql =	"SELECT DISTINCT * FROM student"; 
	 $result = mysqli_query($conn,$sql);
		 
		 if(mysqli_num_rows($result)>0)
		 {
		 	while($data = mysqli_fetch_assoc($result))
		 		{
		 			echo"<tr>";
		 			echo"<td>".$data['id']. "</td>" . "<br>";
		 			echo"<td>".$data['student_name']  ."</td>". "<br>";
		 			echo"<td>".$data['email']."</td>"  . "<br>";
		 			echo"<br>";
		 			echo"</tr>"; 
		 			echo"<hr>";

		 		}
		 }
		
		else
		{
			echo "0 results found";
		}

?>

</div>

</body>
</html>
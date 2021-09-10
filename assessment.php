<?php
	include "connection.php"
	session_start();

	$id= $_SESSION['id'];

?>



<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
 
<form action = "" method="post" enctype="multipart/form-data">

		<th>Enter Course ID</th>
		<select name = "section_name" >
			<?php

				$sql= "SELECT section_name FROM section WHERE faculty_id = $id";
				$result = mysqli_query($conn,$sql);

				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name']; 
					echo "<option value= '$section_name'>$section_name</option>"; 
				}

			?> 
		</select>
		<br>
        
 
 <input type="file" name="file[]" id="file" multiple>
 <input type='submit' name='submit' value='Upload'>

</form>
<?php 

if(isset($_POST['submit'])){
 
 // Count total files
 $countfiles = count($_FILES['file']['name']);

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['file']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'img/'.$filename);
 if($i==0)
 {
    $sql = "INSERT into assessment(section_name,assessment_plan) VALUES('$section_name','$filename')";
    if (mysqli_query($conn,$sql)){
        echo "File Sucessfully uploaded";
    }else{
        echo "Error";
    }
 }
 else if($i==1)
 {
    $sql = "INSERT into assessment(section_name,question_bank) VALUES('$section_name','$filename')";
    if (mysqli_query($conn,$sql)){
        echo "File Sucessfully uploaded";
    }else{
        echo "Error";
    }
 }
 else if($i==2)
 {
    $sql = "INSERT into assessment(section_name,marks_obtained) VALUES('$section_name','$filename')";
    if (mysqli_query($conn,$sql)){
        echo "File Sucessfully uploaded";
    }else{
        echo "Error";
    }
 }
 }
} 
?>

<?php // content="text/plain; charset=utf-8"
declare(strict_types=1); 
require_once ('D:/XAMPP/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph.php');
require_once ('D:/XAMPP/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph_pie.php');


	function total1(){
	
	include "connection.php";
	 if(isset($_POST['submit']))
	{	
	$section_name = $_POST['section_name1'];




	$grand_total=0; // Total count of plo achieved
	for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
	{
		$plo = "plo".$k;  // converting plo into plo1-plo13.
		
	 	
	 	$sql =	"SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

	 	$result = mysqli_query($conn,$sql);
		 
		if(mysqli_num_rows($result)>0)
		{
		 	
		 	
		 	$count= 0;
		 	$i=0;
		 	while($row = mysqli_fetch_assoc($result))
		 	{

		 		if(!empty($row[$plo])) // counting number of row with value in any plo
		 		{
		 			$i;
		 			$count++;
		 			$value = $row[$plo]; 
		 			
		 			$a[$i] = $value;  /// storing the value of a row in a new array for future use
		 			$i++;
				} 
		 	}

		}


				 $add = 0;

	 			for($i=0;$i<$count;$i++)  // loop will run till the number of rows collected from plo
	 			{
	 			 $ploValue = $a[$i];  // inserting value index wise in the new variable
 					

	 			 	for($j=1 ; $j<=6; $j++) // loop will run 6 times and 6 clo
	 			 	{
	 			 		
	 			 		$CLO = "CLO".$j;
	 			 		
	 			 		if($CLO == $ploValue) // checks the value of clo and plo (row value) matches
	 			 			{
	 			 		$sql2 = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS ccount
						FROM grade_sheet AS g, plo_table AS p
						WHERE g.serial_id = p.serial_id AND g.section_name= '$section_name' AND g.$CLO = 'Y' AND p.$plo = '$ploValue'";

			            $result2 = mysqli_query($conn,$sql2);

					    $row2 = mysqli_fetch_assoc($result2);

					    $value = $row2['ccount'];

					    $add += $value; // storing the data in a variable
	 			 			}	



	 				}
	 			}
	 			


	 		$grand_total += $add; 
	 		$plowise[$k] =$add; /// storing the data in array for future use
	}

	 		$total_a = $grand_total;




	$grand_total=0; // Total count of plo achieved
	for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
	{
		$plo = "plo".$k;  // converting plo into plo1-plo13.
		
	 	
	 	$sql =	"SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

	 	$result = mysqli_query($conn,$sql);
		 
		if(mysqli_num_rows($result)>0)
		{
		 	
		 	
		 	$count= 0;
		 	$i=0;
		 	while($row = mysqli_fetch_assoc($result))
		 	{

		 		if(!empty($row[$plo])) // counting number of row with value in any plo
		 		{
		 			$i;
		 			$count++;
		 			$value = $row[$plo]; 
		 			
		 			$a[$i] = $value;  /// storing the value of a row in a new array for future use
		 			$i++;
				} 
		 	}

		}


				 $add = 0;

	 			for($i=0;$i<$count;$i++)  // loop will run till the number of rows collected from plo
	 			{
	 			 $ploValue = $a[$i];  // inserting value index wise in the new variable
 					

	 			 	for($j=1 ; $j<=6; $j++) // loop will run 6 times and 6 clo
	 			 	{
	 			 		
	 			 		$CLO = "CLO".$j;
	 			 		
	 			 		if($CLO == $ploValue) // checks the value of clo and plo (row value) matches
	 			 			{
	 			 		$sql2 = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS ccount
						FROM grade_sheet AS g, plo_table AS p
						WHERE g.serial_id = p.serial_id AND g.section_name= '$section_name' AND g.$CLO = 'N' AND p.$plo = '$ploValue'";

			            $result2 = mysqli_query($conn,$sql2);

					    $row2 = mysqli_fetch_assoc($result2);

					    $value = $row2['ccount'];

					    $add += $value; // storing the data in a variable
	 			 			}	



	 				}
	 			}
	 			

	 		$grand_total += $add; 
	 		$plowise[$k] =$add; /// storing the data in array for future use
	}


	 		$total_f = $grand_total;


	 		$total_clo = $total_a + $total_f;



	 		$percentage = ($total_a/$total_clo) * 100 ."%";

	 		$value = intval($percentage);



	 		return $value;

	 	}
	 }

	


	 $plot_value = total1();


	 	function total2(){
	
	include "connection.php";
	 if(isset($_POST['submit']))
	{	
	


	$section_name = $_POST['section_name2'];




	$grand_total=0; // Total count of plo achieved
	for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
	{
		$plo = "plo".$k;  // converting plo into plo1-plo13.
		
	 	
	 	$sql =	"SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

	 	$result = mysqli_query($conn,$sql);
		 
		if(mysqli_num_rows($result)>0)
		{
		 	
		 	
		 	$count= 0;
		 	$i=0;
		 	while($row = mysqli_fetch_assoc($result))
		 	{

		 		if(!empty($row[$plo])) // counting number of row with value in any plo
		 		{
		 			$i;
		 			$count++;
		 			$value = $row[$plo]; 
		 			
		 			$a[$i] = $value;  /// storing the value of a row in a new array for future use
		 			$i++;
				} 
		 	}

		}


				 $add = 0;

	 			for($i=0;$i<$count;$i++)  // loop will run till the number of rows collected from plo
	 			{
	 			 $ploValue = $a[$i];  // inserting value index wise in the new variable
 					

	 			 	for($j=1 ; $j<=6; $j++) // loop will run 6 times and 6 clo
	 			 	{
	 			 		
	 			 		$CLO = "CLO".$j;
	 			 		
	 			 		if($CLO == $ploValue) // checks the value of clo and plo (row value) matches
	 			 			{
	 			 		$sql2 = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS ccount
						FROM grade_sheet AS g, plo_table AS p
						WHERE g.serial_id = p.serial_id AND g.section_name= '$section_name' AND g.$CLO = 'Y' AND p.$plo = '$ploValue'";

			            $result2 = mysqli_query($conn,$sql2);

					    $row2 = mysqli_fetch_assoc($result2);

					    $value = $row2['ccount'];

					    $add += $value; // storing the data in a variable
	 			 			}	



	 				}
	 			}
	 			


	 		$grand_total += $add; 
	 		$plowise[$k] =$add; /// storing the data in array for future use
	}

	 		$total_a = $grand_total;




	$grand_total=0; // Total count of plo achieved
	for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
	{
		$plo = "plo".$k;  // converting plo into plo1-plo13.
		
	 	
	 	$sql =	"SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

	 	$result = mysqli_query($conn,$sql);
		 
		if(mysqli_num_rows($result)>0)
		{
		 	
		 	
		 	$count= 0;
		 	$i=0;
		 	while($row = mysqli_fetch_assoc($result))
		 	{

		 		if(!empty($row[$plo])) // counting number of row with value in any plo
		 		{
		 			$i;
		 			$count++;
		 			$value = $row[$plo]; 
		 			
		 			$a[$i] = $value;  /// storing the value of a row in a new array for future use
		 			$i++;
				} 
		 	}

		}


				 $add = 0;

	 			for($i=0;$i<$count;$i++)  // loop will run till the number of rows collected from plo
	 			{
	 			 $ploValue = $a[$i];  // inserting value index wise in the new variable
 					

	 			 	for($j=1 ; $j<=6; $j++) // loop will run 6 times and 6 clo
	 			 	{
	 			 		
	 			 		$CLO = "CLO".$j;
	 			 		
	 			 		if($CLO == $ploValue) // checks the value of clo and plo (row value) matches
	 			 			{
	 			 		$sql2 = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS ccount
						FROM grade_sheet AS g, plo_table AS p
						WHERE g.serial_id = p.serial_id AND g.section_name= '$section_name' AND g.$CLO = 'N' AND p.$plo = '$ploValue'";

			            $result2 = mysqli_query($conn,$sql2);

					    $row2 = mysqli_fetch_assoc($result2);

					    $value = $row2['ccount'];

					    $add += $value; // storing the data in a variable
	 			 			}	



	 				}
	 			}
	 			

	 		$grand_total += $add; 
	 		$plowise[$k] =$add; /// storing the data in array for future use
	}


	 		$total_f = $grand_total;



	 		$total_clo = $total_a + $total_f;



	 		$percentage = ($total_a/$total_clo) * 100 ."%";

	 		$value = intval($percentage);



	 		return $value;

	 	}
	 }

	 $plot_value2 = total2();




	 	 	function total3(){
	
	include "connection.php";
	 if(isset($_POST['submit']))
	{	


	$section_name = $_POST['section_name3'];



	$grand_total=0; // Total count of plo achieved
	for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
	{
		$plo = "plo".$k;  // converting plo into plo1-plo13.
		
	 	
	 	$sql =	"SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

	 	$result = mysqli_query($conn,$sql);
		 
		if(mysqli_num_rows($result)>0)
		{
		 	
		 	
		 	$count= 0;
		 	$i=0;
		 	while($row = mysqli_fetch_assoc($result))
		 	{

		 		if(!empty($row[$plo])) // counting number of row with value in any plo
		 		{
		 			$i;
		 			$count++;
		 			$value = $row[$plo]; 
		 			
		 			$a[$i] = $value;  /// storing the value of a row in a new array for future use
		 			$i++;
				} 
		 	}

		}


				 $add = 0;

	 			for($i=0;$i<$count;$i++)  // loop will run till the number of rows collected from plo
	 			{
	 			 $ploValue = $a[$i];  // inserting value index wise in the new variable
 					

	 			 	for($j=1 ; $j<=6; $j++) // loop will run 6 times and 6 clo
	 			 	{
	 			 		
	 			 		$CLO = "CLO".$j;
	 			 		
	 			 		if($CLO == $ploValue) // checks the value of clo and plo (row value) matches
	 			 			{
	 			 		$sql2 = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS ccount
						FROM grade_sheet AS g, plo_table AS p
						WHERE g.serial_id = p.serial_id AND g.section_name= '$section_name' AND g.$CLO = 'Y' AND p.$plo = '$ploValue'";

			            $result2 = mysqli_query($conn,$sql2);

					    $row2 = mysqli_fetch_assoc($result2);

					    $value = $row2['ccount'];

					    $add += $value; // storing the data in a variable
	 			 			}	



	 				}
	 			}
	 			


	 		$grand_total += $add; 
	 		$plowise[$k] =$add; /// storing the data in array for future use
	}

	 		$total_a = $grand_total;




	$grand_total=0; // Total count of plo achieved
	for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
	{
		$plo = "plo".$k;  // converting plo into plo1-plo13.
		
	 	
	 	$sql =	"SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

	 	$result = mysqli_query($conn,$sql);
		 
		if(mysqli_num_rows($result)>0)
		{
		 	
		 	
		 	$count= 0;
		 	$i=0;
		 	while($row = mysqli_fetch_assoc($result))
		 	{

		 		if(!empty($row[$plo])) // counting number of row with value in any plo
		 		{
		 			$i;
		 			$count++;
		 			$value = $row[$plo]; 
		 			
		 			$a[$i] = $value;  /// storing the value of a row in a new array for future use
		 			$i++;
				} 
		 	}

		}


				 $add = 0;

	 			for($i=0;$i<$count;$i++)  // loop will run till the number of rows collected from plo
	 			{
	 			 $ploValue = $a[$i];  // inserting value index wise in the new variable
 					

	 			 	for($j=1 ; $j<=6; $j++) // loop will run 6 times and 6 clo
	 			 	{
	 			 		
	 			 		$CLO = "CLO".$j;
	 			 		
	 			 		if($CLO == $ploValue) // checks the value of clo and plo (row value) matches
	 			 			{
	 			 		$sql2 = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS ccount
						FROM grade_sheet AS g, plo_table AS p
						WHERE g.serial_id = p.serial_id AND g.section_name= '$section_name' AND g.$CLO = 'N' AND p.$plo = '$ploValue'";

			            $result2 = mysqli_query($conn,$sql2);

					    $row2 = mysqli_fetch_assoc($result2);

					    $value = $row2['ccount'];

					    $add += $value; // storing the data in a variable
	 			 			}	



	 				}
	 			}
	 			

	 		$grand_total += $add; 
	 		$plowise[$k] =$add; /// storing the data in array for future use
	}


	 		$total_f = $grand_total;



	 		$total_clo = $total_a + $total_f;



	 		$percentage = ($total_a/$total_clo) * 100 ."%";

	 		$value = intval($percentage);



	 		return $value;

	 	}
	 }

	 $plot_value3 = total3();


	echo "<hr>";
	echo "<hr>";

	echo $plot_value;
	echo "<br>";
	echo $plot_value2;
	echo "<br>";
	echo $plot_value3;

?>

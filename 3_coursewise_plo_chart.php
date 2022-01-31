<?php
declare(strict_types=1);
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph.php');
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph_pie.php');


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



$data   = array($plot_value,$plot_value2,$plot_value3);
$labels = array("Course1\n(%.1f%%)",
                "Course2\n(%.1f%%)",
                "Course3\n(%.1f%%)");

// Create the Pie Graph.
$graph = new PieGraph(800,800);
$graph->SetShadow();

// Set A title for the plot
$graph->title->Set('PlO Achieved Comparison');
$graph->title->SetFont(FF_VERDANA,FS_BOLD,12);
$graph->title->SetColor('black');

// Create pie plot
$p1 = new PiePlot($data);
$p1->SetCenter(0.5,0.5);
$p1->SetSize(0.3);

// Setup the labels to be displayed
$p1->SetLabels($labels);

// This method adjust the position of the labels. This is given as fractions
// of the radius of the Pie. A value < 1 will put the center of the label
// inside the Pie and a value >= 1 will pout the center of the label outside the
// Pie. By default the label is positioned at 0.5, in the middle of each slice.
$p1->SetLabelPos(1);

// Setup the label formats and what value we want to be shown (The absolute)
// or the percentage.
$p1->SetLabelType(PIE_VALUE_PER);
$p1->value->Show();
$p1->value->SetFont(FF_ARIAL,FS_NORMAL,9);
$p1->value->SetColor('darkgray');

// Add and stroke
$graph->Add($p1);
$graph->Stroke();

?>

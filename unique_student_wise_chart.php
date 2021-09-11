<?php
include "connection.php";
session_start();
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph.php');
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph_bar.php');

	$id = $_SESSION['id'];

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
						WHERE g.serial_id = p.serial_id AND g.id = '$id' AND g.$CLO = 'Y' AND p.$plo = '$ploValue'";

			            $result2 = mysqli_query($conn,$sql2);

					    $row2 = mysqli_fetch_assoc($result2);

					    $value = $row2['ccount'];
					    //echo $value;
					   //echo "<br>";
					    $add += $value; // storing the data in a variable
	 			 			}

	 				}
	 			}


	 		//echo $plo." TOTAL = ";
	 		//echo $add."<br>";/// prinitng the summation of total achieved plo
	 		$grand_total += $add;
	 		$plowise[$k] =$add; /// storing the data in array for future use
	}
	 		//echo "<br>";
	 		//echo"<hr>";
	 	 	//echo"TOTAL = ";
	 		//echo $grand_total;
	 		//echo"<br>";

$datay=array($plowise[1],$plowise[2],$plowise[3],$plowise[4],$plowise[5],$plowise[6],$plowise[7],$plowise[8],$plowise[9],$plowise[10],$plowise[11],$plowise[12],$plowise[13]);

// Create the graph. These two calls are always required
$graph = new Graph(750,400);
$graph->SetScale('textlin');

// Add a drop shadow
$graph->SetShadow();

// Adjust the margin a bit to make more room for titles
$graph->SetMargin(40,30,20,40);

// Create a bar pot
$bplot = new BarPlot($datay);

// Adjust fill color
$bplot->SetFillColor('orange');
$graph->Add($bplot);

// Setup the titles
$graph->title->Set('CLO Achieved by each PLO');
$graph->xaxis->title->Set('PLOs');
$graph->yaxis->title->Set('Number of Achieved CLO');

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$graph->Stroke();

?>

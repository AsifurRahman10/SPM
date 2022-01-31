<?php // content="text/plain; charset=utf-8"
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph.php');
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph_pie.php');
 include "connection.php";
session_start();

$add= 0;
for($i = 1; $i<=6 ;$i++)
	{
	$CLO = "CLO".$i;
	$sql = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS ccount
    FROM grade_sheet AS g, plo_table AS p
    WHERE g.serial_id=p.serial_id AND g.$CLO ='Y'";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);

    $value = $row['ccount'];

    $add += $value;
	}
	//echo "<br>";
	//echo "Total PLO achieved: ". $add;
	$achieved =$add;

	$add= 0;
	$value=0;
	for($i = 1; $i<=6 ;$i++)
	{
	$CLO = "CLO".$i;
	$sql2 = "SELECT SUM(CASE WHEN $CLO IS NOT NULL THEN 1 ELSE 0 END) AS cccount
    FROM grade_sheet AS g, plo_table AS p
    WHERE g.serial_id=p.serial_id ";

    $result2 = mysqli_query($conn,$sql2);

    $row = mysqli_fetch_assoc($result2);

    $value = $row['cccount'];

    $add += $value;
	}
	//echo "<br>";
	//echo "Total PLO: ". $add;
	 $total = $add;
	 $percentage = ($achieved/$total) * 100 ."%";

	 $value = intval($percentage);

	 $value2 = (100-$value);



$data   = array($value,$value2);
$labels = array("Achieved Plo\n(%.1f%%)",
                "Unattained PLO\n(%.1f%%)");

// Create the Pie Graph.
$graph = new PieGraph(800,800);
$graph->SetShadow();

// Set A title for the plot
$graph->title->Set('PlO Achieved Percentage');
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

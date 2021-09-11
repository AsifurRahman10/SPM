<?php
include "connection.php";
session_start();
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph.php');
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph_log.php');
require_once ('C:/xampp/htdocs/jpgraph-4.3.4/jpgraph-4.3.4/src/jpgraph_radar.php');


    $id = $_SESSION['id'];

    $grand_total=0; // Total count of plo achieved
    for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
    {
        $plo = "plo".$k;  // converting plo into plo1-plo13.


        $sql =  "SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

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
                        WHERE g.serial_id = p.serial_id AND g.id = '1711118' AND g.$CLO = 'Y' AND p.$plo = '$ploValue'";

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




    $grand_total=0; // Total count of plo achieved
    for($k=1;$k<=13;$k++) /// loop will run all the 13 plo
    {
        $plo = "plo".$k;  // converting plo into plo1-plo13.


        $sql =  "SELECT DISTINCT $plo FROM plo_table"; /// selecting all the rows of a certain plo

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
                        WHERE g.serial_id = p.serial_id AND g.id = '1711118'  ";

                        $result2 = mysqli_query($conn,$sql2);

                        $row2 = mysqli_fetch_assoc($result2);

                        $value = $row2['ccount'];
;
                        $add += $value; // storing the data in a variable
                            }



                    }
                }



            $grand_total += $add;
            $plowise2[$k] =$add; /// storing the data in array for future use
    }









// Create the basic rtadar graph
$graph = new RadarGraph(800,600);

// Set background color and shadow
$graph->SetColor("white");
$graph->SetShadow();

// Position the graph
$graph->SetCenter(0.4,0.55);

// Setup the axis formatting
$graph->axis->SetFont(FF_FONT1,FS_BOLD);
$graph->axis->SetWeight(2);

// Setup the grid lines
$graph->grid->SetLineStyle("longdashed");
$graph->grid->SetColor("navy");
$graph->grid->Show();
$graph->HideTickMarks();

// Setup graph titles
$graph->title->Set("Quality result");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->SetTitles(array("One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen"));
// Create the first radar plot
$plot = new RadarPlot(array($plowise2[1],$plowise2[2],$plowise2[3],$plowise2[4],$plowise2[5],$plowise2[6],$plowise2[7],$plowise2[8],$plowise2[9],$plowise2[10],$plowise2[11],$plowise2[12],$plowise2[13]));
$plot->SetLegend("Goal");
$plot->SetColor("red","lightred");
$plot->SetFill(false);
$plot->SetLineWeight(2);

// Create the second radar plot
$plot2 = new RadarPlot(array($plowise[1],$plowise[2],$plowise[3],$plowise[4],$plowise[5],$plowise[6],$plowise[7],$plowise[8],$plowise[9],$plowise[10],$plowise[11],$plowise[12],$plowise[13]));
$plot2->SetLegend("Actual");
$plot2->SetColor("blue","lightred");

// Add the plots to the graph
$graph->Add($plot2);
$graph->Add($plot);

// And output the graph
$graph->Stroke();


?>

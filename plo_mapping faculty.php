<?php

	include "connection.php";
	   session_start();

         $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PLO MAPPING</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <style>
            .death{

                background:#f4eee8;
                border-radius: 10px;
                padding: 20px;
				margin:auto;
             }
             .liv1{

               background: ;
            }
            .liv2{
               margin-left: 500px;
               margin-top: -278px;

            }
            .liv3{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv4{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv5{
               margin-left: -1500px;
               margin-top: 40px;
               background: ;
            }
            .liv6{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv7{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv8{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv9{
               margin-left: -1500px;
               margin-top: 40px;
            }
            .liv10{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv11{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv12{
               margin-left: 500px;
               margin-top: -278px;
               background: ;
            }
            .liv13{
               margin-left:-1500px;
               margin-top: 40px;
               background: ;
            }
            input[type=submit] {
			margin-left: 770px;
   			 width: 20em;  height: 2em;

				}

			input[type=submit]:hover {
    		background-color:#45526c;
    		color: white;
  }
  h1, .h1 {
    font-size: 2.5rem;
    color: #00ff00;
}
        </style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="facultydash.php">SPM DASHVIEW</a>

            <form>
                <button class="btn" style="border: none;
                background: peachpuff;
                margin: 10px;
                outline: none;
                color:black;
                font-size: 16px;"

                formaction="facultydash.php" >HOME</button>
              </form>
            <!-- LOGOUT BUTTN-->
            <form>
                <button class="btn" style="border: none;
                background: rgb(167, 10, 10);
                background-position: right;
                margin: 5px;;
                outline: none;
                color:white;
                font-size: 16px;"
                formaction="logout.php" >LOGOUT</button>
              </form>




            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0"></ul>
        </nav>

                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">PLO MAPPING</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="facultydash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">PLO MAPPING</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                SELECT CO's for Respective PLO's

                            </div>
                        </div>


        <div class="death">

                         <form method = "post">
	    <h3>Select Course ID</h3>
	    <select name = "section_name" >
	    <?php

				$sql= "SELECT section_name FROM section WHERE faculty_id = '$id'";
				$result = mysqli_query($conn,$sql);
				echo "<option value= '--select--'>--select--</option>";
				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name'];
					echo "<option value= '$section_name'>$section_name</option>";
				}

			?>
		</select>
        <div>
        </div>
		<br>

        <div class="liv1">
		<h3>FOR PLO 1 </h3>
		<p><input type = "checkbox" name= "plo1[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo1[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo1[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo1[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo1[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo1[]" value= "CO6"/> CO6</p>
		<p></p>


        <div class="liv2">
		<h3>FOR PLO 2 </h3>
		<p><input type = "checkbox" name= "plo2[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo2[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo2[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo2[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo2[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo2[]" value= "CO6"/> CO6</p>
		<p></p>

        <div class="liv3">
		<h3>FOR PLO 3 </h3>
		<p><input type = "checkbox" name= "plo3[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo3[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo3[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo3[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo3[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo3[]" value= "CO6"/> CO6</p>
		<p></p>

        <div class="liv4">
		<h3>FOR PLO 4 </h3>
		<p><input type = "checkbox" name= "plo4[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo4[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo4[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo4[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo4[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo4[]" value= "CO6"/> CO6</p>
				<p></p>

        <div class="liv5">
		<h3>FOR PLO 5 </h3>
		<p><input type = "checkbox" name= "plo5[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo5[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo5[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo5[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo5[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo5[]" value= "CO6"/> CO6</p>
				<p></p>

        <div class="liv6">
		<h3>FOR PLO 6 </h3>
		<p><input type = "checkbox" name= "plo6[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo6[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo6[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo6[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo6[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo6[]" value= "CO6"/> CO6</p>
				<p></p>

        <div class="liv7">
		<h3>FOR PLO 7 </h3>
		<p><input type = "checkbox" name= "plo7[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo7[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo7[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo7[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo7[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo7[]" value= "CO6"/> CO6</p>
				<p></p>

        <div class="liv8">
		<h3>FOR PLO 8 </h3>
		<p><input type = "checkbox" name= "plo8[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo8[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo8[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo8[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo8[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo8[]" value= "CO6"/> CO6</p>
				<p></p>

         <div class="liv9">
		<h3>FOR PLO 9 </h3>
		<p><input type = "checkbox" name= "plo9[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo9[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo9[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo9[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo9[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo9[]" value= "CO6"/> CO6</p>
				<p></p>

         <div class="liv10">
		<h3>FOR PLO 10 </h3>
		<p><input type = "checkbox" name= "plo10[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo10[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo10[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo10[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo10[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo10[]" value= "CO6"/> CO6</p>
				<p></p>

         <div class="liv11">
		<h3>FOR PLO 11 </h3>
		<p><input type = "checkbox" name= "plo11[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo11[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo11[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo11[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo11[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo11[]" value= "CO6"/> CO6</p>
				<p></p>

         <div class="liv12">
		<h3>FOR PLO 12 </h3>
		<p><input type = "checkbox" name= "plo12[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo12[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo12[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo12[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo12[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo12[]" value= "CO6"/> CO6</p>
				<p></p>

        <div class="liv13">
		<h3>FOR PLO 13 </h3>
		<p><input type = "checkbox" name= "plo13[]" value= "CO1"/> CO1</p>
		<p><input type = "checkbox" name= "plo13[]" value= "CO2"/> CO2</p>
		<p><input type = "checkbox" name= "plo13[]" value= "CO3"/> CO3</p>
		<p><input type = "checkbox" name= "plo13[]" value= "CO4"/> CO4</p>
		<p><input type = "checkbox" name= "plo13[]" value= "CO5"/> CO5</p>
		<p><input type = "checkbox" name= "plo13[]" value= "CO6"/> CO6</p>

		<input type = "submit" name= "submit" value= "SUBMIT"/>

	<?php

		if(isset($_POST['submit'])){

			///CHECKING DATA FOR NULL VALUE

			if(!empty($_POST['plo1']))
			{
				$plo1 = $_POST['plo1'];
				$a = implode(',',$plo1);
				$a = "'".$a."'";
			}
			else{
				$a = 'NULL';
			}

			if(!empty($_POST['plo2']))
			{
				$plo2 = $_POST['plo2'];
				$b = implode(',',$plo2);
				$b = "'".$b."'";
			}
			else{
				$b = 'NULL';
			}

			if(!empty($_POST['plo3']))
			{
				$plo3 = $_POST['plo3'];
				$c = implode(',',$plo3);
				$c = "'".$c."'";
			}
			else{
				$c = 'NULL';
			}

			if(!empty($_POST['plo4']))
			{
				$plo4 = $_POST['plo4'];
				$d = implode(',',$plo4);
				$d = "'".$d."'";
			}
			else{
				$d = 'NULL';
			}

			if(!empty($_POST['plo5']))
			{
				$plo5 = $_POST['plo5'];
				$e = implode(',',$plo5);
				$e = "'".$e."'";
			}
			else{
				$e = 'NULL';
			}

			if(!empty($_POST['plo6']))
			{
				$plo6 = $_POST['plo6'];
				$f = implode(',',$plo6);
				$f = "'".$f."'";
			}
			else{
				$f = 'NULL';
			}

			if(!empty($_POST['plo7']))
			{
				$plo7 = $_POST['plo7'];
				$g = implode(',',$plo7);
				$g = "'".$g."'";
			}
			else{
				$g = 'NULL';
			}

			if(!empty($_POST['plo8']))
			{
				$plo8 = $_POST['plo8'];
				$h = implode(',',$plo8);
				$h = "'".$h."'";
			}
			else{
				$h = 'NULL';
			}

			if(!empty($_POST['plo9']))
			{
				$plo9 = $_POST['plo9'];
				$i = implode(',',$plo9);
				$i = "'".$i."'";
			}
			else{
				$i = 'NULL';
			}

			if(!empty($_POST['plo10']))
			{
				$plo10 = $_POST['plo10'];
				$j = implode(',',$plo10);
				$j = "'".$j."'";
			}
			else{
				$j = 'NULL';
			}

			if(!empty($_POST['plo11']))
			{
				$plo11 = $_POST['plo11'];
				$k = implode(',',$plo11);
				$k = "'".$k."'";
			}
			else{
				$k = 'NULL';
			}

			if(!empty($_POST['plo12']))
			{
				$plo12 = $_POST['plo12'];
				$l = implode(',',$plo12);
				$l = "'".$l."'";
			}
			else{
				$l = 'NULL';
			}

			if(!empty($_POST['plo13']))
			{
				$plo13 = $_POST['plo13'];
				$m = implode(',',$plo13);
				$m = "'".$m."'";
			}
			else{
				$m = 'NULL';
			}




			$section_name = $_POST['section_name'];

			$sql = "INSERT INTO plo_table(section_name,plo1,plo2,plo3,plo4,plo5,plo6,plo7,plo8,plo9,plo10,plo11,plo12,plo13) VALUES ('$section_name',$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m)";

			//REMOVED ' ' from VALUES to handle NULL;

			if(mysqli_query($conn,$sql))
				{
					echo"DONE";
                    //done under new class should work with submit tag
				}
				else
				{
					echo"ERROR";
				}

		}

	?>


                    </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">GROUP3&copy;SPM-cse303-GR3</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

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
        <title>Charts</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<style>
    .potato{
        border-radius: 10px;
        padding:20px;
    background:	#f5f5f5 ;
    
    }
    .plowise{
        background:	#a7c5eb;
        font-size: 18px;
        border-radius: 10px;
        padding:40px;
    }
    .stwise{
        background:	#deeaee;
        font-size: 18px;
        border-radius: 10px;
        padding:40px;
    }
    .threec{
        background:	#92a8d1;
        border-radius: 10px;
        font-size: 18px;
        padding:40px;
    }
    .pb-4, .py-4 {
    padding-bottom: 1.5rem !important;
    position: auto;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    text-align: center;
}
h1, .h1 {
    font-size: 2.5rem;
    color: #00ff00;
}


    </style>
 
  
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="dept_head_dash.php">SPM DASHVIEW</a>

            <form>
                <button class="btn" style="border: none;
                background: peachpuff;
                margin: 10px;
                outline: none;
                color:black;
                font-size: 16px;" 
                
                formaction="dept_head_dash.php" >HOME</button>
              </form>
            <!-- LOGOUT BUTTN-->
            <form>
                <button class="btn" style="border: none;
                background: rgb(167, 10, 50);
                background-position: right;
                margin: 5px;; 
                outline: none;
                color:white;
                font-size: 16px;" 
                formaction="logout.php">LOGOUT</button>
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
                        <h1 class="mt-4">CHARTS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dept_head_dash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                SELECT DIFFERENT CRITERIAS FOR CHART
                                
                            </div>
                        </div>
 
         
  <div class="stwise">
         
   <div><b>SECTION WISE CHART</b> </div><br>

	<form action = "coursewise_plo_chart.php" method = "post">
		<th>Select Course ID</th>
		<select name = "section_name" >
			<?php

				$sql= "SELECT section_name FROM section";
				$result = mysqli_query($conn,$sql);
                echo "<option value= '--select--'>--select--</option>";
				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name']; 
					echo "<option value= '$section_name'>$section_name</option>"; 
				}

			?> 
		</select>
		
		<td>&nbsp;&nbsp;<input type = "submit" name = "submit" value ="View" ></td>
               </form>


    </div>
    <br>



<div class="plowise">

<div><b>STUDENT WISE BAR CHART</b> </div><br>

        <form action ="student_wise_chart.php" method = "post">
		<th>Enter Student ID</th>
		<td><input type = "text" name = "id" ></td>
		

		<td>&nbsp;&nbsp;<input type = "submit" name = "submit" value= "View" ></td>
		<br>
        </form>

<br>
<div><b>STUDENT WISE RADAR CHART</b> </div><br>

        <form action = "student_wise_radar_chart.php" method = "post">
		<th>Enter Student ID</th>
		<td><input type = "text" name = "id" ></td>
		
		<td>&nbsp;&nbsp;<input type = "submit" name = "submit" value ="View"></td>
		<br>
        </form>
</div>
<br>


<div class="threec">
         <div><b>3-COURSE COMPARISON</b> </div><br>


        <form action = "3_coursewise_plo_chart.php" method = "post">
		<th>Select Course ID</th>
		<select name = "section_name1" >
			<?php

				$sql= "SELECT section_name FROM section";
				$result = mysqli_query($conn,$sql);
                echo "<option value= '--select--'>--select--</option>";
				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name']; 
					echo "<option value= '$section_name'>$section_name</option>"; 
				}

			?> 
		</select>
		
       
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Select Course ID</th>
		
				<select name = "section_name2" >
			<?php

				$sql= "SELECT section_name FROM section";
				$result = mysqli_query($conn,$sql);
                echo "<option value= '--select--'>--select--</option>";
				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name']; 
					echo "<option value= '$section_name'>$section_name</option>"; 
				}

			?> 
		    </select>
		    
            
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Select Course ID</th>
		
				<select name = "section_name3" >
			<?php

				$sql= "SELECT section_name FROM section";
				$result = mysqli_query($conn,$sql);
                echo "<option value= '--select--'>--select--</option>";
				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name']; 
					echo "<option value= '$section_name'>$section_name</option>"; 
				}

			?> 
		    </select>
		    
 		    <td>&nbsp;&nbsp;<input type = "submit" name = "submit" value="View" ></td>
                    </form>
         </div>



</body>
                                    
                                </table>
                                </div>
                            </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                
                                    
                        </div>
                    </div>
                    
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">GROUP3 &copy; vykon-cse303-GR3</div>
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

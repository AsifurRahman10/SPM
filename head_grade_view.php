<?php

	require "connection.php";
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
        <title>Gradesheet</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<style>
    .potato{
        border-radius: 10px;
        padding:20px;
    background:	#f5f5f5 ;

    }
    .table{
        text-align: center;
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
.table {
    /* width: 100%; */
    /* margin-bottom: 1rem; */
    color: #1fce1c;
}
form {
    display: block;
    margin-top: 0em;
    color : #1fce1c;
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
                background: rgb(167, 0, 0);
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
                        <h1 class="mt-4">VIEW GRADESHEET</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dept_head_dash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Gradesheet</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Choose Section to view gradesheet

                            </div>
                        </div>
                        <div>


<div>
		<form action = "" method = "post">
		<th>Select Course ID</th>
		<select name = "section_name" >

            <?php

				$sql= "SELECT section_name FROM section WHERE faculty_id = '$id' ";
				$result = mysqli_query($conn,$sql);
                echo "<option value= --select-->--select--</option>";

				while($rows =  mysqli_fetch_assoc($result))
				{
					$section_name = $rows['section_name'];
					echo "<option value= '$section_name'>$section_name</option>";
				}

			?>
		</select>

		<td><input type = "submit" name = "submit" value = "View"></td>

        <br>
        <br>



   <table class="table table-striped">


  <thead class="thead-dark">
    <tr>
      <th scope="col">SECTION NAME</th>
      <th scope="col">ID</th>
      <th scope="col">QUIZ</th>
      <th scope="col">MID</th>
      <th scope="col">FINAL</th>
      <th scope="col">ATTENDANCE</th>
      <th scope="col">PROJECT</th>
      <th scope="col">ASSIGNMENT</th>
      <th scope="col">TOTAL</th>
      <th scope="col">GRADE</th>
      <th scope="col">CLO1</th>
      <th scope="col">CLO2</th>
      <th scope="col">CLO3</th>
      <th scope="col">CLO4</th>
      <th scope="col">CLO5</th>
      <th scope="col">CLO6</th>
    </tr>
  </thead>
  <tbody>


	<?php
	if(isset($_POST['submit']))
	{

		$section_name = $_POST['section_name'];

		$sql =	"SELECT * FROM grade_sheet WHERE section_name = '$section_name'";
	 $result = mysqli_query($conn,$sql);



		 if(mysqli_num_rows($result)>0)
		 {

			while($data = mysqli_fetch_assoc($result))
		 		{
		 			echo"<tr>";
		 			echo"<td>".$data['section_name']."</td>";
		 			echo"<td>".$data['id']."</td>";
		 			echo"<td>".$data['quiz']."</td>";
		 			echo"<td>".$data['mid']. "</td>";
		 			echo"<td>".$data['final']  ."</td>";
		 			echo"<td>".$data['attendance']."</td>";
		 			echo"<td>".$data['project']. "</td>";
		 			echo"<td>".$data['assignment']  ."</td>";
		 			echo"<td>".$data['total_marks']."</td>";
		 			echo"<td>".$data['grade']. "</td>";
		 			echo"<td>".$data['CLO1']  ."</td>";
		 			echo"<td>".$data['CLO2']."</td>";
		 			echo"<td>".$data['CLO3']."</td>";
		 			echo"<td>".$data['CLO4']. "</td>";
		 			echo"<td>".$data['CLO5']  ."</td>";
		 			echo"<td>".$data['CLO6']."</td>";
		 			echo"</tr>";


		 		}
		 }

		else
		{
			echo "0 results found";
		}

	}

?>

</tbody>
</table>


</div>

                        </div>
                                </div>
                            </div>

                        </div>
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

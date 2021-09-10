
<?php
   include('connection.php');
   session_start();


         $id = $_SESSION['id'];
         $sql1 = "SELECT  * FROM faculty WHERE id = '$id' ";
         $result1 = mysqli_query($conn,$sql1);
         $row=$result1->fetch_array();

         if($row > 0 ) {
            $f_name = $row ["f_name"];
            $l_name = $row ["l_name"];
            $f_id = $row ["id"];
            $email = $row ["email"];


         }


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>


        <style>

        .title{

             color: #4dd2ff;
             font-size:20px;
             font-weight:bold;

             border-radius:15px;
             padding:20px;
             background:#4dd2ff;
                }
        .banner_lol{

            padding:20px;
            box:block;
            position:center;

            margin-left:110px;
            border-radius:10px;

        }
        body{
        background-color: black;
    }
    .breadcrumb {

        background-color: #4dd2ff;

    }
    h1, .h1 {
    font-size: 2.5rem;
    color: #4dd2ff;
    }
    .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #4dd2ff;
}


.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #000000;
}

.table thead th {
  vertical-align: bottom;
  border-bottom:  solid #125aa2;
  border-color:#66ffb1
}

.title {
    color: black;
    font-size: 20px;
    font-weight: bold;
    border-radius: 15px;
    padding: 20px;
    background: #4dd2ff;
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
                background: rgb(167, 10, 50);
                background-position: right;
                margin: 5px;;
                outline: none;
                color:white;
                font-size: 16px;"
                formaction="logout.php" >LOGOUT</button>
              </form>

            <!-- Navbar Search-->

            <ul class="navbar-nav ml-auto ml-md-0">
                <lib class="nav-item dropdown">

            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">DASHBOARD LINKS</div>
                            <a class="nav-link" href="https://irasv1.iub.edu.bd/#/">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ATTENDANCE
                            </a>

                            <a class="nav-link" href="https://www.baetebangladesh.org/">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                BAETE Website
                            </a>
                            <a class="nav-link" href="http://www.iebbd.org/">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                IEB
                            </a>
                            <a class="nav-link" href="http://www.iub.edu.bd/">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                IUB Website
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        FACULTY
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Welcome<?php echo " ". $f_name." ".$l_name; ?></h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?php echo "Faculty ID - ".$f_id." ";?><?php echo" "."||"." "."email - ".$email;?> </li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">ASSESSMENT</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="assessment_faculty.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">COURSE MAPPING</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="plo_mapping.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">VIEW GRADESHEET</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="grade_view.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">INSERT GRADESHEET</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="grade_sheet_insert.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">REPORTS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="charts.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                <div class=title>Your Courses<i class="bi bi-arrow-down-square-fill"></i></div>
                                <br>
                                    <table class="table table-bordered">
                                        <thead class="table-danger">
                                        <tr>
                                    <th scope="col">COURSE ID</th>
                                    <th scope="col">COURSE NAME</th>
                                    <th scope="col">SECTION</th>
                                    <th scope="col">SEMESTER</th>
                                    <th scope="col">YEAR</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php


                                        $sql =	"SELECT * FROM section WHERE faculty_id = '$id'";
                                        $result = mysqli_query($conn,$sql);

                                        if(mysqli_num_rows($result)>0)
                                        {

                                            while($data = mysqli_fetch_assoc($result))
                                                {
                                                    echo"<tr>";
                                                    echo"<td>".$data['course_ID']."</td>";
                                                    echo"<td>".$data['course_name']."</td>";
                                                    echo"<td>".$data['section']."</td>";
                                                    echo"<td>".$data['semester']. "</td>";
                                                    echo"<td>".$data['year']  ."</td>";
                                                    echo"</tr>";

                                                }
                                        }

                                        else
                                        {
                                            echo "Sorry no courses to view for now :)";
                                        }



                                ?>

                                </tbody>
                                </table>


                               <!--- <div><b>IUB LINKED INFO BANNER FOR SAFETY<b></div> --->
                               <div class="table-responsive">

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

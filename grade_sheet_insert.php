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
        <title>GRADESHEET INSERT</title>
        <style>
            .tab input{
             margin-left: 15em;
            margin-bottom: 8px;
             }
            .tab label{
             text-align: left;
            position:absolute;
            margin-left:30px;
             }
            .tab select{
            margin-top:2px;
            margin-bottom: 8px;
            margin-left:15em;
            width:260px;
            }

            .tab{

                display:block;
                border-radius: 20px;
                font-weight: bold;


            }
            h1, .h1 {
    font-size: 2.5rem;
    color: #00ff00;
}


    </style>

    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                        <h1 class="mt-4">INSERT GRADESHEET</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="facultydash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">GRADESHEET</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                PLEASE CHOOSE COURSE FOR UPLOADING GRADESHEET DATA

                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                SELECT DESIRED COURSE AND FILL UP THE NECESSARY FIELDS
                            </div>

                            <div class="tab">
                                            <form action = "" method = "post">
                                            <br>

                                                <th><label>Enter Course ID</label></th>

                                                <select name = "section_name">
                                                <?php

                                                $sql= "SELECT section_name FROM section WHERE faculty_id = '$id' ";
                                                    $result = mysqli_query($conn,$sql);
                                                    echo "<option value= '--select--'>--select--</option>";
                                                    while($rows =  mysqli_fetch_assoc($result))
                                                    {
                                                        $section_name = $rows['section_name'];
                                                        echo "<option value= '$section_name'>$section_name</option>";
                                                    }

                                                    ?>
                                                </select>
                                                <br>
                                                <tr>

                                                <label>Enter Student ID</label>
                                                <td><input type = "text" name = "id" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter Quiz Marks</label>
                                                <td><input type = "text" name = "quiz" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter Mid Marks</label>
                                                <td><input type = "text" name = "mid" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter Final Marks</label>
                                                <td><input type = "text" name = "final" ></td>
                                                </tr>
                                                <br>
                                                <label>Enter Attendance Marks</label>
                                                <td><input type = "text" name = "attendance" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter Project Marks</label>
                                                <td><input type = "text" name = "project" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter Assignment Marks</label>
                                                <td><input type = "text" name = "assignment" ></td>
                                                <br>
                                                </tr>
                                                <tr>
                                                <label>Enter Grade</label>
                                                <td><input type = "text" name = "grade" ></td>
                                                </tr>
                                                <tr>
                                                <br>
                                                <tr>
                                                <label>Enter CLO1</label>
                                                <td><input type = "text" name = "CLO1" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter CLO2</label>
                                                <td><input type = "text" name = "CLO2" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter CLO3</label>
                                                <td><input type = "text" name = "CLO3" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter CLO4</label>
                                                <td><input type = "text" name = "CLO4" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter CLO5</label>
                                                <td><input type = "text" name = "CLO5" ></td>
                                                </tr>
                                                <br>
                                                <tr>
                                                <label>Enter CLO6</label>
                                                <td><input type = "text" name = "CLO6" ></td>
                                                </tr>
                                                <br>
                                                <td></td>
                                                <td><input type = "submit" name = "submit" ></td>
                                                </tr>
                                        </div>
                                                <?php

                                                    if(isset($_POST['submit']))
                                                    {
                                                        $section_name = $_POST['section_name'];
                                                        $id = $_POST['id'];
                                                        $quiz = $_POST['quiz'];
                                                        $mid = $_POST['mid'];
                                                        $final = $_POST['final'];
                                                        $attendance = $_POST['attendance'];
                                                        $project = $_POST['project'];
                                                        $assignment = $_POST['assignment'];
                                                        $grade = $_POST['grade'];
                                                        $CLO1 = $_POST['CLO1'];
                                                        $CLO2 = $_POST['CLO2'];
                                                        $CLO3 = $_POST['CLO3'];
                                                        $CLO4 = $_POST['CLO4'];
                                                        $CLO5 = $_POST['CLO5'];
                                                        $CLO6 = $_POST['CLO6'];

                                                        $marks = array($quiz,$mid,$final,$attendance,$project,$assignment);

                                                        $total_marks = array_sum($marks);


                                                        if(!empty($quiz))
                                                        {
                                                            $quiz = "'".$quiz."'";
                                                        }
                                                        else{
                                                            $quiz = 'NULL';
                                                        }

                                                        // TO CHECK if the value is inserted or not, if not entered then INSERT NULL

                                                        if(!empty($mid))
                                                        {
                                                            $mid = "'".$mid."'";
                                                        }
                                                        else{
                                                            $mid = 'NULL';
                                                        }

                                                        // TO CHECK if the value is inserted or not, if not entered then INSERT NULL


                                                        if(!empty($final))
                                                        {
                                                            $final = "'".$final."'";
                                                        }
                                                        else{
                                                            $final = 'NULL';
                                                        }

                                                        // TO CHECK if the value is inserted or not, if not entered then INSERT NULL


                                                        if(!empty($attendance))
                                                        {
                                                            $attendance = "'".$attendance."'";
                                                        }
                                                        else{
                                                            $attendance = 'NULL';
                                                        }

                                                        if(!empty($project))
                                                        {
                                                            $project = "'".$project."'";
                                                        }
                                                        else{
                                                            $project = 'NULL';
                                                        }

                                                        if(!empty($assignment))
                                                        {
                                                            $assignment = "'".$assignment."'";
                                                        }
                                                        else{
                                                            $assignment = 'NULL';
                                                        }

                                                        if(!empty($CLO1))
                                                        {
                                                            $CLO1 = "'".$CLO1."'";
                                                        }
                                                        else{
                                                            $CLO1 = 'NULL';
                                                        }

                                                        if(!empty($CLO2))
                                                        {
                                                            $CLO2 = "'".$CLO2."'";
                                                        }
                                                        else{
                                                            $CLO2 = 'NULL';
                                                        }

                                                        if(!empty($CLO3))
                                                        {
                                                            $CLO3 = "'".$CLO3."'";
                                                        }
                                                        else{
                                                            $CLO3 = 'NULL';
                                                        }

                                                        if(!empty($CLO4))
                                                        {
                                                            $CLO4 = "'".$CLO4."'";
                                                        }
                                                        else{
                                                            $CLO4 = 'NULL';
                                                        }

                                                        if(!empty($CLO5))
                                                        {
                                                            $CLO5 = "'".$CLO5."'";
                                                        }
                                                        else{
                                                            $CLO5 = 'NULL';
                                                        }

                                                        if(!empty($CLO6))
                                                        {
                                                            $CLO6 = "'".$CLO6."'";
                                                        }
                                                        else{
                                                            $CLO6 = 'NULL';
                                                        }


                                                        $sql= "INSERT INTO grade_sheet (section_name,serial_id,id,quiz,mid,final,attendance,project,assignment,total_marks,grade,CLO1,CLO2,CLO3,CLO4,CLO5,CLO6) VALUES ('$section_name',(SELECT serial_id FROM plo_table WHERE section_name = '$section_name'),'$id',$quiz,$mid,$final,$attendance,$project,$assignment,'$total_marks','$grade',$CLO1,$CLO2,$CLO3,$CLO4,$CLO5, $CLO6 )" ;

                                                        // REMOVED '' from VALUES to handle NULL entry;

                                                        if(mysqli_query($conn,$sql))
                                                        {
                                                            echo "DONE";
                                                        }
                                                        else
                                                        {
                                                            echo "ERROR";
                                                        }
                                                    }
                                                ?>

                                        </form>

                                    </div>


                                        </tbody>
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

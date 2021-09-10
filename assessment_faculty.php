<?php
	include "connection.php";
	session_start();
	$id= $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Assessment</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<style>
    .potato{
        border-radius:10px;
        padding:20px;
    background:	#b9bbdf ;

    }
    h1, .h1 {
    font-size: 2.5rem;
    color: #4dd2ff;
}
    </style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="facultydash.php">VYKON DASHVIEW</a>

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
                        <h1 class="mt-4">ASSESSMENT</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="facultydash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">ASSESSMENT</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                PLEASE CHOOSE COURSE FOR UPLOADING ASSESSMENT MATERIALS

                         </div>
                        </div>
                        <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                             ASSESSMENT UPLOAD
                            </div>
                            <div class="card-body">
    <div class="table-responsive">
                                <table>
                                <form action = "" method="post" enctype="multipart/form-data">
                                <h3>SELECT DESIRED COURSE</h3>
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
        <div class = "potato">
        <h3>Assessment</h3>
		<p><input type="file" name="file" id="file" multiple></p>
        <input type='submit' name='submit1' value='Upload'>
        </div>
        </form>
        <?php

    if(isset($_POST['submit1'])){

    $filename = $_FILES['file']['name'];
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'img/'.$filename);

      $sql = "INSERT into assessment(section_name,assessment_plan) VALUES('$section_name','$filename')";
      if (mysqli_query($conn,$sql)){
          echo "File Sucessfully uploaded";
      }else{
          echo "Error";
      }

  }
  ?>

                                </table>
                                </div>


                                        </tbody>
                                    </table>
                                    </div>
                                    </div>

                                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                             QUESTION BANK UPLOAD
                            </div>
                            <div class="card-body">
    <div class="table-responsive">
                                <table>
                                <form action = "" method="post" enctype="multipart/form-data">
                                <h3>SELECT DESIRED COURSE</h3>
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
        <div class = "potato">
        <h3>Question Bank</h3>
		<p><input type="file" name="file" id="file" multiple></p>
        <input type='submit' name='submit2' value='Upload'>
        </div>

                        </form>
                        <?php

if(isset($_POST['submit2'])){


    $filename = $_FILES['file']['name'];

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'img/'.$filename);


      $sql = "INSERT into assessment(section_name,question_bank) VALUES('$section_name','$filename')";
      if (mysqli_query($conn,$sql)){
          echo "File Sucessfully uploaded";
      }else{
          echo "Error";
      }

  }
  ?>

                                </table>
                                </div>

                                </tbody>
                                    </table>

                                </div>
                            </div>



                                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                             MARKS OBTAINED UPLOAD
                            </div>
                            <div class="card-body">
    <div class="table-responsive">
                                <table>
                                <form action = "" method="post" enctype="multipart/form-data">
                                <h3>SELECT DESIRED COURSE</h3>
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
        <div class = "potato">
        <h3>Marks Obtained</h3>
		<p><input type="file" name="file" id="file" multiple></p>
        <input type='submit' name='submit3' value='Upload'>
        </div>

                        </form>
                        <?php

if(isset($_POST['submit3'])){


    $filename = $_FILES['file']['name'];


    move_uploaded_file($_FILES['file']['tmp_name'],'img/'.$filename);


      $sql = "INSERT into assessment(section_name,marks_obtained) VALUES('$section_name','$filename')";
      if (mysqli_query($conn,$sql)){
          echo "File Sucessfully uploaded";
      }else{
          echo "Error";
      }

  }
  ?>
                                  </table>
                                </div>
                            </div>
                                </tbody>
                                    </table>

                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                             COURSE OUTLINE UPLOAD
                            </div>
                            <div class="card-body">
    <div class="table-responsive">
                                <table>
                                <form action = "" method="post" enctype="multipart/form-data">
                                <h3>SELECT DESIRED COURSE</h3>
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
        <div class = "potato">
        <h3>Course Outline</h3>
		<p><input type="file" name="file" id="file" multiple></p>
        <input type='submit' name='submit4' value='Upload'>
        </div>

                        </form>
                        <?php

if(isset($_POST['submit4'])){


    $filename = $_FILES['file']['name'];

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],'img/'.$filename);


      $sql = "INSERT into assessment(section_name,course_outline) VALUES('$section_name','$filename')";
      if (mysqli_query($conn,$sql)){
          echo "File Sucessfully uploaded";
      }
      else{
          echo "Error";
      }

  }
  ?>

                                </table>
                                </div>
                            </div>
                                </tbody>
                                    </table>


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


<?php

	include "connection.php";

	session_start();
  $error = NULL;
	   if(isset ($_POST["login"]) ) {


		  $id = mysqli_real_escape_string($conn,$_POST['id']);
		  $password = mysqli_real_escape_string($conn,$_POST['password']);
		  $_SESSION['id'] = $id;

			$sql1 = "SELECT  * FROM faculty WHERE id = '$id' and password = '$password'";
			$result1 = mysqli_query($conn,$sql1);
			$num_row1 = mysqli_num_rows($result1);

			$sql2 = "SELECT  * FROM student WHERE id = '$id' and password = '$password'";
			$result2 = mysqli_query($conn,$sql2);
			$num_row2 = mysqli_num_rows($result2);

			$sql3 = "SELECT  * FROM dept WHERE dept_head_id = '$id' and password = '$password'";
            $result3 = mysqli_query($conn,$sql3);
            $num_row3 = mysqli_num_rows($result3);

			if($num_row1 > 0 ) {
					$data = mysqli_fetch_array($result1);
					$_SESSION["id"] = $data["id"];
					header('Location: facultydash.php');
					}
			if($num_row2 > 0) {
					$data = mysqli_fetch_array($result2);
					$_SESSION["id"] = $data["id"];
					header('Location: student_dash.php');
			}
			if($num_row3 > 0) {

					$data = mysqli_fetch_array($result3);
					$_SESSION["id"] = $data["dept_head_id"];
					header('Location: dept_head_dash.php');
			}
      if($num_row1==0||$num_row2==0 || $num_row3==0){


      $error ='ID OR PASS NOT FOUND';

      }

		}

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SPM Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
<style>
.logo{
  text-align: left;
}
.brand-wrapper .logo {
    height: 50px;
    margin-left: 0px;
    text-align: left;
}
.he{
  font-family: Impact, 'Arial Narrow Bold', sans-serif;
  font-size: 50px;
  font-style: bold;
}
.error {

  font-size:20px;
  color:#ff414d;
  margin-left:60px;
  font-style: bold;
  font-family:arial;

}
.vert{

 color:#00587a;


}

body {
    font-family: "Karla", sans-serif;
    background-color: #cc66ff;
;
    min-height: 100vh;
}

</style>
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">

            <!--insert your image here-->
            <img src="assets/images/login.png" alt="login" class="login-card-img">
            <!--insert your image here-->

          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">

			<div class="he">S P M</div>



              </div>
              <p class="login-card-description">Sign into SPM OBES</p>
              <form class="my_form" action="index.php"  method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="User ID">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control"class="error" placeholder="***********">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                  <div class="error"><?php echo $error;?></div>
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>

                <nav class="login-card-footer-nav">

                  <a href="#!"> | SPM Database 303 SEC2 GROUP 3</a>

                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

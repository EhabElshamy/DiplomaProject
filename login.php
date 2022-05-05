<?php
    session_start();
    include "connect.php";
    if(isset($_SESSION['username'])){
      header("Location: index.php");
    }
    if(isset($_POST['login']))
{
	$username=$_POST['username'];
  $password=$_POST['password'];
  $query="SELECT * FROM admins WHERE BINARY name = BINARY '$username' AND BINARY password = BINARY '$password'";
  $result=mysqli_query($conn,$query);
  if (!$result) {
      die(mysqli_error($conn));
  }
  $num=mysqli_num_rows($result);
  if($num==1){
    //$_SESSION['id']=$id;	 
      $_SESSION['username'] = true;
      $_SESSION['username'] = $username;
      header("Location: index.php");
  }   
  else {
    echo "invalid credintials";
  }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Affairs| Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    body {
          /* background-image: url("images/school-management-software-500x500.png");
          background-repeat: no-repeat;
          background-position: top; */

        }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Student</b> Affairs
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to continue</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

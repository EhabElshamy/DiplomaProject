<?php
    session_start();
    include "../connect.php";
    if(isset($_SESSION['username'])){
      header("Location: index.php");
    }
	$LoginInfoQuery  = "SELECT * from `login` WHERE `id` = 1";
	$LoginInfoResult = mysqli_query($conn,$LoginInfoQuery);
	foreach ( $LoginInfoResult as $LoginInfoRow){
		$main_photo 	= $LoginInfoRow['main'];
		$logo_photo 	= $LoginInfoRow['logo'];
		$login_message 	= $LoginInfoRow['message'];
	}
    if(isset($_POST['login'])){
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
			header("Location: ../index.php");
		}   
		else {
			echo "invalid credintials";
		}

   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Affairs</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="#" class="login100-form validate-form">
					<img class="img-circle elevation-2"  src= "../<?=$logo_photo?>" >
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">

					</div>
			

					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<?=$login_message?>
						</span>
					</div>


				</form>

				<div class="login100-more" style="background-image: url('../<?=$main_photo?>');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
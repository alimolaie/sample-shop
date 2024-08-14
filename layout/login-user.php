<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'shop');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
session_start();
$error='';
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form
    $myusername = mysqli_real_escape_string($db,$_POST['mobile']);
    $mypassword = mysqli_real_escape_string($db,md5($_POST['password']));

    $sql = "SELECT * FROM members WHERE mobile = '$myusername' and password = '$mypassword'";

    $result = mysqli_query($db,$sql);
    $row = mysqli_num_rows($result);
    $count = mysqli_num_rows($result);

    if($count == 1) {

        // session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        header("location: index.php");
    } else {
        $error = "رمز عبور یا نام کاربری صحیح نمی باشد";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ورود کاربر</title>

	<!-- styles  -->
	<link rel="stylesheet" href="asset_login/css/animate.css">
	<link rel="stylesheet" type="text/css" href="asset_login/css/bootstrap4-rtl.min.css">
	<link rel="stylesheet" type="text/css" href="asset_login/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="asset_login/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="asset_login/css/style.css" />
	<!--/ styles  -->

</head>
<body class="rtl">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<!-- form -->
				<form class="login100-form validate-form" method="post" action="">
					<!-- logo of form -->
					<span class="login100-form-title p-b-48">
						<img class="logo" src="asset_login/img/logo.png" width="200px">
					</span>
					<!-- / logo of form -->

					<span class="login100-form-title p-b-26 text-secondary">ورود به ناحیه کاربری</span>

					<!-- please enter your email -->
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="mobile">
						<span class="focus-input100" data-placeholder="موبایل"></span>
					</div>
					<!--  / please enter your email -->

					<!-- please enter your username -->
					<div class="wrap-input100 validate-input">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="رمز عبور"></span>
					</div>
					<!-- /  please enter your username -->

					<!-- login button -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="login">ورود</button>
						</div>
					</div>
					<!-- / login button -->

					<!-- register-->
					<div class="text-center p-t-115">
							<span class="txt1">
								هنوز ثبت نام نکرده اید؟!
							</span>
						<a class="txt2 text-danger" href="user-register.php">ثبت نام کنید</a>
					</div>
					<!-- / register-->

				</form>
				<!-- / form -->

			</div>
		</div>
	</div>
	
	<!-- Scripts -->
	<script src="asset_login/js/jquery-3.1.1.min.js"></script>
	<script src="asset_login/js/bootstrap.min.js"></script>
	<script src="asset_login/js/scripts.js"></script>
	<!-- / Scripts -->

</body>
</html>

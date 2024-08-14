<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ثبت نام کاربر</title>

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
            <form class="login100-form validate-form" method="post" action="register_action.php">
                <!-- logo of form -->
                <span class="login100-form-title p-b-48">
						<img class="logo" src="asset_login/img/logo.png" width="200px">
					</span>
                <!-- / logo of form -->

                <span class="login100-form-title p-b-26 text-secondary">ثبت نام کاربر</span>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="full_name">
                    <span class="focus-input100" data-placeholder="نام و نام خانوادگی"></span>
                </div>
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
                        <button class="login100-form-btn" name="register" type="submit">ثبت نام</button>
                    </div>
                </div>
                <!-- / login button -->

                <!-- register-->
                <div class="text-center p-t-115">
							<span class="txt1">
								حساب دارید؟!
							</span>
                    <a class="txt2 text-danger" href="login-user.php">وارد شوید</a>
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

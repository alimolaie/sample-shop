<?php
include '../admin/connect.php';
if (isset($_SESSION['login']))    //اگر سشنی با اسم یوزرلاگین بود
{
    header("location:../layout/index.php");  //هدایتش کن به صفحه ایندکس
    exit();
}
if (isset($_POST['login'])) {  // اگر دکمه لاگین فشرده بود
    $phone = $_POST['phone'];
    $pass = md5($_POST['password']);
    $user = $connect->prepare("SELECT * FROM `users` WHERE phone=:phone AND password=:password");
    $user->bindValue(":phone", $phone);
    $user->bindValue(":password", $pass);
    $user->execute();  //کویری اجرا کن
    if ($user->rowCount() > 0) {   //اگر کاربری وجود داشت
        $_SESSION['login'] = $phone;   //سسشن ایجاد
        echo "<div class='alert alert-success my-3'>شما با موفقیت وارد شدید</div>";
    } else {
        echo "<div class='alert alert-danger my-3'>کلمه عبور یا شماره تماس صحیح نیست</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود و ثبت نام</title>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login-register.css">
</head>

<body>
    <div class="main-box">
        <div class="form-box"> 
            <div class="button-box">    
                <div id="account-btn"></div>
                <a type="button" class="toggle-btn" href="registr.php">ثبت نام</a>
                <a type="button" class="toggle-btn" href="login.php">ورود</a>
            </div>
            
            <form method="post" action="login.php" id="login" class="input-group">
                <input type="number" class="input-field" name="phone" placeholder="  نام کاربری یا شماره تلفن" require>
                <input type="password" class="input-field" name="password" placeholder="رمز عبور" require>
                <br>
                <br>
                <br>
                <span>
                <a href="registr.php">
                    ثبت نام نکرده اید؟
                </a>
                </span>
                <button type="submit" class="submit-btn" name="login">ورود</button>
            </form>


        </div>
    </div>
    <script src="../assets/js/login-register.js"></script>
</body>

</html>

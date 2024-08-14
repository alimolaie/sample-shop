<!DOCTYPE html>
<html lang="fa">
<head>
    <title>ثبت نام</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login-register.css">
</head>
<?php
include '../admin/connect.php'; //اتصال به database
if (isset($_POST['register'])) {  //اگر چیزی به اسم رجیستر با متد پست فرستاده شده بود
    $first = $_POST['first_name'];   ///این پوت نیم رو که با پست فرستاده شده رو میریزیم داخل متغییرموردنظر
    $last = $_POST['last_name'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);  //هش کردن
    $password_confirm = md5($_POST['password-confirm']);
    if ($password == $password_confirm) {
        $query = "INSERT INTO `users` (`ID`, `first_name`, `last_name`, `phone`,`password`,`creat_add`) VALUES (NULL, ?, ?,?,?,?);";
        $insert = $connect->prepare($query);   //به دیتابیس وصل شو و کویری رو اجرا کن
        $insert->bindValue(1, $first); //نیم رو مقداردهی کن بجای علامت سوال اولی نامی که کاربر وارد کرده
        $insert->bindValue(2, $last);
        $insert->bindValue(3, $phone);
        $insert->bindValue(4, $password);
        $insert->bindValue(5, date('Y/m/d'));    //تاریخ سیستم امروز
        $insert->execute();   //اجرا کن کویری
        if ($insert) {   // اگر اضافه کردی
            $_SESSION['login']=$phone;   //شن ایجاد می کنیم به اسم یوزر لاگین و شماره تلفن کاربر را می ریزیم داخلش
            header("location:../layout/index.php");   //هدایت شو به مسیر پوشه قبلی و فایل ایندکس
            exit(); //از این صفحه خارج شو
        }


    } else {
        echo "<div class='alert alert-danger my-3'>رمز عبور و تکرار آن یکسان نیست</div>";
    }
}

?>
<style>
    .input-group {

        top: 100px;}
</style>
<body>
<div class="main-box">
    <div class="form-box">
        <div class="button-box">
            <div id="account-btn"></div>
            <a type="button" class="toggle-btn mr-3" href="login.php">ورود</a>
            <a type="button" class="toggle-btn mr-1" href="registr.php">ثبت نام</a>
        </div>

        <form method="post" action="registr.php" id="login" class="input-group">
            <input type="text" class="input-field" name="first_name" placeholder="نام" require>
            <input type="text" class="input-field" name="last_name" placeholder="نام خانوادگی" require>
            <input type="text" class="input-field" name="phone" placeholder="شماره تلفن" require>
            <input type="password" class="input-field" name="password" placeholder="رمز عبور" require>
            <input type="password" class="input-field" name="password-confirm" placeholder="تکرار رمز عبور" require>

            <br>
            <br>
            <br>

            <button type="submit" class="submit-btn mt-3" name="register">ثبت نام</button>
        </form>


    </div>
</div>
<script src="../assets/js/login-register.js"></script>










<!--<div class="container-fluid">-->
<!--    <div class="w-50   " style="margin-right: 25%; z-index: 1000">-->
<!--        <div class="card">-->
<!--           <div class="card-header">-->
<!--               <p>ثبت نام</p>-->
<!--           </div>-->
<!--            <div class="card-body"> -->
<!--             <form method="post" action="registr.php">-->
<!--                 <div class="form-group " style="margin-right: 25%;">-->
<!--                     <label for="first_name">   نام :        </label>-->
<!--                     <input type="text" name="first_name" class="mr-5" required>-->
<!--                 </div>-->
<!--                 <div class="form-group py-2 " style="margin-right: 25%;">-->
<!--                     <label for="last_family">نام خانوادگی: </label>-->
<!--                     <input type="text" name="last_name" required>-->
<!--                 </div>-->
<!--                 <div class="form-group py-2 " style="margin-right: 25%;">-->
<!--                     <label for="phone">شماره تماس:   </label>-->
<!--                     <input type="number" name="phone" required>-->
<!--                 </div>-->
<!--                 <div class="form-group py-2 " style="margin-right: 25%;">-->
<!--                     <label for="password">رمز عبور:</label>-->
<!--                     <input type="password" name="password" class="mr-4" required>-->
<!--                 </div>-->
<!--                 <div class="form-group py-2 " style="margin-right: 25%;">-->
<!--                     <label for="password-confirm">تکرار رمز عبور:</label>-->
<!--                     <input type="password" name="password-confirm" required>-->
<!--                 </div>-->
<!---->
<!--                 <button class="btn btn-primary float-center" name="register" value=" ثبت اطلاعات" type="submit">  ثبت اطلاعات</button>-->
<!--             </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
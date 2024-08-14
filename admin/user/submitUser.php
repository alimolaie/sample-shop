<?php
include '../connect.php';        //وصل شدن بع دیتابیس سا فایل کانکت
$password = md5($_POST['password']);  //هش کردن
$password_confirm = md5($_POST['password-confirm']);
if ($password == $password_confirm) {   //اگر رمز عبور و تکرار برابر بودن
    if (isset($_POST['insertUser'])) {     //
        $query = "INSERT INTO `users` (`ID`,`type_access`, `first_name`, `last_name`, `phone`,`password`,`creat_add`) VALUES (NULL, ?,?, ?,?,?,?);";
        $insert = $connect->prepare($query);   //وصل شو به دیتا بیس و کویری اجرا کن
        $insert->bindValue(1, $_POST['type']);
        $insert->bindValue(2, $_POST['name']); //نیم رو مقداردهی کن بجای علامت سوال اولی نامی که کاربر وارد کرده
        $insert->bindValue(3, $_POST['family']);
        $insert->bindValue(4, $_POST['phone']);
        $insert->bindValue(5, $password);
        $insert->bindValue(6, date('Y/m/d'));    //تاریخ امروز
        $insert->execute();   //اجرا کن کویری
        if ($insert) {
            header("location:user.php?submit=123");       //هدایت شو به صفحه فلان با چیغام فلان
            exit();
        }
    }

} else {
        header("location:insertUser.php?errorPass=123");       //هدایت شو به صفحه فلان با چیغام فلان
        exit();

}

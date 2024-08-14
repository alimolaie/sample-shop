<?php
include '../admin/connect.php';
if (isset($_POST['comment'])) {
    $phone=$_POST['user_id'];
    $user = $connect->prepare("SELECT * FROM `users` WHERE phone=$phone");
    $user->execute();
    $user = $user->fetch();
    $user= $user['id'];
    $product=$_POST['product_id'];

    $query = "INSERT INTO `comment`(`id`, `user`, `product`, `comment`, `creat_add`) VALUES (NULL, ?, ?,?,?);";
    $insert = $connect->prepare($query);   //به دیتابیس وصل شو و کویری رو اجرا کن
    $insert->bindValue(1, $user); //نیم رو مقداردهی کن بجای علامت سوال اولی نامی که کاربر وارد کرده
    $insert->bindValue(2, $product);
    $insert->bindValue(3, $_POST['text']);
    $insert->bindValue(4, date('Y/m/d'));    //تاریخ سیستم امروز
    $insert->execute();   //اجرا کن کویری
    if ($insert) {   // اگر اضافه کردی
        header("location:index.php?comment=123");
        exit(); //از این صفحه خارج شو
    }

}
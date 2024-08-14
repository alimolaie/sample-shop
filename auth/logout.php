<?php
include '../admin/connect.php';   //چه باشه چه نباشه فرقی نداره
if (isset($_SESSION['login']))    //اگر سشنی با اسم یوزر لاگین وجود داشت
{
    unset($_SESSION['login']);  //بیا سشن و حذف کن
    header("location:login.php");   //برو به صفحه لاگین
    exit();
}


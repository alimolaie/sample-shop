<?php
include '../connect.php';
if (isset($_POST['insertProduct'])) { //اگر همچین پوستی وجود داشت بیا این کارارو بکن
    $imagename = $_FILES['image']['name']; //اون فایلایی که پست کردیم با اینپوت  اونایی که عکس هستند نامشونو بگیر و بریز
    $temp = $_FILES['image']['tmp_name']; //محل ذخیره سازی موقت تصویرامون
    $type = $_FILES['image']['type']; //نوع فایل هست

    if (is_uploaded_file($temp)) { //اگر اپلود کردی فایلی که توی تمپ هست
        $sav = time() . rand(1000, 8888) . $imagename;
        $location = "../images/" . $sav; //مسیر تصویرمون
        $upld = move_uploaded_file($temp, $location); //فایلمون رو اپلود میکنیم
        if ($upld) {
            $query = "INSERT INTO `product` (`ID`, `name`, `category`,`price`, `image`, `number`, `creat_add`) VALUES (NULL, ?,?, ?,?,?,?);";
            $insert = $connect->prepare($query);
            $insert->bindValue(1, $_POST['name']);
            $insert->bindValue(2, $_POST['category']);
            $insert->bindValue(3, $_POST['price']);
            $insert->bindValue(4, $sav);
            $insert->bindValue(5, $_POST['number']);
            $insert->bindValue(6,date('Y/m/d'));
            $insert->execute();
            if ($insert) {
                header("location:product.php?submit=123");
                exit();
            }
        }
    }
    else {
        header("location:insertProduct.php?error=1222");
        exit();
    }
}

<?php
include '../connect.php';
if(isset($_POST['editProduct']))
{
    $imageName=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    $type=$_FILES['image']['type'];

    if(is_uploaded_file($tmp))
    {
        $sav=time().rand(100,999).$imageName;
        $location="../images/".$sav;
        $move=move_uploaded_file($tmp,$location);
        if($move)
        {
            $query="UPDATE `product` SET `name` = ?,`category`=?, `price` =?, `image` = ?,`number`=?,`creat_add`=? WHERE `product`.`ID` = ?;";
            $insert=$connect->prepare($query);
            $insert->bindValue(1, $_POST['name']);
            $insert->bindValue(2, $_POST['category']);
            $insert->bindValue(3, $_POST['price']);
            $insert->bindValue(4, $sav);
            $insert->bindValue(5, $_POST['number']);
            $insert->bindValue(6,date('Y/m/d'));
            $insert->bindValue(7,$_POST['id']);

            $insert->execute();
            if($insert)
            {
                header("location:product.php?edit=123");
                exit();
            }
        }
    }
    else {
        header("location:insertProduct.php?error=1222");
        exit();
    }
}

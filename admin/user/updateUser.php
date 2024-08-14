<?php
include '../connect.php';
if (isset($_POST['editUser'])) {

    $query = "UPDATE `users` SET `type_access` = ?,`first_name` = ?, `last_name` =?, `phone` = ? WHERE `users`.`ID` = ?;";
    $update = $connect->prepare($query);
    $update->bindValue(1, $_POST['type']);
    $update->bindValue(2, $_POST['name']);
    $update->bindValue(3, $_POST['family']);
    $update->bindValue(4, $_POST['phone']);
    $update->bindValue(5, $_POST['id']);
    $update->execute();

    if ($update) {
        header("location:user.php?edit=123");
        exit();
    }

}

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fullName=$_POST['full_name'];
$mobile=$_POST['mobile'];
$password1=md5($_POST['password']);
if (isset($_POST['register']))
{
    $sql =  "INSERT INTO members ".
        "(full_name,mobile, password) "."VALUES ".
        "('$fullName','$mobile','$password1')";

    if ($conn->query($sql) === TRUE) {
        session_start();
        header('Location:../member-panel/product.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
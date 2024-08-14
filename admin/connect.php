<?php  
$host = 'localhost'; 
$userName = 'root';   
$pass = "";    
$db = 'shop';  

try{   
    $connect=new PDO("mysql:host=$host;dbname=$db",$userName,$pass);
}
catch (PDOException $error)   ///اگر وصل نشدی یه ارور بگیربرام
{
    echo  "Not connect".$error->getLine();
}
session_start();


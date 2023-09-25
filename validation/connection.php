<?php
$host="localhost";
$pass="";
$userName="root";
$db_name="praco";

$conn=new PDO("mysql:host=$host;dbname=$db_name",$userName,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
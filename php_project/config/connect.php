<?php
// !!database conection
$db_host="localhost";
$db_name="phpecommers";
$user_name="root";
$db_password="";

try{
$db=new PDO("mysql:host=$db_host;dbName=$$db_name",$user_name,$db_password);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("ERRPR:DB CONNECTION IS INVALID".$e->getMessage());
}
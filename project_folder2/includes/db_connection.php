<?php
$Host='localhost';
$password='';
$db_name='practice';
$user_name='root';
try{
$conn=new PDO("mysql:host=$Host;dbname=$db_name",$user_name,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $E){
    echo "connection is incorrect".$E->getMessage();
}
?>
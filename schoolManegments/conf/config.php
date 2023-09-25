<?php
$db_name="student_management";
$host="localhost";
$pass="";
$user="root";

try {
    $db=new PDO("mysql:host=$host;dbname=$db_name",$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $E) {
    die("Connection Failed".$E->getMessage());
}
?>
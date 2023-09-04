<?php
   $db_host = 'localhost';
   $db_user = 'root';
   $db_pass = '';
   $db_name = 'ecommerce';
  //  try{
  //   $conn=new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
  //   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  //  }
  //  catch(PDOException $E){
  //    die("CONNECTION FAILED".$E->getMessage());
  //  }
 
   $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }

?>

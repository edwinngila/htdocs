<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
      <label for="input">enter number</label>
      <input type="number" name="number">
      <input type="submit" name="submit" value="submit">
    </form>
    <p>
    <?php
    if(isset($_POST["submit"])){
    $number=$_POST["number"];
    for($i=1;$i<=$number;$i++){
        for($x=1;$x<=$i;$x++){
        echo "*";
        }
        echo "<br/>";
    } 
    }   
    ?></p>
    <p>
    <?php
    if(isset($_POST["submit"])){
    $number=$_POST["number"];
    $count=0;
    for($i=1;$i<=$number;$i++){
      for($z=$number-$i;$z>=0;$z--){
        echo "#";
      }      
      for($x=1;$x<=2*$i-1;$x++){
            echo "*";        
          } 
      echo "<br/>";
    }        
  }  
    ?></p>
    <p>
    <?php
    if(isset($_POST["submit"])){
    $number=$_POST["number"];
    $count=0;
    for($i=1;$i<=$number;$i++){
      $numberOfDots=2*$i-1;
      for($z=$number-$i;$z>=0;$z--){
        echo "#";
      }      
      for($x=1;$x<=$numberOfDots;$x++){
            if($i>=1 && $i<=4){
              $numberOfDots=2*$i-2;              
            } 
            elseif($i>=4){
              $numberOfDots=2*$i-2;
            }
            echo "*";       
          } 
      echo "<br/>";
    }        
  }  
    ?></p>
</body>
</html>
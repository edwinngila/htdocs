<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prime,odd,even</title>
</head>
<body>
    <h1>know your number:</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
      <label for="number1">Enter your number:</label>
      <input name="number1" type="number">
      <input type="submit" name="submit" value="submit">
    </form>  
    <?php
    $outCome="-";
     if(isset($_POST['submit'])){
        $number1=$_POST['number1'];
        if($number1<=0){
            $outCome="$number1 is not a valid number";
        }
        elseif($number1==2){
            $outCome="$number1 is prime and even";
        }
        elseif($number1==1){
            $outCome="$number1 is not prime, even, or odd";
        }
        elseif($number1%2==0){
            $outCome="$number1 is an even number";
        }
        else{
            $prime=true;
            for($i=3;$i<=sqrt($number1); $i+=2){
                if($number1%$i==0){
                    $prime=false;             
                }
            }
            if($prime){
                $outCome="$number1 is a prime number";
            }
            else{
                $outCome="$number1 is a odd number";
            }
        }
     }
    ?> 
    <h3><?php echo $outCome?></h3>
</body>
</html>
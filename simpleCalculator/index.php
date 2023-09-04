<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <h2>Simple PHP Calculator</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <label for="num1">Number 1:</label><br>
        <input type="number" name="num1" id="num1" required><br>
        <label for="num1">Number 2:</label><br>
        <input type="number" name="num2" id="num2" required><br>
        <input type="submit" name="Calculate" value="Calculate">
    </form>
    <?php    
    $result=0;
    if(isset($_GET['Calculate'])){
        $num1=$_GET['num1'];
        $num2=$_GET['num2'];
        $result=$num1+$num2;
    }
    ?>
    <h2>Result:</h2>
    <input type="text" value="<?php echo $result; ?>" readonly>
    <p><?php var_dump($_GET)?></p>
</body>
</html>
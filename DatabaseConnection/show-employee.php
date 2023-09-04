<?php
include('./config.php');
    $id=$_GET['id'];
    $sql="select * from employees where id=$id";
    $stmt=$db->query($sql);
    $employee=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="forms p-4 mt-3">
                <div class="form-group mt-3">
                    <label for="FirstName" class="form-label">First Name:</label>
                    <input type="text" name="FirstName" id="FirstName" value="<?=$employee["first_name"]?>" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="SecondName" class="form-label">Second Name:</label>
                    <input type="text" name="SecondName" id="SecondName" value="<?=$employee["second_name"]?>" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="Email" class="form-label">Email:</label>
                    <input type="text" name="Email" id="Email" value="<?=$employee["email"]?>" class="form-control">
                </div>        
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Phone:</label>
                    <input type="text" name="Phone" id="Phone" value="<?=$employee["phone"]?>" class="form-control">                
                </div>  
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Postal Address:</label>
                    <input type="text" name="Phone" id="Phone" value="<?=$employee["postal_address"]?>" class="form-control">                
                </div> 
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Physical Address:</label>
                    <input type="text" name="Phone" id="Phone" value="<?=$employee["physical_address"]?>" class="form-control">                
                </div> 
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Department:</label>
                    <input type="text" name="Phone" id="Phone" value="<?=$employee["department"]?>" class="form-control">                
                </div>          
            </form>
</body>
</html>
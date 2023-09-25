<?php
include('../conf/config.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $usersId=$_POST['usersId'];
        $first_name=$_POST['FirstName'];
        $second_name=$_POST['SecondName'];
        $email=$_POST['Email'];
        $gender=$_POST['Gender'];
        $roles=$_POST['roles'];
        $courses=$_POST['courses'];
     
        $sql="update users_table SET 
        user_firstName=:first_name, 
        user_secondName=:second_name, 
        user_email=:email,
        user_Gender=:gender,
        user_role=:roles,
        courses=:courses
        WHERE users_id=:id";
        $stmt=$db->prepare($sql);
        $stmt->bindParam(':id',$usersId);
        $stmt->bindParam(':first_name',$first_name);
        $stmt->bindParam(':second_name',$second_name);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':gender',$gender);
        $stmt->bindParam(':roles',$roles);
        $stmt->bindParam(':courses',$courses);
     
        if($stmt->execute()){
          header('Location:../dashbords/adminDashBord.php');
        }
        else{
           echo "ERROR UPDATING EMPLOYEE";
        }
     }
     else{
        $id=$_GET['id'];
        $sql="select * from users_table where users_id=$id";
        $stmt=$db->query($sql);
        $result=$stmt->fetch(PDO::FETCH_ASSOC); 
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="bg-dark">
<div class="container-fluid">
    <div style="min-height: 100vh;" class="row d-flex align-items-center justify-content-center">
        <div style="border-radius: 20px;" class="col-5 bg-light p-3">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <div class="form-group">
                <label for="FirstName" class="form-label">id:</label>
                <input type="number" value="<?=$result["users_id"]?>" name="usersId" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="FirstName" class="form-label">First Name:</label>
                <input type="text" value="<?=$result["user_firstName"]?>" name="FirstName" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="SecondName" class="form-label">Second Name:</label>
                <input name="SecondName" value="<?=$result["user_secondName"]?>" type="text" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="Email" class="form-label">Email:</label>
                <input name="Email" value="<?=$result["user_email"]?>" type="text" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="Gender" class="form-label">Gender:</label>
                <input name="Gender" value="<?=$result["user_Gender"]?>" type="text" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="courses" class="form-label">courses:</label>
                <select class="form-select" name="courses" id="courses">
                    <option value=1>Software development</option>
                    <option value=2>Cyber security</option>
                    <option value=3>Database management</option>
                    <option value=4>ICDL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Roles" class="form-label">Roles:</label>
                <select class="form-select" name="roles" id="roles">
                    <option value=1>students</option>
                    <option value=3>lecture</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <div class="row d-flex justify-content-center align-items-center">
                     <button name="submit" class="btn btn-success col-5" type="submit">Update user</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>
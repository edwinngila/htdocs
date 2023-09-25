<?php
include('./includes/db_connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    $username = $_POST['userName'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="INSERT INTO users (firstname,secondname,userName, password) VALUES (:firstname,:secondname,:userName , :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':secondname', $secondname);
    $stmt->bindParam(':userName', $username);
    $stmt->bindParam(':password', $password);
 
    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Registration failed.";
    }
}
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
    <div  class="container-fluid mt-5">
    <div class="row d-flex justify-content-center align-item-center">
        <div style="border-radius: 10px;" class="col-6 bg-dark">
            <form action="" method="post" class="p-3 mt-3">
                <h1 class="text-light">Register</h1>
                <div class="form-group">
                    <label for="firstname" class="form-label text-light" name="firstname">First Name</label>
                    <input class="form-control" name="firstname" type="text">
                </div>
                <div class="form-group">
                    <label for="secondname" class="form-label text-light" name="secondname">Second Name</label>
                    <input class="form-control" name="secondname" type="text">
                </div>
                <div class="form-group">
                    <label for="userName" class="form-label text-light" name="userName">User Name</label>
                    <input class="form-control" name="UserName" type="text">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label text-light" name="password">User Name</label>
                    <input class="form-control" name="password" type="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-4">REGISTER</button>
                </div>
            </form>
        </div>       
    </div>
    </div>
</body>
</html>
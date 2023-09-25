<?php
session_start();
include('./includes/db_connection.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userName'];
    $password = $_POST['password'];
 
    $stmt = $conn->prepare("SELECT * FROM users WHERE userName = :userName");
    $stmt->bindParam(':userName', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
    } else {
        echo "Login failed.";
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
    <div class="container-fluid mt-5">
       <div class="row d-flex justify-content-center align-items-center">
       <div style="border-radius: 10px;" class="col-5 bg-dark">
            <form action=""class="p-2 mt-4" method="post">
                <h1 style="color:white;" >sign in</h1>
                <div class="form-group">
                    <label for="userName" class="form-label text-light" name="userName">User Name</label>
                    <input class="form-control" name="userName" type="text">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label text-light" name="password">Password</label>
                    <input class="form-control" name="password" type="password">
                </div>
                 <button type="submit" class="btn btn-success mt-5">LOGIN</button>
            </form>
        </div>
       </div>
    </div>
</body>
</html>
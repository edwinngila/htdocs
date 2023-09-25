<?php
session_start();
include('./conf/config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $query="SELECT users_id ,user_firstName,user_secondName,user_email,user_password,user_role FROM users_table where user_email='$email'";
    $stmt=$db->prepare($query);
    $stmt->execute();

    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if (password_verify($password, $result[0]['user_password'])) {
        $_SESSION['user_id'] = $result[0]['users_id'];
        $_SESSION['user_role'] = $result[0]['user_role'];

        if ($result[0]['user_role'] == 1) {
            header("Location: ./dashbords/studentsDashboard.php");
        }
        else if ($result[0]['user_role'] == 2) {
            header ("Location: normal.php");
        }
        else if ($result[0]['user_role'] == 3) {
            header("Location: ./dashbords/lectaraDashBord.php");
        }
        else if ($result[0]['user_role'] == 4) {
            header("Location: ./dashbords/adminDashBord.php");
        }
    } else {
        echo "Invalid credentials.";
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
<body class="bg-dark">
<div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-center">
            <div style="border-radius: 20px;" class="col-5 bg-light mt-3">
                <form class="form mt-2 p-2" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="row d-flex align-items-center justify-content-center">
                      <img style="width: 300px; height: 300px;" src="./IMG/student_light-removebg-preview.png" alt="img">
                      <h3>welcome ba<span style="border-bottom:solid black 4px;">ck</span></h3>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" name="email" type="text">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" name="password" type="password">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-center">
                        <button class="btn btn-success mt-3 col-4">Login</button>                        
                    </div>
                     <p>Don't have account <a href="./Register.php">Sign up</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
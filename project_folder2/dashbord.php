<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
 
// Your dashboard content here
echo "Welcome, " . $_SESSION['username'] . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-dark">
            <navigation>
                <nav class="navbar d-flex">
                    <a href="#" class="navbar-brand">
                      <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="img"width="30" height="24" class="d-inline-block align-text-top">
                      E-Commerce
                    </a>
                    <ul class="text-light nav nav-underline ms-end">
                        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Contacts</a></li>
                    </ul>
                </nav>
            </navigation>
        </div>
        <div class="row">
            <div class="container-fluid mt-4">
                <div class="col-12">
                    <h2><u>USERS IN THE DATABASE</u></h2>
                <table class="table table-bordered table-secondary">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>User_name</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?PHP
                        foreach ($employees as $employee){      
                        ?>
                        <tr>
                            <td><?=$employee['id']?></td>
                            <td><?=$employee['userName']?></td>
                            <td><?=$employee['role']?></td>                 
                            <td class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                <a href="./show-employee.php?id=<?=$employee['id']?>"><button class="btn btn-success">Show</button></a>
                                </div>
                                <div class="btn-group">
                                <a href="#"><button class="btn btn-danger ml-2">Delete User</button></a>
                                </div>
                                <div class="btn-group">
                                <a href="update.php?id=<?=$employee['id']?>"><button class="btn btn-primary">Update</button></a>
                                </div>                        
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <div><a href="./save_employee.php"><button class="btn btn-success">Add New User</button></a></div>
                <div><a href="./update.php"><button class="btn btn-success mt-3">Update</button></a></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include("./config.php");
$sql="select * from employees";
$Results=$db->query($sql);
$employees=$Results->fetchAll(PDO::FETCH_ASSOC);
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
    <div class="container-fluid mt-4">
        <div class="col-12">
            <h2><u>USERS IN THE DATABASE</u></h2>
           <table class="table table-bordered table-secondary">
            <thead>
              <tr>
                 <th>id</th>
                 <th>First Name</th>
                 <th>Second Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                <?PHP
                foreach ($employees as $employee){      
                ?>
                <tr>
                    <td><?=$employee['id']?></td>
                    <td><?=$employee['first_name']?></td>
                    <td><?=$employee['second_name']?></td>
                    <td><?=$employee['email']?></td>
                    <td><?=$employee['phone']?></td>                   
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
</body>
</html>
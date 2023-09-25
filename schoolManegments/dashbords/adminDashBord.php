<?php
include('../conf/config.php');
$sql="select * from users_table";
$stmt=$db->prepare($sql);
$stmt->execute();

$users=$stmt->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $usersId=$_POST['getUser'];
    $sql="select * from users_table where=$usersId";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $item=$stmt->fetchAll(PDO::FETCH_ASSOC);  

    print_r($users);

}  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/adminDashBord.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
         <nav style="background-color: #212529;" class="navbar">
               <a href="#">
                 <img style="width: 110px; height: 110px;" src="../IMG/student1.png" alt="logo">
               </a>
               <div>
                  <ul class="navbar nav d-flex flex-row">
                    <li class="nav-item">
                        <a style="font-size: 20px;" class="items nav-link text-light" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../pages/fees.php">Fees</a>
                    </li>
                    <li class="nav-item"> 
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../pages/payment.php">Payments</a>
                    </li>
                  </ul>
               </div>
            </nav>
        </div>
        <div class="row">
            <div class="container-fluid">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Second Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?PHP
                      foreach($users as $result){
                    ?>
                    <tr>
                        <td><?=$result["users_id"]?></td>
                        <td><?=$result["user_firstName"]?></td>
                        <td><?=$result["user_secondName"]?></td>
                        <td><?=$result["user_email"]?></td>
                        <td><?=$result["user_Gender"]?></td>
                        <td><?=$result["user_role"]?></td>
                        <td>                          
                        <a href="../pages/userView.php?id=<?=$result["users_id"]?>">
                            <button type="button" class="btn btn-success view-button">
                                View
                            </button>
                        </a>
                        </td>
                   </tr>
                   <?php } ?>
                 </tbody>
                </table>
            </div>
        </div>
      </div> 
    <script src="../bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>  
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewButtons = document.querySelectorAll('.view-button');
        viewButtons.forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-userid');
                const modalForm = document.querySelector('.modal form');
                const rolesSelect = modalForm.querySelector('#roles');

                // Make an AJAX request to fetch user data based on the user ID
                fetch('fetch_user_data.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'userId=' + userId,
                })
                .then(response => response.json())
                .then(data => {
                    modalForm.querySelector('[name="FirstName"]').value = data.user_firstName;
                    modalForm.querySelector('[name="SecondName"]').value = data.user_secondName;
                    modalForm.querySelector('[name="Email"]').value = data.user_email;
                    modalForm.querySelector('[name="Gender"]').value = data.user_Gender;
                    rolesSelect.value = data.user_role;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>     
</body>
</html>
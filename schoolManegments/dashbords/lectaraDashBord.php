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
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../dashbords/lectaraDashBord.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../pages/attendance.php">Attendance</a>
                    </li>
                    <li class="nav-item"> 
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../pages/classess.php">Classes</a>
                    </li>
                  </ul>
               </div>
            </nav>
        </div>
        <div class="row">
            <div class="container-fluid">
                <h1 class="mt-3">Student Table</h1>
                <table class="table mt-3">
                    <thead>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Second Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Roles</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Edwin</td>
                        <td>Ngila</td>
                        <td>edwinngila@gmail.com</td>
                        <td>Male</td>
                        <td>Normal</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>     
</body>
</html>
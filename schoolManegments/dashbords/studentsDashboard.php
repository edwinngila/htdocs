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
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../dashbords/studentsDashboard.php">Class</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../pages/studentAttendance.php">Attendance</a>
                    </li>
                  </ul>
               </div>
            </nav>
        </div>
        <div class="row">
        <table class="table">
                    <thead>
                        <th>User First Name</th>
                        <th>User Second Name</th>
                        <th>course</th>
                        <th>Time</th>
                    </thead>
                    <tbody>
                        <td>Edwin</td>
                        <td>Ngila</td>
                        <td>software dev</td>
                        <td>2:00PM</td>
                    </tbody>
                </table>
        </div>
    </div>
</body>
</html>
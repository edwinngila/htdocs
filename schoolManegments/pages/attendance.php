<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=., initial-scale=1.0">
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
                <button type="button" class="btn btn-success mt-3"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add new Attendance
                </button>
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
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add class Attendance</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="FirstName" class="form-label">First Name:</label>
                                <input type="text" name="FirstName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="SecondName" class="form-label">Second Name:</label>
                                <input name="SecondName" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="course" class="form-label">course:</label>
                                <select class="form-select" name="course" id="course">
                                    <option value="Software development">Software development</option>
                                    <option value="Cyber security">Cyber security</option>
                                    <option value="Database management">Database management</option>
                                    <option value="ICDL">ICDL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Time" class="form-label">Time:</label>
                                <input name="Time" type="time" class="form-control">
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script src="../bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>       
</body>
</html>
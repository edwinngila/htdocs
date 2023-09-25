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
                        <a style="font-size: 20px;" class="items nav-link text-light" href="../dashbords/adminDashBord.php">Users</a>
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
                <button type="button" class="btn btn-success mt-3"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add new payment
                </button>
                <table class="table">
                    <thead>
                        <th>User Id</th>
                        <th>User First Name</th>
                        <th>User Second Name</th>
                        <th>Role</th>
                        <th>course</th>
                        <th>Amount payed</th>
                        <th>Method of payment</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Edwin</td>
                        <td>Ngila</td>
                        <td>Lector</td>
                        <td>software dev</td>
                        <td>15000</td>
                        <td>Mpesa</td>
                    </tbody>
                </table>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Fee Payment</h1>
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
                                <input name="course" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="AmountPayed" class="form-label">Amount payed:</label>
                                <input name="AmountPayed" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="MethodOfPayment" class="form-label">Method of payment:</label>
                                <input name="MethodOfPayment" type="text" class="form-control">
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
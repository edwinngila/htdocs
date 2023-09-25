<?php
include('../conf/config.php');
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $FirstName=$_POST['FirstName'];
    $SecondName=$_POST['SecondName'];
    $course=$_POST['course'];
    $AmountPayed=$_POST['AmountPayed'];
    $MethodOfPayment=$_POST['MethodOfPayment'];
    
    $sql='insert into fees
    (student_first_name,student_second_name,course_name,payment_method,amount,amount_balance) 
    values(:FirstName,:SecondName,:course,:AmountPayed,:MethodOfPayment,:amount_balance)';
    
    $stmt2=$db->prepare($sql);
    $stmt2->bindParam(':FirstName',$FirstName);
    $stmt2->bindParam(':secondName',$SecondName);
    $stmt2->bindParam(':course',$course);
    $stmt2->bindParam(':AmountPayed',$AmountPayed);
    $stmt2->bindParam(':MethodOfPayment',$MethodOfPayment);
    $stmt2->bindParam(':amount_balance',$amount_balance);

    $stmt2->execute();
}
else{
    $sql="select * from fees";
    $stmt=$db->prepare($sql);
    $stmt->execute();

    $fee=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if(empty($fee)){
        $fee=["null"];
    }

}
?>
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
                        <th>User First Name</th>
                        <th>User Second Name</th>
                        <th>Role</th>
                        <th>course</th>
                        <th>Amount payed</th>
                        <th>Balance</th>
                        <th>Method of payment</th>
                    </thead>
                    <tbody>
                        <td><?=$fee[0]['student_first_name']?></td>
                        <td><?=$fee[0]['student_second_name']?></td>
                        <td><?=$fee[0]['course_name']?></td>
                        <td><?=$fee[0]['payment_method']?></td>
                        <td><?=$fee[0]['amount']?></td>
                        <td><?=$fee[0]['amount_balance']?></td>
                        <td><?=$fee[0]['payment_method']?></td>
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
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
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
                            <div class="form-group">
                               <button name="submit" data-bs-dismiss="modal" type="button" class="btn btn-primary mt-3">Understood</button>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
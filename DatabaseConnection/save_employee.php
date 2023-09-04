<?php 
include("./config.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
  $firstName=$_POST["FirstName"];
  $secondName=$_POST["SecondName"];
  $email=$_POST["Email"];
  $phone=$_POST["Phone"];

  $sql="insert into employees (first_name,second_name,email,phone) values(:firstName,:secondName,:Email,:phone)";
  $stmt=$db->prepare($sql);
  $stmt->bindParam(':firstName',$firstName);
  $stmt->bindParam(':secondName',$secondName);
  $stmt->bindParam(':Email',$email);
  $stmt->bindParam(':phone',$phone);
  try{
  if($stmt->execute()){
  header("location:index.php");
  }
  else{
    echo "Error creating an employee";
  }
  }
  catch(PDOException $E){
    echo $E->getMessage();
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
    <style>
        .forms{
            background-color: lightgrey;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center">
           <div class="col-7 mt-4">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="forms p-4 mt-3">
              <h2>Enter User Details</h2>
                <div class="form-group mt-3">
                    <label for="FirstName" class="form-label">First Name:</label>
                    <input type="text" name="FirstName" id="FirstName" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="SecondName" class="form-label">Second Name:</label>
                    <input type="text" name="SecondName" id="SecondName" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="Email" class="form-label">Email:</label>
                    <input type="text" name="Email" id="Email" class="form-control">
                </div>        
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Phone:</label>
                    <input type="text" name="Phone" id="Phone" class="form-control">                
                </div> 
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Postal Address:</label>
                    <input type="text" name="Phone" id="Phone" class="form-control">                
                </div> 
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Physical Address:</label>
                    <input type="text" name="Phone" id="Phone" class="form-control">                
                </div> 
                <div class="form-group mt-3">
                    <label for="Phone" class="form-label">Department:</label>
                    <input type="text" name="Phone" id="Phone" class="form-control">                
                </div> 
                <div class="form-group mt-4 d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-success col-5">Add User</button>
                </div>             
            </form>
              <div>
                 <a href="./index.php">
                    <button class="btn btn-success col-12 mt-3">View Users</button>
                 </a>
              </div>
        </div>  
    </div>  
</body>
</html>
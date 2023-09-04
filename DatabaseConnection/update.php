<?php 
include("./config.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
   $id=$_POST['id'];
   $first_name=$_POST['first_name'];
   $second_name=$_POST['second_name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $postal_address=$_POST['postal_address'];
   $physical_address=$_POST['physical_address'];
   $department=$_POST['department'];

   $sql="update employees SET id=:id, first_name=:first_name, second_name=:second_name, email=:email,phone=:phone,postal_address=:postal_address,physical_address=:physical_address,department=:department WHERE id=:id";
   $stmt=$db->prepare($sql);
   $stmt->bindParam(':id',$id);
   $stmt->bindParam(':first_name',$first_name);
   $stmt->bindParam(':second_name',$second_name);
   $stmt->bindParam(':email',$email);
   $stmt->bindParam(':phone',$phone);
   $stmt->bindParam(':postal_address',$postal_address);
   $stmt->bindParam(':physical_address',$physical_address);
   $stmt->bindParam(':department',$department);

   if($stmt->execute()){
     header('Location:index.php');
   }
   else{
      echo "ERROR UPDATING EMPLOYEE";
   }
}
else{
   $id=$_GET['id'];
   $sql="select * from employees where id=:id";
   $stmt=$db->prepare($sql);
   $stmt->bindParam(":id",$id);
   $stmt->execute();
   $employee=$stmt->fetch(PDO::FETCH_ASSOC);
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
<body>
 <div class="col-12 d-flex justify-content-center align-items-center mt-5 rounded">
    <div class="form col-5 bg-dark p-3">        
       <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
         <h1 class="text-light">UPDATE</h1>
          <div class="form-group">
             <input type="hidden" name="id" class="form-control"  value="<?=$employee['id']?>">
          <div class="form-group">
          <div class="form-group">
             <label for="search" class="form-label text-light">First name</label>
             <input type="text1" name="first_name" class="form-control" value="<?=$employee['first_name']?>">
          <div class="form-group">
            <div class="form-group">
             <label for="search" class="form-label text-light">Second Name</label>
             <input type="text2" name="second_name" class="form-control" value="<?=$employee['second_name']?>">
          </div>
          <div class="form-group">
            <div class="form-group">
             <label for="search" class="form-label text-light">Email</label>
             <input type="text2" name="email" class="form-control" value="<?=$employee['email']?>">
          </div>
          <div class="form-group">
            <div class="form-group">
             <label for="search" class="form-label text-light">Phone</label>
             <input type="text2" name="phone" class="form-control" value="<?=$employee['phone']?>">
          </div>
          <div class="form-group mt-3">
             <label for="Phone" class="form-label text-light">Postal Address:</label>
             <input type="text" name="postal_address" id="Phone" value="<?=$employee["postal_address"]?>" class="form-control">                
          </div> 
          <div class="form-group mt-3">
             <label for="Phone" class="form-label text-light">Physical Address:</label>
             <input type="text" name="physical_address" id="Phone" value="<?=$employee["physical_address"]?>" class="form-control">                
          </div> 
          <div class="form-group mt-3">
             <label for="Phone" class="form-label text-light">Department:</label>
             <input type="text" name="department" id="Phone" value="<?=$employee["department"]?>" class="form-control">                
          </div>
             <button class="btn btn-success mt-3" type="submit">Update</button>
          </div>        
        </form>
      </div>
    </div>
</body>
</html>
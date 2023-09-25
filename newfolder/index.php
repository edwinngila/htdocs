<?php
include("./config/config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone_no = $_POST['phone_no'];

    $sql= "INSERT INTO student(firstname, lastname, phone_no) VALUES(:firstname, :lastname, :phone_no)";

    $stmt = $db->prepare($sql);
     
    $stmt-> bindParam(':firstname', $firstname);
    $stmt-> bindParam(':lastname', $lastname);
    $stmt-> bindParam(':phone_no', $phone_no);

    if($stmt->execute()){
        header ("location: student.php");
    } else{
        echo "error creating student";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <form action=""  method="post" class="p-5 rounded shadow" style="width: 30rem;">
            <h2 class="text-center pb-1 display-6 " >Add Student</h2>
            <div class="mb-3">
                <label for="firstname" class="form-label">FIRSTNAME:</label>
                <input type="text" name="firstname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">LASTNAME:</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone_no" class="form-label ">PHONE_NO</label>
                <input type="tel" name="phone_no" id="" class="form-control" required>
            </div>
            <!-- <div></div> -->
            <button class="btn btn-primary" type="submit">create</button>
        </form>
    </div>
</body>
</html>
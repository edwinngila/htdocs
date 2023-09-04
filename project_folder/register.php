<?php
   include('includes/db_connect.php');
   include('includes/functions.php');
 
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $username = sanitize_input($conn, $_POST['username']);
       $password = hash_password($_POST['password']);
       $role = $_POST['role'];
 
       $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
 
       if (mysqli_query($conn, $query)) {
           header("Location: login.php");
       } else {
           echo "Error: " . mysqli_error($conn);
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bed8df2ea4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div style="min-height: 100vh;" class="row d-flex justify-content-center align-items-center">
             <div style="min-height: 70vh;border-radius:20px;background-color:#de9c00;" class="col-6">
                <form action="<?php echo $_SERVER["PHP_SELF"]?>" class="mt-4" method="post">
                    <h1 class="col-12 d-flex justify-content-center align-items-center">Register</h1>
                   <div class="form-group mt-3">
                      <label for="username" class="form-label">User Name:</label>
                      <input type="text" name="username" id="username" class="form-control">
                   </div>
                   <div class="form-group mt-4">
                      <label for="username" class="form-label">Role:</label>
                      <select class="form-select" name="role" aria-label="Default select example">
                        <option selected>select your roll</option>
                        <option value="admin">admin</option>
                        <option value="buyer">buyer</option>
                        <option value="seller">seller</option>
                      </select>
                   </div>
                   <div class="form-group mt-4">
                      <label for="password" class="form-label">Password:</label>
                      <div class="input-group">
                       <input type="password" name="password" id="password" class="form-control">
                       <span style="cursor: pointer;" class="input-group-text" id="eye" onclick="eyeToggle()"><i class="fa-regular fa-eye-slash"></i></span>
                      </div>
                   </div>
                   <div class="form-group mt-3 row">
                       <div class="col-12 d-flex justify-content-center align-items-center">
                         <div class="row d-flex justify-content-center align-items-center">
                            <button class="btn btn-success col-7" type="submit">Register</button>
                            <a href="./login.php" class="offset-5 mt-3">login instead</a>
                         </div>
                       </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function eyeToggle(){
           const getElement=document.getElementById("eye");
           const password=document.getElementById("password");
           if(password.type==="password"){
            getElement.innerHTML="<i class='fa-regular fa-eye'></i>";
            password.type="text";
           }
           else{
            getElement.innerHTML="<i class='fa-regular fa-eye-slash'></i>";
            password.type="password";
           }
           
           console.log("class");
        }
    </script>
</body>
</html>
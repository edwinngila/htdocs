<?php
include('navigation.php');
    include('dbh.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<?php
        $fullname = $email = $password = $confirmPassword ='';
        $errors = array ('fullname'=>'','email'=>'', 'password'=>'', 'confirmPassword'=>'');

        if(isset($_POST['signUp'])){
            //checking for firstname validation
            if(empty($_POST['fullname'])){
                $errors['fullname'] = 'Fullname cannot be empty <br/>';
            }else{
                $fullname = $_POST['fullname'];
                if(!preg_match('/^[a-zA-Z\s]+$/', $fullname)){
                    $errors['fullname'] = 'Fullname must be letters and spaces only';
                }
            }
            //checking for email validation
            if(empty($_POST['email'])){
                $errors['email'] = 'Email cannot be empty <br/>';
            }else{
                $email = $_POST['email'];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] =  'email must be a valid email address';
                }
            }
            //checking for password validation
            if(empty($_POST['password'])){
                $errors['password'] = 'password cannot be empty <br/>';
            }else{
                $password = $_POST['password'];
                if(!preg_match('/^[a-zA-Z\s]+$/', $password)){
                    $errors['course'] = 'password must be letters and spaces only';
                }
            }
            //checking for confirm password
            if(empty($_POST['confirmPassword'])){
                $errors['confirmPassword'] ='confirmPassword cannot be empty <br/>';
            }else{
                $confirmPassword = $_POST['confirmPassword'];
                if($password !== $confirmPassword){
                    $errors['confirmPassword'] = 'Passwords must match';
                }else{
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    // echo $passwordHash;
                }
            }  
            if(array_filter($errors)){
                //echo 'There are Errors in the form';
            }else{
                //echo 'No errors in the form';
                /*$statement = $databaseConnection->prepare(
                    "INSERT INTO sample(firstname,lastname,email,course) 
                     VALUES ($firstname,$lastname,$email,$course)");
                     $statement->execute();*/
                     try
                     
                    {
                        $query = "INSERT INTO users(fullname,email,password1) VALUES (:fullname,:email,:password1)";
                        $query_run = $databaseConnection->prepare($query);
                        $data =[
                            ':fullname' => $fullname,
                            ':email' => $email,
                            ':password1' => $passwordHash,
                        ]; 
                        $query_execute = $query_run-> execute($data);
                        if($query_execute){ 
                            echo '<script> alert("New user added Succeffully")</script>';
                        }else{
                            echo '<script> alert("Data NOT added")</script>';
                    }
                    }catch(PDOException $err){
                        echo $err->getmessage();
                }
                    

                //header('Location:index.php');
            }
        }
            // end of validation...     
    ?>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <form class="p-5 rounded shadow" style="width: 30rem;" action ="SignUp.php" method="POST">
            <h1 class="text-center pb-5 display-4">SIGN-UP</h1>
           
            <div class="mb-3">
                <label for="Fullname" class="form-label">Fullname:</label>
                <input type="text" class="form-control" name="fullname" id="fullname"
                placeholder="Enter your Fullname" aria-describedby="emailHelp">
                <div class='text-danger'><?php echo $errors['fullname']; ?></div>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email address:</label>
                <input type="email" class="form-control" name="email" id="Email" 
                placeholder="Enter your Email-Address" aria-describedby="emailHelp">
                <div class='text-danger'><?php echo $errors['email']; ?></div>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password" id="Password">
                <div class='text-danger'><?php echo $errors['password']; ?></div>
            </div>
            <div class="mb-3">
                <label for="ConfirmPassword" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" id="ConfirmPassword">
                <div class='text-danger'><?php echo $errors['confirmPassword']; ?></div>
            </div>
            <button type="submit" class="btn btn-primary" name="signUp">SIGN-UP</button>
        </form>

    </div>

    
</body>
</html>
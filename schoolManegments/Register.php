<?php
include ("./conf/config.php");
$message="hello";
$showError="false";
$userRole=2;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $firstName=$secondName=$email=$gender=$password=$confirmPassword='';
    $errors=['firstName'=>'', 'secondName'=>'', 'email'=>'', 'gender'=>'', 'password'=>'', 'confirmPassword'=>''];

    //!first name validation
    if(empty($_POST["firstName"])){
       $errors['firstName']='First Name cannot be empty';
    }
    else{
     $firstName=$_POST["firstName"];
     if(!preg_match('/^[a-zA-Z]+$/',$firstName)){
        $errors['firstName']='First Name must be letters';
     }
    }

    //!second name validation
    if (empty($_POST["secondName"])) {
       $errors['secondName']='Second Name cannot be empty';
    }
    else{
     $secondName=$_POST["secondName"];
     if(!preg_match('/^[a-zA-Z]+$/',$secondName)){
        $errors['secondName']='Second Name must be letters';
     }
    }

    //!email validation
    if (empty($_POST["email"])) {
        $errors['email']='Email cannot be empty';
     }
     else{
        $email=$_POST["email"];
        $query='select * from users_table where user_email=:email';
        $stmt1=$db->prepare($query);
        $stmt1->bindParam(':email',$email); 
        $outcome=$stmt1->execute();
        if(!$outcome){
            $errors['email']=$email.'Email that has been provided has been used';
        }
      if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$email)){
         $errors['email']='Email should be example@gmail.com';
      }
     }


    //! gender validation
    if(empty($_POST["gender"])){
        $errors['gender']='gender must be selected';
    }
    else{
        $gender=$_POST["gender"];
    }


    //!password validation
    if(empty($_POST["password"])){
        $errors['password']='password cannot be empty';
    }
    else{
     $password=$_POST["password"];
     if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',$password)) {
        $errors['password']='The password provided is invalid';
     }
    }

    //!checking for confirm password
    if(empty($_POST['confirmPassword'])){
        $errors['confirmPassword'] ='confirmPassword cannot be empty';
    }else{
        $confirmPassword = $_POST['confirmPassword'];
        if($password !== $confirmPassword){
            $errors['confirmPassword'] = 'Passwords must match';
        }else{
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        }
    } 
    if(array_filter($errors)){
        $message="Make sure that all your fields are filled";
    }
    else{
            $sql='insert into users_table (user_firstName,user_secondName,user_email,user_Gender,user_password,user_role) values(:firstName,:secondName,:email,:gender,:password,:role)';
            $stmt2=$db->prepare($sql);
            $stmt2->bindParam(':firstName',$firstName);
            $stmt2->bindParam(':secondName',$secondName);
            $stmt2->bindParam(':email',$email);
            $stmt2->bindParam(':gender',$gender);
            $stmt2->bindParam(':password',$passwordHash);
            $stmt2->bindParam(':role',$userRole);

            if($stmt2->execute()){
                 header('Location:./login.php');          
            }
            else{
                echo "ERROR UPDATING EMPLOYEE"; 
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/register.css">
    <script src="https://kit.fontawesome.com/fcfb93a492.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="bg-dark">
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-center">
            <div style="border-radius: 20px;" class="col-5 bg-light">
                <form class="form p-2" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="row d-flex align-items-center justify-content-center">
                      <img style="width: 125px; height: 125px;" src="./IMG/student_light-removebg-preview.png" alt="img">
                      <h3>Register with us<span style="border-bottom:solid black 4px;">er</span></h3>
                      <p style="font-size:12px;">CREATE ACCOUNT IN SECONDS </p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Student names</label>
                        <div class="row">
                            <div class="col-6">
                              <input class="form-control" name="firstName" type="text">
                              <label style="color: grey; font-size:14px;" class="form-label">First Name</label><br>
                              <span style="font-size: 14px;" class="text-danger"><?php if(!empty($errors['firstName'])) echo $errors['firstName'];?></span>
                            </div>
                            <div class="col-6">                                
                               <input class="form-control" name="secondName" type="text">
                               <label style="color: grey; font-size:14px;" class="form-label">Second Name</label><br>
                               <span style="font-size: 14px;" class="text-danger"><?php if(!empty($errors['secondName'])) echo $errors['secondName'];?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" name="email" type="text">
                        <span style="font-size: 14px;" class="text-danger"><?php if(!empty($errors['email'])) echo $errors['email'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value="">make a selection</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span style="font-size: 14px;" class="text-danger"><?php if(!empty($errors['gender'])) echo $errors['gender'];?></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group">
                          <input class="form-control" id="password"  name="password" type="password">
                          <span class="input-group-text" id="eye" onclick="eyeToggle()"><i class='fa-regular fa-eye-slash'></i></span>
                        </div>
                        <span style="font-size: 14px;" class="text-danger"><?php if(!empty($errors['password'])) echo $errors['password'];?></span>
                    </div> 
                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <div class="input-group">
                         <input class="form-control" id="confirmPassword" name="confirmPassword" type="password">
                         <span class="input-group-text" id="eye2" onclick="eyeToggle2()"><i class='fa-regular fa-eye-slash'></i></span>
                        </div>
                        <span style="font-size: 14px;" class="text-danger"><?php if(!empty($errors['confirmPassword'])) echo $errors['confirmPassword'];?></span>
                    </div> 
                    <div class="form-group d-flex align-items-center justify-content-center">
                        <button class="btn btn-success mt-2 col-4" name="Register">Register</button>                        
                    </div>
                     <p>Already a member <a href="./login.php">login</a></p>
                </form>
            </div>
          </div>
        </div>
    <script src="./bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script src="./js/js/register.login.js"></script>
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
        function eyeToggle2(){
        const getElement=document.getElementById("eye2");
        const password=document.getElementById("confirmPassword");
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
<?php 
error_reporting(1);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include("./config/connect.php");
if ($_SERVER["REQUEST_METHOD"]==='POST'){
 $FirstName=$_POST['FirstName'];
 $LastName=$_POST['LastName'];
 $email=$_POST['email'];
 $Phone=$_POST['Phone'];
 $password=$_POST['Password'];
 $ConfirmPassword=$_POST['ConfirmPassword'];
 $user_type="buyer";
 $is_verified=0;
 $Invalid;

 if($password!==$ConfirmPassword){
    $Invalid='password entered is not valid';
 }

 $hashedPassword=password_hash($password,PASSWORD_DEFAULT);

 $query="insert into users (first_name,	last_name,email,phone_no,password,user_type,is_verified) values(:first_name,:last_name,:email,:phone_no,:password,:user_type,:is_verified)";
 $stmt=$db->prepare($query);
 $stmt->bindParam(":first_name",$FirstName);
 $stmt->bindParam(":last_name",$LastName);
 $stmt->bindParam(":email",$email);
 $stmt->bindParam(":phone_no",$Phone);
 $stmt->bindParam(":password",$hashedPassword);
 $stmt->bindParam(":user_type",$user_type);
 $stmt->bindParam(":is_verified",$is_verified);
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
<?php include("./includes/navbar.php")?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h1>New account</h1>
                <p class="lead">Not our registered customer yet?</p>
                <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="FirstName">First Name</label>
                    <input id="name" name="FirstName" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="LastName">Last Name</label>
                    <input id="LastName" name="LastName" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input id="Phone" name="Phone" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                       <input type="password" name="Password" id="Password" class="form-control">
                       <span style="cursor: pointer;" class="input-group-text" id="eye1" onclick="eyeToggle1()"><i class="fa-regular fa-eye-slash"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ConfirmPassword">Confirm Password</label>
                    <div class="input-group">
                       <input type="password" name="ConfirmPassword" onchange="ConfirmPassword()" id="ConfirmPassword" class="form-control">
                       <span style="cursor: pointer;" class="input-group-text" id="eye2" onclick="eyeToggle2()"><i class="fa-regular fa-eye-slash"></i></span>
                    </div>
                    <span id="feedBack"><?php echo $Invalid;?></span>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h1>Login</h1>
                <p class="lead">Already our customer?</p>
                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <hr>
                <form action="customer-orders.html" method="post">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password3" type="password3" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        function eyeToggle1(){
           const getElement=document.getElementById("eye1");
           const password1=document.getElementById("Password");
           if(password1.type==="password"){
            getElement.innerHTML="<i class='fa-regular fa-eye'></i>";
            password1.type="text";
           }
           else{
            getElement.innerHTML="<i class='fa-regular fa-eye-slash'></i>";
            password1.type="password";
           }
           
           console.log("class");
        }
        function eyeToggle2(){
           const getElement=document.getElementById("eye2");
           const password2=document.getElementById("ConfirmPassword");
           if(password2.type==="password"){
            getElement.innerHTML="<i class='fa-regular fa-eye'></i>";
            password2.type="text";
           }
           else{
            getElement.innerHTML="<i class='fa-regular fa-eye-slash'></i>";
            password2.type="password";
           }
           
           console.log("class");
        }
        function ConfirmPassword(){
          const pass=document.getElementById('Password').value;
          const pass2=document.getElementById('ConfirmPassword').value;
          const text=document.getElementById("feedBack");
          if(pass!==pass2){
            text.style="color=red"
            text.innerHTML="The two passwords don't match"
          }
          else{
            text.style="color=green"
            text.innerHTML="The passwords match"
          }
        }
    </script>
 <?php include('./includes/footer.php')?>
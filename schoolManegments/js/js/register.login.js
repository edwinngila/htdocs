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
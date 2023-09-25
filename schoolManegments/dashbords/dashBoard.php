<?php
   session_start();
   if (isset($_SESSION['user_id'])) {
        if($_SESSION['user_role']==1){
            header("Location: ");
        }       
        if($_SESSION['user_role']==3){
            header("Location: ");
        }       
        if($_SESSION['user_role']==4){
            header("Location: ");
        }       
   }
   else{
       header("Location: login.php");
       exit();
   }

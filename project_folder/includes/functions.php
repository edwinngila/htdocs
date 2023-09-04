<?php
   function sanitize_input($conn, $input) {
       return mysqli_real_escape_string($conn, $input);
   }
 
   function hash_password($password) {
       return password_hash($password, PASSWORD_DEFAULT);
   }
?>

<?php

include 'config.php';
if(isset($_POST['submit'])){
   $ID=  $_POST['id'];
   $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['Email']);
   $telephone =  $_POST['tel'];
   $DOB =  $_POST['dob'];
   $sex=$_POST['Sex'];
   $country = mysqli_real_escape_string($conn, $_POST['Country']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM registrationform WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO registrationform (ID,firstname,lastname,email,telephone ,DOB,sex,country,pass,cpass,user_type) VALUES('$ID','$firstname','$lastname','$email','$telephone','$DOB','$sex','$country','$pass','$cpass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
        
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>register form</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="number" name="id" required placeholder="enter your id">
      <input type="text" name="fname" required placeholder="enter your first name">
      <input type="text" name="lname" required placeholder="enter your last name">
      <input type="email" name="Email" required placeholder="enter your email">
      <input type="text" name="tel" required placeholder="enter your  telephone number start with country code ">
      <input type="date" name="dob" required placeholder="enter your birthdate">
     <label for="Sex"> SEX</label><input type="text" name="Sex" value="1">
      <input type="text" name="Country" required placeholder="enter your country name">
      <input type="text" name="password" required placeholder="enter your password">
      <input type="text" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit"  value="register" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>
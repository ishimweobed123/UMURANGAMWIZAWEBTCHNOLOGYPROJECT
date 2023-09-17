<?php

include 'config.php';

session_start();

if(!isset($_SESSION['lname'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>user page</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['lastname'] ?></span></h1>
      <p>this is an user page</p>
      <a href="login.php" class="btn">login</a>
      <a href="registration.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>
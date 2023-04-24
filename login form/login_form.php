<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   // if(mysqli_num_rows($result) > 0){
   //    $_SESSION['usermail'] = $email;
   //    header('location:header.php');
   // }
   if(mysqli_num_rows($result) > 0){
      // Store userId and usermail in session variables
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $row['id'];
      $_SESSION['usermail'] = $row['email'];
      header('location:header.php');
   }else{
      $error[] = 'incorrect password or email.';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-image: url('https://png.pngtree.com/back_origin_pic/04/48/50/84cd2a9fbc6cbd5522b2f048a56703a8.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

<div class="form-container">

    <form action="" method="post">
        <h3 class="title">login now</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <input type="email" name="usermail" placeholder="enter your email" class="box" required>
        <input type="password" name="password" placeholder="enter your password" class="box" required>
        <input type="submit" value="login now" class="form-btn" name="submit">
        <p>don't have an account? <a href="register_form.php">register now!</a></p>
    </form>

</div>
<script src="script3.js"></script>
</body>
</html>
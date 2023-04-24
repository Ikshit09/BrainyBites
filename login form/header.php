<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['usermail'])){
   header('location:login_form.php');
}
$id=$_SESSION['id'];
print$id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="container">
   <div class="content">
      <h3>Welcome!</h3>
      <!-- <p>your email : <span><?php echo $_SESSION['usermail']; ?></span></p> -->
      <p><span><?php echo $_SESSION['usermail']; ?></span></p>
      <p>Are you ready to go on treasure hunt?</p>
      <!-- header("../../clue1.html"); -->
      <!-- <a href="../clue1.html?id=$id" class="start">Start</a>
      <br> -->
      <a href="../clue1.html?id=<?php echo $id; ?>" class="start">Start</a>
         <br>
      <a href="logout.php" class="logout">logout</a>
   </div>
</div>

</body>
</html>
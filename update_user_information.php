<?php
require_once "login form/config.php";

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// // Get the user ID from the URL parameter
// $user_id = $_GET['user_id'];
// $nextClue=$_GET['nextClue'];

// $time_spent = $_GET['time_spent'];

// // Get the number of lives taken and the accuracy
// $lives_taken = $_GET['lives_taken'];
// $accuracy = $_GET['accuracy'];
$user_id = isset($_GET['userId']) ? $_GET['user_id'] : null;
$nextClue = isset($_GET['nextClue']) ? $_GET['nextClue'] : null;
$time_spent = isset($_GET['time_spent']) ? $_GET['time_spent'] : null;
$lives_taken = isset($_GET['lives_taken']) ? $_GET['lives_taken'] : null;
$accuracy = isset($_GET['accuracy']) ? $_GET['accuracy'] : null;
$sql = "";

// Update the user information in the database
if($nextClue === 'clue2.html'){
    $sql = "UPDATE users SET clue1_time='$time_spent', clue1_lives_taken='$lives_taken', clue1_accuracy='$accuracy' WHERE id='$user_id'";
}
else if($nextClue === 'clue3.html'){
    $sql = "UPDATE users SET clue2_time='$time_spent', clue2_lives_taken='$lives_taken', clue2_accuracy='$accuracy' WHERE id='$user_id'";
}
else if($nextClue === 'clue4.html'){
    $sql = "UPDATE users SET clue3_time='$time_spent', clue3_lives_taken='$lives_taken', clue3_accuracy='$accuracy' WHERE id='$user_id'";
}
else if($nextClue === 'clue5.html'){
    $sql = "UPDATE users SET clue4_time='$time_spent', clue4_lives_taken='$lives_taken', clue4_accuracy='$accuracy' WHERE id='$user_id'";
}
else if($nextClue === 'clue6.html'){
    $sql = "UPDATE users SET clue5_time='$time_spent', clue5_lives_taken='$lives_taken', clue5_accuracy='$accuracy' WHERE id='$user_id'";
}
else if($nextClue === 'congrats.html'){
    $sql = "UPDATE users SET clue6_time='$time_spent', clue6_lives_taken='$lives_taken', clue6_accuracy='$accuracy' WHERE id='$user_id'";
}
if(empty($sql)){
    die("Error: Invalid next clue");
}
if (mysqli_query($conn, $sql)) {
    header("Location: $nextClue");
    exit();
} else {
    die("Error updating user information: " . mysqli_error($conn));
}
// Close the database connection
mysqli_close($conn);
?>
<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){

// include "conn.php";
$showlogin=false; 
$showError=false; 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $userna = $_POST['username'];
  $passwor= $_POST['password'];
 
 

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "forums";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{ 
  // Submit these to a database
  // Sql query to be executed 
 
 
    $sql = "Select * from forums where username='$userna' AND password='$passwor'";
   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);
 
   if ($num==1){
       $showlogin = true;
    $row = mysqli_fetch_assoc($result);
       session_start();
       $_SESSION['loggedin']=true;
       $_SESSION['naam']=$userna;
       $_SESSION['password']=$password; 
       $_SESSION['sno']=$row['sno'];
       header("location:index.php");
   }

else{
   $showError = "Passwords do not match";
}
}
}


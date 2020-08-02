<?php

// if ($_SERVER['REQUEST_METHOD'] == 'POST'){

// include "conn.php";
$showAlert=false; 
$showError=false; 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $userna = $_POST['username'];
  $passwor= $_POST['password'];
  $cpassword = $_POST['cpassword']; 
 
  
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
  $existsql = "Select * from forums where username='$userna'";
  $result = mysqli_query($conn , $existsql);
  $num1= mysqli_num_rows($result); 
  if($num1>0){
    $showError = " username already exist";
  }
  else{
  // Submit these to a database
  // Sql query to be executed 
  if($cpassword==$passwor){
 
   $sql = "INSERT INTO `forums` (`sno`, `username`, `password`, `dt`) VALUES (NULL, '$userna', '$passwor', current_timestamp());";
   $result = mysqli_query($conn, $sql);
 
   if ($result){
       $showAlert = true;
      // header("location:index.php?signupsucess=true");
      // include 'nav.php';
      
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Success!</strong> Your entry has been submitted successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>';
  include 'index.php';

   }
}
else{
   $showError = "Passwords do not match";
  //  header("location:index.php?signupsucess=false&error=$showError");
  //  include 'nav.php';
   include 'index.php';
   echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong>'.$showError.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  </div>';

}
}
}
}
?>



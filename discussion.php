<?php
include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>thread</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="jumbotron">
  <h1 class="display-4"></h1>
  <?php


 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "photos";
// // Create a connection
 $conn = mysqli_connect($servername, $username, $password, $database);


   $id= $_GET['discuss'];
       
   $sql="SELECT * FROM `questions` WHERE `s_no`='$id'";
   $result = mysqli_query($conn, $sql);
 $num = mysqli_num_rows($result);
 while($row=mysqli_fetch_assoc($result)){
echo '<h3 class="display-4">'.$row{'thread_title'}.'</h3>
 <p class="lead"></p>
 <hr class="my-4">
 <p>'.$row{'thread_discription'}.'</p>
 <a class="btn  btn-primary btn-sm" href="# role="button">Learn more</a>';
 }
?>






<?php


$method= $_SERVER['REQUEST_METHOD'];

if($method=='POST'){
    // $thread_id= $_POST['thread_id'];
  $comment_desc= $_POST['comment_desc'];
  // $comment_time= $_POST['comment_time'];
   $sno=$_POST['sno'];

   
$sql="INSERT INTO `comment` (`s_no`, `comment_desc`, `thread_id`, `comment_id`, `comment_time`) VALUES (NULL, '$comment_desc', '$id', '$sno', current_timestamp());";
$result = mysqli_query($conn , $sql);

}
else{
echo ""; 
}

?>



 </div>
</div>
</div>
<div class="container">
<h1 style="text-align:center">discussions</h1>
<br>

</div>

<div class="container">
<?php

$id= $_GET['discuss'];
$sql="SELECT * FROM `comment` where thread_id=$id";

$servername = "localhost";
 $username = "root";
 $describe = "";
 $database = "photos";

 // Create a connection
 
$conn = mysqli_connect($servername, $username, $describe, $database);
                                                          
$result = mysqli_query($conn, $sql);
 
$noresult=true; 
 while($row=mysqli_fetch_assoc($result)){
   $noresult=false; 
   $ids= $row{'s_no'}; 
  //  $title = $row{'thread_title'}; 
   $des=$row{'comment_desc'}; 
  $comment_time=$row{'comment_time'};
$comment_id = $row{'comment_id'};
  $sql2="SELECT username FROM `forums` WHERE sno=$comment_id";
  $result2 = mysqli_query($conn, $sql2);
  $row2=mysqli_fetch_assoc($result2);

   echo "
<div class='question'>
<h6><i class='fa fa-user'></i>".$row2['username']." :-</h6><h6>$comment_time</h6>
<p>$des</p>
      

<div>";
 }
 if($noresult){
   echo '
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Result</h1>
    <p class="lead">no comment found , wanna add your comment?</p>
  </div>
</div>
'; 
 } 


?>
</div>














<?php 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
echo'
<div class="container my-4">
     <h1 class="text-center">Add your comment</h1>
     <form action=" '. $_SERVER["REQUEST_URI"].'" method="POST">
        <!-- <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

        </div> -->
        <div class="form-group">
            <label for="text">your comment</label>
            <input type="text" class="form-control" id="comment_desc" name="comment_desc">
            <input type="hidden" class="form-control" id="sno" name="sno" value="'.$_SESSION['sno'].'">
       
            
        </div>
        <!-- <div class="form-group">
            <label for="describe">describe your question</label>
            <textarea type="text" class="form-control" rows="3"  id="thread_discription" name="thread_discription"></textarea>
 
        </div> -->
         
        <button type="submit" class="btn btn-primary">Add</button>
     </form>
    </div>';
}
else{
  echo "you cannot comment ,you have to login/signup";
}
    ?>


</body>
</html>
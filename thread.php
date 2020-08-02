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
  <link type="text/css" rel="stylesheet" href="path_to/simplePagination.css"/>
 
</head>
<body>
<div class="container my-4">
<div class="jumbotron">
  <h1 class="display-4"></h1>
  <?php


 $servername = "localhost";
 $username = "root";
 $describe = "";
 $database = "photos";
// // Create a connection
 $conn = mysqli_connect($servername, $username, $describe, $database);


   $id= $_GET['title'];
   $sql="SELECT * FROM `photos` WHERE `s_no`='$id'";
   $result = mysqli_query($conn, $sql);
     
//  $num = mysqli_num_rows($result);
 while($row=mysqli_fetch_assoc($result)){
 
echo '<h1 class="display-4">'.$row{'title'}.'</h1>
 <p class="lead"></p>
 <hr class="my-4">
 <p>'.$row{'discription'}.'</p>
 <a class="btn btn-primary btn-lg" href="# role="button">Learn more</a>';
 }
 
?>

<?php


$method= $_SERVER['REQUEST_METHOD'];

if($method=='POST'){
   $thread_title= $_POST['thread_title'];
  $thread_discription= $_POST['thread_discription'];

   
$sql="INSERT INTO `questions` (`s_no`, `thread_title`, `thread_discription`, `thread_id`, `time`) VALUES (NULL, '$thread_title', ' $thread_discription', '$id', current_timestamp())";
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
<h1 style="text-align:center">browse question</h1>
<br>
<?php
$sql="SELECT * FROM `questions` WHERE `thread_id` = $id";

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
   $title = $row{'thread_title'}; 
   $des=$row{'thread_discription'}; 
   echo "
<div class='question contents' >
      <h4><a style='color:black;' href='./discussion.php?discuss=".$ids." '>$title</a></h4>
      
<p>$des</p>
<div>";
 }
 if($noresult){
   echo '
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Result</h1>
    <p class="lead">no result found , wanna add your question?</p>
  </div>
</div>
'; 
 } 


?>
<div class="container"> <h1 class="text-center">Add your question</h1></div>
<?php

 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
echo '
<div class="container my-4">

    
     <form action=" '. $_SERVER["REQUEST_URI"].'" method="POST">
        <!-- <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

        </div> -->
        <div class="form-group">
            <label for="text">your question</label>
            <input type="text" class="form-control" id="thread_title" name="thread_title">
        </div>
        <div class="form-group">
            <label for="describe">describe your question</label>
            <textarea type="text" class="form-control" rows="3"  id="thread_discription" name="thread_discription"></textarea>
 
        </div>
         
        <button type="submit" class="btn btn-primary">Add</button>
     </form>
    </div> ';}
    else{
      echo "<div class='container my-4'><h4>you cannot add your question ,you have to login/signup</h4></div>";
    } 
?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript" src="path_to/jquery.js"></script>
<script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>
<script>
  $(function() {
    $(.contents).pagination({
        items: 5,
      
        itemsOnPage: 10,
        cssStyle: 'light-theme'
    });
});
</script> 
</body>
</html>
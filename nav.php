<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>forums</title>
</head>
<body>
<?php 
session_start();

echo'
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-light" href="./index.php">Home<span class="sr-only">(current)</span></a>
      </li>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
  
      echo'
      <li class="nav-item">
        <a class="nav-link text-light" href="./logout.php" >logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <p class="text-light">welcome '.$_SESSION['naam'].'</p>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      ';}


     else{ 
            echo'
      <li class="nav-item active">
        <a class="nav-link text-light" href="./handelsignup.php" data-toggle="modal" data-target="#myModal">sign up</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light" href="./handelogin.php" data-toggle="modal" data-target="#modellogin">login</a>
      </li>';
     }
    
      echo'
    </form>
  </div>
</nav>
';

?>


<?php
// include 'signupmodal.php';
// include 'signupmode.php';
//  if(isset($_GET['signupsucess'])&& $_GET['signupsucess']==true){
  
//     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//       <strong>Success!</strong> Your entry has been submitted successfully!
//       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">×</span>
//     </button>
//   </div>';
// }
  
//   else{
//     echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
//     <strong>Error!</strong>'.$showError.'
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">×</span>
//   </button>
//   </div>';
//   }
  
  
  // else{
  //   echo "failed";
  // }
  ?>













</body>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
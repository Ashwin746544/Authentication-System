<?php
$exists=false;
$showpassworderror=false;
$showusererror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'dbconnect.php';
    $username=$_POST['Username'];
    $password=$_POST['Password'];
    $cpassword=$_POST['cPassword'];
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $newuserquery="select * from `users` where `username`='$username'";
    $result=mysqli_query($conn,$newuserquery);
    $no=mysqli_num_rows($result);
    if($no>0){
        $exists=true;
    }
    if(!$exists){
      if($password==$cpassword){
        $sql="insert into `users`(`username`,`password`) values('$username','$hash')";
        $result=mysqli_query($conn,$sql);
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location: Welcome.php");
        }
        else{
            $showpassworderror=true;
        }
    }
    else{
        $showusererror=true;
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <?php require 'navbar.php'?>
  <?php
  if($showpassworderror){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>warning!</strong> Your password does not matched.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if($showusererror){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oppsssss!</strong>User already exists.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } 
  ?>

  <div class="container col-4">
  <h2>SignUp To Our Website</h2>
  <form action="/Login-System/SignUp.php" method="post">
  <div class="form-group">
    <label for="Username">Username</label>
    <input type="text" class="form-control" id="Username" name="Username" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cPassword">
  </div>
  
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
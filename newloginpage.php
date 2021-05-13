<?php
$login=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
   
    $loginquery="SELECT * FROM `users` WHERE `username`='$username' and `password`='$password' ";
    $loginresult=mysqli_query($conn,$loginquery);
    $no=mysqli_num_rows($loginresult);
    if($no>0){
        
               session_start();
               $login=true;
               $_SESSION['loggedin']=true;
               $_SESSION['username']=$username;
              // echo $_SESSION['username']=$username;
              header("location: Welcome.php");
       
    }
    else{
        $showerror="Invalid Credentials" ;
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

    <title>Login</title>
  </head>
  <body>

  <?php require 'navbar.php'?>
  <?php
  if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>success!</strong>Now, You are Logged in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if($showerror){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>warning!</strong>'.$showerror.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } 
  ?>

  <div class="container col-4">
  <h2>Login To Our Website</h2>
  <form action="/Login-System/Login.php" method="post" >
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="passsword" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
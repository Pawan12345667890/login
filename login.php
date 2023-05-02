<?php
    $login=false;
    $showalert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'p/data.php';
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select* from harry where username='$username' AND password='$password'";
  
    $result = mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);
    if($num==1){ 

      $login=true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;
      header("location:index.php");
    }
     else
     {
      $showalert=" inviles ";
     }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <?php require 'p/nav.php'; ?>
  <?php
  if ($login)
  {
    
    header("location:welcome.php");
    

  }
  if ($showalert)
  {

    echo '<div class="alert alert-danger" role="alert">
    <strong>'.$showalert.'</strong> login
    </div>';

  }

  ?>


  <body>
    <form action="/harry/login.php" method="POST" >
      <h1>LOGIN page </h1>
      <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="username" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
    
      <button type="submit" class="btn btn-primary">LOGIN</button>
    </form>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
<?php
session_start();
include("conn.php");
include("auth.php");
$authobj = new login($conn);


if(isset($_POST['register']))
{
  // extract($_POST['register']);
  $name = $_POST['name'];
  $email = $_POST['email'];
 $password = $_POST['password'];

  $results = $authobj->register($name,$email , $password);
  
    if ($results)
  {
            
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                 $_SESSION["password"] = $password;
                header("location:login.php");

}
      else{
        echo "insert failed";
        header("location:register.php");

      }
 }
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="#" method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" required name="name">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" required name ="email">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" required name="password">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="register" name ="register">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>
<?php
include("conn.php");
include("auth.php");
$authobj = new login($conn);


if(isset($_POST['login']))
{
  // extract($_POST['login']);
  $email = $_POST['email'];
 $password = $_POST['password'];

  $results = $authobj->Login($email , $password);
  
    if ($results)
  {
                $_SESSION["email"] = $email;
                $_SESSION["roleuserID"] = $results[0]['roleuserID'];
                if ( $_SESSION["roleuserID"] == 1)
                {
                  
                header("location:dashboard/dashboard.php");

                }
              else if ($_SESSION["roleuserID"] == 2)
                {
                  header("location:index.php");

                }
              

}
      else{
        echo "Identifiants incorrects";
        

      }
 }
  



// $authobj->Login($email , $password);

// if (isset($_POST['login'])) {
//   $email = $_POST['email'];
//   $password = $_POST['password'];

//   // $hashedPassword = md5($password);

//   $sql = "SELECT * FROM users WHERE email='$email' AND passwordHash='$password'";
//   $result = mysqli_query($connObj->conn, $sql);

//   if ($result) {
//       if (mysqli_num_rows($result) > 0) {
//           $_SESSION["email"] = $email;
//           $_SESSION["password"] = $password;
//           header("location:index.php");
//           exit();
//       } else {
//           echo "Identifiants incorrects";
//       }
//   } 
// }



?>
<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | CodingLab</title>
  <link rel="stylesheet" href="styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Login Form</span></div>
      <h1></h1>
    
      <form action="" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="email" placeholder="Email or Phone" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="pass"><a href="#">Forgot password?</a></div>
        <div class="row button">
          <input type="submit" value="Login" name= "login">
        </div>
        <span style="color:red;"></span>
        <div class="signup-link">Not a member? <a href="register.php">Signup now</a></div>
      </form>
    </div>
  </div>

</body>

</html>
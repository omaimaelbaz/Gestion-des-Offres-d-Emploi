<?php
namespace App\Controllers;
use App\Models\login;
        


class LoginController
{
    
    public function Login()
    {
        require(__DIR__ .'/../../view/login.php');
       if(isset($_POST['login']))
{
  // extract($_POST['login']);
  $email = $_POST['email'];
 $passwordHash = MD5( $_POST['passwordHash']);
 $authobj = new Login();

  $results = $authobj->Login($email , $passwordHash);
  
    if ($results)
  {
                $_SESSION["email"] = $email;
                $_SESSION["roleuserID"] = $results[0]['roleuserID'];
                if ( $_SESSION["roleuserID"] == 1)
                {
                  
                header("location:?route=dashboard");

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
    } 
 
  
}


?>

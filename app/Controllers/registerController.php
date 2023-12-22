<?php
namespace App\Controllers;
use App\Models\register;
        


class registerController
{
    
    public function register()
    {
        require(__DIR__ .'/../../view/register.php');
    
{
  // extract($_POST['login']);

  if(isset($_POST['register']))
  {
    // extract($_POST['register']);
    $name = $_POST['name'];
    $email = $_POST['email'];
   $passwordHash = MD5($_POST['passwordHash']);
   $authobj= new register();
  
  
    $results = $authobj->register($name ,$email,$passwordHash);
    
      if ($results)
    {
              
                  $_SESSION["name"] = $name;
                  $_SESSION["email"] = $email;
                   $_SESSION["passwordHash"] = $password;
                  header("location:?route=login");
  }
        else{
          echo "insert failed";
        
  
        }
   }
 }
    } 
 
  
}


?>

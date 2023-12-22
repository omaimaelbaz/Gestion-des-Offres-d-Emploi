<?php
namespace App\Controllers;


class HomeController    
{
    public function index()
    {
        require(__DIR__ .'../../../view/home.php');
      

    }

  
   
    public function Test(){
        require(__DIR__ .'../../../view/test.php');
    }
    public function Test2(){
        require(__DIR__ .'../../../view/page2.php');
    }
}
?>

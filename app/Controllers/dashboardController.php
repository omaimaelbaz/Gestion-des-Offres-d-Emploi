<?php
namespace App\Controllers;




class dashboardController   
{
    public function dashboard()
    {
        require(__DIR__ .'../../../view/dashboard.php');

    }
    public function candidat()
    {
        require(__DIR__ .'../../../view/condidat.php');
      

    }
    public function offre()
    {
        require(__DIR__ .'../../../view/offre.php');
      

    }
    public function contact()
    {
        require(__DIR__ .'../../../view/contact.php');
      

    }




    




    
}
?>
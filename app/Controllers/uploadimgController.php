<?php
namespace App\Controllers;

class uploadimgController {
    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $description = $_POST['description'];
            $title = $_POST['title'];
            $company = $_POST['entreprise'];
            $location = $_POST['location'];
            $isative = $_POST['IsActive'];
            $imageurl = $_POST['imageURL'];
            $approve = $_POST['approve'];
        
            $offreobj = new job();
        
           
            $currentDateTime = date("Y_m_d_H_i_s");
            $targetDir = "uploads/"; 
            $imageName=$currentDateTime. basename($_FILES["file"]["name"]);
            $targetFile = $targetDir.$imageName;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                $result = $offreobj->addOffre($description, $title, $company, $location, $status, $imageName);
        
                if ($result) {
                    echo "Offre ajou    tée avec succès.";
                    header('location:dashboard.php' );
                } else {
                
                    echo "Erreur lors de l'ajout de l'offre.";
                }
            } 
            
        }

    }
   

}

?>

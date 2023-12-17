<?php
include_once '../conn.php';
include_once '../Ofre.php';


// Vérifier si le formulaire a envoyer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $status = $_POST['status'];

    $offreobj = new Offre($conn);

   
    $currentDateTime = date("Y_m_d_H_i_s");
    $targetDir = "uploads/"; 
    $imageName=$currentDateTime. basename($_FILES["file"]["name"]);
    $targetFile = $targetDir.$imageName;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        $result = $offreobj->addOffre($description, $title, $company, $location, $status, $imageName);

        if ($result) {
            echo "Offre ajoutée avec succès.";
            header('location:dashboard.php' );
        } else {
        
            echo "Erreur lors de l'ajout de l'offre.";
        }
    } 
    
}
?>

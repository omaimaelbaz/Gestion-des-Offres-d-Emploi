<?php
include_once("conn.php");

class Operation extends Connection
{
    // insérer une nouvelle offre
    public function insertOffre($description, $title, $company, $location, $status, $urlImg)
    {
        $conn = $this->Insert();

        // Utilisation de déclarations préparées pour éviter les attaques par injection SQL
        $stmt = $conn->prepare("INSERT INTO offres (description, title, company, location, status, URLIMG) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $description, $title, $company, $location, $status, $urlImg);

        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }

    //mettre à jour une offre existante
    public function updateOffre($id, $description, $title, $company, $location, $status, $urlImg)
    {
        $conn = $this->Insert();

        $stmt = $conn->prepare("UPDATE offres SET description=?, title=?, company=?, location=?, status=?, URLIMG=? WHERE id=?");
        $stmt->bind_param("ssssssi", $description, $title, $company, $location, $status, $urlImg, $id);

        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }

    // supprimer une offre
    public function deleteOffre($id)
    {
        $conn = $this->Insert();

        $stmt = $conn->prepare("DELETE FROM offres WHERE id=?");
        $stmt->bind_param("i", $id);

        // Exécution de la requête
        $result = $stmt->execute();

        // Fermeture de la connexion 
        $stmt->close();
        $conn->close();

        return $result;
    }

    // Méthode pour récupérer toutes les offres
    public function getAllOffres()
    {
        $conn = $this->Insert();

        $result = $conn->query("SELECT * FROM offres");

        // Fermeture de la connexion 
        $conn->close();

        return $result;
    }
}

?>

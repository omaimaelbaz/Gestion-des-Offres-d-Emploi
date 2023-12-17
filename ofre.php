<?php
class Offre {
    private $description;
    private $title;
    private $company;
    private $location;
    private $status;
    private $con; 
    private $URLIMG; 

    // Constructeur avec connexion
    public function __construct($conn) {
        $this->con = $conn;
    }

  
    public function addOffre($description, $title, $company, $location, $status, $URLIMG) {
        $this->description = $description;
        $this->title = $title;
        $this->company = $company;
        $this->location = $location;
        $this->status = $status;
        $this->URLIMG = $URLIMG;

        $query = "INSERT INTO offres (description, title, company, location, status, URLIMG) VALUES (?, ?, ?, ?, ?,?)";
        
        $stmt = $this->con->prepare($query);
        $res=$stmt->execute([$this->description, $this->title, $this->company, $this->location, $this->status, $this->URLIMG]);
        if($res) {
            return true;
        } else {
            return false;
        }
       
    }
    public function getOffre() {
        $stm = "SELECT * FROM offres";
        $result =$this->con->query($stm);
        $tableResult=[];
        while ($row = $result->fetch_assoc()){
            $tableResult[]=$row;
        }
        return $tableResult;
    }
}

<?php
namespace App\Models;
use App\Models\Database;
session_start();

class searchJobs{
    public $con;
    // private $description;
    // private $title;
    // private $entreprise;
    // private $location;
    // private $IsActive;
    // private $imageURL; 
    public function __construct()
    {
        // Get an instance of the Database class
        $this->con = Database::getInstance()->getConnection();
    } 

    function search_job($name , $location , $entreprise){
        $sql = "SELECT * FROM job WHERE title LIKE '%$name%' 
        AND `location` LIKE '%$location%' 
        AND entreprise LIKE '%$entreprise%'";
        $result = $this->con->query($sql);  
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }  

    public function getOffre() {
        $stm = "SELECT * FROM jobs";
        $result =$this->con->query($stm);
        $tableResult=[];
        while ($row = $result->fetch_assoc()){
            $tableResult[]=$row;
        }
        return $tableResult;
    } 
 }
 ?>
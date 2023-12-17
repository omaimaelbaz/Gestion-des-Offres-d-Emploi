<?php
session_start();

require_once "conn.php";
class search_job{
    public $con;
    public function __construct($conn){
        $this->con = $conn;
    }
    function search_job($name , $location , $company){
        $sql = "SELECT * FROM offres WHERE title LIKE '%$name%' 
        AND `location` LIKE '%$location%' 
        AND company LIKE '%$company%'";
        $result = $this->con->query($sql);  
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }   
 }
 // 

 if(isset($_GET['name'])){
    header('Content-Type: application/json');
    $job = new search_job($conn);
    $name = $_GET['name'];
    $location = $_GET['location'];
    $company = $_GET['company'];
    $jobs = $job->search_job($name , $location , $company);
    if($jobs){
        echo json_encode($jobs); // convert responce on object 
         
    }
}


?>

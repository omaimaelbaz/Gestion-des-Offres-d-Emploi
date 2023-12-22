<?php
namespace App\Controllers;
use App\Models\searchJobs;

class SearchController
{
    public function search()
    {
    if(isset($_GET['name']))
    {
        header('Content-Type: application/json');
        $job = new searchJobs();
        $name = $_GET['name'];
        $location = $_GET['location'];
        $entreprise = $_GET['entreprise'];
        $jobs = $job->search_job($name , $location ,$entreprise);
        // echo "<pre>";
        // print_r($jobs);
        // echo "</pre>";
        // die();
        if($jobs)
        {
            echo json_encode($jobs); // convert responce on object 
        }
    }
}
}

?>
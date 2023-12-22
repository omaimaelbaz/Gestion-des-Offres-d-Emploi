<?php

namespace App\Models;
use App\Models\Database;
session_start();
class login {
    public $con;
    public function __construct()
    {
        // Get an instance of the Database class
        $this->con = Database::getInstance()->getConnection();
    } 
    public function Login($email , $password)
    {
        
        // $passwordHash = MD5($passwordHash);
         $passwordHash = MD5( $_POST['passwordHash'] );
        $SQL = "SELECT * FROM users WHERE email = '$email' AND `passwordHash`='$passwordHash'";
        $result = $this->con->query($SQL);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } 

}


?>
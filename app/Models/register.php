<?php
namespace App\Models;
use App\Models\Database;

class register

{
    public $con;
    public function __construct()
    {
        // Get an instance of the Database class
        $this->con = Database::getInstance()->getConnection();
    } 

public function register ($name ,$email, $password )
    {
        $sql ="INSERT INTO users(username, email, passwordHash,roleuserID)
         VALUES('$name','$email','$password',2)";
        $result = $this->con->query($sql);
        return $result;

    }

}

?>

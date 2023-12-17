<?php


class login 
{
    // attribute name
    public $email;
    public $password;
    // public $passwordHash;
    public $con;
    public function __construct($conn)
    {
        $this->con = $conn;
    }

    public function Login($email , $password){
        
        // $passwordHash = MD5($password);
        $password = $_POST['password'];
        $SQL = "SELECT * FROM users WHERE email = '$email' AND `passwordHash` = '$password'";
        $result = $this->con->query($SQL);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } 
    public function register ($name ,$email, $password )
    {
        $sql ="INSERT INTO users(username, email, passwordHash,roleuserID)
         VALUES('$name','$email','$password',2)";
        $result = $this->con->query($sql);
        return $result;

    }
    public function logout ()
    {
        if(isset($_GET['link']))
        {
            
        session_destroy();
        header("location:index.php");
        }

    }

}
?>
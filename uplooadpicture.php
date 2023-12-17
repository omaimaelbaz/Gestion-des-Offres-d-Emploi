<?php 
include"conn.php";
$resp ="";


if (isset($_POST["submit"])) {
    if(!empty($_FILES['file']['name']))
    {
        $image = basename($_FILES['file']);// base namefuction kukon fiha smiya d img
        $filepath = uniqid() .'.'. $image;/// ktkhlih smiya d img t3wed
        $filetype = pathinfo($img, PATHINFO_EXTENSION)// filetype   img wach jpe or ...
        $formats = array('  PNG', ' JPG', ' GIF', ' BMP', ' PNG', ' BMP', ' GIF', ' BMP', ' GIF');
        if(in_array($filetype, $formats)) { 
            if(move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) // this function its like copy past   
            {
                $resp = "success";
                $sql = "INSERT INTO  "
            } else {
                $resp = "error";
            }
        } else {

    }
}
// admin  upload 


//


?>
<html>
    <form action="" encrtype=""></form>

</html>
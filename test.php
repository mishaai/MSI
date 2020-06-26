<?php

include('./config.php');
include('./class/db.php');
include('./class/role.php');
include('./class/login.php');


$login = new Login();


$login->init();





//echo( );
//print_r($_SERVER["REQUEST_METHOD"]);
//if (isset($_PUT)){

   // parse_str(file_get_contents("php://input"),$post_vars);

   // print_r($post_vars);
//}


?>
<?php

	define('DB_SERVER', '*');
	define('DB_USERNAME', 'sa');
	define('DB_PASSWORD', '*');
	//define('DB_DATABASE', 'MIS');
	define('LOGIN_PAGE', 'login.php'); 	// login page 
	define('MAIN_PAGE', 'index.php'); 	// main page 
	define('COOKIE_EXPIRATION_TIME',60 * 10); // cookie expiration time 


	session_set_cookie_params(COOKIE_EXPIRATION_TIME); 
    session_start();
    session_regenerate_id(TRUE);

?>
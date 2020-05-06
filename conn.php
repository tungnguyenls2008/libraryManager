<?php
require '/var/www/html/config.php';
	$db_username = 'root';
	$db_password = PASSWORD;
	$conn = new PDO( 'mysql:host=localhost;dbname=db_login', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}

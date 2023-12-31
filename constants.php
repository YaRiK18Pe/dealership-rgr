<?php
	// Константи бази даних
	require "rb.php";
	$server = "127.0.0.1";
	$login ="root";
	$pass ="";
	$name_db = "dealership";
	
	$link = mysqli_connect($server, $login, $pass, $name_db);
R::setup( 'mysql:host=localhost;dbname=dealership',
'root', '' );
if ($link == False)
{
    echo"Звязку немає";
}
session_start();

?>  

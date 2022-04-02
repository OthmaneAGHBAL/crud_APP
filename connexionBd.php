<?php

// Création du DSN

$host = "localhost:3308";
$database_name = "test";
$username = "root";
$pass= "";

//On établit la connexion
$conn = mysqli_connect($host,$username,$pass);
mysqli_select_db($conn,$database_name);


?>

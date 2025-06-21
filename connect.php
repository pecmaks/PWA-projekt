<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "filmovi_projekt";
$port = 3306; 

$dbc = mysqli_connect($host, $user, $pass, $db, $port) 
    or die("Greška pri spajanju na bazu: " . mysqli_connect_error());

mysqli_set_charset($dbc, "utf8");
?>

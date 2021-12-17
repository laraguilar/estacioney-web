<?php
$host = "localhost";
$user = "root";
$pass ="";
$db = "estacioney";
$port = 3308;

$conn = new PDO("mysql:host=$host;port=$port;dbname=".$db, $user, $pass);
?>
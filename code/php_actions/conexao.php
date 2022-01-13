<?php
$host = "l6glqt8gsx37y4hs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "ejxmaj2pnpt8e86z";
$pass ="b147ao62taewthjc";
$db = "jmukadihhslhvhya";
$port = 3306;

$conn = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_error()):
    echo "Falha na conexão: ". mysqli_connect_error();
endif;
?>
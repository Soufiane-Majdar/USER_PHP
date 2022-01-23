<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "TP_Sessions";

try {
    $pdo= new PDO("mysql:host=".$servername.";dbname=".$dbname,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
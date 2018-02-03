<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sistema_prestamo';

try {
    $connection = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
}
catch(PDOException $error) {
    die('Connection failed: '.$error->getMessage);
}

?>
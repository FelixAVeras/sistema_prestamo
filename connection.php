<?php

// $connection = new mysqli('localhost', 'root', '', 'sistemaprestamos');

$servername = 'localhost';
$username = 'root';
$password = '';

try {
  $connection = new PDO("mysql:host=$servername;dbname=sistemaprestamos", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Conexion Exitosa";
}
catch(PDOException $e) {
  echo "Fallo en la conexión: " . $e->getMessage();
}

?>

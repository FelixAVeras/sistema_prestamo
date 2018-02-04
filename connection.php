<?php

$connection = new mysqli('localhost', 'root', '', 'sistema_prestamo');

if($connection->connect_errno) {
	echo "Error al conectarse: ".$connection->connecterror;
}

?>
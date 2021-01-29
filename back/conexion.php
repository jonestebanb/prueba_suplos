<?php
//Archivo de LA conexion a la base de datos "inmuebles"
$mysqli = new mysqli('localhost', 'root', '', 'intelcost_bienes');
$mysqli->set_charset("utf8");
if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

?>
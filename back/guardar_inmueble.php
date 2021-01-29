<?php
include('conexion.php');// se incluye el archivo de conexion a la base de datos

if(isset($_GET['id_inmueble'])){//se verifica que la variable id_inmueble contenga algo

$id_ = $_GET['id_inmueble'];// se asigna a la variable $id_ el id_inmueble del formulario

$sql = "INSERT INTO guardados( id_inmueble, guardado, eliminado, usuario) VALUES(".$id_." , 1, 0, 1) ";//se realiza el insert a la tabla guardados para que archive la informacion requerida
//echo $sql;
$resultado = $mysqli->query($sql) or die ($mysqli->error);// se ejecuta la consulta mediante el quer en caso contrario muestra el respectivo error

}
header('Location:../index.html');// se devuelve la pagina al index.html del proyecto
?>
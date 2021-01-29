<?php

include('conexion.php');//se incluye el archivo de conexion a la base de datos

if(isset($_GET['id_guardado'])){//se verifica que la variable id_guardado contenga algo

$id_ = $_GET['id_guardado'];// se asigna a la variable $id_ el id del formulario

$sql = "UPDATE guardados SET eliminado = 1 WHERE id_guardados = ".$id_." LIMIT 1 ";// se actualiza la tabla guardados para que ponga el estado "eliminado en 1"
//echo $sql;
$resultado = $mysqli->query($sql) or die ($mysqli->error);// se ejecuta la consulta mediante el quer en caso contrario muestra el respectivo error

}
header('Location:../index.html');// se devuelve la pagina al index.html del proyecto

?>
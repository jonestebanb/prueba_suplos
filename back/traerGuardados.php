<?php
include('conexion.php');

$sql="SELECT * FROM guardados g INNER JOIN inmueble i ON g.id_inmueble = i.id_inmueble WHERE g.usuario = 1 AND g.eliminado = 0";

$sql2="SELECT COUNT(i.id_inmueble) AS cantidad FROM guardados g INNER JOIN inmueble i ON g.id_inmueble = i.id_inmueble  WHERE g.usuario = 1 AND g.eliminado = 0 ";
//echo $sql;
$resultado  = $mysqli->query($sql) or die($mysqli->error);
$resultado2 = $mysqli->query($sql2)or die($mysqli->error);

while($cant = $resultado2->fetch_assoc()){
    echo"
    <p><b>Resultados de la búsqueda: ".$cant['cantidad']."</b></p>
        ";
    }
echo"
<thead>
    <tr>
        <th> </th>
        <th> </th>
    </tr>
</thead>
    <tbody>"; 
        while($row = $resultado->fetch_assoc()) {
            echo"

            <tr>
                <td> <img src='img/home.jpg' alt='home' width='180' height='150'> </td>

                <td> 
                    <b>Dirección:</b>      ".$row['Direccion']."    <br>   
                    <b>Ciudad:   </b>      ".$row['Ciudad']."       <br> 
                    <b>Teléfono: </b>      ".$row['Telefono']."     <br> 
                    <b>Codigo postal: </b> ".$row['Codigo_Postal']."<br>
                    <b>Tipo:     </b>      ".$row['Tipo']."         <br> 
                    <b>Precio:   </b>      ".$row['Precio']."       <br>                 
                </td>
            </tr>
            <tr>
                <td>  </td>
                <td>                    
                    <a class='btn waves-effect waves-light red lighten-1' href='back/eliminar_inmueble.php?id_guardado=" .$row["id_guardados"]." '> ELIMINAR</a>
                </td>
            </tr>";            
            }         
      echo"  </tbody>";
//mysqli_close($mysqli);

?>
<?php
include('conexion.php');

if(isset($_POST['ciudad'])){

$valor = $_POST['ciudad'];
$tipo = $_POST['tipo'];

$sql="SELECT * FROM inmueble i INNER JOIN ciudades c ON i.Ciudad = c.ciudad INNER JOIN tipo t ON i.Tipo = t.nombre_tipo WHERE c.id = '".$valor."' AND t.id = '".$tipo."'";

$sql2="SELECT COUNT(i.id_inmueble) AS cantidad FROM inmueble i INNER JOIN ciudades c ON i.Ciudad = c.ciudad INNER JOIN tipo t ON i.Tipo = t.nombre_tipo WHERE c.id = '".$valor."' AND t.id = '".$tipo."'";
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
                    <a class='btn' href='back/guardar_inmueble.php?id_inmueble=" .$row["id_inmueble"]." '> GUARDAR</a>
                </td>
            </tr>";            
            }         
      echo"  </tbody>";
//mysqli_close($mysqli);
}
?>
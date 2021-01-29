<?php
//ESTE ARCHIVO ES EL ENCARGADO DE SUBIR LA INFORMACION DEL ARCHIVO "data-1.json" A LA BASE DE DATOS
function Insertar($id, $Direccion,$Ciudad, $Telefono, $Codigo_Postal, $Tipo, $Precio){
      
include('conexion.php');

      $res = $mysqli->query  ('INSERT INTO inmueble (id,Direccion,Ciudad,Telefono,Codigo_Postal,Tipo,Precio) VALUES ("'.$id.'", "'.$Direccion.'","'.$Ciudad.'", "'.$Telefono.'", "'.$Codigo_Postal.'", "'.$Tipo.'", "'.$Precio.'" )');
    
      if($res){
        echo "La operacion resulto exitosa";
      }else{
        echo "Error en el Query";
      }
          
    }

    $data = file_get_contents("data-1.json");//se obtiene la informacion del archivo
    $cards = json_decode($data, true);//decodifica el archivo anterior
    $i=0;//variable para iterar cada campo del archivo
    foreach($cards as $bien) {//se recorre el archivo 
        Insertar($bien['Id'], $bien['Direccion'], $bien['Ciudad'], $bien['Telefono'], $bien['Codigo_Postal'], $bien['Tipo'], $bien['Precio']);//Metodo que inserta la informacion al SQL
        $i++;
    }
    mysqli_close($conexion);//Cierra la conexion
    ?>      
    }
}

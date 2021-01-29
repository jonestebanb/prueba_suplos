<?php
	header('Content-type:application/xls');//se declaran las cabeceras en formato xls
	header('Content-Disposition: attachment; filename=Reporte.xls');//se declara el descargable y se le asigna el nombre de Reporte.xls

	include('conexion.php');//se incluye el archivo de conexion.php

	$valor = $_POST['ciudadReporte'];//se reciben las variables desde el formulario
	$tipo = $_POST['tipoReporte'];//se reciben las variables desde el formulario

	$sql="SELECT * FROM inmueble i INNER JOIN ciudades c ON i.Ciudad = c.ciudad INNER JOIN tipo t ON i.Tipo = t.nombre_tipo WHERE c.id = '".$valor."' AND t.id = '".$tipo."'";//consulta para traer los registros segun el criterio a buscar
	$resultado  = $mysqli->query($sql) or die($mysqli->error);//se ejecuta la consulta mediante el query en caso contrario mmuestra error
?>
<!-- Se empieza a crear el formato que se va a mostrar en el archivo de excel-->
<table border="1">
	<tr style="background-color:red;">
		<th>Direccion</th>
		<th>Ciudad</th>
		<th>Telefono</th>
		<th>Codigo Postal</th>
		<th>Tipo</th>
		<th>Precio</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($resultado)) {
			?>
				<tr>
					<td><?php echo $row['Direccion']; ?></td>
					<td><?php echo $row['Ciudad']; ?></td>
					<td><?php echo $row['Telefono']; ?></td>
					<td><?php echo $row['Codigo_Postal']; ?></td>
					<td><?php echo $row['Tipo']; ?></td>
					<td><?php echo $row['Precio']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>
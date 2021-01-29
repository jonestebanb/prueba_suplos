//MOSTRAR TODOS LOS BIENES EN UNA TABLA DENTRO DEL MISMO PANEL "BIENES DISPONIBLES"
document.querySelector('#boton').addEventListener('click', mostrarTodos);

function mostrarTodos(){

	const xhttp = new XMLHttpRequest();
	xhttp.open('GET', 'data-1.json', true);
	xhttp.send();

	xhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){		

			let datos = JSON.parse(this.responseText);
			//console.log(datos);
			let res = document.querySelector('#res');
			res.innerHTML = '';

			for(let dato of datos){

				res.innerHTML +=`
				<thead>
                  <tr>
                    <th>  </th>
                    <th>  </th>                   
                  </tr>
                </thead>

                <tbody >
	                <tr>
	                	<td> <img src="img/home.jpg" alt="home" width="180" height="150"> </td>

	                	<td> 
	                		<b>Dirección:</b>      ${dato.Direccion}    <br>   
	                	    <b>Ciudad:   </b>      ${dato.Ciudad}       <br> 
	                		<b>Teléfono: </b>      ${dato.Telefono}     <br> 
	                		<b>Codigo postal: </b> ${dato.Codigo_Postal}<br>
	                		<b>Tipo:     </b>      ${dato.Tipo}         <br> 
	                		<b>Precio:   </b>      ${dato.Precio}       <br> 
	                	</td>
	                </tr>
				</tbody>
				`
			}
		}
	}
}
//LLENAR EL SELECT DE LAS CIUDADES Y TIPO DE LOS FORMULARIOS
$(document).on('ready',function (){
        
        $.getJSON('data-1.json', function(data) {

          var $selectCiudad  = $('#selectCiudad');
          var $selectTipo    = $('#selectTipo');
          var $selectCReporte= $('#ciudadReporte');
          var $selectTReporte= $('#tipoReporte');

             var dato = {};
			 var unicaCiudad = data.filter(function (e) { 
			    return dato[e.Ciudad] ? false : (dato[e.Ciudad] = true);
			 });

			 var unicoTipo = data.filter(function (e) { 
			    return dato[e.Tipo] ? false : (dato[e.Tipo] = true);
			 });

			  //console.log(unicaCiudad);
			  //console.log(unicoTipo);
			  var numCiudad = 1;
				for(let datos of unicaCiudad){
					$selectCiudad.append('<option value=' + numCiudad + '>' + datos.Ciudad + '</option>');
					numCiudad++;
				}
				var numTipo = 1;
				for(let datos of unicoTipo){
					$selectTipo.append('<option value=' + numTipo + '>' + datos.Tipo + '</option>');
					numTipo++;
				}

				var numCReporte = 1;
				for(let datos of unicaCiudad){
					$selectCReporte.append('<option value=' + numCReporte + '>' + datos.Ciudad + '</option>');
					numCReporte++;
				}

				var numTipoR = 1;
				for(let datos of unicoTipo){
					$selectTReporte.append('<option value=' + numTipoR + '>' + datos.Tipo + '</option>');
					numTipoR++;
				}
          });
        });


//METODO PARA MOSTRAR LA INFORMACION DE BUSQUEDA DEL ARCHIVO "traerDatos.php"

$(document).ready(function(){

    $("#formulario").submit(function(e){


        // No recargamos la página, *quitalo si no te interesa*
        e.preventDefault();
        $.ajax({
            type:'post',
            //El archivo que lo va a procesar
            url:'back/traerDatos.php',
            processData: false,
            contentType: false,
            // Inicializamos el form data con los valores de nuestro formulario
            data: new FormData($("#formulario")[0]),
            // Si hay respuesta la mostramos en el div.
            success:function(CallBack){
                $("#panelBusqueda").html(CallBack);
            }
        });
    });
  });
//METODO PARA MOSTRAR LOS INMUEBLES GUARDADOS DE LA TABLA "guardados" MEDIANTE EL ARCHIVO "traerGuadados.php"
function mostrarGuardados(){
       
        $.ajax({
                data:  1,
                url:   'back/traerGuardados.php',
                type:  'post',
                beforeSend: function () {
                        $("#guardado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#guardado").html(response);
                }
        });
}

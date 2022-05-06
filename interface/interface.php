<!DOCTYPE html>
<html>
	<head>
		<title>PlayPPT</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.6.96/css/materialdesignicons.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>
	<body>
		<div class="col-12" style="text-align: center">

			<h1>Process the file  <em>“result.txt”</em> </h1>
			
		</div>
		<div class="col-md-10 row offset-md-1" style="background-color: whitesmoke; padding-top: 20px">
			
			<div class="col-md-4 ">

				<h3>Leer archivo</h3>

				<div style="background-color: white; border-radius: 10px;  padding: 10px">
					<?php
						// Abriendo el archivo
						$file = fopen("result.txt", "r");
						 
						// Recorremos todas las lineas del archivo
						while(!feof($file)){
						    // Leyendo una linea
						    $obtener = fgets($file);
						    // Imprimiendo una linea
						    echo nl2br($obtener);
						}
						 
						// Cerrando el archivo
						fclose($file);
					?>
				</div>


			</div>
			<div class="col-md-4 ">

					<h3>Filas de datos a insertar</h3>
					<div style="background-color: white; border-radius: 10px; padding: 10px">
						<?php

						include 'conexion.php';

						// Abriendo el archivo
						$archivo = fopen("result.txt", "r");
						 
					    $vrf = '';

					    $export_map = '';	

					    $datas = [];

						// Recorremos todas las lineas del archivo
						while(!feof($archivo)){
						    // Leyendo una linea
						    $traer = fgets($archivo);


						    if (!(strpos($traer, 'ip vrf') === false)) {
						    	// Imprimiendo una linea
						    	$vrf = $traer;
						    	$vrf= str_replace("ip vrf ", "", $traer);
								echo $vrf;
								echo "<br>";

						    }

						    if (!(strpos($traer, 'route-target export') === false)) {
						    	// Imprimiendo una linea
						    	$export_map = $traer;
								$export_map= str_replace("route-target export ", "", $traer);
								echo $export_map;
								echo "<br>";

								// se consulta si el usuario ya existe en la bd

								$query = "SELECT * from interfacemap where vrf = '$vrf' and export_map = '$export_map'";

								$res = mysqli_query($mysql, $query);

								$data= mysqli_fetch_assoc($res);
								$count= mysqli_num_rows($res);

								// se valida si el dato esta registrado

								if ($count==0) {

									// si el dato no esta registraso se procede a hacer la inserción

							    	$query = "INSERT INTO interfacemap (vrf, export_map) values ('$vrf', '$export_map')";

							    	mysqli_query($mysql, $query);
								}else{
									// si esta registrado se arma el arreglo para imprimir el dato
									$datas[]=$data;
								}


						    }

						}

						 
						// Cerrando el archivo
						fclose($archivo);


						?>

						

					</div>

			</div>

			<div class="col-md-4">

				<h3>Show running-config</h3>
				<h5>Obtenido de la inserción de la Base de Datos</h5>

				<?php if (count($datas)>0){ ?>

				<table class="table table-sm table-hover">

					<thead>
						<th>vrf</th>
						<th>export map</th>
					</thead>

					<tbody>
						<!-- se imprimen los datos de la base de datos -->
						<?php foreach ($datas as $key => $value): ?>
							<tr>
								<td><?=$value['vrf']?></td>	
								<td><?=$value['export_map']?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
					
				</table>
					
				<?php }else{ ?>

					
					Dar clic aquí <button class="btn btn-primary btn-sm" onclick="window.location.reload();">CARGAR DATOS</button> para visualizar los datos almacenados.

				<?php } ?>

				
				
			</div>

			
			
		</div>


		
	</body>
</html>

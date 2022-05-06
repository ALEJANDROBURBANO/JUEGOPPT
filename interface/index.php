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
			
			<div class="col-md-4 offset-md-4">

				<b>Importante!</b> Antes de dar clic en el boton de "Procesar archivo" verifique los siguentes puntos para que pueda corroborar el correcto funcionamiento del codigo:
				<br><br>

				<ol>
					<li>Compruebe que la base de datos llamada <b>"CISCO"</b> este importada correctamente.</li>
					<li>Cambie los parametros de conección de la base de datos en el archivo "interface/parameters.php"</li>
					<li>Verifique que la tabla de <b>"interfacemap"</b> se encuentre sin datos.</li>
					<li>Una vez realizado el procesamiento de datos, ya puede volver a verificar la base de datis "Cisco" en la tabla "interfacemap", para que pueda comprobar el registro de datos exitoso.</li>
				</ol>

				<a href="interface.php"><button class="btn btn-success btn-block">PROCESAR ARCHIVO</button></a>

				<br><br>
				El archivo a procesar es el siguiente:
				<br><br>

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
					
		</div>
		
	</body>
</html>

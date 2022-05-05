<?php
include 'conexion.php';

//Validamos que hayan llegado estas variables, y que no esten vacias:
if (isset($_POST["name"]) and $_POST["name"]!="" ){

	//traspasamos a variables locales, para evitar complicaciones con las comillas:
	$name = $_POST["name"];

	//Preparamos la orden SQL
	$sql = "INSERT INTO user
	(name) VALUES ('$name')";

	//Aqui ejecutaremos esa orden
	mysqli_query($mysql, $sql);

	echo "Usuario guardado con exito, por favor seleccionelo de la lista de usuarios";

	} else {

		echo '<p>Por favor, complete el <a href="index.php">formulario</a></p>';
	}

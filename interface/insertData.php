<?php
include 'conexion.php';

//Validamos que hayan llegado estas variables, y que no esten vacias:
if (isset($_POST["name"]) and $_POST["name"]!="" ){

	//traspasamos a variables locales, para evitar complicaciones con las comillas:
	$vrf = $_POST["vrf"];
	$map = $_POST["map"];

	//Preparamos la orden SQL
	$sql = "interfacemap(vrf, export_map) VALUES ($vrf,$map)";

	//Aqui ejecutaremos esa orden
	mysqli_query($mysql, $sql);

	echo "Datos guardados con exito.";

	} else {

		echo '<p>Por favor, complete el <a href="index.php">formulario</a></p>';
	}

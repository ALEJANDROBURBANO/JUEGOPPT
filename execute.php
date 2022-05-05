<?php
include 'conexion.php';
if (isset($_POST['play'])) {
	$options = $_POST['opciones'];
	$status = 1;

	$pc = rand(1,3);

	
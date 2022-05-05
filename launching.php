<?php
include 'conexion.php';

if (isset($_POST["val"]) and $_POST["val"]!="" ){

	$value = $_POST["val"];
	$user_id=$_POST["id"];

	$val_mq = rand(1,3);

	$intentos = ['','PIEDRA','PAPEL','TIJERA'];

		
	date_default_timezone_set('America/Bogota');    
	$date = date('Y-m-d h:i', time()); 

	if ($value=='1' and $val_mq=='1') {
		$user = 0;
		$machine = 0;
	}else if ($value=='1' and $val_mq=='2') {
		$user = 0;
		$machine = 1;
	}else if ($value=='1' and $val_mq=='3') {
		$user = 1;
		$machine = 0;
	}else if ($value=='2' and $val_mq=='1') {
		$user = 1;
		$machine = 0;
	}else if ($value=='2' and $val_mq=='2') {
		$user = 0;
		$machine = 0;
	}else if ($value=='2' and $val_mq=='3') {
		$user = 0;
		$machine = 1;
	}else if ($value=='3' and $val_mq=='3') {
		$user = 0;
		$machine = 0;
	}
	else if ($value=='3' and $val_mq=='2') {
		$user = 1;
		$machine = 0;
	}else if ($value=='3' and $val_mq=='1') {
		$user = 0;
		$machine = 1;
	}

	if ($user==1) {
		$winner='USUARIO';
		?>
		<div class="alert alert-success " style="margin-top: 50px;" role="alert">
		  <b>Haz ganado!</b> Puede seguir intentandolo.
		  
		</div>
		<?php
	}
	if ($machine==1){
		$winner='MAQUINA';
		?>
		<div class="alert alert-danger " style="margin-top: 50px;" role="alert">
		  <b>Haz perdido!</b> intentalo nuevamente.
		</div>
		<?php
	}

	if ($machine==0 && $user==0){
		$winner='EMPATE';
		?>
		<div class="alert alert-info " style="margin-top: 50px;" role="alert">
		  <b>Han empatado!</b> vuelve a jugar.
		</div>
		<?php
	}


	?>

	<hr>
	  <b>Usuario: </b> <?=$intentos[$value]?>
	  <br>
	  <b>Maquina: </b> <?=$intentos[$val_mq]?>

	 <?php


	//Preparamos la orden SQL
	$sql = "INSERT INTO score
	(user, machine, date, winner, user_id) VALUES ('$value', '$val_mq', '$date', '$winner', '$user_id')";

	//Aqui ejecutaremos esa orden
	mysqli_query($mysql, $sql);

	?>

	<script type="text/javascript">
		getScores(<?=$user_id?>);
	</script>

	<?php



	} else {

		echo 'Por favor, seleccione una opción';
	}


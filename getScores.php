<?php
include 'conexion.php';

$id=$_POST["id"];
$intentos = ['','PIEDRA','PAPEL','TIJERA'];

// consulta de lanzamientos 

$datas = "SELECT * from score where user_id=".$id." order by date desc";


if ($res_d = mysqli_query($mysql, $datas)) {

    $data_scores = [];
    while ($row = mysqli_fetch_row($res_d)) {
    	$data_scores[]=$row;
    	
    }
 

}

?>
<table class="table table-sm">
	<thead>
		<th>USUARIO</th>
		<th>MAQUINA</th>
		<th>GANADOR</th>
		<th>FECHA Y HORA</th>
		
	</thead>
	<tbody>
		<?php
	    foreach ($data_scores as $key => $value) {
	    	?>
	    	<tr>
		    	<td><?=$intentos[$value[2]]?></td>
		    	<td><?=$intentos[$value[3]]?></td>
		    	<td><?=$value[4]?></td>
		    	<td><?=$value[1]?></td>
	    	</tr>
	    	<?php
	    }

	    ?>
	</tbody>
</table>
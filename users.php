<?php
include 'conexion.php';

// consulta de usuarios

$sql ="SELECT * FROM `user`";


if ($res = mysqli_query($mysql, $sql)) {

    $data = [];
    while ($row = mysqli_fetch_row($res)) {
    	$data[]=$row;
    	
    }
  
    ?>
    	<option disabled="" selected="">Seleccione un usuario</option>
    <?php
    foreach ($data as $key => $value) {
    	?>
    	<option value="<?=$value[0]?>"><?=$value[1]?></option>
    	<?php
    }

}
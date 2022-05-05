<?php
include 'conexion.php';

$id=$_POST["id"];

$sql ="SELECT * FROM `user` where id=".$id;

$res = mysqli_query($mysql, $sql);

$user = mysqli_fetch_assoc($res);


?>

<strong>Usuario: </strong> <?=$user['name']?>

<p>Seleccione una de las siguientes opciones para probar suerte.</p>
<button onclick="tirar(1)" class="btn btn-primary"><span class="mdi mdi-boxing-glove"> PIEDRA</span></button>
<button onclick="tirar(2)" class="btn btn-primary"><span class="mdi mdi-hand-back-right"> PAPEL</span></button>
<button onclick="tirar(3)" class="btn btn-primary"><span class="mdi mdi-hand-peace-variant"> TIJERA</span></button>


<div id="respuesta_lanzamiento"></div>

<hr>

<script type="text/javascript">
	function tirar(val) {
		var values = {
	                "val" : val,
	                "id": <?=$id?>
	        };

		$.ajax({
	        type: 'POST',
	        url: 'launching.php',
	        dataType: 'html',
	        data: values,
	        success: function (data) {
	            $('#respuesta_lanzamiento').html(data);
	        }
	    });
	}

	getScores(<?=$id?>);
</script>



<!-- <span class="mdi mdi-loading mdi-spin">Processing</span> -->

<?php
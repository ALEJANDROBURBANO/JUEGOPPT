<!DOCTYPE html>
<html>
	<head>
		<title>PlayPPT</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.6.96/css/materialdesignicons.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>
	<style type="text/css">
		body{
			background-color: whitesmoke;
		}
	</style>
	<body id="load">
		<div class="col-12" style="text-align: center; background-color: #49599a; padding: 20px; color: white" >
			<h2>PlayPPT</h2>
			<h5>Juego de piedra, papel o tijera</h5>
		</div>
		<div class="col-md-10 offset-md-1" style="background-color: white">

		

			<div style="padding: 20px" class="col-md-6 offset-md-6" >
				<div class="col-md-12">
					<div class="form-group">
						<label>USUARIOS</label>
						<select onchange="getDataUser(this.value)" class="form-control load" id="users">
							<option selected="" disabled="">Seleccione un usuario</option>
							<?php foreach ($param['users'] as $key => $value): ?>
								<option></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<br>

				<script>

				$(document).ready(function(){
					$('.load').click(function(){
				    $.ajax({
				        type: 'GET',
				        url: 'users.php',
				        dataType: 'html',
				        success: function (data) {
				            $('#users').html(data);
				        }
				    });
				});
				});

				function getDataUser(id){

					var values = {
				                "id" : id
				        };

					$.ajax({
				        type: 'POST',
				        url: 'dataUser.php',
				        dataType: 'html',
				        data: values,
				        success: function (data) {
				            $('#dataUser').html(data);
				        }
				    });

				}

				function getScores(id){

					var values = {
				                "id" : id
				        };

					$.ajax({
				        type: 'POST',
				        url: 'getScores.php',
				        dataType: 'html',
				        data: values,
				        success: function (data) {
				            $('#getScores').html(data);
				        }
				    });

				}

				function saveUser(name){
				        var parametros = {
				                "name" : name
				        };
				        $.ajax({
				                data:  parametros, //datos que se envian a traves de ajax
				                url:   'storage.php', //archivo que recibe la peticion
				                type:  'post', //método de envio
				                beforeSend: function () {
				                        $("#resultado").html("Procesando, espere por favor...");
				                },
				                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				                        $("#resultado").html(response); 
				                        setTimeout(function(){
				                        	 $("#resultado").html('');
				                        }, 3000);
				                        $('#name').val('');
				                }
				        });
				}
				</script>

				<div class="input-group">
		        	<div class="input-group-prepend">
		          		<input type="text" name="name" id="name" class="form-control">
		        	</div>
		        	<button class="btn btn-primary"  onclick="saveUser($('#name').val());return false;">CREAR USUARIO</button>
		      	</div>

		      	<p class="text-success" id="resultado"></p>

				<div id="dataUser">

				</div>

				<div id="getScores">
				</div>
				
			</div>

		</div>

	</body>
</html>
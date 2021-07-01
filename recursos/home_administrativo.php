<?php 
session_start();

    if(!isset($_SESSION['admin'])) 
    {
    	header('Location: http://localhost/Proyecto_final/index.php');
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bruno Rodriguez TP Final</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>
</head>
<body>

	
	<h1 id="tituloHome">Tienda Online </h1>

	<div>
		<span class= "textoBlanco negrita arial uppercase"> <?php echo 'Bienvenido Admin! Usted ha iniciado sesion con el mail: <br>' .  $_SESSION['admin']; ?> </span>
		<br>
		<button type="button" id="btnCerrarSesion">Cerrar Sesion Admin</button>
		<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnVerProductos">Administrar Productos</button><br>
		<button style="margin-left: 37%" class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnAdminDistribuidores">Administrar Distribuidores</button>
		<button class="backBlack espacioentreletras1 uppercase textoRojo" type="button" id="btnContacto">Mensajes Recibidos</button><br>

		<label style="margin-left: 43.2%" class= "textoBlanco" id = "textoFormulario_Datos">Mail Destino: </label>
		<input type="text" id="mail_destino"><br><br>

		<label style="margin-left: 43.2%" class= "textoBlanco" id = "textoFormulario_Datos">Asunto: </label>
		<input type="text" id="asunto"><br><br>

		<label style="margin-left: 43.2%" class= "textoBlanco" id = "textoFormulario_Datos">Mensaje: </label>
		<input type="text" id="mensaje"><br>

		
		<button style="margin-left: 43.2%" class="backBlack espacioentreletras1 uppercase textoRojo" type="button" id="btnEnviarMensaje">Enviar Mensaje</button>
	</div>

	<br>
	<hr>
	<div id="tabla">
		
	</div>
	<hr>
</body>
</html>

<script>
	
	$(document).ready(function(){

		$("#btnContacto").click(function(){
			$('#tabla').load('listar_mensajes_admin.php');	
		});

		$("#btnVerProductos").click(function(){
			location.href = "admin_productos.php";
		});

		$("#btnAdminDistribuidores").click(function(){
			location.href = "admin_distribuidores.php";
		});


		$('#btnEnviarMensaje').click(function(){
			let mail_destino = $('#mail_destino').val();
			let asunto = $('#asunto').val();
			let mensaje = $('#mensaje').val();

			$.post('saneamiento_datos.php',{accion:'contacto_admin',mail_destino:mail_destino,asunto:asunto,mensaje:mensaje},function(data){
				console.log(data);
					if(data == 'mensaje'){
						alert('Mensaje enviado correctamente')
						location.href = "home_administrativo.php";
					}
					else{
						if(data == 'inexistente'){
							alert('Mail inexistente');	
						}
						else{
							if(data == 'error'){
								alert('No se ha podido enviar el mensaje');	
							}
					}
					}
			
			});
			});

		$("#btnCerrarSesion").click(function(){
			location.href = "cerrarsesion.php";
		});



	});

</script>

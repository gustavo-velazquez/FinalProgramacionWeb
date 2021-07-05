<?php 
include "tiempo_sesion.php"; 
if(!isset($_SESSION['mail'])) 
{
	header('Location: http://localhost/Proyecto_final/index.php');
}
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contacto</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>

</head>
<body>
<hr>
<div id="formulariojquery">

	<label id="textoFormulario_Titulo">Contacto</label>

	<br><br>

	<label id = "textoFormulario_Datos">Asunto: </label>
	<input type="text" id="asunto">

	<br><br>

	<label id = "textoFormulario_Datos">Mensaje: </label>
	<input type="text" id="mensaje">

	<br><br>

	
	<label id = "textoFormulario_Datos">Texto del Captcha: </label>
	<input type="text" id="captchaTexto">
	<br><br>

	<img src="../captcha/captcha.php"/>



	<br><br>

	<button id="btn_log" type="submit" >Enviar</button>
	<button type="button" id="btnInicio">Inicio</button>
</div>
<hr>

<button class="backBlack espacioentreletras1 uppercase textoRojo" type="button" id="btnContacto">Mensajes Recibidos</button><br>

<div id="tabla" class= "negrita arial">
		
</div>

</body>
</html>

<script>
	
$(document).ready(function(){

		$("#btnInicio").click(function(){
			location.href = "home_cliente.php";
		});

		$("#btnContacto").click(function(){
			$('#tabla').load('listar_mensajes_cliente.php');	
		});


		$('#btn_log').click(function(){
			let asunto = $('#asunto').val();
			let mensaje = $('#mensaje').val();
			let captchaTexto = $('#captchaTexto').val();

			$.post('saneamiento_datos.php',{accion:'contacto_cliente',asunto:asunto,mensaje:mensaje,captchaTexto:captchaTexto},function(data){
				console.log(data);
				if(data == 'captcha'){	
					alert('Captcha Invalido');
				}
				else{
					if(data == 'mensaje'){
						alert('Mensaje enviado correctamente')
						location.href = "contacto.php";
					}
					else{
						if(data == 'error'){
							alert('No se ha podido enviar el Mensaje');	
						}
					}
				}
			
			});
			});
});



</script>
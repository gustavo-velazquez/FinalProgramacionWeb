<?php 
session_start();

    if(isset($_SESSION['admin'])) 
    {
    	header('Location: http://localhost/final_rodriguez/home_administrativo.php');
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion Admin</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="recursos\styles.css" media="screen"/>

</head>
<body>
<hr>
<div id="formulariojquery">

	<label id="textoFormulario_Titulo">Inicio de Sesion de Administrador:</label>

	<br><br>

	<label id = "textoFormulario_Datos">Mail: </label>
	<input type="text" id="mail">

	<br><br>

	<label id = "textoFormulario_Datos">Password: </label>
	<input type="password" id="contrasenia">

	<br><br>

	
	<label id = "textoFormulario_Datos">Texto del Captcha: </label>
	<input type="text" id="captchaTexto">
	<br><br>

	<img src="captcha.php"/>



	<br><br>

	<button id="btn_log" type="submit" >Enviar</button>
</div>
<hr>

</body>
</html>

<script>
	
$(document).ready(function(){


		$('#btn_log').click(function(){
			let mail = $('#mail').val();
			let contrasenia = $('#contrasenia').val();
			let captchaTexto = $('#captchaTexto').val();

			$.post('saneamiento_datos.php',{accion:'loginadmin',mail:mail,contrasenia:contrasenia,captchaTexto:captchaTexto},function(data){
				console.log(data);
				if(data == 'captcha'){	
					alert('Captcha Invalido');
				}
				else{
					if(data == 'error'){
						alert('Usuario o Contraseña Invalida');	
					}
					else{
						if(data == 'log'){
						location.href= 'home_administrativo.php';
						}
					}
				}
			
			});
			});
});



</script>
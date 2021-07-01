<?php 
session_start();

    if(isset($_SESSION['mail'])) 
    {

    	header('Location: http://localhost/Proyecto_final/index.php');

    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear usuario Cliente</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>

</head>
<body>
<hr>
<div id="formulariojquery">

	<label id="textoFormulario_Titulo">Crear usuario Cliente:</label>

	<br><br>

	<label id = "textoFormulario_Datos">Mail: </label>
	<input type="text" id="mail">

	<br><br>

	<label id = "textoFormulario_Datos">Nombre: </label>
	<input type="text" id="nombre">

	<br><br>

	<label id = "textoFormulario_Datos">Password: </label>
	<input type="password" id="password">

	<br><br>

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
			let nombre = $('#nombre').val();
			let password = $('#password').val();

			$.post('saneamiento_datos.php',{accion:'insertar',mail:mail,nombre:nombre,password:password},function(data){
				console.log(data);
				if(data == 'success'){	
					alert('Usuario creado correctamente');
					location.href= '../index.php';
				}
				else{
					if(data == 'usuario'){
						alert('Ese mail ya está registrado');	
					}
				}	
			
			});
			});
});



</script>
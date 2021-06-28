<?php 
session_start();

    if(isset($_SESSION['mail'])) 
    {
    	header('Location: http://localhost/final_rodriguez/home_cliente.php');
    }

    if(isset($_SESSION['admin'])) 
    {
    	header('Location: http://localhost/final_rodriguez/home_administrativo.php');
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bruno Rodriguez TP Final</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="recursos\styles.css" media="screen"/>
</head>
<body >

	
	<h1 id="tituloHome">Tienda Online</h1>

	<div>
		<button class="backYellow negrita" type="button" id="btnCrearUsuario">Crear Usuario Cliente</button>
		<button class="backGreen" type="button" id="btnSesionCliente">Iniciar Sesion Cliente</button>
		<button class="backGreen" type="button" id="btnSesionAdministrativo">Iniciar Sesion Administrativo</button>
	</div>

	<br>

</body>
</html>

<script>
	
	$(document).ready(function(){


		$("#btnCrearUsuario").click(function(){
			location.href = "crearusuario.php";
		});

		$("#btnSesionCliente").click(function(){
			location.href = "iniciosesioncliente.php";
		});

		$("#btnSesionAdministrativo").click(function(){
			location.href = "iniciosesionadministrativo.php";
		});


});

</script>



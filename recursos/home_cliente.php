<?php 
session_start();

    if(!isset($_SESSION['mail'])) 
    {
    	header('Location: http://localhost/final_rodriguez/index.php');
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bruno Rodriguez TP Final</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\footer.css" media="screen"/>

</head>
<body>

	
	<h1 id="tituloHome">Tienda Online </h1>

	<div>
		<span class= "textoBlanco negrita arial uppercase"> <?php echo 'Bienvenido Cliente! Usted ha iniciado sesion con el mail: <br>' .  $_SESSION['mail']; ?> </span>
		<br>
		<button type="button" id="btnCerrarSesion">Cerrar Sesion Cliente</button>
		<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnVerProductos">Ver Productos</button>
				<button class="backBlack espacioentreletras1 uppercase textoRojo" type="button" id="btnContacto">Contacto</button>
	</div>

	<br>

	
    <?php include 'footer.php'?>

</body>
</html>

<script>
	
	$(document).ready(function(){

		$("#btnVerProductos").click(function(){
			location.href = "productos.php";
		});

		$("#btnContacto").click(function(){
			location.href = "contacto.php";
		});

		$("#btnCerrarSesion").click(function(){
			location.href = "cerrarsesion.php";
		});



	});

</script>

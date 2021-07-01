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
	<title>Administrar Distribuidores</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>

</head>
<body >
<hr>

<button  style ="margin-left: 41%"class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnVerDistribuidor">Ver Distribuidores</button>
<hr>
<br>
<div id="tabla" class= "negrita arial"> 
		
</div>

<hr>
<br>
<div style ="margin-left: 40%" class= "textoBlanco negrita arial">
		Nombre Distribuidor: <input type="text"  id="nombre">
</div>
<button  style ="margin-left: 40%" class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnAgregarDistribuidor">Cargar Distribuidor</button>
<hr>
<br>
<div style ="margin-left: 40%" class= "textoBlanco negrita arial">
		ID del Distribuidor: <input type="number"  id="id_eliminar">
</div>
<button style ="margin-left: 38%" class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnEliminarDistribuidor">Eliminar un Distribuidor</button>
<button style ="background-color: green" type="button" id="btnInicio">Inicio</button>
</body>
</html>

<script type="text/javascript">
	
$(document).ready(function(){

		$("#btnVerDistribuidor").click(function(){
			$('#tabla').load('listar_distribuidores.php');	
		});

		
		$("#btnInicio").click(function(){
			location.href = "home_administrativo.php";
		});


		$('#btnAgregarDistribuidor').click(function(){
			let nombre = $('#nombre').val();

			$.post('saneamiento_datos.php',{accion:'cargar_distribuidor',nombre:nombre},function(data){
				console.log(data);
				if(data == 'success'){	
					alert('Distribuidor agregado correctamente');
				}
				else{
					if(data == 'error'){
						alert('El distribuidor no pudo agregarse');	
					}
				}
			
			});
			});

		$('#btnEliminarDistribuidor').click(function(){
			let id_eliminar = $('#id_eliminar').val();

			$.post('saneamiento_datos.php',{accion:'eliminar_distribuidor',id_eliminar:id_eliminar},function(data){
				console.log(data);
				if(data == 'success'){	
					alert('Distribuidor eliminado correctamente');
				}
				else{
					if(data == 'inexistente'){
						alert('El distribuidor no existe');	
					}
					else{
						alert('El distribuidor no pudo eliminarse');	
					}
				}
			
			});
			});


});




</script>
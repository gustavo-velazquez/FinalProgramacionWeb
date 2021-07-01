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
	<title>Administrar Productos</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>

</head>
<body>
<hr>

<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnVerProductos">Ver Productos</button>
<hr>
<br>
<div id="tabla" class= "negrita arial ">
		
</div>

<hr>
<br>
<div style ="margin-left: 16%" class= "textoBlanco negrita arial">
		Nombre Producto: <input type="text"  id="nombre">
		Id de Distribuidor: <input type="number" id="id_distribuidor">
		Precio: <input type="number" id="precio">
		Cantidad: <input type="number" id="cantidad">
</div>
<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnAgregarProductos">Cargar Producto</button>
<hr>
<br>
<div style ="margin-left: 40%" class= "textoBlanco negrita arial">
		ID del Producto: <input type="number"  id="id_eliminar">
</div>
<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnEliminarProducto">Eliminar un Producto</button>
<button style ="background-color: green" type="button" id="btnInicio">Inicio</button>
</body>
</html>

<script type="text/javascript">
	
$(document).ready(function(){

		$("#btnVerProductos").click(function(){
			$('#tabla').load('listar_productos.php');	
		});

		
		$("#btnInicio").click(function(){
			location.href = "home_administrativo.php";
		});


		$('#btnAgregarProductos').click(function(){
			let nombre = $('#nombre').val();
			let id_distribuidor = $('#id_distribuidor').val();
			let precio = $('#precio').val();
			let cantidad = $('#cantidad').val();

			$.post('saneamiento_datos.php',{accion:'cargar_producto',nombre:nombre,id_distribuidor:id_distribuidor,precio:precio,cantidad:cantidad},function(data){
				console.log(data);
				if(data == 'success'){	
					alert('Producto agregado correctamente');
				}
				else{
					if(data == 'error'){
						alert('El producto no pudo agregarse');	
					}
				}
			
			});
			});

		$('#btnEliminarProducto').click(function(){
			let id_eliminar = $('#id_eliminar').val();

			$.post('saneamiento_datos.php',{accion:'eliminar_producto',id_eliminar:id_eliminar},function(data){
				console.log(data);
				if(data == 'success'){	
					alert('Producto eliminado correctamente');
				}
				else{
					if(data == 'error'){
						alert('El producto no pudo eliminarse');	
					}
					else{
						if(data == 'inexistente'){
							alert('El producto no existe');	
						}
					}
				}
			
			});
			});


});




</script>
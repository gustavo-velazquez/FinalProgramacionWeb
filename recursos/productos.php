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
	<title>Lista de Productos</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<hr>

<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnVerProductos">Ver Productos</button>
<hr>
<br>
<div >

	<table class="table table-bordered table-dark" id="tabla">

	</table>

</div>
<hr>	
<br>
<div class="backWhite">
		ID del Producto: <input type="number"  id="id_producto">
		Cantidad: <input type="number"  id="cantidad">
		<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnComprarProducto">Comprar Producto</button>

</div>
<hr>
<br>
<button style ="background-color: green" type="button" id="btnInicio">Inicio</button>
</body>
</html>

<script>
	
$(document).ready(function(){

		$("#btnVerProductos").click(function(){
			$('#tabla').load('listar_productos.php');	
		});
		
		$("#btnInicio").click(function(){
			location.href = "home_cliente.php";
		});

		$('#btnComprarProducto').click(function(){
			let id_producto = $('#id_producto').val();
			let cantidad = $('#cantidad').val();

			$.post('saneamiento_datos.php',{accion:'comprar_producto',id_producto:id_producto,cantidad:cantidad},function(data){
				console.log(data);

				if(data == 'stock'){
					alert('Stock insuficiente para realizar la compra');
				}
				
				else{

					if(data == 'success'){	
					alert('Producto comprado correctamente');
					}

					else{

						if(data == 'inexistente'){
							alert('El producto no existe');	
						}

						else{
							alert('El producto no pudo comprarse');	
						}

					}
				}
				
					
			
			});
		});

});




</script>
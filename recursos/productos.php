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
	<title>Lista de Productos</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="recursos\styles.css" media="screen"/>

</head>
<body>
<hr>

<button class="backBlack espacioentreletras1 uppercase negrita textoRojo" type="button" id="btnVerProductos">Ver Productos</button>
<hr>
<br>
<div id="tabla">
		
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
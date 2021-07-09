<?php 
include "tiempo_sesion.php"; 
if(!isset($_SESSION['mail'])) 
{
	header('Location: http://localhost/Proyecto_final/index.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home TP Final</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\footer.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\menu.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\chat.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\productos.css" media="screen"/>
	<script src="https://kit.fontawesome.com/56d98c609c.js" crossorigin="anonymous"></script>
	
</head>
<body>

<a onclick="document.getElementById('ventana1').style.visibility='visible'" class="float " target="_blank">
<i class="far fa-comment-dots" aria-hidden="true"></i>
</a>

    <div class="ventana" id="ventana1">
        <button class="cerrar" onclick="document.getElementById('ventana1').style.visibility='hidden'">X</button>
        <h3>Contacto</h3>
		<div id="formulariojquery">
			
			<input type="text" id="asunto" placeholder="Asunto">
			<textarea name="mensaje" id="mensaje" placeholder="Escriba aqui su mensaje..."></textarea>
			<img src="../captcha/captcha.php"/>
			<input type="text" id="captchaTexto" placeholder="Captcha">
			
			<button id="btn_log" type="submit" >Enviar</button>
		</div>
    </div>


	<header>
        <div id="menu">
        
        <?php include 'menu.php'?>

            <div class="titulo">
			<h1 id="tituloHome">Tienda Online </h1>
            </div>
        </div>
    </header>

<!-- Mensajes recibidos -->

	<div class="ventana2" id="ventana2">
        <button class="cerrar" onclick="document.getElementById('ventana2').style.visibility='hidden'">X</button>
        <h3>Mensajes recibidos</h3>
		<div class="contenedormsj">
		<?php include "listar_mensajes_cliente.php"?>
			
		</div>
    </div>

	<div class="user">
		<a id="user" class="btnuser">
		<i class="far fa-user" ></i>
          <span class="usernombre"></span> <?php echo $_SESSION['mail']; ?>
        </a>
	
	</div>

	<br>
	<div class="container">
		<?php
			include('conexion.php');

			$query = "SELECT * FROM producto";
		
			$tabla = mysqli_query($conexion, $query);
		
		
			while ($aux = mysqli_fetch_array($tabla))
			{ 
				
				if(  $aux['vendido'] == 0 ) {?>
					<div class="card">
						<div class="i">
							<img src="data:image/jpg;base64, <?php echo base64_encode($aux['imagen']);?>">
						</div>
						<h4><?php echo $aux['nombre']; ?></h4>
						<h2><?php echo $aux['precio']; ?></h2>
						<button id="btnComprar" class="boton" data-id= "<?php echo $aux['id_producto']?>" type="button">Comprar</button>

					</div>
				<?php  } if ( $aux['vendido'] == 1) {?>
						<div class="card">
							<div class="i">
								<img style=" filter: grayscale(100%)" src="data:image/jpg;base64, <?php echo base64_encode($aux['imagen']);?>">
								
							</div>
							<h4><?php echo $aux['nombre']; ?></h4>
							<h2><?php echo $aux['precio']; ?></h2>
							<h1>Vendido</h1>
						</div>
		
				<?php }
		
			}?>

				

		

	</div>

	<?php include 'footer.php'?>

</body>
</html>

<script>

$(document).ready(function(){

	
	$('.boton').click(function(){
		let id_producto = $(this).data('id');
		//let cantidad = $('#cantidad').val();

		$.post('saneamiento_datos.php',{accion:'comprar_producto',id_producto:id_producto},function(data){
			console.log(data);

			if(data == 'login')
				alert('Debe iniciar sesion para comprar');
			
			else{

				if(data == 'success'){	
				alert('Producto comprado correctamente');
				location.href= '../index.php';
				}

				else
						alert('El producto no pudo comprarse');	
					

				
			}
			
				
		
		})
	})

////////////Enviar mensaje////////////////
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
						location.href = "home_cliente.php";
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
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
	<title>Bruno Rodriguez TP Final</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\styles.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\footer.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\menu.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\chat.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="..\css\productos.css" media="screen"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="contacto.php" class="float" target="_blank">
<i class="fa fa-commenting-o my-float" aria-hidden="true" "></i>
</a>


	<header>
        <div id="menu">
        
        <?php include 'menu.php'?>

            <div class="titulo">
			<h1 id="tituloHome">Tienda Online </h1>
            </div>
        </div>
    </header>

	<div class="user">
		<a href="#" id="user" disabled class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['mail']; ?>
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
});

</script>
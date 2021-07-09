<?php 
session_start();
    if(isset($_SESSION['mail'])) 
    {
    	header('Location: http://localhost/Proyecto_final/recursos/home_cliente.php');
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>TP Final</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="css/menu.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="css/footer.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="css/productos.css" media="screen"/>
	
</head>
<body >

	<header>
        <div id="menu">
        
        <nav>
            <div class="icono"><img src="img/logo.jpg" alt=""></div>
                <ul>
                    
                    <li><a href="recursos/iniciosesioncliente.php">Iniciar Sesion</a></li>
                    <li><a href="recursos/crearusuario.php">Registrarse</a></li>
                    <li><a href="index.php">Inicio</a></li>
                    
                </ul>
                
		</nav>
            
			
        </div>
		<div class="titulo">
				<h1 id="tituloHome">Tienda Online</h1>
        </div>
		
    </header>
    

	
	<div class="container">
		<?php
			include('recursos/conexion.php');

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
						<h2>$ <?php echo $aux['precio']; ?></h2>
						<button id="btnComprar" class="boton" data-id= "<?php echo $aux['id_producto']?>" type="button" >Comprar</button>

					</div>
			<?php  } if ( $aux['vendido'] == 1) {?>
						<div class="card">
							<div class="i">
								<img style=" filter: grayscale(100%)" src="data:image/jpg;base64, <?php echo base64_encode($aux['imagen']);?>">
								
							</div>
							<h4><?php echo $aux['nombre']; ?></h4>
							<h2>$ <?php echo $aux['precio']; ?></h2>
							<h1>Vendido</h1>
						</div>
	
			<?php }
		
			}?>

				

		

	</div>

	<footer>
       
       <div class="container-footer-all">
        
            <div class="container-body">
                <div class="colum1">
                    <h1>Mas informacion de la compañia</h1>

                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus optio dolore illo deserunt labore ad fugiat tempora odio et dolor! Ducimus pariatur perspiciatis aliquam? Doloremque provident similique neque nostrum eaque!.</p>
                </div>

                <div class="colum2">
                    <h1>Redes Sociales</h1>
                    <div class="row">
                        <img src="icon/facebook.png">
                        <label>Siguenos en Facebook</label>
                    </div>
                    <div class="row">
                        <img src="icon/twitter.png">
                        <label>Siguenos en Twitter</label>
                    </div>
                    <div class="row">
                        <img src="icon/instagram.png">
                        <label>Siguenos en Instagram</label>
                    </div>
                    <div class="row">
                        <img src="icon/google-plus.png">
                        <label>Siguenos en Google Plus</label>
                    </div>
                    <div class="row">
                        <img src="icon/pinterest.png"> 
                        <label>Siguenos en Pinteres</label>
                    </div>
                </div>

                <div class="colum3">
                    <h1>Informacion Contactos</h1>
                    <div class="row2">
                        <img src="icon/house.png">
                        <label>Avellaneda 235, Mar del Plata</label>
                    </div>
                    <div class="row2">
                        <img src="icon/smartphone.png">
                        <label>+54 - 223-4856789</label>
                    </div>

                    <div class="row2">
                        <img src="icon/contact.png">
                         <label>ArteMDP@gmail.com</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-footer">
               <div class="footer">
                    <div class="copyright">
                        © 2020 Todos los Derechos Reservados | <a href=""></a>
                    </div>

                    <div class="information">
                        <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y Condiciones</a>
                    </div>
                </div>

            </div>
        
    </footer>

</body>
</html>

<script>

$(document).ready(function(){

	
	$('.boton').click(function(){
		let id_producto = $(this).data('id');
		//let cantidad = $('#cantidad').val();
		console.log(id_producto);

		$.post('recursos/saneamiento_datos.php',{accion:'comprar_producto',id_producto:id_producto},function(data){
			console.log(data);

			if(data == 'login')
				alert('Debe iniciar sesion para comprar');
			
			else{

				if(data == 'success'){	
				alert('Producto comprado correctamente');
				location.href= 'index.php';
				}

				else
						alert('El producto no pudo comprarse');	
					

				
			}
			
				
		
		})
	})
});

</script>
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
	<link rel="stylesheet" type="text/css" href="..\css\login.css" media="screen"/>

</head>
<body>


<form action="" class="form">
        <ul>
            <li class="titulo">
                <h2>Registro</h2>
                <div class="img-log" ><img src="../img/logo.jpg" alt=""></div>
            </li>    
            <li>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nom" id="nombre" placeholder="Nombre"  required/>
                
            </li>
            <li>
                <label for="apellido">Apellido:</label>
                <input type="text" name="ape" id="apellido" placeholder="Apellido"  required/>
                
            </li>
            <li>
                <label for="telefono">Telefono:</label>
                <input type="number" name="tel" id="telefono" required/>
                
            </li>
            <li>
                <label for="mail">Email:</label>
                <input type="email" name="mail" id="mail" placeholder="Email@gmial.com"  required/>
                
            </li>
            <li>
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="password" placeholder="Password" requiered />
            </li>
            <li class="boton">
                <button class="btn" id="btn_log" type="button">Enviar</button>
            </li>


        </ul>
    </form>



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
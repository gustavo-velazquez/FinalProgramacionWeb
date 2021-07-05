<?php 
include "tiempo_sesion.php";
if(isset($_SESSION['mail'])) 
{
	header('Location: http://localhost/Proyecto_final/recursos/home_cliente.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion Cliente</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="..\css\login.css" media="screen"/>

</head>
<body>


<form action="" class="form">
        <ul>
            <li class="titulo">
                <h2>Log In</h2>
                <div class="img-log" ><img src="../img/logo.jpg" alt=""></div>
            </li>
            
            <li>
                <label for="email">Email:</label>
                <input type="email" name="mail" id="mail" placeholder="Email@gmail.com"  />
                
            </li>
            <li>
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="contrasenia" placeholder="Password"  />
            </li>
            <li>
                <img id="img_cap" src="../captcha/captcha.php" >
                <input type="text" name="captcha_txt" id="captchaTexto" required>
                
            </li>
            <li class="boton">
                <button class="btn" id="btn_log" type="button">Enviar</button>
            </li>

            <li >
                <p>¿No tienes una cuenta?<a href="crearusuario.php">Registrate</a></p>
            </li>

        </ul>
    </form>

</body>
</html>

<script>
	
$(document).ready(function(){


		$('#btn_log').click(function(){
			let mail = $('#mail').val();
			let contrasenia = $('#contrasenia').val();
			let captchaTexto = $('#captchaTexto').val();

			$.post('saneamiento_datos.php',{accion:'logincliente',mail:mail,contrasenia:contrasenia,captchaTexto:captchaTexto},function(data){
				console.log(data);
				if(data == 'captcha'){	
					alert('Captcha Invalido');
				}
				else{
					if(data == 'error'){
						alert('Usuario o Contraseña Invalida');	
					}
					else{
						if(data == 'log'){
						location.href= 'home_cliente.php';
						}
					}
				}
			
			});
			});
});



</script>
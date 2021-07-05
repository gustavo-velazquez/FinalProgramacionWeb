<?php 
session_start();

    if(isset($_SESSION['tiempo'])) 
    {
		
		//Tiempo en segundos para dar vida a la sesión.
		$inactivo = 1200;//20min en este caso.
		//Calculamos tiempo de vida inactivo.
		$vida_session = time() - $_SESSION['tiempo'];	
			//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
			if($vida_session > $inactivo)
			{
				//Removemos sesión.
				session_unset();
				//Destruimos sesión.
				session_destroy();              
				//Redirigimos pagina.
				header("Location: http://localhost/Proyecto_final/index.php");	
				exit();
			}
			
		
    }
    

?>
<?php 

	include('conexion.php');

	$query = "SELECT * FROM contacto WHERE mail_destino = 'admin@gmail.com'";

	$tabla = mysqli_query($conexion, $query);


	echo '<table class="table">
		 	<th> ID MENSAJE </th>
		 	<th> MAIL ORIGEN </th>
		 	<th> ASUNTO </th>
		 	<th> MENSAJE </th>';


	while ($aux = mysqli_fetch_array($tabla))
	{
		echo '<tr> 
			<td>'.$aux['id_contacto'].'</td>				 
			<td>'.$aux['mail_origen'].'</td>
			<td>'.$aux['asunto'].'</td>
			<td>'.$aux['mensaje'].'</td>	
		 </tr>';
	}


	echo "</table>";

 ?>
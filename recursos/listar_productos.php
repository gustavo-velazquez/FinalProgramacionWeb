<?php 

	include('conexion.php');

	$query = "SELECT * FROM producto";

	$tabla = mysqli_query($conexion, $query);


	echo '<table class="table">
		 	<th> ID_PRODUCTO </th>
		 	<th> NOMBRE </th>
		 	<th> PRECIO </th>
		 	<th> CANTIDAD </th>';


	while ($aux = mysqli_fetch_array($tabla))
	{
		echo '<tr> 
			<td>'.$aux['id_producto'].'</td>				 
			<td>'.$aux['nombre'].'</td>
			<td>'.$aux['precio'].'</td>	
			<td>'.$aux['cantidad'].'</td>	
		 </tr>';
	}


	echo "</table>";

 ?>
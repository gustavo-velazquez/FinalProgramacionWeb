<?php 

	include('conexion.php');

	$query = "SELECT * FROM producto";

	$tabla = mysqli_query($conexion, $query);


	echo '<tbody><tr>
		 	<th> ID_PRODUCTO </th>
		 	<th> NOMBRE </th>
		 	<th> PRECIO </th>
		 	<th> CANTIDAD </th>
			 </tr>';
			 


	while ($aux = mysqli_fetch_array($tabla))
	{
		echo '<tr> 
			<td>'.$aux['id_producto'].'</td>				 
			<td>'.$aux['nombre'].'</td>
			<td>'.$aux['precio'].'</td>	
			<td>'.$aux['cantidad'].'</td>
			<td><button class="btn btn-outline-success " data-id='.$aux['id_producto'].'>+</button></td>
		 </tr>';
	}

	echo '</tbody>';
 ?>
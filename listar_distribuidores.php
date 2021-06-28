<?php 

	include('conexion.php');

	$query = "SELECT * FROM distribuidor";

	$tabla = mysqli_query($conexion, $query);


	echo '<table class="table">
		 	<th> ID_DISTRIBUIDOR </th>
		 	<th> NOMBRE </th>';


	while ($aux = mysqli_fetch_array($tabla))
	{
		echo '<tr> 
			<td>'.$aux['id_distribuidor'].'</td>				 
			<td>'.$aux['nombre'].'</td>
		 	</tr>';
	}


	echo "</table>";

 ?>
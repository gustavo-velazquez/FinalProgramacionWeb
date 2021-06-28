<?php
include "config.php";
include "utils.php";


$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id_producto']))
    {
      //Mostrar un producto
      $sql = $dbConn->prepare("SELECT * FROM producto where id_producto=:id_producto");
      $sql->bindValue(':id_producto', $_GET['id_producto']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de producto
      $sql = $dbConn->prepare("SELECT * FROM producto");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
}

// Crear un nuevo producto
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO producto
          (nombre, creado_por, id_distribuidor, cantidad)
          VALUES
          (:nombre, :creado_por, :id_distribuidor, :cantidad)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id_producto'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id_producto'];
 

  $statement = $dbConn->prepare("DELETE FROM iproducto where id_producto=:id_producto");
  $statement->bindValue(':id_producto', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id_producto'];
    $fields = getParams($input);

    $sql = "
          UPDATE producto
          SET $fields
          WHERE id_producto='$postId'
           ";

    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>
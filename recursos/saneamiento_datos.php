<?php
  session_start();
  $accion = $_POST['accion'];

  include('conexion.php');

  switch ($accion) {


    case 'logincliente':

      $mail = $_POST['mail'];  
      $contrasenia = $_POST['contrasenia'];
      $captchaTexto = strip_tags(addslashes($_POST['captchaTexto']));
      $consulta = "SELECT contrasenia from cliente where mail = '".$mail."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);

      if($captchaTexto == $_SESSION['tmptxt']){
          if(isset($res['contrasenia']))
          {
              if(password_verify($contrasenia, $res['contrasenia'])) 
              {
                $_SESSION['mail'] = $mail;
                echo 'log';
              }
          }
          else{
             echo 'error';
          } 
      }

      else{
        echo 'captcha';
      } 

    break;      

    case 'loginadmin':

      $mail = $_POST['mail'];  
      $contrasenia = $_POST['contrasenia'];
      $captchaTexto = strip_tags(addslashes($_POST['captchaTexto']));
      $consulta = "SELECT contrasenia from admin where mail = '".$mail."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);

      if($captchaTexto == $_SESSION['tmptxt'])
      {   
        if(isset($res['contrasenia']))
          {
              if(password_verify($contrasenia, $res['contrasenia'])) 
              {
                $_SESSION['admin'] = $mail;
                echo 'log';
              }
          }
          else{
             echo 'error';
          } 

      }

      else{
        echo 'captcha';
      } 

    break;      


    case 'insertar':
      $mail = $_POST['mail'];
      $nombre = $_POST['nombre'];
      $password = strip_tags(addslashes($_POST['password']));
      $opciones = [
        'cost' => 12
      ];
      $passwordhash = password_hash($password, PASSWORD_DEFAULT, $opciones);
      $consulta = "SELECT mail from cliente where mail = '".$mail."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);
      if(!$res){
          $consulta = "INSERT INTO `cliente` (`mail`, `nombre`, `contrasenia`)
                    VALUES ('".$mail."', '".$nombre."', '".$passwordhash."')";
          $resultado = mysqli_query($conexion, $consulta);
          if ($resultado)
          {
            echo 'success';
          }
      }
      else{
            echo 'usuario';
      }

    break;


    case 'cargar_producto':
      $nombre = $_POST['nombre'];
      $id_distribuidor = $_POST['id_distribuidor'];
      $precio = $_POST['precio'];
      $cantidad = $_POST['cantidad'];
      $consulta = "SELECT id_admin from admin where mail = '".$_SESSION['admin']."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);
      $id = $res['id_admin'];
      
      $consulta = "INSERT INTO `producto` (`nombre`, `creado_por`, `id_distribuidor`, `precio`, `cantidad`)
                    VALUES ('".$nombre."', '".$id."', '".$id_distribuidor."', '".$precio."', '".$cantidad."')";
      $resultado = mysqli_query($conexion, $consulta);

      if ($resultado)
      {
        echo 'success';
      } 
      else {
        echo 'error';
      }

    break;

    case 'contacto_admin':
      $mail = $_SESSION['admin'];
      $mail_destino = $_POST['mail_destino'];
      $asunto = $_POST['asunto'];
      $mensaje = $_POST['mensaje'];
      $consulta = "SELECT id_cliente from cliente where mail = '".$mail_destino."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);
      if($res){
          $consulta = "INSERT INTO `contacto` (`mail_origen`,`mail_destino`, `asunto`, `mensaje`)
                        VALUES ('".$mail."', '".$mail_destino."','".$asunto."', '".$mensaje."')";
          $resultado = mysqli_query($conexion, $consulta);
              if ($resultado){
                echo 'mensaje';
              }
              else{
                echo 'error';
              }
      }
      else {
                echo 'inexistente';
      }

    break;

    case 'contacto_cliente':
      $mail = $_SESSION['mail'];
      $asunto = $_POST['asunto'];
      $mensaje = $_POST['mensaje'];
      $captchaTexto = strip_tags(addslashes($_POST['captchaTexto']));
      if($captchaTexto == $_SESSION['tmptxt']){
          $consulta = "INSERT INTO `contacto` (`mail_origen`,`mail_destino`, `asunto`, `mensaje`)
                    VALUES ('".$mail."', 'admin@gmail.com', '".$asunto."', '".$mensaje."')";
          $resultado = mysqli_query($conexion, $consulta);
          if ($resultado){
            echo 'mensaje';
          }
          else {
            echo 'error';
          }
      }
      else{
        echo 'captcha';
      }

    break;

    case 'eliminar_producto':
      $id_eliminar = $_POST['id_eliminar'];
      $consulta = "SELECT id_producto from producto where id_producto = '".$id_eliminar."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);
      if($res){
           $consulta = "DELETE FROM `producto` WHERE `id_producto` = '".$id_eliminar."' ";
           $resultado = mysqli_query($conexion, $consulta);
          if ($resultado){
            echo 'success';
          }
          else{
            echo 'error';
          }
      }
      else{
            echo 'inexistente';
      }
      break;


    case 'comprar_producto':
      $id_producto = $_POST['id_producto'];
      $cantidad = $_POST['cantidad'];

      $consulta = "SELECT cantidad from producto where id_producto = '".$id_producto."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);
      if($res){
          $stock = $res['cantidad'];
          $stock = $stock - $cantidad;

          if($stock < 0){
              echo 'stock';
          }

          else{
              $consulta = "UPDATE producto SET cantidad = '".$stock."' WHERE id_producto =  '".$id_producto."'";
              $resultado = mysqli_query($conexion,$consulta);

              $consulta = "SELECT id_cliente from cliente where mail = '".$_SESSION['mail']."' ";
              $resultado = mysqli_query($conexion,$consulta);
              $res = mysqli_fetch_array($resultado);
              $id_cliente = $res['id_cliente'];

              date_default_timezone_set("America/Argentina/Buenos_Aires");
              $fecha = date('y-m-d h:i:s'); 
              $consulta = "INSERT INTO `orden_compra` (`id_cliente`, `id_producto`, `cantidad`, `fecha`)
                            VALUES ('".$id_cliente."', '".$id_producto."', '".$cantidad."', '".$fecha."')";
              $resultado = mysqli_query($conexion, $consulta);

              echo 'success';
          }
      }

      else{
          echo 'inexistente';
      }
      

    break;


    case 'cargar_distribuidor':
      $nombre = $_POST['nombre'];
      $consulta = "INSERT INTO `distribuidor` (`nombre`)
                    VALUES ('".$nombre."')";
      $resultado = mysqli_query($conexion, $consulta);

      if ($resultado)
      {
        echo 'success';
      } 
      else {
        echo 'error';
      }

      break;

    case 'eliminar_distribuidor':
      $id_eliminar = $_POST['id_eliminar'];
      $consulta = "SELECT id_distribuidor from distribuidor where id_distribuidor = '".$id_eliminar."' ";
      $resultado = mysqli_query($conexion,$consulta);
      $res = mysqli_fetch_array($resultado);
      if($res){
           $consulta = "DELETE FROM `distribuidor` WHERE `id_distribuidor` = '".$id_eliminar."' ";
           $resultado = mysqli_query($conexion, $consulta);
          if ($resultado){
            echo 'success';
          }
          else{
            echo 'error';
          }
      }
      else{
            echo 'inexistente';
      }
      break;

}

?>

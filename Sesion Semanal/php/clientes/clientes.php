<?php
 header('Content-Type: application/json');
 require("../conexion.php");

 $conexion = retornarConexion();

 switch ($_GET['accion']) {
 case 'listar':
    $respuesta = mysqli_query($conexion, "select codigo, nombre, telefono, email,
    direccion from clientes");
 $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
 echo json_encode($resultado);
 break;
 case 'agregar':
      $respuesta = mysqli_query($conexion, "insert into
clientes(nombre,telefono,email,direccion) values
('$_POST[nombre]','$_POST[telefono]','$_POST[email]','$_POST[direccion]')");
 echo json_encode($respuesta);
 break;
 case 'recuperar':
       $respuesta = mysqli_query($conexion, "select codigo, nombre,telefono,email,direccion
      from clientes where codigo=$_POST[codigo]");
       $resultado = mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
 echo json_encode($resultado);
 break;
 case 'borrar':
 $respuesta = mysqli_query($conexion, "delete from clientes where
codigo=".$_POST['codigo']);
 echo json_encode($respuesta);
 break;
 case 'modificar':
 $respuesta = mysqli_query($conexion, "update clientes
                                                set nombre='$_POST[nombre]',
                                                telefono='$_POST[telefono]',
                                                email='$_POST[email]',
                                                direccion='$_POST[direccion]'
                                                where codigo=$_POST[codigo]");
echo json_encode($respuesta);
 break;
 }

 ?>
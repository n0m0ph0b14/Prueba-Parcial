<?php

 function retornarConexion() {
     $server="localhost";
     $usuario="root";
     $clave="";
     $base="mini24";
     $con=mysqli_connect($server,$usuario,$clave,$base) or die("problemas") ;
     mysqli_set_charset($con,'utf8');
     return $con;
 }

 ?>
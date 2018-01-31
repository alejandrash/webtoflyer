<?php
session_set_cookie_params(21600,"/");
	session_start();
    include("includes/conexion.php");
    $usuario=$_SESSION['ESTADO'];
/* ESTO VA SI ELIGE DESCARTAR EL FLYER EMPEZADO */
   // $result_esta=mysql_query("select * from rating_productos WHERE usuario='$usuario' and actual='si'");
   // if ($row_esta=mysql_fetch_array($result_esta))
   // {
   //     do {
   //         $id = $row_esta['Id'];
   //         $orden = $row_esta['nro_orden'];
   //         if ($orden == 0) {
   //             $delete_esta=mysql_query("DELETE FROM rating_productos WHERE Id = '$id'");
   //         }
   //         else {
   //             $result=mysql_query("UPDATE rating_productos set actual='no' WHERE usuario='$usuario'") or die(mysql_error());
   //         }
   //     } while ($row_esta=mysql_fetch_array($result_esta));
   // }
/* ESTO VA SI ELIGE DESCARTAR EL FLYER EMPEZADO */
	session_destroy();
	header("Location:index.php");
	die();
?>
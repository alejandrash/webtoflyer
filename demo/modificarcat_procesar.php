<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST['id'];
$nombre=$_POST['nombre'];

if ($nombre == "") {
    header("Location:carga-categorias.php");
}

else {  
    $result=mysql_query("UPDATE categorias SET nombre='$nombre' WHERE Id='$id'") or die(mysql_error());
   
    header("Location:carga-categorias.php?msg_ok=La categoria se ha modificado correctamente.");
}

//print_r($_POST);

?>
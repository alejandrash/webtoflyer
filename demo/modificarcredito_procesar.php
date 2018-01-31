<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST['id'];
$titulo=$_POST['titulo'];
$cuotas=$_POST['cantidad_cuotas'];
$tea = $_POST['tea'];
$cft = $_POST['cft'];
$coef = $_POST['coef'];
$fecha = date("Y-m-d H:i:s");

if ($nombre == "") {
    header("Location:credito-personal.php");
}

else { 
    
    $result=mysql_query("UPDATE credito_personal SET cuotas='$cuotas', titulo='$titulo', tea='$tea', cft='$cft', coef='$coef' WHERE Id='$id'") or die(mysql_error());
   
    header("Location:credito-personal.php?msg_ok=Elcrédito personal se ha modificado correctamente.");
}

//print_r($_POST);

?>
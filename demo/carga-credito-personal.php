<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$titulo=$_POST['titulo'];
$cuotas=$_POST['cantidad_cuotas'];
$tea = $_POST['tea'];
$cft = $_POST['cft'];
$coef = $_POST['coef'];
$fecha = date("Y-m-d H:i:s");
$usuario = $_SESSION['ESTADO'];

$result=mysql_query("INSERT INTO credito_personal (cuotas, titulo, tea, cft, coef, fecha, usuario) VALUES ('$cuotas', '$titulo', '$tea', '$cft', '$coef', '$fecha', '$usuario')") or die(mysql_error());

//print_r($_POST);
header("Location:credito-personal.php?msg_ok=El crédito personal se cargó correctamente.");
?>
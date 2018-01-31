<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$tarjeta=$_POST['tarjeta'];
$banco=$_POST['banco'];
$cuotas=$_POST['cantidad_cuotas'];
$tea = $_POST['tea'];
$cft = $_POST['cft'];
$coef = $_POST['coef'];
$legales = htmlspecialchars($_POST['legales']);
$legales = trim($legales);
$legales=str_replace("'","*",$legales);
$legales=str_replace('"',"&",$legales);
$fecha = date("Y-m-d H:i:s");

$result_esta=mysql_query("select * from datos_financiacion WHERE id_banco='$banco' and id_tarjeta='$tarjeta' and cuotas='$cuotas'");
$cantidad = mysql_num_rows($result_esta);
$row_esta=mysql_fetch_array($result_esta);
$id_row = $row_esta['Id'];

if ($cantidad == 0) {
    $result=mysql_query("INSERT INTO datos_financiacion (id_banco, id_tarjeta, cuotas, tea, cft, coef, fecha, legales) VALUES ('$banco', '$tarjeta', '$cuotas', '$tea', '$cft', '$coef', '$fecha', '$legales')") or die(mysql_error());
}
if ($cantidad > 0) {
    $result=mysql_query("UPDATE datos_financiacion SET id_banco='$banco', id_tarjeta='$tarjeta', cuotas='$cuotas', tea='$tea', cft='$cft', coef='$coef', fecha='$fecha', legales='$legales' WHERE Id='$id_row'") or die(mysql_error());
}
//print_r($_POST);
header("Location:actualizar-datos-financiacion.php?msg_ok=La información se actualizó correctamente.");
?>
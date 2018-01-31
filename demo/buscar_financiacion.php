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

$result_esta=mysql_query("select * from datos_financiacion WHERE id_banco='$banco' and id_tarjeta='$tarjeta' and cuotas='$cuotas'");
$cantidad = mysql_num_rows($result_esta);
if ($cantidad > 0) {
    $row_esta=mysql_fetch_array($result_esta);
    $tea = $row_esta['tea'];
    $cft = $row_esta['cft'];
    $coef = $row_esta['coef'];
    $legales = $row_esta['legales'];
}
else {
    $tea = '0,00';
    $cft = '0,00';
    $coef = '0';
    $legales = '';
}

echo($tea."+".$cft."+".$coef."+".$legales);
//print_r($_POST);
?>
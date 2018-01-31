<?php
session_set_cookie_params(21600,"/"); 
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$tarjeta=$_POST['tarjeta'];
$banco=$_POST['banco'];

$result_bancos=mysql_query("select * from datos_financiacion WHERE id_tarjeta='$tarjeta' AND id_banco='$banco' order by cuotas ASC");
$cantcuotas = '<option value="">Seleccion&aacute; la cantidad de Cuotas</option>';
if ($row_bancos=mysql_fetch_array($result_bancos)) {
   do {
       $cuotas = $row_bancos['cuotas'];
       $cantcuotas = $cantcuotas .'<option value="'.$cuotas.'">'.$cuotas.'</option>';
    } while ($row_bancos=mysql_fetch_array($result_bancos));
}
else {
    $cantcuotas = '<li>No hay información cargada para la tarjeta y banco seleccionados.</li>';
}

echo($cantcuotas);
//print_r($_POST);
?>
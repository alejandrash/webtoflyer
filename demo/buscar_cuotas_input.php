<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$tarjeta=$_POST['tarjeta'];
$banco=$_POST['banco'];

$result_bancos=mysql_query("select * from datos_financiacion WHERE id_tarjeta='$tarjeta' AND id_banco='$banco' ");
$cantcuotas = '';
if ($row_bancos=mysql_fetch_array($result_bancos)) {
   do {
       $cuotas = $row_bancos['cuotas'];
       $cft = $row_bancos['cft'];
       if ($cft!='0,00') {
       		$cantcuotas = $cantcuotas .'<li><label style="color:#000;"><input type="radio" name="opcion-cuotas" value="'.$cuotas.'"><span>'.$cuotas.' cuotas <br>fijas de</span></label></li>';
   	   }
   	   else {
   	   		$cantcuotas = $cantcuotas .'<li><label style="color:#000;"><input type="radio" name="opcion-cuotas" value="'.$cuotas.'"><span>'.$cuotas.' cuotas sin <br>interes de</span></label></li>';
   	   }
    } while ($row_bancos=mysql_fetch_array($result_bancos));
}
else {
    $cantcuotas = '<li>No hay información cargada para la tarjeta y banco seleccionados.</li>';
}

echo($cantcuotas);
//print_r($_POST);
?>
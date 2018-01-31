<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$tarjeta=$_POST['tarjeta'];

$result_bancos=mysql_query("select * from datos_financiacion INNER JOIN bancos ON datos_financiacion.id_banco = bancos.Id WHERE id_tarjeta='$tarjeta' GROUP BY nombre ");
$listabancos = '';
if ($row_bancos=mysql_fetch_array($result_bancos)) {
   do {
       $id_banco = $row_bancos['Id'];
       $logo = $row_bancos['logo'];
       $nombre = $row_bancos['nombre'];
       $listabancos = $listabancos .'<li><label><input type="radio" name="opcion-bancos" value="'.$id_banco.'"><img src="images/'.$logo.'" alt="'.$nombre.'"><span>'.$row_bancos['nombre'].'</span></label></li>';
    } while ($row_bancos=mysql_fetch_array($result_bancos));
}
else {
    $listabancos = '<li>No hay información cargada para la tarjeta seleccionada.</li>';
}

echo($listabancos);
//print_r($_POST);
?>
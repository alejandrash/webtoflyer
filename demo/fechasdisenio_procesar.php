<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$fecha_inicio = $_POST['dpd1'];
$fecha_fin = $_POST['dpd2'];
$mes_actual = date("m");
$mes_avisos = strftime("%B", mktime(0, 0, 0, date("m")+1,date("d"),date("Y"))); 
switch ($mes_avisos) {
                case "January":
                    $mes_avisos='01';
                    break;
                case "February":
                    $mes_avisos='02';
                    break;
                case "March":
                    $mes_avisos='03';
                    break;
                case "April":
                    $mes_avisos='04';
                    break;
                case "May":
                    $mes_avisos='05';
                    break;
                case "June":
                    $mes_avisos='06';
                    break;
                case "July":
                    $mes_avisos='07';
                    break;
                case "August":
                    $mes_avisos='08';
                    break;
                case "September":
                    $mes_avisos='09';
                    break;
                case "October":
                    $mes_avisos='10';
                    break;
                case "November":
                    $mes_avisos='11';
                    break;
                case "December":
                    $mes_avisos='12';
                    break;
}

$result=mysql_query("UPDATE precios SET fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin'") or die(mysql_error());
$result_borrar_flyers=mysql_query("DELETE from flyers WHERE terminado='no' AND month(fecha)!='$mes_actual'")  or die(mysql_error());
$result_borrar_predisenio=mysql_query("DELETE from predisenio WHERE month(fecha)!='$mes_actual'")  or die(mysql_error());
$result_borrar_bloqueo=mysql_query("DELETE from bloqueo WHERE month(fecha)!='$mes_actual'")  or die(mysql_error());
$result_borrar_avisos=mysql_query("DELETE from banners_flyer WHERE mes!='$mes_avisos'")  or die(mysql_error());
header("Location:carga-precios.php?msg_ok=Las fechas se modificaron correctamente.");


?>
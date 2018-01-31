<?php 
session_set_cookie_params(21600,"/");
session_start(); 
include("includes/conexion.php");

if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

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

$formato=$_POST['formato'];
if ($formato == "") {
    header("Location:aviso-prediseniar.php?msg_error=No seleccionó ningún formato.");
}
else {
    $guarda_formato=mysql_query("UPDATE precios set actual = '0'");

    $guarda_formato2=mysql_query("UPDATE precios set actual = 'si' WHERE tipo='$formato'");

	$result_borrar_flyers=mysql_query("DELETE from flyers WHERE terminado='no' AND month(fecha)!='$mes_actual'")  or die(mysql_error());

	$result_borrar_predisenio=mysql_query("DELETE from predisenio")  or die(mysql_error());

	$result_borrar_bloqueo=mysql_query("DELETE from bloqueo")  or die(mysql_error());

	$result_borrar_avisos=mysql_query("DELETE from banners_flyer")  or die(mysql_error());

    header("Location:aviso-prediseniar.php?msg_ok=El formato se guardó correctamente.");
}

?>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$final = 0;
$cantidad=$_POST['cantidad'];
$letras=$_POST['letras'];
$precio=$_POST['precio'];
$precio_fuera=$_POST['precio_fuera'];
$final= $cantidad * $precio;
$final_fuera= $cantidad * $precio_fuera;

$result_pr=mysql_query("select * from precios LIMIT 1");
if ($row_pr=mysql_fetch_array($result_pr)) {
    $fecha_inicio = $row_pr['fecha_inicio'];
    $fecha_fin = $row_pr['fecha_fin'];
}
else {
    $fecha_inicio = '0000-00-00';
    $fecha_fin = '0000-00-00';
}

if ($cantidad == "") {
    header("Location:carga-precios.php");
}

$result=mysql_query("INSERT INTO precios (cant_dipticos, costo_unitario, costo_fuera, costo_final, costo_final_fuera, letras, fecha_inicio, fecha_fin) VALUES ('$cantidad', '$precio', '$precio_fuera', '$final', '$final_fuera', '$letras', '$fecha_inicio', '$fecha_fin')") or die(mysql_error());
header("Location:carga-precios.php?msg_ok=El precio se ha agregado correctamente.");


?>
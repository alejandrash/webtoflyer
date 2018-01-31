<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");

$delete_precio=mysql_query("DELETE FROM tabla_precios");

// VOLANTE
$cant_volantes = $_POST["cant_volantes"];
for ($i = 1; $i <= $cant_volantes; $i++) {
    $precio=$_POST["preciouni_2_$i"];
    $precio = str_replace("$","",$precio);
    $precio = str_replace(",",".",$precio);
    $cant=$_POST["cantidad_2_$i"];
    if ($cant!=0){
    	$result_precio=mysql_query("INSERT INTO tabla_precios (costo_unitario, cantidad, tipo) VALUES ('$precio', '$cant', '2')") or die(mysql_error());
	}
}

// REVISTA 8
$cant_revista8 = $_POST["cant_revista8"];
for ($i = 1; $i <= $cant_revista8; $i++) {
    $precio=$_POST["preciouni_8_$i"];
    $precio = str_replace("$","",$precio);
    $precio = str_replace(",",".",$precio);
    $cant=$_POST["cantidad_8_$i"];
    if ($cant!=0){
    	$result_precio=mysql_query("INSERT INTO tabla_precios (costo_unitario, cantidad, tipo) VALUES ('$precio', '$cant', '8')") or die(mysql_error());
	}
}

// REVISTA 16
$cant_revista16 = $_POST["cant_revista16"];
for ($i = 1; $i <= $cant_revista16; $i++) {
    $precio=$_POST["preciouni_16_$i"];
    $precio = str_replace("$","",$precio);
    $precio = str_replace(",",".",$precio);
    $cant=$_POST["cantidad_16_$i"];
    if ($cant!=0){
    	$result_precio=mysql_query("INSERT INTO tabla_precios (costo_unitario, cantidad, tipo) VALUES ('$precio', '$cant', '16')") or die(mysql_error());
	}
}


header("Location:tabla-precios.php?msg_ok=Los precios se actualizaron correctamente.");
//print_r($_POST);

?>
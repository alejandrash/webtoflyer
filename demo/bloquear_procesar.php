<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$result_delete=mysql_query("delete from bloqueo");

// PAGINA 2
$cant_pag2 = $_POST["cant_pag2"];
for ($i = 1; $i <= $cant_pag2; $i++) {
    $marca=$_POST["marca2_$i"];
    $cant=$_POST["cantidad2_$i"];
    if ($cant!=0){
    	$result_bloq=mysql_query("INSERT INTO bloqueo (cara, marca, cantidad) VALUES ('pag2', '$marca', '$cant')") or die(mysql_error());
	}
}

// PAGINA 3
$cant_pag3 = $_POST["cant_pag3"];
for ($i = 1; $i <= $cant_pag3; $i++) {
    $marca=$_POST["marca3_$i"];
    $cant=$_POST["cantidad3_$i"];
    if ($cant!=0){
    	$result_bloq=mysql_query("INSERT INTO bloqueo (cara, marca, cantidad) VALUES ('pag3', '$marca', '$cant')") or die(mysql_error());
	}
}

// PAGINA 4
$cant_pag4 = $_POST["cant_pag4"];
for ($i = 1; $i <= $cant_pag4; $i++) {
    $marca=$_POST["marca4_$i"];
    $cant=$_POST["cantidad4_$i"];
    if ($cant!=0){
   		 $result_bloq=mysql_query("INSERT INTO bloqueo (cara, marca, cantidad) VALUES ('pag4', '$marca', '$cant')") or die(mysql_error());
	}
}

// PAGINA 5
$cant_pag5 = $_POST["cant_pag5"];
for ($i = 1; $i <= $cant_pag5; $i++) {
    $marca=$_POST["marca5_$i"];
    $cant=$_POST["cantidad5_$i"];
    if ($cant!=0){
    	$result_bloq=mysql_query("INSERT INTO bloqueo (cara, marca, cantidad) VALUES ('pag5', '$marca', '$cant')") or die(mysql_error());
	}
}

// PAGINA 6
$cant_pag6 = $_POST["cant_pag6"];
for ($i = 1; $i <= $cant_pag6; $i++) {
    $marca=$_POST["marca6_$i"];
    $cant=$_POST["cantidad6_$i"];
    if ($cant!=0){
    	$result_bloq=mysql_query("INSERT INTO bloqueo (cara, marca, cantidad) VALUES ('pag6', '$marca', '$cant')") or die(mysql_error());
	}
}

// PAGINA 7
$cant_pag7 = $_POST["cant_pag7"];
for ($i = 1; $i <= $cant_pag7; $i++) {
    $marca=$_POST["marca7_$i"];
    $cant=$_POST["cantidad7_$i"];
    if ($cant!=0){
    	$result_bloq=mysql_query("INSERT INTO bloqueo (cara, marca, cantidad) VALUES ('pag7', '$marca', '$cant')") or die(mysql_error());
	}
}

// CONTRATAPA
$cant_pag8 = $_POST["cant_pag8"];
for ($i = 1; $i <= $cant_pag8; $i++) {
    $marca=$_POST["marca8_$i"];
    $cant=$_POST["cantidad8_$i"];
    if ($cant!=0){
    	$result_bloq=mysql_query("INSERT INTO bloqueo (cara, marca, cantidad) VALUES ('contratapa', '$marca', '$cant')") or die(mysql_error());
	}
}

header("Location:bloquear.php?msg_ok=Las marcas se bloquearon correctamente.");

//print_r($_POST);

?>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$filename=$_POST['filenam'];
$fileori=$_POST['fileori'];
$select_rs=$_POST['select_rs'];
$filename2=$_POST['filenam2'];
$fileori2=$_POST['fileori2'];
$legales=$_POST['legales'];

if ($legales == "") {
    $legales = 0;
}

if ($nombre == "") {
    header("Location:promos-pie.php");
}

if ($filename != '') {
    $ruta="flyer/promos_pie/";//ruta carpeta donde queremos copiar las imágenes
    rename("flyer/promos_pie/".$fileori, "flyer/promos_pie/".$filename);
    $filename=$ruta.$filename;
    $imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $result=mysql_query("INSERT INTO promos_pie (foto, visible, legales) VALUES ('$imagen', '$select_rs', '$legales')") or die(mysql_error());
}

if ($filename2 != '') {
    $ruta="flyer/promos_pag6/";//ruta carpeta donde queremos copiar las imágenes
    rename("flyer/promos_pag6/".$fileori2, "flyer/promos_pag6/".$filename2);
    $filename2=$ruta.$filename2;
    $imagen = explode("/", $filename2, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $result=mysql_query("INSERT INTO promos_pag6 (foto, visible, legales) VALUES ('$imagen', '$select_rs', '$legales')") or die(mysql_error());
}

header("Location:promos-pie.php?msg_ok=La/s promo/s se ha/n agregado correctamente.");
//print_r($_POST);

?>
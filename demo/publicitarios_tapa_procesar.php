<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$ruta="flyer/banners/";//ruta carpeta donde queremos copiar las imágenes

$pagina='tapa';
$posicion=$_POST['posicion'];
$plantilla=$_POST['in-plantilla'];

$datecab = date('Y-m', strtotime('+1 month')); 
$datecab = explode("-", $datecab);
$mes = $datecab[1];


if ((isset($_POST['filenam'])) && ($_POST['filenam'] !='')) {
	$filename=$_POST['filenam'];
	$fileori=$_POST['fileori'];
	rename("flyer/banners/".$fileori, "flyer/banners/".$filename);
	$filename=$ruta.$filename;
	$imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $posicion = 1;

    $delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='1'");
    $result=mysql_query("INSERT INTO banners_flyer (cara, url, valor, posicion, visibles, mes, plantilla, id_plantilla) VALUES ('$pagina', '$imagen', '25', '1', 'si', '$mes', '$plantilla', '0')") or die(mysql_error());
}
else {
	$delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='1'");
}

if ((isset($_POST['filenam2'])) && ($_POST['filenam2'] !='')) {
	$filename2=$_POST['filenam2'];
	$fileori2=$_POST['fileori2'];
	rename("flyer/banners/".$fileori2, "flyer/banners/".$filename2);
	$filename2=$ruta.$filename2;
	$imagen = explode("/", $filename2, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $posicion = 2;
    $delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='2'");
    $result=mysql_query("INSERT INTO banners_flyer (cara, url, valor, posicion, visibles, mes, plantilla, id_plantilla) VALUES ('$pagina', '$imagen', '25', '2', 'si', '$mes', '$plantilla', '0')") or die(mysql_error());
}
else {
	$delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='2'");
}

if ((isset($_POST['filenam3'])) && ($_POST['filenam3'] !='')) {
	$filename3=$_POST['filenam3'];
	$fileori3=$_POST['fileori3'];
	rename("flyer/banners/".$fileori3, "flyer/banners/".$filename3);
	$filename3=$ruta.$filename3;
	$imagen = explode("/", $filename3, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $posicion = 3;
    $delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='3'");
    $result=mysql_query("INSERT INTO banners_flyer (cara, url, valor, posicion, visibles, mes, plantilla, id_plantilla) VALUES ('$pagina', '$imagen', '25', '3', 'si', '$mes', '$plantilla', '0')") or die(mysql_error());
}
else {
	$delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='3'");
}

if ((isset($_POST['filenam4'])) && ($_POST['filenam4'] !='')) {
	$filename4=$_POST['filenam4'];
	$fileori4=$_POST['fileori4'];
	rename("flyer/banners/".$fileori4, "flyer/banners/".$filename4);
	$filename4=$ruta.$filename4;
	$imagen = explode("/", $filename4, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $posicion = 4;
    $delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='4'");
    $result=mysql_query("INSERT INTO banners_flyer (cara, url, valor, posicion, visibles, mes, plantilla, id_plantilla) VALUES ('$pagina', '$imagen', '25', '4', 'si', '$mes', '$plantilla', '0')") or die(mysql_error());
}
else {
	$delete_nova=mysql_query("DELETE FROM banners_flyer WHERE cara='$pagina' and posicion='4'");
}

    header("Location:publicitarios.php?msg_ok=Los avisos se agregaron correctamente.");
//}


print_r($_POST);

?>
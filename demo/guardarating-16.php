<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id_producto = $_POST['id_quitar'];
$count = count($_POST['id_quitar']);

$limite=$_POST['limite'];
$cara=$_POST['cara'];
$id_sesion=$_POST['id_sesion'];
$txt_legales=$_POST['txt_legales'];
$usuario = $_SESSION['ESTADO'];
$fecha = date("Y-m-d H:i:s");

$result_usu=mysql_query("select * from usuarios WHERE email='$usuario'");
$row_usu=mysql_fetch_array($result_usu);
$id_usuario = $row_usu['Id'];
$categoria = $row_usu['categoria'];
//if (($categoria!='superusuario')||($usuario='alehusson@yahoo.com.ar')) {

	$result_prov=mysql_query("select * from sucursales WHERE id_usuario='$id_usuario'");
	$row_prov=mysql_fetch_array($result_prov);
	$provincia = $row_prov['provincia'];

	for ($i = 0; $i < $count; $i++) {
	        $result_marca=mysql_query("select * from productos WHERE Id='$id_producto[$i]'");
	        $row_marca=mysql_fetch_array($result_marca);
	        $id_marca = $row_marca['id_marca'];
	        $id_cat = $row_marca['id_cat'];  
	    
	        $result=mysql_query("INSERT INTO rating_productos (id_producto, id_marca, id_cat, provincia, usuario, fecha, cara, tipo, id_sesion, legales) VALUES ('$id_producto[$i]', '$id_marca', '$id_cat', '$provincia', '$usuario', '$fecha', '$cara', '16', '$id_sesion', '$txt_legales[$i]')") or die(mysql_error());
	}
//}
?>
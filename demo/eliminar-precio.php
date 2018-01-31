<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
$id_dato=$_POST['id_dato'];

if ($id_dato!='') {
	$delete_precio=mysql_query("DELETE FROM tabla_precios WHERE Id='$id_dato'");
}

?>
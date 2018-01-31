<?php 
$dbserver = "160.153.153.144";
$dbname = "demo_flyer";
$dbuser = "marquez_flyer";
$dbpassword = "marquez20";

$link = mysql_connect("$dbserver", $dbuser, $dbpassword) or die ("<p class='error'>No se puede conectar con la base de datos\n</p>\n");
mysql_select_db($dbname,$link);
mysql_query("SET NAMES 'UTF8'");
session_start(); 
$guarda_formato=mysql_query("UPDATE precios set actual = '0'");
$eliminar_predi=mysql_query("DELETE from predisenio");
$eliminar_avisos=mysql_query("DELETE from banners_flyer");
$eliminar_bloqueo=mysql_query("DELETE from bloqueo");
?>
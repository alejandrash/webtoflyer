<?php 
include("includes/config.php");
$link = mysql_connect("$dbserver", $dbuser, $dbpassword) or die ("<p class='error'>No se puede conectar con la base de datos\n</p>\n");
mysql_select_db($dbname,$link);
mysql_query("SET NAMES 'UTF8'");
// ONLINEEEE IDG mysql_query("SET NAMES 'UTF8'");
?>
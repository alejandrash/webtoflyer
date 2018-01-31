<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$numAviso=$_POST['numAviso'];

$result_avisos=mysql_query("DELETE from banners_flyer WHERE cara='tapa' AND posicion='$numAviso'");

print_r($_POST);
?>
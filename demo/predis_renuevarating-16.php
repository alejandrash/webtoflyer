<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$cara=$_POST['cara'];
$usuario = $_SESSION['ESTADO'];

$delete_rating=mysql_query("DELETE FROM rating_productos WHERE cara='$cara' and actual='si' and predisenio='si'");
?>
<?php
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
$id_suc = $_POST['id_suc'];
 
$jsonsuc = array();

$select_suc=mysql_query("select * from sucursales WHERE Id='$id_suc'");

if ($row_suc=mysql_fetch_array($select_suc)) {
        $jsonsuc['direccion_suc'] = $row_suc['direccion'];
        $jsonsuc['provincia_suc'] = $row_suc['provincia'];
        $jsonsuc['telefono_suc'] = $row_suc['telefono'];
}
    echo json_encode($jsonsuc);
?>
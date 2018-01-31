<?php 
session_set_cookie_params(21600,"/");
session_start(); 
include("includes/conexion.php");

if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST["id_pub"];
//print_r($_POST);
if ($id == "") {
    header("Location:carga-precios.php?msg_error=No seleccionó ningú precio.");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $id=$_POST["id_pub"];
        $count = count($id);
        for ($i = 0; $i < $count; $i++) {
                $delete_prod=mysql_query("DELETE FROM precios WHERE Id = '$id[$i]'");
                header("Location:carga-precios.php?msg_ok=Lo/s precio/s se eliminaron correctamente.");
        }
    }
}

?>
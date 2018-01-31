<?php 
session_set_cookie_params(21600,"/");
session_start(); 
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST["id_pub"];

if ($id == "") {
    header("Location:promos-pie.php?msg_error=No seleccionó ninguna promo.");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $id=$_POST["id_pub"];
        $count = count($id);
        for ($i = 0; $i < $count; $i++) {

                $result_sel=mysql_query("select * from promos_pie WHERE Id = '$id[$i]'");
				$row_sel=mysql_fetch_array($result_sel);
				$ruta = $row_sel["foto"];
                $delete_prod=mysql_query("DELETE FROM promos_pie WHERE Id = '$id[$i]'");
                $directorio = 'flyer/';
				unlink($directorio.$ruta);
                
        }
    }
    header("Location:promos-pie.php?msg_ok=La/s promo/s pie se eliminaron correctamente.");
}

?>
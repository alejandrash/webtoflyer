<?php 
session_set_cookie_params(21600,"/");
session_start(); 
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST["id_pub"];
print_r($_POST);
if ($id == "") {
    header("Location:carga-marcas.php?msg_error=No seleccionó ninguna marca.");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $id=$_POST["id_pub"];
        $count = count($id);
        for ($i = 0; $i < $count; $i++) {
            $select_prod=mysql_query("select * from productos WHERE id_marca='$id[$i]'");
            if ($row_prod=mysql_fetch_array($select_prod)) {
                header("Location:carga-marcas.php?msg_error=Las marcas que intenta eliminar tienen productos asociados. Debe modificar los productos y luego eliminar las marcas.");
            }
            else {
                $result_sel=mysql_query("select * from marcas WHERE Id = '$id[$i]'");
				$row_sel=mysql_fetch_array($result_sel);
				$ruta = $row_sel["logo"];
                $delete_prod=mysql_query("DELETE FROM marcas WHERE Id = '$id[$i]'");
                $directorio = 'images/';
				unlink($directorio.$ruta);
                header("Location:carga-marcas.php?msg_ok=La/s marca/s se eliminaron correctamente.");
            }
        }
    }
}

?>
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
    header("Location:carga-categorias.php?msg_error=No seleccionó ninguna categoria.");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $id=$_POST["id_pub"];
        $count = count($id);
        for ($i = 0; $i < $count; $i++) {
            $select_prod=mysql_query("select * from productos WHERE id_cat='$id[$i]'");
            if ($row_prod=mysql_fetch_array($select_prod)) {
                header("Location:carga-categorias.php?msg_error=Las categorias que intenta eliminar tienen productos asociados. Debe modificar los productos y luego eliminar las categorias.");
            }
            else {
                $delete_prod=mysql_query("DELETE FROM categorias WHERE Id = '$id[$i]'");
                header("Location:carga-categorias.php?msg_ok=La/s categoria/s se eliminaron correctamente.");
            }
        }
    }
}

?>
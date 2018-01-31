<?php 
session_set_cookie_params(21600,"/");
session_start(); 
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST['id_pub[]'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $id=$_POST["id_pub"];
    $count = count($id);
    for ($i = 0; $i < $count; $i++) {
        $result_sel=mysql_query("select * from productos WHERE Id = '$id[$i]'");
        $row_sel=mysql_fetch_array($result_sel);
		$ruta = $row_sel["foto"];
        $delete_prod=mysql_query("DELETE FROM productos WHERE Id = '$id[$i]'");
        $directorio = 'images/';
		unlink($directorio.$ruta);
    }
}

if ($id == "") {
    header("Location:carga-productos.php?msg_error=No seleccionó ningún producto.");
}

else {  
   header("Location:carga-productos.php?msg_ok=El/los producto/s se eliminaron correctamente.");
}

?>
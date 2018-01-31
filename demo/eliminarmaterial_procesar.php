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
    header("Location:marquez-in.php?msg_error=No seleccionó ningún material.");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $id=$_POST["id_pub"];
        $count = count($id);
        for ($i = 0; $i < $count; $i++) {

                $result_sel=mysql_query("select * from material WHERE Id = '$id[$i]'");
				$row_sel=mysql_fetch_array($result_sel);
				$ruta = $row_sel["url"];
                $delete_prod=mysql_query("DELETE FROM material WHERE Id = '$id[$i]'");
                $directorio = 'intranet/';
				unlink($directorio.$ruta);
                
        }
    }
    header("Location:marquez-in.php?msg_ok=El/los material/es se eliminaron correctamente.");
}

?>
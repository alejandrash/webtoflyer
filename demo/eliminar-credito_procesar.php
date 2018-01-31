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
    header("Location:credito-personal.php?msg_error=No seleccionó ningún crédito.");
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        $id=$_POST["id_pub"];
        $count = count($id);
        for ($i = 0; $i < $count; $i++) {
            $delete_prod=mysql_query("DELETE FROM credito_personal WHERE Id = '$id[$i]'");
            header("Location:credito-personal.php?msg_ok=El/Los crédito/s se eliminaron correctamente.");
        }
    }
}

?>
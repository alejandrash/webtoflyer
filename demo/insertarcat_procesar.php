<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$nombre=$_POST['nombre'];

$uploadfile_temporal=$_FILES['foto']['tmp_name'];
$uploadfile_nombre=$ruta.date('m-d-Y_hia').$_FILES['foto']['name'];
$uploadfile_size = $_FILES['foto']['size'];

if (is_uploaded_file($uploadfile_temporal))
{
    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
    $imagen = explode("/", $uploadfile_nombre, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    //$imagen = $uploadfile_nombre;
}

//$result_cod=mysql_query("select * from productos WHERE codigo='$codigo'");
//if ($row_cod=mysql_fetch_array($result_cod)) {
//    header("Location:insertar-prod.php?msg_error=Ya existe un producto con el mismo código.");
//}

if ($nombre == "") {
    header("Location:carga-categorias.php");
}

else {  
   $result=mysql_query("INSERT INTO categorias (nombre) VALUES ('$nombre')") or die(mysql_error());
   
    header("Location:carga-categorias.php?msg_ok=La categoria se ha agregado correctamente.");
}

//print_r($_POST);

?>
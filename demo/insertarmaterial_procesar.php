<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$filename=$_POST['filenam'];
$fileori=$_POST['fileori'];

$titulo=$_POST['titulo'];
$tipo=$_POST['tipo'];

if ($titulo == "") {
    header("Location:marquez-in.php");
}

$ruta="intranet/material/";//ruta carpeta donde queremos copiar las imágenes

rename("intranet/material/".$fileori, "intranet/material/".$filename);
$filename=$ruta.$filename;

//$redirect = "carga-marcas.php?success";

//$uploadfile_temporal=$_FILES['foto']['tmp_name'];
//$uploadfile_nombre=$ruta.date('m-d-Y_hia').$_FILES['foto']['name'];
//$uploadfile_size = $_FILES['foto']['size'];

//if (is_uploaded_file($uploadfile_temporal))
//{
   // move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
    $imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    //$imagen = $uploadfile_nombre;
    $result=mysql_query("INSERT INTO material (titulo, tipo, url) VALUES ('$titulo', '$tipo', '$imagen')") or die(mysql_error());
    header("Location:marquez-in.php?msg_ok=El material se ha agregado correctamente.");
//}


//print_r($_POST);

?>
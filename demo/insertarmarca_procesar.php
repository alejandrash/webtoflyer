<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$nombre=$_POST['nombre'];
$nombre = htmlspecialchars($_POST['nombre']);
$nombre=str_replace("'","*",$nombre);
$nombre=str_replace('"',"&",$nombre);
$usuario = $_SESSION['ESTADO'];
$filename=$_POST['filenam'];
$fileori=$_POST['fileori'];

if ($nombre == "") {
    header("Location:carga-marcas.php");
}

$result_existe=mysql_query("select * from marcas WHERE nombre ='$nombre'");
if ($row_existe=mysql_fetch_array($result_existe)) {
    header("Location:carga-marcas.php?msg_error=La marca que ingresaste ya existe en el sistema, no es necesario que la cargues.");
}
else {
    $ruta="images/marcas/";//ruta carpeta donde queremos copiar las imágenes

    rename("images/marcas/".$fileori, "images/marcas/".$filename);
    $filename=$ruta.$filename;


    $imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $result=mysql_query("INSERT INTO marcas (nombre, logo, usuario) VALUES ('$nombre', '$imagen', '$usuario')") or die(mysql_error());
    header("Location:carga-marcas.php?msg_ok=La marca se ha agregado correctamente.");
}
?>
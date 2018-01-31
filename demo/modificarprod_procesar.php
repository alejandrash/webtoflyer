<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST['id'];
$id_cat=$_POST['categoria'];

$tipo=htmlspecialchars($_POST['tipo']);
$tipo = trim($tipo);
$tipo=str_replace("'","*",$tipo);
$tipo=str_replace('"',"&",$tipo);
$modelo=$_POST['modelo'];
$modelo = trim($modelo);

//$titulo = htmlspecialchars($_POST['titulo']);
//$titulo=str_replace("'","*",$titulo);
//$titulo=str_replace('"',"&",$titulo);
$descripcion = htmlspecialchars($_POST['descripcion']);
$descripcion=str_replace("'","*",$descripcion);
$descripcion=str_replace('"',"&quot;",$descripcion);
$precio=$_POST['precio'];
$ean = $_POST['ean'];

$id_marca=$_POST['marca'];
$result_marca=mysql_query("select * from marcas where Id='$id_marca'");
$row_marca=mysql_fetch_array($result_marca);
$nombre_marca = $row_marca['nombre'];
$nombre_marca = trim($nombre_marca);

$titulo = $tipo." ".$modelo." ".$nombre_marca;

$origen=$_POST['origen'];
$tags=$_POST['tags'];
$tags=str_replace(",",", ",$tags);
$usuario = $_SESSION['ESTADO'];
if ($usuario=='') {
    $usuario='jorgelina@idgonline.com.ar';
}

$filename=$_POST['filenam'];
$fileori=$_POST['fileori'];
$fileoriStart=$_POST['fileoriStart'];

if ($id_cat == "") {
    header("Location:carga-productos.php");
}

if ($fileoriStart!="") {
    //unlink($fileoriStart);
}

$ruta="images/productos/";//ruta carpeta donde queremos copiar las imágenes

rename("images/productos/".$fileori, "images/productos/".$filename);
$filename=$ruta.$filename;

    $imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $result=mysql_query("UPDATE productos SET id_cat='$id_cat', id_marca='$id_marca', titulo='$titulo',tipo='$tipo',ean='$ean', modelo='$modelo', nombre_marca='$nombre_marca', descripcion='$descripcion', precio='$0,00', origen='$origen', tags='$tags' WHERE Id='$id'") or die(mysql_error());

    if ($fileori!="") {
       $result_foto=mysql_query("UPDATE productos SET foto='$imagen' WHERE Id='$id'") or die(mysql_error());
    }

    header("Location:carga-productos.php?msg_ok=El producto se ha modificado correctamente.");


//print_r($_POST);

?>
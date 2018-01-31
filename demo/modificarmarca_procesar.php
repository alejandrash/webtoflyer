<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$filename=$_POST['filenam'];
$fileori=$_POST['fileori'];
$fileoriStart=$_POST['fileoriStart'];

if ($nombre == "") {
    header("Location:carga-marcas.php");
}

if ($fileoriStart!="") {
    //unlink($fileoriStart);
}

$ruta="images/marcas/";//ruta carpeta donde queremos copiar las imágenes

rename("images/marcas/".$fileori, "images/marcas/".$filename);
$filename=$ruta.$filename;

//$uploadfile_temporal=$_FILES['foto']['tmp_name'];
//$uploadfile_nombre=$ruta.date('m-d-Y_hia').$_FILES['foto']['name'];
//$uploadfile_size = $_FILES['foto']['size'];

//if (is_uploaded_file($uploadfile_temporal))
//{
 //   move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
    $imagen = explode("/", $filename, 4);
    $imagen = ($imagen[1]."/".$imagen[2]);
    $result=mysql_query("UPDATE marcas SET nombre='$nombre' WHERE Id='$id'") or die(mysql_error());
    if ($fileori!="") {
       $result_foto=mysql_query("UPDATE marcas SET logo='$imagen' WHERE Id='$id'") or die(mysql_error());
    }
    header("Location:carga-marcas.php?msg_ok=La marca se ha modificado correctamente.");
//}

//$result_cod=mysql_query("select * from productos WHERE codigo='$codigo'");
//if ($row_cod=mysql_fetch_array($result_cod)) {
//    header("Location:insertar-prod.php?msg_error=Ya existe un producto con el mismo código.");
//}


//else {  
//    $result=mysql_query("UPDATE marcas SET nombre='$nombre' WHERE Id='$id'") or die(mysql_error());
    
 //   if (isset($imagen)) {
 //      $result_foto=mysql_query("UPDATE marcas SET logo='$imagen' WHERE Id='$id'") or die(mysql_error());
 //  }
   
 //   header("Location:carga-marcas.php?msg_error=La marca se ha modificado correctamente.");
//}

//print_r($_POST);

?>
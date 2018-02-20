<?php
    header("Content-Type:text/html; charset=utf-8");

session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$usuario=$_SESSION['ESTADO'];

$ruta=$_POST['ruta'];
$name=$_POST['name'];
$name2=$name;
$name=$name.'.jpg';
$name2=$name2.'.html';


$imagen = file_get_contents($ruta);
$file=fopen($name, "w"); 
fwrite($file, $imagen); 
fclose($file); 

$findme = "<meta property='og:image' content=''/>";
$new = "<meta property='og:image' content='http://www.webtoflyer.com/demo/".$name."'/>";

$str=file_get_contents($name2);
//replace something in the file string - this is a VERY simple example
$str=str_replace("$findme", "$new",$str);

//write the entire string
file_put_contents($name2, $str);


print_r('http://www.webtoflyer.com/demo/'.$name2);
?>
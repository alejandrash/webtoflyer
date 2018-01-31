<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
header("Content-Type:text/html; charset=utf-8");

$id=$_POST['id'];

$usua=$_SESSION['ESTADO'];
$select_us=mysql_query("select * from usuarios WHERE email='$usua'");
$row_us=mysql_fetch_array($select_us);
$id_usua=$row_us['Id'];
$pvp=$row_us['pvp'];

$select_produ=mysql_query("select * from productos WHERE Id='$id'");
$row_produ=mysql_fetch_array($select_produ);

$descripcion=$row_produ['descripcion'];
$descripcion=str_replace("*","'",$descripcion);
$descripcion=str_replace('&quot;','"',$descripcion);
$descripcion=str_replace('quot;','',$descripcion);
$origen = $row_produ['origen'];
$marca=$row_produ['id_marca'];

$select_mar=mysql_query("select * from marcas WHERE Id='$marca'");
$row_mar=mysql_fetch_array($select_mar);

echo('<div class="interior"><div class="marca"><div class="titulo"><p>'.$row_produ['titulo'].'</p></div><div class="logo"><img src="images/'.$row_mar['logo'].'" alt=""></div><a id="'.$row_produ['Id'].'" class="quitar" href="#" title="Quitar Producto">x</a></div><div class="imagen"><img src="images/'.$row_produ['foto'].'" class="img-responsive" alt=""><div class="frases"><p class="hidden"><span>ORIGEN: </span><input class="pais" type="hidden" value="'.$row_produ['origen'].'"></p><p id="frase_stock"><span>STOCK: </span><input class="stock" onkeypress="return Onlyprices(event)" type="text" value="5"><strong> u.</strong></p></div> <a class="selecucarda cucarda1" data-toggle="modal" href="#cucardas1" title="Click aqui para agregar cucarda"><span>ELEGIR CUCARDA</span></a> <a class="selecucarda cucarda2" data-toggle="modal" href="#cucardas2" title="Click aqui para agregar cucarda"><span>ELEGIR CUCARDA</span></a></div><div class="descripcion"><p><span class="numero"></span><strong style="font-weight:normal"; placeholder="Escribe aqui la descripcion..." contenteditable="true">'.$descripcion.'</strong> Origen: '.$origen.'</p></div></div><div class="bottom"><span>PRECIO CONTADO</span><input onkeypress="return Onlyprices(event)" class="auto big" type="text" step=",01" value="'.$row_produ['precio'].'"></div><div class="overlay"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>');
?>
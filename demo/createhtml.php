<?php
    header("Content-Type:text/html; charset=utf-8");
    session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if ($_SESSION['ESTADO']=='') {
    header("Location:index.php?msg_error=Su sesion ha expirado. Por favor ingrese nuevamente.");
}

$usuario=$_SESSION['ESTADO'];

$id_sesion = $_SESSION['SESIONFLY'];

$flyer=$_POST['flyer'];
$name=$_POST['name'];
$fecha=$_POST['fecha'];

$sesion=$_POST['sesion'];
$cara=$_POST['cara'];

if($cara == "tapa"){
    $_SESSION{"tapa_8_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_tapa_8_".$_SESSION['ESTADO']} =$name;
}
if($cara == "contratapa"){
    $_SESSION{"contratapa_8_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_contratapa_8_".$_SESSION['ESTADO']} =$name;
}
if($cara == "pag2"){
    $_SESSION{"pag2_8_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_pag2_8_".$_SESSION['ESTADO']} =$name;
}
if($cara == "pag3"){
    $_SESSION{"pag3_8_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_pag3_8_".$_SESSION['ESTADO']} =$name;
}
if($cara == "pag4"){
    $_SESSION{"pag4_8_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_pag4_8_".$_SESSION['ESTADO']} =$name;
}
if($cara == "pag5"){
    $_SESSION{"pag5_8_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_pag5_8_".$_SESSION['ESTADO']} =$name;
}
if($cara == "pag6"){
    $_SESSION{"pag6_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_pag6_".$_SESSION['ESTADO']} =$name;
}
if($cara == "pag7"){
    $_SESSION{"pag7_8_".$_SESSION['ESTADO']} =$sesion;
    $_SESSION{"archivo_pag7_8_".$_SESSION['ESTADO']} =$name;
}
//$_SESSION[$cara]=$sesion;

    $flyerfinal = "<!DOCTYPE HTML><html><head><title>Grupo Marquez - WEB TO FLYER</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><link href='../../css/bootstrap.min.css' rel='stylesheet' type='text/css' /><link href='../../css/style.css' rel='stylesheet' type='text/css' /><link href='../../css/wtf.css' rel='stylesheet' type='text/css' /><link href='../../css/font-awesome.css' rel='stylesheet'> <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/> <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet'> <link href='https://fonts.googleapis.com/css?family=Tulpen+One' rel='stylesheet'><link rel='stylesheet' href='../../css/icon-font.min.css' type='text/css' /><style type='text/css'> .producto-big .imagen .selecucarda span, .producto-contado .imagen .selecucarda span, .producto-1finan .imagen .selecucarda span, .producto-final .imagen .selecucarda span, .quitar, .eliminar-sda, .quitartachado, .agregartachado, #agregar-sda img, .frases, .stock, .descripcion strong:nth-of-type(2) {display:none!important;} #container-legales .inner-legales input {width:55px!important; color:#000!important; border:0!important; height:15px!important;} .cajaproducto .descripcion p strong, .cajaproducto .descripcion p span {font-size:11px!important; font-family: 'Roboto Condensed', sans-serif !important;} </style></head><body style='background:#FFF;'>".$flyer."</body></html>";
    
    $file=fopen($name, "w"); 
    fwrite($file, $flyerfinal); 
    fclose($file);

$sesion=str_replace("'","*",$sesion);

$result_existe=mysql_query("select * from flyers WHERE url = '$name'");
if($row_existe=mysql_fetch_array($result_existe)){
    $result=mysql_query("UPDATE flyers set grabado='$sesion' WHERE url = '$name'") or die(mysql_error());
}
else {
    $result=mysql_query("INSERT INTO flyers (id_sesion, fecha, usuario, url, grabado, cara, tipo) VALUES ('$id_sesion', '$fecha', '$usuario', '$name', '$sesion', '$cara', '8')") or die(mysql_error());
}
print_r($_POST);
?>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$resultado ="a";
$id_sesion = $_SESSION['SESIONFLY'];

$url1 =  '';
$url2 =  '';
$url3 =  '';
$url4 =  '';
$url5 =  '';
$url6 =  '';
$url7 =  '';
$url8 =  '';
$url8 =  '';
$url9 =  '';
$url10 =  '';
$url11 =  '';
$url12 =  '';
$url13 =  '';
$url14 =  '';
$url15 =  '';
$url16 =  '';

$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");

$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='tapa' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url1="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='contratapa' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url2="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag2' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url3="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag3' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url4="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag4' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url5="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag5' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url6="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag6' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url7="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag7' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url8="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag8' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url9="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag9' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url10="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag10' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url11="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag11' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url12="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag12' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url13="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag13' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url14="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag14' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url15="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from flyers WHERE tipo='16' AND usuario ='$usuario' AND cara='pag15' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url16="http://webtoflyer.com/demo/".$row_flyer["url"];
}


$urlcli1="http://do.convertapi.com/Web2Image?OutputFileName=TAPA_16".$id_sesion."&curl=".$url1."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli2="http://do.convertapi.com/Web2Image?OutputFileName=CONTRATAPA_16".$id_sesion."&curl=".$url2."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli3="http://do.convertapi.com/Web2Image?OutputFileName=PAG2_16".$id_sesion."&curl=".$url3."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli4="http://do.convertapi.com/Web2Image?OutputFileName=PAG3_16".$id_sesion."&curl=".$url4."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli5="http://do.convertapi.com/Web2Image?OutputFileName=PAG4_16".$id_sesion."&curl=".$url5."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli6="http://do.convertapi.com/Web2Image?OutputFileName=PAG5_16".$id_sesion."&curl=".$url6."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli7="http://do.convertapi.com/Web2Image?OutputFileName=PAG6_16".$id_sesion."&curl=".$url7."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli8="http://do.convertapi.com/Web2Image?OutputFileName=PAG7_16".$id_sesion."&curl=".$url8."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli9="http://do.convertapi.com/Web2Image?OutputFileName=PAG8_16".$id_sesion."&curl=".$url9."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli10="http://do.convertapi.com/Web2Image?OutputFileName=PAG9_16".$id_sesion."&curl=".$url10."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli11="http://do.convertapi.com/Web2Image?OutputFileName=PAG10_16".$id_sesion."&curl=".$url11."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli12="http://do.convertapi.com/Web2Image?OutputFileName=PAG11_16".$id_sesion."&curl=".$url12."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli13="http://do.convertapi.com/Web2Image?OutputFileName=PAG12_16".$id_sesion."&curl=".$url13."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli14="http://do.convertapi.com/Web2Image?OutputFileName=PAG13_16".$id_sesion."&curl=".$url14."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli15="http://do.convertapi.com/Web2Image?OutputFileName=PAG14_16".$id_sesion."&curl=".$url15."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli16="http://do.convertapi.com/Web2Image?OutputFileName=PAG15_16".$id_sesion."&curl=".$url16."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>WEB TO FLYER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/jquery-1.10.2.min.js"></script>
<link href='css/sweetalert.css' rel='stylesheet' type='text/css'>
<script src="js/sweetalert.min.js"></script>
</head> 
<body>
    <div id="cargando"></div>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
                <!-- top_bg -->
                <?php include("includes/top.php"); ?>
                <!-- /top_bg -->
            </div>
            <div class="header_bg">
				<div class="header">
								<div class="col-sm-offset-1 col-sm-10 col-xs-12">
                                    <div class="row">
                                        <div class="logo col-sm-2 col-xs-12" style="margin-top:0;">
                                            <a href="home.php"><img src="images/logo_marquez.png" class="img-responsive" alt=""> </a>
                                        </div>
                                            <!-- start header_right -->
                                        <div class="col-sm-10 col-xs-12 banner">
                                            <img src="images/diseniar/paso2.png" class="img-responsive" alt="">
                                        </div>
                                    </div>
								<div class="clearfix"> </div>
							</div>
				  </div>
					
            </div>
            <!-- //header-ends -->
            <div class="col-xs-12 titulogris">
                <p class="col-xs-12"><img src="images/titulos/diseniar.png" class="img-responsive" alt=""> DISEÑAR - Detalle de Pedido</p>
            </div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <!-- PAGINA DETALLE start-->
                <div id="pagina-detalle">
                    <div class="col-lg-offset-0 col-md-offset-1 col-lg-12 col-md-11 col-xs-12">
                        <div id="wrap-detalle" class="col-lg-6 col-md-9 col-xs-12">
                        
                            <form action="diseniar-16-paginas_confirmar.php" method="post" id="detalle-pedido" name="detalle-pedido" class="col-xs-12">
                                <?php
                                    $fecha = date('Y-m-j');
                                    $nuevafecha = strtotime ( '+14 day' , strtotime ( $fecha ) ) ;
                                    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                    $nuevafecha= date('d/m/Y',strtotime($nuevafecha));
                                ?>
                                <input type="hidden" id="estimado" name="estimado" value="31/01 (+48h interior del país)">
                                <!--<input type="hidden" id="estimado" name="estimado" value="<?php echo ($nuevafecha); ?>">-->
                                <input type="hidden" id="precio" name="precio" value="">
                                <input type="hidden" id="bultos2" name="bultos2" value="">
                                <input type="hidden" id="kilos2" name="kilos2" value="">
                                <input type="hidden" id="hora" name="hora" value="">
                                <input type="hidden" id="dire" name="dire" value="">
                                <input type="hidden" id="canti" name="canti" value="">
                                <input type="hidden" id="provincia" name="provincia" value="">
                                
                                <div class="row">
                                    <h1>DETALLE DE PEDIDO</h1>
                                    <div class="form-group cajagris">
                                        <?php
                                                    /** * Verifica que una fecha esté dentro del rango de fechas establecidas * @param $start_date fecha de inicio * @param $end_date fecha final * @param $evaluame fecha a comparar * @return true si esta en el rango, false si no lo está */ function check_in_range($start_date, $end_date, $evaluame) { 
                                                        $start_ts = strtotime($start_date); 
                                                        $end_ts = strtotime($end_date); 
                                                        $user_ts = strtotime($evaluame); 
                                                        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
                                                    }

                                                        $today = date("Y-m-d");
                                                        ?>
                                                    
                                                        <div class="col-sm-12">
                                                            <strong>SELECCION&Aacute; CANTIDAD DE REVISTAS</strong>
                                                            <br>
                                                            <select class="form-control" name="select_cantidad" id="select_cantidad" required>
                                                                <option value="" data-final="" data-unitario="">Seleccion&aacute;...</option> 
                                                                <?php
                                                                $result_precios=mysql_query("select * from tabla_precios WHERE tipo='16' order by cantidad ASC");
                                                                if ($row_precios=mysql_fetch_array($result_precios)) {
                                                                    do {
                                                                        $preciouni = $row_precios['costo_unitario'];
                                                                        $cantidad = $row_precios['cantidad'];
                                                                        $preciotot = ($preciouni * $cantidad);
                                                                        $preciotot = number_format($preciotot, 2, ',', '.');
                                                                        $preciouni = number_format($preciouni, 4, ',', '.');
                                                                    ?>
                                                                    <option value="<?php echo($cantidad); ?>" data-final="<?php echo($preciotot); ?>" data-unitario="<?php echo($preciouni); ?>"><?php echo($cantidad); ?></option>
                                                                    <?php
                                                                    } while ($row_precios=mysql_fetch_array($result_precios));
                                                                }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <br>
                                                            <strong id="preunitario" style="display: none; font-size:14px;">PRECIO UNITARIO: $<span><?php echo $preciouni;?></span> + IVA</strong>
                                                        </div>
                                                        <div class="hidden">
                                                            <div class="col-xs-12" style="margin-bottom: 30px;">
                                                                <div class="col-xs-12 borderprecio" style="margin-left: 0; margin-top: 15px;">
                                                                    <p><strong>PRECIO FINAL: $<span id="preciofin"></span> + IVA</strong></p>
                                                                </div> 
                                                                <div class="col-xs-12">
                                                                    <div class="row">
                                                                        <p class="small margin-bottom-0">Este importe se debitar&aacute; de la cuenta corriente de Grupo Marquez.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 borderprecio" style="margin-left: 0; margin-top: 15px;">
                                                                    <p><strong>CANTIDAD DE REVISTAS: <span id="cantfin"></span> unidades.</strong></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <p><strong>BULTOS: </strong><span id="bultos1">4 Cajas</span></p>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12">
                                                                <p><strong>KILOS: </strong><span id="kilos1">60 Kg</span></p>
                                                            </div>

                                                        </div>

                                    </div>
                                    <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="row">
                                                <p><strong>INFO T&Eacute;CNICA:</strong>Revista de 16 p&aacute;ginas | Papel obra 70grs | full color | abrochado</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h2>ENTREGA DE REVISTAS</h2>
                                        <?php
                                            $result_dir=mysql_query("select * from usuarios WHERE email='$usuario'");
                                            $row_dir=mysql_fetch_array($result_dir);
                                            $id_usuario = $row_dir['Id'];
                                            $result_dirsuc=mysql_query("select * from sucursales WHERE id_usuario='$id_usuario'");
                                        ?>
                                        <label class="checkbox-inline">Seleccione la direcci&oacute;n de entrega:</label>
                                        <select class="form-control dir" name="direccion_1" id="direccion_1"> 
                                            <?php
                                            if ($row_dirsuc=mysql_fetch_array($result_dirsuc)) {
                                                 do { ?>
                                                <option value="<?php echo($row_dirsuc['direccion']); ?>" data-prov="<?php echo($row_dirsuc['provincia']); ?>"><?php echo($row_dirsuc['direccion']); ?></option>
                                            <?php
                                                } while ($row_dirsuc=mysql_fetch_array($result_dirsuc));    
                                            }
                                            ?>
                                        </select>
                                        <label class="checkbox-inline"><input class="dir" type="radio" name="direccion" id="direccion_2" value="Otro">Otro</label>
                                        <input type="text" class="form-control" id="direccion_otro" name="direccion_otro" style="display:none;" placeholder="Ingrese la direcci&oacute;n">
                                        <br>
                                        <select class="form-control" style="display:none;" id="provincia_otro" name="provincia_otro">
                                                <option value="">Seleccioná la provincia</option>
                                                <option value="Ciudad Autónoma de Buenos Aires">Ciudad Autónoma de Buenos Aires</option>
                                                <option value="Buenos Aires">Buenos Aires</option>
                                                <option value="Catamarca">Catamarca</option>  
                                                <option value="Chaco">Chaco</option>  
                                                <option value="Chubut">Chubut</option>  
                                                <option value="Córdoba">Córdoba</option>  
                                                <option value="Corrientes">Corrientes</option>  
                                                <option value="Entre Ríos">Entre Ríos</option>  
                                                <option value="Formosa">Formosa</option>  
                                                <option value="Jujuy">Jujuy</option> 
                                                <option value="La Pampa">La Pampa</option>
                                                <option value="La Rioja">La Rioja</option>  
                                                <option value="Mendoza">Mendoza</option>  
                                                <option value="Misiones">Misiones</option>  
                                                <option value="Neuquén">Neuquén</option>  
                                                <option value="Río Negro">Río Negro</option>  
                                                <option value="Salta">Salta</option>  
                                                <option value="San Juan">San Juan</option>  
                                                <option value="San Luis">San Luis</option>
                                                <option value="Santa Cruz">Santa Cruz</option>  
                                                <option value="Santa Fe">Santa Fe</option> 
                                                <option value="Santiago del Estero">Santiago del Estero</option>
                                                <option value="Tierra del Fuego">Tierra del Fuego</option>  
                                                <option value="Tucumán">Tucumán</option>  
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <h2>HORARIO DE ENTREGA</h2>
                                        <label class="checkbox-inline"><input class="horario" type="radio" name="horario" id="horario_1" value="De 9 a 13 hs" checked>De 9 a 13 hs</label>
                                        <label class="checkbox-inline"><input class="horario" type="radio" name="horario" id="horario_2" value="De 14 a 18 hs">De 14 a 18 hs</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-xs-12 padding-left-0">
                                                <p class="margin-bottom-0"><strong>NOMBRE DE CONTACTO</strong></p>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre de contacto" required>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 padding-right-0">
                                                <p class="margin-bottom-0"><strong>TEL&Eacute;FONO DE CONTACTO</strong></p>
                                                <input type="text" class="form-control" id="telefono" value="<?php echo($row_dir['telefono']); ?>" name="telefono" placeholder="Ingrese Telefono de contacto" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h2>COMENTARIOS</h2>
                                        <textarea class="form-control" rows="5" name="comentarios" id="comentarios"></textarea>
                                    </div>
                                    <div class="form-group bordetop">
                                        <h2><a href="#" data-toggle="modal" data-target="#contrato">Click ac&aacute; para leer los T&Eacute;RMINOS Y CONDICIONES DE USO</a></h2>
                                        <label class="checkbox-inline"><input type="checkbox" name="acepto" id="acepto" value="si" required>Deb&eacute;s tildar este casillero para aceptar los t&eacute;rminos y condiciones y continuar tu pedido.</label>
                                    </div>
                                    <p class="col-sm-6 col-xs-12 relative"><input type="reset" id="cancelar" class="continuar reset" value="CANCELAR"><span class="icono"><i class="fa fa-times" aria-hidden="true"></i></span></p>
                                    <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="continuar" class="continuar" value="CONTINUAR"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>
                                    <!--<div class="infotecnica col-sm-8 col-xs-12">
                                        <h2>INFO T&Eacute;CNICA</h2>
                                        <p>D&iacute;pticos doblados</p>
                                        <p>Tama&ntilde;o A4 cerrado impresos sobre</p>
                                        <p>papel ilustraci&oacute;n de 90 Grs</p>
                                        <p>Full Color</p>
                                    </div>-->
                                </div>
                            </form>
                        
                        </div>
                        <!--START LATERAL-->
                        <div class="row">
                            <div class="lateral col-lg-6 col-md-6 col-xs-12">
                                <div class="loadflyer paginas16">
                                            <div id="loaduno" data-toggle="modal" data-target="#preview" title="Click para Ampliar TAPA">
                                                <img src="<?php echo($urlcli1); ?>" class="img-responsive" alt=""> 
                                            </div>
                                            <div id="loaddos" data-toggle="modal" data-target="#preview" title="Click para Ampliar CONTRATAPA"><img src="<?php echo($urlcli2); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadtres" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 2"><img src="<?php echo($urlcli3); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadcuatro" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 3"><img src="<?php echo($urlcli4); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadcinco" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 4"><img src="<?php echo($urlcli5); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadseis" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 5"><img src="<?php echo($urlcli6); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadsiete" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 6"><img src="<?php echo($urlcli7); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadocho" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 7"><img src="<?php echo($urlcli8); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadnueve" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 8"><img src="<?php echo($urlcli9); ?>" class="img-responsive" alt=""></div>
                                            <div id="loaddiez" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 9"><img src="<?php echo($urlcli10); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadonce" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 10"><img src="<?php echo($urlcli11); ?>" class="img-responsive" alt=""></div>
                                            <div id="loaddoce" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 11"><img src="<?php echo($urlcli12); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadtrece" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 12"><img src="<?php echo($urlcli13); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadcatorce" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 13"><img src="<?php echo($urlcli14); ?>" class="img-responsive" alt=""></div>
                                            <div id="loadquince" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 14"><img src="<?php echo($urlcli15); ?>" class="img-responsive" alt=""></div>
                                            <div id="loaddieciseis" data-toggle="modal" data-target="#preview" title="Click para Ampliar PAGINA 15"><img src="<?php echo($urlcli16); ?>" class="img-responsive" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <!--END LATERAL-->
                    </div>
                </div>
                 <!-- PAGINA DETALLE end-->
            </div>
            <!-- Diseniar end-->
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
        </div>
</div>
       
<!-- Modal -->
<div id="preview" class="modal fade" role="dialog" style="width:100%!important; overflow-x:visible!important;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="contrato" class="modal fade" role="dialog" style="width:100%!important; overflow-x:visible!important;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div class="contenido-contrato">
          <h1>T&Eacute;RMINOS Y CONDICIONES PARA EL USO DEL SITIO WEB TO FLYER</h1>
                <?php 
                                    $archivo = "terminos/contrato.txt"; 
                                    $contrato = ''; 
                                    foreach(file('terminos/contrato.txt') as $line) {
                                       $contrato = $contrato. ($line). "\n";
                                    }
                                    $contrato = eregi_replace("[\n|\r|\n\r]", ' ', $contrato);
                    echo($contrato);
                ?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
       
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'db98655c3e6c648f144d70d2da5a717d56e8e076';
window.smartsupp||(function(d) {
	var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
	s=d.getElementsByTagName('script')[0];c=d.createElement('script');
	c.type='text/javascript';c.charset='utf-8';c.async=true;
	c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
				<!--//content-inner-->
			<!--/sidebar-menu-->
            <?php include("includes/sidebar-menu.php"); ?>
						
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
<script type="text/javascript">
    function Onlynumbers(e)
    {
        return false;
    }
    $(document).ready(function () { 
        var cargarPrecioFin = $("input[name='cantidad']:checked").parent().parent().children('.precio').html(); 
        $('#preciofin').html(cargarPrecioFin);
        
        
        
        
        
        
        $("#loaduno, #loaddos, #loadtres, #loadcuatro, #loadcinco, #loadseis, #loadsiete, #loadocho, #loadnueve, #loaddiez, #loadonce, #loaddoce, #loadtrece, #loadcatorce, #loadquince, #loaddieciseis").click(function() {  
            var llenarModal = $(this).html();
            $('#preview .modal-body').html(llenarModal);
        });
        
        var costofinal = '';
        var cantfinal = '';
        var dirfinal = '';
        var horariofinal = '';
        var comfinal = '';
        var nombre = '';
        var tel = '';
        var bultos = '';
        var kilos = '';
        var cantVal = '';
        var dataVal = '';
        var esotro = 0;
        $('#select_cantidad').change(function(){
            dataVal = $(this).find('option:selected').attr('data-final');
            cantVal = $(this).val();
            if ($(this).val()!='') {
                $(this).parent().parent('.cajagris').find('.hidden').addClass('visible');
                $(this).parent().parent('.cajagris').find('.hidden').removeClass('hidden');
                $('#preciofin').text(dataVal);
                $('#cantfin').text(cantVal);
            }
            else {
                $(this).parent().parent('.cajagris').find('.visible').addClass('hidden');
                $(this).parent().parent('.cajagris').find('.hidden').removeClass('visible');
                $('#preciofin').text();
                $('#cantfin').text();
            }
            kilos = ((cantVal * 40) / 1000);
            $("#kilos1").text(kilos+" Kg");
            bultos = ((cantVal / 650)*2);
            bultos = Math.ceil(bultos);
            $("#bultos1").text(bultos+" Cajas");
        });

        $('#direccion_2').change(function(){
            $('#direccion_otro').fadeIn();
            $("#direccion_otro").attr("required", true);
            $('#provincia_otro').fadeIn();
            $("#provincia_otro").attr("required", true);
            dirfinal = 'otro';
            esotro = 1;
        });
        $('#direccion_1').change(function(){
            $('#direccion_2').attr('checked', false);
            $('#direccion_otro').css('display','none');
            $("#direccion_otro").attr("required", false);
            $('#provincia_otro').css('display','none');
            $("#provincia_otro").attr("required", false);
            dirfinal = $(this).val();
            esotro = 0;
        });
        
        $("#cancelar").click(function() {     
                location.reload();
        });
        $("#continuar").click(function() {
            if( $('#acepto').prop('checked') ) { 
            }
            else {
                swal("Error", "Leé los Términos y Condiciones de Uso y aceptalos para continuar. Gracias!", "error");
                return false;
            }
            if (cantVal == '') {
                swal("Error", "Selecciona la CANTIDAD DE REVISTAS que vas a solicitar.", "error");
                return false;
            }
            else {
                $('#cantfinal').html(cantVal+" unidades.");
                if (dirfinal == 'otro') {
                    dirfinal = $('#direccion_otro').val();
                    var prov = $('#provincia_otro').val();
                    if (dirfinal=='') {
                        swal("Error", "Ingresá la dirección", "error");
                        return false;
                    }
                    if (prov=='') {
                        swal("Error", "Seleccioná la provincia", "error");
                        return false;
                    }
                    else {
                        $('#provincia').val(prov);
                    }
                }
                else {dirfinal = $('#direccion_1').val();}
                $('#dirfinal').html(dirfinal);
                var comfinal = $('#comentarios').val();
                if (comfinal == "") {
                    comfinal = "Sin comentarios.";
                }

                if($('#horario_1').is(':checked')) {
                    horariofinal = "De 9 a 13 hs";
                }
                else {
                    horariofinal = "De 14 a 18 hs";
                }
                nombre =$('#nombre').val();
                tel =$('#telefono').val();
                bultos=$('#bultos1').html();
                kilos=$('#kilos1').html();


                if ((nombre =="") || (tel =="") ||(dirfinal == "")) {
                    swal("Error", "Complete todos los datos del formulario.", "error");
                    return false; 
                }
                else {
                    var provincia = $( "#direccion_1 option:selected" ).attr('data-prov');
                    if (esotro==0){
                        $('#provincia').val(provincia);
                    }
                    $('#comfinal').html(comfinal);
                    $('#bultos').html(bultos);
                    $('#kilos').html(kilos);
                    $('#horariofinal').html(horariofinal);
                    $('#nomfinal').html(nombre);
                    $('#telfinal').html(tel);
                    $('#costofinal').html("$"+dataVal+" + IVA");
                    $('#precio').val(dataVal);
                    $('#bultos2').val(bultos);
                    $('#kilos2').val(kilos);
                    $('#hora').val(horariofinal);
                    $('#dire').val(dirfinal);
                    $('#canti').val(cantVal);
                    $('#detalle-pedido').submit();
                    //$('#pagina-detalle').css('display', 'none');
                    //$('#pagina-conf').fadeIn();
                    //$('html, body').animate({scrollTop:0},500);
                    //$('.header .banner img').attr('src', 'images/diseniar/paso3.png'); 
                }
                return false; 
            }
        });
        
    });

</script>
</body>
</html>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if ($_SESSION['ESTADO']=='') {
    header("Location:index.php?msg_error=Su sesion ha expirado. Por favor ingrese nuevamente.");
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

$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");

$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='tapa' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url1="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='contratapa' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url2="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='pag2' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url3="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='pag3' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url4="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='pag4' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url5="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='pag5' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url6="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='pag6' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url7="http://webtoflyer.com/demo/".$row_flyer["url"];
}
$result_flyer=mysql_query("select * from predisenio WHERE tipo='8' AND cara='pag7' ORDER BY Id DESC LIMIT 1");
if ($row_flyer=mysql_fetch_array($result_flyer))
{
    $url8="http://webtoflyer.com/demo/".$row_flyer["url"];
}

//$file1 = "uri=".$url1."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
//$file2 = "uri=".$url2."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
//$file3 = "uri=".$url3."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
//$file4 = "uri=".$url4."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
//$file5 = "uri=".$url5."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
//$file6 = "uri=".$url6."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
//$file7 = "uri=".$url7."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";
//$file8 = "uri=".$url8."&b_width=800&width=796&height=1122&delay=2000&format=jpg&maxage=86400";

//$api_key = "fdJAIgr560-nXJBMVv89Zg";
//$api_secret = "hola";
//$hashed1 = md5($file1 . $api_secret);
//$hashed2 = md5($file2 . $api_secret);
//$hashed3 = md5($file3 . $api_secret);
//$hashed4 = md5($file4 . $api_secret);
//$hashed5 = md5($file5 . $api_secret);
//$hashed6 = md5($file6 . $api_secret);
//$hashed7 = md5($file7 . $api_secret);
//$hashed8 = md5($file8 . $api_secret);

//$file1 = "$file1&key=$api_key&hash=$hashed1";
//$file2 = "$file2&key=$api_key&hash=$hashed2";
//$file3 = "$file3&key=$api_key&hash=$hashed3";
//$file4 = "$file4&key=$api_key&hash=$hashed4";
//$file5 = "$file5&key=$api_key&hash=$hashed5";
//$file6 = "$file6&key=$api_key&hash=$hashed6";
//$file7 = "$file7&key=$api_key&hash=$hashed7";
//$file8 = "$file8&key=$api_key&hash=$hashed8";

//$urlcli1 = "http://api.pagelr.com/capture/javascript?".$file1;
//$urlcli2 = "http://api.pagelr.com/capture/javascript?".$file2;
//$urlcli3 = "http://api.pagelr.com/capture/javascript?".$file3;
//$urlcli4 = "http://api.pagelr.com/capture/javascript?".$file4;
//$urlcli5 = "http://api.pagelr.com/capture/javascript?".$file5;
//$urlcli6 = "http://api.pagelr.com/capture/javascript?".$file6;
//$urlcli7 = "http://api.pagelr.com/capture/javascript?".$file7;
//$urlcli8 = "http://api.pagelr.com/capture/javascript?".$file8;

$urlcli1="http://do.convertapi.com/Web2Image?OutputFileName=TAPA_PREDISENIO_8".$id_sesion."&curl=".$url1."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli2="http://do.convertapi.com/Web2Image?OutputFileName=CONTRATAPA_PREDISENIO_8".$id_sesion."&curl=".$url2."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli3="http://do.convertapi.com/Web2Image?OutputFileName=PAG2_PREDISENIO_8".$id_sesion."&curl=".$url3."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli4="http://do.convertapi.com/Web2Image?OutputFileName=PAG3_PREDISENIO_8".$id_sesion."&curl=".$url4."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli5="http://do.convertapi.com/Web2Image?OutputFileName=PAG4_PREDISENIO_8".$id_sesion."&curl=".$url5."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli6="http://do.convertapi.com/Web2Image?OutputFileName=PAG5_PREDISENIO_8".$id_sesion."&curl=".$url6."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli7="http://do.convertapi.com/Web2Image?OutputFileName=PAG6_PREDISENIO_8".$id_sesion."&curl=".$url7."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
$urlcli8="http://do.convertapi.com/Web2Image?OutputFileName=PAG7_PREDISENIO_8".$id_sesion."&curl=".$url8."?&PageWidth=796&PageHeight=1123&ApiKey=855890385";
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
<script type="text/javascript">
function nobackbutton(){ 
   window.location.hash="no-back-button"; 
   window.location.hash="Again-No-back-button" //chrome 
   window.onhashchange=function(){window.location.hash="no-back-button";}  
}

$(window).load(function(){
    nobackbutton();
});
</script>
</head> 
<body>
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
                <p class="col-xs-12"><img src="images/titulos/diseniar.png" class="img-responsive" alt=""> DISEÑAR - Detalle de Revista Prediseñada</p>
            </div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <!-- PAGINA DETALLE start-->
                <div id="pagina-detalle">
                    <div class="col-lg-offset-0 col-md-offset-1 col-lg-12 col-md-11 col-xs-12">
                        <div id="wrap-detalle" class="col-lg-6 col-md-9 col-xs-12">
                        
                            <form action="predis_detalle-8_procesar_central.php" method="post" id="detalle-pedido" name="detalle-pedido" class="col-xs-12">
                                
                                <div class="row">
                                    <div class="form-group cajagris">
                                        <div class="col-xs-12">
                                        <p>Este diseño servir&aacute; como plantilla para aquellos socios que elijan el uso de la revista prediseñada durante la pr&oacute;xima etapa de diseño. Los socios pueden cambiar productos, precios y agregar sus sucursales.</p>
                                        <p>Aquellos socios que no hagan uso de la herramienta "Web To Flyer" recibir&aacute;n la cantidad mínima de copias de esta revista prediseñada sin ninguna modificaci&oacute;n.</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="row">
                                                <p><strong>INFO T&Eacute;CNICA:</strong>Revista de 8 p&aacute;ginas | Papel obra 70grs | full color | abrochado</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h2>COMENTARIOS</h2>
                                        <textarea class="form-control" rows="5" name="comentarios" id="comentarios"></textarea>
                                    </div>
                                    
                                    <p class="col-sm-6 col-xs-12 relative"><input type="reset" id="cancelar" class="continuar reset" value="CANCELAR"><span class="icono"><i class="fa fa-times" aria-hidden="true"></i></span></p>
                                    <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="continuar" class="continuar" value="CONFIRMAR"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>

                                </div>
                            </form>
                        
                        </div>
                        <!--START LATERAL-->
                        <div class="row">
                            <div class="lateral col-lg-6 col-md-6 col-xs-12" style="position:absolute; float:right;">
                                <div class="loadflyer">
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
        
        $("#loaduno, #loaddos, #loadtres, #loadcuatro, #loadcinco, #loadseis, #loadsiete, #loadocho").click(function() {  
            var llenarModal = $(this).html();
            $('#preview .modal-body').html(llenarModal);
        });
        
        $("#cancelar").click(function() {     
                window.location.href = "predis_diseniar-8-paginas.php";
        });
    });

</script>
</body>
</html>
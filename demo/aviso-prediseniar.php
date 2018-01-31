<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");

$result_orden=mysql_query("select * from rating_productos WHERE usuario ='$usuario' ORDER BY nro_orden DESC LIMIT 1");
$row_orden=mysql_fetch_array($result_orden);
$orden = $row_orden["nro_orden"];
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
<link href="css/wtf.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#modificar").click(function(e) {
        e.stopPropagation();
        e.preventDefault();
          confirmar=confirm("El formato de revista de este mes ya fue elegido. Si cambias el formato, perderás todo el avance (avisos publicitarios, bloqueos, revista, etc.). Click en ACEPTAR para modificar el formato. Click en CANCELAR para salir sin cambios.");
                    if (confirmar) {
                        $("#elige-formato").fadeIn();
                        $("#elige-formato").removeClass('hidden');
                        $("#botones-funciones").css('display', 'none');
                    }
                    else {
                        return false;
                    }
    });
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
                                            <img src="images/diseniar/paso1.png" class="img-responsive" alt="">
                                        </div>
                                    </div>
								<div class="clearfix"> </div>
							</div>
				  </div>
					
            </div>
            <!-- //header-ends -->
            <div class="col-xs-12 titulogris">
                <p class="col-xs-12"><img src="images/titulos/editardatos.png" class="img-responsive" alt="">Editar revista</p>
            </div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <!-- PAGINA ENVIADO start-->
                <div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div id="wrap-enviado" class="col-lg-8 col-md-8 col-sm-9 col-xs-12 eleccion text-center" style="padding-top: 0;">
                            <!--<p class="">En esta sección armar&aacute;s la Revista Predise&ntilde;ada. <br><span class="ocre"><strong>Asegúrate de haber cargado todos los AVISOS PUBLICITARIOS <br>y de haber BLOQUEADO LAS MARCAS de este per&iacute;odo antes de comenzar.</strong></span><br>Si no cargas los avisos antes de comenzar el dise&ntilde;o, éstos no se visualizar&aacute;n.</p>-->

                            <div id="botones-funciones" class="col-xs-12">
                              <p class="titulo-bordeinferior col-xs-12" style="margin-top:80px; color:#666; text-transform: none; font-size:16px; font-weight: normal; text-align: left; position: relative; display: block;">Seguí los pasos para editar la revista prediseñada:</p>
                              <a class="btn col-xs-3" style="color:#666;" href="publicitarios.php" title="Click aqui para cargar todos los avisos publicitarios"><span class="pasopredi">PASO 1</span><img src="images/btn_cargaravisos.png" class="img-responsive out" alt=""><img src="images/btn_cargaravisos_over.png" class="img-responsive over" alt=""></a>
                              <a class="btn col-xs-3 col-xs-offset-0" style="color:#666;" href="aviso-bloquear.php" title="Click aqui para bloquear marcas"><span class="pasopredi">PASO 2</span><img src="images/btn_bloquear.png" class="img-responsive out" alt=""><img src="images/btn_bloquear_over.png" class="img-responsive over" alt=""></a>
                              <div class="col-xs-6 col-xs-offset-0">
                                <div class="row">
                                  <span class="pasopredi" style="position:Relative; top:9px;">PASO 3</span>
                                  <a class="btn col-xs-6 col-xs-offset-0" style="color:#666;" href="predis_diseniar-8-paginas.php" title="Click aqui para predise&ntilde;ar la revista de 8"><img src="images/btn_prediseniar.png" class="img-responsive out" alt=""><img src="images/btn_prediseniar_over.png" class="img-responsive over" alt=""></a>
                                  <a class="btn col-xs-6 col-xs-offset-0" style="color:#666;" href="predis_diseniar-16-paginas.php" title="Click aqui para predise&ntilde;ar la revista de 16"><img src="images/btn_prediseniar_16.png" class="img-responsive out" alt=""><img src="images/btn_prediseniar_16_over.png" class="img-responsive over" alt=""></a>
                                </div>
                              </div>

                              <p class="titulo-bordeinferior col-xs-12" style="margin-top:40px; color:#666; text-transform: none; font-size:16px; font-weight: normal; text-align: left; position: relative; display: block;">Configuración general:</p>
                              <a class="btn col-xs-3" style="color:#666;" href="carga-banners.php" title="Click aqui para cargar el banner de la tapa"><img src="images/btn_bannertapa.png" class="img-responsive out" alt=""><img src="images/btn_bannertapa_over.png" class="img-responsive over" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- PAGINA ENVIADO end-->
                
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
</body>
</html>
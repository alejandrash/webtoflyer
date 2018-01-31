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

$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Grupo Marquez - WEB TO FLYER</title>
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
                                            <a href="home.php"><img src="images/logo_marquez.png" class="img-responsive" alt="Grupo Marquez"> </a>
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
                <!-- PAGINA CONF start-->
                <div id="pagina-conf">
                    <div class="col-lg-offset-1 col-lg-11 col-md-12 col-xs-12">
                        <div id="wrap-detalle" class="col-lg-6 col-md-9 col-xs-12">
                            <form action="predis_detalle-8_procesar.php" method="post" id="confirmar-pedido" name="confirmar-pedido" class="col-xs-12">
                                <div class="row">
                                    <h1 class="margin-bottom-0">CONFIRMACI&Oacute;N</h1>
                                    <p class="subtitulo">Lea atentamente antes de confirmar el curso de impresi&oacute;n.</p>
                                    <div class="form-group noborder">
                                        <h2 class="margin-bottom-0">CANTIDAD DE REVISTAS</h2>
                                        <p id="cantfinal"><?php echo($_POST["canti"]); ?></p>
                                        <input type="hidden" id="canti" name="canti" value="<?php echo($_POST["canti"]); ?>">
                                    </div>
                                    <div class="form-group noborder">
                                        <h2 class="margin-bottom-0">PRECIO</h2>
                                        <p id="costofinal">$<?php echo($_POST["precio"]); ?> + IVA</p>
                                        <input type="hidden" id="precio" name="precio" value="<?php echo($_POST["precio"]); ?>">
                                    </div>
                                    <div class="form-group noborder">
                                        <h2 class="margin-bottom-0">ENTREGA DE REVISTAS</h2>
                                        <?php
                                            $prov = $_POST["provincia"];
                                            if (isset($_POST["direccion_otro"]) && !empty($_POST["direccion_otro"])) {
                                                $direccion = $_POST["direccion_otro"];
                                            }
                                            else {
                                                $direccion = $_POST["direccion_1"];
                                            }
                                        ?>
                                        <p id="dirfinal"><?php echo($direccion); ?>, <?php echo($prov); ?>. <?php echo($_POST["horario"]); ?></p>
                                        <input type="hidden" id="dire" name="dire" value="<?php echo(utf8_encode($direccion)); ?>">
                                        <input type="hidden" id="prov" name="prov" value="<?php echo($prov); ?>">
                                        <input type="hidden" id="hora" name="hora" value="<?php echo($_POST["horario"]); ?>">
                                    </div>
                                    <div class="form-group noborder">
                                        <h2 class="margin-bottom-0">NOMBRE DE CONTACTO</h2>
                                        <p id="nomfinal"><?php echo($_POST["nombre"]); ?></p>
                                        <input type="hidden" id="nombre" name="nombre" value="<?php echo(utf8_encode($_POST["nombre"])); ?>">
                                    </div>
                                    <div class="form-group noborder">
                                        <h2 class="margin-bottom-0">TEL&Eacute;FONO DE CONTACTO</h2>
                                        <p id="telfinal"><?php echo($_POST["telefono"]); ?></p>
                                        <input type="hidden" id="telefono" name="telefono" value="<?php echo($_POST["telefono"]); ?>">
                                    </div>
                                    <div class="form-group">
                                        <h2 class="margin-bottom-0">COMENTARIOS</h2>
                                        <p id="comfinal"><?php echo($_POST["comentarios"]); ?></p>
                                        <input type="hidden" id="comentarios" name="comentarios" value="<?php echo(utf8_encode($_POST["comentarios"])); ?>">
                                    </div>
                                    <!--<p><a class="preview" href="#"><i class="fa fa-print" aria-hidden="true"></i> IMPRIMIR</a> -->
                                    <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="finalizar" class="continuar" value="FINALIZAR"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>
                                </div>
                            
                        </div>
                        <!--START LATERAL-->
                        <div class="row">
                            <div class="lateral col-lg-6 col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="wrap_entrega col-lg-offset-2 col-lg-8 col-md-offset-0 col-md-12 col-xs-offset-0 col-xs-12">
                                        <p class="subtitulo">ENTREGA</p>
                                        <h2 class="margin-bottom-0">DÍA ESTIMADO DE ENTREGA</h2>
                                        <p class="ocre"><?php echo($_POST["estimado"]); ?></p>
                                        <input type="hidden" id="estimado" name="estimado" value="<?php echo($_POST["estimado"]); ?>">
                                        
                                        <!--<p class="ocre"><?php echo ($nuevafecha); ?></p>-->
                                        <!--<h2 class="margin-bottom-0">HORARIO DE ENTREGA</h2>
                                        <p class="ocre" id="horariofinal">9 a 20 HS</p>-->
                                        <h2 class="margin-bottom-0">BULTOS</h2>
                                        <p id="bultos" class="ocre"><?php echo($_POST["bultos2"]); ?></p>
                                        <input type="hidden" id="bultos2" name="bultos2" value="<?php echo($_POST["bultos2"]); ?>">
                                        <h2 class="margin-bottom-0">KILOS</h2>
                                        <p id="kilos" class="ocre"><?php echo($_POST["kilos2"]); ?></p>
                                        <input type="hidden" id="kilos2" name="kilos2" value="<?php echo($_POST["kilos2"]); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END LATERAL-->
                        </form>
                    </div>
                </div>
                 <!-- PAGINA CONF end-->
            </div>
            <!-- Diseniar end-->
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
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
        
        $("#cancelar").click(function() {     
                location.reload();
        });
        
        //$("#finalizar").click(function() { 
        //    $("#cargando").fadeIn();       
            //$('#detalle-pedido').submit();
        //});
        
    });

</script>
</body>
</html>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$user = $_SESSION['ESTADO'];
?>
<?php 
header("Content-Type:text/html; charset=utf-8");
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
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () { 
        var estado = 0;
        $('#continuar').click(function () {
            $('input.personalizado').each(function () {
                if($(this).is(':checked')) { 
                    estado = 1;
                }
                else {   
                }
            });
            if (estado == 1) {
                  if($('#descripcion').val()=='') { 
                        alert('Complete la descripcion de la promo.');
                        return false;
                  }
                    else { 
                        if($('#legales').val()=='') { 
                            alert('Complete los legales de la promo.');
                            return false;
                        }
                    }
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
                <p class="col-xs-12"><img src="images/titulos/solicitarbanner.png" class="img-responsive" alt="">Solicitá un banner a tu medida</p>
            </div>
            <div class="wrapper-prod-general">
                <!-- Estadisticas start-->
                <div class="wrap-container col-xs-12">
                    <br><br>
                    <div id="wrap-detalle" class="col-md-9 col-sm-12 col-xs-12">
                        <form action="solpromos_procesar.php" method="post" id="solicitar-promo" name="solicitar-promo" class="col-xs-12">
                            <p class="subtit" style="color:#666;">En esta secci&oacute;n pod&eacute;s solicitarnos que dise&ntilde;emos un banner con la informaci&oacute;n que necesites. &Eacute;ste podr&aacute; ser usado en la tapa o en la p&aacute;gina 6, seg&uacute;n prefieras. Ten&eacute; en cuenta que el dise&ntilde;o seguir&aacute; la est&eacute;tica de Web To Flyer.</p>
                            <?php if (isset($_GET["msg_error"])) { ?>
                           <p class="error"><?php echo($_GET["msg_error"])?></p>
                        <?php } ?>
                        <?php if (isset($_GET["msg_ok"])) { ?>
                            <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                        <?php } ?>
                            <div class="col-xs-12">
                                <div class="row">
                                    <p style="color:#1c1475; border-top:1px solid #1c1475; border-bottom:1px solid #1c1475; padding:8px 0;">Para solicitar un banner complet&aacute; el siguiente formulario:</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">INFORMACI&Oacute;N PARA EL BANNER</label>
                                <p style="color:#666;">Aqu&iacute; debes escribir la informaci&oacute;n que contendr&aacute; el banner. Pueden ser promociones, ofertas, servicios que ofrece tu sucursal, etc. <i><strong>Por ejemplo: JUEVES Y VIERNES 10% DE DESCUENTO EN LAVARROPAS.</strong></i></p>
                                <textarea class="form-control textareas" style="color:#1c1475!important;" rows="5" name="descripcion" id="descripcion" required></textarea>
                            </div>
                            <div class="form-group noborder">
                                <label for="legales">LEGALES</label>
                                <p style="color:#666;">Toda la informaci&oacute;n que coloques en el flyer debe contar con sus bases y condiciones. <i><strong>Por ejemplo: Promoci&oacute;n v&aacute;lida hasta el 28/12/17 o hasta agotar stock de 20 unidades. No acumulable con otras promociones.</strong></i></p>
                                <textarea class="form-control textareas" style="color:#1c1475!important;" rows="5" name="legales" id="legales" required></textarea>
                            </div>
                            <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="continuar" class="continuar" value="ENVIAR"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>
                        </form>
                    </div>
                </div>
                <!-- Estadisticas ends-->
            </div>
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
</body>
</html>
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
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />	
<link rel="stylesheet" type="text/css" href="css/bootstrap3-wysihtml5.min.css"/>
<link href='css/sweetalert.css' rel='stylesheet' type='text/css'>
<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/redes-sociales.css"/>
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
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
                        <p class="col-xs-12"><img src="images/titulos/facebook.png" class="img-responsive" alt="">Portadas para Facebook</p>
            </div>
            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start-->
                <div class="botonera-acciones col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <ul>
                        <li class="titulo-seccion">PORTADAS</li>
                    </ul>
                    <div class="lista-scroll">
                        <?php 
                           $result_portadas=mysql_query("select * from redes_portadas ORDER BY Id DESC");
                           if ($row_portadas=mysql_fetch_array($result_portadas)) {
                                do {
                                ?>
                                    <a class="portada" title="Seleccioná" href="redes/portadas/<?php echo($row_portadas['foto']); ?>" rel="<?php echo($row_portadas['Id']); ?>"><img src="redes/portadas/<?php echo($row_portadas['foto']); ?>" class="img-responsive" alt=""></a>
                                <?php
                                } while ($row_portadas=mysql_fetch_array($result_portadas)); 
                           }
                        ?>
                    </div>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Estadisticas start-->
                <div class="wrap-container col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    
                    <div class="wrap-portadas">
                        <div id="portada" class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right">
                            <div class="botones-etiquetas">
                                <p><a title="VISTA PREVIA" class="preview" href="#" data-toggle="modal" data-target="#fotoampliada">VISTA PREVIA</a></p>
                                <p><a title="DESCARGAR" class="descargar" href="#" download>DESCARGAR</a></p>
                                <p><a title="ELIMINAR" class="eliminar" href="#"></a></p>
                            </div>
                        </div>
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

<!-- Modal Foto Ampliada-->
                                        <div id="fotoampliada" class="modal fade" role="dialog" tabindex="-1">
                                          <div class="modal-dialog" style="width:100%!important; padding:0 30px;">
                                            <!-- Modal content-->
                                            <div class="modal-content" style="width:100%!important;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                              <div class="modal-body">
                                                  <img src="" alt="" style="width:100%; max-width:100%; height:auto;">
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

<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
<script src="js/redes.js"></script>
</body>
</html>
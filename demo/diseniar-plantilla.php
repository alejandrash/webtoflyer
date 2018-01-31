<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

function check_in_range($start_date, $end_date, $evaluame) { 
                                $start_ts = strtotime($start_date); 
                                $end_ts = strtotime($end_date); 
                                $user_ts = strtotime($evaluame); 
                                return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

?>
<?php 
$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");

$user = $_SESSION['ESTADO'];
$result_user=mysql_query("select * from usuarios WHERE email ='$user'");
$row_user=mysql_fetch_array($result_user);
$niveluser=$row_user['categoria'];

$today = date("Y-m-d");


$result_precios=mysql_query("select * from precios");
if ($row_precios=mysql_fetch_array($result_precios)) {
    if (check_in_range($row_precios['fecha_inicio'], $row_precios['fecha_fin'], $today)) {                                  
    }
    else { 
    }  
}

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
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
<script src="js/simpleUpload.js"></script>
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
                <p class="col-xs-12"><img src="images/titulos/diseniar.png" class="img-responsive" alt=""> DISEÑAR - Elegir formato</p>
            </div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12" id="diseniar-plantilla">
                <!-- PAGINA ENVIADO start-->
                <div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <?php
                            /** * Verifica que una fecha esté dentro del rango de fechas establecidas * @param $start_date fecha de inicio * @param $end_date fecha final * @param $evaluame fecha a comparar * @return true si esta en el rango, false si no lo está */ 
                            $enfecha = '';
                            $result_precios=mysql_query("select * from precios");
                            if ($row_precios=mysql_fetch_array($result_precios)) {
                                $today = date("Y-m-d");
                                
                                if (check_in_range($row_precios['fecha_inicio'], $row_precios['fecha_fin'], $today)) {
                                    $enfecha = 'si';                                    
                                } 
                                else {
                                        $enfecha = 'no';
                                }
                            }   
                        ?>

                        <div id="wrap-enviado" class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
                            <div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <a class="btn btn_volante" href="diseniar-volante.php" title="Click aqu&iacute; para dise&ntilde;ar un flyer">
                                        <img src="images/btn_volante.png" class="img-responsive out" alt="">
                                        <img src="images/btn_volante_over.png" class="img-responsive over" alt="">
                                    </a>
                                    <p class="margin-bottom-0"><strong class="azul">FLYER</strong></p>
                                    <p class="margin-bottom-0">Realiz&aacute; tu propio dise&ntilde;o de flyer:</p>
                                    <p class="margin-bottom-0">¡EN CUALQUIER MOMENTO DEL MES!</p>
                                    <p class="margin-bottom-0">1 FRENTE</p>
                                    <p class="margin-bottom-0">1 DORSO</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <?php 
                                        if ($enfecha == 'si') {
                                    ?>
                                    <a class="btn btn_8" href="diseniar-8-paginas.php" title="Click aqu&iacute; para dise&ntilde;ar la revista de 8 p&aacute;ginas">
                                    <?php 
                                        }
                                        else {
                                    ?>
                                    <a class="btn btn_8" data-toggle="modal" data-target="#aviso" href="#" title="La etapa de dise&ntilde;o termin&oacute; el <?php echo($row_precios['fecha_fin']);?>">
                                    <?php        
                                        }
                                    ?>
                                        <img src="images/btn_8paginas.jpg" class="img-responsive out" alt="">
                                        <img src="images/btn_8paginas_over.jpg" class="img-responsive over" alt="">
                                    </a>
                                    <p class="margin-bottom-0"><strong class="azul">REVISTA 8 P&Aacute;GINAS</strong></p>
                                    <p class="margin-bottom-0">Realiz&aacute; tu propio dise&ntilde;o de revista:</p>
                                    <p class="margin-bottom-0">1 TAPA</p>
                                    <p class="margin-bottom-0">1 CONTRATAPA</p>
                                    <p class="margin-bottom-0">6 P&Aacute;GINAS INTERNAS</p>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <?php 
                                        if ($enfecha == 'si') {
                                    ?>
                                    <a class="btn btn_8" href="diseniar-16-paginas.php" title="Click aqu&iacute; para dise&ntilde;ar la revista de 16 p&aacute;ginas">
                                    <?php 
                                        }
                                        else {
                                    ?>
                                    <a class="btn btn_8" data-toggle="modal" data-target="#aviso" href="#" title="La etapa de dise&ntilde;o termin&oacute; el <?php echo($row_precios['fecha_fin']);?>">
                                    <?php        
                                        }
                                    ?>
                                        <img src="images/btn_16paginas.jpg" class="img-responsive out" alt="">
                                        <img src="images/btn_16paginas_over.jpg" class="img-responsive over" alt="">
                                    </a>
                                    <p class="margin-bottom-0"><strong class="azul">REVISTA 16 P&Aacute;GINAS</strong></p>
                                    <p class="margin-bottom-0">Realiz&aacute; tu propio dise&ntilde;o de revista:</p>
                                    <p class="margin-bottom-0">1 TAPA</p>
                                    <p class="margin-bottom-0">1 CONTRATAPA</p>
                                    <p class="margin-bottom-0">14 P&Aacute;GINAS INTERNAS</p>
                                </div>

                                <div class="col-xs-12"></div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                
                                <?php 
                                        $claseoc8 = 'visible';
                                        $result_existep8=mysql_query("select * from predisenio where tipo='8'");
                                        if (!$row_existep8=mysql_fetch_array($result_existep8)) {
                                            if ($niveluser=='operador') {
                                                $claseoc8 = "hidden";
                                            }
                                        }
                                    ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 <?php echo($claseoc8);?>">
                                    <?php 
                                        if ($enfecha == 'si') {
                                            if ($niveluser=='operador') {
                                    ?>
                                    <a class="btn btn_8" href="predis_diseniar-8-paginas.php" title="Click aqu&iacute; para elegir el formato predise&ntilde;ado de la revista de 8 p&aacute;ginas">
                                    <?php 
                                            }
                                            else {
                                            ?>
                                            <a class="btn btn_8" data-toggle="modal" data-target="#aviso2" href="#" title="La revista predeterminada ya fue dise&ntilde;ada y no es posible modificarla durante la etapa de dise&ntilde;o.">
                                            <?php    
                                            }
                                        }
                                        else {
                                            if ($niveluser=='operador') {
                                    ?>
                                    <a class="btn btn_8" data-toggle="modal" data-target="#aviso" href="#" title="La etapa de dise&ntilde;o termin&oacute; el <?php echo($row_precios['fecha_fin']);?>">
                                    <?php 
                                            }
                                            else {
                                            ?>
                                            <a class="btn btn_8" href="aviso-prediseniar.php" title="Click aqu&iacute; para predise&ntilde;ar la revista de 8 p&aacute;ginas">
                                            <?php   
                                            }       
                                        }
                                    ?>
                                        <img src="images/btn_predis_8paginas.jpg" class="img-responsive out" alt="">
                                        <img src="images/btn_predis_8paginas_over.jpg" class="img-responsive over" alt="">
                                    </a>
                                    <p class="margin-bottom-0"><strong class="azul">REVISTA 8 P&Aacute;GINAS (PREDISE&Ntilde;ADO)</strong></p>
                                    <p class="margin-bottom-0">Esta revista fue predise&ntilde;ada por WTF.</p>
                                    <p class="margin-bottom-0">Pod&eacute;s imprimir este dise&ntilde;o o tomarlo de base y modificar lo que desees.</p>
                                </div>

                                <?php 
                                        $claseoc = 'visible';
                                        $result_existep=mysql_query("select * from predisenio where tipo='16'");
                                        if (!$row_existep=mysql_fetch_array($result_existep)) {
                                            if ($niveluser=='operador') {
                                                $claseoc = "hidden";
                                            }
                                        }
                                    ?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 <?php echo($claseoc);?>">
                                    <?php 
                                        if ($enfecha == 'si') {
                                            if ($niveluser=='operador') {
                                    ?>
                                    <a class="btn btn_8" href="predis_diseniar-16-paginas.php" title="Click aqu&iacute; para elegir el formato predise&ntilde;ado de la revista de 16 p&aacute;ginas">
                                    <?php 
                                            }
                                            else {
                                            ?>
                                            <a class="btn btn_8" data-toggle="modal" data-target="#aviso2" href="#" title="La revista predeterminada ya fue dise&ntilde;ada y no es posible modificarla durante la etapa de dise&ntilde;o.">
                                            <?php    
                                            }
                                        }
                                        else {
                                            if ($niveluser=='operador') {
                                    ?>
                                    <a class="btn btn_8" data-toggle="modal" data-target="#aviso" href="#" title="La etapa de dise&ntilde;o termin&oacute; el <?php echo($row_precios['fecha_fin']);?>">
                                    <?php 
                                            }
                                            else {
                                            ?>
                                            <a class="btn btn_8" href="aviso-prediseniar.php" title="Click aqu&iacute; para predise&ntilde;ar la revista de 16 p&aacute;ginas">
                                            <?php   
                                            }       
                                       }
                                    ?>
                                        <img src="images/btn_predis_16paginas.jpg" class="img-responsive out" alt="">
                                        <img src="images/btn_predis_16paginas_over.jpg" class="img-responsive over" alt="">
                                    </a>
                                    <p class="margin-bottom-0"><strong class="azul">REVISTA 16 P&Aacute;GINAS (PREDISE&Ntilde;ADO)</strong></p>
                                    <p class="margin-bottom-0">Esta revista fue predise&ntilde;ada por WTF.</p>
                                    <p class="margin-bottom-0">Pod&eacute;s imprimir este dise&ntilde;o o tomarlo de base y modificar lo que desees.</p>
                                </div>
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

<!-- Modal -->
<div id="aviso" class="modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
            <h5 style="color:#333; padding:15px 30px 0 30px; text-transform: uppercase;">En este momento no es posible dise&ntilde;ar tu revista, <br>ya que la etapa de dise&ntilde;o termin&oacute; el <?php echo($row_precios['fecha_fin']);?>.</h5>
            <h5 style="color:#333; padding:15px 30px;">Podr&aacute;s dise&ntilde;ar en los pr&oacute;ximos d&iacute;as... cuando se habilite la nueva etapa de dise&ntilde;o.</h5>
            <p style="color:#333; padding:15px 30px;">Gracias!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="aviso2" class="modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
            <h5 style="color:#333; padding:15px 30px 0 30px; text-transform: uppercase;">La revista predeterminada ya fue dise&ntilde;ada <br>y no es posible modificarla durante la etapa de dise&ntilde;o.</h5>
            <p style="color:#333; padding:15px 30px;">Gracias!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar">Close</button>
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
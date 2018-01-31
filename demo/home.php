<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");

if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$user = $_SESSION['ESTADO'];
$result_user=mysql_query("select * from usuarios WHERE email ='$user'");
$row_user=mysql_fetch_array($result_user);
$niveluser=$row_user['categoria'];
 


                            /** * Verifica que una fecha esté dentro del rango de fechas establecidas * @param $start_date fecha de inicio * @param $end_date fecha final * @param $evaluame fecha a comparar * @return true si esta en el rango, false si no lo está */ function check_in_range($start_date, $end_date, $evaluame) { 
                                $start_ts = strtotime($start_date); 
                                $end_ts = strtotime($end_date); 
                                $user_ts = strtotime($evaluame); 
                                return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
                            }
                            $enfecha = '';
                            $faltan = '';
                            $result_precios=mysql_query("select * from precios");
                            if ($row_precios=mysql_fetch_array($result_precios)) {
                                $today = date("Y-m-d");
                                
                                if (check_in_range($row_precios['fecha_inicio'], $row_precios['fecha_fin'], $today)) {
                                    $enfecha = 'si'; 
                                    $hoy = 1;
                                    if ($row_precios['fecha_fin'] == $today) {
                                        $hoy = 0;
                                    }
                                    $today = date("Y-m-d H:i:s");
                                    $dt1 = new DateTime($today);
                                    $dt2 = new DateTime($row_precios['fecha_fin']);
                                    $i = $dt1->diff($dt2);
                                    $faltan = $i->format('%a dias');
                                    $faltan=intval($faltan);
                                    $faltan = ($faltan + $hoy) * 24;
                                    

                                    $date = new DateTime("now", new DateTimeZone('America/Argentina/Buenos_Aires')); 

                                    date_default_timezone_set('America/Argentina/Buenos_Aires'); 

                                    $hora = date("H", $date->format('U')); 
                                    $horas = intval($hora);
                                    $horas = (24 - $horas);
                                    $faltan = $faltan + $horas;
                                    //$falta = $i->format('%a dias %h horas %i minuto(s) %s segundo(s)');
                                } 
                                else {
                                        $enfecha = 'no';
                                }
                            }   

$class='';

if ($enfecha == 'si') {
    // CONSULTA para banner tiempo.
    $result_banner=mysql_query("select flyers.usuario, flyers.terminado, usuarios.categoria from flyers INNER JOIN usuarios ON usuarios.email=flyers.usuario WHERE ( terminado='si' AND categoria='operador' AND YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW())) GROUP  BY flyers.usuario");

    $row_banner=mysql_fetch_array($result_banner);
    $num_rows = mysql_num_rows($result_banner);
}
else {
    $class="hidden";
}

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
<link href="css/style.css?" rel='stylesheet' type='text/css' />
<link href="css/home.css?" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('.acceso a').hover(
                function(){
                    $(this).children('.visible').css('display','none');
                    $(this).children('.none').css('display','block');
                    return false;
            },  function(){
                    $(this).children('.none').css('display','none');
                    $(this).children('.visible').css('display','block');
                    return false;
            });
            $('#sliderhome').carousel({
                interval: 8000 
            });
        });

    </script>
</head> 
<body class="homepage">
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
            <?php include("includes/cabecera.php"); ?>
            <!-- //header-ends -->
			<!-- home start-->
            <div class="home-accesos col-sm-offset-1 col-sm-10 col-xs-12">
                <div class="row">
                    <div class="acceso principal col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="celeste" href="diseniar-plantilla.php">
                            <div class="page one"></div>
                            <div class="page two"></div>
                            <div class="wrap">
                                <img src="images/home/diseniar-flyer.png" class="img-responsive img-centered">
                                <span>DISE&Ntilde;AR</span>
                            </div>
                        </a>
                    </div>
                    <div class="acceso principal col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="violeta" href="carga-productos.php">
                            <div class="page one"></div>
                            <div class="page two"></div>
                            <div class="wrap">
                                <img src="images/home/carga-productos.png" class="img-responsive img-centered">
                                <span>CARGAR PRODUCTOS</span>
                            </div>
                        </a>
                    </div> 
                    <div class="acceso principal col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="rosa" href="productos.php">
                            <div class="page one"></div>
                            <div class="page two"></div>
                            <div class="wrap">
                                <img src="images/home/productos.png" class="img-responsive img-centered">
                                <span>PRODUCTOS</span>
                            </div>
                        </a>
                    </div>

                    <div class="acceso principal col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <?php
                            if ($niveluser!='operador') {
                        ?>
                        <a class="azul" href="marquez-in.php">
                        <?php
                            }
                        else {
                        ?>
                        <a class="azul" href="descargar-material.php">
                        <?php   
                        }
                        ?>
                            <div class="page one"></div>
                            <div class="page two"></div>
                            <div class="wrap">
                                <img src="images/home/marquezin.png" class="img-responsive img-centered">
                                <span>INTRANET</span>
                            </div>
                        </a>
                    </div>
                    <div class="clearfix"> </div>

                    <?php
                        if ($niveluser!='operador') {
                    ?>
                    
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="promos-pie.php">
                            <img src="images/home/promos_over.png" class="img-responsive img-centered">
                            <span>BANNERS SOCIO</span>
                        </a>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        if ($niveluser=='operador') {
                    ?>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="solicitar-promos.php">
                            <img src="images/home/promos_over.png" class="img-responsive img-centered">
                            <span>SOLICITAR BANNER</span>
                        </a>
                    </div>
                    <?php
                        }

                        if ($niveluser=='operador') {
                    ?>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="lista-precios.php">
                            <img src="images/home/precios_over.png" class="img-responsive img-centered">
                            <span>PRECIOS VIGENTES</span>
                        </a>
                    </div>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="datos-financiacion.php">
                            <img src="images/home/financiacion_over.png" class="img-responsive img-centered">
                            <span>CFT y TEA</span>
                        </a>
                    </div>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="cartel-precios.php">
                            <img src="images/home/etiquetas_over.png" class="img-responsive img-centered">
                            <span>CARTEL DE PRECIOS</span>
                        </a>
                    </div>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="personalizado.php">
                            <img src="images/home/personalizado_over.png" class="img-responsive img-centered">
                            <span>DISE&Ntilde;O PERSONALIZADO</span>
                        </a>
                    </div>
                    <?php
                         }
                    ?>
                        
                    <?php
                        if ($niveluser=='superusuario') {
                    ?>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="carga-precios.php">
                            <img src="images/home/precios_over.png" class="img-responsive img-centered">
                            <span>FECHAS / PRECIOS</span>
                        </a>
                    </div>
                    <?php
                    	}
                        if ($niveluser!='operador') {
                    ?>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="datos-financiacion.php">
                            <img src="images/home/financiacion_over.png" class="img-responsive img-centered">
                            <span>CFT y TEA</span>
                        </a>
                    </div>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="cartel-precios.php">
                            <img src="images/home/etiquetas_over.png" class="img-responsive img-centered">
                            <span>CARTEL DE PRECIOS</span>
                        </a>
                    </div>
                    <?php
                         }
                    ?>

                    <!--<div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="marketing.php">
                            <img src="images/home/marketing.png" class="img-responsive img-centered visible">
                            <img src="images/home/marketing_over.png" class="img-responsive img-centered none">
                            <span>MARKETING</span>
                        </a>
                    </div>-->
                    <?php
                        if ($niveluser!='operador') {
                    ?>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="estadisticas.php">
                            <img src="images/home/estadisticas_over.png" class="img-responsive img-centered">
                            <span>ESTAD&Iacute;STICAS</span>
                        </a>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="acceso secundarios col-md-2 col-sm-4 col-xs-12">
                        <a href="buzon.php">
                            <img src="images/home/buzon.png" class="img-responsive img-centered">
                            <span>BUZÓN DE COMENTARIOS</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- home end-->
		</div>

        <div class="contenedor-bannerhome col-md-offset-1 col-sm-offset-0 col-md-10 col-sm-12 col-xs-12">
        	<div class="row">
        		<div class="bannerhome col-md-4 col-sm-12 col-xs-12 <?php echo($class);?>">
        			<div class="row">
        				<div class="col-xs-6">
        					<img src="images/home/icono_reloj.png" class="img-responsive" alt="">
        					<p>TIEMPO PARA DISEÑAR: <span><?php echo($faltan);?>hs</span></p>
        				</div>
        				<div class="col-xs-6">
        					<img src="images/home/icono_cara.png" class="img-responsive" alt="">
        					<p>SOCIOS QUE DISEÑARON: <span><?php echo($num_rows);?></span></p>
        				</div>
            		</div>
        		</div>

        		<div id="sliderhome" data-ride="carousel" class="sliderhome col-md-8 col-sm-12 col-xs-12 carousel slide pull-right" data-interval="8000">
        			<div class="row">
                        <div class="sombra"></div>
        				<a class="left carousel-control" href="#sliderhome" role="button" data-slide="prev">
						</a>
        				<div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="images/home/comentarios/1.png" class="img-responsive" alt="">
                            </div>
                            <div class="item">
                                <img src="images/home/comentarios/2.png" class="img-responsive" alt="">
                            </div>
                            <div class="item">
                                <img src="images/home/comentarios/3.png" class="img-responsive" alt="">
                            </div>
                        </div>
        			</div>
        		</div>
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
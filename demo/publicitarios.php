<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
?>
<?php 
header("Content-Type:text/html; charset=utf-8");

$datecab = date('Y-m', strtotime('+1 month')); 
$datecab = explode("-", $datecab);
$mes = $datecab[1];

?>
<!DOCTYPE HTML>
<html>
<head>
<title>WEB TO FLYER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css?" rel='stylesheet' type='text/css' />
<link href="css/wtf.css?" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<style type="text/css">
    .tapa .container-img .thumb {
    	top:3px!important;
        left:3px!important;
        width: 48px!important;
        height: 71px!important;
        bottom:auto!important;
    }
    .tapa .container-img #thumb2 {top:3px!important; left:54px!important;}
    .tapa .container-img #thumb3 {top:3px!important; top:77px!important;}
    .tapa .container-img #thumb4 {left:54px!important; top:77px!important;}
</style>	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    	$("label.tapa img").each(function() {
            if ($(this).attr('src')=='flyer/banners/?') {
            	$(this).hide();
            }
        });

        $("input[name='selector-pagina']").change(function() {
        	$('.selector-pagina').removeClass('active');
            $(this).parent('label').addClass('active');
            var state = $(this).parent('label').children('input').prop("checked");
            if ($(this).attr('id')=='tapa') {
            	window.location.href = "publicitarios_tapa.php";
            }
            else {
	            if (state==true) {
	            	$('#form-paso1').submit();
	        	}
        	}
        });
        $(".container-img").click(function() {
        	$('.selector-pagina').removeClass('active');
            $(this).parent('label').addClass('active');
            var state = $(this).parent('label').children('input').prop("checked");
            if (state==true) {
            	$(this).parent('label').children('input').prop("checked", false);
        	}
        	else {
        		if ($(this).parent().children('input').attr('id')=='tapa') {
	            	window.location.href = "publicitarios_tapa.php";
	            }
	            else {
        			$(this).parent('label').children('input').prop("checked", true);
        			$('#form-paso1').submit();
        		}
        	}
        });
        var numPagina ='';
        $('#form-paso1').on('click', '.selector-pagina .close', function() { 
        	numPagina = $(this).attr('href');
        	var relPagina = $(this).attr('rel');
        	var pruebo = $(this).parent().children('.container-img');
        	$.ajax({
                type: "POST",
                dataType: "html",
                url: "eliminar_avisos.php",
                data: {
                    numPagina: numPagina,
                },
                 success: function(data){
                 	$(pruebo).remove();
                    alert("Se eliminaron todos los avisos publicitarios de la "+relPagina);
                	return false;
                }
            });
            $(this).hide();
            return false;
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
            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start-->
                <div class="botonera-acciones col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <ul>
                        <li class="active"><a href="publicitarios.php">PASO 1 - P&Aacute;GINAS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-container col-lg-10 col-md-9 col-sm-9 col-xs-12">
                        <div class="publicitarios-form col-xs-12">
                            <div class="row">
                            	<?php
		                            /** * Verifica que una fecha esté dentro del rango de fechas establecidas * @param $start_date fecha de inicio * @param $end_date fecha final * @param $evaluame fecha a comparar * @return true si esta en el rango, false si no lo está */ function check_in_range($start_date, $end_date, $evaluame) { 
		                                $start_ts = strtotime($start_date); 
		                                $end_ts = strtotime($end_date); 
		                                $user_ts = strtotime($evaluame); 
		                                return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
		                            }
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


		                            if ($enfecha=='no') { 
		                        ?>
                                	<div class="col-xs-12">
                                    <h1 class="titulo-pico">PASO 1 - Elegir p&aacute;gina</h1>
                                    <?php if (isset($_GET["msg_error"])) { ?>
		                               <p class="pdleft error"><?php echo($_GET["msg_error"])?></p>
		                            <?php } ?>
		                            <?php if (isset($_GET["msg_ok"])) { ?>
		                                <p class="pdleft ok"><?php echo($_GET["msg_ok"])?></p>
		                            <?php } ?>
                                    <form id="form-paso1" action="publicitarios_2.php" method="post">
                                        <p class="pdleft negro">Seleccion&aacute; la p&aacute;gina en la que desees cargar avisos publicitarios. Tambi&eacute;n pod&eacute;s editar los avisos que hayas cargado anteriormente.</p>
                                        <p class="pdleft negro">Clickeá sobre la cruz (X) para eliminar los avisos publicitarios de cada página.</p>
                                        <div class="margin-top-80 text-center">
                                        	<label class="selector-pagina tapa">
	                                        	<span>TAPA</span>
	                                            <input type="radio" name="selector-pagina" id="tapa" value="tapa" required>
		                                       <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='tapa' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Tapa" href="tapa" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                          
	                                        </label>
	                                        <label class="selector-pagina">
	                                        	<span>P&Aacute;GINA 2</span>
	                                            <input type="radio" name="selector-pagina" id="pag2" value="pag2" required>
		                                       <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='pag2' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Página 2" href="pag2" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                          
	                                        </label>
	                                        <label class="selector-pagina">
	                                        	<span>P&Aacute;GINA 3</span>
	                                            <input type="radio" name="selector-pagina" id="pag3" value="pag3">
	                                            <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='pag3' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Página 3" href="pag3" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                          
	                                        </label>  
	                                        <label class="selector-pagina">
	                                        	<span>P&Aacute;GINA 4</span>
	                                            <input type="radio" name="selector-pagina" id="pag4" value="pag4">
	                                            <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='pag4' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Página 4" href="pag4" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                              
	                                        </label>
	                                        <label class="selector-pagina">
	                                        	<span>P&Aacute;GINA 5</span>
	                                            <input type="radio" name="selector-pagina" id="pag5" value="pag5">
	                                            <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='pag5' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Página 5" href="pag5" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                           
	                                        </label>
	                                        <label class="selector-pagina selector-pag6">
	                                        	<span>P&Aacute;GINA 6</span>
	                                            <input type="radio" name="selector-pagina" id="pag6" value="pag6">
	                                            <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='pag6' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Página 6" href="pag6" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                          
	                                        </label>
	                                        <label class="selector-pagina selector-pag7">
	                                        	<span>P&Aacute;GINA 7</span>
	                                            <input type="radio" name="selector-pagina" id="pag7" value="pag7">
	                                            <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='pag7' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Página 7" href="pag7" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                           
	                                        </label>
	                                        <label class="selector-pagina selector-ctapa">
	                                        	<span>CONTRATAPA</span>
	                                            <input type="radio" name="selector-pagina" id="contratapa" value="contratapa">
	                                            <?php 
		                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='contratapa' AND mes='$mes'");
		                                       	if($row_pag=mysql_fetch_array($result_pag)){
		                                       		$existe = $row_pag['plantilla'];
		                                       		echo($existe);
		                                       		echo('<a class="close" rel="Contratapa" href="contratapa" title="Click para eliminar los avisos publicitarios de esta página"><div class="overlay"></div>x</a>');
		                                       	}
		                                       ?>                                            
	                                        </label>
	                                        <!--<div class="pdleft col-xs-12"><input class="btn btn-default" type="submit" value="SIGUIENTE PASO"> </div>-->
                                        </div>
                                    </form>                              
                                	</div>
                                <?php
                            		}
                            		if ($enfecha=='si') {
                            	?>
                            	<div class="col-xs-12">
                                    <h1 class="titulo-pico">PASO 1 - Elegir p&aacute;gina</h1>
                                    <div class="col-xs-12 text-center negro" style="padding:50px 15px;">
                                    	<p>En este momento no es posible cargar avisos publicitarios <br>ya que la etapa de diseño está activa y pueden haber socios diseñando.</p>
                                    	<p>Los avisos publicitarios se cargan <br>antes de crear la revista prediseñada <br>y fuera de la etapa de diseño.</p>
                                    </div>
                                </div>
                            	<?php		
                            		}
                                ?>
                            </div>
                        </div>
                </div>
                <!-- Central end-->
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
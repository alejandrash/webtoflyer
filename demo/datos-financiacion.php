<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

if (!isset($niveluser)) {
    $user = $_SESSION['ESTADO'];
    $result_user=mysql_query("select * from usuarios WHERE email ='$user'");
    $row_user=mysql_fetch_array($result_user);
    $niveluser=$row_user['categoria'];
}
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
<link href="css/style.css?" rel='stylesheet' type='text/css' />
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
        $("input[name='opcion-tarjetas']").change(function() {
            var tarjetaVal = $(this).val();
            $("#bloque_datos, #bloque_cuotas").css('display','none');
            if (tarjetaVal != '') {
                    $.ajax({
                            type: "POST",
                            dataType: "html",
                            url: "buscar_bancos.php",
                            data: {
                                tarjeta: tarjetaVal,
                            },
                            success: function(data){
                                $('#listado-bancos').html(data);
                                $('#bloque_bancos').fadeIn();
                                return false;
                                
                            },
                            error: function( xhr, status ) {
                                 return false;
                            }
                    });
            }
            else {
                return false;
            }
        });
        
        $('#listado-bancos').on('change', "input[name='opcion-bancos']", function() { 
            var tarjetaVal = $("input[name='opcion-tarjetas']:checked").val();
            var bancoVal = $(this).val();
            $("#bloque_datos").css('display','none');
            if ((tarjetaVal != '') && (bancoVal != '')) {
                    $.ajax({
                            type: "POST",
                            dataType: "html",
                            url: "buscar_cuotas.php",
                            data: {
                                tarjeta: tarjetaVal,
                                banco: bancoVal
                            },
                            success: function(data){
                                $('#cantidad_cuotas').html(data);
                                $('#bloque_cuotas').fadeIn();
                                return false;
                                
                            },
                            error: function( xhr, status ) {
                                 return false;
                            }
                    });
            }
            else {
                return false;
            }
        });
        
        $("#cantidad_cuotas").change(function() {
            var tarjetaVal = $("input[name='opcion-tarjetas']:checked").val();
            var bancoVal = $("input[name='opcion-bancos']:checked").val();
            var cuotasVal = $(this).val();
            if ((tarjetaVal != '') && (bancoVal != '')) {
                    $.ajax({
                            type: "POST",
                            dataType: "html",
                            url: "buscar_financiacion.php",
                            data: {
                                tarjeta: tarjetaVal,
                                banco: bancoVal,
                                cantidad_cuotas: cuotasVal
                            },
                            success: function(data){
                                $('#datacontainer').html(data);
                                var partes = $('#datacontainer').text().split("+");
                                var tea = partes[0];
                                var cft = partes[1];
                                var coef = partes[2];
                                $("#tea").val("TEA: "+tea+"%");
                                $("#cft").val("CFT: "+cft+"%");
                                //$("#coef").val(coef);
                                $("#bloque_datos").fadeIn();
                                return false;
                                
                            },
                            error: function( xhr, status ) {
                                 return false;
                            }
                    });
            }
            else {
                return false;
            }
        });
    });
</script>
</head> 
<body>
    <div id="datacontainer" style="display:none;"></div>
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
                        <li class="active"><a href="datos-financiacion.php">CONSULTAR CFT y TEA</a></li>
                        <?php 
                            if ($niveluser!='operador') {
                        ?>
                        <li><a href="actualizar-datos-financiacion.php">ACTUALIZAR DATOS</a></li>
                        <?php 
                           }
                        ?>
                        <li><a href="credito-personal.php">CR&Eacute;DITO PERSONAL</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-container col-lg-10 col-md-9 col-sm-9 col-xs-12">
                        <div id="wrap-financiacion" class="col-xs-12">
                            <div class="row">
                                <h1 class="cursiva">Consultar CFT y TEA</h1>
                                <div class="col-xs-12">
                                    <h2 class="titulo-pico">Tarjetas</h2>
                                    <form id="form-tarjetas" action="" method="post">
                                        <p class="pdleft negro">Seleccion&aacute; una tarjeta:</p>
                                        <ul class="listado-tarjetas">
                                            <?php
                                                 $result_tarjetas=mysql_query("select tarjetas.Id AS id_tarj, tarjetas.nombre, tarjetas.logo from tarjetas, datos_financiacion WHERE tarjetas.Id = datos_financiacion.id_tarjeta GROUP BY nombre ORDER BY nombre ASC");
                                                if ($row_tarjetas=mysql_fetch_array($result_tarjetas)) {
                                                    do {
                                            ?>
                                            <li>
                                                <label>
                                                    <input type="radio" name="opcion-tarjetas" value="<?php echo($row_tarjetas['id_tarj']); ?>">
                                                    <img src="images/<?php echo($row_tarjetas['logo']); ?>" alt="<?php echo($row_tarjetas['nombre']); ?>">
                                                    <span><?php echo($row_tarjetas['nombre']); ?></span>
                                                </label>
                                            </li>
                                            <?php
                                                    } while ($row_tarjetas=mysql_fetch_array($result_tarjetas));	
                                                }
                                            ?>
                                            
                                        </ul>
                                    <div id="bloque_bancos" style="display:none;">
                                            <h2 class="titulo-pico">Bancos disponibles para la tarjeta seleccionada</h2>
                                            <p class="pdleft negro">Seleccion&aacute; un banco:</p>
                                            <ul id="listado-bancos" class="listado-tarjetas">
                                            </ul>
                                    </div>
                                    <div id="bloque_cuotas" style="display:none;">
                                        <h2 class="titulo-pico">Cuotas</h2>
                                            <div class="pdleft col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                                        <select  class="form-control" id="cantidad_cuotas" name="cantidad_cuotas">
                                                            <option value="">Seleccion&aacute; la cantidad de Cuotas</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="18">18</option>
                                                            <option value="24">24</option>
                                                            <option value="50">50</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                    <div id="bloque_datos" style="display:none;">
                                        <h2 class="titulo-pico">CFT y TEA</h2>
                                        <div class="pdleft col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group text-center"> 
                                                        <input class="form-control big" type="text" name="tea" id="tea" value="" disabled>
                                                        <label for="tea">Tasa Efectiva Anual</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group text-center"> 
                                                        <input class="form-control big" type="text" name="cft" id="cft" value="" disabled>
                                                        <label for="cft">Costo Financiero Total</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
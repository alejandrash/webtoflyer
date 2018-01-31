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
if ($niveluser != 'superusuario') {
    header("Location:home.php");
}
?>
<?php 
header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE HTML>
<html>
<head>
<title> WEB TO FLYER</title>
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
<link rel="stylesheet" href="css/datatables.min.css" type='text/css' />	
<link href='css/datepicker.css' rel='stylesheet' type='text/css'>
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/datepicker.js"></script>
<script type="text/javascript">
    function Onlynumbers(e)
    {
        var tecla=new Number();
        if(window.event) {
            tecla = e.keyCode;
        }
        else if(e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if (tecla > 31 && (tecla < 48 || tecla > 57)) {
            return false;
        }
    }
    
    function Onlyprices(e)
    {
        var tecla=new Number();
        if(window.event) {
            tecla = e.keyCode;
        }
        else if(e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if (tecla > 31 && (tecla < 46 || tecla > 57)) {
            return false;
        }
    }
    
    function Onlyletters(e)
    {
        var tecla=new Number();
        if(window.event) {
            tecla = e.keyCode;
        }
        else if(e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if (((tecla  != 32) && (tecla < 65)) || ((tecla > 90) && (tecla < 97)) || (tecla > 122)) {
            return false;
        }
    }
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
                <div class="botonera-acciones col-lg-2 col-md-12 col-xs-12">
                    <ul>
                        <li class="active"><a href="#tituloFechas">MODIFICAR FECHAS</a></li>
                        <li><a href="tabla-precios.php">VER PRECIOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1>FECHAS DE DISE&Ntilde;O</h1>
                    </div>
                    <!-- Titular end-->
                    
                    <!-- Form start-->
                    
                    <div class="content-form col-xs-12">
                        <!-- OCULTO INSERTAR NUEVOS PRECIOS
                        <div class="col-sm-12" style="margin-bottom:50px;">
                            <?php if (isset($_GET["msg_error"])) { ?>
                               <p class="error"><?php echo($_GET["msg_error"])?></p>
                            <?php } ?>
                            <?php if (isset($_GET["msg_ok"])) { ?>
                                <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                            <?php } ?> 
                            <form class="form-inline" action="insertarprecio_procesar.php" method="post" id="insertarprecio" name="insertarprecio" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label for="cantidad">CANT. DE D&Iacute;PTICOS EN N&Uacute;MEROS</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Por ejemplo: 5000" onkeypress="return Onlynumbers(event)" required>
                                </div>
                                <div class="form-group">
                                    <label for="letras">CANT. DE D&Iacute;PTICOS EN LETRAS</label>
                                    <input type="text" class="form-control" id="letras" name="letras" placeholder="Por ejemplo: Cinco mil" onkeypress="return Onlyletters(event)" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="precio">PRECIO UNITARIO EN $ (Pesos) + IVA</label>
                                        <input type="text" class="form-control" id="precio" name="precio" placeholder="0.00" value="0.00" onkeypress="return Onlyprices(event)" step=",01" required>
                                    </div>
                                </div>
                                <div class="col-xs-12"><br></div>
                                <input class="btn btn-default pull-right" type="submit" value="INSERTAR">
                            </form>
                        </div>
                        -->   
                        <?php 
                            
                            /** * Verifica que una fecha esté dentro del rango de fechas establecidas * @param $start_date fecha de inicio * @param $end_date fecha final * @param $evaluame fecha a comparar * @return true si esta en el rango, false si no lo está */ function check_in_range($start_date, $end_date, $evaluame) { $start_ts = strtotime($start_date); $end_ts = strtotime($end_date); $user_ts = strtotime($evaluame); return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
                            }

                            $result_pr=mysql_query("select * from precios ORDER BY costo_unitario ASC");
                            if ($row_pr=mysql_fetch_array($result_pr))
                            {
                                $today = date("Y-m-d");
                                
                                if (check_in_range($row_pr['fecha_inicio'], $row_pr['fecha_fin'], $today)) {
                                    // EN FECHA
                                } else {
                                    // FUERA
                                }
                        ?>
                        <div id="tituloFechas" class="col-xs-12">
                            <br><br>
                            <h4>Los socios comienzan a dise&ntilde;ar el d&iacute;a: <?php echo $row_pr['fecha_inicio']?></h4>
                            <h4>Los socios terminan de dise&ntilde;ar el d&iacute;a: <?php echo $row_pr['fecha_fin']?></h4>
                        </div>
                        <div class="col-xs-12">
                            <br><br>
                            <h2 style="text-align:center; margin:0 0 30px 0; font-size:22px;">Modific&aacute; las fechas de Dise&ntilde;o de este mes:</h2>
                            <form class="form-inline" action="fechasdisenio_procesar.php" method="post" id="fechasdis" name="fechasdis" accept-charset="UTF-8">
                                <div class="form-group col-sm-12">
                                    <div class="row">
                                        <label for="dpd1" style="width:100%!important; padding-right:0; text-align:left;">SELECCION&Aacute; EL D&Iacute;A QUE <ins>COMIENZAN</ins> A DISE&Ntilde;AR</label>
                                        <input type="text" class="form-control" style="width:100%;" value="" name="dpd1" id="dpd1" placeholder="COMIENZAN A DISE&Ntilde;AR..." required> 
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="row">
                                        <label for="dpd2" style="width:100%!important; padding-right:0; text-align:left;">SELECCION&Aacute; EL D&Iacute;A QUE <ins>TERMINAN</ins> A DISE&Ntilde;AR</label>
                                        <input class="form-control" style="width:100%;" type="text" value="" name="dpd2" id="dpd2" placeholder="TERMINAN A DISE&Ntilde;AR..." required>
                                    </div>
                                </div>
                                <div class="col-xs-12"><br></div>
                                <input class="btn btn-default pull-right" type="submit" value="MODIFICAR FECHAS">
                            </form>
                            <br><br>
                        </div>
                        
                        <?php
                            }
                        ?>
                    </div>
                    <!-- Form end-->
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
<script type="text/javascript">
    function confirmDel() {
          var agree=confirm("¿Realmente quiere eliminar este/os precio/s? ");
          if (agree) {
              document.forms['administrarpromo'].submit();
          }
          return false;
    }
    $(document).ready(function () {  
        /*START Datepicker */
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var checkin = $('#dpd1').datepicker({
                format: 'yyyy/mm/dd',
              onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
              }
            }).on('changeDate', function(ev) {
              if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
              }
              checkin.hide();
              $('#dpd2')[0].focus();
            }).data('datepicker');
            var checkout = $('#dpd2').datepicker({
                format: 'yyyy/mm/dd',
              onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
              }
            }).on('changeDate', function(ev) {
              checkout.hide();
            }).data('datepicker');
            /*END Datepicker */
    });

</script>
</body>
</html>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$user = $_SESSION['ESTADO'];
$result_user=mysql_query("select * from usuarios WHERE usuario ='$user'");
$row_user=mysql_fetch_array($result_user);
$niveluser=$row_user['categoria'];

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
            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start
                <div class="botonera-acciones col-lg-2 col-md-12 col-xs-12 hidden">
                    <ul>
                        <li class="active"><a href="marketing.php">EMAIL MARKETING</a></li>
                        <li><a href="#">FACEBOOK</a></li>
                        <li><a href="#">WHATSAPP</a></li>
                    </ul>
                </div>-->
                <!-- Botonera Acciones ends-->
                <!-- Estadisticas start-->
                <div class="wrap-container col-lg-12 col-md-12 col-xs-12">
                    <div class="lateral col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-right">
                        <div class="row">
                            <p class="titulo" style="margin-bottom:0;"><img src="images/marketing.png" class="img-responsive" alt="marketing"></p>
                        </div>
                    </div>
                    <div id="wrap-detalle" class="col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-7 col-sm-offset-0 col-sm-8 col-xs-offset-0 col-xs-12">
                        <h1 style="font-size:38px;">EMAIL MARKETING</h1>
                        <form enctype="multipart/form-data" action="marketing_procesar.php" method="post" id="form-marketing" name="form-marketing" class="col-xs-12">
                            <input type="hidden" id="newsletter" name="newsletter" value=""> 
                            <?php if (isset($_GET["msg_error"])) { ?>
                            <p class="error"><?php echo($_GET["msg_error"])?><br><br></p>
                            <?php } ?>
                            <?php if (isset($_GET["msg_ok"])) { ?>
                                <p class="ok"><?php echo($_GET["msg_ok"])?><br><br></p>
                            <?php } ?>
                            <p class="subtit"><strong>El mailing se compone de la tapa y la contratapa del &uacute;ltimo flyer que dise&ntilde;aste.</strong></p>
                            <div class="form-group">
                                <br>
                                <p class="subtit" style="margin:0!important;">Carg&aacute; un Excel con los mails de tus contactos:</p>
                                <input class="form-control" type="file" id="excel_dir" name="excel_dir" value="" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                <br>
                            </div>
                            
                            <div class="form-group noborder">
                                <label for="comentarios">COMENTARIOS</label>
                                <textarea class="form-control" style="color:#666!important;" rows="5" name="comentarios" id="comentarios"></textarea>
                            </div>
                            <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="continuar" class="continuar" value="ENVIAR"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>
                            <div class="col-sm-6 col-xs-12 text-right"><div class="row"><a title="VISTA PREVIA" class="preview pull-right" style="margin:0!important;" href="#" data-toggle="modal" data-target="#preview"><i class="fa fa-eye" aria-hidden="true"></i> VISTA PREVIA</a></div></div>
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

<?php
       
$i = 4;
$url='';
$url1='';
$url2='';
       
$result_flyer=mysql_query("select * from flyers WHERE usuario ='$user' AND terminado='si' AND cara='tapa' ORDER BY Id DESC LIMIT 1");
$row_flyer=mysql_fetch_array($result_flyer); 
$url1 = "http://webtoflyer.com/".$row_flyer["url"];

$result_flyer2=mysql_query("select * from flyers WHERE usuario ='$user' AND terminado='si' AND cara='contratapa' ORDER BY Id DESC LIMIT 1"); 

$row_flyer2=mysql_fetch_array($result_flyer2);
       
if($row_flyer2["url"]!='') {
    $url2 = "http://webtoflyer.com/".$row_flyer2["url"];

    $file1 = "uri=".$url1."&b_width=800&width=796&height=1118&delay=2000&format=jpg&maxage=86400";
    $file2 = "uri=".$url2."&b_width=800&width=796&height=1118&delay=2000&format=jpg&maxage=86400";
    $api_key = "fdJAIgr560-nXJBMVv89Zg";
    $api_secret = "hola";

    $hashed1 = md5($file1 . $api_secret);
    $hashed2 = md5($file2 . $api_secret);

    $file1 = "$file1&key=$api_key&hash=$hashed1";
    $file2 = "$file2&key=$api_key&hash=$hashed2";

    $urlcli1 = "https://api.pagelr.com/capture/javascript?".$file1;
    $urlcli2 = "https://api.pagelr.com/capture/javascript?".$file2;  
}
else { ?>
       <script type="text/javascript">
            $(document).ready(function () {
                $('<p class="error">Para realizar un pedido de email marketing deb&eacute;s dise&ntilde;ar un flyer previamente.<br>&iexcl;Todav&iacute;a no dise&ntilde;aste tu flyer!<br>Ingres&aacute; <a style="font-weight:bold; color:#1c1475;" href="diseniar-flyer.php">ac&aacute;</a> y segu&iacute; los pasos... &iexcl;Es muy simple!</p>').insertAfter( "#wrap-detalle h1" );
                $('#wrap-detalle form').css('display','none');
            });
       </script>
<?php 
}
?>
<!-- Modal -->
<div id="preview" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div id="encabezado-pred"><table cellpadding='0' cellspacing='0' width="800" bgcolor="#FFFFFF" style="background:#FFF;"><tr><td><img style="float:left;" src="http://www.webtoflyer.com/images/mailing/genericas/01.jpg" width="794" height="180" alt=""></td></tr></table></div>
          <table width="800" cellpadding='0' cellspacing='0'><tr><td><img id="news1" style="float:left;" src="<?php echo($urlcli1); ?>" width="800" height="1120" alt=""></td></tr><tr><td><img id="news2" style="float:left;" src="<?php echo($urlcli2); ?>" width="800" height="1120" alt=""></td></tr></table>
          <table cellpadding='0' cellspacing='0' width="800" bgcolor="#FFFFFF" style="background:#FFF;"><tr><td><img style="float:left;" src="http://www.webtoflyer.com/images/mailing/genericas/05.jpg" width="794" height="68" alt=""></td></tr></table>
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
    $(document).ready(function () {
        $('#continuar').click(function(){           
            var newsletter = $('.modal-body').html();
            $('#newsletter').val(newsletter);
        });
    });
    

</script>
</body>
</html>
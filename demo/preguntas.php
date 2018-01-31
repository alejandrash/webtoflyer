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
        $('.wrap-tutoriales li a').click(function() {
            var video = $(this).attr('href');
            $('.wrap-video').css('display','none');
            $(video).fadeIn();
            $('.wrap-tutoriales li a').removeClass('active');
            $(this).addClass('active');
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
            <div class="col-xs-12 titulogris">
                        <p class="col-xs-12"><img src="images/titulos/tutoriales.png" class="img-responsive" alt="">Tutoriales</p>
            </div>
            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start-->
                <div class="botonera-acciones col-lg-2 col-md-12 col-xs-12">
                    <ul>
                        <li><a href="tutoriales.php">PREGUNTAS FRECUENTES</a></li>
                        <li class="active"><a href="preguntas.php">TUTORIALES</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-container col-lg-10 col-md-12 col-xs-12" style="padding-top:0;">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="wrap-tutoriales">
                                    <div id="tuto1" class="wrap-video">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/kt-TY71lUFg?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                        <h2>&iquest;C&oacute;mo sacar una foto a un producto?</h2>
                                    </div>
                                    <div id="tuto2" class="wrap-video" style="display:none;">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/KfL74AamxBs?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                        <h2>&iquest;C&oacute;mo pag&aacute;s?</h2>
                                    </div>
                                    <div id="tuto3" class="wrap-video" style="display:none;">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/x4f6lsozht0?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                        <h2>Carga de producto</h2>
                                    </div>
                                    <div id="tuto4" class="wrap-video" style="display:none;">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/kt-TY71lUFg?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                        <h2>&iquest;C&oacute;mo sacar una foto a un producto?</h2>
                                    </div>
                                    <ul>
                                        <li><a href="#tuto4"><img src="images/tuto_4.jpg" class="img-responsive" alt=""> <span>&iquest;C&oacute;mo sacar una foto a un producto?</span></a></li>
                                    </ul>
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
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
<title>WEB TO FLYER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="robots" content="noindex,nofollow">
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
        $("#catusuario").change(function() { 
            var valor = $(this).val();
            if (valor != 'operador') {
                $('#para-sucursal').css('display', 'none');
                $('#para-idgsocios').fadeIn();
                $("#sucursal").attr("required", false);
                $("#nombre").attr("required", true);
            }
            if (valor == 'operador') {
                $('#para-sucursal').fadeIn();
                $('#para-idgsocios').css('display', 'none');
                $("#sucursal").attr("required", true);
                $("#nombre").attr("required", false);
            }
            return false;       
        });
        
        $("#clave2").change(function() { 
            var clave1 = $("#clave").val();
            var clave2 = $(this).val();
            if(clave1 != clave2) {
                alert("Las contraseñas deben coincidir.");
                $("#clave2").focus();
            }     
        });
        
        
    });
</script>
</head> 
<body id="login" class="interna">
    <div class="forms col-lg-offset-4 col-lg-4 col-md-offset-2 col-md-8 col-xs-12">
        <div class="header col-xs-12 text-center">
            <a href="index.php" title="Ii a Login"><img src="images/logo_marquez.png" class="img-responsive img-centered" alt=""></a>
        </div>
        <?php include("includes/conexion.php"); ?>
        <?php 
              if (isset($_SESSION['ESTADO'])) {
                  header("Location:home.php");
              }
        $id = $_GET['Id'];
        ?>
        <h1 class="blancobold">&iexcl;Ya est&aacute;s registrado y listo para dise&ntilde;ar tu primer flyer!</h1>
        <form class="form-horizontal col-xs-12" action="intro.php" method="post" autocomplete="off">
            <input type="hidden" name="id" id="id" value="<?php echo($id); ?>">
             <div class="form-group text-center">
                <button class="btn btn-default" type="submit" name="btn_login" id="btn_login">Continuar</button>
             </div>
        </form>        
    </div>
    <!--<div class="wrap-iconos col-lg-offset-3 col-lg-6 col-md-offset-1 col-md-10 col-xs-12">
        <h2 class="blancobold text-center">Te informamos que ingresando a la secci&oacute;n de Marketing podr&aacute;s acceder a todos estos beneficios:</h2>
        <div class="col-sm-4 col-xs-12">
            <div class="row">
            <div class="col-xs-5"><img src="images/ico_facebook.png" class="img-responsive" alt=""></div>
            <div class="col-xs-7"><div class="row">Carg&aacute; los datos de tus Redes Sociales.<br>Tu publicaci&oacute;n saldr&aacute; autom&aacute;ticamente.</div></div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="row">
            <div class="col-xs-5"><img src="images/ico_xls.png" class="img-responsive" alt=""></div>
            <div class="col-xs-7"><div class="row">Carg&aacute; un Excel con tus contactos.<br>Web To Flyer les enviar&aacute; una publicaci&oacute;n.</div></div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="row">
            <div class="col-xs-5"><img src="images/ico_wtp.png" class="img-responsive" alt=""></div>
            <div class="col-xs-7"><div class="row">Registrate para recibir avisos del Grupo en tu celular.</div></div>
            </div>
        </div>
    </div>-->

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
    
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
</body>
</html>
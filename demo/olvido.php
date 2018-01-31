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
</head> 
<body id="login" class="interna">
    <div class="forms col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="header col-xs-12 text-center">
            <a href="index.php" title="Ii a Login"><img src="images/logo_marquez.png" class="img-responsive img-centered" alt=""></a>
        </div>
        <?php include("includes/conexion.php"); ?>
        <?php 
              if (isset($_SESSION['ESTADO'])) {
                  header("Location:home.php");
              }
        ?>
        <h1>RECUPERAR CONTRASE&Ntilde;A</h1>
        <p>Ingrese su e-mail para recuperar su contrase&ntilde;a.</p>
        <?php if (isset($_GET["msg_error"])) { ?>
           <p class="error"><?php echo($_GET["msg_error"])?></p>
        <?php } ?>
        <?php if (isset($_GET["msg_ok"])) { ?>
            <p class="ok"><?php echo($_GET["msg_ok"])?></p>
        <?php } ?>
        <form class="form-horizontal" action="olvido_procesar.php" method="post" autocomplete="off">
								<div class="form-group">
											<div class="col-xs-12">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-user" style="font-size:17px;"></i>
													</span>
													<input type="email" name="email" id="email" style="text-transform: lowercase;" class="form-control1" placeholder="E-mail" required>
												</div>
											</div>
								</div>
                                <div class="form-group">
                                            <div class="col-sm-6 col-xs-12">
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <button class="btn btn-default pull-right" type="submit" name="btn_login" id="btn_login">Recuperar</button>
                                            </div>
                                </div>
                                <ul class="col-xs-12 login_acciones">
                                    <li class="col-sm-6 col-xs-12"><a href="registro.php"><i class="fa fa-user-plus"></i> Registrar Nuevo Usuario</a></li>
                                    <li class="col-sm-6 col-xs-12 text-right"><a href="index.php">Login</a></li>
                                </ul>
            </form>
    </div>
    
    <div id="idgpie" class="col-sm-offset-3 col-sm-6 col-xs-12 text-center">
            <img src="images/idg.png" class="img-responsive" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
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
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
</body>
</html>
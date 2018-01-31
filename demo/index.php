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
<link href="css/wtf.css" rel="stylesheet" type='text/css'> 
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="manifest.json">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93691845-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
  $(document).ready(function () {
            $(".open-video").click(function() { 
                $('#video iframe').attr('src', 'https://www.youtube.com/embed/NfWedbGgJwA?rel=0&autoplay=1&amp;showinfo=0');
            });

 
            $("#video .close").click(function() { 
                $('#video iframe').attr('src', '');
            });
  });
</script>
</head> 
<body id="login">
    <div class="forms col-sm-offset-4 col-sm-4 col-xs-12">
        <div class="header col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 text-center">
            <img style="margin-bottom: 0; max-width:100%;" src="images/logo_marquez.png" class="img-responsive img-centered" alt="">
        </div>
        <div class="col-xs-12 text-center">
            <a target="_blank" href="video.php"><img style="margin-bottom: 25px;" src="images/btn_que-es.png" class="img-responsive img-centered" alt=""></a>
        </div>
        <?php include("includes/conexion.php"); ?>
        <?php 
              session_set_cookie_params(21600,"/");
              session_start();
                session_destroy();
        ?>
        <?php if (isset($_GET["msg_error"])) { ?>
           <p class="error"><?php echo($_GET["msg_error"])?></p>
        <?php } ?>
        <?php if (isset($_GET["msg_ok"])) {?>
            <p class="ok"><?php echo($_GET["msg_ok"])?></p>
        <?php } ?>
        <form class="form-horizontal" action="check_login.php" method="post" autocomplete="off">
								<div class="form-group">
											<div class="col-xs-12">
												<div class="input-group">							
													<span class="input-group-addon">
														<i class="fa fa-user" style="font-size:17px;"></i>
													</span>
													<input type="text" name="usuario" id="usuario" style="text-transform: lowercase;" class="form-control1" placeholder="E-mail de acceso" required>
												</div>
											</div>
								</div>
								<div class="form-group">
											<div class="col-xs-12">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-key"></i>
													</span>
													<input type="password" name="clave" id="clave" class="form-control1" id="exampleInputPassword1" placeholder="Contrase&ntilde;a" required>
												</div>
											</div>
								</div>
                                <div class="form-group">
                                            <div class="col-sm-6 col-xs-12">
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <button class="btn btn-default pull-right" type="submit" name="btn_login" id="btn_login"><strong>¡Comenzá a diseñar!</strong></button>
                                            </div>
                                </div>
                                <ul class="col-xs-12 login_acciones">
                                    <li class="col-sm-6 col-xs-12"><a href="registro.php"><i class="fa fa-user-plus"></i> Registrar Nuevo Usuario</a></li>
                                    <li class="col-sm-6 col-xs-12 text-right"><a href="olvido.php">&iquest;Olvid&oacute; su contrase&ntilde;a?</a></li>
                                </ul>
            </form>
    </div>
    <div class="col-sm-offset-4 col-sm-4 col-xs-12 text-center consejo">
      <img src="images/consejo.png" class="img-responsive img-centered" alt="">
    </div>
    <div id="idgpie" class="col-sm-offset-3 col-sm-6 col-xs-12 text-center">
            <img src="images/idg.png" class="img-responsive" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
    </div>

<!-- Modal -->
<div id="video" class="modal" role="dialog">
  <div class="modal-dialog" style="height:calc(100% - 60px)!important; width:100%!important;">
    <!-- Modal content-->
    <div class="modal-content" style="height:100%; max-height: 100%!important; width:100%!important; background: #000!important;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="height:100%!important;">
            <iframe width="100%" height="" style="height: 100%!important;" src="" frameborder="0" allowfullscreen></iframe>
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
    
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
</body>
</html>
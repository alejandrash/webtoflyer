<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
header("Content-Type:text/html; charset=utf-8");

?>
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
        $("#clave2").change(function() { 
            var clave1 = $("#clave").val();
            var clave2 = $(this).val();
            if(clave1 != clave2) {
                alert("Las contraseñas deben coincidir.");
                $("#clave2").focus();
            }     
        }); 
        $("#razonsocial").change(function() { 
            var valorRS = $(this).val();
            if (valorRS !=''){
                $('#posterior').fadeIn();
            } 
            else {
                $('#posterior').fadeOut();
            }
        }); 
        
    });
</script>
</head> 
<body id="login" class="interna">
    <div class="forms col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
        <div class="header col-xs-12 text-center">
            <a href="index.php" title="Ii a Login"><img src="images/logo_marquez.png" class="img-responsive img-centered" alt=""></a>
        </div>
        <?php include("includes/conexion.php"); ?>
        <?php 
              if (isset($_SESSION['ESTADO'])) {
                  header("Location:home.php");
              }
        ?>
        <h1>¿Primera vez en W2F? ¡Bienvenido!</h1>
        <h1>REGISTRAR NUEVO USUARIO</h1>
        <?php if (isset($_GET["msg_error"])) { ?>
           <p class="error"><?php echo($_GET["msg_error"])?></p>
        <?php } ?>
        <?php if (isset($_GET["msg_ok"])) { ?>
            <p class="ok"><?php echo($_GET["msg_ok"])?></p>
        <?php } ?>
        <form class="form-horizontal col-xs-12" id="form-registro" action="registro_procesar.php" method="post" autocomplete="off">
                                <div class="form-group hidden">
									<label for="catusuario">&iquest;Qu&eacute; clase de usuario es Usted?</label>
                                    <select  class="form-control" id="catusuario" name="catusuario">
                                        <option selected value="operador">Socio de Tu Marca</option>
                                        <option value="socio">Tu Marca Casa Central</option>
                                        <option value="superusuario">IDG</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label for="razonsocial">Seleccione su Raz&oacute;n Social</label>
                                    <select  class="form-control" id="razonsocial" name="razonsocial">
                                        <option selected value="">Seleccione su Raz&oacute;n Social</option>
                                        <?php
                                             $result_rs=mysql_query("select * from usuarios WHERE categoria!='superusuario' and sucursal!='' AND email='' ORDER BY categoria DESC, sucursal ASC");
                                            if ($row_rs=mysql_fetch_array($result_rs)) {
                                                do {
                                        ?>
                                        <option value="<?php echo($row_rs['Id']); ?>"><?php echo($row_rs['sucursal']); ?></option>
                                        <?php
                                                } while ($row_rs=mysql_fetch_array($result_rs));	
                                            }
                                        ?>
                                    </select>
								</div>
                            <div id="posterior" style="display:none;" class="col-xs-12">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 padding-left-0">
                                        <div class="form-group">
                                            <label for="nombre">Nombre de contacto</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de contacto" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 padding-right-0">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" style="text-transform: lowercase;" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 padding-left-0">
                                        <div class="form-group">
                                            <label for="clave">Contrase&ntilde;a</label>
                                            <input type="password" class="form-control" id="clave" name="clave" placeholder="Contrase&ntilde;a" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 padding-right-0">
                                        <div class="form-group">
                                            <label for="clave2">Repetir contrase&ntilde;a</label>
                                            <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contrase&ntilde;a" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 padding-left-0 padding-right-0">
                                        <div class="form-group">
                                            <label for="clavecomun">Clave de seguridad que te enviamos (Respet&aacute; las may&uacute;sculas y min&uacute;sculas)</label>
                                            <input type="text" class="form-control" id="clavecomun" name="clavecomun" placeholder="Clave de seguridad" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <button class="btn btn-default pull-right" type="submit" name="btn_login" id="btn_login">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                                <ul class="login_acciones" style="margin:0 -15px;">
                                    <li class="col-sm-6 col-xs-12"><a href="registro.php"><a href="index.php">Login</a></li>
                                    <li class="col-sm-6 col-xs-12 text-right"><a href="olvido.php">&iquest;Olvid&oacute; su contrase&ntilde;a?</a></li>
                                </ul>
            <br><br>
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
    
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
</body>
</html>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$user = $_SESSION['ESTADO'];
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
        var estado = 0;
        $('#continuar').click(function () {
            $('input.personalizado').each(function () {
                if($(this).is(':checked')) { 
                    estado = 1;
                }
                else {   
                }
            });
            if (estado == 1) {
                $('#personalizado-pedido').submit();
            }
            else {
                alert('Seleccione al menos un servicio.');
                return false;
            }
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
                        <p class="col-xs-12"><img src="images/titulos/personalizado.png" class="img-responsive" alt="">Solicitá tu diseño personalizado</p>
            </div>
            <div class="wrapper-prod-general">
                <!-- Estadisticas start-->
                <div class="wrap-container col-xs-12">
                    <div id="wrap-detalle" class="col-md-9 col-sm-12 col-xs-12">
                        <form action="personalizado_procesar.php" method="post" id="personalizado-pedido" name="personalizado-pedido" class="col-xs-12">
                            <br><br>
                            <p class="subtit">El equipo de IDG est&aacute; a tu disposici&oacute;n para suplir cualquier necesidad de dise&ntilde;o.<br>Complet&aacute; el formulario y te enviaremos un presupuesto.</p>
                            <?php if (isset($_GET["msg_error"])) { ?>
                           <p class="error"><?php echo($_GET["msg_error"])?></p>
                        <?php } ?>
                        <?php if (isset($_GET["msg_ok"])) { ?>
                            <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                        <?php } ?>
                            <div class="form-group">
                                <label class="checkbox-inline">DISE&Ntilde;O DE FLYERS <input class="personalizado" type="checkbox" name="personalizado[]" value="DISE&Ntilde;O DE FLYERS" checked></label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">RETOQUE FOTOGR&Aacute;FICO <input class="personalizado" type="checkbox" name="personalizado[]" value="RETOQUE FOTOGR&Aacute;FICOS"></label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">GESTI&Oacute;N DE REDES SOCIALES <input class="personalizado" type="checkbox" name="personalizado[]" value="GESTI&Oacute;N DE REDES SOCIALES"></label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">OTROS <input class="personalizado" type="checkbox" name="personalizado[]" value="OTROS"></label>
                            </div>
                            <div class="form-group noborder">
                                <label for="observaciones">OBSERVACIONES</label>
                                <textarea class="form-control" rows="5" name="observaciones" id="observaciones"></textarea>
                            </div>
                            <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="continuar" class="continuar" value="ENVIAR"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>
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
          var agree=confirm("¿Realmente quiere eliminar esta/s promo/s? ");
          if (agree) {
              document.forms['administrarpromo'].submit();
          }
          return false;
    }
    $(document).ready(function () {
        $('input[type=file]').change(function(){
            var nuevoNom = $('#fecha').val();
            var nom = $(this)[0].files[0].name;
                    nuevoNom = nuevoNom+nom;
                    $('#filename').html(nom);
                    $('#filenam').val(nuevoNom);
                    $('#fileori').val(nom);
            $('input[type=file]').attr('name', nuevoNom);
            $(this).simpleUpload("promo_procesar.php", {

                start: function(file){
                    //upload started
                    $('#insertarpromo input[type=submit]').attr('disabled','disabled');
                    $('#progress').html("");
                    $('#progressBar').width(0);
                },

                progress: function(progress){
                    //received progress
                    //$('#progress').html("<div class='percent'>" + Math.round(progress) + "%</div>");
                    $('#progressBar').width(progress + "%");
                    $('.percent').html("" + Math.round(progress) + "%");
                },

                success: function(data){
                    //upload successful
                    //$('#insertarmarca').submit();
                    //$('#progress').html("Success!<br>Data: " + JSON.stringify(data));
                    //$('#progress').html();
                    //console.log(data);
                    $('#insertarpromo input[type=submit]').removeAttr("disabled");
                },

                error: function(error){
                    //upload failed
                    $('#progress').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });

	   });        
        
        $( "#insertarpromo" ).submit(function() {
            var estadoFoto = $('#filenam').val();
            if (estadoFoto == "") {
                alert("Debe agregar un JPG a la promo.");
                return false;
            }
        });
    });

</script>
</body>
</html>
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
        
        $('#sucursal').change(function () {
            var suc = $(this).val();
            if (suc=='') {
                $('#posterior').fadeOut();
                $('#direccion, telefono').attr('required', '');
                return false;
            }
            $('img.loading').css('display','block');
            $.ajax({
                       type: "POST",
                       dataType: "json",
                       url: "buscarsucursal.php",
                       data: {
                            id_suc: suc
                        },
                       success: function(data)
                       {
                           $('#posterior').fadeIn();
                           $('#direccion, telefono').attr('required', 'required');
                           $('#direccion').val(data['direccion_suc']);
                           $('#telefono').val(data['telefono_suc']);
                           var prov = data['provincia_suc'];
                           $("#provincia").find('option').each(function( i, opt ) {
                                if( opt.value === prov ) 
                                    $(opt).attr('selected', 'selected');
                           });
                           $('img.loading').css('display','none');
                       }
            });
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
                <p class="col-xs-12"><img src="images/titulos/editardatos.png" class="img-responsive" alt=""> Editar Sucursales</p>
            </div>
            <div class="wrapper-prod-general">
                <!-- Estadisticas start-->
                <div class="wrap-container col-xs-12">
                    <div id="wrap-editar" class="col-md-9 col-sm-9 col-xs-12">
                        <form action="editarsuc_procesar.php" method="post" id="editar-datos" name="editar-datos" class="col-xs-12" autocomplete="off">
                            <?php if (isset($_GET["msg_error"])) { ?>
                                <p class="error"><?php echo($_GET["msg_error"])?></p>
                            <?php } ?>
                            <?php if (isset($_GET["msg_ok"])) { ?>
                                <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                            <?php } ?>
                            <div class="form-group relative">
                                    <img src="images/loading.gif" class="loading" height="20" alt="">
									<label for="sucursal">Seleccione la raz&oacute;n social que quiere editar</label>
                                    <select  class="form-control" id="rsocial" name="rsocial">
                                        <option value="">Seleccione...</option>
                                        <?php
                                            $result_rs=mysql_query("select * from usuarios WHERE categoria='operador'");
                                            $row_rs=mysql_fetch_array($result_rs);
                                                do {
                                        ?>
                                        <option value="<?php echo($row_rs['Id']); ?>"><?php echo($row_rs['sucursal']); ?></option>
                                        <?php
                                                } while ($row_rs=mysql_fetch_array($result_rs));	
                                        ?>
                                    </select>
				            </div>
                            <div id="posterior">
                                <div class="form-group">
                                    <label for="direccion">Direcci&oacute;n</label>
                                    <input class="form-control" type="text" name="direccion" id="direccion" value="">
                                </div>
                                <div class="form-group">
                                    <label for="provincia">Provincia</label>
                                    <select id="provincia" name="provincia" class="form-control">
                                                     <option value="Buenos Aires">CABA y Buenos Aires</option>
                                                     <option value="Catamarca">Catamarca</option>  
                                                     <option value="Chaco">Chaco</option>  
                                                     <option value="Chubut">Chubut</option>  
                                                     <option value="C&oacute;rdoba">C&oacute;rdoba</option>  
                                                     <option value="Corrientes">Corrientes</option>  
                                                     <option value="Entre R&iacute;os">Entre R&iacute;os</option>  
                                                     <option value="Formosa">Formosa</option>  
                                                     <option value="Jujuy">Jujuy</option> 
                                                     <option value="La Pampa">La Pampa</option>
                                                     <option value="La Rioja">La Rioja</option>  
                                                     <option value="Mendoza">Mendoza</option>  
                                                     <option value="Misiones">Misiones</option>  
                                                     <option value="Neuqu&eacute;n">Neuqu&eacute;n</option>  
                                                     <option value="Río Negro">Río Negro</option>  
                                                     <option value="Salta">Salta</option>  
                                                     <option value="San Juan">San Juan</option>  
                                                     <option value="San Luis">San Luis</option>
                                                     <option value="Santa Cruz">Santa Cruz</option>  
                                                     <option value="Santa Fe">Santa Fe</option> 
                                                     <option value="Santiago del Estero">Santiago del Estero</option>
                                                     <option value="Tierra del Fuego">Tierra del Fuego</option>  
                                                     <option value="Tucum&aacute;n">Tucum&aacute;n</option>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Tel&eacute;fono</label>
                                    <input class="form-control" type="text" name="telefono" id="telefono" value="">
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label for="nombre">Nombre de Contacto</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo($row_rs['nombre_contacto']); ?>" required>
                            </div>
                            <div class="form-group">
									<label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo($row_rs['email']); ?>" required>
								</div>
                                <div class="form-group">
									<label for="clave">Contrase&ntilde;a</label>
                                    <?php $clave = base64_decode($row_rs['clave']); ?>
                                    <input type="text" class="form-control" id="clave" name="clave" value="<?php echo($clave); ?>" required>
								</div>
                                <div class="form-group hidden">
									<label for="clave2">Repetir contrase&ntilde;a</label>
                                    <input type="text" class="form-control" id="clave2" name="clave2" value="">
								</div>
                            <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="continuar" class="continuar" value="MODIFICAR DATOS"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>
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
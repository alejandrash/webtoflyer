<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}

$user = $_SESSION['ESTADO'];
$result_user=mysql_query("select * from usuarios WHERE email ='$user'");
$row_user=mysql_fetch_array($result_user);
$niveluser=$row_user['categoria'];

$id = $_GET['id_pub'];

$result_prod=mysql_query("select * from productos WHERE Id = '$id'");
$row_prod=mysql_fetch_array($result_prod);
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
<link rel="stylesheet" href="css/bootstrap-tagsinput.css">
<link rel="stylesheet" type="text/css" href="css/dd.css" />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/simpleUpload.js"></script>
<script src="js/jquery.dd.min.js" type="text/javascript"></script>
<script type="text/javascript">

var text_max = 120;
        function calculaCaracteresRestantes() {
            if ($('#descripcion').val() == undefined) {
                return false;
            }

            var text_length = $('#descripcion').val().length;
            var text_remaining = text_max - text_length;
            $('#caracteres_restantes span').html(text_remaining);

            return true;
        }

$(window).load(function(){
        $(".delete").click(function () {
            $('#foto_thumb').attr( "src", "" );
            $('#foto_thumb').css("height","auto");
            $(this).parent().children('input').val('');
            $('.fotowrap').css("display","none");
            $(this).css("display","none");
            return false;
        });

        calculaCaracteresRestantes(); 
})

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
                        <?php 
                        if ($niveluser == 'superusuario') {
                        ?>
                        <li><a href="carga-categorias.php">INSERTAR CATEGOR&Iacute;A</a></li>
                        <li class="secundarias"><a href="carga-categorias.php">&bull; ADMINISTRAR CATEGOR&Iacute;AS</a></li>
                        <li><a href="carga-marcas.php">INSERTAR MARCA</a></li>
                        <li class="secundarias"><a class="active" href="carga-marcas.php">&bull; ADMINISTRAR MARCAS</a></li>
                        <?php 
                        }
                        ?>
                        <li><a href="carga-productos.php">INSERTAR PRODUCTO</a></li>
                        <li class="secundarias"><a class="active" href="#" onclick="return false;">&bull; ADMINISTRAR PRODUCTOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1>MODIFICACI&Oacute;N DE PRODUCTO</h1>
                        <ul>
                            <li><a href="carga-productos.php">Insertar Producto</a></li>
                            <li class="active"><a href="#" onclick="return false;">Administrar Productos</a></li>
                        </ul>
                    </div>
                    <!-- Titular end-->
                    
                    <!-- Form start-->
                    <div class="content-form col-xs-12" id="newstyle-cargaprod">
                        <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-0 col-xs-12">
                            <?php if (isset($_GET["msg_error"])) { ?>
                               <p class="error"><?php echo($_GET["msg_error"])?></p>
                            <?php } ?>
                            <?php if (isset($_GET["msg_ok"])) { ?>
                                <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                            <?php } ?>
                            <form class="form-inline" action="modificarprod_procesar.php" method="post" id="modificarprod" name="modificarprod" enctype="multipart/form-data" accept-charset="UTF-8">
                                <input type="hidden" name="id" id="id" value="<?php echo($row_prod['Id']); ?>">
                                <input type="hidden" id="filenam" name="filenam" value="">
                                <input type="hidden" id="fileori" name="fileori" value="">
                                <input type="hidden" id="fileoriStart" name="fileoriStart" value="">
                                <input type="hidden" id="fecha" name="fecha" value="<?php echo(date('m-d-Y_hia'));?>">

                                <div class="recuadrogris">
                                    <div class="form-group">
                                        <?php 
                                            $id_cat = $row_prod['id_cat'];
                                            $result_cat=mysql_query("select * from categorias ORDER BY nombre ASC");
                                            if ($row_cat=mysql_fetch_array($result_cat)) {
                                        ?>
                                        <select class="form-control" id="categoria" name="categoria">
                                            <option value="">UBICÁ EL PRODUCTO EN UNA CATEGOR&Iacute;A</option>
                                            <?php 
                                                do {
                                            ?>
                                            <option value="<?php echo($row_cat['Id']); ?>" <?php if ($row_cat['Id'] == $id_cat) { echo("selected"); }; ?>><?php echo($row_cat['nombre']); ?></option>
                                            <?php
                                                } while ($row_cat=mysql_fetch_array($result_cat));  
                                            ?>
                                        </select>
                                        <?php
                                            }
                                            else {
                                                echo("<p>No hay categorías, debe cargar una antes de cargar productos.</p>");
                                            }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tags" name="tags" value="<?php echo($row_prod['tags']); ?>" data-role="tagsinput" placeholder="ESCRIB&Iacute; PALABRAS CLAVE DE BÚSQUEDA SEPARADAS POR UNA COMA (OPCIONAL)">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="ean" name="ean" value="<?php echo($row_prod['ean']); ?>" placeholder="ESCRIB&Iacute; EL CÓDIGO EAN DE TU PRODUCTO (OPCIONAL)">
                                    </div>
                                </div>
                                
                                <div class="recuadrogris">
                                    <div class="row">
                                        <div class="tercio col-md-4 col-sm-12 col-xs-12">
                                            <?php
                                            $tipo = $row_prod['tipo'];
                                            $tipo=str_replace("*","'",$tipo);
                                            $tipo=str_replace('&','"',$tipo);
                                            ?>
                                            <input type="text" class="form-control" id="tipo" name="tipo" maxlength="22" required value="<?php echo($tipo); ?>" placeholder="ESCRIBÍ EL TIPO DE PRODUCTO">
                                        </div>

                                        <div class="tercio col-md-4 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="modelo" name="modelo" maxlength="13" required value="<?php echo($row_prod['modelo']); ?>" placeholder="ESCRIBÍ EL MODELO">
                                        </div>   
                                        <div class="tercio col-md-4 col-sm-12 col-xs-12">
                                            <?php 
                                                $id_marca = $row_prod['id_marca'];
                                                $result_marca=mysql_query("select * from marcas ORDER BY nombre ASC");
                                                if ($row_marca=mysql_fetch_array($result_marca)) {
                                            ?>
                                            <select class="form-control" id="marca" name="marca">
                                                <option value="">ELEGÍ LA MARCA</option>
                                                <?php 
                                                    do {
                                                ?>
                                                <option value="<?php echo($row_marca['Id']); ?>" data-image="images/<?php echo($row_marca['logo']); ?>" <?php if ($row_marca['Id'] == $id_marca) { echo("selected"); }; ?>><?php echo($row_marca['nombre']); ?></option>
                                                <?php
                                                    } while ($row_marca=mysql_fetch_array($result_marca));	
                                                ?>
                                            </select>
                                            <?php
                                                }
                                                else {
                                                    echo("<p>No hay marcas, debe cargar una antes de cargar productos.</p>");
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group text-right" style="position:relative;">
                                        <label for="foto" class="label-file" style="background-image: none;">
                                            <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg, image/png">
                                        </label>
                                        <p class="small" style="padding-left:0;"><strong><u>Requisitos</u>: JPG/PNG, 300dpi, RGB. Fondo blanco. Dimensiones: Alto 4.8cm, Ancho 9.45cm, Máximo 600 kb</strong></p>
                                        <div class="fotowrap" style="display: block; cursor: pointer;" data-toggle="modal" data-target="#fotoampliada" title="Click para Ampliar">
                                            <img id="foto_thumb" src="images/<?php echo($row_prod['foto']); ?>" alt="" style="clear:both; height:220px;">
                                        </div>
                                        <a href="#" class="delete" style="display: block;">Eliminar foto</a>

                                        <!-- Modal Foto Ampliada-->
                                        <div id="fotoampliada" class="modal fade" role="dialog" tabindex="-1">
                                          <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                              <div class="modal-body">
                                                  <img src="images/<?php echo $row_prod['foto']; ?>" alt="" style="width:100%; max-width:100%; height:auto;">
                                              </div>
                                            </div>

                                          </div>
                                        </div>
                                    </div>
                                    
                                    <div id="filename"></div>
                                    <div id="progress"></div>
                                    <div id="progressBar"></div>
                                    <div class="percent"></div>

                                    <div class="form-group">
                                        <?php
                                        $descripcion = $row_prod['descripcion'];
                                        $descripcion=str_replace("*","'",$descripcion);
                                        $descripcion=str_replace('&quot;','"',$descripcion);
                                        $descripcion=str_replace('quot;','"',$descripcion);
                                        ?>
                                        <textarea class="form-control" id="descripcion" name="descripcion" maxlength="120" required placeholder="AGREGÁ LA DESCRIPCIÓN DEL PRODUCTO"><?php echo($descripcion); ?></textarea>
                                        <p class="small" style="text-align: right;" id="caracteres_restantes"><span>120</span> caracteres restantes</p>
                                    </div>
                                
                                    <div class="form-group">
                                        <select class="form-control" id="origen" name="origen" required>
                                            <option value="">SELECCIONÁ EL PA&Iacute;S DE ORIGEN</option>
                                            <option value="ARGENTINA" <?php if ($row_prod['origen'] == 'ARGENTINA') { echo("selected"); }; ?>>ARGENTINA</option>
                                            <option value="ALEMANIA" <?php if ($row_prod['origen'] == 'ALEMANIA') { echo("selected"); }; ?>>ALEMANIA</option>
                                            <option value="BOSNIA-HERZEGOVINA" <?php if ($row_prod['origen'] == 'BOSNIA-HERZEGOVINA') { echo("selected"); }; ?>>BOSNIA-HERZEGOVINA</option>
                                            <option value="BRASIL" <?php if ($row_prod['origen'] == 'BRASIL') { echo("selected"); }; ?>>BRASIL</option>
                                            <option value="CHINA" <?php if ($row_prod['origen'] == 'CHINA') { echo("selected"); }; ?>>CHINA</option>
                                            <option value="COREA" <?php if ($row_prod['origen'] == 'COREA') { echo("selected"); }; ?>>COREA</option>
                                            <option value="ESLOVENIA" <?php if ($row_prod['origen'] == 'ESLOVENIA') { echo("selected"); }; ?>>ESLOVENIA</option>
                                            <option value="EE.UU." <?php if ($row_prod['origen'] == 'EE.UU.') { echo("selected"); }; ?>>EE.UU.</option>
                                            <option value="HUNGRIA" <?php if ($row_prod['origen'] == 'HUNGRIA') { echo("selected"); }; ?>>HUNGRIA</option>
                                            <option value="FRANCIA" <?php if ($row_prod['origen'] == 'FRANCIA') { echo("selected"); }; ?>>FRANCIA</option>
                                            <option value="INDONESIA" <?php if ($row_prod['origen'] == 'INDONESIA') { echo("selected"); }; ?>>INDONESIA</option>
                                            <option value="ISRAEL" <?php if ($row_prod['origen'] == 'ISRAEL') { echo("selected"); }; ?>>ISRAEL</option>
                                            <option value="ITALIA" <?php if ($row_prod['origen'] == 'ITALIA') { echo("selected"); }; ?>>ITALIA</option>
                                            <option value="MALASIA" <?php if ($row_prod['origen'] == 'MALASIA') { echo("selected"); }; ?>>MALASIA</option>
                                            <option value="MEXICO" <?php if ($row_prod['origen'] == 'MEXICO') { echo("selected"); }; ?>>MEXICO</option>
                                            <option value="POLONIA" <?php if ($row_prod['origen'] == 'POLONIA') { echo("selected"); }; ?>>POLONIA</option>
                                            <option value="RUMANIA" <?php if ($row_prod['origen'] == 'RUMANIA') { echo("selected"); }; ?>>RUMANIA</option>
                                            <option value="SINGAPUR" <?php if ($row_prod['origen'] == 'SINGAPUR') { echo("selected"); }; ?>>SINGAPUR</option>
                                            <option value="TURQUIA" <?php if ($row_prod['origen'] == 'TURQUIA') { echo("selected"); }; ?>>TURQUIA</option>
                                        </select>
                                    </div>
                                </div>
                                    <input type="hidden" class="form-control" id="precio" name="precio" value="$0,00" disabled>
                                    <div class="chequeoprod">
                                        <input class="btn btn-default pull-right" type="submit" id="btnmodificar" name="btnmodificar" value="MODIFICAR">
                                    </div>
                            </form>
                        </div>
                        
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
       
<!--<ul class="login_footer col-sm-offset-1 col-sm-10 col-xs-12 clearfix text-right">
        <li><a href="#" title="Envíenos sus sugerencias"><img src="images/btn_sugerencias.png" alt="Sugerencias"></a></li>
        <li><a href="#" title="Solicite Ayuda"><img src="images/btn_ayuda.png" alt="Ayuda"></a></li>
    </ul>-->
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?45pZQUQEZABBBU4B1TwlKeQiKkc3rmCY';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
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
<script src="js/bootstrap-tagsinput.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {


        $("#descripcion").bind("keyup change", function (e) {
            calculaCaracteresRestantes();
        });
        var text_max = 120;
        function calculaCaracteresRestantes() {
            if ($('#descripcion').val() == undefined) {
                return false;
            }

            var text_length = $('#descripcion').val().length;
            var text_remaining = text_max - text_length;
            $('#caracteres_restantes span').html(text_remaining);

            return true;
        }
        
        $('input[type=file]').change(function(){
            var nuevoNom = $('#fecha').val();
            var nom = $(this)[0].files[0].name;
            nom=nom.replace(/ /g, "");
                    nuevoNom = nuevoNom+nom;
                    $('#filename').html(nom);
                    $('#filenam').val(nuevoNom);
                    $('#fileori').val(nom);
            $('input[type=file]').attr('name', nuevoNom);
            $(this).simpleUpload("foto_procesar.php", {

                start: function(file){
                    //upload started
                    $('#modificarprod input[type=submit]').attr('disabled','disabled');
                    $('#progress').html("");
                    $('#progressBar').width(0);
                },

                progress: function(progress){
                    $('#progressBar').width(progress + "%");
                    $('.percent').html("" + Math.round(progress) + "%");
                },

                success: function(data){
                    $('#modificarprod input[type=submit]').removeAttr("disabled");
                    //console.log(data);
                    $('.fotowrap').css("display","block");
                    $('#foto_thumb').css("height","220px");
                    $('#foto_thumb').attr('src', 'images/productos/'+nom);
                    $('.label-file').css("background-image","none");
                    $('.delete').css("display","block");
                },

                error: function(error){
                    //upload failed
                    $('#progress').html("Error!<br>" + error.name + ": " + error.message);
                    //console.log(data);
                }

            });

	   });        
        
        $( "#modificarprod" ).submit(function() {
            var estadoFoto = $('#foto_thumb').attr('src');
            var estadoFotoNueva = $('#fileori').val();
            if ((estadoFoto == "")&&(estadoFotoNueva == "")) {
                alert("Debe agregar una imagen al producto.");
                return false;
            }
            else {
                $("#modificarprod").submit();
            }
        });
    });
</script>
<script language="javascript">
$(document).ready(function(e) {
    try {
    $("body #modificarprod select").msDropDown();
    } catch(e) {
    alert(e.message);
    }
});
</script>
</body>
</html>
<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$id = $_GET['id_pub'];

$result_marca=mysql_query("select * from marcas WHERE Id = '$id'");
$row_marca=mysql_fetch_array($result_marca);
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
<script src="js/simpleUpload.js"></script>
<script type="text/javascript">
     
$(window).load(function(){
    $(".delete").click(function () {
            var rutaimg = $('#foto_thumb').attr( "src");
            $('#fileoriStart').val(rutaimg);
            $('#foto_thumb').attr( "src", "" );
            $('#foto_thumb').css("height","auto");
            $(this).parent().children('input').val('');
            $('#containfoto').css("display","block");
            $(this).css("display","none");
            return false;
    });     
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
                        <li><a href="carga-categorias.php">INSERTAR CATEGOR&Iacute;A</a></li>
                        <li class="secundarias"><a href="carga-categorias.php">&bull; ADMINISTRAR CATEGOR&Iacute;AS</a></li>
                        <li><a href="carga-marcas.php">INSERTAR MARCA</a></li>
                        <li class="secundarias"><a class="active" href="#" onclick="return false;">&bull; ADMINISTRAR MARCAS</a></li>
                        <li><a href="carga-productos.php">INSERTAR PRODUCTO</a></li>
                        <li class="secundarias"><a href="carga-productos.php#tablaResultados">&bull; ADMINISTRAR PRODUCTOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1>MODIFICACI&Oacute;N DE MARCA</h1>
                        <ul>
                            <li class="active"><a href="carga-marcas.php">Insertar Marca</a></li>
                            <li><a href="#" onclick="return false;">Administrar Marcas</a></li>
                        </ul>
                    </div>
                    <!-- Titular end-->
                    
                    <!-- Form start-->
                    <div class="content-form col-xs-12">
                        <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-0 col-xs-12">
                            <?php if (isset($_GET["msg_error"])) { ?>
                               <p class="error"><?php echo($_GET["msg_error"])?></p>
                            <?php } ?>
                            <?php if (isset($_GET["msg_ok"])) { ?>
                                <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                            <?php } ?>
                            <form class="form-inline" action="modificarmarca_procesar.php" method="post" id="modificarmarca" name="modificarmarca" enctype="multipart/form-data" accept-charset="UTF-8">
                                <input type="hidden" name="id" id="id" value="<?php echo($row_marca['Id']); ?>">
                                <input type="hidden" id="filenam" name="filenam" value="">
                                <input type="hidden" id="fileori" name="fileori" value="">
                                <input type="hidden" id="fileoriStart" name="fileoriStart" value="">
                                <input type="hidden" id="fecha" name="fecha" value="<?php echo(date('m-d-Y_hia'));?>">
                                <div class="form-group">
                                    <?php
                                    $nombre = $row_marca['nombre'];
                                    $nombre=str_replace("*","'",$nombre);
                                    $nombre=str_replace('&','"',$nombre);
                                    ?>
                                    <label for="nombre">NOMBRE</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" maxlength="60" required value="<?php echo($nombre); ?>">
                                </div>
                                <div class="form-group text-right">
                                    <div id="containfoto" style="display:none;">
                                        <label for="foto">FOTO</label>
                                        <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg">
                                        <p class="small"><strong><u>Requisitos</u>: Formato de imagen JPG, Resoluci&oacute;n 300dpi, Colores RGB<br>Dimensiones: Alto 4cm, Ancho proporcional, Tama&ntilde;o aprox 300 kb</strong></p>
                                    </div>
                                    <div class="fotowrap">
                                        <img id="foto_thumb" src="images/<?php echo $row_marca['logo']; ?>" alt="" style="width:auto; height:60px; margin-top:5px; clear:both;">
                                    </div>
                                    <a href="#" class="delete" style="display:block;">Eliminar foto</a>
                                </div>
                                
                                <div id="filename"></div>
                                <div id="progress"></div>
                                <div id="progressBar"></div>
                                <div class="percent"></div>
                                
                                <input class="btn btn-default pull-right" type="submit" id="btnmodificar" name="btnmodificar" value="MODIFICAR">
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
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        $('input[type=file]').change(function(){
            var nuevoNom = $('#fecha').val();
            var nom = $(this)[0].files[0].name;
            nom=nom.replace(/ /g, "");
                    nuevoNom = nuevoNom+nom;
                    $('#filename').html(nom);
                    $('#filenam').val(nuevoNom);
                    $('#fileori').val(nom);
            $('input[type=file]').attr('name', nuevoNom);
            $(this).simpleUpload("logo_procesar.php", {

                start: function(file){
                    //upload started
                    $('#modificarmarca input[type=submit]').attr('disabled','disabled');
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
                    $('#modificarmarca input[type=submit]').removeAttr("disabled");
                },

                error: function(error){
                    //upload failed
                    $('#progress').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });

	   });        
        
        $( "#modificarmarca" ).submit(function() {
            var estadoFoto = $('#foto_thumb').attr('src');
            var estadoFotoNueva = $('#fileori').val();
            if ((estadoFoto == "")&&(estadoFotoNueva == "")) {
                alert("Debe agregar un logo a la marca.");
                return false;
            }
            else {
                $("#modificarmarca").submit();
            }
        });
    });
</script>
</body>
</html>
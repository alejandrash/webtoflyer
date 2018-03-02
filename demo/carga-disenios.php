<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if (!isset($niveluser)) {
    $user = $_SESSION['ESTADO'];
    $result_user=mysql_query("select * from usuarios WHERE email ='$user'");
    $row_user=mysql_fetch_array($result_user);
    $niveluser=$row_user['categoria'];
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
<link href="css/redes-admin.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />	
<link rel="stylesheet" href="css/datatables.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/simpleUpload.js"></script>

<script type="text/javascript">
     
$(window).load(function(){
        //document.getElementById('foto').onchange = function(){
        //    $('#foto_thumb').css("height","100px");
        //    var oFReader = new FileReader();

         //   oFReader.readAsDataURL(document.getElementById("foto").files[0]);
         //   oFReader.onload = function (oFREvent) {
         //       document.getElementById("foto_thumb").src = oFREvent.target.result;
         //   };
         //   $('.delete').css("display","block");
       // }
        //$(".delete").click(function () {
        //    $('#foto_thumb').attr( "src", "" );
        //    $('#foto_thumb').css("height","auto");
        //    $(this).parent().children('input').val('');
        //    $(this).css("display","none");
        //    return false;
       // });   
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
                    <ul class="carga">
                        <li class=""><a href="editar-plantilla-general.php">PLANTILLA GRATUITA</a></li>
                        <li class=""><a href="editar-plantilla-paga.php">PLANTILLA PAGA</a></li>
                        <li class="active"><a href="carga-disenios.php">DISEÑOS PREDETERMINADOS</a></li>
                        <li class="secundarias"><a href="#tablaResultados">&bull; ADMINISTRAR DISEÑOS</a></li>
                        <li class=""><a href="carga-gifs.php">GIFS PREDETERMINADOS</a></li>
                        <li class="secundarias"><a href="carga-gifs.php#tablaResultados">&bull; ADMINISTRAR GIFS</a></li>
                        <li class=""><a href="carga-portadas.php">PORTADAS FACEBOOK</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1>CARGA DE DISEÑOS</h1>
                        <ul>
                            <li class="active"><a href="#">Insertar Diseño</a></li>
                            <?php 
                            if ($niveluser != 'operador') {
                            ?>
                            <li><a href="#tablaResultados">Administrar Diseños</a></li>
                            <?php 
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Titular end-->
                    
                    <!-- Form start-->
                    <div class="content-form col-xs-12 bgblanco">
                        <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-0 col-xs-12">
                            <?php if (isset($_GET["msg_error"])) { ?>
                               <p class="error"><?php echo($_GET["msg_error"])?></p>
                            <?php } ?>
                            <?php if (isset($_GET["msg_ok"])) { ?>
                                <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                            <?php } ?>
                            <form class="form-inline" action="insertardisenio_procesar.php" method="post" id="insertarmarca" name="insertarmarca" enctype="multipart/form-data" accept-charset="UTF-8">
                                <input type="hidden" id="filenam" name="filenam" value="">
                                <input type="hidden" id="fileori" name="fileori" value="">
                                <input type="hidden" id="fecha" name="fecha" value="<?php echo(date('m-d-Y_hia'));?>">
                                <div class="form-group">
                                    <label for="nombre">TIPO</label>
                                    <select class="form-control" id="categoria" name="categoria" required>
                                        <option value="gratuita">GRATUITA (500 x 500 píxeles)</option>
                                        <option value="paga">PAGA (1200 x 630 píxeles)</option>
                                    </select>
                                    <p class="small">La publicación gratuita es sin cargo, de formato cuadrado apto para Facebook, Instagram y Whatsapp.</p>
                                </div>
                                <div class="form-group text-right">
                                    <label for="foto">IMAGEN</label>
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg, image/png" data-id="">
                                    <p class="small"><strong><u>Requisitos</u>: Formato de imagen JPG/PNG, Resoluci&oacute;n 72dpi, RGB, Alto 500 px, Ancho 500 px, Tama&ntilde;o máximo 600 kb</strong></p>
                                    <div class="fotowrap">
                                        <img id="foto_thumb" src="" alt="" style="margin-top:5px; clear:both;">
                                    </div>
                                    <a href="#" class="delete">Eliminar foto</a>
                                </div>
                                
                                <div id="filename"></div>
                                <div id="progress"></div>
                                <div id="progressBar"></div>
                                <div class="percent"></div>
                                
                                <input class="btn btn-default pull-right" type="submit" value="CARGAR">
                            </form>
                        </div>
                        
                        <?php 
                            $result_pr=mysql_query("select * from redes_predeterminados ORDER BY tipo ASC, Id DESC");
                            if ($row_pr=mysql_fetch_array($result_pr))
                            {
                        ?>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("#tablaResultados").dataTable( {
                                    responsive: true,
                                    "order": [[ 2, 'asc' ]]
                                });
                            });
                        </script>
                        <!--START TABLA RESULTADOS-->
                        <form action="eliminardisenio_procesar.php" method="post" id="administrarmarca" name="administrarmarca">
                            <table border="0" cellpadding="0" cellspacing="0" class="dataTable" id="tablaResultados">
                                <thead>
                                <tr class="encabezado">
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Eliminar</th>
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Modificar</th>
                                    <th>Tipo</th>
                                    <th>Título</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        do {
                                ?>
                                <tr class="<?php echo $stilo?>">
                                    <td><input name="id_pub[]" type="checkbox" class="chek" value="<?php echo $row_pr['Id']?>" title="Eliminar"></td>
                                    <td><a href="modificardisenio.php?id_pub=<?php echo $row_pr['Id']?>"><img src="images/iconito-modificar.png" title="Modificar"></a></td>
                                    <td><?php echo $row_pr['tipo']; ?></td>
                                    <?php
                                    $titulo = $row_pr['titulo'];
                                    $titulo=str_replace("*","'",$titulo);
                                    $titulo=str_replace('&','"',$titulo);
                                    ?>
                                    <td><?php echo htmlspecialchars($titulo)?></td>
                                </tr>
                                <?php
                                    } while ($row_pr=mysql_fetch_array($result_pr));	
                                ?>
                                
                                </tbody>
                                <tr class="pie">
                                    <td colspan="6">
                                        <input name="volver" type="hidden" id="volver" value="<?php echo $_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"]?>">
                                        <a class="btn btn-default eliminar" style="text-align:left;" href="#" onclick="confirmDel(); return false;"><img src="images/ico-cerrar_blanco.png" height="15"> Eliminar</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <!--END TABLA RESULTADOS-->
                        <?php
                            }
                            else {
                                echo("<p class='col-xs-12 error text-center'><br><br>No hay diseños predeterminados disponibles.</p>");
                            }
                        ?>
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
          var agree=confirm("¿Realmente quiere eliminar esta/s marca/s? ");
          if (agree) {
              document.forms['administrarmarca'].submit();
          }
          return false;
    }
    $(document).ready(function () {
        $("#tablaResultados").dataTable( {
                responsive: true,
                "order": [[ 2, 'asc' ]]
        } );
        
        $('input[type=file]').change(function(){
            var ext = $(this)[0].files[0].name.split('.').pop();
            if ((ext!='jpg')&&(ext!='jpeg')&&(ext!='png')) {
                alert("Por favor solo usar formato de imagen JPG/PNG.");
                return false;
            }
            else {
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
                        $('#insertarmarca input[type=submit]').attr('disabled','disabled');
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
                        $('#insertarmarca input[type=submit]').removeAttr("disabled");
                    },

                    error: function(error){
                        //upload failed
                        $('#progress').html("Error!<br>" + error.name + ": " + error.message);
                        console.log(data);
                    }

                });
            }

	   });        
        
        $( "#insertarmarca" ).submit(function() {
            var estadoFoto = $('#filenam').val();
            if (estadoFoto == "") {
                alert("Debe agregar un logo a la marca.");
                return false;
            }
        });
    });

</script>
</body>
</html>
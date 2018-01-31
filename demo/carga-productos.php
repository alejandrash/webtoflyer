<?php 
session_set_cookie_params(21600,"/");
session_start();
ini_set("upload_max_filesize", "20M");
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
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />	
<link rel="stylesheet" href="css/datatables.min.css" type='text/css' />
<link rel="stylesheet" href="css/bootstrap-tagsinput.css">
<link rel="stylesheet" type="text/css" href="css/dd.css" />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/simpleUpload.js"></script>
<script src="js/jquery.dd.min.js" type="text/javascript"></script>
<script type="text/javascript">
     
    $(window).load(function(){
        document.getElementById('foto').onchange = function(){
           //var ext = $(this)[0].files[0].name.split('.').pop();
            //if (ext!='jpg') {
            //    alert("Solo formatos jpg/png");
            //}
           // else {
               // $('#foto_thumb').css("height","160px");
               // var oFReader = new FileReader();

                //oFReader.readAsDataURL(document.getElementById("foto").files[0]);
                //oFReader.onload = function (oFREvent) {
                //    document.getElementById("foto_thumb").src = oFREvent.target.result;
                //};
                //$('.delete').css("display","block");
          //  }
        }
        $(".delete").click(function () {
            $('#foto_thumb').attr( "src", "" );
            $('#foto_thumb').css("height","auto");
            $(this).parent().children('input').val('');
            $('.fotowrap').css("display","none");
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
                        <?php 
                        if ($niveluser != 'operador') {
                        ?>
                        <li><a href="carga-categorias.php">INSERTAR CATEGOR&Iacute;A</a></li>
                        <li class="secundarias"><a href="carga-categorias.php">&bull; ADMINISTRAR CATEGOR&Iacute;AS</a></li>
                        <li><a href="carga-marcas.php">INSERTAR MARCA</a></li>
                        <li class="secundarias"><a class="active" href="carga-marcas.php">&bull; ADMINISTRAR MARCAS</a></li>
                        <?php 
                        }
                        else {
                            echo('<li><a href="carga-marcas.php">INSERTAR MARCA</a></li>');
                        }
                        ?>
                        <li class="active"><a href="#">INSERTAR PRODUCTO</a></li>
                        <li class="secundarias"><a href="#tablaResultados">&bull; ADMINISTRAR PRODUCTOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1>CARGA DE PRODUCTOS</h1>
                        <ul>
                            <li class="active"><a href="#">Insertar Producto</a></li>
                            <li><a href="#tablaResultados">Administrar Productos</a></li>
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
                            <form class="form-inline" action="insertarprod_procesar.php" method="post" id="insertarprod" name="insertarprod" enctype="multipart/form-data" accept-charset="UTF-8">
                                <input type="hidden" id="filenam" name="filenam" value="">
                                <input type="hidden" id="fileori" name="fileori" value="">
                                <input type="hidden" id="fecha" name="fecha" value="<?php echo(date('m-d-Y_hia'));?>">
                                
                                <div class="recuadrogris">
                                    <div class="form-group">
                                        <?php 
                                            $result_cat=mysql_query("select * from categorias ORDER BY nombre ASC");
                                            if ($row_cat=mysql_fetch_array($result_cat)) {
                                        ?>
                                        <select class="form-control" id="categoria" name="categoria" required>
                                            <option value="">UBICÁ EL PRODUCTO EN UNA CATEGOR&Iacute;A</option>
                                            <?php 
                                                do {
                                            ?>
                                            <option value="<?php echo($row_cat['Id']); ?>"><?php echo($row_cat['nombre']); ?></option>
                                            <?php
                                                } while ($row_cat=mysql_fetch_array($result_cat));  
                                            ?>
                                        </select>
                                        <?php
                                            }
                                            else {
                                                echo("<p>No hay categorías, debe cargar una antes de cargar productos.</p>");
                                                ?>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#insertarprod input[type=submit]').attr('disabled','disabled');
                                                    });
                                                </script>
                                        <?php
                                            }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tags" name="tags" value="" data-role="tagsinput" placeholder="ESCRIB&Iacute; PALABRAS CLAVE DE BÚSQUEDA SEPARADAS POR UNA COMA (OPCIONAL)">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="ean" name="ean" value="" placeholder="ESCRIB&Iacute; EL CÓDIGO EAN DE TU PRODUCTO (OPCIONAL)">
                                    </div>
                                </div>

                                <div class="recuadrogris">
                                    <div class="row">
                                        <div class="tercio col-md-4 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="tipo" name="tipo" maxlength="22" required placeholder="ESCRIBÍ EL TIPO DE PRODUCTO">
                                        </div>

                                        <div class="tercio col-md-4 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="modelo" name="modelo" maxlength="13" required placeholder="ESCRIBÍ EL MODELO">
                                        </div>

                                        <div class="tercio col-md-4 col-sm-12 col-xs-12">
                                            <?php 
                                                $result_marca=mysql_query("select * from marcas ORDER BY nombre ASC");
                                                if ($row_marca=mysql_fetch_array($result_marca)) {
                                            ?>
                                            <select class="form-control" id="marca" name="marca" required>
                                                <option value="">ELEGÍ LA MARCA</option>
                                                <?php 
                                                    do {
                                                ?>
                                                <option value="<?php echo($row_marca['Id']); ?>" data-image="images/<?php echo($row_marca['logo']); ?>"><?php echo($row_marca['nombre']); ?></option>
                                                <?php
                                                    } while ($row_marca=mysql_fetch_array($result_marca));  
                                                ?>
                                            </select>
                                            <?php
                                                }
                                                else {
                                                    echo("<p class='error' style='width:100%; display:inline-block;'>No hay marcas, debe cargar una antes de cargar productos.</p>");
                                                    ?>
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $('#insertarprod input[type=submit]').attr('disabled','disabled');
                                                        });
                                                    </script>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group text-right" style="position:relative;">
                                        <label for="foto" class="label-file">
                                            <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg, image/png">
                                        </label>
                                        <p class="small" style="padding-left:0;"><strong><u>Requisitos</u>: JPG/PNG, 300dpi, RGB. Fondo blanco. Dimensiones: Alto 4.8cm, Ancho 9.45cm, Máximo 600 kb</strong></p>
                                        <div class="fotowrap">
                                            <img id="foto_thumb" src="" alt="" style="clear:both;">
                                        </div>
                                        <a href="#" class="delete">Eliminar foto</a>

                                    </div>
                                    
                                    <div id="filename"></div>
                                    <div id="progress"></div>
                                    <div id="progressBar"></div>
                                    <div class="percent"></div>

                                    <!--<div class="form-group">
                                        <label for="titulo">T&Iacute;TULO</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" maxlength="37" required>
                                        <p class="small">Carg&aacute; el t&iacute;tulo de la siguiente manera: TIPO DE PRODUCTO seguido del modelo y de la MARCA <br><strong>Por ejemplo: <u>LAVARROPAS NEXT 8.12 DREAN</u></strong> <br>El modelo únicamente figurará en el título del producto.</p>
                                    </div>-->
                                    
                                    <div class="form-group">
                                        <textarea class="form-control" id="descripcion" name="descripcion" maxlength="120" required placeholder="AGREGÁ LA DESCRIPCIÓN DEL PRODUCTO"></textarea>
                                        <p class="small" style="text-align: right;" id="caracteres_restantes"><span>120</span> caracteres restantes</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <select class="form-control" id="origen" name="origen" required>
                                            <option value="">SELECCIONÁ EL PA&Iacute;S DE ORIGEN</option>
                                            <option value="ARGENTINA">ARGENTINA</option>
                                            <option value="ALEMANIA">ALEMANIA</option>
                                            <option value="BRASIL">BRASIL</option>
                                            <option value="BOSNIA-HERZEGOVINA">BOSNIA-HERZEGOVINA</option>
                                            <option value="CHINA">CHINA</option>
                                            <option value="COREA">COREA</option>
                                            <option value="ESLOVENIA">ESLOVENIA</option>
                                            <option value="EE.UU.">EE.UU.</option>
                                            <option value="FRANCIA">FRANCIA</option>
                                            <option value="HUNGRIA">HUNGRIA</option>
                                            <option value="INDONESIA">INDONESIA</option>
                                            <option value="ISRAEL">ISRAEL</option>
                                            <option value="ITALIA">ITALIA</option>
                                            <option value="MALASIA">MALASIA</option>
                                            <option value="MEXICO">MEXICO</option>
                                            <option value="POLONIA">POLONIA</option>
                                            <option value="RUMANIA">RUMANIA</option>
                                            <option value="SINGAPUR">SINGAPUR</option>
                                            <option value="TURQUIA">TURQUIA</option>
                                        </select>
                                    </div>

                                </div>

                                <input type="hidden" class="form-control" id="precio" name="precio" value="$0,00" disabled>
                                <div class="chequeoprod">
                                    <a href="#" data-toggle="modal" data-target="#modal-chequeo">?</a>
                                    <label class="checkbox-inline"><input type="checkbox" name="chequeo" id="chequeo" value="si">SOLICITAR CHEQUEO DEL PRODUCTO</label>
                                    <input class="btn btn-default pull-right" type="submit" value="">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 clearfix" style="height:50px;"></div>
                        <?php 
                            if ($niveluser != 'operador') {
                                $result_pr=mysql_query("select productos.Id AS id_prod, id_cat, id_marca, tipo, modelo, nombre_marca, descripcion, sucursal, foto, precio, origen, productos.usuario AS usuario_prod, tags from productos INNER JOIN usuarios ON productos.usuario=usuarios.email ORDER BY productos.Id, titulo ASC");
                            }
                            if ($niveluser == 'operador') {
                                $result_pr=mysql_query("select productos.Id AS id_prod, id_cat, id_marca, tipo, modelo, nombre_marca, descripcion, sucursal, foto, precio, origen, productos.usuario AS usuario_prod, tags from productos INNER JOIN usuarios ON productos.usuario=usuarios.email WHERE productos.usuario='$user' ORDER BY productos.Id, titulo ASC");
                            }
                            if ($row_pr=mysql_fetch_array($result_pr))
                            {
                        ?>
                        <script type="text/javascript">
                        $(document).ready(function () {
                            $("#tablaResultados").dataTable( {
                                    responsive: true,
                                    "order": [[ 3, 'asc' ]]
                            });
                         });
                        </script>
                        <!--START TABLA RESULTADOS-->
                        <form action="eliminarprod_procesar.php" method="post" id="administrarprod" name="administrarprod">
                            <table border="0" cellpadding="0" cellspacing="0" class="dataTable" id="tablaResultados">
                                <thead>
                                <tr class="encabezado">
                                    <?php 
                                    if ($niveluser != 'operador') {
                                    ?>
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Eliminar</th>
                                    <?php 
                                    }
                                    else {
                                        echo("<th width='30' style='width:60px; background:none!important; cursor:default!important;'>&nbsp;</th>");
                                    }
                                    ?>
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Modificar</th>
                                    <th>C&oacute;digo</th>
                                    <th>Tipo</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <?php 
                                        if ($niveluser != 'operador') {
                                    ?>
                                        <th>Subido Por</th>
                                    <?php 
                                        }
                                    ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    //$result_pr=mysql_query("select * from productos ORDER BY Id, titulo ASC");
                                    //if ($row_pr=mysql_fetch_array($result_pr))
                                    //{
                                        do {
                                ?>
                                <tr class="<?php echo $stilo?>">
                                    <td><input name="id_pub[]" type="checkbox" class="chek" value="<?php echo ($row_pr['id_prod'])?>" title="Eliminar"></td>
                                    <td><a href="modificarprod.php?id_pub=<?php echo $row_pr['id_prod']?>"><img src="images/iconito-modificar-gris.png" title="Modificar"></a></td>
                                    <td><?php echo ($row_pr['id_prod'])?></td>
                                    <td><?php echo htmlspecialchars($row_pr['tipo'])?></td>
                                    <td><?php echo htmlspecialchars($row_pr['modelo'])?></td>
                                    <td><?php echo htmlspecialchars($row_pr['nombre_marca'])?></td>
                                    <?php 
                                        if ($niveluser != 'operador') {
                                    ?>
                                        <td><?php echo ($row_pr['sucursal'])?></td>
                                    <?php 
                                        }
                                    ?>
                                </tr>
                                <?php
                                    } while ($row_pr=mysql_fetch_array($result_pr));	
                                ?>
                                
                                </tbody>
                                <?php 
                                if ($niveluser != 'operador') {
                                ?>
                                <tr class="pie">
                                    <td colspan="6">
                                        <input name="volver" type="hidden" id="volver" value="<?php echo ($row_pr['id_prod'])?>">
                                        <a class="btn btn-default eliminar" style="text-align:left;" href="#" onclick="confirmDel(); return false;"><img style="margin-right:10px;" src="images/ico-cerrar_blanco.png" height="15"> ELIMINAR</a>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </table>
                        </form>
                        <!--END TABLA RESULTADOS-->
                        <?php
                            }
                            else {
                                echo("<p class='col-xs-12 error text-center'><br><br>No hay productos disponibles.</p>");
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


<!-- Modal Chequeo -->
<div id="modal-chequeo" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <h2>¿Tenés dudas sobre la carga del PRODUCTO?</h2>
            <h2>¿Problemas con la carga de imágenes?</h2>
            <h2 class="verde">¡Nosotros te ayudamos!</h2>
            <p>Completá todos los datos del producto. Incluyendo la imagen que tengas.</p>
            <p>Tildá la opción solicitar chequeo.<br>Haremos una revisión de tu producto y editaremos lo que sea necesario. En las próximas horas lo verás actualizado.</p>
            <a href="#" class="close" data-dismiss="modal">ENTENDIDO</a>
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
    function confirmDel() {
          var agree=confirm("¿Realmente quiere eliminar este/os producto/s? ");
          if (agree) {
              document.forms['administrarprod'].submit();
          }
          return false;
    }
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

        $("#tablaResultados").dataTable( {
                responsive: true,
                "order": [[ 3, 'asc' ]]
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
                $(this).simpleUpload("foto_procesar.php", {

                    start: function(file){
                        //upload started
                        $('#insertarprod input[type=submit]').attr('disabled','disabled');
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
                        $('#insertarprod input[type=submit]').removeAttr("disabled");
                        //console.log(data);
                        //var ext = $(this)[0].files[0].name.split('.').pop();
                        //if (ext!='jpg') {
                        //    alert("Solo formatos jpg/png");
                        //}
                       // else {
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
            }

	   });        
        
        $( "#insertarprod" ).submit(function() {
            var estadoFoto = $('#filenam').val();
            if (estadoFoto == "") {
                alert("Debe agregar una imagen al producto.");
                return false;
            }
        });
    });
</script>
<script language="javascript">
$(document).ready(function(e) {
    try {
    $("body #insertarprod select").msDropDown();
    } catch(e) {
    alert(e.message);
    }
});
</script>
</body>
</html>
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
if ($niveluser == 'operador') {
    header("Location:home.php");
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
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/simpleUpload.js"></script>
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
                        <li class="active"><a href="promos-pie.php">INSERTAR BANNER</a></li>
                        <?php
                        if ($niveluser != 'operador') { ?>
                        <li class="secundarias"><a href="#tablaMarcas">&bull; ADMINISTRAR BANNERS</a></li>
                        <?php }
                        ?>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1>CARGA DE BANNERS SOCIO</h1>
                        <ul>
                            <li class="active"><a href="#">Insertar Banner</a></li>
                            <?php
                            if ($niveluser != 'operador') { ?>
                            <li><a href="#tablaMarcas">Administrar Banners</a></li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                    <!-- Titular end-->
                    
                    <!-- Form start-->
                    <div class="content-form col-xs-12">
                        <div class="col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-0 col-xs-12" style="margin-bottom:50px;">
                            <h2 style="font-size:17px;">Pod&eacute;s cargar los 2 banners a la vez, o uno solo. Complet&aacute; solo el campo del banner que quieras cargar, dejando el otro en blanco.</h2>
                            <br>
                            <?php if (isset($_GET["msg_error"])) { ?>
                               <p class="error"><?php echo($_GET["msg_error"])?></p>
                            <?php } ?>
                            <?php if (isset($_GET["msg_ok"])) { ?>
                               <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                            <?php } ?>
                            <form class="form-inline" action="insertarpromopie_procesar.php" method="post" id="insertarpromo" name="insertarpromo" enctype="multipart/form-data" accept-charset="UTF-8">
                                <input type="hidden" id="filenam" name="filenam" value="">
                                <input type="hidden" id="fileori" name="fileori" value="">
                                <input type="hidden" id="filenam2" name="filenam2" value="">
                                <input type="hidden" id="fileori2" name="fileori2" value="">
                                <input type="hidden" id="fecha" name="fecha" value="<?php echo(date('m-d-Y_hia'));?>">
                                <div class="form-group text-right">
                                    <label for="foto">JPG de la Promo Pie</label>
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" data-id="">
                                    <p class="small"><strong><u>Requisitos</u>: Formato de imagen JPG, Resoluci&oacute;n 300dpi, Colores RGB<br>Dimensiones: Ancho 21.01cm, Alto 2.26cm</strong></p>
                                    <div id="filename"></div>
                                    <div id="progress"></div>
                                    <div id="progressBar"></div>
                                    <div class="percent"></div>
                                    
                                    <label for="foto">JPG de la Promo P&aacute;gina 6</label>
                                    <input type="file" class="form-control" id="foto2" name="foto2" accept="image/*" data-id="">
                                    <p class="small"><strong><u>Requisitos</u>: Formato de imagen JPG, Resoluci&oacute;n 300dpi, Colores RGB<br>Dimensiones: Ancho 21.01cm, Alto 6.03cm</strong></p>
                                </div>
                                <div id="filename2"></div>
                                <div id="progress2"></div>
                                <div id="progressBar2"></div>
                                <div class="percent2"></div>
                                
                                <div class="form-group">
                                    <label for="select_rs">Visible para</label>
                                    <select  class="form-control" id="select_rs" name="select_rs">
                                        <option selected value="0">TODOS</option>
                                            <?php
                                                        $result_rs=mysql_query("select * from usuarios WHERE email !='' AND categoria='operador'");
                                                        while($row_rs=mysql_fetch_array($result_rs)){ ?>
                                                            <option value='<?php echo ($row_rs['Id']); ?>'><?php echo ($row_rs['sucursal']); ?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                                <!--
                                <div class="form-group">
                                    <label for="legales">Legales</label>
                                    <textarea class="form-control textareas" style="color:#1c1475!important;" rows="5" name="legales" id="legales" placeholder="Dejar este campo en blanco si no hay legales."></textarea>
                                </div>-->
                                <input class="btn btn-default pull-right" type="submit" value="INSERTAR">
                            </form>
                        </div>
                        <?php 
                            $result_pr=mysql_query("select * from promos_pie ORDER BY Id DESC");
                            if ($row_pr=mysql_fetch_array($result_pr))
                            {
                        ?>
                        
                        <!--START TABLA RESULTADOS-->
                        <form action="eliminarpromopie_procesar.php" method="post" id="administrarpromo" name="administrarpromo">
                            <table width="400" style="margin:0 auto;" border="0" cellpadding="0" cellspacing="0" class="dataTable" id="tablaMarcas">
                                <thead>
                                <tr class="encabezado">
                                    <?php 
                                    if ($niveluser != 'operador') {
                                    ?>
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Eliminar</th>
                                    <?php 
                                    }
                                    else {echo "<th>&nbsp;</th>"; }
                                    ?>
                                    <th>Promo Pie</th>
                                    <th>Visible para</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        do {
                                ?>
                                <tr>
                                    <?php 
                                    if ($niveluser != 'operador') {
                                    ?>
                                    <td><input name="id_pub[]" type="checkbox" class="chek" value="<?php echo $row_pr['Id']?>" title="Eliminar"></td>
                                    <?php 
                                    }
                                    else {echo "<td>&nbsp;</td>"; }
                                    ?>
                                    <td><img src="flyer/<?php echo $row_pr['foto']?>" height="50"></td>
                                    <?php
                                        $visible = $row_pr['visible'];
                                        if ($visible == '0') {
                                            echo("<td>Todos</td>");
                                        }
                                        else {
                                            $result_vis=mysql_query("select * from usuarios WHERE Id='$visible'");
                                            $row_vis=mysql_fetch_array($result_vis);
                                            $visible = $row_vis['sucursal'];
                                            echo("<td>".$visible."</td>");
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
                                        <input name="volver" type="hidden" id="volver" value="<?php echo $_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"]?>">
                                        <a class="btn btn-default eliminar" style="text-align:left;" href="#" onclick="confirmDel(); return false;"><img src="images/ico-cerrar_blanco.png" height="15"> Eliminar</a>
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
                                echo("<p class='col-xs-12 error text-center'><br><br>No hay banners pie disponibles.</p>");
                            }
                        ?>
                        
                        <br><br><br><br>
                        <?php 
                            $result_pr=mysql_query("select * from promos_pag6 ORDER BY Id DESC");
                            if ($row_pr=mysql_fetch_array($result_pr))
                            {
                        ?>
                        
                        <!--START TABLA RESULTADOS-->
                        <form action="eliminarpromopag6_procesar.php" method="post" id="administrarpromo2" name="administrarpromo2">
                            <table width="400" style="margin:0 auto;" border="0" cellpadding="0" cellspacing="0" class="dataTable" id="tablaMarcas">
                                <thead>
                                <tr class="encabezado">
                                    <?php 
                                    if ($niveluser != 'operador') {
                                    ?>
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Eliminar</th>
                                    <?php 
                                    }
                                    else {echo "<th>&nbsp;</th>"; }
                                    ?>
                                    <th>Promo P&aacute;gina 6</th>
                                    <th>Visible para</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        do {
                                ?>
                                <tr>
                                    <?php 
                                    if ($niveluser != 'operador') {
                                    ?>
                                    <td><input name="id_pub[]" type="checkbox" class="chek" value="<?php echo $row_pr['Id']?>" title="Eliminar"></td>
                                    <?php 
                                    }
                                    else {echo "<td>&nbsp;</td>"; }
                                    ?>
                                    <td><img src="flyer/<?php echo $row_pr['foto']?>" height="50"></td>
                                    <?php
                                        $visible = $row_pr['visible'];
                                        if ($visible == '0') {
                                            echo("<td>Todos</td>");
                                        }
                                        else {
                                            $result_vis=mysql_query("select * from usuarios WHERE Id='$visible'");
                                            $row_vis=mysql_fetch_array($result_vis);
                                            $visible = $row_vis['sucursal'];
                                            echo("<td>".$visible."</td>");
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
                                        <input name="volver" type="hidden" id="volver" value="<?php echo $_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"]?>">
                                        <a class="btn btn-default eliminar" style="text-align:left;" href="#" onclick="confirmDel2(); return false;"><img src="images/ico-cerrar_blanco.png" height="15"> Eliminar</a>
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
                                echo("<p class='col-xs-12 error text-center'><br><br>No hay banners de Pagina 6 disponibles.</p>");
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
          var agree=confirm("¿Realmente quiere eliminar esta/s promo/s pie? ");
          if (agree) {
              document.forms['administrarpromo'].submit();
          }
          return false;
    }
    function confirmDel2() {
          var agree=confirm("¿Realmente quiere eliminar esta/s promo/s de Pagina 6? ");
          if (agree) {
              document.forms['administrarpromo2'].submit();
          }
          return false;
    }
    $(document).ready(function () {
        $('#foto').change(function(){
            var nuevoNom = $('#fecha').val();
            var nom = $(this)[0].files[0].name;
                    nuevoNom = nuevoNom+nom;
                    $('#filename').html(nom);
                    $('#filenam').val(nuevoNom);
                    $('#fileori').val(nom);
            $('#foto').attr('name', nuevoNom);
            $(this).simpleUpload("promopie_procesar.php", {

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
        
       $('#foto2').change(function(){
            var nuevoNom = $('#fecha').val();
            var nom = $(this)[0].files[0].name;
                    nuevoNom = nuevoNom+nom;
                    $('#filename2').html(nom);
                    $('#filenam2').val(nuevoNom);
                    $('#fileori2').val(nom);
            $('#foto2').attr('name', nuevoNom);
            $(this).simpleUpload("promopag6_procesar.php", {

                start: function(file){
                    //upload started
                    $('#insertarpromo input[type=submit]').attr('disabled','disabled');
                    $('#progress2').html("");
                    $('#progressBar2').width(0);
                },

                progress: function(progress){
                    //received progress
                    //$('#progress').html("<div class='percent'>" + Math.round(progress) + "%</div>");
                    $('#progressBar2').width(progress + "%");
                    $('.percent2').html("" + Math.round(progress) + "%");
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
                    $('#progress2').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });

	   });
        
        $( "#insertarpromo" ).submit(function() {
            var estadoFoto = $('#filenam').val();
            var estadoFoto2 = $('#filenam2').val();
            if ((estadoFoto == "") && (estadoFoto2 == "")) {
                alert("Debes agregar un JPG a la promo pie, o a la promo de pagina 6.");
                return false;
            }
        });
    });

</script>
</body>
</html>
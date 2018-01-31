<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
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
<script src="js/datatables.min.js"></script>
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
                        <li class="active"><a href="#" onclick="return false;">INSERTAR CATEGOR&Iacute;A</a></li>
                        <li class="secundarias"><a href="#tablaResultados">&bull; ADMINISTRAR CATEGOR&Iacute;AS</a></li>
                        <li><a href="carga-marcas.php">INSERTAR MARCA</a></li>
                        <li class="secundarias"><a href="carga-marcas.php#tablaResultados">&bull; ADMINISTRAR MARCAS</a></li>
                        <li><a href="carga-productos.php">INSERTAR PRODUCTO</a></li>
                        <li class="secundarias"><a href="carga-productos.php#tablaResultados">&bull; ADMINISTRAR PRODUCTOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1>CARGA DE CATEGOR&Iacute;AS</h1>
                        <ul>
                            <li class="active"><a href="#">Insertar Categor&iacute;a</a></li>
                            <li><a href="#tablaResultados">Administrar Categor&iacute;as</a></li>
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
                            <form class="form-inline" action="insertarcat_procesar.php" method="post" id="insertarcat" name="insertarcat" enctype="multipart/form-data" accept-charset="UTF-8">
                                <div class="form-group">
                                    <label for="nombre">NOMBRE</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" maxlength="60" required>
                                </div>
                                <input class="btn btn-default pull-right" type="submit" value="INSERTAR">
                            </form>
                        </div>
                        <!--START TABLA RESULTADOS-->
                        <form action="eliminarcat_procesar.php" method="post" id="administrarcat" name="administrarcat">
                            <table border="0" cellpadding="0" cellspacing="0" class="dataTable" id="tablaResultados">
                                <thead>
                                <tr class="encabezado">
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Eliminar</th>
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Modificar</th>
                                    <th>Nombre</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $result_pr=mysql_query("select * from categorias ORDER BY nombre ASC");
                                    if ($row_pr=mysql_fetch_array($result_pr))
                                    {
                                        do {
                                ?>
                                <tr class="<?php echo $stilo?>">
                                    <td><input name="id_pub[]" type="checkbox" class="chek" value="<?php echo $row_pr['Id']?>" title="Eliminar"></td>
                                    <td><a href="modificarcat.php?id_pub=<?php echo $row_pr['Id']?>"><img src="images/iconito-modificar.png" title="Modificar"></a></td>
                                    <td><?php echo htmlspecialchars($row_pr['nombre'])?></td>
                                </tr>
                                <?php
                                    } while ($row_pr=mysql_fetch_array($result_pr));	
                                ?>
                                <?php
                                    }
                                    else {
                                        echo("<tr colspan='3'><td>No hay categorias disponibles.</td></tr>");
                                    }
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
          var agree=confirm("¿Realmente quiere eliminar esta/s categoria/s? ");
          if (agree) {
              document.forms['administrarcat'].submit();
          }
          return false;
    }
    $(document).ready(function () {
        $("#tablaResultados").dataTable( {
                responsive: true,
                "order": [[ 2, 'asc' ]]
        } );
    });
</script>
</body>
</html>
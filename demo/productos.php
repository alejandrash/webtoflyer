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
$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");


                                    $TAMANO_PAGINA = 10;

                                    //examino la página a mostrar y el inicio del registro a mostrar
                                    if (!isset($_GET["pagina"])) {
                                       $inicio = 0;
                                       $pagina = 1;
                                    }
                                    else {
                                       $pagina = $_GET["pagina"];
                                       $inicio = ($pagina - 1) * $TAMANO_PAGINA;
                                    }

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
<script src="js/jquery-1.10.2.min.js"></script>
 <script type="text/javascript">
     function SameHeight(elt) {
        var heightBlockMax=0;
        var propertie = "height";
        $(elt).each(function(){
            var height = jQuery(this).height();
            if( height > heightBlockMax ) {
                heightBlockMax = height;
            }
        });
        $(elt).css(propertie, heightBlockMax);
    }
     
     $(window).load(function(){
		SameHeight('.listado-prod li.col-md-5ths .content');
      });
     
     $(document).ready(function () {
         var count = 0;
         $("#btn-insertar").click(function() {
             console.log($('input[type="checkbox"]:checked').length);
            if($('input[type="checkbox"]:checked').length == 0) {
                    alert ("Debe seleccionar al menos 1 producto.");
                    return false;
            }
            if($('input[type="checkbox"]:checked').length > 4) {
                    alert ("Seleccione hasta 4 productos.");
                    return false;
            }
            else {
                 $('#seleccion-prod').submit();
            }
         });
         
         $(".listado-prod li .content").click(function() {
             if($(this).find('input[type="checkbox"]').is(':checked')) {
                $(this).find('input[type="checkbox"]').prop('checked', false);
             }
             else {
                $(this).find('input[type="checkbox"]').prop('checked', true);
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
            <div class="wrapper-prod-general">
                <!-- Categorias Productos start-->
                <div class="wrap-categorias col-lg-2 col-md-12 col-xs-12">
                    <ul>
                        <?php
                        if (!isset($_GET['id_cat'])) {
                            //$id_cat = '';
                        ?>
                        <li><a class="active" href="productos.php">Todos</a></li>
                        <?php } 
                        else {
                            //$id_cat = $_GET['id_cat'];
                        ?>
                        <li><a href="productos.php">Todos</a></li>
                        <?php
                            }
                             $result_cat=mysql_query("select * from categorias ORDER BY nombre ASC");
                            if ($row_cat=mysql_fetch_array($result_cat)) {
                                do {
                                    if (isset($_GET['id_cat'])) {
                                        $id_cat = $_GET['id_cat'];
                                    }
                                    else {
                                        $id_cat = '';
                                    }
                                    if ($row_cat['Id'] == $id_cat) {
                                        $claseCat = 'active';
                                    }
                                    else {
                                        $claseCat = '';
                                    }
                        ?>
                        <li><a class="<?php echo($claseCat); ?>" href="productos.php?id_cat=<?php echo($row_cat['Id']); ?>"><?php echo($row_cat['nombre']); ?></a></li>
                        <?php
                                } while ($row_cat=mysql_fetch_array($result_cat));	
                            }
                        ?>
                    </ul>
                </div>
                <!-- Categorias Productos ends-->
                <!-- Productos start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Buscador start-->
                    <div class="wrap-buscador col-xs-12">
                        <div class="row">
                            <h1 class="col-sm-4 col-xs-12">PRODUCTOS</h1>
                            <form action="productos.php" method="post" id="buscar-prod" name="buscar-prod" class="form-inline col-sm-8 col-xs-12">
                                <div class="row">
                                    <?php
                                    
                                    if (!isset($_GET['id_cat'])) {
                                        $select_prod=mysql_query("select * from productos ORDER BY Id DESC");
                                        $num_total_registros = mysql_num_rows($select_prod);
                                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                        $select_prod= "select * from productos ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        $select_prod = mysql_query($select_prod);
                                    ?>
                                    <h2 class="col-sm-4 col-xs-12">TODOS</h2>
                                    <?php
                                    }
                                    else {
                                        $id_cat=$_GET['id_cat'];
                                        $result_cat2=mysql_query("select * from categorias WHERE Id='$id_cat'");
                                        $row_cat2=mysql_fetch_array($result_cat2);
                                        $select_prod=mysql_query("select * from productos WHERE id_cat='$id_cat' ORDER BY Id DESC");
                                        $num_total_registros = mysql_num_rows($select_prod);
                                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                        $select_prod= "select * from productos WHERE id_cat='$id_cat' ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        $select_prod = mysql_query($select_prod);
                                        ?>
                                        <h2 class="col-sm-4 col-xs-12"><?php echo($row_cat2['nombre']); ?></h2>
                                    <?php
                                    }
                                    
                                    if (isset($_GET['id_cat'])) {
                                        if ($id_cat == '') {
                                        $select_prod=mysql_query("select * from productos ORDER BY Id DESC");
                                        $num_total_registros = mysql_num_rows($select_prod);
                                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                        $select_prod= "select * from productos ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        $select_prod = mysql_query($select_prod);
                                    ?>
                                    <script type="text/javascript">
                                        $('#buscar-prod h2.col-sm-4').text("TODOS");
                                    </script>
                                    <?php
                                    }}
                                    
                                    /*QUERYS ORDENAR*/
                                    if (isset($_GET['query'])) {
                                        $query = $_GET['query'];
                                        if (isset($_GET['id_cat'])) {
                                            $id_cat = $_GET['id_cat'];
                                                                               
                                            if ($query == 'id') {
                                                $select_prod=mysql_query("select * from productos WHERE id_cat='$id_cat' ORDER BY Id DESC");
                                                $num_total_registros = mysql_num_rows($select_prod);
                                                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                                $select_prod= "select * from productos WHERE id_cat='$id_cat' ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                                $select_prod = mysql_query($select_prod);
                                            ?>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('.ordenar-por li a').removeClass('active');
                                                        $('.ordenar-por li:nth-child(4) a').addClass('active');
                                                    });
                                                </script>
                                            <?php
                                            }
                                            if ($query == 'marca') {
                                                $select_prod=mysql_query("select * from productos WHERE id_cat='$id_cat' ORDER BY id_marca ASC");
                                                $num_total_registros = mysql_num_rows($select_prod);
                                                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                                $select_prod= "select * from productos WHERE id_cat='$id_cat' ORDER BY id_marca ASC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                                $select_prod = mysql_query($select_prod);
                                            ?>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('.ordenar-por li a').removeClass('active');
                                                        $('.ordenar-por li:nth-child(5) a').addClass('active');
                                                    });
                                                </script>
                                            <?php
                                            }
                                        } 
                                        else {
                                            if ($query == 'id') {
                                                $select_prod=mysql_query("select * from productos ORDER BY Id DESC");
                                                $num_total_registros = mysql_num_rows($select_prod);
                                                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                                $select_prod= "select * from productos ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                                $select_prod = mysql_query($select_prod);
                                            ?>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('.ordenar-por li a').removeClass('active');
                                                        $('.ordenar-por li:nth-child(4) a').addClass('active');
                                                    });
                                                </script>
                                            <?php
                                            }
                                            if ($query == 'marca') {
                                                $select_prod=mysql_query("select * from productos ORDER BY id_marca ASC");
                                                $num_total_registros = mysql_num_rows($select_prod);
                                                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                                $select_prod= "select * from productos ORDER BY id_marca ASC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                                $select_prod = mysql_query($select_prod);
                                            ?>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('.ordenar-por li a').removeClass('active');
                                                        $('.ordenar-por li:nth-child(5) a').addClass('active');
                                                    });
                                                </script>
                                            <?php
                                            }
                                        }
                                    }
                                    
                                    /*QUERY BUSCADOR*/
                                    if (isset($_POST['buscar'])) {
                                        $buscar = $_POST['buscar'];
                                        $select_prod=mysql_query("select * from productos WHERE (titulo LIKE '%$buscar%' OR modelo LIKE '%$buscar%' OR descripcion LIKE '%$buscar%') ORDER BY Id DESC");
                                        $num_total_registros = mysql_num_rows($select_prod);
                                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                        $select_prod= "select * from productos WHERE (titulo LIKE '%$buscar%' OR modelo LIKE '%$buscar%' OR descripcion LIKE '%$buscar%') ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        $select_prod = mysql_query($select_prod);
                                    }
                                    ?>
                                    <div class="form-group col-sm-8 col-xs-12">
                                      <input type="text" class="form-control" id="buscar" name="buscar" placeholder="buscar producto">
                                      <button class="btn btn-default" type="button" title="Buscar"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Buscador end-->
                    
                    <?php
                        if (!isset($_GET['id_cat'])) {
                               $id_cat = '';
                        }
                        else {
                            $id_cat = $_GET['id_cat'];
                        }
                    ?>
                    <div class="ordenar-por col-xs-12">
                        <div class="row">
                            <ul>
                                <li>Ordenar por:</li>
                                <li>// <a class="active" href="productos.php?id_cat=<?php echo($id_cat);?>&query=id">carga reciente</a></li>
                                <li>// <a href="productos.php?id_cat=<?php echo($id_cat);?>&query=marca">marca</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Listado Prod start-->
                    <div class="listado-prod col-xs-12 catalogo">
                        <div class="row">
                            <?php
                            
                            if ($row_prod=mysql_fetch_array($select_prod)) { 
                            ?>
                            <form action="diseniar-flyer.php" method="post" id="seleccion-prod" name="seleccion-prod">
                                <input type="hidden" name="origen" id="origen" value="si">
                                <!--<button class="btn btn-default continuar" id="btn-insertar" name="btn-insertar" type="button" title="Insertar en Flyer"><i class="fa fa-check-square-o"></i> <span>INSERTAR EN FLYER</span></button>-->
                                <ul>
                                    <?php
                                    do {
                                    ?>
                                    <!-- Un Producto start-->
                                    <li class="col-md-5ths col-xs-12">
                                        <div class="content">
                                            <label><span>Seleccionar</span> <input type="checkbox" name="prsel[]" id="prsel_<?php echo($row_prod['Id']); ?>" value="<?php echo($row_prod['Id']); ?>">
                                            <div class="marca">
                                                <?php
                                                $id_marca = $row_prod['id_marca'];
                                                $result_marca=mysql_query("select * from marcas WHERE Id='$id_marca'");
                                                $row_marca=mysql_fetch_array($result_marca);
                                                ?>
                                                <img src="images/<?php echo($row_marca['logo']); ?>" height="45" class="img-responsive" alt="">
                                            </div>
                                            
                                            <div class="imagen">
                                                <img src="images/<?php echo($row_prod['foto']); ?>" height="110" width="216" class="img-responsive img-centered" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="titulo"><?php echo($row_prod['titulo']); ?></p>
                                                <?php
                                                if ($row_prod['modelo']!="") {
                                                ?>
                                                <p><strong>Modelo: </strong><?php echo($row_prod['modelo']); ?></p>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row_prod['descripcion']!="") {
                                                    $descripcion=$row_prod['descripcion'];
                                                    $descripcion=str_replace("*","'",$descripcion);
                                                    $descripcion=str_replace('&quot;','"',$descripcion);
                                                    $descripcion=str_replace('quot;','"',$descripcion);
                                                ?>
                                                <p><strong>Descripci&oacute;n: </strong><br><?php echo($descripcion); ?></p>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if ($row_prod['precio']!="") {
                                                    $precio = $row_prod['precio'];
                                                }
                                                else {
                                                    $precio = "-";
                                                }
                                                ?>
                                                <!--<p><strong>Precio: </strong><?php //echo($precio); ?></p>-->
                                            </div>
                                            </label>
                                        </div>
                                    </li>
                                    <!-- Un Producto end-->
                                    <?php
                                    } while ($row_prod=mysql_fetch_array($select_prod));
                                    ?>
                                </ul>
                            </form>
                            <?php
                            }
                            else {
                                echo("<p class='col-xs-12 text-center' style='color:#191834;'><strong>A&uacute;n no hay productos disponibles en esta categor&iacute;a.</strong></p>");
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Listado Prod end-->
                    
                    <div class="col-xs-12 paginacion">
                        <?php
                        if ($total_paginas > 1) {
                           if (!isset($_GET['id_cat'])) {
                                $cadenapagin1 = '<a href="productos.php?&query='.$query.'&pagina='.($pagina-1).'">&laquo;</a>';
                                $cadenapaginotras = '  <a href="productos.php?query='.$query.'&pagina=';
                               //$id_cat = '';
                           }
                           else {
                                $cadenapagin1 ='<a href="productos.php?id_cat='.$id_cat.'&query='.$query.'&pagina='.($pagina-1).'">&laquo;</a>';
                                $cadenapaginotras = '<a href="productos.php?id_cat='.$id_cat.'&query='.$query.'&pagina=';
                           }
                           if (!isset($_GET['query'])) {
                               $query = 'id';
                           }
                           if ($pagina != 1)
                              echo ($cadenapagin1);
                              for ($i=1;$i<=$total_paginas;$i++) {
                                 if ($pagina == $i)
                                    //si muestro el índice de la página actual, no coloco enlace
                                    echo ('<span>'.$pagina.'</span>');
                                 else
                                    //si el índice no corresponde con la página mostrada actualmente,
                                    //coloco el enlace para ir a esa página
                                    echo ($cadenapaginotras.$i.'">'.$i.'</a>');
                              }
                              if ($pagina != $total_paginas)
                                 echo ($cadenapaginotras.($pagina+1).'">&raquo;</a>');
                        }
                        ?>
                    </div>
                </div>
                <!-- Productos end-->
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
</body>
</html>
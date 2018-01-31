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
$idus=$_SESSION['IDUSER'];
header("Content-Type:text/html; charset=utf-8");
$nombre_tabla = ("vista_prod_".$idus."");

$sql_new = mysql_query("CREATE TABLE if not exists ".$nombre_tabla." (
Id BIGINT(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
id_cat INT(11),
id_marca INT(11),
titulo VARCHAR(100) NOT NULL,
modelo VARCHAR(100) NOT NULL,
descripcion LONGTEXT NOT NULL,
foto VARCHAR(100) NOT NULL,
precio VARCHAR(50) NOT NULL DEFAULT '$0,00',
usuario VARCHAR(50) NOT NULL,
fecha DATETIME NOT NULL,
`actual` varchar(50) NOT NULL DEFAULT 'si',
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC");
$sql_new = mysql_query("TRUNCATE TABLE ".$nombre_tabla."");
$sql_new = mysql_query("INSERT INTO ".$nombre_tabla." (Id, id_cat, id_marca, titulo, modelo, descripcion, foto, precio, usuario, fecha, actual) SELECT rating_productos.id_producto AS Id, productos.id_cat, productos.id_marca, titulo, modelo, descripcion, foto, precio, rating_productos.usuario AS usuario, fecha, actual FROM productos, rating_productos WHERE rating_productos.actual='si' AND rating_productos.usuario='$usuario' GROUP BY rating_productos.id_producto");

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
<title>Grupo Marquez - WEB TO FLYER</title>
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
        SameHeight('.listado-prod li.col-md-5ths .content');
     });
    </script>
</head> 
<body>
<?php
    if (isset($_GET['bloqueoMarca'])) {
        $bloqueoMarca = $_GET['bloqueoMarca'];
    }
    else {
        $bloqueoMarca = 0;
    }
?>
   <div class="page-container">
   <!--/content-inner-->
	<div class="">
	   <div class="">
            <div class="wrapper-prod-general">
                <!-- Categorias Productos start-->
                <div class="wrap-categorias col-lg-2 col-md-12 col-xs-12">
                    <ul>
                        <?php
                        if (!isset($_GET['id_cat'])) {
                        ?>
                        <li><a class="active" href="productos-inner.php">Todos</a></li>
                        <?php
                        }
                        else {
                        ?>
                        <li><a href="productos-inner.php">Todos</a></li>
                        <?php    
                        }
                        ?>
                        <?php 
                            $cate = '';
                             $result_cat=mysql_query("select * from categorias ORDER BY nombre ASC");
                            if ($row_cat=mysql_fetch_array($result_cat)) {
                                do {
                                if (isset($_GET['id_cat'])) {
                                    $cate = $_GET['id_cat'];
                                }
                                if ($cate == $row_cat['Id']) {
                                    $clase = 'active';
                                } 
                                else {
                                    $clase = '';
                                    $cate = '';
                                }
                        ?>
                        <li><a class="<?php echo($clase); ?>" href="productos-inner.php?id_cat=<?php echo($row_cat['Id']); ?>"><?php echo($row_cat['nombre']); ?></a></li>
                        <?php
                                $clase = '';
                                } while ($row_cat=mysql_fetch_array($result_cat));	
                            }
                        ?>
                    </ul>
                </div>
                <!-- Categorias Productos ends-->
                <!-- Productos start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Buscador start-->
                    <div class="wrap-buscador col-xs-12" style="margin-bottom:0; position:relative; top:-10px;">
                        <div class="row">
                            <h1 class="col-sm-4 col-xs-12">PRODUCTOS</h1>
                            <form action="" method="post" id="buscar-prod" name="buscar-prod" class="form-inline col-sm-8 col-xs-12">
                                <div class="row">
                                <?php
                                    if (!isset($_GET['id_cat'])) {
                                        $_SESSION['id_cat']='';
                                        if ($bloqueoMarca!=0) {
                                        $select_prod=mysql_query("select * from productos where id_marca='$bloqueoMarca' and productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC");
                                        }
                                        else {
                                            $select_prod=mysql_query("select * from productos where productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC");
                                        }
                                        $num_total_registros = mysql_num_rows($select_prod);
                                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                        if ($bloqueoMarca!=0) {
                                            $select_prod= "select * from productos where id_marca='$bloqueoMarca' and productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        }
                                        else {
                                            $select_prod= "select * from productos where productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        }
                                        $select_prod = mysql_query($select_prod);
                                    ?>
                                    <h2 class="col-sm-4 col-xs-12">TODOS</h2>
                                    <?php
                                    }
                                    else {
                                        $id_cat=$_GET['id_cat'];
                                        $_SESSION['id_cat']=$id_cat;
                                        $result_cat2=mysql_query("select * from categorias WHERE Id='$id_cat'");
                                        $row_cat2=mysql_fetch_array($result_cat2);
                                        if ($bloqueoMarca!=0) {
                                            $select_prod=mysql_query("select * from productos WHERE id_marca='$bloqueoMarca' AND id_cat='$id_cat' AND productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC");
                                        }
                                        else {
                                            $select_prod=mysql_query("select * from productos WHERE id_cat='$id_cat' AND productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC");
                                        }
                                        $num_total_registros = mysql_num_rows($select_prod);
                                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                        if ($bloqueoMarca!=0) {
                                            $select_prod= "select * from productos WHERE id_cat='$id_cat' AND id_marca='$bloqueoMarca' AND productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        }
                                        else {
                                            $select_prod= "select * from productos WHERE id_cat='$id_cat' AND productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        }
                                        $select_prod = mysql_query($select_prod);
                                    ?>
                                    <h2 class="col-sm-4 col-xs-12"><?php echo($row_cat2['nombre']); ?></h2>
                                    <?php
                                    }
                                    
                                    
                                    if (isset($_GET['id_cat'])) {
                                        if ($id_cat == '') {
                                        if ($bloqueoMarca!=0) {
                                            $select_prod=mysql_query("select * from productos where id_marca='$bloqueoMarca' AND productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC");
                                        }
                                        else {
                                             $select_prod=mysql_query("select * from productos where productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC");
                                        }
                                        $num_total_registros = mysql_num_rows($select_prod);
                                        $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
                                        if ($bloqueoMarca!=0) {
                                            $select_prod= "select * from productos where id_marca='$bloqueoMarca' AND productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        }
                                        else {
                                            $select_prod= "select * from productos where productos.Id not in (select ".$nombre_tabla.".Id from ".$nombre_tabla.") ORDER BY Id DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
                                        }
                                        $select_prod = mysql_query($select_prod);
                                    ?>
                                    <script type="text/javascript">
                                        $('#buscar-prod h2.col-sm-4').text("TODOS");
                                    </script>
                                    <?php
                                    }}
                                    
                                ?>
                    <div class="form-group col-sm-8 col-xs-12">
                                      <input type="text" class="form-control" id="buscar" name="buscar" placeholder="buscar producto, marca, modelo...">
                                      <button class="btn btn-default" id="btnbuscar" name="btnbuscar" type="submit" title="Buscar"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Listado Prod start-->
                    <div class="listado-prod col-xs-12">
                        <div class="row">
                            <?php
                            if ($row_prod=mysql_fetch_array($select_prod)) {
                            ?>
                            <form action="#" method="post" id="seleccion-prod" name="seleccion-prod">

                                <ul>
                                    <?php
                                    do {
                                    ?>
                                    <!-- Un Producto start-->
                                    <?php
                                        $id_marca = $row_prod['id_marca'];
                                        $result_marca=mysql_query("select * from marcas WHERE Id='$id_marca'");
                                        $row_marca=mysql_fetch_array($result_marca);
                                    ?>
                                    <li class="col-md-5ths col-xs-12" data-marca="<?php echo($id_marca); ?>">
                                        <div class="content">
                                            <label><span>Seleccionar</span> <input type="checkbox" name="seleccion" id="seleccion_<?php echo($row_prod['Id']); ?>" value="<?php echo($row_prod['Id']); ?>">
                                            <div class="marca">
                                                <img src="images/<?php echo($row_marca['logo']); ?>" height="45" class="img-responsive" alt="">
                                            </div>
                                            
                                            <div class="imagen">
                                                <img src="images/<?php echo($row_prod['foto']); ?>" height="170" class="img-responsive img-centered" alt="">
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
                                                    $descripcion=str_replace('quot;','',$descripcion);
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
                                                <div class="overlay" title="Click para agregar al flyer"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
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
                    
                    <div class="col-xs-12 paginacion" style="top:105px; padding:5px 5px 15px 5px;">
                        <?php
                        if ($total_paginas > 1) {
                            if (!isset($_GET['id_cat'])) {
                               $id_cat = '';
                                $_SESSION['id_cat']='';
                           }
                            else {
                                $_SESSION['id_cat']=$_GET['id_cat'];
                            }
                           if (!isset($_GET['query'])) {
                               $query = 'id';
                           }
                           if ($pagina != 1) 
                              echo '<a href="productos-inner.php?id_cat='.$id_cat.'&pagina='.($pagina-1).'">&laquo;</a>';
                              for ($i=1;$i<=$total_paginas;$i++) {
                                 if ($pagina == $i)
                                    //si muestro el índice de la página actual, no coloco enlace
                                    echo ('<span>'.$pagina.'</span>');
                                 else
                                    //si el índice no corresponde con la página mostrada actualmente,
                                    //coloco el enlace para ir a esa página
                                    echo '  <a href="productos-inner.php?id_cat='.$id_cat.'&pagina='.$i.'">'.$i.'</a>  ';
                              }
                              if ($pagina != $total_paginas)
                                 echo '<a href="productos-inner.php?id_cat='.$id_cat.'&pagina='.($pagina+1).'">&raquo;</a>';
                        }
                        ?>
                    </div>
                </div>
                <!-- Productos end-->
            </div>
		</div>
</div>
       
				<!--//content-inner-->
<!--js -->

<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
</body>
</html>
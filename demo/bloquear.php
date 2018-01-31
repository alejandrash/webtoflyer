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



// TRAER MARCAS           
$cadena = '';
$cadenacant_pag2 = '';
$result_marca=mysql_query("select * from marcas ORDER BY nombre ASC");
if ($row_marca=mysql_fetch_array($result_marca)) {
    do {
        $cadena=$cadena.'<option value="'.$row_marca['Id'].'">'.$row_marca['nombre'].'</option>';
    } while ($row_marca=mysql_fetch_array($result_marca));  
}
$result_avisos=mysql_query("select * from banners_flyer WHERE ");
if ($row_marca=mysql_fetch_array($result_marca)) {
    do {
        $cadena=$cadena.'<option value="'.$row_marca['Id'].'" data-image="images/'.$row_marca['logo'].'">'.$row_marca['nombre'].'</option>';
    } while ($row_marca=mysql_fetch_array($result_marca));  
}


//FECHA para banners
$mesbanner = date('m', strtotime('+1 month')); 

// CANTIDAD DE BANNERS EN PAGINA 2
$cantidad_pag2 = '';

$result_pagina2=mysql_query("select COALESCE(SUM(valor),0) as total from banners_flyer WHERE cara='pag2' AND mes='$mesbanner'");
if($row_pagina2=mysql_fetch_array($result_pagina2)){
    $totalpag2 = $row_pagina2['total'];
    if ($totalpag2==0) {
        $totalpag2 =12;
    }
    if ($totalpag2==25) {
        $totalpag2 =9;
    }
    if ($totalpag2==50) {
        $totalpag2 =6;
    }
    if ($totalpag2==75) {
        $totalpag2 =3;
    }
    $i = 0;
    if ($totalpag2!=0) {
        for ($i = 1; $i <= $totalpag2; $i++) {
            $cantidad_pag2=$cantidad_pag2.'<option value="'.$i.'">'.$i.'</option>';
        }
    }   
}

// CANTIDAD DE BANNERS EN PAGINA 3
$cantidad_pag3 = '';

$result_pagina3=mysql_query("select COALESCE(SUM(valor),0) as total from banners_flyer WHERE cara='pag3' AND mes='$mesbanner'");
if($row_pagina3=mysql_fetch_array($result_pagina3)){
    $totalpag3 = $row_pagina3['total'];
    if ($totalpag3==0) {
        $totalpag3 =12;
    }
    if ($totalpag3==25) {
        $totalpag3 =9;
    }
    if ($totalpag3==50) {
        $totalpag3 =6;
    }
    if ($totalpag3==75) {
        $totalpag3 =3;
    }
    $i = 0;
    if ($totalpag3!=0) {
        for ($i = 1; $i <= $totalpag3; $i++) {
            $cantidad_pag3=$cantidad_pag3.'<option value="'.$i.'">'.$i.'</option>';
        } 
    }  
}

// CANTIDAD DE BANNERS EN PAGINA 4
$cantidad_pag4 = '';

$result_pagina4=mysql_query("select COALESCE(SUM(valor),0) as total from banners_flyer WHERE cara='pag4' AND mes='$mesbanner'");
if($row_pagina4=mysql_fetch_array($result_pagina4)){
    $totalpag4 = $row_pagina4['total'];
    if ($totalpag4==0) {
        $totalpag4 =12;
    }
    if ($totalpag4==25) {
        $totalpag4 =9;
    }
    if ($totalpag4==50) {
        $totalpag4 =6;
    }
    if ($totalpag4==75) {
        $totalpag4 =3;
    }
    $i = 0;
    if ($totalpag4!=0) {
        for ($i = 1; $i <= $totalpag4; $i++) {
            $cantidad_pag4=$cantidad_pag4.'<option value="'.$i.'">'.$i.'</option>';
        } 
    }  
}

// CANTIDAD DE BANNERS EN PAGINA 5
$cantidad_pag5 = '';

$result_pagina5=mysql_query("select COALESCE(SUM(valor),0) as total from banners_flyer WHERE cara='pag5' AND mes='$mesbanner'");
if($row_pagina5=mysql_fetch_array($result_pagina5)){
    $totalpag5 = $row_pagina5['total'];
    if ($totalpag5==0) {
        $totalpag5 =12;
    }
    if ($totalpag5==25) {
        $totalpag5 =9;
    }
    if ($totalpag5==50) {
        $totalpag5 =6;
    }
    if ($totalpag5==75) {
        $totalpag5 =3;
    }
    $i = 0;
    if ($totalpag5!=0) {
        for ($i = 1; $i <= $totalpag5; $i++) {
            $cantidad_pag5=$cantidad_pag5.'<option value="'.$i.'">'.$i.'</option>';
        }
    }   
}

// CANTIDAD DE BANNERS EN PAGINA 6
$cantidad_pag6 = '';

$result_pagina6=mysql_query("select COALESCE(SUM(valor),0) as total from banners_flyer WHERE cara='pag6' AND mes='$mesbanner'");
if($row_pagina6=mysql_fetch_array($result_pagina6)){
    $totalpag6 = $row_pagina6['total'];
    if ($totalpag6==0) {
        $totalpag6 =9;
    }
    if ($totalpag6==25) {
        $totalpag6 =6;
    }
    if ($totalpag6==50) {
        $totalpag6 =3;
    }
    if ($totalpag6==75) {
        $totalpag6 =0;
    }
    $i = 0;
    if ($totalpag6!=0) {
        for ($i = 1; $i <= $totalpag6; $i++) {
            $cantidad_pag6=$cantidad_pag6.'<option value="'.$i.'">'.$i.'</option>';
        }  
    } 
}

// CANTIDAD DE BANNERS EN PAGINA 7
$cantidad_pag7 = '';

$result_pagina7=mysql_query("select COALESCE(SUM(valor),0) as total from banners_flyer WHERE cara='pag7' AND mes='$mesbanner'");
if($row_pagina7=mysql_fetch_array($result_pagina7)){
    $totalpag7 = $row_pagina7['total'];
    if ($totalpag7==0) {
        $totalpag7 =9;
    }
    if ($totalpag7==25) {
        $totalpag7 =6;
    }
    if ($totalpag7==50) {
        $totalpag7 =3;
    }
    if ($totalpag7==75) {
        $totalpag7 =0;
    }
    $i = 0;
    if ($totalpag7!=0) {
        for ($i = 1; $i <= $totalpag7; $i++) {
            $cantidad_pag7=$cantidad_pag7.'<option value="'.$i.'">'.$i.'</option>';
        }  
    } 
}

// CANTIDAD DE BANNERS EN PAGINA CONTRATAPA
$cantidad_pag8 = '';

$result_pagina8=mysql_query("select COALESCE(SUM(valor),0) as total from banners_flyer WHERE cara='contratapa' AND mes='$mesbanner'");
if($row_pagina8=mysql_fetch_array($result_pagina8)){
    $totalpag8 = $row_pagina8['total'];
    if ($totalpag8==0) {
        $totalpag8 =9;
    }
    if ($totalpag8==25) {
        $totalpag8 =6;
    }
    if ($totalpag8==50) {
        $totalpag8 =3;
    }
    if ($totalpag8==75) {
        $totalpag8 =0;
    }
    $i = 0;
    if ($totalpag8!=0) {
        for ($i = 1; $i <= $totalpag8; $i++) {
            $cantidad_pag8=$cantidad_pag8.'<option value="'.$i.'">'.$i.'</option>';
        }  
    } 
}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
<title>WEB TO FLYER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all"/>
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all"/>
<link href="css/wtf.css" rel='stylesheet' type='text/css' media="all" />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/ media="all">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css' media="all">
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' media="all"/>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<style type="text/css">
.wrap-diseniar select, .ddcommon .ddTitle {border:1px solid #ccc;}
._msddli_, ._msddli_ .ddlabel, .ddcommon ul li {color:#1c1475!important;}
.form-control {padding:0 5px!important;}
</style>
<script type="text/javascript">
    $(document).ready(function () { 
        $('#bloquear').on('change', '.grupo select', function() {
            var comprueboVal = $(this).val();
            $(this).children('option').each(function () {
                var Val2 = $(this).val();
                if (Val2 == comprueboVal) {
                    $(this).attr("selected","selected");
                }
                else {
                    $(this).removeAttr("selected");
                }
            });
        });

        $(".agregar").click(function() { 
            var totalCant = $(this).parent().parent('.div-pagina').attr('data-cantidad');
            var pagina = $(this).parent().parent('.div-pagina').attr('id');
            var grupoCant = $(this).parent().children().children('.grupo').length;
            if (totalCant > grupoCant) {
                var siguiente = $(this).parent().children().children('.grupo:last-child');
                var grupo = $(this).parent().children().children('.grupo:first-child').clone();
                $(grupo).insertAfter(siguiente);
                var nuevo = $(this).parent().children().children('.grupo:last-child').find('.marca');
                $(nuevo).attr('id', 'marca'+pagina+'_'+(grupoCant+1));
                $(nuevo).attr('name', 'marca'+pagina+'_'+(grupoCant+1));
                $(nuevo).val();
                $(nuevo).children('option').removeAttr("selected");
                var nuevocant = $(this).parent().children().children('.grupo:last-child').find('.cantidad');
                $(nuevocant).attr('id', 'cantidad'+pagina+'_'+(grupoCant+1));
                $(nuevocant).attr('name', 'cantidad'+pagina+'_'+(grupoCant+1));
                $(nuevocant).val();
                $(nuevocant).children('option').removeAttr("selected");
            }
            else {
                alert("La cantidad máxima de productos para esta pagina es: "+totalCant+".")
            }
            return false;
        });
        $('.div-pagina').on('click', '.grupo .quitar a', function() {
            $(this).parent().parent().parent().parent('.grupo').remove();
            return false;
        });

        var esta = '';
        var errores = 0;
        $("#guardar").click(function() { 
            var hayerror = 0;
            var cantGrupo = 0;
            $(".div-pagina").each(function() {
                cantTemp = 0;
                cantGrupo = 0;
                esta = $(this).attr('id');
                var cantTotal = $(this).attr('data-cantidad');
                $(this).find(".grupo").each(function() {
                    cantTemp = parseInt($(this).find('.cantidad').val());
                    cantGrupo = cantGrupo + cantTemp;
                });
                var values = [];
                $(this).find(".grupo .marca").each(function() {
                    if ( $.inArray(this.value, values) >= 0 ) {
                                if (this.value!=0) {
                                    hayerror = 1;
                                }
                    } else {
                        values.push( this.value );
                    }
                });
                if (cantGrupo > cantTotal) {
                    errores = 1;
                    alert("La cantidad de productos supera a la cantidad máxima disponible para la página "+esta);
                    $("html, body").animate({
                         scrollTop: $("#"+esta).offset().top
                    }, 800);
                    return false;
                }
                if (hayerror == 1) {
                    errores = 1;
                    alert("Hay marcas repetidas en una misma pagina. Seleccione diferentes marcas en cada desplegable o elimine las marcas que no desee.");
                    $("html, body").animate({
                        scrollTop: $("#"+esta).offset().top
                        }, 800);
                     return false;
                }
            });
            if (errores == 0) {
                var marcas2 = $('#2 .grupo:visible').length;
                var marcas3 = $('#3 .grupo:visible').length;
                var marcas4 = $('#4 .grupo:visible').length;
                var marcas5 = $('#5 .grupo:visible').length;
                var marcas6 = $('#6 .grupo:visible').length;
                var marcas7 = $('#7 .grupo:visible').length;
                var marcas8 = $('#8 .grupo:visible').length;

                $("#cant_pag2").val(marcas2);
                $("#cant_pag3").val(marcas3);
                $("#cant_pag4").val(marcas4);
                $("#cant_pag5").val(marcas5);
                $("#cant_pag6").val(marcas6);
                $("#cant_pag7").val(marcas7);
                $("#cant_pag8").val(marcas8);

                confirmar=confirm("¿Bloqueaste todas las marcas necesarias en todas las páginas? Asegurate de bloquear todas las marcas en todas las páginas antes de guardar los cambios. Click en ACEPTAR si queres guardar los cambios. O click en CANCELAR para volver atrás.");
                if (confirmar) {
                    $("#bloquear").submit();
                }
                else {
                    return false;
                }
            }
        });
        $("#borrar").click(function() { 
            $(".grupo").each(function() {
                var estado = $(this).find('.quitar a').css('display');
                if (estado!='none') {
                    $(this).remove();
                }
                $(this).find('select').children('option').removeAttr('selected');
            });
            document.getElementById("bloquear").reset();
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
                <p class="col-xs-12"><img src="images/titulos/editardatos.png" class="img-responsive" alt="">Editar revista - Bloquear Marcas</p>
            </div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12 wrap-bloquear">
                <br><br>
                <!-- PAGINA ENVIADO start-->
                <div>
                    <form class="form-inline" action="bloquear_procesar.php" method="post" id="bloquear" name="bloquear" accept-charset="UTF-8">
                    <input type="hidden" id="cant_pag2" name="cant_pag2" value="">
                    <input type="hidden" id="cant_pag3" name="cant_pag3" value="">
                    <input type="hidden" id="cant_pag4" name="cant_pag4" value="">
                    <input type="hidden" id="cant_pag5" name="cant_pag5" value="">
                    <input type="hidden" id="cant_pag6" name="cant_pag6" value="">
                    <input type="hidden" id="cant_pag7" name="cant_pag7" value="">
                    <input type="hidden" id="cant_pag8" name="cant_pag8" value="">

                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
                            <div class="row">
                                <div class="col-sm-9 col-xs-12">
                                    <?php if (isset($_GET["msg_ok"])) { ?>
                                        <p class="pdleft ok"><?php echo($_GET["msg_ok"])?></p>
                                    <?php } ?>
                                    <p class="negro">Para cada p&aacute;gina seleccion&aacute; la marca y la cantidad de productos que quer&eacute;s bloquear de esa marca.<br>
                                    
                                    Si quer&eacute;s agregar m&aacute;s marcas en una misma p&aacute;gina, hac&eacute; click en el bot&oacute;n "Agregar Otra Marca".<br>
                                    Si no querés bloquear ningún producto, dejá la cantidad en 0.<br>
                                    <strong class="ocre">Cuando termines hac&eacute; click en el bot&oacute;n "GUARDAR BLOQUEO" para guardar tus cambios.</strong></p>
                                    <p class="negro">La cantidad de productos por página está limitada por el espacio de avisos publicitarios que fueron cargados.</p>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <a class="pull-right" id="verbloqueo" href="#" data-toggle="modal" data-target="#bloqueoactual" data-backdrop="static" data-keyboard="true">VER BLOQUEO DE MARCAS</a>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <!-- PAGINA 2-->
                                    <div class="col-xs-12 div-pagina" id="2" data-cantidad="<?php echo($totalpag2);?>">
                                        <div class="row">
                                            <h2 class="titulo-bordeinferior">P&Aacute;GINA 2</h2>
                                            <?php 
                                            if ($totalpag2!=0){
                                            ?>
                                            <a class="agregar" href="#" title="Click para agregar otra marca a Pagina 2"><i class="fa fa-plus-circle" aria-hidden="true"></i>AGREGAR OTRA MARCA a PÁGINA 2</a>
                                            <div class="grupos">
                                                <div class="grupo col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <div class="row">
                                                                <select class="form-control marca" id="marca2_1" name="marca2_1">
                                                                    <option value="">Seleccione la marca</option>
                                                                    <?php echo($cadena); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <select class="form-control cantidad" id="cantidad2_1" name="cantidad2_1">
                                                                    <option selected value="0">0</option>
                                                                    <?php echo($cantidad_pag2); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="quitar col-sm-2">
                                                            <div class="row">
                                                                <a href="#"><i class="fa fa-minus-circle" aria-hidden="true" title="Click aquí para quitar esta marca"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            else {
                                                echo("<p class='negro' style='text-align:center;'>Esta página tiene su capacidad completa con avisos publicitarios.</p>");
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                    <!-- PAGINA 3-->
                                    <div class="col-xs-12 div-pagina" id="3" data-cantidad="<?php echo($totalpag3);?>">
                                        <div class="row">
                                            <h2 class="titulo-bordeinferior">P&Aacute;GINA 3</h2>
                                            <?php 
                                            if ($totalpag3!=0) {
                                            ?>
                                            <a class="agregar" href="#" title="Click para agregar otra marca a Pagina 3"><i class="fa fa-plus-circle" aria-hidden="true"></i>AGREGAR OTRA MARCA A PÁGINA 3</a>
                                            <div class="grupos">
                                                <div class="grupo col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <div class="row">
                                                                <select class="form-control marca" id="marca3_1" name="marca3_1">
                                                                    <option value="">Seleccione la marca</option>
                                                                    <?php echo($cadena); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <select class="form-control cantidad" id="cantidad3_1" name="cantidad3_1">
                                                                    <option selected value="0">0</option>
                                                                    <?php echo($cantidad_pag3); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="quitar col-sm-2">
                                                            <div class="row">
                                                                <a href="#"><i class="fa fa-minus-circle" aria-hidden="true" title="Click aquí para quitar esta marca"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            else {
                                                echo("<p class='negro' style='text-align:center;'>Esta página tiene su capacidad completa con avisos publicitarios.</p>");
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                    <!-- PAGINA 4-->
                                    <div class="col-xs-12 div-pagina" id="4" data-cantidad="<?php echo($totalpag4);?>">
                                        <div class="row">
                                            <h2 class="titulo-bordeinferior">P&Aacute;GINA 4</h2>
                                            <?php 
                                            if ($totalpag4!=0) {
                                            ?>
                                            <a class="agregar" href="#" title="Click para agregar otra marca a Pagina 4"><i class="fa fa-plus-circle" aria-hidden="true"></i>AGREGAR OTRA MARCA A PÁGINA 4</a>
                                            <div class="grupos">
                                                <div class="grupo col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <div class="row">
                                                                <select class="form-control marca" id="marca4_1" name="marca4_1">
                                                                    <option value="">Seleccione la marca</option>
                                                                    <?php echo($cadena); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <select class="form-control cantidad" id="cantidad4_1" name="cantidad4_1">
                                                                    <option selected value="0">0</option>
                                                                    <?php echo($cantidad_pag4); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="quitar col-sm-2">
                                                            <div class="row">
                                                                <a href="#"><i class="fa fa-minus-circle" aria-hidden="true" title="Click aquí para quitar esta marca"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            else {
                                                echo("<p class='negro' style='text-align:center;'>Esta página tiene su capacidad completa con avisos publicitarios.</p>");
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                    <!-- PAGINA 5-->
                                    <div class="col-xs-12 div-pagina" id="5" data-cantidad="<?php echo($totalpag5);?>">
                                        <div class="row">
                                            <h2 class="titulo-bordeinferior">P&Aacute;GINA 5</h2>
                                            <?php 
                                            if ($totalpag5!=0) { 
                                            ?>
                                            <a class="agregar" href="#" title="Click para agregar otra marca a Pagina 5"><i class="fa fa-plus-circle" aria-hidden="true"></i>AGREGAR OTRA MARCA A PÁGINA 5</a>
                                            <div class="grupos">
                                                <div class="grupo col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <div class="row">
                                                                <select class="form-control marca" id="marca5_1" name="marca5_1">
                                                                    <option value="">Seleccione la marca</option>
                                                                    <?php echo($cadena); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <select class="form-control cantidad" id="cantidad5_1" name="cantidad5_1">
                                                                    <option selected value="0">0</option>
                                                                    <?php echo($cantidad_pag5); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="quitar col-sm-2">
                                                            <div class="row">
                                                                <a href="#"><i class="fa fa-minus-circle" aria-hidden="true" title="Click aquí para quitar esta marca"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            else {
                                                echo("<p class='negro' style='text-align:center;'>Esta página tiene su capacidad completa con avisos publicitarios.</p>");
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                    <!-- PAGINA 6-->
                                    <div class="col-xs-12 div-pagina" id="6" data-cantidad="<?php echo($totalpag6);?>">
                                        <div class="row">
                                            <h2 class="titulo-bordeinferior">P&Aacute;GINA 6</h2>
                                            <?php 
                                            if ($totalpag6!=0) { 
                                            ?>
                                            <a class="agregar" href="#" title="Click para agregar otra marca a Pagina 6"><i class="fa fa-plus-circle" aria-hidden="true"></i>AGREGAR OTRA MARCA A PÁGINA 6</a>
                                            <div class="grupos">
                                                <div class="grupo col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <div class="row">
                                                                <select class="form-control marca" id="marca6_1" name="marca6_1">
                                                                    <option value="">Seleccione la marca</option>
                                                                    <?php echo($cadena); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <select class="form-control cantidad" id="cantidad6_1" name="cantidad6_1">
                                                                    <option selected value="0">0</option>
                                                                    <?php echo($cantidad_pag6); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="quitar col-sm-2">
                                                            <div class="row">
                                                                <a href="#"><i class="fa fa-minus-circle" aria-hidden="true" title="Click aquí para quitar esta marca"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            else {
                                                echo("<p class='negro' style='text-align:center;'>Esta página tiene su capacidad completa con avisos publicitarios.</p>");
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                    <!-- PAGINA 7-->
                                    <div class="col-xs-12 div-pagina" id="7" data-cantidad="<?php echo($totalpag7);?>">
                                        <div class="row">
                                            <h2 class="titulo-bordeinferior">P&Aacute;GINA 7</h2>
                                            <?php 
                                            if ($totalpag7!=0) { 
                                            ?>
                                            <a class="agregar" href="#" title="Click para agregar otra marca a Pagina 7"><i class="fa fa-plus-circle" aria-hidden="true"></i>AGREGAR OTRA MARCA A PÁGINA 7</a>
                                            <div class="grupos">
                                                <div class="grupo col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <div class="row">
                                                                <select class="form-control marca" id="marca7_1" name="marca7_1">
                                                                    <option value="">Seleccione la marca</option>
                                                                    <?php echo($cadena); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <select class="form-control cantidad" id="cantidad7_1" name="cantidad7_1">
                                                                    <option selected value="0">0</option>
                                                                    <?php echo($cantidad_pag7); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="quitar col-sm-2">
                                                            <div class="row">
                                                                <a href="#"><i class="fa fa-minus-circle" aria-hidden="true" title="Click aquí para quitar esta marca"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            else {
                                                echo("<p class='negro' style='text-align:center;'>Esta página tiene su capacidad completa con avisos publicitarios.</p>");
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                    <!-- PAGINA CONTRATAPA-->
                                    <div class="col-xs-12 div-pagina" id="8" data-cantidad="<?php echo($totalpag8);?>">
                                        <div class="row">
                                            <h2 class="titulo-bordeinferior">P&Aacute;GINA CONTRATAPA</h2>
                                            <?php 
                                            if ($totalpag8!=0) { 
                                            ?>
                                            <a class="agregar" href="#" title="Click para agregar otra marca a Pagina Contratapa"><i class="fa fa-plus-circle" aria-hidden="true"></i>AGREGAR OTRA MARCA A CONTRATAPA</a>
                                            <div class="grupos">
                                                <div class="grupo col-md-4 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-8">
                                                            <div class="row">
                                                                <select class="form-control marca" id="marca8_1" name="marca8_1">
                                                                    <option value="">Seleccione la marca</option>
                                                                    <?php echo($cadena); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <div class="row">
                                                                <select class="form-control cantidad" id="cantidad8_1" name="cantidad8_1">
                                                                    <option selected value="0">0</option>
                                                                    <?php echo($cantidad_pag8); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="quitar col-sm-2">
                                                            <div class="row">
                                                                <a href="#"><i class="fa fa-minus-circle" aria-hidden="true" title="Click aquí para quitar esta marca"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            else {
                                                echo("<p class='negro' style='text-align:center;'>Esta página tiene su capacidad completa con avisos publicitarios.</p>");
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <input type="button" class="btn btn-default guardarbloqueo" value="GUARDAR BLOQUEO" id="guardar" name="guardar">
                                        <input type="button" class="btn btn-default borrarbloqueo pull-right" value="BORRAR BLOQUEO" id="borrar" name="borrar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                 <!-- PAGINA ENVIADO end-->
                
            </div>
            <!-- Diseniar end-->
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
        </div>
</div>
       
<!-- Modal Bloqueo -->
<div id="bloqueoactual" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="float: left;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="wrapbloqueo">
            <div class="wrappag">
                <p class="titulo-bordeinferior">P&Aacute;GINA 2</p>
                <?php 
                $select_bl=mysql_query("select cara, cantidad, nombre, logo from bloqueo, marcas where cara='pag2' and marca=marcas.Id");
                if ($row_bl=mysql_fetch_array($select_bl)) {
                    do { 
                ?>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h4><?php echo($row_bl['nombre']);?></h4>
                            <img src="images/<?php echo($row_bl['logo']);?>" style="height:50px;" class="img-responsive center-block">
                            <p><?php echo($row_bl['cantidad']);?> productos</p>
                        </div>
                <?php

                    } while ($row_bl=mysql_fetch_array($select_bl));  
                }
                else {
                ?>
                <div class="col-sm-12 col-xs-12">
                    <p>Esta pagina no tiene marcas bloqueadas.</p>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="wrappag">
                <p class="titulo-bordeinferior">P&Aacute;GINA 3</p>
                <?php 
                $select_bl=mysql_query("select cara, cantidad, nombre, logo from bloqueo, marcas where cara='pag3' and marca=marcas.Id");
                if ($row_bl=mysql_fetch_array($select_bl)) {
                    do { 
                ?>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h4><?php echo($row_bl['nombre']);?></h4>
                            <img src="images/<?php echo($row_bl['logo']);?>" style="height:50px;" class="img-responsive center-block">
                            <p><?php echo($row_bl['cantidad']);?> productos</p>
                        </div>
                <?php

                    } while ($row_bl=mysql_fetch_array($select_bl));  
                }
                else {
                ?>
                <div class="col-sm-12 col-xs-12">
                    <p>Esta pagina no tiene marcas bloqueadas.</p>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="wrappag">
                <p class="titulo-bordeinferior">P&Aacute;GINA 4</p>
                <?php 
                $select_bl=mysql_query("select cara, cantidad, nombre, logo from bloqueo, marcas where cara='pag4' and marca=marcas.Id");
                if ($row_bl=mysql_fetch_array($select_bl)) {
                    do { 
                ?>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h4><?php echo($row_bl['nombre']);?></h4>
                            <img src="images/<?php echo($row_bl['logo']);?>" style="height:50px;" class="img-responsive center-block">
                            <p><?php echo($row_bl['cantidad']);?> productos</p>
                        </div>
                <?php

                    } while ($row_bl=mysql_fetch_array($select_bl));  
                }
                else {
                ?>
                <div class="col-sm-12 col-xs-12">
                    <p>Esta pagina no tiene marcas bloqueadas.</p>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="wrappag">
                <p class="titulo-bordeinferior">P&Aacute;GINA 5</p>
                <?php 
                $select_bl=mysql_query("select cara, cantidad, nombre, logo from bloqueo, marcas where cara='pag5' and marca=marcas.Id");
                if ($row_bl=mysql_fetch_array($select_bl)) {
                    do { 
                ?>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h4><?php echo($row_bl['nombre']);?></h4>
                            <img src="images/<?php echo($row_bl['logo']);?>" style="height:50px;" class="img-responsive center-block">
                            <p><?php echo($row_bl['cantidad']);?> productos</p>
                        </div>
                <?php

                    } while ($row_bl=mysql_fetch_array($select_bl));  
                }
                else {
                ?>
                <div class="col-sm-12 col-xs-12">
                    <p>Esta pagina no tiene marcas bloqueadas.</p>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="wrappag">
                <p class="titulo-bordeinferior">P&Aacute;GINA 6</p>
                <?php 
                $select_bl=mysql_query("select cara, cantidad, nombre, logo from bloqueo, marcas where cara='pag6' and marca=marcas.Id");
                if ($row_bl=mysql_fetch_array($select_bl)) {
                    do { 
                ?>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h4><?php echo($row_bl['nombre']);?></h4>
                            <img src="images/<?php echo($row_bl['logo']);?>" style="height:50px;" class="img-responsive center-block">
                            <p><?php echo($row_bl['cantidad']);?> productos</p>
                        </div>
                <?php

                    } while ($row_bl=mysql_fetch_array($select_bl));  
                }
                else {
                ?>
                <div class="col-sm-12 col-xs-12">
                    <p>Esta pagina no tiene marcas bloqueadas.</p>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="wrappag">
                <p class="titulo-bordeinferior">P&Aacute;GINA 7</p>
                <?php 
                $select_bl=mysql_query("select cara, cantidad, nombre, logo from bloqueo, marcas where cara='pag7' and marca=marcas.Id");
                if ($row_bl=mysql_fetch_array($select_bl)) {
                    do { 
                ?>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h4><?php echo($row_bl['nombre']);?></h4>
                            <img src="images/<?php echo($row_bl['logo']);?>" style="height:50px;" class="img-responsive center-block">
                            <p><?php echo($row_bl['cantidad']);?> productos</p>
                        </div>
                <?php

                    } while ($row_bl=mysql_fetch_array($select_bl));  
                }
                else {
                ?>
                <div class="col-sm-12 col-xs-12">
                    <p>Esta pagina no tiene marcas bloqueadas.</p>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="wrappag">
                <p class="titulo-bordeinferior">CONTRATAPA</p>
                <?php 
                $select_bl=mysql_query("select cara, cantidad, nombre, logo from bloqueo, marcas where cara='contratapa' and marca=marcas.Id");
                if ($row_bl=mysql_fetch_array($select_bl)) {
                    do { 
                ?>
                        <div class="col-sm-4 col-xs-12 text-center">
                            <h4><?php echo($row_bl['nombre']);?></h4>
                            <img src="images/<?php echo($row_bl['logo']);?>" style="height:50px;" class="img-responsive center-block">
                            <p><?php echo($row_bl['cantidad']);?> productos</p>
                        </div>
                <?php

                    } while ($row_bl=mysql_fetch_array($select_bl));  
                }
                else {
                ?>
                <div class="col-sm-12 col-xs-12">
                    <p>Esta pagina no tiene marcas bloqueadas.</p>
                </div>
                <?php 
                }
                ?>
            </div>
        </div>
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
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
</body>
</html>
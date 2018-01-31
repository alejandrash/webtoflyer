<?php 
    session_set_cookie_params(21600,"/");
    session_start();
    include("includes/conexion.php");
    if (!isset($_SESSION['ESTADO'])) {
        header("Location:index.php");
    }


    $usuario=$_SESSION['ESTADO'];
    header("Content-Type:text/html; charset=utf-8");
    $select_us=mysql_query("select * from usuarios WHERE email='$usuario'");
    $row_usua=mysql_fetch_array($select_us);
?>
<?php 
//FECHA para cabecera
            $datecab = date('Y-F', strtotime('+1 month')); 
            $datecab = explode("-", $datecab);
            $aniocab = $datecab[0]; 
            $mescab = $datecab[1];
            switch ($mescab) {
                case "January":
                    $mescab="Enero";
                    break;
                case "February":
                    $mescab="Febrero";
                    break;
                case "March":
                    $mescab="Marzo";
                    break;
                case "April":
                    $mescab="Abril";
                    break;
                case "May":
                    $mescab="Mayo";
                    break;
                case "June":
                    $mescab="Junio";
                    break;
                case "July":
                    $mescab="Julio";
                    break;
                case "August":
                    $mescab="Agosto";
                    break;
                case "September":
                    $mescab="Septiembre";
                    break;
                case "October":
                    $mescab="Octubre";
                    break;
                case "November":
                    $mescab="Noviembre";
                    break;
                case "December":
                    $mescab="Diciembre";
                    break;
            }
//CONSULTA AVISOS PUBLICITARIOS
$cadena1 = '';
$cadena2 = '';
$cadena3 = '';
$cadena4 = '';
$result_avisos=mysql_query("select * from banners_flyer WHERE cara='tapa' and posicion='1'");
if ($row_avisos=mysql_fetch_array($result_avisos)) {
    $cadena1 = '<div id="uno" class="cajaproducto producto-big completed" txt-legales=""><img width="366" height="345" src="flyer/'.$row_avisos['url'].'" alt=""></div>';
}
else {
    $cadena1 = '<div id="uno" class="cajaproducto producto-big" txt-legales=""><a rel="1" class="insertar" href="productos.php" title="Insertar producto"></a></div>';
}
$result_avisos=mysql_query("select * from banners_flyer WHERE cara='tapa' and posicion='2'");
if ($row_avisos=mysql_fetch_array($result_avisos)) {
    $cadena2 = '<div id="dos" class="cajaproducto producto-big completed" txt-legales="" style="float:right;"><img width="366" height="345" src="flyer/'.$row_avisos['url'].'" alt=""></div>';
}
else {
    $cadena2 = '<div id="dos" class="cajaproducto producto-big" txt-legales="" style="float:right;"><a rel="2" class="insertar" href="productos.php" title="Insertar producto"></a></div>';
}
$result_avisos=mysql_query("select * from banners_flyer WHERE cara='tapa' and posicion='3'");
if ($row_avisos=mysql_fetch_array($result_avisos)) {
    $cadena3 = '<div id="tres" class="cajaproducto producto-big completed" txt-legales=""><img width="366" height="345" src="flyer/'.$row_avisos['url'].'" alt=""></div>';
}
else {
    $cadena3 = '<div id="tres" class="cajaproducto producto-big" txt-legales=""><a rel="3" class="insertar" href="productos.php" title="Insertar producto"></a></div>';
}
$result_avisos=mysql_query("select * from banners_flyer WHERE cara='tapa' and posicion='4'");
if ($row_avisos=mysql_fetch_array($result_avisos)) {
    $cadena4 = '<div id="cuatro" class="cajaproducto producto-big completed" txt-legales="" style="float:right;"><img width="366" height="345" src="flyer/'.$row_avisos['url'].'" alt=""></div>';
}
else {
    $cadena4 = '<div id="cuatro" class="cajaproducto producto-big" txt-legales="" style="float:right;"><a rel="4" class="insertar" href="productos.php" title="Insertar producto"></a></div>';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>WEB TO FLYER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" /> 
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/wtf.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Tulpen+One" rel="stylesheet">
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/funciones.js"></script>
<link href='css/sweetalert.css' rel='stylesheet' type='text/css'>
<script src="js/sweetalert.min.js"></script>
<script src="js/diseniar.js"></script>
 <script type="text/javascript"> 
            var cambiado = 0;
            var status = "";
            var numCaja = 1;
            var relprod = '';
            var precioContado = '';
            var tea = '';
            var cft = '';
            var coef = '';
            var txtlegales = '';
            var tarjetaVal = '';
            var bancoVal = '';
            var cuotasVal = '';
            var idFinan2 = '';
            var varprod = "#uno";
            var idcucarda = '';
            var numCajaQuitar = '';
            var long = '';
            var cara = 'tapa';

     $(window).on('load', function () {
		SameHeight('.listado-prod li.col-md-5ths .content');
        $("#cargando").fadeOut();
      });


     function checkSession() {
        <?php 
            $redirigir = 0;
            if ((!isset($_SESSION['ESTADO'])) || ($_SESSION['ESTADO']=='')) {
                //header("Location:index.php");   
    		}
        ?>
    }


    // CARGAR LEGALES EN PIE
    function cargarLegales() {
        var completarLegal = '';
        $("#flyercontainer .cajaproducto").each(function() {
            var numeroVal = $(this).find('.numero').text();
            var stockVal = $(this).find('.frases .stock').val();
            if (stockVal === undefined || stockVal === null) {
            	stockVal = 5;
            }
            if (numeroVal === '') {
                numeroVal = $(this).attr('id');
                if (numeroVal == 'uno') {
                    numeroVal = '1)';
                }
                if (numeroVal == 'dos') {
                    numeroVal = '2)';
                }
                if (numeroVal == 'tres') {
                    numeroVal = '3)';
                }
                if (numeroVal == 'cuatro') {
                    numeroVal = '4)';
                }
            }
            completarLegal = completarLegal + numeroVal + ' STOCK: '+stockVal+' U ';
        });
        $("#flyercontainer .legalespie").html('Los precios contado son válidos en efectivo, tarjeta de débito ó tarjeta de crédito en 1 pago. Consulte por otros planes de financiación.'+completarLegal);
    }
     

        $(document).ready(function () {
            $("#cargando").fadeIn();

            //CLICK en Producto del listado
            $('#wraprod').on('click', ':checkbox', function() { 
                
                
            	checkSession();
                var checkValor = $(this).val();
                long = $( "#flyercontainer .completed" ).length;
                $(this).parent().parent().parent('li').fadeOut( 'normal', function(){
                  if (numCaja <= 2) {
                      $("html, body").animate({
                             scrollTop: $("#flyercontainer").offset().top
                      }, 800);
                  }
                  else {
                      $("html, body").animate({
                             scrollTop: $("#flyercontainer #tres").offset().top
                      }, 800);
                  }
                });

                var formatoproducto = "productohome-enflyer.php";
                if (long <= 5) {
                    $('#cargando').fadeIn();
                    $.ajax({
                        type: "POST",
                        url: formatoproducto,
                        dataType: "html",
                        data: {
                            'id': checkValor
                        },
                        success: function(data) { 
                            $('#cargando').fadeOut();
                            precioContado = '';
                            relprod = '';
                            if(numCaja == 1) {
                                $('#uno').addClass('completed');
                                $("#uno").html(data); 
                                $("#flyercontainer #uno .numero").text('1) ');
                                $("#flyercontainer #uno .bottom input").attr('rel', '1');
                                $("#flyercontainer #uno .zona-cuota input").attr('rel', '1');
                                $("#flyercontainer #uno .seletarjetas").attr('rel', '1');
                                $("#flyercontainer #uno .selebancos").attr('rel', '1');
                                $("#flyercontainer #uno .selecuotas").attr('rel', '1');
                                $("#flyercontainer #uno .cft").attr('rel', '1');
                                $("#flyercontainer #uno .ptf").attr('rel', '1');
                                $("#flyercontainer #uno .tea").attr('rel', '1');
                                return false;
                            }
                            if(numCaja == 2) {
                                $('#dos').addClass('completed');
                                $("#dos").html(data); 
                                $("#flyercontainer #dos .numero").text('2) ');
                                $("#flyercontainer #dos .bottom input").attr('rel', '2');
                                $("#flyercontainer #dos .zona-cuota input").attr('rel', '2');
                                $("#flyercontainer #dos .seletarjetas").attr('rel', '2');
                                $("#flyercontainer #dos .selebancos").attr('rel', '2');
                                $("#flyercontainer #dos .selecuotas").attr('rel', '2');
                                $("#flyercontainer #dos .cft").attr('rel', '2');
                                $("#flyercontainer #dos .ptf").attr('rel', '2');
                                $("#flyercontainer #dos .tea").attr('rel', '2');
                                return false;
                            }
                            if(numCaja == 3) {
                                $('#tres').addClass('completed');
                                $("#tres").html(data); 
                                $("#flyercontainer #tres .numero").text('3) ');
                                $("#flyercontainer #tres .bottom input").attr('rel', '3');
                                $("#flyercontainer #tres .zona-cuota input").attr('rel', '3');
                                $("#flyercontainer #tres .seletarjetas").attr('rel', '3');
                                $("#flyercontainer #tres .selebancos").attr('rel', '3');
                                $("#flyercontainer #tres .selecuotas").attr('rel', '3');
                                $("#flyercontainer #tres .cft").attr('rel', '3');
                                $("#flyercontainer #tres .ptf").attr('rel', '3');
                                $("#flyercontainer #tres .tea").attr('rel', '3');
                                return false;
                            }
                            if(numCaja == 4) {
                                $('#cuatro').addClass('completed');
                                $("#cuatro").html(data); 
                                $("#flyercontainer #cuatro .numero").text('4) ');
                                $("#flyercontainer #cuatro .bottom input").attr('rel', '4');
                                $("#flyercontainer #cuatro .zona-cuota input").attr('rel', '4');
                                $("#flyercontainer #cuatro .seletarjetas").attr('rel', '4');
                                $("#flyercontainer #cuatro .selebancos").attr('rel', '4');
                                $("#flyercontainer #cuatro .selecuotas").attr('rel', '4');
                                $("#flyercontainer #cuatro .cft").attr('rel', '4');
                                $("#flyercontainer #cuatro .ptf").attr('rel', '4');
                                $("#flyercontainer #cuatro .tea").attr('rel', '4');
                                return false;
                            }
                            if(numCaja == 5) {
                                $('#cinco').addClass('completed');
                                $("#cinco").html(data); 
                                $("#flyercontainer #cinco .numero").text('5) ');
                                $("#flyercontainer #cinco .bottom input").attr('rel', '5');
                                $("#flyercontainer #cinco .zona-cuota input").attr('rel', '5');
                                $("#flyercontainer #cinco .seletarjetas").attr('rel', '5');
                                $("#flyercontainer #cinco .selebancos").attr('rel', '5');
                                $("#flyercontainer #cinco .selecuotas").attr('rel', '5');
                                $("#flyercontainer #cinco .cft").attr('rel', '5');
                                $("#flyercontainer #cinco .ptf").attr('rel', '5');
                                $("#flyercontainer #cinco .tea").attr('rel', '5');
                            }
                            long = $( "#flyercontainer .completed" ).length;
                        }
                    });
                } 
                if (long == 3) {
                    $('.continuar').removeClass('disabled');
                    //$('.continuar').addClass('verde');
                }
            }); 

            /* Funcionalidad Desplegable Promo Pie*/
            $('#promopie').on('click', ".modal-body .col-xs-12 img", function() { 
                pieUrl = $(this).attr('src');
                $('.promospie').html('<img src="'+pieUrl +'" alt="" height="85" style="width:100%; float:left; position:relative; top:-30px;" title="Click para modificar el banner">');
                $('#promopie').modal('toggle');
            });
            
            $('#wraprod').on('click', '#btnbuscar', function(e) { 
                e.preventDefault();
                var buscar = $('#buscar').val();
                $.ajax({
                       type: "POST",
                       dataType: "html",
                       url: "buscarprod.php",
                       data: {
                            'buscar': buscar
                        },
                       success: function(data)
                       {
                           $("#wraprod #seleccion-prod ul").html(data); 
                           $('#wraprod').find('input[type=checkbox]').each(function () {
                                $(this).prop('checked', false);
                                var checkelem = $(this);
                                var valorCh = $(this).val();
                                $('#flyercontainer').find('.quitar').each(function(){
                                    var quitar = $(this).attr('id');
                                    if (valorCh == quitar) {
                                        $(checkelem).parent().parent().parent().fadeOut();
                                    }
                                });
                           });
                           e.preventDefault();
                            return false;
                       },
                       complete: function(data)
                       {
                           var cantItems = $("#wraprod #seleccion-prod ul li").length; 
                           var cantPaginas = (cantItems/10);
                           var cadenaPaginacion = '';
                           <?php
                                if (!isset($_GET['id_cat'])) {
                                    $_SESSION['id_cat']='';
                                }
                           ?>
                           var id_cat = '<?php echo($_SESSION['id_cat']);?>';
                           for(i = 1; i <= cantPaginas; i++) { 
                                cadenaPaginacion = cadenaPaginacion+'<a href="'+i+'">'+i+'</a>';
                           }
                           $("#wraprod .paginacion").html(cadenaPaginacion);
                           $("#wraprod .paginacion a").addClass('postbusqueda');
                           $("#wraprod #seleccion-prod").css('overflow','hidden');
                           $("#wraprod #seleccion-prod ul").css('position','relative');
                           var cuantasPag = $('#wraprod .paginacion a').length;
                            var anchoPag = (cuantasPag * 40) + 120;
                            if (cuantasPag > 10) {
                                $('#wraprod .paginacion').css('width', anchoPag);
                                var estadoLeft = $('#wraprod .paginacion a').position().left;
                                if (estadoLeft <= 45) {
                                    $(".slider-paginacion .prev").css('display', 'none');
                                }
                                if (anchoPag <= 800) {
                                    $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none!important');
                                }
                            }
                            else {
                                $('#wraprod .paginacion').css('width', '800px');
                                $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                            }
                       }
                    });
                return false;
            });
            $('#wraprod').on('submit', '#buscar-prod', function(e) { 
                $(':submit').attr('disabled', 'disabled');
                e.stopPropagation();
                return false;
            });
            
            $('#wraprod').on('click', '.paginacion a.postbusqueda', function(e) { 
                $('#wraprod .paginacion a.postbusqueda').removeClass('active');
                $(this).addClass('active');
                var enlace = $(this).attr('href');
                var ubicacion = (((enlace * 10) + 1)-10);
                if (enlace == 1) {
                    ubicacion = 1;
                }
                ubicacion = "#wraprod #seleccion-prod ul #0000-"+ubicacion;
                var elegido = $(ubicacion).position().top;
                $("#wraprod #seleccion-prod ul").css({top: -elegido});
                e.stopPropagation();
                return false;
            });

            <?php
            if (!isset($_SESSION{"tapa_8_".$_SESSION['ESTADO']})) {
                $result_esta=mysql_query("select * from rating_productos WHERE usuario='$usuario' and cara='tapa' and tipo='8' and actual='si'");
                if($row_esta=mysql_fetch_array($result_esta)){
                    //$delete_esta=mysql_query("DELETE FROM rating_productos WHERE usuario='$usuario' and cara='tapa' and tipo='8' and actual='si'");
                }
            }
            if (isset($_SESSION{"contratapa_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_contratapa').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"pag2_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_2').removeClass('disabled');
            <?php }
            if (isset($_SESSION{"pag3_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_3').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"pag4_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_4').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"pag5_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_5').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"pag6_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_6').removeClass('disabled');
            <?php }
            if (isset($_SESSION{"pag7_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_7').removeClass('disabled');
            <?php }
            
            if (isset($_SESSION{"tapa_8_".$_SESSION['ESTADO']})) { ?>
            
                var content = '<?php $_SESSION{"tapa_8_".$_SESSION['ESTADO']}; ?>';
                $('.editar_partes #ed_tapa').removeClass('disabled');
                $.ajax({
                       type: "POST",
                       dataType: "html",
                       url: "recuperartapa_8.php",
                       data: {
                            'content': content
                        },
                       success: function(data)
                       {
                           $("#flyercontainer").html(data);  
                           long = $( "#flyercontainer .completed" ).length;
                            if (long > 0) {
                                $('.guardar').removeClass('disabled');
                            }
                            if (long == 4) {
                                $('.continuar').removeClass('disabled');
                                //$('.continuar').addClass('verde');
                            }
                            if (long < 4) {
                                $('.continuar').addClass('disabled');
                                //$('.continuar').removeClass('verde');
                            }  
                            $('#flyercontainer').find('a.seletarjetas').each(function () {
                                        var imgurl = $(this).children('img').attr('src');
                                        if (imgurl=='images/tarjetas/credito-personal.jpg') {
                                            $(this).parent().find('.selebancos').text('');
                                        }
                            });                     
                            return false;
                       }
                });
                
                $("#wraprod").load( "productos-inner.php", function() {
                    $('#btndown').fadeIn();
                    $("html, body").animate({
                             scrollTop: $(".wrap-diseniar").offset().top
                    }, 800);
                    
                    $('#wraprod').find('input[type=checkbox]').each(function () {
                        $(this).prop('checked', false);
                        var checkelem = $(this);
                        var valorCh = $(this).val();
                        $('#flyercontainer').find('.quitar').each(function(){
                            var quitar = $(this).attr('id');
                            if (valorCh == quitar) {
                                $(checkelem).parent().parent().parent().fadeOut(); 
                            }
                        });
                     }); 
                });
                $('#wraprod').css('height','1090px');                         
                
            <?php
            }
            ?>
            
            <?php
            if (isset($_GET['pagina'])) { 
            ?>
            $('#wraprod').find('input[type=checkbox]').each(function () {
                        $(this).prop('checked', false);
                        var checkelem = $(this);
                        var valorCh = $(this).val();
                        $('#flyercontainer').find('.quitar').each(function(){
                            var quitar = $(this).attr('id');
                            if (valorCh == quitar) {
                                $(checkelem).parent().parent().parent().fadeOut(); 
                            }
                        });
            });
            <?php
            }
            ?>
            
            
            
            //GUARDAR AVANCE 
            $(".guardar").click(function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $.ajax({
                            type: "POST",
                            dataType : "html",
                            url: "renuevarating.php",
                            data: {
                                cara: "tapa"
                            }
                    });
                    
                    $('#cargando').fadeIn();
                    var sesion = {};
                    var flyer = {};
                    var cara = "tapa";
                    sesion = $('#flyercontainer').html();
                    flyer = $('#flyercontainer').html();
                    flyer = flyer.replace(/images/g, "../../images");
                    flyer = flyer.replace(/"flyer/g, '"../../flyer'); 
                    <?php 
                    if (isset($_SESSION{"archivo_tapa_8_".$_SESSION['ESTADO']})) { ?>
                        var name = '<?php echo($_SESSION{"archivo_tapa_8_".$_SESSION['ESTADO']}); ?>';
                    <?php 
                    }
                    else {
                    ?>
                    var name = '<?php echo("flyer/html/FLYER_TAPA_8_".date('m-d-Y_hia').".html"); ?>';
                    <?php 
                    }
                    ?>
                    var fecha = '<?php echo(date("Y-m-d H:i:s")); ?>';
                    $.ajax({
                            type: "POST",
                            dataType : "html",
                            url: "createhtml.php",
                            data: {
                                sesion: sesion,
                                cara: cara,
                                flyer: flyer,
                                name: name,
                                fecha: fecha
                            },
                            success: function(data){
                            	cambiado = 0;
                                $('#cargando').fadeOut();
                            }
                    });
                    var id_quitar = []; 
                    var txt_legales = [];
                    var cara = "tapa";
                    var limite = 5;
                    var id_sesion = '<?php echo($_SESSION['SESIONFLY']); ?>';
                    $( "#flyercontainer .quitar" ).each(function() {
                        id_quitar.push($(this).attr('id'));
                        txt_legales.push($(this).closest('.cajaproducto').attr('txt-legales'));
                    });
                    $.ajax({
                                        type: "POST",
                                        url: "guardarating.php",
                                        dataType : "html",
                                        data: {
                                            id_quitar: id_quitar,
                                            cara: cara,
                                            id_sesion: id_sesion,
                                            limite: limite,
                                            txt_legales: txt_legales
                                        },
                                        complete: function(data){
                                            console.log(data);
                                        },
                                        error: function( xhr, status ) {
                                            return false;
                                        }
                    });
            });
            
            //CONTINUAR PROXIMO PASO 
            $(".continuar").click(function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $.ajax({
                            type: "POST",
                            dataType : "html",
                            url: "renuevarating.php",
                            data: {
                                cara: "tapa"
                            }
                    });
                    cargarLegales();
                    var controlStock = 0;
                    var controlPContado = 0;
                    var controlPCuota = 0;
                    var hayerror = 0;
                    $("#flyercontainer .cajaproducto .frases .stock").each(function() {
                        if ($(this).val() == '') {
                            controlStock = 1;
                        } 
                    });
                    if (controlStock == 1) {
                        hayerror = 1;
                        swal("Error", "Completa el STOCK de todos los productos.", "error");
                        return false;
                    }
                    $("#flyercontainer .cajaproducto .bottom input.big").each(function() {
                        if ($(this).val() == '$0,00') {
                            controlPContado = 1;
                        } 
                    });
                    if (controlPContado == 1) {
                        hayerror = 1;
                        swal("Error", "Completa el PRECIO CONTADO de todos los productos.", "error");
                        return false;
                    }
                    $("#flyercontainer .cajaproducto .tachado input").each(function() {
                        if ($(this).val() == '$0,00') {
                            $(this).parent().parent().removeClass('tachado');
                            $(this).parent().parent().children('.quitartachado').css('display','none');
                            $(this).parent().parent().children('.agregartachado').css('display','block');
                        } 
                    });
                    if (controlPCuota == 1) {
                    }
                    /* CONTROL PROMO PIE */
                    var controlpie = $('.promospie').html();
                    if (controlpie == 'CLICK PARA SELECCIONAR UN BANNER...') {
                        hayerror = 1;
                        swal("Error", "Debe seleccionar un banner para el pie de pagina.", "error");
                        $("html, body").animate({
                            scrollTop: $("#end").offset().top
                        }, 800);
                        return false;
                    }
                    if (hayerror == 0) {
                        $('#cargando').fadeIn();
                        var id_quitar = []; 
                        var txt_legales = [];
                        var cara = "tapa";
                        var limite = 5;
                        var id_sesion = '<?php echo($_SESSION['SESIONFLY']); ?>';
                        $( "#flyercontainer .quitar" ).each(function() {
                            id_quitar.push($(this).attr('id'));
                            txt_legales.push($(this).closest('.cajaproducto').attr('txt-legales'));
                        });
                        $.ajax({
                                            type: "POST",
                                            url: "guardarating.php",
                                            dataType : "html",
                                            data: {
                                                id_quitar: id_quitar,
                                                cara: cara,
                                                id_sesion: id_sesion,
                                                limite: limite,
                                                txt_legales: txt_legales
                                            },
                                            complete: function(data){
                                                console.log(data);
                                            },
                                            error: function( xhr, status ) {
                                                return false;
                                            }
                        });
                        var sesion = {};
                        var flyer = {};
                        var cara = "tapa";
                        sesion = $('#flyercontainer').html();
                        $('#flyercontainer .quitar, #flyercontainer .eliminar-sda, #flyercontainer #agregar-sda img, #flyercontainer .frases, #flyercontainer .selecucarda span, #flyercontainer .tachado .quitartachado, #flyercontainer .agregartachado').remove();
                        flyer = $('#flyercontainer').html();
                        flyer = flyer.replace(/images/g, "../../images");
                        flyer = flyer.replace(/"flyer/g, '"../../flyer'); 
                        <?php 
                        if (isset($_SESSION{"archivo_tapa_8_".$_SESSION['ESTADO']})) { ?>
                            var name = '<?php echo($_SESSION{"archivo_tapa_8_".$_SESSION['ESTADO']}); ?>';
                        <?php 
                        }
                        else {
                        ?>
                        var name = '<?php echo("flyer/html/FLYER_TAPA_8_".date('m-d-Y_hia').".html"); ?>';
                        <?php 
                        }
                        ?>
                        var fecha = '<?php echo(date("Y-m-d H:i:s")); ?>';
                        $.ajax({
                                type: "POST",
                                dataType : "html",
                                url: "createhtml.php",
                                data: {
                                    sesion: sesion,
                                    cara: cara,
                                    flyer: flyer,
                                    name: name,
                                    fecha: fecha
                                },
                                success: function(data){
                                    $('#cargando').fadeOut();
                                    //alert("Proximo paso: en construccion....");
                                    window.location.href = "diseniar-8-paginas_contratapa.php";
                                }
                        });
                    }
            });
});
     

    </script>
</head> 
<body>
   <div id="datacontainer" style="display:none;"></div>
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
            <div class="header_bg" style="position:relative;">
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
				  <a href="#end" id="btndown" title="Pie de p&aacute;gina"><img src="images/btn-down.png" alt=""></a>
            </div>
            <!-- //header-ends -->
           <div id="wraprod"></div>
           <div class="col-xs-12 titulogris">
                <p class="col-xs-12"><img src="images/titulos/diseniar.png" class="img-responsive" alt=""> DISEÑAR - Editando TAPA</p>
            </div>
           <?php 
                $sessionId = $_SESSION['IDUSER'];
                $result_pie=mysql_query("select * from promos_pie WHERE visible='0' OR visible='$sessionId' ORDER BY Id DESC");
            ?>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!--START LATERAL-->
                        <div id="lateral" class="lateral col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
                            <div class="row">
                                <div class="editar_partes">
                                    <ul>
                                        <li><a id="ed_tapa" class="disabled activada" href="diseniar-8-paginas.php" title="EDITAR TAPA">TAPA</a></li>
                                        <li><a id="ed_contratapa" class="disabled" href="diseniar-8-paginas_contratapa.php" title="EDITAR CONTRATAPA">CONTRATAPA</a></li>
                                        <li><a id="ed_2" class="disabled" href="diseniar-8-paginas_1.php" title="EDITAR PAGINA 2"><strong>2</strong></a></li>
                                        <li><a id="ed_3" class="disabled" href="diseniar-8-paginas_2.php" title="EDITAR PAGINA 3"><strong>3</strong></a></li>
                                        <li><a id="ed_4" class="disabled" href="diseniar-8-paginas_3.php" title="EDITAR PAGINA 4"><strong>4</strong></a></li>
                                        <li><a id="ed_5" class="disabled" href="diseniar-8-paginas_4.php" title="EDITAR PAGINA 5"><strong>5</strong></a></li>
                                        <li><a id="ed_6" class="disabled" href="diseniar-8-paginas_5.php" title="EDITAR PAGINA 6"><strong>6</strong></a></li>
                                        <li><a id="ed_7" class="disabled" href="diseniar-8-paginas_6.php" title="EDITAR PAGINA 7"><strong>7</strong></a></li>
                                    </ul>
                                    <p class="boton"><a title="VISTA PREVIA" class="preview" href="#" data-toggle="modal" data-target="#preview" data-backdrop="static" data-keyboard="true"><i class="fa fa-eye" aria-hidden="true"></i> VISTA PREVIA</a></p>
                                    <p class="boton"><a title="GUARDAR AVANCE" class="guardar verde" href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i> GUARDAR</a></p>
                                    <p class="boton"><a title="CONTINUAR AL SIGUIENTE PASO" class="continuar disabled" href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i> GUARDAR Y CONTINUAR</a></p>
                                </div>
                            </div>
                        </div>
                    <!--END LATERAL-->
                    <?php
                       /*VERIFICO SY TIENE FLYER SIN TERMINAR */
                        $hay = 0;
                        $result_fly=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='tapa' and terminado='no' ORDER BY Id DESC LIMIT 1");
                        $id_sesion = $_SESSION['SESIONFLY'];
                        if ($row_fly=mysql_fetch_array($result_fly)) {
                            $hay = 1;
                        }
                        //$row_fly=mysql_fetch_array($result_fly);
                        if ($hay == 1) {
                            if (($row_fly['id_sesion']!=$id_sesion) || (!isset($_SESSION{"tapa_8_".$_SESSION['ESTADO']}))) {
                                if (!isset($_GET['contin'])) { ?>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('a.guardar').addClass('disabled');
                                        });
                                    </script>
                                <?php
                                    echo('<div id="wrap-enviado" class="col-lg-8 col-md-8 col-sm-9 col-xs-12 eleccion"><br><br><br><br><p class="titulo-pico">Dejaste un flyer sin terminar desde tu &uacute;ltima conexi&oacute;n a WTF.</p><br><br> <a class="btn col-xs-3 col-xs-offset-2" href="diseniar-8-paginas.php?contin=si" title="Click aqui para continuar el diseño"><img src="images/continuardis.jpg" class="img-responsive out" alt=""><img src="images/continuardis_over.jpg" class="img-responsive over" alt=""></a> <a class="comenzar btn col-xs-offset-2 col-xs-3" title="Click aqui para comenzar un nuevo diseño de flyer" href="diseniar-8-paginas.php?nuevo=si"><img src="images/nuevodis.jpg" class="img-responsive out" alt=""><img src="images/nuevodis_over.jpg" class="img-responsive over" alt=""></a></div>');
                                }
                                if (isset($_GET['nuevo'])) {
                                    $result_fly=mysql_query("DELETE from flyers WHERE tipo='8' and usuario='$usuario' and id_sesion!='$id_sesion' AND terminado='no'");
                                    $result_esta=mysql_query("select * from rating_productos WHERE usuario='$usuario' and tipo='8' and actual='si'");
                                   if ($row_esta=mysql_fetch_array($result_esta))
                                   {
                                        do {
                                           $id = $row_esta['Id'];
                                           $orden = $row_esta['nro_orden'];
                                           if ($orden == 0) {
                                                $delete_esta=mysql_query("DELETE FROM rating_productos WHERE Id = '$id'");
                                           }
                                           else {
                                                $result=mysql_query("UPDATE rating_productos set actual='no' WHERE usuario='$usuario' and tipo='8'") or die(mysql_error());
                                           }
                                        } while ($row_esta=mysql_fetch_array($result_esta));
                                    }
                                    header("Location:diseniar-8-paginas.php");
                                ?>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#wrap-enviado').css('display','none');
                                        $('a.guardar, #ed_tapa').removeClass('disabled');
                                    });
                                </script>
                                <!--START FLYER-->
                                <div id="flyercontainer">
                                    <div id="tapa" class="wrap-flyer">
                                        <div class="aramis"><?php echo($row_usua['cod_aramis']);?></div>
                                        <div class="logomarquez col-xs-12"><img src="images/diseniar/cabecera-marquez.jpg" height="150" alt=""><div class="fecha"><span><?php echo($mescab." ".$aniocab);?></span></div></div>
                                        <div class="promos col-xs-12"><img width="794" height="90" src="flyer/cabecera.jpg" alt=""></div>
                                        <div class="grupoproductos col-xs-12">
                                                <?php echo($cadena1.$cadena2);?><div class="row separador-central"><img style="width:100%;" src="images/diseniar/separador_gris-puntos.jpg" alt=""></div><?php echo($cadena3.$cadena4);?></div><div href="#promopie" data-toggle="modal" class="promos col-xs-12 promospie" style="height:85px;">CLICK PARA SELECCIONAR UN BANNER...</div>
                                                <div class="bordebottom" id="end"><div class="logopie"><img src="images/diseniar/logopie.png" width="167" alt=""></div><div class="legalespie">Los precios contado son v&aacute;lidos en efectivo, tarjeta de d&eacute;bito &oacute; tarjeta de cr&eacute;dito en 1 pago. Consulte por otros planes de financiaci&oacute;n. </div></div></div></div>
                                <!--END FLYER-->
                                <?php
                                }

                                if (isset($_GET['contin'])) {
                                    $id_sesion_old = $row_fly['id_sesion'];
                                    //TAPA
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='tapa' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $_SESSION['SESIONFLY']=$id_sesion_old;
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"tapa_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_tapa_8_".$_SESSION['ESTADO']} = $row_fly_otros['url'];
                                    }
                                    //CONTRATAPA
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='contratapa' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"contratapa_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_contratapa_8_".$_SESSION['ESTADO']} = $row_fly_otros['url'];
                                    ?>
                                        <script type="text/javascript">
                                            $('.editar_partes #ed_contratapa').removeClass('disabled');
                                        </script>
                                    <?php
                                    }
                                    //PAGINA 2
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='pag2' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"pag2_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_pag2_8_".$_SESSION['ESTADO']} = $row_fly_otros['url']; 
                                    ?>
                                        <script type="text/javascript">
                                            $('.editar_partes #ed_2').removeClass('disabled');
                                        </script>
                                    <?php
                                    }
                                    //PAGINA 3
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='pag3' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"pag3_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_pag3_8_".$_SESSION['ESTADO']} = $row_fly_otros['url'];
                                    ?>
                                        <script type="text/javascript">
                                            $('.editar_partes #ed_3').removeClass('disabled');
                                        </script>
                                    <?php
                                    }
                                    //PAGINA 4
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='pag4' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"pag4_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_pag4_8_".$_SESSION['ESTADO']} = $row_fly_otros['url'];
                                    ?>
                                        <script type="text/javascript">
                                            $('.editar_partes #ed_4').removeClass('disabled');
                                        </script>
                                    <?php
                                    }
                                    //PAGINA 5
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='pag5' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"pag5_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_pag5_8_".$_SESSION['ESTADO']} = $row_fly_otros['url'];
                                    ?>
                                        <script type="text/javascript">
                                            $('.editar_partes #ed_5').removeClass('disabled');
                                        </script>
                                    <?php
                                    }
                                    //PAGINA 6
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='pag6' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"pag6_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_pag6_8_".$_SESSION['ESTADO']} = $row_fly_otros['url'];
                                    ?>
                                        <script type="text/javascript">
                                            $('.editar_partes #ed_6').removeClass('disabled');
                                        </script>
                                    <?php
                                    }
                                    //PAGINA 7
                                    $result_fly_otros=mysql_query("select * from flyers WHERE tipo='8' and usuario='$usuario' and cara='pag7' and terminado='no' ORDER BY Id DESC LIMIT 1");
                                    if($row_fly_otros=mysql_fetch_array($result_fly_otros)) {
                                        $html = $row_fly_otros['grabado'];
                                        $html=str_replace("*","'",$html);
                                        $_SESSION{"pag7_8_".$_SESSION['ESTADO']} = $html;
                                        $_SESSION{"archivo_pag7_8_".$_SESSION['ESTADO']} = $row_fly_otros['url'];
                                    ?>
                                        <script type="text/javascript">
                                            $('.editar_partes #ed_7').removeClass('disabled');
                                        </script>
                                    <?php
                                    }
                                ?>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        var content = '<?php $_SESSION{"tapa_8_".$_SESSION['ESTADO']}; ?>';
                                        $.ajax({
                                               type: "POST",
                                               dataType: "html",
                                               url: "recuperartapa_8.php",
                                               data: {
                                                    'content': content
                                                },
                                               success: function(data)
                                               {
                                                   $("#flyercontainer").html(data); 
                                                   long = $( "#flyercontainer .completed" ).length;
                                                    if (long > 0) {
                                                        $('.guardar').removeClass('disabled');
                                                    }
                                                    if (long == 4) {
                                                        $('.continuar').removeClass('disabled');
                                                        //$('.continuar').addClass('verde');
                                                    }
                                                    if (long < 4) {
                                                        $('.continuar').addClass('disabled');
                                                        //$('.continuar').removeClass('verde');
                                                    }
                                                    $('#flyercontainer').find('a.seletarjetas').each(function () {
                                                                var imgurl = $(this).children('img').attr('src');
                                                                if (imgurl=='images/tarjetas/credito-personal.jpg') {
                                                                    $(this).parent().find('.selebancos').text('');
                                                                }
                                                    });
                                                    return false;
                                               }
                                        });
                                    });
                                </script>
                                
                                <!--START FLYER-->
                                <div id="flyercontainer">
                                    <div id="tapa" class="wrap-flyer">
                                        <div class="aramis"><?php echo($row_usua['cod_aramis']);?></div>
                                        <div class="logomarquez col-xs-12"><img src="images/diseniar/cabecera-marquez.jpg" height="150" alt=""><div class="fecha"><span><?php echo($mescab." ".$aniocab);?></span></div></div>
                                        <div class="promos col-xs-12"><img width="794" height="90" src="flyer/cabecera.jpg" alt=""></div>
                                        <div class="grupoproductos col-xs-12">
                                                <?php echo($cadena1.$cadena2);?><div class="row separador-central"><img style="width:100%;" src="images/diseniar/separador_gris-puntos.jpg" alt=""></div><?php echo($cadena3.$cadena4);?></div><div href="#promopie" data-toggle="modal" class="promos col-xs-12 promospie" style="height:85px;">CLICK PARA SELECCIONAR UN BANNER...</div>
                                                <div class="bordebottom" id="end"><div class="logopie"><img src="images/diseniar/logopie.png" width="167" alt=""></div><div class="legalespie">Los precios contado son v&aacute;lidos en efectivo, tarjeta de d&eacute;bito &oacute; tarjeta de cr&eacute;dito en 1 pago. Consulte por otros planes de financiaci&oacute;n. </div></div></div></div>
                                <!--END FLYER-->
                    
                                <?php
                                }
                            }
                            
                            else { ?>
                                <!--START FLYER-->
                                <div id="flyercontainer"><div id="tapa" class="wrap-flyer"><div class="aramis"><?php echo($row_usua['cod_aramis']);?></div><div class="logomarquez col-xs-12"><img src="images/diseniar/cabecera-marquez.jpg" height="150" alt=""><div class="fecha"><span><?php echo($mescab." ".$aniocab);?></span></div></div><div class="promos col-xs-12"><img width="794" height="90" src="flyer/cabecera.jpg" alt=""></div><div class="grupoproductos col-xs-12"><?php echo($cadena1.$cadena2);?><div class="row separador-central"><img style="width:100%;" src="images/diseniar/separador_gris-puntos.jpg" alt=""></div><?php echo($cadena3.$cadena4);?></div>
                                <div href="#promopie" data-toggle="modal" class="promos col-xs-12 promospie" style="height:85px;">CLICK PARA SELECCIONAR UN BANNER...</div>
                                <div class="bordebottom" id="end"><div class="logopie"><img src="images/diseniar/logopie.png" width="167" alt=""></div><div class="legalespie">Los precios contado son v&aacute;lidos en efectivo, tarjeta de d&eacute;bito &oacute; tarjeta de cr&eacute;dito en 1 pago. Consulte por otros planes de financiaci&oacute;n. </div></div></div></div>
                                <!--END FLYER-->
                            <?php }
                        }
                    
                        // SI NO HAY
                        else {
                        ?>
                                <!--START FLYER-->
                                <div id="flyercontainer"><div id="tapa" class="wrap-flyer"><div class="aramis"><?php echo($row_usua['cod_aramis']);?></div><div class="logomarquez col-xs-12"><img src="images/diseniar/cabecera-marquez.jpg" height="150" alt=""><div class="fecha"><span><?php echo($mescab." ".$aniocab);?></span></div></div><div class="promos col-xs-12"><img width="794" height="90" src="flyer/cabecera.jpg" alt=""></div><div class="grupoproductos col-xs-12"><?php echo($cadena1.$cadena2);?><div class="row separador-central"><img style="width:100%;" src="images/diseniar/separador_gris-puntos.jpg" alt=""></div><?php echo($cadena3.$cadena4);?></div>
                                <div href="#promopie" data-toggle="modal" class="promos col-xs-12 promospie" style="height:85px;">CLICK PARA SELECCIONAR UN BANNER...</div><div class="bordebottom" id="end"><div class="logopie"><img src="images/diseniar/logopie.png" width="167" alt=""></div><div class="legalespie">Los precios contado son v&aacute;lidos en efectivo, tarjeta de d&eacute;bito &oacute; tarjeta de cr&eacute;dito en 1 pago. Consulte por otros planes de financiaci&oacute;n. </div></div></div></div>
                                <!--END FLYER-->
                        <?php
                        }

                    ?>
                    
                    <?php
                    if (isset($_GET['contin'])) {
                    }
                    ?> 
                </div>

                <a href="#sidebar" id="btnup" title="Ir arriba"><img src="images/btn-up.png" alt=""></a>
            </div>
            <!-- Diseniar end-->
		</div>
        <!--/sidebar-menu-->
            <?php include("includes/sidebar-menu.php"); ?>
                        
                            </div>
        </div>
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
        </div>
</div>
<!-- Modal TARJETAS -->
<div id="tarjetas" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <p style="margin:15px 15px 10px 40px; color:#242F7B;">Seleccion&aacute; una tarjeta para la financiaci&oacute;n de este producto:</p>
            <ul class="listado-tarjetas">
                 <?php
                    $result_tarjetas=mysql_query("select tarjetas.Id AS id_tarj, tarjetas.nombre, tarjetas.logo from tarjetas, datos_financiacion WHERE tarjetas.Id = datos_financiacion.id_tarjeta GROUP BY nombre ORDER BY nombre ASC");
                    if ($row_tarjetas=mysql_fetch_array($result_tarjetas)) {
                        do {
                ?>
                        <li>
                            <label>
                                <input type="radio" name="opcion-tarjetas" value="<?php echo($row_tarjetas['id_tarj']); ?>">
                                <img src="images/<?php echo($row_tarjetas['logo']); ?>" alt="<?php echo($row_tarjetas['nombre']); ?>">
                            </label>
                        </li>
                    <?php
                        } while ($row_tarjetas=mysql_fetch_array($result_tarjetas));	
                    }
                     ?>
                                            
            </ul>
            <?php
                $result_cp=mysql_query("select * from credito_personal WHERE usuario='$usuario' ORDER BY fecha DESC");
                if ($row_cp=mysql_fetch_array($result_cp)) {
            ?>
            <p style="margin:15px 15px 10px 40px; color:#242F7B;">O seleccion&aacute; un Cr&eacute;dito Personal: <br><span class="small">(Para cargar tus propios planes de Crédito Personal guardá tu avance y entrá a la sección "CFT y TEA")</span></p>
            <ul class="listado-tarjetas">
                 <?php
                        do {
                ?>
                        <li>
                            <label>
                                <input class="cp" type="radio" name="opcion-tarjetas" value="<?php echo($row_cp['Id']); ?>" cft="<?php echo($row_cp['cft']); ?>" tea="<?php echo($row_cp['tea']); ?>" coef="<?php echo($row_cp['coef']); ?>" cuotas="<?php echo($row_cp['cuotas']); ?>">
                                <img src="images/tarjetas/credito-personal.jpg" alt="Credito Personal">
                                <span><b><?php echo($row_cp['titulo']); ?></b><br> | CUOTAS: <?php echo($row_cp['cuotas']); ?> | TEA: <?php echo($row_cp['tea']); ?>% | CFT: <?php echo($row_cp['cft']); ?>%</span>
                            </label>
                        </li>
                    <?php
                        } while ($row_cp=mysql_fetch_array($result_cp));	
                    }
                     ?>
                                            
            </ul>
      </div>
    </div>
    </div>
</div>
                    
<!-- Modal BANCOS -->
<div id="bancos" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <p style="margin:15px 15px 10px 40px; color:#242F7B;">Seleccion&aacute; un banco para la financiaci&oacute;n de este producto:</p>
            <ul id="listado-bancos" class="listado-tarjetas">
            </ul>
            <div class="loading"></div>
      </div>
    </div>
    </div>
</div>

<!-- Modal CUOTAS -->
<div id="cuotas" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <p style="margin:15px 15px 10px 40px; color:#242F7B;">Seleccion&aacute; la cantidad de cuotas para la financiaci&oacute;n de este producto:</p>
            <ul id="listado-cuotas" class="listado-tarjetas">
            </ul>
            <div class="loading"></div>
      </div>
    </div>
    </div>
</div>
                    
<!-- Modal CUCARDAS 1 -->
<div id="cucardas1" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <div class="listado-cucardas"></div>
            <div class="loading"></div>
            <a class="btn btn-default eliminar-cucarda" href="#" title="Click aqui para eliminar esta cucarda"><img src="images/ico-cerrar_blanco.png" height="15"> ELIMINAR CUCARDA DE ESTE PRODUCTO</a>
      </div>
    </div>
    </div>
</div>

<!-- Modal CUCARDAS 2 -->
<div id="cucardas2" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <div class="listado-cucardas"></div>
            <div class="loading"></div>
            <a class="btn btn-default eliminar-cucarda2" href="#" title="Click aqui para eliminar esta cucarda"><img src="images/ico-cerrar_blanco.png" height="15"> ELIMINAR CUCARDA DE ESTE PRODUCTO</a>
      </div>
    </div>
    </div>
</div>
                    
                    
<!-- Modal -->
<div id="preview" class="modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="video" class="modal" role="dialog">
  <div class="modal-dialog" style="height:calc(100% - 60px);">
    <!-- Modal content-->
    <div class="modal-content" style="height:100%; max-height: 445px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <iframe width="100%" height="445" style="height: 445px;" src="" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="promopie" class="modal" role="dialog">
  <div class="modal-dialog" style="height:calc(100% - 60px);">
    <!-- Modal content-->
    <div class="modal-content" style="height:100%; overflow:auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="padding-top:30px!important;">
            <?php 
            if ($row_pie=mysql_fetch_array($result_pie)) {
                $select_us=mysql_query("select * from usuarios WHERE email='$usuario'");
                $row_usua=mysql_fetch_array($select_us);
                $id_usua=$row_usua['Id'];
                do { 
                    $visible=$row_pie['visible'];
                    if ($visible == '0') {
            ?>
                    <div class="col-xs-12"><img src="flyer/<?php echo($row_pie['foto']);?>" class="img-responsive"></div>
            <?php
                    }
                    else {
                        if ($visible == $id_usua) {
            ?>
                     <div class="col-xs-12"><img src="flyer/<?php echo($row_pie['foto']);?>" class="img-responsive"></div>
            <?php
                        }
                        else {}
                    }

                } while ($row_pie=mysql_fetch_array($result_pie));  
            }
            ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" title="Cerrar">Close</button>
      </div>
    </div>

  </div>
</div>

  
<div id="editor" style="display:none;"></div>
<div id="cargando"></div>
       
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

<!-- Ayuda Desplegable -->
<div id="ayuda-despl">
	<a href="#" id="ayuda-toggle" title="Click para ver las Preguntas Frecuentes"><img src="images/btn_desp-ayuda.png" class="img-responsive" alt="Ayuda" width="55"></a>
	<div class="col-xs-12 contenedor">
		<div class="row">
			<p class="titulo">PREGUNTAS FRECUENTES</p>
		</div>
		<ul>
			<li>
				<div class="pregunta"><span>■</span> ¿Cómo comenzar a diseñar la revista?</div>
				<div class="respuesta">
					Ingresá en la sección DISEÑAR FLYER y elegí el formato que querés (por ejemplo: Revista de 8 páginas). Una vez hecho esto necesitas agregar tu primer producto a la revista, para esto deberás hacer click en cualquiera de los módulos que dicen “Haz click para agregar un producto”. La página te dirigirá a la base de productos para que puedas elegir el que querés publicar. Los productos están ordenados por categorías para que los puedas encontrar fácilmente. Además contás con un buscador por nombre, marca o modelo. Una vez seleccionado el producto, éste se colocará automáticamente en la plantilla de la revista. Debés continuar agregando productos hasta completar todos los módulos.<br>
                    <a href="#" class="open-video" style="color:#E2A810; font-weight: bold;" data-toggle="modal" data-target="#video" data-backdrop="static" data-keyboard="true">Mirá el video tutorial clickeando aquí</a>.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> ¿Cómo quitar un producto de la revista?</div>
				<div class="respuesta">
					Para quitar un productos del diseño de tu revista, solamente tenes que oprimir la X que se encuentra en la parte superior derecha del producto. Éste se eliminará dejando lugar para colocar otro.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> ¿Cómo ponerle precio a un producto?</div>
				<div class="respuesta">
					Una vez que hayas colocado un producto en el diseño de tu revista, debés colocarle el precio. Según el módulo en el que coloques el producto, tendrás la posibilidad de colocarle precio al contado o precio financiado.<br>
					Si elegís colocar un precio <strong>al contado</strong>, debes posicionar el mouse sobre la pastilla verde que contiene el signo $ y colocar los números correspondientes al precio que queres publicar.<br>
					Si elegís colocar un precio <strong>con financiación</strong>, debes posicionar el mouse sobre la pastilla verde que contiene el signo $ y colocar los números correspondientes al precio de CONTADO. Luego apretá el botón verde que dice “click para agregar una financiación”. Una vez hecho esto debes seleccionar la TARJETA, el BANCO y la CANTIDAD DE CUOTAS. El precio final de las cuotas se calcula automáticamente, lo verás en la pastilla de color celeste. ¡Y  listo! Si querés podes modificar el precio de contado y se cambiaran los valores de las cuotas y CFT.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> ¿Qué es una cucarda?</div>
				<div class="respuesta">
					Las cucardas son diseños predeterminados que podés agregarle a tus productos para destacar sus características principales. Podes elegir entre varios diseños. Si no seleccionás ninguna cucarda, ese espacio quedará en blanco.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> El producto que quiero no está en la base de datos.</div>
				<div class="respuesta">
					Si el producto que querés colocar en tu revista no está en la base de datos, podes agregarlo fácilmente. Si estas diseñando apretá GUARDAR para no perder los avances. En el menú de la izquierda verás un botón que dice  “carga de productos”, haciendo click allí, te encontrarás con un formulario para completar con las especificaciones del producto. Elegís la categoría, escribís el modelo, marca, origen  y descripción. Tendrás que cargar una foto del producto, es importante que la imagen tenga buena resolución y fondo blanco. Lo último que queda por hacer apretar el botón insertar ¡y listo! Tu producto ya está cargado y habilitado para usarlo en tu revista.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> ¿Puedo guardar los avances del diseño?</div>
				<div class="respuesta">
					El diseño se guardará una vez que oprimas el botón “guardar”. Si no oprimís este botón y salís del navegador o cerras sesión perderás lo avanzado hasta ahora. Si guardas tu diseño, cuando vuelvas a iniciar sesión deberás elegir si quieres continuar con el diseño que estabas realizando o si deseás comenzar uno nuevo.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> ¿Puedo colocar una promoción personalizada?</div>
				<div class="respuesta">
					Sí. En el menú que está a la izquierda de la pantalla, verás una opción que dice “Solicitar banner”. Allí podrás solicitar Promociones personalizadas según tus necesidades que serán colocadas en la web para que puedas utilizarla en tu diseño.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> ¿Cómo hago para poner un crédito personal?</div>
				<div class="respuesta">
					Si estás diseñando apretá el botón GUARDAR para no perder los avances. En el menú principal ingresá a la sección <strong>CFT Y TEA</strong>. Luego, en el botón <strong>CREDITO PERSONAL</strong>. Allípodés cargar los planes que ofrece su sucursal. Lo primero que debes hacer es colocarle un título al plan de crédito personal, por ejemplo: Plan 6 cuotas. Luego debes seleccionar del desplegable la cantidad de cuotas que incluye este plan. Ahora escribí el porcentaje de TEA y CFT. Por ultimo debes calcular el COEFICIENTE correspondiente para realizar el cálculo de las cuotas de tu plan. Apretá el botón aceptar. Con estos datos cargados podes ir a diseñar tu flyer y colocar este plan de financiación en los productos que te lo permitan.
				</div>
			</li>
			<li>
				<div class="pregunta"><span>■</span> No encuentro la respuesta a mi pregunta ¿Qué hago?</div>
				<div class="respuesta">
					En caso de que tengas alguna duda podes comunicarte telefónicamente al (011) 4871.8184 ó escribirnos a través del chat online donde te brindaremos asesoramiento en tiempo real de Lunes a Viernes de 9 a 17hs. Si preferís que nos comuniquemos con vos dejanos tu nombre y tu teléfono, y lo haremos a la brevedad. 
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- // Ayuda Desplegable -->


				<!--//content-inner-->
			
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


<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
</body>
</html>
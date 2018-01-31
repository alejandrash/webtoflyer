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
            $mescab = $datecab[1];
            $mesbanner = '';
            switch ($mescab) {
                case "January":
                    $mesbanner='01';
                    break;
                case "February":
                    $mesbanner='02';
                    break;
                case "March":
                    $mesbanner='03';
                    break;
                case "April":
                    $mesbanner='04';
                    break;
                case "May":
                    $mesbanner='05';
                    break;
                case "June":
                    $mesbanner='06';
                    break;
                case "July":
                    $mesbanner='07';
                    break;
                case "August":
                    $mesbanner='08';
                    break;
                case "September":
                    $mesbanner='09';
                    break;
                case "October":
                    $mesbanner='10';
                    break;
                case "November":
                    $mesbanner='11';
                    break;
                case "December":
                    $mesbanner='12';
                    break;
            }

?>
<?php
    $result_traecantidad=mysql_query("select * from banners_flyer WHERE cara='pag7' AND mes='$mesbanner'");
    $valor = 0;
    $valortotal = 0;
    $maximoprod = 9;
        if($row_traecantidad=mysql_fetch_array($result_traecantidad)){
            do {
                    $posicion = $row_traecantidad['posicion'];
                    $valor = $row_traecantidad['valor'];
                    if ($posicion == 1) {
                        $bloque1 = $valor;
                        $urlbloque1 = $row_traecantidad['url'];
                    }
                    if ($posicion == 2) {
                        $bloque2 = $valor;
                        $urlbloque2 = $row_traecantidad['url'];
                    }
                    if ($posicion == 3) {
                        $bloque3 = $valor;
                        $urlbloque3 = $row_traecantidad['url'];
                    }
                    $valortotal = $valor + $row_traecantidad['valor'];
                        
            } while ($row_traecantidad=mysql_fetch_array($result_traecantidad));
            if (isset($bloque1)) {
                if ($bloque1 == 25) {
                    $maximoprod = ($maximoprod - 3);
                }
                if ($bloque1 == 50) {
                    $maximoprod = ($maximoprod - 6);
                }
                if ($bloque1 == 75) {
                    $maximoprod = ($maximoprod - 9);
                }
            }
            if (isset($bloque2)) {
                if ($bloque2==25) {
                    $maximoprod = ($maximoprod - 3);
                }
                if ($bloque2==50) {
                    $maximoprod = ($maximoprod - 6);
                }
            }
            if (isset($bloque3)) {
                if ($bloque3==25) {
                    $maximoprod = ($maximoprod - 3);
                }
            }
        }
?>
<?php
// CONSULTA BLOQUEO DE MARCAS
    $result_bloqueo=mysql_query("select marca, cantidad, nombre, logo from bloqueo INNER JOIN marcas ON marcas.Id=bloqueo.marca WHERE cara='pag7' order by fecha desc");
?>

<?php
// TRAE LEGALES ACTUALIZADOS
    $resultLeg = '';
    $sess = $_SESSION['SESIONFLY'];
    $result_legf=mysql_query("select DISTINCT legales from rating_productos WHERE tipo='8' AND id_sesion='$sess' and cara='tapa' ORDER BY Id ASC");
        if ($row_legf=mysql_fetch_array($result_legf)) {
            do { 
                if ($row_legf['legales']!=''){
                    $posicion_coincidencia = strpos($resultLeg, $row_legf['legales']);
                    if ($posicion_coincidencia === false) {
                        $resultLeg = $resultLeg."<span>".$row_legf['legales']."</span>";
                    }
                }
            } while ($row_legf=mysql_fetch_array($result_legf));    
        }

    $result_legf=mysql_query("select DISTINCT legales from rating_productos WHERE tipo='8' AND id_sesion='$sess' and cara='contratapa' ORDER BY Id ASC");
        if ($row_legf=mysql_fetch_array($result_legf)) {
            do { 
                if ($row_legf['legales']!=''){
                    $posicion_coincidencia = strpos($resultLeg, $row_legf['legales']);
                    if ($posicion_coincidencia === false) {
                        $resultLeg = $resultLeg."<span>".$row_legf['legales']."</span>";
                    }
                }
            } while ($row_legf=mysql_fetch_array($result_legf));    
        }

    $result_legf=mysql_query("select DISTINCT legales from rating_productos WHERE tipo='8' AND id_sesion='$sess' and cara='pag2' ORDER BY Id ASC");
        if ($row_legf=mysql_fetch_array($result_legf)) {
            do { 
                if ($row_legf['legales']!=''){
                    $posicion_coincidencia = strpos($resultLeg, $row_legf['legales']);
                    if ($posicion_coincidencia === false) {
                        $resultLeg = $resultLeg."<span>".$row_legf['legales']."</span>";
                    }
                }
            } while ($row_legf=mysql_fetch_array($result_legf));    
        }

    $result_legf=mysql_query("select DISTINCT legales from rating_productos WHERE tipo='8' AND id_sesion='$sess' and cara='pag3' ORDER BY Id ASC");
        if ($row_legf=mysql_fetch_array($result_legf)) {
            do { 
                if ($row_legf['legales']!=''){
                    $posicion_coincidencia = strpos($resultLeg, $row_legf['legales']);
                    if ($posicion_coincidencia === false) {
                        $resultLeg = $resultLeg."<span>".$row_legf['legales']."</span>";
                    }
                }
            } while ($row_legf=mysql_fetch_array($result_legf));    
        }

    $result_legf=mysql_query("select DISTINCT legales from rating_productos WHERE tipo='8' AND id_sesion='$sess' and cara='pag4' ORDER BY Id ASC");
        if ($row_legf=mysql_fetch_array($result_legf)) {
            do { 
                if ($row_legf['legales']!=''){
                    $posicion_coincidencia = strpos($resultLeg, $row_legf['legales']);
                    if ($posicion_coincidencia === false) {
                        $resultLeg = $resultLeg."<span>".$row_legf['legales']."</span>";
                    }
                }
            } while ($row_legf=mysql_fetch_array($result_legf));    
        }

    $result_legf=mysql_query("select DISTINCT legales from rating_productos WHERE tipo='8' AND id_sesion='$sess' and cara='pag5' ORDER BY Id ASC");
        if ($row_legf=mysql_fetch_array($result_legf)) {
            do { 
                if ($row_legf['legales']!=''){
                    $posicion_coincidencia = strpos($resultLeg, $row_legf['legales']);
                    if ($posicion_coincidencia === false) {
                        $resultLeg = $resultLeg."<span>".$row_legf['legales']."</span>";
                    }
                }
            } while ($row_legf=mysql_fetch_array($result_legf));    
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
<link href='css/datepicker.css' rel='stylesheet' type='text/css'>
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/funciones.js"></script>
<script src="js/datepicker.js"></script>
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
            var cara = 'pag7';

     $(window).load(function(){
		SameHeight('.listado-prod li.col-md-5ths .content');
        $("#cargando").fadeOut();
      });

     
    // CARGAR LEGALES EN PIE
    function cargarLegales() {
        var completarLegal = '';
        $("#flyercontainer .cajaproducto").each(function() {
            var numeroVal = $(this).find('.numero').text();
            var stockVal = $(this).find('.frases .stock').val();
            if (stockVal == undefined) {
                stockVal = 5;
            }
            completarLegal = completarLegal + numeroVal + ' STOCK: '+stockVal+' U ';
        });
        $("#flyercontainer .legalespie").html('Los precios contado son válidos en efectivo, tarjeta de débito ó tarjeta de crédito en 1 pago. Consulte por otros planes de financiación.'+completarLegal);
    }

        $(document).ready(function () {
            $("#cargando").fadeIn();
            //CALCULAR Cantidad de Productos 
            traecantidad = '<?php echo ($maximoprod);?>';
            if (traecantidad == 0) {
                $('.continuar, .guardar').removeClass('disabled');
            }
            /*START Datepicker Legales */
                            var nowTemp = new Date();
                            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

                            var checkin = $('#flyercontainer #dpd1').datepicker({
                              onRender: function(date) {
                                return date.valueOf() < now.valueOf() ? 'disabled' : '';
                              }

                            }).on('changeDate', function(ev) {
                              if (ev.date.valueOf() > checkout.date.valueOf()) {
                                var newDate = new Date(ev.date)
                                newDate.setDate(newDate.getDate() + 1);
                                checkout.setValue(newDate);
                              }
                              checkin.hide();
                              $('#flyercontainer #dpd2')[0].focus();
                            }).data('datepicker');
                            var checkout = $('#flyercontainer #dpd2').datepicker({
                              onRender: function(date) {
                                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                              }
                            }).on('changeDate', function(ev) {
                              checkout.hide();  
                              //$("#flyercontainer #dpd2").val(checkout.date);
                              //$("#flyercontainer #dpd2").attr('value',  checkout.date);        
                            }).data('datepicker');
                            /*END Datepicker Legales */ 

            
            // ELIMINAR Legal de Ultima Pagina
            $('#flyercontainer').on('click', '.cajaproducto .quitar', function() { 
                var textoLegalUlt = $(this).closest('.cajaproducto').attr('txt-legales');
                $('.legales-financiacion span.legales-pag7').nextAll('span').each(function () {
                    var textoCompara = $(this).text();
                    if (textoLegalUlt == textoCompara) {
                        $(this).remove();
                    }
                    
                });
            });

            // ELIMINAR Legal de Ultima Pagina
            $('#flyercontainer').on('click', '.cajaproducto .seletarjetas', function() { 
                var textoLegalUlt = $(this).closest('.cajaproducto').attr('txt-legales');
                $('.legales-financiacion span.legales-pag7').nextAll('span').each(function () {
                    var textoCompara = $(this).text();
                    if (textoLegalUlt == textoCompara) {
                        $(this).remove();
                    }
                    
                });
            });
                             
            //CLICK en Producto del listado
            var formatoproducto = 'producto-enflyer.php';
            $('#wraprod').on('click', ':checkbox', function() { 
                var checkValor = $(this).val();
                long = $( "#flyercontainer .completed" ).length;
                $(this).parent().parent().parent('li').fadeOut( 'normal', function(){
                  if (numCaja <= 3) {
                      $("html, body").animate({
                             scrollTop: $("#flyercontainer").offset().top
                      }, 800);
                  }
                  if ((numCaja > 3) && (numCaja <= 6)) {
                      $("html, body").animate({
                             scrollTop: $("#flyercontainer #cuatro").offset().top
                      }, 800);
                  }
                  if (numCaja > 6) {
                      $("html, body").animate({
                             scrollTop: $("#flyercontainer #siete").offset().top
                      }, 800);
                  }
                });
                
                if (long <= traecantidad) {
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
                                $("#flyercontainer #uno .bottom input").attr('rel', '1');
                                $("#flyercontainer #uno .zona-cuota input").attr('rel', '1');
                                $("#flyercontainer #uno .seletarjetas").attr('rel', '1');
                                $("#flyercontainer #uno .selebancos").attr('rel', '1');
                                $("#flyercontainer #uno .selecuotas").attr('rel', '1');
                                $("#flyercontainer #uno .cft").attr('rel', '1');
                                $("#flyercontainer #uno .ptf").attr('rel', '1');
                                $("#flyercontainer #uno .tea").attr('rel', '1');
                            }
                            if(numCaja == 2) {
                                $('#dos').addClass('completed');
                                $("#dos").html(data); 
                                $("#flyercontainer #dos .bottom input").attr('rel', '2');
                                $("#flyercontainer #dos .zona-cuota input").attr('rel', '2');
                                $("#flyercontainer #dos .seletarjetas").attr('rel', '2');
                                $("#flyercontainer #dos .selebancos").attr('rel', '2');
                                $("#flyercontainer #dos .selecuotas").attr('rel', '2');
                                $("#flyercontainer #dos .cft").attr('rel', '2');
                                $("#flyercontainer #dos .ptf").attr('rel', '2');
                                $("#flyercontainer #dos .tea").attr('rel', '2');
                            }
                            if(numCaja == 3) {
                                $('#tres').addClass('completed');
                                $("#tres").html(data); 
                                $("#flyercontainer #tres .bottom input").attr('rel', '3');
                                $("#flyercontainer #tres .zona-cuota input").attr('rel', '3');
                                $("#flyercontainer #tres .seletarjetas").attr('rel', '3');
                                $("#flyercontainer #tres .selebancos").attr('rel', '3');
                                $("#flyercontainer #tres .selecuotas").attr('rel', '3');
                                $("#flyercontainer #tres .cft").attr('rel', '3');
                                $("#flyercontainer #tres .ptf").attr('rel', '3');
                                $("#flyercontainer #tres .tea").attr('rel', '3');
                            }
                            if(numCaja == 4) {
                                $('#cuatro').addClass('completed');
                                $("#cuatro").html(data); 
                                $("#flyercontainer #cuatro .bottom input").attr('rel', '4');
                                $("#flyercontainer #cuatro .zona-cuota input").attr('rel', '4');
                                $("#flyercontainer #cuatro .seletarjetas").attr('rel', '4');
                                $("#flyercontainer #cuatro .selebancos").attr('rel', '4');
                                $("#flyercontainer #cuatro .selecuotas").attr('rel', '4');
                                $("#flyercontainer #cuatro .cft").attr('rel', '4');
                                $("#flyercontainer #cuatro .ptf").attr('rel', '4');
                                $("#flyercontainer #cuatro .tea").attr('rel', '4');
                            }
                            if(numCaja == 5) {
                                $('#cinco').addClass('completed');
                                $("#cinco").html(data); 
                                $("#flyercontainer #cinco .bottom input").attr('rel', '5');
                                $("#flyercontainer #cinco .zona-cuota input").attr('rel', '5');
                                $("#flyercontainer #cinco .seletarjetas").attr('rel', '5');
                                $("#flyercontainer #cinco .selebancos").attr('rel', '5');
                                $("#flyercontainer #cinco .selecuotas").attr('rel', '5');
                                $("#flyercontainer #cinco .cft").attr('rel', '5');
                                $("#flyercontainer #cinco .ptf").attr('rel', '5');
                                $("#flyercontainer #cinco .tea").attr('rel', '5');
                            }
                            if(numCaja == 6) {
                                $('#seis').addClass('completed');
                                $("#seis").html(data); 
                                $("#flyercontainer #seis .bottom input").attr('rel', '6');
                                $("#flyercontainer #seis .zona-cuota input").attr('rel', '6');
                                $("#flyercontainer #seis .seletarjetas").attr('rel', '6');
                                $("#flyercontainer #seis .selebancos").attr('rel', '6');
                                $("#flyercontainer #seis .selecuotas").attr('rel', '6');
                                $("#flyercontainer #seis .cft").attr('rel', '6');
                                $("#flyercontainer #seis .ptf").attr('rel', '6');
                                $("#flyercontainer #seis .tea").attr('rel', '6');
                            }
                            if(numCaja == 7) {
                                $('#siete').addClass('completed');
                                $("#siete").html(data); 
                                $("#flyercontainer #siete .bottom input").attr('rel', '7');
                                $("#flyercontainer #siete .zona-cuota input").attr('rel', '7');
                                $("#flyercontainer #siete .seletarjetas").attr('rel', '7');
                                $("#flyercontainer #siete .selebancos").attr('rel', '7');
                                $("#flyercontainer #siete .selecuotas").attr('rel', '7');
                                $("#flyercontainer #siete .cft").attr('rel', '7');
                                $("#flyercontainer #siete .ptf").attr('rel', '7');
                                $("#flyercontainer #siete .tea").attr('rel', '7');
                            }
                            if(numCaja == 8) {
                                $('#ocho').addClass('completed');
                                $("#ocho").html(data); 
                                $("#flyercontainer #ocho .bottom input").attr('rel', '8');
                                $("#flyercontainer #ocho .zona-cuota input").attr('rel', '8');
                                $("#flyercontainer #ocho .seletarjetas").attr('rel', '8');
                                $("#flyercontainer #ocho .selebancos").attr('rel', '8');
                                $("#flyercontainer #ocho .selecuotas").attr('rel', '8');
                                $("#flyercontainer #ocho .cft").attr('rel', '8');
                                $("#flyercontainer #ocho .ptf").attr('rel', '8');
                                $("#flyercontainer #ocho .tea").attr('rel', '8');
                            }
                            if(numCaja == 9) {
                                $('#nueve').addClass('completed');
                                $("#nueve").html(data); 
                                $("#flyercontainer #nueve .bottom input").attr('rel', '9');
                                $("#flyercontainer #nueve .zona-cuota input").attr('rel', '9');
                                $("#flyercontainer #nueve .seletarjetas").attr('rel', '9');
                                $("#flyercontainer #nueve .selebancos").attr('rel', '9');
                                $("#flyercontainer #nueve .selecuotas").attr('rel', '9');
                                $("#flyercontainer #nueve .cft").attr('rel', '9');
                                $("#flyercontainer #nueve .ptf").attr('rel', '9');
                                $("#flyercontainer #nueve .tea").attr('rel', '9');
                            }
                            long = $( "#flyercontainer .completed" ).length;
                        }
                    });
                } 
                if (long == (traecantidad-1)) {
                    $('.continuar').removeClass('disabled');
                }
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
                           var cantItems = $("#wraprod #seleccion-prod ul li:visible").length; 
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
            if (!isset($_SESSION{"pag7_8_".$_SESSION['ESTADO']})) {
                $result_esta=mysql_query("select * from rating_productos WHERE usuario='$usuario' and cara='pag7' and tipo='8' and actual='si'");
                if($row_esta=mysql_fetch_array($result_esta)){
                    $delete_esta=mysql_query("DELETE FROM rating_productos WHERE usuario='$usuario' and cara='pag7' and tipo='8' and actual='si'");
                }
            }
            if (isset($_SESSION{"contratapa_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_contratapa').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"tapa_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_tapa').removeClass('disabled');
            <?php }
            if (isset($_SESSION{"pag2_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_2').removeClass('disabled');
            <?php }
            if (isset($_SESSION{"pag4_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_4').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"pag3_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_3').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"pag6_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_6').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"pag5_8_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_5').removeClass('disabled');
            <?php } 
            
            if (isset($_SESSION{"pag7_8_".$_SESSION['ESTADO']})) { ?>
            
                var content = '<?php $_SESSION{"pag7_8_".$_SESSION['ESTADO']}; ?>';
                $('.editar_partes #ed_pag7').removeClass('disabled');
                $.ajax({
                       type: "POST",
                       dataType: "html",
                       url: "recuperarpag7_8.php",
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
                            if (long >= traecantidad) {
                                $('.continuar').removeClass('disabled');
                            }
                            if (long < traecantidad) {
                                $('.continuar').addClass('disabled');
                            } 

                            $('#flyercontainer').find('a.seletarjetas').each(function () {
                                        var imgurl = $(this).children('img').attr('src');
                                        if (imgurl=='images/tarjetas/credito-personal.jpg') {
                                            $(this).parent().find('.selebancos').text('');
                                        }
                            });

                            $('#flyercontainer .legales-financiacion').html('<?php echo($resultLeg);?><span class="legales-pag7"></span>');
                            
                            /*START Datepicker Legales */
                            $('#flyercontainer #dpd1, #flyercontainer #dpd2').datepicker({
                                format: "dd/mm/yyyy"
                            });
                            /*END Datepicker Legales */                        
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
                                cara: "pag7"
                            }
                    });
                    $('#cargando').fadeIn();
                    var sesion = {};
                    var flyer = {};
                    var cara = "pag7";
                    var fecha1 = $('#dpd1').val();
                    var fecha2 = $('#dpd2').val();
                    $('#dpd1').attr('value', fecha1);
                    $('#dpd2').attr('value', fecha2);
                    sesion = $('#flyercontainer').html();
                    flyer = $('#flyercontainer').html();
                    flyer = flyer.replace(/images/g, "../../images");
                    flyer = flyer.replace(/"flyer/g, '"../../flyer'); 
                    <?php 
                    if (isset($_SESSION{"archivo_pag7_8_".$_SESSION['ESTADO']})) { ?>
                        var name = '<?php echo($_SESSION{"archivo_pag7_8_".$_SESSION['ESTADO']}); ?>';
                    <?php 
                    }
                    else {
                    ?>
                    var name = '<?php echo("flyer/html/FLYER_pag7_8_".date('m-d-Y_hia').".html"); ?>';
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
                    var cara = "pag7";
                    var limite = traecantidad;
                    var id_sesion = <?php echo($_SESSION['SESIONFLY']); ?>;
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
                                cara: "pag7"
                            }
                    });
                    var i = 1;
                    $('#flyercontainer .cajaproducto').each(function () {
                        $(this).find(".numero").text(i+') ');
                        i++;
                    });
                    var FechaDesde = $("#dpd1").val();
                    var FechaHasta = $("#dpd2").val();
                    if (FechaDesde == '') {
                        FechaDesde = '00/00/0000';
                    }
                    if (FechaHasta == '') {
                        FechaHasta = '00/00/0000';
                    }
                    cargarLegales();
                    var controlStock = 0;
                    var controlPContado = 0;
                    var controlPCuota = 0;
                    var hayerror = 0;
                    var controlBloqueo = 0;
                    var array_bloqueo = []; 
                    $("#flyercontainer .cajaproducto .frases .stock").each(function() {
                        if ($(this).val() == '') {
                            controlStock = 1;
                        } 
                    });
                    $("#flyercontainer .bloqueado").each(function() {
                        var marcaBloq = $(this).attr('data-marca');
                        var marcaActual = $(this).find('.marca').attr('data-marca');
                        if (marcaBloq != marcaActual) {
                            array_bloqueo.push($(this).attr('id'));
                            controlBloqueo = $(this).attr('id');
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
                    $("#flyercontainer .cajaproducto .zona-cuota:visible input").each(function() {
                        if ($(this).val() == '$0,00') {
                            controlPCuota = 1;
                        } 
                    });
                    if (controlPCuota == 1) {
                        hayerror = 1;
                        swal("Error", "Completa la FORMA DE FINANCIACIÓN de todos los productos con financiación.", "error");
                        return false;
                    }
                    $("#flyercontainer .cajaproducto .tachado input").each(function() {
                        if ($(this).val() == '$0,00') {
                            $(this).parent().parent().removeClass('tachado');
                            $(this).parent().parent().children('.quitartachado').css('display','none');
                            $(this).parent().parent().children('.agregartachado').css('display','block');
                        } 
                    });
                    var controlFechasLegales = 0;
                    var dpd1Val = $("#flyercontainer #dpd1").val();
                    var dpd2Val = $("#flyercontainer #dpd2").val();
                    if (dpd1Val == '00/00/0000') {
                        dpd1Val = '';
                    }
                    if (dpd2Val == '00/00/0000') {
                        dpd2Val = '';
                    }
                    if ((dpd1Val == '') || (dpd2Val == '')) {
                        controlFechasLegales = 1;
                    } 

                    if (controlFechasLegales == 1) {
                        hayerror = 1;
                        swal("Error", "Completa las FECHAS DE VALIDEZ de las ofertas.", "error");
                        return false;
                    }
                    if (controlBloqueo != 0) {
                        hayerror = 1;
                        var i = 0;
                        for (i; i < array_bloqueo.length; i++) {  
                            if (array_bloqueo[i] == 'uno') {
                                numCajaQuitar = 1;
                            }
                            if (array_bloqueo[i] == 'dos') {
                                numCajaQuitar = 2;
                            }
                            if (array_bloqueo[i] == 'tres') {
                                numCajaQuitar = 3;
                            }
                            if (array_bloqueo[i] == 'cuatro') {
                                numCajaQuitar = 4;
                            }
                            if (array_bloqueo[i] == 'cinco') {
                                numCajaQuitar = 5;
                            }
                            if (array_bloqueo[i] == 'seis') {
                                numCajaQuitar = 6;
                            }
                            if (array_bloqueo[i] == 'siete') {
                                numCajaQuitar = 7;
                            }
                            if (array_bloqueo[i] == 'ocho') {
                                numCajaQuitar = 8;
                            }
                            if (array_bloqueo[i] == 'nueve') {
                                numCajaQuitar = 9;
                            }
                            if (array_bloqueo[i] == 'diez') {
                                numCajaQuitar = 10;
                            }
                            if (array_bloqueo[i] == 'once') {
                                numCajaQuitar = 11;
                            }
                            if (array_bloqueo[i] == 'doce') {
                                numCajaQuitar = 12;
                            }
                            var nombre_marca = $("#"+array_bloqueo[i]).attr('data-nombre-marca');
                            var img_marca = $("#"+array_bloqueo[i]).attr('data-img-marca');
                            $("#"+array_bloqueo[i]).html('<a rel="'+numCajaQuitar+'" class="insertar" href="#" title="Insertar producto de la marca indicada"><div class="txt-inicial">Haz click aquí para<br>agregar un producto de la marca<strong>'+nombre_marca+'</strong><strong><img src="images/'+img_marca+'" height="40" alt=""></strong></div></a>');
                        }; 
                        swal("Error", "Debe agregar productos de las marcas correspondientes donde se indica.", "error");
                        $("html, body").animate({
                             scrollTop: $("#"+controlBloqueo).offset().top
                        }, 800);
                        return false;
                    }
                    
                    if (hayerror == 0) {
                        swal({
                                title: "¿Has FINALIZADO tu diseño?",
                                text: "Si apretás ACEPTAR ya no podrás realizar modificaciones. Todo lo que has colocado en tu diseño saldrá impreso. Si querés seguir modificando tu diseño hacé click en CANCELAR.",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#5CB223",
                                confirmButtonText: "ACEPTAR Y FINALIZAR",
                                cancelButtonText: "CANCELAR",
                                closeOnConfirm: true,
                                closeOnCancel: true 
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    
                                        $('#cargando').fadeIn();
                                        var fecha1 = $('#dpd1').val();
                                        var fecha2 = $('#dpd2').val();
                                        $('#dpd1').attr('value', fecha1);
                                        $('#dpd2').attr('value', fecha2);
                                        // ACTUALIZAR Promos Legales de ultima pagina
                                        var array_leg = [];
                                        var array_leg2 = [];
                                        $('#flyercontainer .cajaproducto').each(function () {
                                            var txtLeg = $(this).attr('txt-legales');
                                            if (txtLeg!='') {
                                                $('#flyercontainer .legales-financiacion span').each(function () {
                                                    var cadenaLegal = $(this).text();
                                                    if (cadenaLegal!='') {
                                                        if (txtLeg!=cadenaLegal) {
                                                            var i = 0;
                                                            var salida = 0;
                                                            for (i; i < array_leg.length; i++) {  
                                                                if (array_leg[i] == txtLeg) {
                                                                    salida = 1;
                                                                }
                                                            }
                                                            if (salida==0) {
                                                                array_leg.push(txtLeg);
                                                                array_leg2.push("<span>"+txtLeg+"</span>");
                                                            }
                                                        } 
                                                    }
                                                });
                                            }
                                        });

                                        
                                        var array_leg3 = [];
                                        
                                        var i = 0;
                                        
                                        for (i; i < array_leg.length; i++) {
                                            var salida = 0;
                                            $('#flyercontainer .legales-financiacion span').each(function () {
                                                if (array_leg[i] == $(this).text()) {
                                                    salida = 1;
                                                } 
                                            });
                                            if (salida != 1) {
                                                array_leg3.push(array_leg[i]);
                                            }
                                        } 

                                        $('#flyercontainer .legales-financiacion').append(array_leg3);
                                        
                                        var id_quitar = []; 
                                        var txt_legales = [];
                                        var cara = "pag7";
                                        var limite = traecantidad;
                                        var id_sesion = <?php echo($_SESSION['SESIONFLY']); ?>;
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
                                        var cara = "pag7";
                                        sesion = $('#flyercontainer').html();
                                        $('#container-legales .desde').text(FechaDesde);
                                        $('#container-legales .hasta').text(FechaHasta);
                                        $('#flyercontainer .quitar, #flyercontainer .eliminar-sda, #flyercontainer #agregar-sda img, #flyercontainer .frases, #flyercontainer .selecucarda span, #container-legales input, #flyercontainer .tachado .quitartachado, #flyercontainer .agregartachado').remove();
                                        flyer = $('#flyercontainer').html();
                                        flyer = flyer.replace(/images/g, "../../images");
                                        flyer = flyer.replace(/"flyer/g, '"../../flyer'); 
                                        <?php 
                                        if (isset($_SESSION{"archivo_pag7_8_".$_SESSION['ESTADO']})) { ?>
                                            var name = '<?php echo($_SESSION{"archivo_pag7_8_".$_SESSION['ESTADO']}); ?>';
                                        <?php 
                                        }
                                        else {
                                        ?>
                                        var name = '<?php echo("flyer/html/FLYER_PAG7_8_".date('m-d-Y_hia').".html"); ?>';
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
                                                    window.location.href = "diseniar-8-paginas_detalle.php";
                                                }
                                        });
                                    
                                } 
                            }
                        )
                    }
                    else {
                        hayerror = 1;
                        return false;
                    }
          
                    return false;
            });
            
            <?php
            // POSIBILIDADES BANNERS QUE EMPIECEN DESDE EL BLOQUE 1
            if (isset($bloque1)) { 
                if ($bloque1 == 25) {
                ?>
                    $('#block1').html('<img src="flyer/<?php echo($urlbloque1);?>" height="252" alt="" style="width:100%;">');
                <?php
                }
                if ($bloque1 == 50) {
                ?>
                    $('#block1').css('height','507px');
                    $('#block1').html('<img src="flyer/<?php echo($urlbloque1);?>" height="507" alt="" style="width:100%;">');
                    $('#separador-1, #block2').remove();
                <?php
                }
                if ($bloque1 == 75) {
                    ?>
                    $('#block1').css('height','762px');
                    $('#block1').html('<img src="flyer/<?php echo($urlbloque1);?>" height="762" alt="" style="width:100%;">');
                    $('#separador-1, #block2, #separador-2, #block3').remove();
                <?php
                }
            }
            // POSIBILIDADES BANNERS QUE EMPIECEN DESDE EL BLOQUE 2
            if (isset($bloque2)) { 
                if ($bloque2 == 25) {
                ?>
                    $('#block2').html('<img src="flyer/<?php echo($urlbloque2);?>" height="252" alt="" style="width:100%;">');
                <?php
                }
                if ($bloque2 == 50) {
                ?>
                    $('#block2').css('height','507px');
                    $('#block2').html('<img src="flyer/<?php echo($urlbloque2);?>" height="507" alt="" style="width:100%;">');
                    $('#separador-2, #block3').remove();
                <?php
                }
            }
            // POSIBILIDADES BANNERS QUE EMPIECEN DESDE EL BLOQUE 3
            if (isset($bloque3)) { 
                if ($bloque3 == 25) {
                ?>
                    $('#block3').html('<img src="flyer/<?php echo($urlbloque3);?>" height="252" alt="" style="width:100%;">');
                <?php
                }
            }
            ?>

            <?php
            // FIJAR BLOQUEO EN MAQUETA 
            if($row_bloqueo=mysql_fetch_array($result_bloqueo)) {
                $i = 1;
                ?>

                var firstElem = $('.un-cuarto .cajaproducto:first-child').attr('id');
                <?php
                do { 
                    if ($i <=$maximoprod){                  
                        $id_marca = $row_bloqueo['marca'];
                        $nombre_marca = $row_bloqueo['nombre'];
                        $logo = $row_bloqueo['logo'];
                        $cant_bloqueo = $row_bloqueo['cantidad'];
                        for ($j = 1; $j <= $cant_bloqueo; $j++) {
                            if (($j==1) && ($i==1)) {
                            ?>
                                $("#"+firstElem).addClass('bloqueado');
                                $("#"+firstElem).attr('data-marca', '<?php echo($id_marca);?>');
                                $("#"+firstElem).attr('data-img-marca', '<?php echo($logo);?>');
                                $("#"+firstElem).attr('data-nombre-marca', '<?php echo($nombre_marca);?>');
                                $("#"+firstElem).children('.insertar').html("<div class='txt-inicial'>Haz click aquí para<br>agregar un producto de la marca<strong><?php echo($nombre_marca);?></strong><strong><img src='images/<?php echo($logo);?>'height='40px' alt=''></strong></div>");
                            <?php
                            }
                            else {
                            ?>
                                var ultimoBloq = $( ".bloqueado" ).last().attr("id"); 
                                var ultimoInt = $("#"+ultimoBloq).children('.insertar').attr('rel');
                                var indexBloq = (parseInt(ultimoInt) + 1);
                                var existeIndex = $('.insertar[rel^='+indexBloq+']').length;
                                if (indexBloq <= 9) { 
                                    if (existeIndex == 0) {
                                        var i=indexBloq;
                                        for(i=i; existeIndex==0; i++) { 
                                          existeIndex = $('.insertar[rel^='+i+']').length;
                                          indexBloq = i;
                                        }
                                    }
                                    $('.insertar[rel^='+indexBloq+']').parent().addClass('bloqueado');
                                    $('.insertar[rel^='+indexBloq+']').parent().attr('data-marca', '<?php echo($id_marca);?>');
                                    $('.insertar[rel^='+indexBloq+']').parent().attr('data-img-marca', '<?php echo($logo);?>');
                                    $('.insertar[rel^='+indexBloq+']').parent().attr('data-nombre-marca', '<?php echo($nombre_marca);?>');
                                    $('.insertar[rel^='+indexBloq+']').html("<div class='txt-inicial'>Haz click aquí para<br>agregar un producto de la marca<strong><?php echo($nombre_marca);?></strong><strong><img src='images/<?php echo($logo);?>'height='40px' alt=''></strong></div>"); 
                                    
                                }
                                
                            <?php
                            }
                            ?>

                    <?php
                        }
                        $i++;
                    }
                } while ($row_bloqueo=mysql_fetch_array($result_bloqueo));
                            
            }   
            ?>

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
                <p class="col-xs-12"><img src="images/titulos/diseniar.png" class="img-responsive" alt=""> DISEÑAR - Editando P&Aacute;GINA 7</p>
            </div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!--START LATERAL-->
                        <div id="lateral" class="lateral col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
                            <div class="row">
                                <div class="editar_partes">
                                    <ul>
                                        <li><a id="ed_tapa" class="disabled" href="diseniar-8-paginas.php" title="EDITAR TAPA">TAPA</a></li>
                                        <li><a id="ed_contratapa" class="disabled" href="diseniar-8-paginas_contratapa.php" title="EDITAR CONTRATAPA">CONTRATAPA</a></li>
                                        <li><a id="ed_2" class="disabled" href="diseniar-8-paginas_1.php" title="EDITAR PAGINA 2"><strong>2</strong></a></li>
                                        <li><a id="ed_3" class="disabled" href="diseniar-8-paginas_2.php" title="EDITAR PAGINA 3"><strong>3</strong></a></li>
                                        <li><a id="ed_4" class="disabled" href="diseniar-8-paginas_3.php" title="EDITAR PAGINA 4"><strong>4</strong></a></li>
                                        <li><a id="ed_5" class="disabled" href="diseniar-8-paginas_4.php" title="EDITAR PAGINA 5"><strong>5</strong></a></li>
                                        <li><a id="ed_6" class="disabled" href="diseniar-8-paginas_5.php" title="EDITAR PAGINA 6"><strong>6</strong></a></li>
                                        <li><a id="ed_7" class="disabled activada" href="diseniar-8-paginas_6.php" title="EDITAR PAGINA 7"><strong>7</strong></a></li>
                                    </ul>
                                    <p class="boton"><a title="VISTA PREVIA" class="preview" href="#" data-toggle="modal" data-target="#preview" data-backdrop="static" data-keyboard="true"><i class="fa fa-eye" aria-hidden="true"></i> VISTA PREVIA</a></p>
                                    <p class="boton"><a title="GUARDAR AVANCE" class="guardar verde" href="#"><i class="fa fa-floppy-o" aria-hidden="true"></i> GUARDAR</a></p>
                                    <p class="boton"><a title="CONTINUAR AL SIGUIENTE PASO" class="continuar disabled finalizar" href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i> GUARDAR Y FINALIZAR</a></p>
                                </div>
                            </div>
                        </div>
                    <!--END LATERAL-->
                        <!--START FLYER-->
                                <div id="flyercontainer">
                                    <div id="pag7" class="wrap-flyer">
                                        <div class="aramis"><?php echo($row_usua['cod_aramis']);?></div>
                                        <div class="grupoproductos col-xs-12">
                                            <div id="block1" class="un-cuarto">
                                                <div id="uno" class="cajaproducto producto-final" txt-legales=""><a rel="1" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                                <div id="dos" class="cajaproducto producto-final" txt-legales=""><a rel="2" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                                <div id="tres" class="cajaproducto producto-final" txt-legales=""><a rel="3" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                            </div>
                                            <div class="row separador-central" id="separador-1"><img style="width:100%;" src="images/diseniar/separador_gris-puntos.jpg" alt=""></div>
                                            <div id="block2" class="un-cuarto">
                                                <div id="cuatro" class="cajaproducto producto-final" txt-legales=""><a rel="4" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                                <div id="cinco" class="cajaproducto producto-final" txt-legales=""><a rel="5" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                                <div id="seis" class="cajaproducto producto-final" txt-legales=""><a rel="6" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                            </div>
                                            <div class="row separador-central" id="separador-2"><img style="width:100%;" src="images/diseniar/separador_gris-puntos.jpg" alt=""></div>
                                            <div id="block3" class="un-cuarto">
                                                <div id="siete" class="cajaproducto producto-final" txt-legales=""><a rel="7" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                                <div id="ocho" class="cajaproducto producto-final" txt-legales=""><a rel="8" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                                <div id="nueve" class="cajaproducto producto-final" txt-legales=""><a rel="9" class="insertar" href="productos.php" title="Insertar producto"></a></div>
                                            </div>
                                        </div>
                                        <div id="container-legales">
                                                <div class="inner-legales"> 
                                                    VOLANTE ENTREGADO EN MANO, POR FAVOR NO LO TIRE EN LA V&Iacute;A P&Uacute;BLICA. LAS FOTOS SON ILUSTRATIVAS. OFERTAS V&Aacute;LIDAS EN ARGENTINA DESDE EL <span class="desde"></span> <input type="text" style="width:70px; color:#000; height:20px;" value="" id="dpd1" placeholder="Seleccione..." data-date-format="dd-mm-yyyy"> HASTA EL <span class="hasta"></span> <input type="text" style="width:70px; color:#000; height:20px;" value="" id="dpd2" placeholder="Seleccione..." data-date-format="dd-mm-yyyy"> O HASTA AGOTAR STOCK. EL STOCK DISPONIBLE ES DETERMINADO POR RED MARQUEZ S.A. TODOS LOS PRODUCTOS TIENEN SU CORRESPONDIENTE GARANTIA EXTENDIDA POR SU FABRICANTE O IMPORTADOR. LAS PROMOCIONES NO SON ACUMULABLES. LOS PRECIOS CONTADO SON V&Aacute;LIDOS EN EFECTIVO, CON TARJETA DE D&Eacute;BITO O TARJETA DE CR&Eacute;DITO EN 1 PAGO. SEDE ADMINISTRACI&Oacute;N CENTRAL RED MARQUEZ S.A. CUIT:30-69753545-0. GRAL MIGUEL DE AZCU&Eacute;NAGA 795, MOR&Oacute;N, PROVINCIA DE BUENOS AIRES, ARGENTINA. 0810-666-2778.
                                                    <div class="legales-financiacion">
                                                        <span></span>
                                                        <?php
                                                            $sess = $_SESSION['SESIONFLY'];
                                                            $result_legf=mysql_query("select DISTINCT legales from rating_productos WHERE tipo='8' AND id_sesion='$sess' AND legales!='' ORDER BY Id ASC");
                                                            if ($row_legf=mysql_fetch_array($result_legf)) {
                                                                do {
                                                        ?>
                                                                    <span><?php echo($row_legf['legales']); ?></span>
                                                            <?php
                                                                } while ($row_legf=mysql_fetch_array($result_legf));    
                                                            }
                                                             ?>
                                                        <span class="legales-pag7"></span>
                                                    </div>
                                                 </div>
                                        </div>
                                        <div class="bordebottom" id="end"><div class="legalespie">Los precios contado son v&aacute;lidos en efectivo, tarjeta de d&eacute;bito &oacute; tarjeta de cr&eacute;dito en 1 pago. Consulte por otros planes de financiaci&oacute;n. </div><div class="logopie"><span>7</span></div></div>
                                        <div class="demasiapie"></div>
                                    
                                </div>
                                <!--END FLYER-->

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
                <div class="pregunta"><span>■</span> ¿Cómo hago para editar otras caras de la revista?</div>
                <div class="respuesta">
                    Podes navegar por cualquiera de las páginas que ya hayas diseñado. Del lado derecho de la pantalla verás unos rectángulos con el nombre de las páginas. Hacé click en la que necesites editar, modificala y luego apretá GUARDAR.
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
                <div class="pregunta"><span>■</span> ¿Qué legales tengo que agregar?</div>
                <div class="respuesta">
                    Los legales son una parte importante de la revista. Hay un Legal que es obligatorio que indica las bases y condiciones básicas. En ese legal deberás colocar la vigencia que quieras que tenga tu revista, es decir de qué fecha a qué fecha serán válidas las promociones. Los legales de las promociones bancarias se agregarás automáticamente según las hayas utilizado.
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
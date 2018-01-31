<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$user = $_SESSION['ESTADO'];
$usuario = $_SESSION['ESTADO'];
$result_user=mysql_query("select * from usuarios WHERE email ='$user'");
$row_user=mysql_fetch_array($result_user);
$niveluser=$row_user['categoria'];
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
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/wtf.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/funciones.js"></script>
<script type="text/javascript">   
     
     $(window).load(function(){
		SameHeight('.listado-prod li.col-md-5ths .content');
      });
     
     function Onlyprices(e)
    {
        var tecla=new Number();
        if(window.event) {
            tecla = e.keyCode;
        }
        else if(e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if (tecla > 31 && (tecla < 48 || tecla > 57)) {
            if (tecla == 44 ) {
                return true;
            }
            else {
                return false;
            }
        }
    }


    $(document).ready(function() {
        var numCaja = '';
        var long = '';
        var precioContado = '';
        var relprod = '';
        var precioContadoUnsigned = 0;
        var tea = '';
        var cft = '';
        var coef = '';
        var tarjetaVal = '';
        var bancoVal = '';
        var cuotasVal = '';
        var varprod = "#uno"; 
        var numCajaQuitar = '';
        // CLICK en Insertar
        $('#flyercontainer').on('click', '.insertar', function() { 
            numCaja = $(this).attr('rel');   
            var contenido = $('#wraprod').html();
            if (contenido == '') {
                    $("#wraprod").load( "productos-inner.php", function() {
                        $('#btndown').fadeIn();
                        var cuantasPag = $('#wraprod .paginacion a').length;
                        var anchoPag = (cuantasPag * 40) + 120;
                        $('#wraprod .paginacion').css('width', anchoPag);
                        var estadoLeft = $('#wraprod .paginacion a').position().left;
                        if (estadoLeft <= 45) {
                            $(".slider-paginacion .prev").css('display', 'none');
                        }
                        if (anchoPag <= 800) {
                            $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none!important');
                        }
                    });
                    $('#wraprod').css('height','1090px');
                    $("html, body").animate({
                         scrollTop: $("#wraprod").offset().top
                    }, 800);
            }
            else {
                    $("html, body").animate({
                         scrollTop: $("#wraprod").offset().top
                    }, 800);
                    var cuantasPag = $('#wraprod .paginacion a').length;
                    var anchoPag = (cuantasPag * 40) + 120;
                    $('#wraprod .paginacion').css('width', anchoPag);
                    var estadoLeft = $('#wraprod .paginacion a').position().left;
                    if (estadoLeft <= 45) {
                        $(".slider-paginacion .prev").css('display', 'none');
                    }
                    if (anchoPag <= 800) {
                        $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none!important');
                    }
            }
            return false;
        });

        // CLICKs en Menu Categorias
        $('#wraprod').on('click', 'a', function() { 
            var newurl = $(this).attr('href');
            $("#wraprod").load( newurl, function() {
                    $('#btndown').fadeIn();
                    var cuantasPag = $('#wraprod .paginacion a').length;
                    var anchoPag = (cuantasPag * 40) + 120;
                    $('#wraprod .paginacion').css('width', anchoPag);
                    var estadoLeft = $('#wraprod .paginacion a').position().left;
                    if (estadoLeft <= 45) {
                        $(".slider-paginacion .prev").css('display', 'none');
                    }
                    var estadoActive = $('#wraprod .paginacion span').position().left;
                    estadoActive = '-'+estadoActive+'px';
                    $('#wraprod .paginacion').css('left', estadoActive);
                });
            return false;
        });

        //CLICK en Producto del listado
        $('#wraprod').on('click', ':checkbox', function() { 
            var checkValor = $(this).val();
            long = $( "#flyercontainer .completed" ).length;
            $(this).parent().parent().parent('li').fadeOut( 'normal', function(){
                if (numCaja <= 2) {
                    $("html, body").animate({
                        scrollTop: $("#flyercontainer").offset().top
                    }, 800);
                }
                if ((numCaja > 2) && (numCaja <= 4)) {
                    $("html, body").animate({
                        scrollTop: $("#flyercontainer #cuatro").offset().top
                    }, 800);
                }
            });
            if (long <= 4) {
                    $('#cargando').fadeIn();
                    $.ajax({
                        type: "POST",
                        url: 'insertar-cartel.php',
                        dataType: "html",
                        data: {
                            'id': checkValor
                        },
                        success: function(data) { 
                            $('#cargando').fadeOut();
                            precioContado = '';
                            relprod = '';
                            relprod = numCaja;
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
                            long = $( "#flyercontainer .completed" ).length;
                        }
                    });
                } 
        }); 

        // Click en Next Paginacion
        $('#wraprod').on('click', '.slider-paginacion .next', function() { 
                var estadoLeft = $('#wraprod .paginacion a').position().left;
                if (estadoLeft >= 45) {
                    $(".slider-paginacion .prev").css('display', 'block');
                }
                var estadoRight = $('#wraprod .paginacion').position().left;
                var anchoPaginacion = $('#wraprod .paginacion').width();
                estadoRight = Math.abs(estadoRight);
                estadoRight = estadoRight + 760;
                if (estadoRight >= anchoPaginacion) {
                    $(".slider-paginacion .next").css('display', 'none');
                }
                else {
                    $('#wraprod .paginacion').animate({left: '-=100px'}, 100);
                } 
        });
        // Click en Prev Paginacion
        $('#wraprod').on('click', '.slider-paginacion .prev', function() { 
                $(".slider-paginacion .next").css('display', 'block');
                var estadoLeft = $('#wraprod .paginacion').position().left;
                if (estadoLeft >= 0) {
                    $(".slider-paginacion .prev").css('display', 'none');
                }
                else {
                    $('#wraprod .paginacion').animate({left: '+=100px'}, 100);
                }

        });
    
        // OVER ELIMINAR
        $('#flyercontainer').on('mouseenter', '.quitar', function() { 
              $(this).closest('.wrapcartel .interior').children('.overlay').fadeIn();   
        });
        $('#flyercontainer').on('mouseleave', '.quitar', function() { 
              $(this).closest('.wrapcartel .interior').children('.overlay').css('display','none'); 
        });
            
            // ELIMINAR Producto de Flyer
        $('#flyercontainer').on('click', '.quitar', function() { 
                var quitar = $(this).attr('id');
                var numCajaQuitar = $(this).closest('.wrapcartel').attr('id');
                $(this).closest('.wrapcartel').removeClass('financiado');
                idCaja = numCajaQuitar;
                if (numCajaQuitar == 'uno') {
                    numCajaQuitar = 1;
                }
                if (numCajaQuitar == 'dos') {
                    numCajaQuitar = 2;
                }
                if (numCajaQuitar == 'tres') {
                    numCajaQuitar = 3;
                }
                if (numCajaQuitar == 'cuatro') {
                    numCajaQuitar = 4;
                }
                numCaja = numCajaQuitar;
                $(this).parent().parent().parent().removeClass('completed');
                $("#"+idCaja).html('<a rel="'+numCajaQuitar+'" class="insertar" href="#" title="Insertar producto"></a>');
                long = $( "#flyercontainer .completed" ).length;
                $('#wraprod input[type=checkbox]').each(function () {
                    $(this).prop('checked', false);
                    var valorCh = $(this).val();
                    if (valorCh == quitar) {
                        $(this).parent().parent().parent().fadeIn( 'normal', function(){ 
                    });
                    }
                });
                var contenido = $('#wraprod').html();
                if (contenido == '') {
                    $("#wraprod").load( "productos-inner.php", function() {
                        $('#btndown').fadeIn();
                        var cuantasPag = $('#wraprod .paginacion a').length;
                        var anchoPag = (cuantasPag * 40) + 120;
                        $('#wraprod .paginacion').css('width', anchoPag);
                        var estadoLeft = $('#wraprod .paginacion a').position().left;
                        if (estadoLeft <= 45) {
                            $(".slider-paginacion .prev").css('display', 'none');
                        }
                        if (anchoPag <= 800) {
                            $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none!important');
                        }
                    });
                    $('#wraprod').css('height','1090px');
                }
                else {
                    $("html, body").animate({
                         scrollTop: $("#wraprod").offset().top
                    }, 800);
                    var cuantasPag = $('#wraprod .paginacion a').length;
                    var anchoPag = (cuantasPag * 40) + 120;
                    $('#wraprod .paginacion').css('width', anchoPag);
                    var estadoLeft = $('#wraprod .paginacion a').position().left;
                    if (estadoLeft <= 45) {
                        $(".slider-paginacion .prev").css('display', 'none');
                    }
                    if (anchoPag <= 800) {
                        $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none!important');
                    }
                }
                return false;
        });

            //Click Agregar SDA Financiacion
        $('#flyercontainer').on('click', '.wrap-flyer .wrapcartel #agregar-sda', function() { 
                var estadoPri = $(this).parent().parent().children('.bottom').children('input').val();
                if (estadoPri == '$0,00') {
                    alert("Completa el PRECIO CONTADO antes de continuar.");
                    return false;
                }
                else {
                    relprod = $(this).parent().parent().children(".bottom").children('input').attr('rel');
                    $(this).parent().parent().parent().addClass('financiado');
                    $(this).parent(".selec-financiacion-big").find('.eliminar-sda').css('display','none');
                    $(this).css('display','none');
                    
                    $(this).parent().parent().find('.zona-cuota, .mitad, .zona-valores').css('display','block');
                    $(this).parent().parent().find('.eliminar-sda').css('display','block');
                    var nuevoidprod = $(this).parent('.selec-financiacion-big').parent('.wrapcartel').attr('id');
                    $("input[name='opcion-tarjetas']:checked").prop('checked', false);
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    
                    $(this).parent().children().children('a.selebancos').html('Seleccionar bancos');
                    $(this).parent().children().children('a.selebancos').attr('title', 'Click para seleccionar banco');
                    $(this).parent().children().children('a.selecuotas').html('Seleccionar cuotas');
                    $(this).parent().children().children('a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $(this).parent().children('.zona-cuota input').val('$0,00');
                    $(this).parent().children('.zona-cuota input').css('opacity','0.5'); 
                    $(this).parent().children('.zona-valores .cft p span').html('0,00');
                    $(this).parent().children('.zona-valores .right .ptf p span').html('0,00');
                    $(this).parent().children('.zona-valores .right .tea p span').html('0,00');
                }
                return false;
        });
            
            //Click Eliminar SDA Financiacion
        $('#flyercontainer').on('click', '.wrapcartel .eliminar-sda', function() { 
            	$(this).parent().parent().parent().parent().parent().removeClass('financiado');
                $(this).parent().parent().parent(".selec-financiacion-big").find('.mitad, .zona-cuota, .zona-valores').css('display','none');
                $(this).parent().parent().parent().parent().children(".bottom").removeClass('mini');
                $(this).parent().parent().parent(".selec-financiacion-big").find('#agregar-sda').css('display','block');
                return false;
        });

            // DAR Formato a Precios
        $('#flyercontainer').on('change', '.wrapcartel .bottom input', function() {
                    var relprod = $(this).attr('rel');
                    if (relprod == '1') {
                        varprod = "#uno";
                    }
                    if (relprod == '2') {
                        varprod ="#dos";
                    }
                    if (relprod == '3') {
                        varprod ="#tres";
                    }
                    if (relprod == '4') {
                        varprod ="#cuatro";
                    }
                    var getVal = $(this).val();
                    getVal = getVal.replace('$','');
                    if (getVal !="") {
                        getVal = getVal.replace(',','.');
                        var nuevoVal = parseFloat(getVal).toFixed(2);
                        precioContadoUnsigned = nuevoVal;
                        nuevoVal = nuevoVal.replace('.',',');
                        $(this).val('$'+nuevoVal);
                        $(this).attr('value', '$'+nuevoVal);
                        var controlCuota = $(varprod+' .zona-cuota input').val();
                        var cuotasVal = $(varprod+' .zona-cuota input').attr('data-cuotas');
                        var coef = $(varprod+' .zona-cuota input').attr('data-coef');
                        var cft = $(varprod+' .zona-cuota input').attr('data-cft'); 
                        var tea = $(varprod+' .zona-cuota input').attr('data-tea'); 
                        $(varprod+' .zona-cuota input').css('opacity', '1');
                        if (controlCuota !='$0,00') {
                                        var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                                        finalCuota = parseFloat(finalCuota).toFixed(2);
                                        var ptf = (finalCuota * cuotasVal);
                                        ptf = parseFloat(ptf).toFixed(2);
                                        ptf = ptf.toString();
                                        ptf = ptf.replace('.',',');
                                        var finalCuota = finalCuota.toString();
                                        finalCuota = finalCuota.replace('.',',');
                                        finalCuota = ('$'+finalCuota);
                                        $(varprod+' .zona-cuota input').val(finalCuota);
                                        $(varprod+' .zona-cuota input').attr('value', finalCuota); 
                                        $(varprod+' .ptf p span').html(ptf);
                        }
                        if ((controlCuota =='$0,00') && (cft !='')) {
                                        var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                                        finalCuota = parseFloat(finalCuota).toFixed(2);
                                        var ptf = (finalCuota * cuotasVal);
                                        ptf = parseFloat(ptf).toFixed(2);
                                        ptf = ptf.toString();
                                        ptf = ptf.replace('.',',');
                                        var finalCuota = finalCuota.toString();
                                        finalCuota = finalCuota.replace('.',',');
                                        finalCuota = ('$'+finalCuota);
                                        $(varprod+' .zona-cuota input').val(finalCuota);
                                        $(varprod+' .zona-cuota input').attr('value', finalCuota); 
                                        $(varprod+' .ptf p span').html(ptf);
                        }
                   }
                   if (getVal==0) {
                        $(this).val('$0,00');
                        $(varprod+' .zona-cuota input').val('$0,00');
                        $(varprod+' .zona-cuota input').css('opacity', '0.5');
                   }
                    if (getVal=="") {
                       $(this).val('$0,00');
                        $(varprod+' .zona-cuota input').val('$0,00');
                        $(varprod+' .zona-cuota input').css('opacity', '0.5');
                    }
        });

			// Generar Vista Previa
		$(".preview").click(function() {       
                var content = $("#flyercontainer").html();
                $('#previa .modal-body').html(content);
                $('#previa .quitar, #previa #agregar-sda, #previa .eliminar-sda').css('display', 'none');
                $('#previa a').css('pointer-events','none');
                $('#previa input').attr('readonly', true);
                $('#previa .descripcion strong, #previa .titulo strong').attr('contenteditable', false);
        });

        $(".download").click(function() { 
        		$('#flyercontainer .quitar, #flyercontainer .eliminar-sda, #flyercontainer #agregar-sda img').remove();
        		$('#flyercontainer .insertar').css('display', 'none');
	            var content = $("#flyercontainer").html(); 
	            content = content.replace(/images/g, "../../images");
	            var fecha = '<?php echo(date("Y-m-d_His")); ?>';
	            var name = '<?php echo("flyer/etiquetas/cartelGM_".date('m-d-Y_hia')); ?>';
	            $.ajax({
	                type: "POST",
	                dataType : "html",
	                url: "generar-etiqueta.php",
	                data: {
	                    etiqueta: content,
	                    fecha: fecha,
	                    name: name
	                },
	                success: function(data){
	                    $("#enlace").attr('href',data);
	                    var evt = document.createEvent("MouseEvents");
	                      evt.initMouseEvent("click", true, true, window,
	                        0, 0, 0, 0, 0, false, false, false, false, 0, null);
	                      var a = document.getElementById("enlace"); 
	                      a.dispatchEvent(evt); 
	                         setTimeout(
	                          function() 
	                          {
	                            //window.location.href = "cartel-precios.php";
	                          }, 5000);
	                }
	            });
	            return false;
	    });

        	//Seleccion tarjeta en financiacion
        $("input[name='opcion-tarjetas']").change(function() {
                var tarjetaVal = $(this).val();
                var tarjetaLogo = $(this).parent().children('img').attr('src');
                $('#tarjetas').modal('toggle');   
                if (relprod == '1') {
                        varprod = "#uno";
                }
                if (relprod == '2') {
                        varprod ="#dos";
                }
                if (relprod == '3') {
                        varprod ="#tres";
                }
                if (relprod == '4') {
                        varprod ="#cuatro";
                }
                if (tarjetaVal==33) {
                    bancoVal = 55;
                    $('.modal-body .loading').fadeIn();
                    $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_cuotas_input.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                    banco: bancoVal
                                },
                                success: function(data){
                                    $('.modal-body .loading').fadeOut();
                                    $('#listado-cuotas').html(data);
                                    $(varprod+' a.selebancos').html('<img src="images/bancos/BANCO-54.jpg" rel="55" alt="">');
                                    $(varprod+' a.selebancos').css('pointer-events','none');
                                    $(varprod+' a.selecuotas').css('opacity','1');
                                    return false;

                                },
                                error: function( xhr, status ) {
                                     return false;
                                }
                    });
                }
                
                if ((tarjetaVal==31) || (tarjetaVal==32)) {
                    if (tarjetaVal==31) {
                        cuotasVal = 12;
                    }
                    if (tarjetaVal==32) {
                        cuotasVal = 18;
                    }
                    var getVal = $(varprod +' .bottom input').val();
                    getVal = getVal.replace('$','');
                    if ((getVal !="")|| (getVal !=0)) {
                        getVal = getVal.replace(',','.');
                        var nuevoVal = parseFloat(getVal).toFixed(2);
                        precioContadoUnsigned = nuevoVal;
                    }
                    $('.modal-body .loading').fadeIn();
                    $.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: "buscar_financiacion.php",
                                    data: {
                                        tarjeta: tarjetaVal,
                                        banco: 55,
                                        cantidad_cuotas: cuotasVal
                                    },
                                    success: function(data){
                                        $('.modal-body .loading').fadeOut();
                                        $('#datacontainer').html(data);
                                        var partes = $('#datacontainer').text().split("+");
                                        tea = partes[0];
                                        cft = partes[1];
                                        coef = partes[2];
                                        coef = coef.replace(',','.');
                                        $(varprod+' a.selebancos').html('<img src="images/bancos/BANCO-54.jpg" rel="55" alt="">');
                                        $(varprod+' a.selebancos').css('pointer-events','none');
                                        if (cft!='0,00') {
                                            $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas fijas de</span>');
                                        }
                                        else {
                                            $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas sin interés de</span>');
                                        }
                                        $(varprod+' a.selecuotas').css('pointer-events','none');
                                        $(varprod+' a.selecuotas').css('opacity','1');
                                        $(varprod+' .zona-cuota input').css('opacity','1'); 
                                        $(varprod+' .cft p span').html(cft);
                                        $(varprod+' .tea p span').html(tea);
                                        $(varprod+' .zona-cuota input').attr('data-cuotas', cuotasVal);
                                        $(varprod+' .zona-cuota input').attr('data-cft', cft);
                                        $(varprod+' .zona-cuota input').attr('data-tea', tea); 
                                        $(varprod+' .zona-cuota input').attr('data-coef', coef); 
                                        var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                                        finalCuota = parseFloat(finalCuota).toFixed(2);
                                        var ptf = (finalCuota * cuotasVal);
                                        ptf = parseFloat(ptf).toFixed(2);
                                        ptf = ptf.toString();
                                        ptf = ptf.replace('.',',');
                                        var finalCuota = finalCuota.toString();
                                        finalCuota = finalCuota.replace('.',',');
                                        finalCuota = ('$'+finalCuota);
                                        $(varprod+' .zona-cuota input').val(finalCuota);
                                        $(varprod+' .zona-cuota input').attr('value', finalCuota); 
                                        $(varprod+' .ptf p span').html(ptf);
                                        $(varprod+' .zona-valores').css('display','block'); 
                                        return false;

                                    },
                                    error: function( xhr, status ) {
                                         return false;
                                    }
                    });
                }
                if ($(this).attr('class')=='cp') {
                    $(varprod+' a.seletarjetas[rel^='+relprod+']').html('<img src="'+tarjetaLogo+'" rel="'+tarjetaVal+'" alt="" title="Click para modificar">');
                    var getVal = $(varprod +' .bottom input').val();
                    getVal = getVal.replace('$','');
                    if ((getVal !="")|| (getVal !=0)) {
                        getVal = getVal.replace(',','.');
                        var nuevoVal = parseFloat(getVal).toFixed(2);
                        precioContadoUnsigned = nuevoVal;
                    }
                    cuotasVal = $(this).attr('cuotas');
                    cft = $(this).attr('cft');
                    tea = $(this).attr('tea');
                    coef = $(this).attr('coef');
                    coef = coef.replace(',','.');

                    $(varprod+' .zona-cuota input').attr('data-cuotas', cuotasVal);
                    $(varprod+' .zona-cuota input').attr('data-cft', cft);
                    $(varprod+' .zona-cuota input').attr('data-tea', tea); 
                    $(varprod+' .zona-cuota input').attr('data-coef', coef);
                    
                    $(varprod+' a.selebancos').html('<img src="images/bancos/BANCO-54.jpg" rel="55" alt="">');
                    $(varprod+' a.selebancos').addClass('disabled');
                    $(varprod+' a.selebancos').css('opacity', '1');
                    if (cft!='0,00') {
                        $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas fijas de</span>');
                    }
                    else {
                        $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas sin interés de</span>');
                    }
                    $(varprod+' a.selecuotas').removeClass('disabled');
                    $(varprod+' a.selecuotas').css('pointer-events','none');
                    $(varprod+' .zona-cuota input').css('opacity','1'); 
                    $(varprod+' .cft p span').html(cft);
                    $(varprod+' .tea p span').html(tea);
                    var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                    finalCuota = parseFloat(finalCuota).toFixed(2);
                    var ptf = (finalCuota * cuotasVal);
                    ptf = parseFloat(ptf).toFixed(2);
                    ptf = ptf.toString();
                    ptf = ptf.replace('.',',');
                    var finalCuota = finalCuota.toString();
                    finalCuota = finalCuota.replace('.',',');
                    finalCuota = ('$'+finalCuota);
                    $(varprod+' .zona-cuota input').val(finalCuota);
                    $(varprod+' .zona-cuota input').attr('value', finalCuota); 
                    $(varprod+' .ptf p span').html(ptf);
                    $(varprod+' .zona-valores').css('display','block'); 

                }
                else {
                    if (tarjetaVal != '') {
                            $(varprod+' a.selebancos[rel^='+relprod+']').removeClass('disabled');
                            $(varprod+' a.selebancos[rel^='+relprod+']').css('pointer-events', 'auto');
                            $(varprod+' a.selebancos[rel^='+relprod+']').html('Seleccionar banco');
                            $(varprod+' a.selecuotas[rel^='+relprod+']').css('pointer-events', 'auto');
                            $(varprod+' a.seletarjetas[rel^='+relprod+']').html('<img src="'+tarjetaLogo+'" rel="'+tarjetaVal+'" alt="" title="Click para modificar la tarjeta">');
                            $('.modal-body .loading').fadeIn();
                            $.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: "buscar_bancos.php",
                                    data: {
                                        tarjeta: tarjetaVal,
                                    },
                                    success: function(data){
                                        $('.modal-body .loading').fadeOut();
                                        $('#listado-bancos').html(data);
                                        return false;

                                    },
                                    error: function(data) {
                                         return false;
                                    }
                            });
                    }
                    else {
                        return false;
                    }
            }
            });
            
            
            // CLICKs en Seleccionar banco
            
            $('#flyercontainer').on('click', '.wrapcartel .selebancos', function() { 
                relprod = $(this).attr('rel');
                precioContado = $('.bottom input[rel^='+relprod+']').val();
                if (precioContado == '$0,00') {
                    alert ("Complete el PRECIO CONTADO del producto antes de continuar. Gracias!");
                    return false;
                }
                else {
                    tarjetaVal = $(this).parent().children('.seletarjetas').children('img').attr('rel');
                    $('.modal-body .loading').fadeIn();
                    $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_bancos.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                },
                                success: function(data){
                                    $('.modal-body .loading').fadeOut();
                                    $('#listado-bancos').html(data);
                                    return false;

                                },
                                error: function(data) {
                                     return false;
                                }
                    });
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    $(varprod+' a.selecuotas').html('SELECCIONAR CUOTAS');
                    $(varprod+' a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $(varprod+' .zona-cuota input').val('$0,00');
                    $(varprod+' .zona-cuota input').css('opacity','0.5'); 
                    $(varprod+' .zona-valores .cft p span').html('0,00');
                    $(varprod+' .zona-valores .right .ptf p span').html('0,00');
                    $(varprod+' .zona-valores .right .tea p span').html('0,00');
                }
            });
            
            
            // CLICKs en Seleccionar tarjeta
            
            $('#flyercontainer').on('click', '.cajaproducto .seletarjetas', function() { 
                relprod = $(this).attr('rel');
                precioContado = $('.bottom input[rel^='+relprod+']').val();
                if (precioContado == '$0,00') {
                    alert ("Complete el PRECIO CONTADO del producto antes de continuar. Gracias!");
                    return false;
                }
                else {
                    $("input[name='opcion-tarjetas']:checked").prop('checked', false);
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    $(this).parent().children('a.selebancos').html('Seleccionar banco');
                    $(this).parent().children('a.selebancos').css('pointer-events','auto');
                    $(this).parent().children('a.selebancos').attr('title', 'Click para seleccionar banco');
                    $(this).parent().parent().children().find('a.selecuotas').html('Seleccionar cuotas');
                    $(this).parent().parent().children().find('a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $(this).parent().parent().children().find('a.selecuotas').css('pointer-events','auto');
                    $(this).parent().parent().children('.zona-cuota input').val('$0,00');
                    $(this).parent().parent().children('.zona-cuota input').css('opacity','0.5'); 
                    $(this).parent().parent().children('.zona-valores .cft p span').html('0,00');
                    $(this).parent().parent().children('.zona-valores .right .ptf p span').html('0,00');
                    $(this).parent().parent().children('.zona-valores .right .tea p span').html('0,00');
                }
            });

            // CLICKs en Seleccionar cuota
            
            $('#flyercontainer').on('click', '.wrapcartel .selecuotas', function() { 
                relprod = $(this).attr('rel');
                var estadoCuotas = $(this).children('span').length;
                tarjetaVal = $(this).parent().parent().children('.mitad').children('.seletarjetas').children('img').attr('rel');
                bancoVal = $(this).parent().parent().children('.mitad').children('.selebancos').children('img').attr('rel');
                if (estadoCuotas == 1) {
                    $('.modal-body .loading').fadeIn();
                    $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_cuotas_input.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                    banco: bancoVal
                                },
                                success: function(data){
                                    $('.modal-body .loading').fadeOut();
                                    $('#listado-cuotas').html(data);
                                    return false;

                                },
                                error: function( xhr, status ) {
                                     return false;
                                }
                    });
                }
            });

            //Seleccion banco en financiacion
            $('#listado-bancos').on('change', "input[name='opcion-bancos']", function() { 
            if (relprod == '1') {
                varprod = "#uno";
            }
            if (relprod == '2') {
                varprod ="#dos";
            }
            if (relprod == '3') {
                varprod ="#tres";
            }
            if (relprod == '4') {
                varprod ="#cuatro";
            }
            bancoVal = $(this).val();
            var bancoLogo = $(this).parent().children('img').attr('src');
            $('#bancos').modal('toggle');
                if ((tarjetaVal != '') && (bancoVal != '')) {
                        $(varprod+' a.selecuotas').removeClass('disabled');
                        $(varprod+' a.selebancos').html('<img src="'+bancoLogo+'" rel="'+bancoVal+'" alt="" title="Click para modificar el banco">');
                        $('.modal-body .loading').fadeIn();
                        $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_cuotas_input.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                    banco: bancoVal
                                },
                                success: function(data){
                                    $('.modal-body .loading').fadeOut();
                                    $('#listado-cuotas').html(data);
                                    return false;

                                },
                                error: function( xhr, status ) {
                                     return false;
                                }
                        });
                }
                else {
                    return false;
                }
            });
                      
            //Seleccion cuotas en financiacion // 
            $('#listado-cuotas').on('change', "input[name='opcion-cuotas']", function() { 
                if (relprod == '1') {
                    varprod = "#uno";
                }
                if (relprod == '2') {
                    varprod ="#dos";
                }
                if (relprod == '3') {
                    varprod ="#tres";
                }
                if (relprod == '4') {
                    varprod ="#cuatro";
                }
                
                var getVal = $(varprod).find('.bottom').children('input').val();
                tarjetaVal = $(varprod+' a.seletarjetas').children('img').attr('rel');
                bancoVal = $(varprod+' a.selebancos').children('img').attr('rel');
                    getVal = getVal.replace('$','');
                    if ((getVal !="")|| (getVal !=0)) {
                        getVal = getVal.replace(',','.');
                        var nuevoVal = parseFloat(getVal).toFixed(2);
                        precioContadoUnsigned = nuevoVal;
                    }
                    //var bancoVal = $("input[name='opcion-bancos']:checked").val();
                    cuotasVal = $(this).val();
                    var cuotasTxt = $(this).parent().children('span').html();
                    $('#cuotas').modal('toggle');
                    if ((tarjetaVal != '') && (bancoVal != '')) {
                        $(varprod+' a.selecuotas[rel^='+relprod+']').html('<span title="Click para modificar la cantidad de cuotas">'+cuotasTxt+'</span>');
                        $('.modal-body .loading').fadeIn();
                            $.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: "buscar_financiacion.php",
                                    data: {
                                        tarjeta: tarjetaVal,
                                        banco: bancoVal,
                                        cantidad_cuotas: cuotasVal
                                    },
                                    success: function(data){
                                        $('.modal-body .loading').fadeOut();
                                        $('#datacontainer').html(data);
                                        var partes = $('#datacontainer').text().split("+");
                                        tea = partes[0];
                                        cft = partes[1];
                                        coef = partes[2];
                                        coef = coef.replace(',','.');

                                        $(varprod+' .zona-cuota input').css('opacity','1'); 
                                        $(varprod+' .cft p span').html(cft);
                                        $(varprod+' .tea p span').html(tea);
                                        $(varprod+' .zona-cuota input').attr('data-cuotas', cuotasVal);
                                        $(varprod+' .zona-cuota input').attr('data-cft', cft);
                                        $(varprod+' .zona-cuota input').attr('data-tea', tea); 
                                        $(varprod+' .zona-cuota input').attr('data-coef', coef); 
                                        var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                                        finalCuota = parseFloat(finalCuota).toFixed(2);
                                        var ptf = (finalCuota * cuotasVal);
                                        ptf = parseFloat(ptf).toFixed(2);
                                        ptf = ptf.toString();
                                        ptf = ptf.replace('.',',');
                                        var finalCuota = finalCuota.toString();
                                        finalCuota = finalCuota.replace('.',',');
                                        finalCuota = ('$'+finalCuota);
                                        $(varprod+' .zona-cuota input').val(finalCuota);
                                        $(varprod+' .zona-cuota input').attr('value', finalCuota); 
                                        $(varprod+' .ptf p span').html(ptf);
                                        $(varprod+' .zona-valores').css('display','block'); 
                                        return false;

                                    },
                                    error: function( xhr, status ) {
                                         return false;
                                    }
                            });
                    }
                    else {
                        return false;
                    }
            });

            // Buscar Buscador
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
                <p class="col-xs-12"><img src="images/titulos/carteldeprecios.png" class="img-responsive" alt="">Cartel de Precios</p>
            </div>

            <div id="wraprod"></div>

            <!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!--START LATERAL-->
                        <div id="lateral" class="lateral col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
                            <div class="row">
                                <div class="editar_partes">
                                    <div class="aviso-predisenio" style="font-size:15px;"><p>SELECCIONÁ 4 PRODUCTOS DE LA BASE DE DATOS PARA OBTENER SU TÍTULO Y DESCRIPCIÓN.<br><br>
                                    DESPUÉS DE CLICKEAR EL BOTÓN "DESCARGAR PDF" TENÉS QUE PERMITIR LAS VENTANAS EMERGENTES, VAS A VER UN CARTEL QUE TE PIDE EL PERMISO EN LA PARTE SUPERIOR DERECHA DE LA PÁGINA (ESTO LO HACÉS SOLO LA PRIMERA VEZ QUE USES EL CARTEL).<br><br>
                                    <strong>INFO TÉCNICA: EN UNA HOJA A4 SE IMPRIMEN 4 CARTELES DE 10,5 X 14,8cm.</strong></p></div>
                                </div>
                                <div class="botones-etiquetas">
                                    <p><a title="VISTA PREVIA" class="preview" href="#" data-toggle="modal" data-target="#previa" data-backdrop="static" data-keyboard="true"><i class="fa fa-eye" aria-hidden="true"></i> VISTA PREVIA</a></p>
                                    <!--<p><a title="IMPRIMIR" class="print" href="#"><i class="fa fa-print" aria-hidden="true"></i> IMPRIMIR CARTEL</a></p>-->
                                    <p><a title="DESCARGAR" class="download" href="#"><i class="fa fa-download" aria-hidden="true"></i> DESCARGAR PDF</a></p>
                                    <?php
                                        $result_cartel=mysql_query("select Id from cartel_precios");
                                        if ($row_cartel=mysql_fetch_array($result_cartel)) {
                                            $clasedis='registro';
                                        }
                                        else { $clasedis='registro disabled'; }
                                    if (($niveluser=='operador') || ($niveluser=='')) { 
                                    }
                                    else {
                                    ?>
                                    <p><a title="REGISTRO DE USO" class="<?php echo ($clasedis);?>" href="uso-cartel.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i> REGISTRO DE USO</a></p>
                                    <?php } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    <!--END LATERAL-->
                        <!--START FLYER-->
                                <div id="flyercontainer">
                                    <div id="cartel" class="wrap-flyer">
                                        <div id="uno" class="wrapcartel"><a href="#" class="insertar" rel="1"></a></div>
                                        <div id="dos" class="wrapcartel"><a href="#" class="insertar" rel="2"></a></div>
                                        <div id="tres" class="wrapcartel"><a href="#" class="insertar" rel="3"></a></div>
                                        <div id="cuatro" class="wrapcartel"><a href="#" class="insertar" rel="4"></a></div>
                                    </div>
                                </div>
                                <!--END FLYER-->

                </div>
            </div>
            <!-- Diseniar end-->
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
        </div>
</div>

<div id="editor" style="display:none;"></div>
<a id="enlace" style="display:none;" href="#"  target="_blank"></a>
<div id="cargando"></div>

<!-- Modal -->
<div id="previa" class="modal fade" role="dialog" style="width:100%!important; overflow-x:visible!important;">
  <div class="modal-dialog" style="width:553px;">
    <!-- Modal content-->
    <div class="modal-content" style="width:553px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

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
<script src="js/wysihtml5x-toolbar.min.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>
</body>
</html>
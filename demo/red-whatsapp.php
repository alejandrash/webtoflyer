<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$user = $_SESSION['ESTADO'];

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
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />	
<link rel="stylesheet" type="text/css" href="css/bootstrap3-wysihtml5.min.css"/>
<link href='css/sweetalert.css' rel='stylesheet' type='text/css'>
<script src="js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/wtf.css"/>
<link rel="stylesheet" type="text/css" href="css/redes-sociales.css"/>
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/funciones.js"></script>
<script src="js/redes.js"></script>
<script type="text/javascript">   
     var idcucarda ='plantilla-grat';

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

    var serviceUrl;
    var convertParameter;
    var name = '<?php echo("flyer/plantillas/plantilla_seguidores_".date('m-d-Y_hia')); ?>';

    $(document).ready(function() {
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

        //Abrir Cerrar Titulo Seccion Plantilla
        $(".botonera-acciones .plantilla").click(function() {
            var abrir = $(this).attr('data-link');
            $('#disepred').css('display', 'none');
            $(abrir).fadeIn();
            $('.texto_desc').fadeIn();
        });

        //Abrir Cerrar Titulo Seccion
        $(".tituloseccion a").click(function(e) {
            e.preventDefault();
            $(this).parent().parent().next('.lista-scroll').slideToggle();
        });

        //Click para cargar diseño
        $(".lista-scroll .predet").click(function(e) {
            e.preventDefault();
            var ruta = $(this).attr('href');
            $('#disepred').css('background-image', 'url(' + ruta + ')');
            $('.descargar').attr('href', ruta);
            $('.preview, .compartir, .descargar, .eliminar').removeClass('disabled');
            $('#plantilla-grat').css('display', 'none');
            $('.texto_desc, #disepred').fadeIn();
            $('#fotoampliada .modal-body img').attr('src', ruta);
            var idimg = $(this).attr('rel');
            $.ajax({
                type: "POST",
                url: 'sugeridos.php',
                dataType: "html",
                data: {
                    'estado': 2,
                    'id': idimg
                },
                success: function(data) { 
                    if (data == '') {
                        $('.texto_desc').css('display', 'none');
                    }
                    else {
                        $('.texto_desc').css('display', 'block');
                    }
                    $("#insertaridea").html(data);  
                }
            });
        });
        //Click para cargar diseño
        $(".lista-scroll .gife").click(function() {
            var idimg = $(this).attr('rel');
            $.ajax({
                type: "POST",
                url: 'sugeridos.php',
                dataType: "html",
                data: {
                    'estado': 3,
                    'id': idimg
                },
                success: function(data) { 
                    $("#insertaridea").html(data);  
                }
            });
        });

        // CLICKs en Labels Modal
        $('#modal-chequeo').on('click', 'label', function() { 
            var hola = $(this);
            $('#modal-chequeo textarea').css('border-color', '#cccccc');
            $('#modal-chequeo input[type=radio]').prop('checked', false);
            $(hola).children('textarea').css('border-color', '#7ac943');
            $(hola).children('input[type=radio]').prop('checked', true);
            return false;
        });
        // CLICKs en Cerrar/Seleccionar Modal
        $('#modal-chequeo').on('click', '.cerrar', function() { 
            if (!$("#modal-chequeo input[name='optiontxt']:checked").val()) {
                swal("Error", "Selecciona un texto sugerido, o cierra la ventana clickeando en la cruz.", "error");
                return false;
            }
            else {
                var cantCar = $("#modal-chequeo input[name='optiontxt']:checked").parent().children('.small').children('span').html();
                cantCar = 120 - cantCar;
                var txtsuge = $("#modal-chequeo input[name='optiontxt']:checked").val();
                $('#descripcion').val(txtsuge);
                $('#caracteres_restantes').children('span').text(cantCar);
                $('#modal-chequeo').modal('hide');
                $("html, body").animate({
                    scrollTop: $("#descripcion").offset().top
                }, 800);
            }
        });

        //Abrir Cerrar Titulo Seccion Plantilla
        $(".eliminar").click(function(e) {
            e.preventDefault();
            swal({
                title: "¿Estas seguro de ELIMINAR tu diseño?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#5CB223",
                confirmButtonText: "ELIMINAR",
                cancelButtonText: "CANCELAR",
                closeOnConfirm: true,
                closeOnCancel: true 
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location.href = 'red-facebook-seguidores.php';
                }
                else {
                    return false;
                }
            }
            )
        });

        //Enviar mail para Compartir en Instagram
        $('#modal-ya').on('click', '.instagram a', function(e) { 
            e.preventDefault(); 
            var rut = $(this).attr('href');
            var correo = '<?php echo $_SESSION['ESTADO']?>';
            $('#cargando').fadeIn();
                    $.ajax({
                        type: "POST",
                        url: 'mailinstagram.php',
                        dataType: "html",
                        data: {
                            'ruta': rut,
                            'usuario': correo
                        },
                        success: function(data) { 
                            $('#cargando').fadeOut();
                            if (data == '0') {
                                $('#modal-ya .instagram').css('display', 'none');
                                swal("Listo", "Revisá tu mail para compartir en Instagram. ¡Gracias!", "success");
                                var cuantosquedan = $("#modal-ya .iconos-redes li:visible").length;
                                if (cuantosquedan == 0) {
                                    $('#modal-ya').modal('hide');
                                    swal("Listo", "Serás redirigido a la Home en 1 segundo. ¡Gracias!", "success");
                                    setTimeout(
                                    function() 
                                    {
                                        window.location.href = "home.php";
                                    }, 5000);
                                }
                            }
                            if (data == '1') {
                                $('#modal-errorinstagram').modal('show');
                            }
                            console.log(data);
                        }
                    });
        });

        // CLICKs en Enviar Mail de Instagram (caso mail vacio)
        $('#modal-errorinstagram').on('click', '#mailcontinuar', function(e) { 
            e.preventDefault(); 
            var correo = $('#modal-errorinstagram #txtmail').val();
            if (correo == '') {
                swal("Error", "Completa el mail antes de continuar.", "error");
            }
            else {
                var rut = $('#modal-ya .instagram a').attr('href');
                $('#cargando').fadeIn();
                    $.ajax({
                        type: "POST",
                        url: 'mailinstagram.php',
                        dataType: "html",
                        data: {
                            'ruta': rut,
                            'usuario': correo
                        },
                        success: function(data) { 
                            $('#cargando').fadeOut();
                            $('#modal-errorinstagram').modal('hide');
                            $('#modal-ya .instagram').css('display', 'none');
                            swal("Listo", "Revisá tu mail para compartir en Instagram. ¡Gracias!", "success");
                            var cuantosquedan = $("#modal-ya .iconos-redes li:visible").length;
                            if (cuantosquedan == 0) {
                                $('#modal-ya').modal('hide');
                                swal("Listo", "Serás redirido a la Home en 1 segundo. ¡Gracias!", "success");
                                setTimeout(
                                    function() 
                                    {
                                        window.location.href = "home.php";
                                    }, 5000);
                            }
                        }
                    });
            }
        });

        //Comprobar para cerrar modal de compartir en otros
        $('#modal-ya').on('click', '.whatsapp a', function() { 
            $('#modal-ya .whatsapp').css('display', 'none');
            var cuantosquedan = $("#modal-ya .iconos-redes li:visible").length;
            if (cuantosquedan == 0) {
                $('#modal-ya').modal('hide');
                swal("Listo", "Serás redirido a la Home en 1 segundo. ¡Gracias!", "success");
                setTimeout(
                    function() 
                    {
                        window.location.href = "home.php";
                    }, 5000);
            }
        });

        //Cerrar modal para compartir en otros y redirigir
        $('#modal-ya').on('click', 'a.close', function() { 
            $('#modal-ya .whatsapp').css('display', 'none');
            $('#modal-ya').modal('hide');
            swal("Listo", "Serás redirido a la Home en 1 segundo. ¡Gracias!", "success");
            setTimeout(
            function() 
            {
                window.location.href = "home.php";
            }, 5000);
        });

        //Compartir en Facebook
        $('#modal-ya').on('click', '.facebook a', function(e) { 
            e.preventDefault(); 
            var urlcompartir = $(this).attr('href');
            window.popup = window.open(urlcompartir,'ventanacompartir', 'toolbar=0, status=0, width=650, height=650');
            $('#modal-ya .facebook').css('display', 'none');
            var cuantosquedan = $("#modal-ya .iconos-redes li:visible").length;
            if (cuantosquedan == 0) {
                $('#modal-ya').modal('hide');
                swal("Listo", "Serás redirido a la Home en 1 segundo. ¡Gracias!", "success");
                setTimeout(
                    function() 
                    {
                        window.location.href = "home.php";
                    }, 5000);
            }
        });

        // CLICK en Insertar
        $('#plantilla-grat').on('click', '.insertar', function() {  
            var contenido = $('#wraprod').html();
            if (contenido == '') {
                    $("#wraprod").load( "productos-inner_redes.php", function() {
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
            $("html, body").animate({
                scrollTop: $("#plantilla-grat").offset().top
            }, 800);
            
            $('#cargando').fadeIn();
                    $.ajax({
                        type: "POST",
                        url: 'plantilla-facebook-gratuita.php',
                        dataType: "html",
                        data: {
                            'id': checkValor
                        },
                        success: function(data) { 
                            $('#cargando, .insertar').fadeOut();
                            $('.contiene').css('display', 'block');
                            $('.preview, .compartir, .descargar, .eliminar').removeClass('disabled');
                            $('.texto_desc').css('display', 'block');
                            precioContado = '';
                            $(".contiene").html(data);  
                        }
                    });
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
        $('#plantilla-grat').on('mouseenter', '.quitar', function() { 
              $('.contiene').children('.overlay').fadeIn();   
        });
        $('#plantilla-grat').on('mouseleave', '.quitar', function() { 
              $('.contiene').children('.overlay').css('display','none'); 
        });
            
            // ELIMINAR Producto de Flyer
        $('#plantilla-grat').on('click', '.quitar', function() { 
                var quitar = $(this).attr('id');
                $('.contiene').removeClass('financiado');
                $('.contiene').css('display', 'none');
                $('.insertar').css('display', 'block');
                $('.preview, .compartir, .descargar, .eliminar').addClass('disabled');
                $('.texto_desc').css('display', 'none');
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
                    $("#wraprod").load( "productos-inner_redes.php", function() {
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

        //Click en Boton Cucarda
        $('.contiene').on('click', '.selecucarda', function() { 
                    var cucloaded = $('#cucardas1 .listado-cucardas').html();

                    if (cucloaded == '') {
                        $("#cucardas1 .listado-cucardas, #cucardas2 .listado-cucardas").load( "cucardas_template.php", function() {
                          $('#cucardas1 .loading, #cucardas2 .loading').css('display', 'none');

                        });
                    }
                    $("#cucardas1 input[name='opcion-cucardas']:checked, #cucardas2 input[name='opcion-cucardas']:checked").prop('checked', false);
        });
                

            //Click Agregar SDA Financiacion
        $('.contiene').on('click', '#agregar-sda', function() { 
                var estadoPri = $('.contiene .bottom').children('input').val();
                if (estadoPri == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
                    return false;
                }
                else {
                    $('.contiene').addClass('financiado');
                    $(".contiene .selec-financiacion-big .zona-valores .cft").find('.eliminar-sda').css('display','none');
                    $('.contiene .agregartachado, .contiene .quitartachado, .contiene .preciotach').css('display','none');
                    $(this).css('display','none');
                    
                    $('.contiene .selec-financiacion-big, .contiene .selec-financiacion-big .zona-cuota, .contiene .selec-financiacion-big .mitad, .contiene .selec-financiacion-big .zona-valores').css('display','block');
                    $(this).parent().parent().find('.eliminar-sda').css('display','block');
                    $("input[name='opcion-tarjetas']:checked").prop('checked', false);
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    
                    $('.contiene a.selebancos').html('Seleccionar bancos');
                    $('.contiene a.selebancos').attr('title', 'Click para seleccionar banco');
                    $('.contiene a.selecuotas').html('Seleccionar cuotas');
                    $('.contiene a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $('.contiene .selec-financiacion-big input').val('$0,00');
                    $('.contiene .selec-financiacion-big input').css('opacity','0.5'); 
                    $('.contiene .zona-valores .cft p span').html('0,00');
                    $('.contiene .zona-valores .right .ptf p span').html('0,00');
                    $('.contiene .zona-valores .right .tea p span').html('0,00');
                }
                return false;
        });
            
            //Click Eliminar SDA Financiacion
        $('.contiene').on('click', '.selec-financiacion-big .zona-valores .eliminar-sda', function() { 
                $(".contiene .selec-financiacion-big").find('.mitad, .zona-cuota, .zona-valores').css('display','none'); 
                $(".contiene .selec-financiacion-big").css('display','none');
                $(".contiene").removeClass('financiado');
                $(".contiene").find('#agregar-sda, .agregartachado').css('display','block');
                return false;
        });

            // DAR Formato a Precios
        $('.contiene').on('change', '.bottom input', function() {
                    var getVal = $(this).val();
                    getVal = getVal.replace('$','');
                    if (getVal !="") {
                        getVal = getVal.replace(',','.');
                        var nuevoVal = parseFloat(getVal).toFixed(2);
                        precioContadoUnsigned = nuevoVal;
                        nuevoVal = nuevoVal.replace('.',',');
                        $(this).val('$'+nuevoVal);
                        $(this).attr('value', '$'+nuevoVal);
                        var controlCuota = $('.selec-financiacion-big input').val();
                        var cuotasVal = $('.selec-financiacion-big input').attr('data-cuotas');
                        var coef = $('.selec-financiacion-big input').attr('data-coef');
                        var cft = $('.selec-financiacion-big input').attr('data-cft'); 
                        var tea = $('.selec-financiacion-big input').attr('data-tea'); 
                        $('.selec-financiacion-big input').css('opacity', '1');
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
                                        $('.selec-financiacion-big input').val(finalCuota);
                                        $('.selec-financiacion-big input').attr('value', finalCuota); 
                                        $('.selec-financiacion-big .zona-valores .right .ptf p span').html(ptf);
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
                                        $('.selec-financiacion-big input').val(finalCuota);
                                        $('.selec-financiacion-big input').attr('value', finalCuota); 
                                        $('.selec-financiacion-big .zona-valores .right .ptf p span').html(ptf);
                        }
                   }
                   if (getVal==0) {
                        $(this).val('$0,00');
                        $('.selec-financiacion-big input').val('$0,00');
                        $('.selec-financiacion-big input').css('opacity', '0.5');
                   }
                    if (getVal=="") {
                       $(this).val('$0,00');
                        $('.selec-financiacion-big input').val('$0,00');
                        $('.selec-financiacion-big input').css('opacity', '0.5');
                    }
        });

            // Generar Vista Previa
        $(".preview").click(function() {       
                var content = $("#forprevia").html();
                $('#previa .modal-body').html(content);
                $('#previa .quitar, #previa #agregar-sda img, #previa .eliminar-sda, #previa .selecucarda span, #previa .agregartachado, #previa .quitartachado').css('display', 'none');
                $('#previa #agregar-sda span, #previa .preciotach .linea').css('display', 'block');
                $('#previa a').css('pointer-events','none');
                $('#previa input').attr('readonly', true);
                $('#previa .descripcion strong, #previa .titulo strong').attr('contenteditable', false);
        });

        $(".descargar").click(function() { 
            var sessName = '<?php echo $_SESSION['ESTADO']?>';
            console.log(sessName);
            if(sessName=='') {
                window.location.href = "index.php";
            }
            var estadoPri = $('.contiene .bottom').children('input').val();
            var estadoDiv = $('#plantilla-grat').css('display');
            if ((estadoPri == '$0,00') && (estadoDiv == 'block')) {
                swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
                return false;
            }
            else {
                var content = $("#forprevia").html(); 
                $('#editor').html(content);
                var estadoTachado = $('#forprevia .quitartachado').css('display');
                if (estadoTachado == 'block') {
                    $('#editor .preciotach .linea').css('display', 'block');
                    $('#editor .quitartachado, #editor .agregartachado').css('display', 'none');
                }
                $('#editor .contiene .quitar, #editor .contiene .eliminar-sda, #editor .contiene #agregar-sda img').remove();
                $('#editor .contiene .selecucarda span').css('display', 'none'); 
                var content = $("#editor").html(); 
                content = content.replace(/images/g, "../../images");
                content = content.replace(/images/g, "../../images");
                content = content.replace(/redes/g, "../../redes");
                content = content.replace(/flyer/g, "../../flyer");
                var fecha = '<?php echo(date("Y-m-d_His")); ?>';
                //var name = '<?php //echo("flyer/plantillas/plantilla_seguidores_".date('m-d-Y_hia')); ?>';
                var desc = $("#descripcion").val();
                var title = $(".contiene .titulo").html();
                $.ajax({
                    type: "POST",
                    dataType : "html",
                    url: "generar-plantilla.php",
                    data: {
                        plantilla: content,
                        fecha: fecha,
                        name: name,
                        desc: desc,
                        titulo: title
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
            }
        });

        $(".compartir").click(function(e) { 
            e.preventDefault();
            var estadoPri = $('.contiene .bottom').children('input').val();
            var estadoDiv = $('#plantilla-grat').css('display');
            if ((estadoPri == '$0,00') && (estadoDiv == 'block')) {
                swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
                return false;
            }
            else {
                $('#cargando').fadeIn();
                var content = $("#forprevia").html(); 
                $('#editor').html(content);
                var estadoTachado = $('#forprevia .quitartachado').css('display');
                if (estadoTachado == 'block') {
                    $('#editor .preciotach .linea').css('display', 'block');
                    $('#editor .quitartachado, #editor .agregartachado').css('display', 'none');
                }
                $('#editor .contiene .quitar, #editor .contiene .eliminar-sda, #editor .contiene #agregar-sda img').remove();
                $('#editor .contiene .selecucarda span').css('display', 'none');
                var content = $("#editor").html(); 
                content = content.replace(/images/g, "../../images");
                content = content.replace(/redes/g, "../../redes");
                content = content.replace(/flyer/g, "../../flyer");
                var fecha = '<?php echo(date("Y-m-d_His")); ?>';
                //var name = '<?php //echo("flyer/plantillas/plantilla_seguidores_".date('m-d-Y_hia')); ?>';
                var descri = $("#descripcion").val();
                var title = $(".contiene .titulo").html();
                $.ajax({
                    type: "POST",
                    dataType : "html",
                    url: "generar-plantilla-compartir.php",
                    data: {
                        plantilla: content,
                        fecha: fecha,
                        name: name,
                        desc: descri,
                        titulo: title
                    },
                    success: function(data){
                        $('#dato').val(data);
                        serviceUrl = "http://do.convertapi.com/Web2Image/json?";
                        Convert();
                        
                        //var urlcompartir = "http://www.facebook.com/sharer.php?u="+data+"";
                        //$("#enlace").attr('href',urlcompartir);
                        //var evt = document.createEvent("MouseEvents");
                        //  evt.initMouseEvent("click", true, true, window,
                         //   0, 0, 0, 0, 0, false, false, false, false, 0, null);
                        //  var a = document.getElementById("enlace"); 
                        //  a.dispatchEvent(evt); 
                        //     setTimeout(
                        //      function() 
                        //      {
                                //window.location.href = "cartel-precios.php";
                        //      }, 5000);
                    }
                });
                return false;
            }
        });

            //Seleccion tarjeta en financiacion
        $("input[name='opcion-tarjetas']").change(function() {
                var tarjetaVal = $(this).val();
                var tarjetaLogo = $(this).parent().children('img').attr('src');
                $('#tarjetas').modal('toggle');   
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
                                    $('.contiene a.selebancos').html('<img src="images/bancos/BANCO-54.jpg" rel="55" alt="">');
                                    $('.contiene a.selebancos').css('pointer-events','none');
                                    $('.contiene a.selecuotas').css('opacity','1');
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
                    var getVal = $('.contiene .bottom input').val();
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
                                        $('.contiene a.selebancos').html('<img src="images/bancos/BANCO-54.jpg" rel="55" alt="">');
                                        $('.contiene a.selebancos').css('pointer-events','none');
                                        if (cft!='0,00') {
                                            $('.contiene a.selecuotas').html('<span>'+cuotasVal+' cuotas fijas de</span>');
                                        }
                                        else {
                                            $('.contiene a.selecuotas').html('<span>'+cuotasVal+' cuotas sin interés de</span>');
                                        }
                                        $('.contiene a.selecuotas').css('pointer-events','none');
                                        $('.contiene a.selecuotas').css('opacity','1');
                                        $('.contiene .selec-financiacion-big input').css('opacity','1'); 
                                        $('.contiene .cft p span').html(cft);
                                        $('.contiene .tea p span').html(tea);
                                        $('.contiene .selec-financiacion-big input').attr('data-cuotas', cuotasVal);
                                        $('.contiene .selec-financiacion-big input').attr('data-cft', cft);
                                        $('.contiene .selec-financiacion-big input').attr('data-tea', tea); 
                                        $('.contiene .selec-financiacion-big input').attr('data-coef', coef); 
                                        var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                                        finalCuota = parseFloat(finalCuota).toFixed(2);
                                        var ptf = (finalCuota * cuotasVal);
                                        ptf = parseFloat(ptf).toFixed(2);
                                        ptf = ptf.toString();
                                        ptf = ptf.replace('.',',');
                                        var finalCuota = finalCuota.toString();
                                        finalCuota = finalCuota.replace('.',',');
                                        finalCuota = ('$'+finalCuota);
                                        $('.contiene .selec-financiacion-big input').val(finalCuota);
                                        $('.contiene .selec-financiacion-big input').attr('value', finalCuota); 
                                        $('.contiene .ptf p span').html(ptf);
                                        $('.contiene .zona-valores').css('display','block'); 
                                        return false;

                                    },
                                    error: function( xhr, status ) {
                                         return false;
                                    }
                    });
                }
                if ($(this).attr('class')=='cp') {
                    $('.contiene a.seletarjetas').html('<img src="'+tarjetaLogo+'" rel="'+tarjetaVal+'" alt="" title="Click para modificar">');
                    var getVal = $('.contiene .bottom input').val();
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

                    $('.contiene .selec-financiacion-big input').attr('data-cuotas', cuotasVal);
                    $('.contiene .selec-financiacion-big input').attr('data-cft', cft);
                    $('.contiene .selec-financiacion-big input').attr('data-tea', tea); 
                    $('.contiene .selec-financiacion-big input').attr('data-coef', coef);
                    
                    $('.contiene a.selebancos').html('<img src="images/bancos/BANCO-54.jpg" rel="55" alt="">');
                    $('.contiene a.selebancos').addClass('disabled');
                    $('.contiene a.selebancos').css('opacity', '1');
                    if (cft!='0,00') {
                        $('.contiene a.selecuotas').html('<span>'+cuotasVal+' cuotas fijas de</span>');
                    }
                    else {
                        $('.contiene a.selecuotas').html('<span>'+cuotasVal+' cuotas sin interés de</span>');
                    }
                    $('.contiene a.selecuotas').removeClass('disabled');
                    $('.contiene a.selecuotas').css('pointer-events','none');
                    $('.contiene .selec-financiacion-big input').css('opacity','1'); 
                    $('.contiene .cft p span').html(cft);
                    $('.contiene .tea p span').html(tea);
                    var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                    finalCuota = parseFloat(finalCuota).toFixed(2);
                    var ptf = (finalCuota * cuotasVal);
                    ptf = parseFloat(ptf).toFixed(2);
                    ptf = ptf.toString();
                    ptf = ptf.replace('.',',');
                    var finalCuota = finalCuota.toString();
                    finalCuota = finalCuota.replace('.',',');
                    finalCuota = ('$'+finalCuota);
                    $('.contiene .selec-financiacion-big input').val(finalCuota);
                    $('.contiene .selec-financiacion-big input').attr('value', finalCuota); 
                    $('.contiene .ptf p span').html(ptf);
                    $('.contiene .zona-valores').css('display','block'); 

                }
                else {
                    if (tarjetaVal != '') {
                            $('.contiene a.selebancos').removeClass('disabled');
                            $('.contiene a.selebancos').css('pointer-events', 'auto');
                            $('.contiene a.selebancos').html('Seleccionar banco');
                            $('.contiene a.selecuotas').css('pointer-events', 'auto');
                            $('.contiene a.seletarjetas').html('<img src="'+tarjetaLogo+'" rel="'+tarjetaVal+'" alt="" title="Click para modificar la tarjeta">');
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
            
            $('.contiene').on('click', '.selebancos', function() { 
                precioContado = $('.bottom input').val();
                if (precioContado == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
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
                    $('.contiene a.selecuotas').html('Seleccionar cuotas');
                    $('.contiene a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $('.contiene .selec-financiacion-big input').val('$0,00');
                    $('.contiene .selec-financiacion-big input').css('opacity','0.5'); 
                    $('.contiene .zona-valores .cft p span').html('0,00');
                    $('.contiene .zona-valores .right .ptf p span').html('0,00');
                    $('.contiene .zona-valores .right .tea p span').html('0,00');
                }
            });
            
            
            // CLICKs en Seleccionar tarjeta
            
            $('.contiene').on('click', '.seletarjetas', function() { 
                precioContado = $('.bottom input').val();
                if (precioContado == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
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
                    $(this).parent().parent().children('input').val('$0,00');
                    $(this).parent().parent().children('input').css('opacity','0.5'); 
                    $(this).parent().parent().children('.zona-valores .cft p span').html('0,00');
                    $(this).parent().parent().children('.zona-valores .right .ptf p span').html('0,00');
                    $(this).parent().parent().children('.zona-valores .right .tea p span').html('0,00');
                }
            });

            // CLICKs en Seleccionar cuota
            
            $('.contiene').on('click', '.selecuotas', function() { 
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
            bancoVal = $(this).val();
            var bancoLogo = $(this).parent().children('img').attr('src');
            $('#bancos').modal('toggle');
                if ((tarjetaVal != '') && (bancoVal != '')) {
                        $('.contiene a.selecuotas').removeClass('disabled');
                        $('.contiene a.selebancos').html('<img src="'+bancoLogo+'" rel="'+bancoVal+'" alt="" title="Click para modificar el banco">');
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
                
                var getVal = $('.contiene .bottom').children('input').val();
                tarjetaVal = $('.contiene a.seletarjetas').children('img').attr('rel');
                bancoVal = $('.contiene a.selebancos').children('img').attr('rel');
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
                        $('.contiene a.selecuotas').html('<span title="Click para modificar la cantidad de cuotas">'+cuotasTxt+'</span>');
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

                                        $('.contiene .selec-financiacion-big input').css('opacity','1'); 
                                        $('.contiene .cft p span').html(cft);
                                        $('.contiene .tea p span').html(tea);
                                        $('.contiene .selec-financiacion-big input').attr('data-cuotas', cuotasVal);
                                        $('.contiene .selec-financiacion-big input').attr('data-cft', cft);
                                        $('.contiene .selec-financiacion-big input').attr('data-tea', tea); 
                                        $('.contiene .selec-financiacion-big input').attr('data-coef', coef); 
                                        var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                                        finalCuota = parseFloat(finalCuota).toFixed(2);
                                        var ptf = (finalCuota * cuotasVal);
                                        ptf = parseFloat(ptf).toFixed(2);
                                        ptf = ptf.toString();
                                        ptf = ptf.replace('.',',');
                                        var finalCuota = finalCuota.toString();
                                        finalCuota = finalCuota.replace('.',',');
                                        finalCuota = ('$'+finalCuota);
                                        $('.contiene .selec-financiacion-big input').val(finalCuota);
                                        $('.contiene .selec-financiacion-big input').attr('value', finalCuota); 
                                        $('.contiene .ptf p span').html(ptf);
                                        $('.contiene .zona-valores').css('display','block'); 
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
                                $('.contiene').find('.quitar').each(function(){
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

            //Agregar precio tachado
            $('.contiene').on('click', '.bottom .agregartachado', function(e) { 
                e.preventDefault();
                var estadoPri = $('.contiene input.big').val();
                if (estadoPri == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
                }
                else {
                    $('.contiene .preciotach').css('display','block');
                    $('.contiene .quitartachado').css('display','block');
                    $(this).css('display', 'none');
                }
                return false;
            });

            // DAR Formato a Precio Tachado
            $('.contiene').on('change', 'input.tach', function() {
                    var getVal9 = $(this).val();
                    getVal9 = getVal9.replace('$','');
                    if (getVal9 !="") {
                        getVal9 = getVal9.replace(',','.');
                        var nuevoVal9 = parseFloat(getVal9).toFixed(2);
                        nuevoVal9 = nuevoVal9.replace('.',',');
                        $(this).val('$'+nuevoVal9);
                        $(this).attr('value', '$'+nuevoVal9);
                   }
                   else {
                        $(this).val('$0,00');
                        $(this).attr('value', '$0,00');
                   }
            });

            //Eliminar precio tachado
            $('.contiene').on('click', '.bottom .quitartachado', function(e) {
                e.preventDefault();
                $(this).css('display', 'none');
                $('.contiene .agregartachado').css('display','block');
                $('.contiene .preciotach').css('display','none');
                return false;
            });

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
    });

function Convert() {
        convertParameter = "storefile=true&PageNo=true&PageWidth=500&PageHeight=500&JpgQuality=100";
        convertParameter = convertParameter  + "&OutputFileName=" + name; 
        convertParameter = convertParameter  + "&curl=" + encodeURI(jQuery('#dato').val()); 
        convertParameter = convertParameter  + "&ApiKey=855890385";
        convertParameter = convertParameter  + "&callback=?"

        jQuery.getJSON(serviceUrl + convertParameter , function(data){
            if (data.Result == true) {
                //document.getElementById("LabelMessage").innerHTML = '';
                document.getElementById("enlace").href = data.FileUrl;
                var ruta = data.FileUrl;
                                $.ajax({
                                type: "POST",
                                url: 'plantilla-image.php',
                                dataType: "html",
                                data: {
                                    'ruta': ruta,
                                    'name': name
                                },
                                success: function(data2) { 
                                    var txtsuge = $('#descripcion').val();

                                    var urlcompartir = "http://www.facebook.com/sharer.php?s=100&p[url]="+data2+"?&p[images][0]="+data2+"";
                                    $("#enlace").attr('href',urlcompartir);

                                      urlinstagram = data2.replace('.html', '.jpg');
                                      urlwhatsapp = "https://api.whatsapp.com/send?text="+txtsuge+" "+urlinstagram+"";
                                      urlfacebook = urlcompartir;
                                      window.popup = window.open(urlwhatsapp,'ventanacompartir', 'toolbar=0, status=0, width=650, height=650');
                                    //  a.dispatchEvent(evt); 
                                        setTimeout(
                                          function() 
                                          {
                                            $('#modal-ya .instagram a').attr('href', urlinstagram);
                                            $('#modal-ya .facebook a').attr('href', urlfacebook);
                                            $('#modal-ya').modal('show');
                                          }, 5000);
                                    return false;
                                }
                        });
            } else {
                //alert(data.Error);
            }
        });
    }
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
                        <p class="col-xs-12"><img src="images/titulos/facebook.png" class="img-responsive" alt="">Diseñando publicación para Whatsapp</p>
            </div>

            <div id="wraprod"></div>

            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start-->
                <div class="botonera-acciones col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <?php 
                        $result_plantilla=mysql_query("select * from redes_plantilla_facebook WHERE tipo='gratuita'");
                        if ($row_plantilla=mysql_fetch_array($result_plantilla)) {
                    ?>
                    <ul>
                        <li class="tituloseccion plantilla" data-link="#plantilla-grat">PLANTILLA PARA EDITAR</li>
                    </ul>
                    <?php 
                    }
                            $result_pred=mysql_query("select * from redes_predeterminados WHERE tipo='gratuita'");
                            if ($row_pred=mysql_fetch_array($result_pred)) {
                    ?>
                    <ul>
                        <li class="tituloseccion"><a href="#">DISEÑOS DISPONIBLES</a></li>
                    </ul>
                    <div class="lista-scroll" style="display: none;">
                        <?php 
                            do {
                            ?>
                                <a class="predet dise" title="Seleccioná" href="redes/predeterminados/<?php echo($row_pred['foto']); ?>" rel="<?php echo($row_pred['Id']); ?>"><img src="redes/predeterminados/<?php echo($row_pred['foto']); ?>" class="img-responsive" alt=""></a>
                            <?php
                            } while ($row_pred=mysql_fetch_array($result_pred)); 
                        ?>
                    </div>
                    <?php 
                        }

                        $result_gifs=mysql_query("select * from redes_gifs WHERE tipo='gratuita'");
                        if ($row_gifs=mysql_fetch_array($result_gifs)) {
                    ?>
                    <ul>
                        <li class="tituloseccion"><a href="#">GIFS DISPONIBLES</a></li>
                    </ul>
                    <div class="lista-scroll" style="display: none;">
                        <?php 
                            do {
                            ?>
                                <a class="predet gife" title="Seleccioná" href="redes/gifs/<?php echo($row_gifs['foto']); ?>" rel="<?php echo($row_gifs['Id']); ?>"><img src="redes/gifs/<?php echo($row_gifs['foto']); ?>" class="img-responsive" alt=""></a>
                            <?php
                            } while ($row_gifs=mysql_fetch_array($result_gifs)); 
                        ?>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Estadisticas start-->
                <div class="wrap-container col-lg-10 col-md-10 col-sm-12 col-xs-12" style="padding-left: 15px;">
                    
                    <div class="wrap-facebook">
                        <div id="base-empty-grat" class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        </div>
                        <div id="forprevia">
                            <?php 
                                mysql_data_seek($result_plantilla, 0);
                                if ($row_plantilla=mysql_fetch_array($result_plantilla)) {
                                    ?>
                                        <div id="plantilla-grat" class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="display: none;">
                                            <img src="redes/<?php echo($row_plantilla['banner']); ?>" style="float:left;" height="114" width="500" alt="">
                                            <!--.contiene-->
                                            <div class="contiene" style="background-image: url(redes/<?php echo($row_plantilla['fondo']); ?>);">
                                                <p class="titulo"></p>
                                                <div class="imagen">
                                                    <img src="" alt="">
                                                    <a class="selecucarda cucarda1" data-toggle="modal" href="#cucardas1" title="Click aqui para agregar cucarda"><span>ELEGIR CUCARDA</span></a>
                                                    <a class="selecucarda cucarda2" data-toggle="modal" href="#cucardas2" title="Click aqui para agregar cucarda"><span>ELEGIR CUCARDA</span></a>
                                                </div>

                                                <div class="bottom">
                                                    <a href="#" class="agregartachado" title="Agregar precio tachado"></a>
                                                    <a href="#" class="quitartachado" title="Quitar precio tachado"></a>
                                                    <span>OFERTA CONTADO</span>
                                                    <input onkeypress="return Onlyprices(event)" class="auto big" type="text" step=",01" value="$0,00"> 

                                                    <div class="preciotach"><span>ANTES</span> <input onkeypress="return Onlyprices(event)" class="auto tach" type="text" step=",01" value="$0,00"><div class="linea"></div></div>
                                                </div>

                                                <div class="descripcion">
                                                    <p><strong style="font-weight:normal"; placeholder="Escribe aqui la descripcion..." contenteditable="true">HELADERA CON FREEZER. 281 LITROS. ICE TWISTER. EFICIENCIA ENERGÉTICA A.</strong> Origen: '.$origen.'</p>
                                                </div>

                                                <a href="#" id="agregar-sda" title="Click aqui para agregar una financiacion a este producto"><span>LOS PRECIOS CONTADO SON VÁLIDOS EN EFECTIVO, TARJETA DE DÉBITO ó TARJETA DE CRÉDITO EN 1 PAGO.</span><img src="images/btn_agregar-finan2.png" alt=""></a>

                                                <div class="selec-financiacion-big">
                                                        <div class="mitad">
                                                            <a href="#tarjetas" data-toggle="modal" class="sele seletarjetas" title="Click aqui para seleccionar tarjeta">Seleccionar tarjeta</a>
                                                            <a data-toggle="modal" href="#bancos" class="sele selebancos disabled" title="Click aqui para seleccionar banco">Seleccionar banco</a>
                                                        </div>
                                                        <div class="zona-cuota">
                                                            <a data-toggle="modal" href="#cuotas" class="sele selecuotas disabled" title="Click aqui para seleccionar la cantidad de cuotas">Seleccionar cuotas</a>
                                                        </div>
                                                        <input data-cft="" data-tea="" data-coef="" data-cuotas="" onkeypress="return Onlyprices(event)" class="auto disabled" type="text" step=",01" value="$0,00">
                                                        <div class="zona-valores">
                                                            <div class="cft">
                                                                <a class="eliminar-sda" href="#" title="Click aqui para eliminar esta financiacion">
                                                                    <img src="images/menos.png" alt="">
                                                                </a>
                                                                <p>CFT: <span>0,00</span>%</p>
                                                                <div class="fr_cft">COSTO FINANCIERO TOTAL</div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="ptf">
                                                                    <p>PTF: $<span>0,00</span></p>
                                                                </div>
                                                                <div class="tea"><p>TEA: <span>0,00</span>%</p></div>
                                                            </div> 
                                                        </div> 
                                                </div>                                       
                                            </div><!--/.contiene-->
                                            
                                            <!--.insertar-->
                                            <div class="insertar">
                                            </div><!--/.insertar-->
                                        </div>                                
                                    <?php
                                }
                            ?> 
                            <div id="disepred" class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="display: none;">
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right">
                            <div class="botones-etiquetas">
                                <p><a title="VISTA PREVIA" class="preview disabled" href="#" data-toggle="modal" data-target="#previa" data-backdrop="static" data-keyboard="true">VISTA PREVIA</a></p>
                                <p><a title="COMPARTIR" class="compartir disabled" href="#">COMPARTIR</a></p>
                                <p><a title="DESCARGAR" class="descargar disabled" href="#">DESCARGAR</a></p>
                                <p><a title="ELIMINAR DISEÑO" class="eliminar disabled" href="#"></a></p>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 texto_desc" style="display: none;">
                            <textarea class="form-control" id="descripcion" name="descripcion" maxlength="120" required placeholder="Escribí un texto para tu publicación..."></textarea>
                            <p class="small" style="text-align: right;" id="caracteres_restantes"><span>120</span> caracteres restantes</p>
                            <a title="Ver Ideas" class="btn_verideas" href="#" data-toggle="modal" data-target="#modal-chequeo"></a>
                        </div>
                    </div>
                </div>
                <!-- Estadisticas ends-->
            </div>
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
        </div>
</div>


<div id="editor" style="display:none;"></div>
<input type="hidden" id="dato" name="dato" style="display:none;" value="">
<a id="enlace" style="display:none;" href="#"  target="_blank"></a>
<div id="cargando"></div>

<!-- Modal -->
<div id="previa" class="modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="width:550px!important;">
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

<!-- Modal Ver Ideas -->
<div id="modal-chequeo" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <h3><img src="images/titulo_ideas.png" class="img-responsive center-block" alt=""></h3>
                <form action="" method="post" id="insertaridea" name="insertaridea">
                <?php 
                mysql_data_seek($result_plantilla, 0);
                if ($row_plantilla=mysql_fetch_array($result_plantilla)) { 
                    if (isset($row_plantilla['sugerido1'])) { ?>
                    <div class="form-group">
                        <label>
                            <textarea class="form-control" id="txt1" name="txt1" disabled><?php echo($row_plantilla['sugerido1']); ?></textarea>
                            <input type="radio" name="optiontxt" value="<?php echo($row_plantilla['sugerido1']); ?>">
                            <p class="small" style="text-align: right;"><span><?php echo strlen($row_plantilla['sugerido1']);?></span> caracteres</p>
                        </label>
                    </div>
                    <?php } ?>
                    <?php if (isset($row_plantilla['sugerido2'])) { ?>
                    <div class="form-group">
                        <label>
                            <textarea class="form-control" id="txt2" name="txt2" disabled><?php echo($row_plantilla['sugerido2']); ?></textarea>
                            <input type="radio" name="optiontxt" value="<?php echo($row_plantilla['sugerido2']); ?>">
                            <p class="small" style="text-align: right;"><span><?php echo strlen($row_plantilla['sugerido2']);?></span> caracteres</p>
                        </label>
                    </div>
                    <?php } ?>
                    <?php if (isset($row_plantilla['sugerido3'])) { ?>
                    <div class="form-group">
                        <label>
                            <textarea class="form-control" id="txt3" name="txt3" disabled><?php echo($row_plantilla['sugerido3']); ?></textarea>
                            <input type="radio" name="optiontxt" value="<?php echo($row_plantilla['sugerido3']); ?>">
                            <p class="small" style="text-align: right;"><span><?php echo strlen($row_plantilla['sugerido3']);?></span> caracteres</p>
                        </label>
                    </div>
                    <?php } ?>
                    <a href="#" class="close cerrar" data-dismiss="modal">Seleccionar</a>
                </form>
            <?php } ?>
      </div>
    </div>
    </div>
</div>

<!-- Modal Ya Compartiste -->
<div id="modal-ya" class="modal celeste" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
            <h2 class="celeste">¡Ya compartiste tu diseño!</h2>
            <p class="sin">¿Querés alcanzar a más personas?</p>
            <p class="sin"><strong>Compartilo también en:</strong></p>
            <ul class="iconos-redes">
                <li class="facebook"><a href="#"><img src="images/icono_facebook.png" class="img-responsive" alt="Facebook"> Facebook</a></li>
                <li class="instagram"><a href="#" target="_blank"><img src="images/icono_instagram.png" class="img-responsive" alt="Instagram"> Instagram</a></li>
            </ul>
            <a href="#" class="close" data-dismiss="modal">N0, GRACIAS</a>
      </div>
    </div>
    </div>
</div>

<!-- Modal Error Instag -->
<div id="modal-errorinstagram" class="modal celeste" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body text-center">
            <p class="sin">Ingresá tu mail para recibir la imagen para compartir en Instagram.<br><br></p>
            <div><form action='' method='post' id='mailform' name='mailform'><div class='form-group'><input type='text' class="form-control" name='txtmail' id='txtmail' value='' placeholder='Tu e-mail' required></div><input type="button" id="mailcontinuar" class="btn-celeste" value="CONTINUAR"></form></div>
      </div>
    </div>
    </div>
</div>


<!-- Modal Foto Ampliada-->
<div id="fotoampliada" class="modal fade" role="dialog" tabindex="-1">
                                          <div class="modal-dialog" style="width:100%!important; padding:0 30px;">
                                            <!-- Modal content-->
                                            <div class="modal-content" style="width:100%!important;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                              <div class="modal-body">
                                                  <img src="" alt="" style="width:100%; max-width:100%; height:auto;">
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

<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
<script src="js/menu_jquery.js"></script>

</body>
</html>
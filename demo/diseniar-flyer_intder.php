<?php 
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if (!isset($_SESSION{"archivo_tapa_".$_SESSION['ESTADO']})) { 
     header("Location:diseniar-flyer.php");
}
if (!isset($_SESSION{"archivo_contratapa_".$_SESSION['ESTADO']})) { 
     header("Location:diseniar-flyer_contratapa.php");
}
if (!isset($_SESSION{"archivo_intizq_".$_SESSION['ESTADO']})) { 
     header("Location:diseniar-flyer_intizq.php");
}
?>
<?php 
$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");
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
    
    
    function Onlynumbers(e)
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
        if((tecla >= "97") && (tecla <= "122")){
            return false;
        }
    }
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
        if (tecla > 31 && (tecla < 46 || tecla > 57)) {
            return false;
        }
    }
    function Onlyletters(e)
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
        if (((tecla  != 32) && (tecla < 65)) || ((tecla > 90) && (tecla < 97)) || (tecla > 122)) {
            return false;
        }
    }
     
     $(window).load(function(){
		SameHeight('.listado-prod li.col-md-5ths .content');
      });
     

        $(document).ready(function () {
            var status = "";

            $(".insertar").click(function() {     
                var contenido = $('#wraprod').html();
                if (contenido == '') {
				    $("#wraprod").load( "productos-inner.php", function() {
                      $('#btndown').fadeIn();
                    });
                    $('#wraprod').css('height','985px');
                }
                else {
                    $("body").animate({
                         scrollTop: $("#wraprod").offset().top
                    }, 800);
                }
                return false;
            });
            $('#flyercontainer').on('click', '.producto .insertar', function() { 
                $("body").animate({
                         scrollTop: $("#wraprod").offset().top
                  }, 800);
                return false;
            });
            $('#flyercontainer').on('click', '.producto .quitar', function() {
                var quitar = $(this).attr('id');
                $(this).parent().parent().parent().removeClass('completed');
				$(this).parent().parent().parent('.producto').html('<a class="insertar" href="productos.php" title="Insertar producto"><img style="width:100%;" src="images/diseniar/bg_block_producto.png" alt=""></a><div class="bottom"><strong>$0</strong></div>');
                $('.continuar, .preview').addClass('disabled');
                $('.continuar').removeClass('verde');
                $('input[type=checkbox]').each(function () {
                    $(this).prop('checked', false);
                    var valorCh = $(this).val();
                    //alert(valorCh);
                    if (valorCh == quitar) {
                        $(this).parent().parent().parent().fadeIn( 'normal', function(){ 
                  $("body").animate({
                         scrollTop: $("#wraprod").offset().top
                  }, 800);
                });
                    }
                });
                return false;
            });
            $('#wraprod').on('click', 'a', function() { 
                var newurl = $(this).attr('href');
				$('#wraprod').load(newurl);
                return false;
            });
            
            
            $('#wraprod').on('click', ':checkbox', function() { 
                var checkValor = $(this).val();
                var long = $( "#flyercontainer .completed" ).length;
                $(this).parent().parent().parent('li').fadeOut( 'normal', function(){ 
                  if (long < 2) {
                      $("body").animate({
                             scrollTop: $("#flyercontainer").offset().top
                      }, 800);
                  }
                  if ((long > 1) && (long < 4)) {
                      $("body").animate({
                             scrollTop: $("#flyercontainer #tres").offset().top
                      }, 800);
                  }
                  if ((long > 3) && (long < 6)) {
                      $("body").animate({
                             scrollTop: $("#flyercontainer #cinco").offset().top
                      }, 800);
                  }
                });
                //alert(checkValor);

                if (long == 5) {
                    $('.continuar, .preview').removeClass('disabled');
                    $('.continuar').addClass('verde');
                }
                if (long <= 5) {
                    $('#cargando').fadeIn();
                    $.ajax({
                        type: "POST",
                        url: "prodenflyer.php",
                        dataType: "html",
                        data: {
                            'id': checkValor
                        },
                        success: function(data) { 
                            $('#cargando').fadeOut();
                            $('#btndown').fadeIn();
                            if($('#uno').hasClass('completed')) {
                            }
                            else {
                                $('#uno').addClass('completed');
                                $("#uno").html(data);
                                $("#flyercontainer #uno .numero").text('1');
                                return false;
                            }
                            if($('#dos').hasClass('completed')) {
                            }
                            else {
                                $('#dos').addClass('completed');
                                $("#dos").html(data); 
                                $("#flyercontainer #dos .numero").text('2');
                                return false;
                            }
                            if($('#tres').hasClass('completed')) {
                            }
                            else {
                                $('#tres').addClass('completed');
                                $("#tres").html(data); 
                                $("#flyercontainer #tres .numero").text('3');
                                return false;
                            }
                            if($('#cuatro').hasClass('completed')) {
                            }
                            else {
                                $('#cuatro').addClass('completed');
                                $("#cuatro").html(data);
                                $("#flyercontainer #cuatro .numero").text('4');
                                return false;
                            }
                            if($('#cinco').hasClass('completed')) {
                            }
                            else {
                                $('#cinco').addClass('completed');
                                $("#cinco").html(data); 
                                $("#flyercontainer #cinco .numero").text('5');
                                return false;
                            }
                            if($('#seis').hasClass('completed')) {
                            }
                            else {
                                $('#seis').addClass('completed');
                                $("#seis").html(data); 
                                $("#flyercontainer #seis .numero").text('6');
                                $('.continuar, .preview').removeClass('disabled');
                                $('.continuar').addClass('verde');
                                return false;
                            }
                        }
                    });
                }
            }); 
            
            $('#flyercontainer').on('click', '.wrap-flyer .primera', function() { 
                var despState = $(this).parent('.desplegable').css('height');
                if (despState == '39px') {
                    $(this).parent('.desplegable').css('height','auto');
                    var cantItems = $(this).parent('.desplegable').children('.item').length;
                    var newPos = (cantItems * 37);
                    $(this).parent('.desplegable').css('bottom','-'+newPos+'px');
                }
                else {
                    $(this).parent('.desplegable').children('div').removeClass('active');
                    $(this).addClass('active');
                    var clonar = $(this).clone();
                    var aClonar = $(this).parent('.desplegable').children('.item:first');
                    $(this).parent('.desplegable').prepend(clonar);
                    $(this).parent('.desplegable').css('height','39px');
                    $(this).parent('.desplegable').css('bottom','0px');
                    $(this).remove();
                }
                return false;
            });
            
            $('#flyercontainer').on('click', '.wrap-flyer .item', function() { 
                var despState = $(this).parent('.desplegable').css('height');
                if (despState == '39px') {
                    $(this).parent('.desplegable').css('height','auto');
                    var cantItems = $(this).parent('.desplegable').children('.item').length;
                    var newPos = (cantItems * 37);
                    $(this).parent('.desplegable').css('bottom','-'+newPos+'px');
                }
                else {
                    $(this).parent('.desplegable').children('div').removeClass('active');
                    $(this).addClass('active');
                    var clonar = $(this).clone();
                    var aClonar = $(this).parent('.desplegable').children('.item:first');
                    $(this).parent('.desplegable').prepend(clonar);
                    $(this).parent('.desplegable').css('height','39px');
                    $(this).parent('.desplegable').css('bottom','0px');
                    $(this).remove();
                }
                return false;
            });
            
            /* START DESPLEGABLE PRECIO */
            $('#flyercontainer').on('click', '.wrap-flyer .arrow3', function() { 
                var despState = $(this).parent('.desplegable3').css('height');
                if (despState == '30px') {
                    $(this).parent('.desplegable3').css('height','auto');
                    $(this).parent('.desplegable3').css('overflow-y','auto');
                    $(this).parent('.desplegable3').find('img').css('width','80px');
                    $(this).css('display','none');
                    var cantItems = $(this).parent('.desplegable3').children('.item3').length;
                    var newPos = (cantItems * 30);
                    $(this).parent('.desplegable3').css('bottom','-'+newPos+'px');
                }
                else {
                    $('#flyercontainer .desplegable3').css('height','30px');
                    $('#flyercontainer .desplegable3').css('overflow','hidden');
                    $('#flyercontainer .desplegable3').css('overflow-y','hidden');
                    $('#flyercontainer .desplegable3').css('-ms-overflow-y','hidden');
                    $('#flyercontainer .desplegable3').find('img').css('width','95px');
                    $(this).css('display','block');
                    $('#flyercontainer .desplegable3').scrollTop(0);
                }
                return false;
            });
            
            var frase1 = '';
            var frase2 = '';
            var frase3 = '';
            var precioactual = 0;
            var campoprecio = 0;
            $('#flyercontainer').on('click', '.wrap-flyer .primera3', function() { 
                frase1 = $(this).parent('.desplegable3').parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_tae');
                frase2 = $(this).parent('.desplegable3').parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_ptf');
                frase3 = $(this).parent('.desplegable3').parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_pvp');
                campoprecio = $(this).parent('.desplegable3').parent('.bottom').children('.big');
                precioactual = $(this).parent('.desplegable3').parent('.bottom').children('.big').val();
                precioactual = precioactual.split("$");
                precioactual = precioactual[1];
                precioactual = precioactual.replace(/,/g,'.');
                
                var despState = $(this).parent('.desplegable3').css('height');
                if (despState == '30px') {
                    $(this).parent('.desplegable3').css('height','auto');
                    $(this).parent('.desplegable3').css('overflow-y','auto');
                    $(this).parent('.desplegable3').find('img').css('width','80px');
                    $(this).parent('.desplegable3').children('.arrow3').css('display','none');
                    var cantItems = $(this).parent('.desplegable3').children('.item3').length;
                    var newPos = (cantItems * 30);
                    $(this).parent('.desplegable3').css('bottom','-'+newPos+'px');
                }
                else {
                    $('#flyercontainer .desplegable3').children('div').removeClass('active');
                    $(this).addClass('active');
                    var clonar = $(this).clone();
                    var aClonar = $(this).parent('.desplegable3').children('.item3:first');
                    $(this).parent('.desplegable3').prepend(clonar);
                    $(this).parent('.desplegable3').css('height','30px');
                    $(this).parent('.desplegable3').css('overflow','hidden');
                    $(this).parent('.desplegable3').css('overflow-y','hidden');
                    $(this).parent('.desplegable3').css('-ms-overflow-y','hidden');
                    $(this).parent('.desplegable3').find('img').css('width','95px');
                    $(this).parent('.desplegable3').children('.arrow3').css('display','block');
                    $(this).parent('.desplegable3').scrollTop(0);
                    $(this).parent('.desplegable3').css('bottom','0px');
                    $(this).remove();
                }
                var escuota = $(this).children('img').attr('class');
                if (escuota == 'cuota') {
                     $(frase1).css('display','block');
                     $(frase2).css('display','block');
                     $(frase3).children('input').val('');
                }
                else {
                    $(frase1).css('display','none');
                    $(frase2).css('display','none');
                    var porcentajePVP = parseInt($(frase3).children('input').attr('data-info'));
                    precioactual = parseInt(precioactual);
                    var calculoPVP = ((porcentajePVP * precioactual)/100);
                    calculoPVP = (calculoPVP + precioactual);
                    $(frase3).children('input').val(calculoPVP);
                    $(frase3).css('display','block');
                }
                var esptf = $(this).children('img').attr('data-link');
                var estae = $(this).children('img').attr('data-tae');
                if (esptf != null) {
                    esptf = (esptf * precioactual);
                    $(frase2).children('input').val(esptf);
                }
                else {
                    $(frase2).children('input').val('');
                }
                if (estae != null) {
                    $(frase1).children('input').val('');
                }
                else {
                    $(frase1).children('input').val('0');
                }
                return false;
            });
            
            $('#flyercontainer').on('click', '.wrap-flyer .item3', function() { 
                frase1 = $(this).parent('.desplegable3').parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_tae');
                frase2 = $(this).parent('.desplegable3').parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_ptf');
                frase3 = $(this).parent('.desplegable3').parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_pvp');
                campoprecio = $(this).parent('.desplegable3').parent('.bottom').children('.big');
                precioactual = $(this).parent('.desplegable3').parent('.bottom').children('.big').val();
                precioactual = precioactual.split("$");
                precioactual = precioactual[1];
                precioactual = precioactual.replace(/,/g,'.');
                
                var despState = $(this).parent('.desplegable3').css('height');
                if (despState == '30px') {
                    $(this).parent('.desplegable3').css('height','auto');
                    $(this).parent('.desplegable3').css('overflow-y','auto');
                    $(this).parent('.desplegable3').find('img').css('width','80px');
                    var cantItems = $(this).parent('.desplegable3').children('.item3').length;
                    var newPos = (cantItems * 30);
                    $(this).parent('.desplegable3').css('bottom','-'+newPos+'px');
                }
                else {
                    $(this).parent('.desplegable3').children('div').removeClass('active');
                    $(this).addClass('active');
                    var clonar = $(this).clone();
                    var aClonar = $(this).parent('.desplegable3').children('.item3:first');
                    $(this).parent('.desplegable3').prepend(clonar);
                    $(this).parent('.desplegable3').css('height','30px');
                    $(this).parent('.desplegable3').css('overflow','hidden');
                    $(this).parent('.desplegable3').css('overflow-y','hidden');
                    $(this).parent('.desplegable3').css('-ms-overflow-y','hidden');
                    $(this).parent('.desplegable3').find('img').css('width','95px');
                    $(this).parent('.desplegable3').scrollTop(0);
                    $(this).parent('.desplegable3').css('bottom','0px');
                    $(this).remove();
                }
                var escuota = $(this).children('img').attr('class');
                if (escuota == 'cuota') {
                     $(frase1).css('display','block');
                     $(frase2).css('display','block');
                     $(frase3).children('input').val('');
                }
                else {
                    $(frase1).css('display','none');
                    $(frase2).css('display','none');
                    var porcentajePVP = parseInt($(frase3).children('input').attr('data-info'));
                    precioactual = parseInt(precioactual);
                    var calculoPVP = ((porcentajePVP * precioactual)/100);
                    calculoPVP = (calculoPVP + precioactual);
                    $(frase3).children('input').val(calculoPVP);
                    $(frase3).css('display','block');
                }
                var esptf = $(this).children('img').attr('data-link');
                if (esptf != null) {
                    esptf = (esptf * precioactual);
                    $(frase2).children('input').val(esptf);
                }
                else {
                    $(frase2).children('input').val('');
                }
                var estae = $(this).children('img').attr('data-tae');
                if (estae != null) {
                    $(frase1).children('input').val('');
                }
                else {
                    $(frase1).children('input').val('0');
                }
                return false;
            });
            /* END DESPLEGABLE PRECIO */
            
            /* START DESPLEGABLE SEGUNDO PRECIO */
            $('#flyercontainer').on('click', '.wrap-flyer .arrow5', function() { 
                var despState = $(this).parent('.desplegable5').css('height');
                if (despState == '30px') {
                    $(this).parent('.desplegable5').css('height','auto');
                    $(this).parent('.desplegable5').css('overflow-y','auto');
                    $(this).parent('.desplegable5').find('img').css('width','80px');
                    $(this).css('display','none');
                    var cantItems = $(this).parent('.desplegable5').children('.item5').length;
                    var newPos = (cantItems * 30);
                    $(this).parent('.desplegable5').css('bottom','-'+newPos+'px');
                }
                else {
                    $('#flyercontainer .desplegable5').css('height','30px');
                    $('#flyercontainer .desplegable5').css('overflow','hidden');
                    $('#flyercontainer .desplegable5').css('overflow-y','hidden');
                    $('#flyercontainer .desplegable5').css('-ms-overflow-y','hidden');
                    $('#flyercontainer .desplegable5').find('img').css('width','95px');
                    $(this).css('display','block');
                    $('#flyercontainer .desplegable5').scrollTop(0);
                }
                return false;
            });
            $('#flyercontainer').on('click', '.wrap-flyer .primera5', function() { 
                var despState = $(this).parent('.desplegable5').css('height');
                if (despState == '30px') {
                    $(this).parent('.desplegable5').css('height','auto');
                    $(this).parent('.desplegable5').css('overflow-y','auto');
                    $(this).parent('.desplegable5').find('img').css('width','80px');
                    $(this).parent('.desplegable5').children('.arrow5').css('display','none');
                    var cantItems = $(this).parent('.desplegable5').children('.item5').length;
                    var newPos = (cantItems * 30);
                    $(this).parent('.desplegable5').css('bottom','-'+newPos+'px');
                }
                else {
                    $('#flyercontainer .desplegable5').children('div').removeClass('active');
                    $(this).addClass('active');
                    var clonar = $(this).clone();
                    var aClonar = $(this).parent('.desplegable5').children('.item5:first');
                    $(this).parent('.desplegable5').prepend(clonar);
                    $(this).parent('.desplegable5').css('height','30px');
                    $(this).parent('.desplegable5').css('overflow','hidden');
                    $(this).parent('.desplegable5').css('overflow-y','hidden');
                    $(this).parent('.desplegable5').css('-ms-overflow-y','hidden');
                    $(this).parent('.desplegable5').find('img').css('width','95px');
                    $(this).parent('.desplegable5').children('.arrow5').css('display','block');
                    $(this).parent('.desplegable5').scrollTop(0);
                    $(this).parent('.desplegable5').css('bottom','0px');
                    $(this).remove();
                }
                return false;
            });
            
            $('#flyercontainer').on('click', '.wrap-flyer .item5', function() { 
                var despState = $(this).parent('.desplegable5').css('height');
                if (despState == '30px') {
                    $(this).parent('.desplegable5').css('height','auto');
                    $(this).parent('.desplegable5').css('overflow-y','auto');
                    $(this).parent('.desplegable5').find('img').css('width','80px');
                    var cantItems = $(this).parent('.desplegable5').children('.item5').length;
                    var newPos = (cantItems * 30);
                    $(this).parent('.desplegable5').css('bottom','-'+newPos+'px');
                }
                else {
                    $(this).parent('.desplegable5').children('div').removeClass('active');
                    $(this).addClass('active');
                    var clonar = $(this).clone();
                    var aClonar = $(this).parent('.desplegable5').children('.item5:first');
                    $(this).parent('.desplegable5').prepend(clonar);
                    $(this).parent('.desplegable5').css('height','30px');
                    $(this).parent('.desplegable5').css('overflow','hidden');
                    $(this).parent('.desplegable5').css('overflow-y','hidden');
                    $(this).parent('.desplegable5').css('-ms-overflow-y','hidden');
                    $(this).parent('.desplegable5').find('img').css('width','95px');
                    $(this).parent('.desplegable5').scrollTop(0);
                    $(this).parent('.desplegable5').css('bottom','0px');
                    $(this).remove();
                }
                return false;
            });
            /* END DESPLEGABLE SEGUNDO PRECIO */
            
            $(".preview").click(function() { 
                var flyer = "";
                flyer = $('#intder').clone();
                $('#preview .modal-body').html(flyer);
                $('#preview img.origen, #preview .quitar').css('display', 'none');
                $('.wrap-flyer .productos .producto').css('border-color', '#fff!important');
                
                var stringFrases = '';
                $("#preview .frases").each(function() {
                      stringFrases = stringFrases + ' '+($(this).parent('.imagen').children('.numero').html()) + ') ';
                      $(this).children('p').each(function() {
                          var valEP = $(this).children('input').val();
                          if (valEP !='') {
                                stringFrases = stringFrases +' '+ ($(this).children('span').html());
                                stringFrases = stringFrases + valEP;
                                if ($(this).children('strong').length > 0) {
                                    stringFrases = stringFrases + ($(this).children('strong').html()); 
                                }
                          }
                      });
                });
                $('#preview .legalesprod').html(stringFrases);
                
                $("#preview .desplegable").each(function() {
                  if ($(this).children('.primera').hasClass('active')) {
                      //OCULTO TEMP $(this).css('display','none');
                  }
                });
                $("#preview .desplegable3").each(function() {
                  if ($(this).children('.primera3').hasClass('active')) {
                      $(this).css('display','none');
                  }
                });
                $("#preview .desplegable5").each(function() {
                      $(this).children('.primera5').css('opacity', '0');
                      var contDes5 = $(this).children(':first-child').attr('class');
                      if (contDes5 == 'primera5') {
                            $(this).css('display','none');
                            $(this).parent('.bottom').children('input.big').css('width', '100%');
                            $(this).parent('.bottom').children('input.big').css('left', '0');
                      }
                      if ($(this).children('.primera5').hasClass('active')) {
                          $(this).css('display','none');
                          $(this).parent('.bottom').children('input.big').css('width', '100%');
                          $(this).parent('.bottom').children('input.big').css('left', '0');
                      }
                });
                $("#preview input.small").each(function() {
                    var valFinSM = $(this).val();
                    if (valFinSM == '$0,00') {
                        $(this).css('display', 'none');
                    }
                }); 
            });
            
            
            $(".continuar").click(function() { 
                /* CONTROL 2° PRECIO SI SELECCIONA 2° DESPLEGABLE */
                var controlSdo = 0;
                var inputSdo ='';
                $('#flyercontainer .desplegable5').each(function () {
                        var contDes5 = $(this).children(':first-child').attr('class');
                        inputSdo = $(this).parent('.bottom').children('.small');
                        if ((contDes5 == 'primera5') || (contDes5 == 'primera5 active')) {
                        }
                        else {
                            if ($(inputSdo).val()=='$0,00') {
                                controlSdo = 1;
                            }
                        }
                });
                if (controlSdo == 1) {
                     //alert('Complete el PRECIO que corresponde al Bono Marquez, Bono Descuento o Ahorra! en los productos donde haya asignado una de estas bonificaciones.');
                    //return false;
                }
                
                /* CONTROL INPUTS CUOTAS */
                var controlcuotas = 0;
                $('#flyercontainer .desplegable3').each(function () {
                        var clasecta = $(this).children('.active').children('img').attr('class');
                        if (clasecta == 'cuota') {
                           $(this).parent().parent().children('.content').children('.imagen').children('.frases').children('p').children('input').each(function () {
                               var valFin = $(this).val();
                                if (valFin == '') {
                                   controlcuotas = 1;
                                }
                           });
                        }
                });
                if (controlcuotas == 1) {
                        alert('Agregue TAE, PTF y PVP DE LISTA a todos los productos financiados en cuotas.');
                        return false;
                }
                /* CONTROL INPUTS OBLIGATORIOS */
                var control0 = 0;
                $('#flyercontainer .bottom input.big, #flyercontainer input.stock').each(function () {
                        var valFin = $(this).val();
                        if ((valFin == '$0,00') || (valFin == '')) {
                           control0 = 1;
                        }
                });
                if (control0 == 1) {
                     alert('Agregue los PRECIOS y el STOCK a todos los productos del flyer.');
                    return false;
                }
                else {
                    $('#cargando').fadeIn();
                    $( "#flyercontainer .quitar" ).each(function() {
                        var id_quitar = $(this).attr('id');
                        var cara = "intder";
                        var limite = 6;
                        $.ajax({
                                    type: "POST",
                                    dataType : "html",
                                    url: "guardarating.php",
                                    data: {
                                        id_quitar: id_quitar,
                                        cara: cara,
                                        limite: limite
                                    },
                                    complete: function(data){
                                        console.log(data);
                                    },
                                    error: function( xhr, status ) {
                                        console.log(data);
                                        return false;
                                    }
                        });
                    });
                    var sesion = {};
                    var flyer = {};
                    var cara = "intder";
                    sesion = $('#flyercontainer').html();
                    /* FRASES LEGALES AL FLYER */
                    var stringFrases = '';
                    $("#flyercontainer .frases").each(function() {
                          stringFrases = stringFrases + ' '+($(this).parent('.imagen').children('.numero').html()) + ') ';
                          $(this).children('p').each(function() {
                              var valEP = $(this).children('input').val();
                              if (valEP !='') {
                                    stringFrases = stringFrases +' '+ ($(this).children('span').html());
                                    stringFrases = stringFrases + valEP;
                                    if ($(this).children('strong').length > 0) {
                                        stringFrases = stringFrases + ($(this).children('strong').html()); 
                                    }
                              }
                          });
                    });
                    $('#flyercontainer .legalesprod').html(stringFrases);
                    $('#flyercontainer .quitar, #flyercontainer .origen, #flyercontainer .frases').remove();
                    
                    $('#flyercontainer #intder.wrap-flyer .productos .completed .bottom input').css('paddingLeft','0');
                    
                    $( "#flyercontainer .desplegable" ).each(function() {
                        $(this).css('border','0px');
                        $(this).children('.arrow').remove();
                      if ($(this).children('.primera').hasClass('active')) {
                          //OCULTO TEMP $(this).remove();
                      }
                    });
                    $( "#flyercontainer .desplegable3" ).each(function() {
                        $(this).css('border','0px');
                        $(this).css('background','transparent');
                        $(this).css('top','0px');
                        $(this).css('height','30px!important');
                        $(this).children('.arrow3').remove();
                        $(this).children('.primera3').css('opacity', '0');
                      if ($(this).children('.primera3').hasClass('active')) {
                          $(this).remove();
                      }
                    });
                    $("#flyercontainer .desplegable5").each(function() {                 
                        $(this).css('border','0px');
                        $(this).css('background','transparent');
                        $(this).css('top','0px');
                        $(this).css('height','30px!important');
                        $(this).children('.arrow5').remove();
                        
                        $(this).children('.primera5').css('opacity', '0');
                        var contDes5 = $(this).children(':first-child').attr('class');
                          if (contDes5 == 'primera5') {
                                $(this).css('display','none');
                                $(this).parent('.bottom').children('input.big').css('width', '100%');
                                $(this).parent('.bottom').children('input.big').css('left', '0');
                                $(this).remove();
                          }
                          if ($(this).children('.primera5').hasClass('active')) {
                              $(this).css('display','none');
                              $(this).parent('.bottom').children('input.big').css('width', '100%');
                              $(this).parent('.bottom').children('input.big').css('left', '0');
                              $(this).remove();
                          }
                    });
                    $("#flyercontainer input.small").each(function() {
                        var valFinSM = $(this).val();
                        if (valFinSM == '$0,00') {
                           $(this).remove();
                        }
                    });
                    
                    flyer = $('#flyercontainer').html();
                    flyer = flyer.replace(/images/g, "../../images");
                    flyer = flyer.replace(/"flyer/g, '"../../flyer'); 
                    <?php 
                    if (isset($_SESSION{"archivo_intder_".$_SESSION['ESTADO']})) { ?>
                        var name = '<?php echo($_SESSION{"archivo_intder_".$_SESSION['ESTADO']}); ?>';
                    <?php 
                    }
                    else {
                    ?>
                    var name = '<?php echo("flyer/html/FLYER_INTERIORDER_".date('m-d-Y_hia').".html"); ?>';
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
                            complete: function(data){
                                window.location.href = "diseniar-flyer_detalle.php";
                            },
                            error: function( xhr, status ) {
                            }
                    });
                    return false;
                }
            });
            
            $('#flyercontainer').on('change', '.producto .auto', function() { 
                var getVal = $(this).val();
                getVal = getVal.replace('$','');
                if ((getVal !="")|| (getVal !=0)) {
                    var nuevoVal = parseFloat(getVal).toFixed(2);
                    nuevoVal = nuevoVal.replace('.',',');
                    nuevoVal = ('$')+nuevoVal;
                    $(this).val(nuevoVal);
                    $(this).attr('value', nuevoVal);
                }
                else {
                    $(this).val('$0,00');
                }
            });
            
            $('#flyercontainer').on('change', '.producto .big', function() { 
                var getVal = $(this).val();
                getVal = getVal.replace('$','');
                getVal = getVal.replace(',','.');
                var esptf = $(this).parent('.bottom').children('.desplegable3').children('.active').children('img').attr('data-link');
                var escuota = $(this).parent('.bottom').children('.desplegable3').children('.active').children('img').attr('class');
                var frase2 = $(this).parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_ptf');
                var frase3 = $(this).parent('.bottom').parent('.producto').children('.content').children('.imagen').children('.frases').children('#frase_pvp');
                if (esptf != null) {
                    esptf = (esptf * getVal);
                    $(frase2).children('input').val(esptf);
                }
                if (escuota != 'cuota') {
                    var porcentajePVP = parseInt($(frase3).children('input').attr('data-info'));
                    getVal = parseInt(getVal);
                    var calculoPVP = ((porcentajePVP * getVal)/100);
                    calculoPVP = (getVal + calculoPVP);
                    $(frase3).children('input').val(calculoPVP);
                }
            });
            
            $('#flyercontainer').on('change', '.producto .frases input', function() { 
                var getVal = $(this).val();
                $(this).attr('value', getVal);
            });
            
            $('#btndown').click(function() {  
                $("body").animate({
                         scrollTop: $("#seis").offset().top
                  }, 800);
                return false;
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
                           //alert(data);
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
                       },
                        error: function (data)
                        {
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
            if (!isset($_SESSION{"intder_".$_SESSION['ESTADO']})) {
                $result_esta=mysql_query("select * from rating_productos WHERE usuario='$usuario' and cara='intder' and actual='si'");
                if($row_esta=mysql_fetch_array($result_esta)){
                    $delete_esta=mysql_query("DELETE FROM rating_productos WHERE usuario='$usuario' and cara='intder' and actual='si'");
                }
            }
            if (isset($_SESSION{"tapa_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_tapa').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"contratapa_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_contratapa').removeClass('disabled');
            <?php }
            if (isset($_SESSION{"intizq_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_intizq').removeClass('disabled');
            <?php } 

            
            if (isset($_SESSION{"intder_".$_SESSION['ESTADO']})) { ?>
                var content = '<?php $_SESSION{"intder_".$_SESSION['ESTADO']}; ?>';
                $('.editar_partes #ed_intder, .preview, .continuar').removeClass('disabled');
                $('.continuar').addClass('verde');
                $.ajax({
                       type: "POST",
                       dataType: "html",
                       url: "recuperarintder.php",
                       data: {
                            'content': content
                        },
                       success: function(data)
                       {
                           console.log(data);
                           $("#flyercontainer").html(data); 
                            return false;
                       },
                        error: function (data)
                        {
                        }
                });
                
                $("#wraprod").load( "productos-inner.php", function() {
                    $('#btndown').fadeIn();
                    $("body").animate({
                             scrollTop: $("#flyercontainer").offset().top
                    }, 800);
                    
                    $('#wraprod').find('input[type=checkbox]').each(function () {
                        $(this).prop('checked', false);
                        var checkelem = $(this);
                        var valorCh = $(this).val();
                        //alert(valorCh);
                        $('#flyercontainer').find('.quitar').each(function(){
                            var quitar = $(this).attr('id');
                            if (valorCh == quitar) {
                                $(checkelem).parent().parent().parent().fadeOut(); 
                            }
                        });
                     }); 
                });
                $('#wraprod').css('height','1020px');                         
                
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
                        //alert(valorCh);
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
            <div class="header_bg" style="position:relative;">
				<div class="header">
								<div class="col-sm-offset-1 col-sm-10 col-xs-12">
                                    <div class="row">
                                        <div class="logo col-sm-2 col-xs-12" style="margin-top:0;">
                                            <a href="home.php"><img src="images/logo_marquez.png" class="img-responsive" alt="Grupo Marquez"> </a>
                                        </div>
                                            <!-- start header_right -->
                                        <div class="col-sm-10 col-xs-12 banner">
                                            <img src="images/diseniar/paso1.png" class="img-responsive" alt="">
                                        </div>
                                    </div>
								<div class="clearfix"> </div>
							</div>
				  </div>
					<a href="#seis" id="btndown" title="Pie de p&aacute;gina"><img src="images/btn-down.png" alt=""></a>
            </div>
            <!-- //header-ends -->
            <div id="wraprod"></div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <div class="col-lg-offset-1 col-lg-11 col-md-12 col-xs-12">
                    <!--START FLYER-->
                    <div id="flyercontainer">
                    <div id="intder" class="wrap-flyer">
                        <div class="cabecera col-xs-12"><div class="col-xs-6"><div class="row"><i class="fa fa-facebook" aria-hidden="true"></i><i class="fa fa-twitter" aria-hidden="true"></i><i class="fa fa-youtube" aria-hidden="true"></i></div></div><div class="col-xs-6"><div class="row text-right blanco">www.grupomarquez.com.ar</div></div></div>

                        <div class="productos col-xs-12">
                            <div class="row">
                                <div id="uno" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img class="block" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                <div id="dos" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img class="block" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                
                                <div id="tres" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img class="block" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                <div id="cuatro" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img class="block" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                <div id="cinco" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img class="block" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                <div id="seis" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img class="block" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bordebottom" id="end"><div class="legalesprod"></div></div>
                    </div>
                    </div>
                    <!--END FLYER-->
                    <!--START LATERAL-->
                    <div class="row">
                        <div class="lateral col-lg-3 col-md-12 col-xs-12 pull-right">
                            <div class="row">
                                <p class="titulo"><img src="images/diseniar/editando_intder.png" class="img-responsive" alt="Editando Interior Derecho"></p>
                                <div class="editar_partes">
                                    <p>EDITAR</p>
                                    <ul>
                                        <li><a id="ed_contratapa" class="disabled" href="diseniar-flyer_contratapa.php" title="EDITAR CONTRATAPA">contratapa</a></li>
                                        <li><a id="ed_tapa" class="disabled" href="diseniar-flyer.php" title="EDITAR TAPA">tapa</a></li>
                                        <li><a id="ed_intizq" class="disabled" href="diseniar-flyer_intizq.php" title="EDITAR INTERIOR IZQUIERDO">interior izq.</a></li>
                                        <li><a id="ed_intder" class="disabled activada" href="diseniar-flyer_intder.php" title="EDITAR INTERIOR DERECHO">interior der.</a></li>
                                    </ul>
                                    <p><a title="VISTA PREVIA" class="preview disabled" href="#" data-toggle="modal" data-target="#preview" data-backdrop="static" data-keyboard="true"><i class="fa fa-eye" aria-hidden="true"></i> VISTA PREVIA</a></p>
                                    <p><a title="CONTINUAR AL SIGUIENTE PASO" class="continuar disabled" href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i> GUARDAR Y CONTINUAR</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END LATERAL-->
                </div>
            </div>
            <!-- Diseniar end-->
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
        </div>
</div>
    
<!-- Modal -->
<div id="preview" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
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
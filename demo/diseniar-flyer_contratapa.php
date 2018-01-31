<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$resultado ="a";

 if (!isset($_SESSION{"archivo_tapa_".$_SESSION['ESTADO']})) { 
     header("Location:diseniar-flyer.php");
 }
?>
<?php 
$usuario=$_SESSION['ESTADO'];
header("Content-Type:text/html; charset=utf-8");
//echo($_SESSION{"tapa_".$_SESSION['ESTADO']});

$result_dir=mysql_query("select * from usuarios WHERE email='$usuario'");
$row_dir=mysql_fetch_array($result_dir);
$id_usuario = $row_dir['Id'];
$result_sucs1=mysql_query("select * from sucursales WHERE id_usuario='$id_usuario'");
$num_rows = mysql_num_rows($result_sucs1);
mysql_data_seek($result_sucs1, 0); 

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
<link href='css/datepicker.css' rel='stylesheet' type='text/css'>
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/datepicker.js"></script>
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
            /*START Datepicker Legales */
            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var checkin = $('#dpd1').datepicker({
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
              $('#dpd2')[0].focus();
            }).data('datepicker');
            var checkout = $('#dpd2').datepicker({
              onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
              }
            }).on('changeDate', function(ev) {
              checkout.hide();
            }).data('datepicker');
            /*END Datepicker Legales */
            /*START Confirmar legales*/
            $("#confirmarleg").click(function() {
                var cantChecked= $(".lgl-wrapper input:checked").length;
                if(cantChecked==0) {
                    alert("Seleccione los legales para continuar.");
                    return false;
                }
                else {
                    if(cantChecked > 7) {
                        alert("Podes seleccionar hasta siete(7) legales.");
                        return false;
                    }
                    var fechaInicio = $('#dpd1').val();
                    var fechaHasta = $('#dpd2').val();
                    if (fechaHasta=='') {
                        alert("Seleccione las fechas de validez de las promociones.");
                        return false;
                    }
                    var lglContent = '';
                    var lglNew = '';
                    $('.lgl-wrapper input:checked').each(function () {
                        lglNew = $(this).parent().parent('tr').children('.txt').html();
                        lglContent = lglContent + lglNew + " ";
                    });
                    $('.wrapperlegal .txt').html(lglContent);
                    $('.wrapperlegal .txt #dpd1').replaceWith(fechaInicio);
                    $('.wrapperlegal .txt #dpd2').replaceWith(fechaHasta);
                    $('#legales').modal('toggle');
                    return false;
                }
            });
            /*END Confirmar legales*/
                    
            $('#flyercontainer').on('change', '.direccion_elegir .form-control', function() { 
                if ($(this).val()=='') {
                }
                else { 
                    if ($(this).attr('id')=='direccion_elegir_1') {
                        $(this).parent().children('i.fa-plus-circle').fadeIn();
                        $(this).parent().children('i.fa-minus-circle').fadeOut();
                        var loadDir = $(this).val();
                        var loadTel = $('option:selected', this).attr('data-tel');
                        $(this).parent().children().children('.direccion_resultante').children('.load_direccion').html(loadDir);
                        $(this).parent().children().children('.direccion_resultante').children('.load_telefono').html(loadTel);
                    }
                    else {
                        $(this).parent().children('i').fadeIn();
                        var loadDir = $(this).val();
                        var loadTel = $('option:selected', this).attr('data-tel');
                        $(this).parent().children().children('.direccion_resultante').children('.load_direccion').html(loadDir);
                        $(this).parent().children().children('.direccion_resultante').children('.load_telefono').html(loadTel);
                    }
                    
                }
                return false;
            });
            var addSuc = 2;
            $('#flyercontainer').on('click', '.direccion #agregarsuc', function() { 
                var VisibleSuc = $(".direccion_elegir:visible").length;
                var TotalSuc = $(".direccion_elegir").length;
                if (addSuc>4) {
                    alert("Podés agregar hasta cuatro (4) sucursales por flyer.");
                    return false;
                }
                if (TotalSuc <= VisibleSuc) {
                    alert("No hay mas sucursales para agregar.");
                }
                else {
                    var numAdd = (VisibleSuc + 2);
                    if (VisibleSuc > 1) {
                        $('.direccion_elegir').removeClass('col-sm-offset-2');
                        $('.direccion_elegir').removeClass('col-sm-8');
                        $('.direccion_elegir').addClass('col-sm-6');
                    }
                    else {
                        $('.direccion_elegir').removeClass('col-sm-6');
                        $('.direccion_elegir').addClass('col-sm-offset-2');
                        $('.direccion_elegir').addClass('col-sm-8'); 
                    }
                    $('#end > .direccion_elegir:nth-child(' + numAdd + ')').css('display','block');
                    addSuc++;
                }
                
                return false;
            });
            $('#flyercontainer').on('click', '.direccion_elegir i.fa-minus-circle', function() { 
                $(this).parent('.direccion_elegir').fadeOut();
                addSuc--;
                var VisibleSuc = $(".direccion_elegir:visible").length;
                if (VisibleSuc > 3) {
                        $('.direccion_elegir').removeClass('col-sm-offset-2');
                        $('.direccion_elegir').removeClass('col-sm-8');
                        $('.direccion_elegir').addClass('col-sm-6');
                }
                else {
                        $('.direccion_elegir').removeClass('col-sm-6');
                        $('.direccion_elegir').addClass('col-sm-offset-2');
                        $('.direccion_elegir').addClass('col-sm-8'); 
                }
                return false;
            });
            

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
                $('#wraprod input[type=checkbox]').each(function () {
                    $(this).prop('checked', false);
                    var valorCh = $(this).val();
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
                  else {
                      $("body").animate({
                             scrollTop: $("#flyercontainer #tres").offset().top
                      }, 800);
                  }
                });
                
                if (long == 3) {
                    $('.continuar, .preview').removeClass('disabled');
                    $('.continuar').addClass('verde');
                }
                if (long <= 3) {
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
                var values = [];
                var valUno = $('#direccion_elegir_1').val();
                if (valUno=='') {
                    alert('Debe seleccionar por lo menos una direccion de sucursal para que aparezca en el flyer.');
                    $("body").animate({
                             scrollTop: $("#end").offset().top
                      }, 800);
                    return false;
                }
                else {
                    $('.direccion_elegir .form-control').each(function() {
                        if ( $.inArray(this.value, values) >= 0 ) {
                            if (this.value!=0) {
                                alert("Hay sucursales repetidas en los desplegables. Seleccione diferentes sucursales en cada desplegable o elimine las sucursales que no desee.");
                                $("body").animate({
                                    scrollTop: $("#end").offset().top
                                }, 800);
                                return false;
                            }
                        } else {
                            values.push( this.value );
                        }
                    });
                    var flyer = "";
                    flyer = $('#contratapa').clone();
                    $('#preview .modal-body').html(flyer);
                    $( "#preview .desplegable" ).each(function() {
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
                    var VisibleSuc = $(".direccion_elegir:visible").length;
                    if (VisibleSuc < 4) {
                        $('.modal .direccion').css('padding-top','15px');
                    }
                    if (VisibleSuc < 2) {
                        $('.modal .direccion').css('padding-top','30px');
                    }
                    $('#preview .direccion_elegir .form-control, #preview .direccion_elegir i').css('display', 'none');
                    $('#preview .direccion_resultante').css('display', 'block');
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
                    }
                
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
                var values = [];
                var valLegal = $('.wrapperlegal .txt').text();
                //alert(valLegal.length);
                if (valLegal.length == 0) {
                    alert('Debe seleccionar los legales correspondientes a las promociones elegidas para continuar.');
                    return false;
                }
                var valUno = $('#direccion_elegir_1').val();
                if (valUno=='') {
                    alert('Debe seleccionar por lo menos una direccion de sucursal para que aparezca en el flyer.');
                    $("body").animate({
                             scrollTop: $("#end").offset().top
                      }, 800);
                    return false;
                }
                else {
                    $('.direccion_elegir .form-control').each(function() {
                        if ( $.inArray(this.value, values) >= 0 ) {
                            if (this.value!=0) {
                                alert("Hay sucursales repetidas en los desplegables. Seleccione diferentes sucursales en cada desplegable o elimine las sucursales que no desee.");
                                $("body").animate({
                                    scrollTop: $("#end").offset().top
                                }, 800);
                                return false;
                            }
                        } else {
                            values.push( this.value );
                        }
                    });
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
                            var cara = "contratapa";
                            var limite = 4;
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
                                        }
                            });
                        });
                        var sesion = {};
                        var flyer = {};
                        var cara = "contratapa";
                        sesion = $('#flyercontainer').html();
                        var VisibleSuc = $(".direccion_elegir:visible").length;
                        if (VisibleSuc < 4) {
                            $('.modal .direccion').css('padding-top','15px');
                        }
                        if (VisibleSuc < 2) {
                            $('.modal .direccion').css('padding-top','30px');
                        }
                        $('#flyercontainer .direccion_elegir .form-control, #flyercontainer .direccion_elegir i, #flyercontainer .direccion #agregarsuc, #flyercontainer #agregarlegales').remove();
                        $('#flyercontainer .direccion_resultante').css('display', 'block');
                        
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

                        $('#flyercontainer .direccion_resultante').css('display', 'block');
                        $("#flyercontainer .frases").each(function() {
                          var estadoFrase = 0;
                          $(this).children('p').each(function() {
                              var valEP = $(this).children('input').val();
                              if (valEP!='') {
                                  estadoFrase = 1;
                                  $(this).children('.wrapper').html(valEP);
                                  $(this).children('input').css('display','none');
                              }
                              else {
                                  $(this).css('display','none');
                              }
                          });
                          if (estadoFrase == 0) {
                                $(this).css('display','none');
                          }
                        });
                        $( "#flyercontainer .desplegable" ).each(function() {
                            $(this).css('border','0px');
                            $(this).children('.arrow').remove();
                          if ($(this).children('.primera').hasClass('active')) {
                              //OCULTO TEMP $(this).remove();
                          }
                          if ($(this).children('div').hasClass('active')) {
                          } 
                          else {
                              $(this).children().remove();
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
                          if ($(this).children('div').hasClass('active')) {
                          } 
                          else {
                              $(this).children().remove();
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
                        var VisibleSuc = $(".direccion_elegir:visible").length;
                        if (VisibleSuc < 4) {
                            $('.modal .direccion').css('padding-top','15px');
                        }
                        if (VisibleSuc < 2) {
                            $('.modal .direccion').css('padding-top','30px');
                        }
                        $('#flyercontainer .direccion_elegir .form-control, #flyercontainer .direccion_elegir i, #flyercontainer .direccion #agregarsuc').remove();
                        $('#flyercontainer .direccion_resultante').css('display', 'block');
                        flyer = flyer.replace(/images/g, "../../images");
                        flyer = flyer.replace(/"flyer/g, '"../../flyer'); 
                        <?php 
                        if (isset($_SESSION{"archivo_contratapa_".$_SESSION['ESTADO']})) { ?>
                            var name = '<?php echo($_SESSION{"archivo_contratapa_".$_SESSION['ESTADO']}); ?>';
                        <?php 
                        }
                        else {
                        ?>
                        var name = '<?php echo("flyer/html/FLYER_CONTRATAPA_".date('m-d-Y_hia').".html"); ?>';
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
                                    window.location.href = "diseniar-flyer_intizq.php";
                                },
                                error: function( xhr, status ) {
                                }
                        });
                        return false;
                    }
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
                         scrollTop: $("#end").offset().top
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
            if (!isset($_SESSION{"contratapa_".$_SESSION['ESTADO']})) {
                $result_esta=mysql_query("select * from rating_productos WHERE usuario='$usuario' and cara='contratapa' and actual='si'");
                if($row_esta=mysql_fetch_array($result_esta)){
                    $delete_esta=mysql_query("DELETE FROM rating_productos WHERE usuario='$usuario' and cara='contratapa' and actual='si'");
                }
            }
            if (isset($_SESSION{"tapa_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_tapa').removeClass('disabled');
            <?php } 
            if (isset($_SESSION{"intizq_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_intizq').removeClass('disabled');
            <?php }
            if (isset($_SESSION{"intder_".$_SESSION['ESTADO']})) { ?>
                $('.editar_partes #ed_intder').removeClass('disabled');
            <?php } 

            
            if (isset($_SESSION{"contratapa_".$_SESSION['ESTADO']})) { ?>
                var content = '<?php $_SESSION{"contratapa_".$_SESSION['ESTADO']}; ?>';
                $('.editar_partes #ed_contratapa, .preview, .continuar').removeClass('disabled');
                $('.continuar').addClass('verde');
                $.ajax({
                       type: "POST",
                       dataType: "html",
                       url: "recuperarcontratapa.php",
                       data: {
                            'content': content
                        },
                       success: function(data)
                       {
                           console.log(data);
                           $("#flyercontainer").html(data); 
                            return false;
                       }
                });
                var addSuc = $(".direccion_elegir:visible").length;
                
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
					<a href="#end" id="btndown" title="Pie de p&aacute;gina"><img src="images/btn-down.png" alt=""></a>
            </div>
            <!-- //header-ends -->
           <div id="wraprod"></div>
           <?php 
            $result_pie=mysql_query("select * from promos_pie ORDER BY Id DESC");
            ?>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12">
                <div class="col-lg-offset-1 col-lg-11 col-md-12 col-xs-12">
                    <!--START FLYER-->
                    <div id="flyercontainer">
                    <div id="contratapa" class="wrap-flyer">
                        <div class="productos col-xs-12">
                            <div class="row">
                                <div id="uno" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img style="width:100%;" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                <div id="dos" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img style="width:100%;" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="background:#fff;"></div>
                                <div id="tres" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img style="width:100%;" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                                <div id="cuatro" class="producto col-xs-6">
                                    <a class="insertar" href="#" title="Insertar producto"><img style="width:100%;" src="images/diseniar/bg_block_producto.png" alt=""></a>
                                    <div class="bottom">
                                        <strong>$0</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bloque_azul" style="height:334px;">
                            <div class="direccion" id="end">
                                <a id="agregarsuc" href="#" title="Click aqui para agregar otra sucursal"><i class="fa fa-plus-circle" aria-hidden="true" title="Click aqu&iacute; para agregar otra sucursal al flyer"></i> AGREGAR OTRA SUCURSAL AL FLYER</a>
                                <?php 
                                    $i=1;
                                        do {
                                ?>
                                <!--START Direccion 1-->
                                <div id="dir_<?php echo($i);?>" class="direccion_elegir col-sm-offset-2 col-sm-8">
                                    <select id="direccion_elegir_<?php echo($i);?>" name="direccion_elegir_<?php echo($i);?>" class="form-control">
                                        <option value="">Seleccione la direcci&oacute;n de la sucursal que aparecer&aacute; en el flyer</option>
                                    <?php
                                        mysql_data_seek($result_sucs1, 0); 
                                        if ($row_sucs1=mysql_fetch_array($result_sucs1)) {
                                        do {
                                    ?> 
                                        <option data-tel="<?php echo($row_sucs1['telefono']);?>" value="<?php echo($row_sucs1['direccion']);?>, <?php echo($row_sucs1['provincia']);?>"><?php echo($row_sucs1['direccion']);?>, <?php echo($row_sucs1['provincia']);?></option>
                                        <?php
                                                } while ($row_sucs1=mysql_fetch_array($result_sucs1));

                                            }
                                        ?>
                                    </select>
                                    <i id="sacar-suc_<?php echo($i);?>" class="fa fa-minus-circle" aria-hidden="true" title="Click aqu&iacute; para quitar esta sucursal del flyer"></i>
                                    <div class="row">
                                        <div class="direccion_resultante">
                                            <p class="load_direccion"></p>
                                            <p class="load_telefono"></p>
                                        </div>
                                    </div>
                                </div>
                                <!--END Direccion 1-->
                                <?php
                                        $i++;
                                        } while ($i<=$num_rows);

                                ?>
                            </div>

                            <div id="wrap-legales">
                                <div class="wrapperlegal">
                                    <a id="agregarlegales" href="#" data-toggle="modal" data-target="#legales" data-backdrop="static"><i class="fa fa-plus-circle" aria-hidden="true"></i> SELECCION&Aacute; LOS LEGALES CORRESPONDIENTES A LAS PROMOCIONES QUE ELEGISTE</a>
                                    <div class="txt"></div>
                                </div>
                            </div>
                            <div class="bordebottom" id="end"><div class="legalesprod"></div></div>
                        </div>
                    </div>
                    </div>
                    <!--END FLYER-->
                    <!--START LATERAL-->
                    <div class="row">
                        <div class="lateral col-lg-3 col-md-12 col-xs-12 pull-right">
                            <div class="row">
                                <p class="titulo"><img src="images/diseniar/editando_contratapa.png" class="img-responsive" alt="Editando Contratapa"></p>
                                <div class="editar_partes">
                                    <p>EDITAR</p>
                                    <ul>
                                        <li><a id="ed_contratapa" class="disabled activada" href="diseniar-flyer_contratapa.php" title="EDITAR CONTRATAPA">contratapa</a></li>
                                        <li><a id="ed_tapa" class="disabled" id="editar-tapa" href="diseniar-flyer.php" title="EDITAR TAPA">tapa</a></li>
                                        <li><a id="ed_intizq" class="disabled" href="diseniar-flyer_intizq.php"  title="EDITAR INTERIOR IZQUIERDO">interior izq.</a></li>
                                        <li><a id="ed_intder" class="disabled" href="diseniar-flyer_intder.php"  title="EDITAR INTERIOR DERECHO">interior der.</a></li>
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

<!-- Modal LEGALES -->
<div id="legales" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <p>Seleccion&aacute; los legales correspondientes a las promociones que elegiste:</p>
          <?php 
            $dateLeg = date('Y-F', strtotime('+1 month')); 
            $dateLeg = explode("-", $dateLeg);
            $anioLeg = $dateLeg[0]; 
            $mesLeg = $dateLeg[1];
            switch ($mesLeg) {
                case "January":
                    $mesLeg="Enero";
                    break;
                case "February":
                    $mesLeg="Febrero";
                    break;
                case "March":
                    $mesLeg="Marzo";
                    break;
                case "April":
                    $mesLeg="Abril";
                    break;
                case "May":
                    $mesLeg="Mayo";
                    break;
                case "June":
                    $mesLeg="Junio";
                    break;
                case "July":
                    $mesLeg="Julio";
                    break;
                case "August":
                    $mesLeg="Agosto";
                    break;
                case "September":
                    $mesLeg="Septiembre";
                    break;
                case "October":
                    $mesLeg="Octubre";
                    break;
                case "November":
                    $mesLeg="Noviembre";
                    break;
                case "December":
                    $mesLeg="Diciembre";
                    break;
            }

          ?>
          <table class="lgl-wrapper">
                  <tr>
                      <td class="txt">Volante entregado en mano, por favor no lo tire en la vía pública. Las fotos son ilustrativas. Ofertas válidas en Argentina desde el <input type="text" style="width:90px;" value="" id="dpd1" placeholder="Seleccione..."> hasta el <input type="text" style="width:90px;" value="" id="dpd2" placeholder="Seleccione...">. Las promociones no son acumulables. Todos los productos tienen su correspondiente garantía extendida por su fabricante o importador.</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_1" value="" disabled checked></td> 
                  </tr>
                  <tr>
                      <td class="txt"><strong>PROGRAMA DE FOMENTO AL CONSUMO Y LA PRODUCCIÓN Ahora 12:</strong> 12 cuotas fijas. V&aacute;lido en todas las tiendas Grupo Marquez de la Rep&uacute;blica Argentina de jueves a domingos del mes de Marzo exclusivamente para l&iacute;nea blanca, muebles, colchones, bicicletas, motos, notebook, de industria nacional; y todos los d&iacute;as, exclusivamente para Celulares 4G. TEA 22.17%; CFT 27.69%</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_2" value=""></td>
                  </tr>
                  <tr>
                      <td class="txt"><strong>PROGRAMA DE FOMENTO AL CONSUMO Y LA PRODUCCIÓN Ahora 18:</strong> 18 cuotas fijas. V&aacute;lido en todas las tiendas Grupo Marquez de la Rep&uacute;blica Argentina de jueves a domingos del mes de Marzo exclusivamente para l&iacute;nea blanca, muebles, colchones, bicicletas, motos, notebook, de industria nacional; y todos los d&iacute;as, exclusivamente para Celulares 4G. TEA 23.8%; CFT 30.01%</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_2" value=""></td>
                  </tr>
              <!--
                  <tr>
                      <td class="txt"><strong>PROMO 6 o 12 CUOTAS SIN INTER&Eacute;S CON TARJETAS DE CR&Eacute;DITO BANCARIAS:</strong> PROMOCI&Oacute;N V&Aacute;LIDA EN ARGENTINA CON VISA, MASTERCARD, ARGENCARD Y CABAL. TNA: 0% TAE: 0%. EL COSTO FINANCIERO TOTAL (CFT) VARIA SEG&Uacute;N EL BANCO EMISOR DE SU TARJETA.</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_3" value=""></td>
                  </tr>
                  <tr>
                      <td class="txt"><strong>PROMO 24 CUOTAS SIN INTER&Eacute;S BANCO CIUDAD:</strong> V&Aacute;LIDA TODOS LOS D&Iacute;AS PARA COMPRAS REALIZADAS CON TARJETAS DE CR&Eacute;DITO VISA, MASTERCARD O CABAL DEL BANCO CIUDAD. QUEDAN EXCLU&Iacute;DAS DE LA PROMOCI&Oacute;N LAS TARJETAS CORPORATIVAS. LA PRESENTE PROMOCI&Oacute;N ES V&Aacute;LIDA &Uacute;NICAMENTE PARA CONSUMOS DE TIPO FAMILIAR. TASA NOMINAL ANUAL: 0% VARIABLE TASA EFECTIVA ANUAL: 0% VARIABLE COSTO FINANCIERO TOTAL: 0,16% VARIABLE (POR CARGO DE CONTRATACI&Oacute;N Y OTORGAMIENTO DE COBERTURA DE VIDA DE SANCOR COOP. DE SEGUROS LIMITADA).</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_4" value=""></td>
                  </tr>
                  <tr>
                      <td class="txt"><strong>CR&Eacute;DITO PERSONAL MARQUEZ:</strong> LOS PLANES CON CR&Eacute;DITO PERSONAL EST&Aacute;N SUJETOS A APROBACI&Oacute;N CREDITICIA.</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_5" value=""></td>
                  </tr>
                  <tr>
                      <td class="txt"><strong>PROMO NATIVA DE BANCO NACI&Oacute;N:</strong> 12 CUOTAS SIN INTER&Eacute;S PROMOCI&Oacute;N V&Aacute;LIDA EN  ARGENTINA PARA COMPRAS EFECTUADAS CON TC NATIVA DE BANCO NACI&Oacute;N, EN LOCALES ADHERIDOS. (**)TNA (TASA NOMINAL ANUAL) FIJA: 0% - TEA (TASA EFECTIVA  ANUAL) FIJA: 0%. CFT (COSTO FINANCIERO TOTAL) TEA: 3,58% POR SEGURO DE VIDA SOBRE SALDO DEUDOR, PARA UNA COMPRA DE $1.000. CONSULTA LOS COMERCIOS ADHERIDOS EXCLUSIVAMENTE A ESTA PROMOCI&Oacute;N EN WWW.NATIVANACION.COM.AR. EL BANCO DE LA NACI&Oacute;N ARGENTINA NO SE RESPONSABILIZA POR LA CALIDAD DE LOS PRODUCTOS Y/O SERVICIOS ADQUIRIDOS.</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_6" value=""></td>
                  </tr>
                  <tr>
                      <td class="txt"><strong>PROMOCI&Oacute;N DEL BANCO PCIA DE BS AS CON TARJETAS VISA:</strong> PROMOCI&Oacute;N 10% DE DESCUENTO V&Aacute;LIDO CON TARJETA DE D&Eacute;BITO PROMOCI&Oacute;N 12 CUOTAS SIN INTER&Eacute;S + 10% DE DESCUENTO V&Aacute;LIDA CON TARJETAS DE CR&Eacute;DITO, COSTO FINANCIERO  TOTAL (CFT) NOMINAL ANUAL 2.89% CFT EFECTIVO ANUAL 2.93% POR CADA $1.000 POR GESTI&Oacute;N DE CONTRATACI&Oacute;N DE COBERTURA DE SEGURO DE VIDA SOBRE SALDO DEUDOR  (EN CASO DE CORRESPONDER). INTER&Eacute;S: TNA 0%. TEA 0%. EL REINTEGRO SE VER&Aacute; REFLEJADO COMO BONIFICACI&Oacute;N EN EL RESUMEN DE CUENTA DE SU TARJETA DE CR&Eacute;DITO.</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_7" value=""></td>
                  </tr>
                  <tr>
                      <td class="txt"><strong>AHORA MISIONES:</strong> SUJETO A FECHAS DETERMINADAS POR EL GOBIERNO DE LA PROVINCIA DE MISIONES.</td>
                      <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_8" value=""></td>
                  </tr>-->
                    <?php
                        $result_leg=mysql_query("select * from promos WHERE visible='$id_usuario'");
                        if ($row_leg=mysql_fetch_array($result_leg)) {
                            do { ?>
                            <tr>
                                  <td class="txt"><?php echo($row_leg['legales']); ?></td>
                                  <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_<?php echo($row_leg['visible']); ?>" value=""></td>
                            </tr>
                            <?php 
                             } while ($row_leg=mysql_fetch_array($result_leg));
                        }
                        
                        $result_leg2=mysql_query("select * from promos_pie WHERE visible='$id_usuario'");
                        if ($row_leg2=mysql_fetch_array($result_leg2)) {
                            do { ?>
                            <tr>
                                  <td class="txt"><?php echo($row_leg2['legales']); ?></td>
                                  <td class="check"><input type="checkbox" name="legal_sel" id="legal_sel_<?php echo($row_leg2['visible']); ?>" value=""></td>
                            </tr>
                            <?php 
                             } while ($row_leg2=mysql_fetch_array($result_leg2));
                        }
                    ?>
          </table>
          <a id="confirmarleg" href="#"><i class="fa fa-check-square-o" aria-hidden="true"></i> CONFIRMAR</a>
      </div>
      <!--<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>-->
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
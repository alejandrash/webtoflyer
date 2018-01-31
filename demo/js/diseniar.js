function nobackbutton(){ 
   window.location.hash="no-back-button"; 
   window.location.hash="Again-No-back-button" //chrome 
   window.onhashchange=function(){window.location.hash="no-back-button";}  
}

$(window).load(function(){
    nobackbutton();
    var contenido = $('#wraprod').html();
                if (contenido != '') {
                        var cuantasPag = $('#wraprod .paginacion a').length;
                        var anchoPag = (cuantasPag * 40) + 120;
                        if (cuantasPag > 10) {
                            $('#wraprod .paginacion').css('width', anchoPag);
                            var estadoLeft = $('#wraprod .paginacion a').position().left;
                            if (estadoLeft <= 45) {
                                $(".slider-paginacion .prev").css('display', 'none');
                            }
                            if (anchoPag <= 800) {
                                $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                            }
                        }
                        else {
                            $('#wraprod .paginacion').css('width', '800px');
                            $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                        }
                }
});

$(document).ready(function () {

            $('#cucardas1, #cucardas2').on('click', '.titulo-desp', function() { 
                $("#cucardas1 .listado-tarjetas, #cucardas2 .listado-tarjetas").css('display', 'none');
                $(this).parent().next(".listado-tarjetas").slideDown('fast');
            });

            $(".pregunta").click(function() {
                $("#ayuda-despl .respuesta").css('display', 'none');
                $(this).next(".respuesta").slideDown('fast');
            });

            var $toggle = 0;
            $("#ayuda-toggle, #ayuda-despl .titulo").click(function(){
                    if($toggle == 0){
                        $("#ayuda-despl").animate({
                            bottom: '0px',
                        }, 200, function(){
                        });
                        $toggle = 1;
                    }
                    else if($toggle == 1){
                        $("#ayuda-despl").animate({
                            bottom: '-470px',
                        }, 200, function(){
                        });
                        $toggle = 0;
                    }
                return false;
            });

            //Detectar cambios para dar aviso de guardar
            $('#flyercontainer').on('click', 'a', function() { 
                cambiado = 1;
            });
            $('.editar_partes li, .top_right li, #menu li').on('click', 'a', function() { 
                var proximo = $(this).attr('href');
                if (cambiado == 1) {
                    swal({
                            title: "¿Guardaste todos los cambios?",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#5CB223",
                            confirmButtonText: "QUEDARTE PARA GUARDAR",
                            cancelButtonText: "SALIR SIN GUARDAR",
                            closeOnConfirm: true,
                            closeOnCancel: true 
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                 return false;
                            }
                            else {
                                window.location.href = proximo;
                            }
                            return false;
                        }
                    )
                    return false;
                }
            });


            //Agregar precio tachado
            $('#flyercontainer').on('click', '.cajaproducto .agregartachado', function() { 
                var estadoPri = $(this).parent().children('input.big').val();
                if (estadoPri == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
                }
                else {
                    $(this).parent('.bottom').addClass('tachado');
                    $(this).parent('.bottom').children('.quitartachado').css('display','block');
                    $(this).css('display', 'none');
                }
                return false;
            });

            // DAR Formato a Precio Tachado
            $('#flyercontainer').on('change', '.cajaproducto .bottom input.tach', function() {
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
            $('#flyercontainer').on('click', '.cajaproducto .quitartachado', function() {
                $(this).css('display', 'none');
                $(this).parent('.bottom').children('.agregartachado').css('display','block');
                $(this).parent('.bottom').removeClass('tachado');
                return false;
            });

            //Confirmación para empezar un nuevo diseño
            $('#wrap-enviado').on('click', 'a.comenzar', function(e) { 
                e.preventDefault();
                var empezar = $(this).attr('href');
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
                                 window.location.href = empezar;
                            }
                            else {
                                return false;
                            }
                        }
                    )
                return false;
            });
            
            //CARGAR Productos / Volver a Productos
            $('#flyercontainer').on('click', '.cajaproducto .insertar', function() {    
                var contenido = $('#wraprod').html();
                if (contenido == '') {
                    $("#wraprod").load( "productos-inner.php", function() {
                        $('#btndown').fadeIn();
                        var cuantasPag = $('#wraprod .paginacion a').length;
                        var anchoPag = (cuantasPag * 40) + 120;
                        if (cuantasPag > 10) {
                            $('#wraprod .paginacion').css('width', anchoPag);
                            var estadoLeft = $('#wraprod .paginacion a').position().left;
                            if (estadoLeft <= 45) {
                                $(".slider-paginacion .prev").css('display', 'none');
                            }
                            if (anchoPag <= 800) {
                                $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                            }
                        }
                        else {
                            $('#wraprod .paginacion').css('width', '800px');
                            $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
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
                        if (cuantasPag > 10) {
                            $('#wraprod .paginacion').css('width', anchoPag);
                            var estadoLeft = $('#wraprod .paginacion a').position().left;
                            if (estadoLeft <= 45) {
                                $(".slider-paginacion .prev").css('display', 'none');
                            }
                            if (anchoPag <= 800) {
                                $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                            }
                        }
                        else {
                            $('#wraprod .paginacion').css('width', '800px');
                            $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                        }
                }
                return false;
            });
            $('#flyercontainer').on('click', '.cajaproducto .insertar', function() { 
                numCaja = $(this).attr('rel');
                $("html, body").animate({
                         scrollTop: $("#wraprod").offset().top
                  }, 800);
                return false;
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
            $('#flyercontainer').on('mouseenter', '.cajaproducto .quitar', function() { 
              $(this).parent().parent().parent('.cajaproducto').children('.overlay').css('display','block');  
            });
            $('#flyercontainer').on('mouseleave', '.cajaproducto .quitar', function() { 
              $(this).parent().parent().parent('.cajaproducto').children('.overlay').css('display','none'); 
            });
            
            // ELIMINAR Producto de Flyer
            $('#flyercontainer').on('click', '.cajaproducto .quitar', function() { 
                var quitar = $(this).attr('id');
                numCajaQuitar = $(this).closest('.cajaproducto').attr('id');
                esBloqueo = numCajaQuitar;
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
                if (numCajaQuitar == 'cinco') {
                    numCajaQuitar = 5;
                }
                if (numCajaQuitar == 'seis') {
                    numCajaQuitar = 6;
                }
                if (numCajaQuitar == 'siete') {
                    numCajaQuitar = 7;
                }
                if (numCajaQuitar == 'ocho') {
                    numCajaQuitar = 8;
                }
                if (numCajaQuitar == 'nueve') {
                    numCajaQuitar = 9;
                }
                if (numCajaQuitar == 'diez') {
                    numCajaQuitar = 10;
                }
                if (numCajaQuitar == 'once') {
                    numCajaQuitar = 11;
                }
                if (numCajaQuitar == 'doce') {
                    numCajaQuitar = 12;
                }
                numCaja = numCajaQuitar;
                $(this).parent().parent().parent().removeClass('completed');
                if ($("#"+esBloqueo).hasClass('bloqueado')) {
                    var nombre_marca = $("#"+esBloqueo).attr('data-nombre-marca');
                    var img_marca = $("#"+esBloqueo).attr('data-img-marca');
                    $("#"+esBloqueo).html('<a rel="'+numCajaQuitar+'" class="insertar" href="#" title="Insertar producto de la marca indicada"><div class="txt-inicial">Haz click aquí para<br>agregar un producto de la marca<strong>'+nombre_marca+'</strong><strong><img src="images/'+img_marca+'" height="40" alt=""></strong></div></a>');
                }
                else {
                    $("#"+esBloqueo).html('<a rel="'+numCajaQuitar+'" class="insertar" href="#" title="Insertar producto"></a>');
                }
                long = $( "#flyercontainer .completed" ).length;
                $('.continuar').addClass('disabled');
                $('.continuar').removeClass('verde');
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
                        if (cuantasPag > 10) {
                            $('#wraprod .paginacion').css('width', anchoPag);
                            var estadoLeft = $('#wraprod .paginacion a').position().left;
                            if (estadoLeft <= 45) {
                                $(".slider-paginacion .prev").css('display', 'none');
                            }
                            if (anchoPag <= 800) {
                                $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                            }
                        }
                        else {
                            $('#wraprod .paginacion').css('width', '800px');
                            $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
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
                        if (cuantasPag > 10) {
                            $('#wraprod .paginacion').css('width', anchoPag);
                            var estadoLeft = $('#wraprod .paginacion a').position().left;
                            if (estadoLeft <= 45) {
                                $(".slider-paginacion .prev").css('display', 'none');
                            }
                            if (anchoPag <= 800) {
                                $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                            }
                        }
                        else {
                            $('#wraprod .paginacion').css('width', '800px');
                            $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                        }
                }
                return false;
            });
            
            // CLICKs en Menu Categorias
            $('#wraprod').on('click', 'a', function() { 
                var newurl = $(this).attr('href');
                //$('#wraprod').load(newurl);

                $("#wraprod").load( newurl, function() {
                    $('#btndown').fadeIn();
                    var cuantasPag = $('#wraprod .paginacion a').length;
                    var anchoPag = (cuantasPag * 40) + 120;
                    if (cuantasPag > 10) {
                        $('#wraprod .paginacion').css('width', anchoPag);
                        var estadoLeft = $('#wraprod .paginacion a').position().left;
                        if (estadoLeft <= 45) {
                            $(".slider-paginacion .prev").css('display', 'none');
                        }
                        var estadoActive = $('#wraprod .paginacion span').position().left;
                        estadoActive = '-'+estadoActive+'px';
                        $('#wraprod .paginacion').css('left', estadoActive);
                    }
                    else {
                        $('#wraprod .paginacion').css('width', '800px');
                        $(".slider-paginacion .prev, .slider-paginacion .next").css('display', 'none');
                    }
                });
                return false;
            });

            // CLICKs en Seleccionar tarjeta
            
            $('#flyercontainer').on('click', '.cajaproducto .seletarjetas', function() { 
                relprod = $(this).attr('rel');
                precioContado = $('.bottom input.big[rel^='+relprod+']').val();
                if (precioContado == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO del producto antes de continuar.", "error");
                    return false;
                }
                else {
                    $("input[name='opcion-tarjetas']:checked").prop('checked', false);
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    $(this).parent().children('a.selebancos').html('Seleccionar banco');
                    $(this).parent().children('a.selebancos').attr('title', 'Click para seleccionar banco');
                    $(this).parent().children('a.selebancos').css('pointer-events','auto');
                    $(this).parent().parent().children().find('a.selecuotas').html('Seleccionar cuotas');
                    $(this).parent().parent().children().find('a.selecuotas').css('padding-top', '8px');
                    $(this).parent().parent().children().find('a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $(this).parent().parent().children().find('a.selecuotas').css('pointer-events','auto');
                    $(this).parent().parent().children('.zona-cuota input').val('$0,00');
                    $(this).parent().parent().children('.zona-valores .cft p span').html('0,00');
                    $(this).parent().parent().children('.zona-valores .right .ptf p span').html('0,00');
                    $(this).parent().parent().children('.zona-valores .right .tea p span').html('0,00');
                }
            });

            //Seleccion tarjeta en financiacion
            $("input[name='opcion-tarjetas']").change(function() {
                var tarjetaVal = $(this).val();
                var tarjetaLogo = $(this).parent().children('img').attr('src');
                $('#tarjetas').modal('hide');   
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
                if (relprod == '5') {
                        varprod ="#cinco";
                }
                if (relprod == '6') {
                        varprod ="#seis";
                }
                if (relprod == '7') {
                        varprod ="#siete";
                }
                if (relprod == '8') {
                        varprod ="#ocho";
                }
                if (relprod == '9') {
                        varprod ="#nueve";
                }
                if (relprod == '10') {
                        varprod ="#diez";
                }
                if (relprod == '11') {
                        varprod ="#once";
                }
                if (relprod == '12') {
                        varprod ="#doce";
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
                                    if( $('#tapa').length ) {}
                                    else {
                                        $(varprod+' a.selecuotas').css('padding-top', '4px');
                                    }
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
                    var getVal = $(varprod +' .bottom input.big').val();
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
                                        txtlegales = partes[3];
                                        $(varprod).attr('txt-legales', txtlegales); 
                                        $(varprod+' a.selebancos').html('<img src="images/bancos/BANCO-54.jpg" rel="55" alt="">');
                                        $(varprod+' a.selebancos').css('pointer-events','none');
                                        if (cft!='0,00') {
                                            if( $('#tapa').length ) {}
                                            else {
                                                $(varprod+' a.selecuotas').css('padding-top', '4px');
                                            }
                                            $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas <br>fijas de</span>');
                                        }
                                        else {
                                            if( $('#tapa').length ) {}
                                            else {
                                                $(varprod+' a.selecuotas').css('padding-top', '0px');
                                            }
                                            $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas sin <br>interés de</span>');
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
                    $(varprod).attr('txt-legales', 'LOS PLANES CON CRÉDITO PERSONAL ESTÁN SUJETOS A APROBACIÓN CREDITICIA. CONSULTE REQUISITOS Y CONDICIONES EN SU TIENDA MARQUEZ MÁS CERCANA.');
                    $(varprod+' a.seletarjetas[rel^='+relprod+']').html('<img src="'+tarjetaLogo+'" rel="'+tarjetaVal+'" alt="" title="Click para modificar">');
                    var getVal = $(varprod +' .bottom input.big').val();
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
                        if( $('#tapa').length ) {}
                        else {
                            $(varprod+' a.selecuotas').css('padding-top', '4px');
                        }
                        $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas <br>fijas de</span>');
                    }
                    else {
                        if( $('#tapa').length ) {}
                        else {
                            $(varprod+' a.selecuotas').css('padding-top', '0px');
                        }
                        $(varprod+' a.selecuotas').html('<span>'+cuotasVal+' cuotas sin <br>interés de</span>');
                    }
                    $(varprod+' a.selecuotas[rel^='+relprod+']').removeClass('disabled');
                    $(varprod+' a.selecuotas[rel^='+relprod+']').css('pointer-events','none');
                    $(varprod+' .zona-cuota input[rel^='+relprod+']').css('opacity','1'); 
                    $(varprod+' .cft[rel^='+relprod+'] p span').html(cft);
                    $(varprod+' .tea[rel^='+relprod+'] p span').html(tea);
                    var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                    finalCuota = parseFloat(finalCuota).toFixed(2);
                    var ptf = (finalCuota * cuotasVal);
                    ptf = parseFloat(ptf).toFixed(2);
                    ptf = ptf.toString();
                    ptf = ptf.replace('.',',');
                    var finalCuota = finalCuota.toString();
                    finalCuota = finalCuota.replace('.',',');
                    finalCuota = ('$'+finalCuota);
                    $(varprod+' .zona-cuota input[rel^='+relprod+']').val(finalCuota);
                    $(varprod+' .zona-cuota input[rel^='+relprod+']').attr('value', finalCuota); 
                    $(varprod+' .ptf[rel^='+relprod+'] p span').html(ptf);
                    $(varprod+' .zona-valores').css('display','block'); 

                }
                else {
                    if (tarjetaVal != '') {
                            $(varprod+' a.selebancos[rel^='+relprod+']').removeClass('disabled');
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
            
            $('#flyercontainer').on('click', '.cajaproducto .selebancos', function() { 
                relprod = $(this).attr('rel');
                precioContado = $('.bottom input.big[rel^='+relprod+']').val();
                if (precioContado == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO del producto antes de continuar.", "error");
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
                    $(varprod+' a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $(varprod+' a.selecuotas').css('padding-top', '8px');
                    $(varprod+' a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $(varprod+' .zona-cuota input').val('$0,00');
                    $(varprod+' .zona-cuota input').css('opacity','0.5');
                    $(varprod+' .zona-valores .cft p span').html('0,00');
                    $(varprod+' .zona-valores .right .ptf p span').html('0,00');
                    $(varprod+' .zona-valores .right .tea p span').html('0,00');
                }
            });
            
            
            // CLICKs en Seleccionar cuota
            
            $('#flyercontainer').on('click', '.cajaproducto .selecuotas', function() { 
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
                if (relprod == '5') {
                    varprod ="#cinco";
                }
                if (relprod == '6') {
                    varprod ="#seis";
                }
                if (relprod == '7') {
                    varprod ="#siete";
                }
                if (relprod == '8') {
                    varprod ="#ocho";
                }
                if (relprod == '9') {
                    varprod ="#nueve";
                }
                if (relprod == '10') {
                    varprod ="#diez";
                }
                if (relprod == '11') {
                    varprod ="#once";
                }
                if (relprod == '12') {
                    varprod ="#doce";
                }
                bancoVal = $(this).val();
                var bancoLogo = $(this).parent().children('img').attr('src');
                $('#bancos').modal('hide');
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
                if (relprod == '5') {
                    varprod ="#cinco";
                }
                if (relprod == '6') {
                    varprod ="#seis";
                }
                if (relprod == '7') {
                    varprod ="#siete";
                }
                if (relprod == '8') {
                    varprod ="#ocho";
                }
                if (relprod == '9') {
                    varprod ="#nueve";
                }
                if (relprod == '10') {
                    varprod ="#diez";
                }
                if (relprod == '11') {
                    varprod ="#once";
                }
                if (relprod == '12') {
                    varprod ="#doce";
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
                    $('#cuotas').modal('hide');
                    if ((tarjetaVal != '') && (bancoVal != '')) {
                        if( $('#tapa').length ) {
                        }
                        else {
                            $(varprod+' a.selecuotas').css('padding-top', '2px');
                        }
                        $(varprod+' a.selecuotas').html('<span title="Click para modificar la cantidad de cuotas">'+cuotasTxt+'</span>');
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
                                        txtlegales = partes[3];
                                        $(varprod).attr('txt-legales', txtlegales);
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

            // DAR Formato a Precios
            $('#flyercontainer').on('change', '.cajaproducto .bottom input.big', function() {
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
                    if (relprod == '5') {
                        varprod ="#cinco";
                    }
                    if (relprod == '6') {
                        varprod ="#seis";
                    }
                    if (relprod == '7') {
                        varprod ="#siete";
                    }
                    if (relprod == '8') {
                        varprod ="#ocho";
                    }
                    if (relprod == '9') {
                        varprod ="#nueve";
                    }
                    if (relprod == '10') {
                        varprod ="#diez";
                    }
                    if (relprod == '11') {
                        varprod ="#once";
                    }
                    if (relprod == '12') {
                        varprod ="#doce";
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
            
            // GENERAR Vista Previa
            $(".preview").click(function() { 
                var i = 1;
                $('#flyercontainer .cajaproducto').each(function () {
                    $(this).find(".numero").text(i+') ');
                    i++;
                });
                cargarLegales();
                var flyer = "";
                flyer = $('#'+cara).clone();
                $('#preview .modal-body').html(flyer);
                $('#preview .quitar').css('display', 'none');
                $('#preview input').attr('readonly', true);
                $('#preview .descripcion strong').attr('contenteditable', false);
            });

            // ABRIR VIdeo tutorial
            $(".open-video").click(function() { 
                $('#video iframe').attr('src', 'https://www.youtube.com/embed/s_p8AIu7o3U?rel=0&autoplay=1&amp;showinfo=0');
            });

            // ABRIR VIdeo tutorial
            $("#video .close").click(function() { 
                $('#video iframe').attr('src', '');
            });

            //Click en Boton Cucarda
            $('#flyercontainer').on('click', '.wrap-flyer .cajaproducto .selecucarda', function() { 
                var cucloaded = $('#cucardas1 .listado-cucardas').html();
                if (cucloaded == '') {
                    $("#cucardas1 .listado-cucardas, #cucardas2 .listado-cucardas").load( "cucardas_template.php", function() {
                      $('#cucardas1 .loading, #cucardas2 .loading').css('display', 'none');

                    });
                }
                $("#cucardas1 input[name='opcion-cucardas']:checked, #cucardas2 input[name='opcion-cucardas']:checked").prop('checked', false);
                idcucarda = $(this).parent().parent().parent().attr('id');
            });
            
            
            //Borrar cucarda seleccionada
            $('#cucardas1').on('click', ".eliminar-cucarda", function() { 
                $("#cucardas1 input[name='opcion-cucardas']:checked").prop('checked', false);
                $('#'+idcucarda+' .cucarda1').html('<span>ELEGIR CUCARDA</span>');
                $('#cucardas1').modal('hide');
                return false;
            });
            
            //Seleccion cucarda 1
            $('#cucardas1').on('change', "input[name='opcion-cucardas']", function() { 
                var cucardaImg = $(this).val();
                $('#cucardas1').modal('hide');
                $('#'+idcucarda+' .cucarda1').html('<img src="'+cucardaImg+'" alt="" title="Click aqui para modificar cucarda">');
            });
            
            //Borrar cucarda 2 seleccionada
            $('#cucardas2').on('click', ".eliminar-cucarda2", function() { 
                $("#cucardas2 input[name='opcion-cucardas']:checked").prop('checked', false);
                $('#'+idcucarda+' .cucarda2').html('<span>ELEGIR CUCARDA</span>');
                $('#cucardas2').modal('hide');
                return false;
            });
            
            //Seleccion cucarda 2
            $('#cucardas2').on('change', "input[name='opcion-cucardas']", function() { 
                var cucardaImg = $(this).val();
                $('#cucardas2').modal('hide');
                $('#'+idcucarda+' .cucarda2').html('<img src="'+cucardaImg+'" alt="" title="Click aqui para modificar cucarda">');
            });


            //Click Agregar SDA Financiacion
            $('#flyercontainer').on('click', '.wrap-flyer .cajaproducto #agregar-sda', function() { 
                var estadoPri = $(this).parent().parent().children('.bottom').children('input.big').val();
                if (estadoPri == '$0,00') {
                    swal("Error", "Completa el PRECIO CONTADO antes de continuar.", "error");
                    return false;
                }
                else {
                    relprod = $(this).parent().parent().children(".bottom").children('input').attr('rel');
                    $(this).parent().parent().children(".bottom").addClass('mini');
                    $(this).parent(".selec-financiacion-big").find('.eliminar-sda').css('display','none');
                    $(this).css('display','none');
                    
                    $(this).parent().parent().find('.zona-cuota, .mitad, .zona-valores').css('display','block');
                    $(this).parent().parent().find('.eliminar-sda').css('display','block');
                    var nuevoidprod = $(this).parent('.selec-financiacion-big').parent('.cajaproducto').attr('id');
                    $("input[name='opcion-tarjetas']:checked").prop('checked', false);
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    
                    $(this).parent().children().children('a.selebancos').html('Seleccionar banco');
                    $(this).parent().children().children('a.selebancos').attr('title', 'Click para seleccionar banco');
                    $(this).parent().children().children('a.selecuotas').html('Seleccionar cuotas');
                    $(this).parent().children().children('a.selecuotas').css('padding-top', '8px');
                    $(this).parent().children().children('a.selecuotas').attr('title', 'Click para seleccionar cuotas');
                    $(this).parent().children('.zona-cuota input').val('$0,00');
                    $(this).parent().children('.zona-cuota input').css('opacity','0.5');
                    $(this).parent().children('.zona-valores .cft p span').html('0,00');
                    $(this).parent().children('.zona-valores .right .ptf p span').html('0,00');
                    $(this).parent().children('.zona-valores .right .tea p span').html('0,00');
                    $(this).parent().parent().children('.bottom').removeClass('tachado');
                    $(this).parent().parent().children('.bottom').children('.agregartachado, .quitartachado').css('display', 'none');
                }
                return false;
            });
            
            //Click Eliminar SDA Financiacion
            $('#flyercontainer').on('click', '.wrap-flyer .cajaproducto .eliminar-sda', function() { 
                    $(this).parent().parent().parent(".selec-financiacion-big").find('.mitad, .zona-cuota, .zona-valores').css('display','none');
                    $(this).parent().parent().parent().parent().children(".bottom").removeClass('mini');
                    $(this).parent().parent().parent(".selec-financiacion-big").find('#agregar-sda').css('display','block');
                    $(this).parent().parent().parent().parent().children('.bottom').children('.agregartachado').css('display', 'block');
                return false;
            });

            $('#flyercontainer').on('change', '.cajaproducto .frases input', function() { 
                var getVal = $(this).val();
                $(this).attr('value', getVal);
            });

            $('#btndown').click(function() {  
                $("html, body").animate({
                         scrollTop: $("#end").offset().top
                  }, 800);
                return false;
            });
            $('#btnup').click(function() {  
                $("html, body").animate({
                         scrollTop: $("#sidebar").offset().top
                  }, 800);
                return false;
            });

            //Controlar longitud Descripcion
            $('#flyercontainer').on('keypress', '.wrap-flyer .cajaproducto .descripcion strong', function() { 
                    var descriptionText = $(this).text();
                    descriptionLong = descriptionText.length;
                    if (descriptionLong>165) {
                        swal("Error", "La descripcion es muy larga, no debe superar 3 renglones.", "error");
                        subCadena = descriptionText.substring(0, 165);
                        $(this).text(subCadena);
                    }
            });

            var toggle = true;
                                        
                            $(".sidebar-icon").click(function() {                
                              if (toggle) {
                                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                                $("#menu span").css({"position":"absolute"});
                              }
                              else {
                                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                                setTimeout(function() {
                                  $("#menu span").css({"position":"relative"});
                                }, 400);
                              }
                                            
                                toggle = !toggle;
                            });

});

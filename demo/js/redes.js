$(document).ready(function () {
	//Click para cargar portada
	$(".lista-scroll .portada").click(function(e) {
		e.preventDefault();
        var ruta = $(this).attr('href');
        $('#portada').css('background-image', 'url(' + ruta + ')');
        $('.descargar').attr('href', ruta);
        $('#fotoampliada .modal-body img').attr('src', ruta);
    });

    //Verificar eleccion de portada
    $(".wrap-portadas .descargar").click(function() {
    	var ruta = $(this).attr('href');
    	if (ruta == '#') {
			swal("Error", "Seleccioná la portada que querés descargar.", "error");
        	return false;
    	}
    	else {
    		swal("¡Listo!", "Entrá en tu Facebook y publicá la portada que descargaste.", "success");
    	}
    });

    //Verificar eleccion de portada
    $(".wrap-portadas .preview").click(function() {
    	var ruta = $('#fotoampliada .modal-body img').attr('src');
    	if (ruta == '') {
			swal("Error", "Seleccioná la portada que querés ver.", "error");
        	return false;
    	}
    });

    //Eliminar portada seleccionada
    $(".wrap-portadas .eliminar").click(function(e) {
    	e.preventDefault();
    	$('#portada').css('background-image', 'url(images/bg_empty_portadas.png)');
    	$('.descargar').attr('href', '#');
    	$('#fotoampliada .modal-body img').attr('src', '');
    });

    //Abrir Cerrar Titulo Seccion
    $(".tituloseccion a").click(function(e) {
        e.preventDefault();
        $(this).parent().next('.lista-scroll').slideToggle();
    });

    $('#cucardas1, #cucardas2').on('click', '.titulo-desp', function() { 
        $("#cucardas1 .listado-tarjetas, #cucardas2 .listado-tarjetas").css('display', 'none');
        $(this).parent().next(".listado-tarjetas").slideDown('fast');
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
            
            
    //Borrar cucarda seleccionada
    $('#cucardas1').on('click', ".eliminar-cucarda", function() { 
                $("#cucardas1 input[name='opcion-cucardas']:checked").prop('checked', false);
                $('.wrap-container .contiene .cucarda1').html('<span>ELEGIR CUCARDA</span>');
                $('#cucardas1').modal('hide');
                return false;
    });
            
    //Seleccion cucarda 1
    $('#cucardas1').on('change', "input[name='opcion-cucardas']", function() { 
                var cucardaImg = $(this).val();
                $('#cucardas1').modal('hide');
                $('.wrap-container .contiene .cucarda1').html('<img src="'+cucardaImg+'" alt="" title="Click aqui para modificar cucarda">');
    });
            
    //Borrar cucarda 2 seleccionada
    $('#cucardas2').on('click', ".eliminar-cucarda2", function() { 
                $("#cucardas2 input[name='opcion-cucardas']:checked").prop('checked', false);
                $('.wrap-container .contiene .cucarda2').html('<span>ELEGIR CUCARDA</span>');
                $('#cucardas2').modal('hide');
                return false;
    });
            
    //Seleccion cucarda 2
    $('#cucardas2').on('change', "input[name='opcion-cucardas']", function() { 
                var cucardaImg = $(this).val();
                $('#cucardas2').modal('hide');
                $('.wrap-container .contiene .cucarda2').html('<img src="'+cucardaImg+'" alt="" title="Click aqui para modificar cucarda">');
    });

});
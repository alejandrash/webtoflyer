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

$result_orden=mysql_query("select * from rating_productos WHERE usuario ='$usuario' ORDER BY nro_orden DESC LIMIT 1");
$row_orden=mysql_fetch_array($result_orden);
$orden = $row_orden["nro_orden"];
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
    
<script type="text/javascript">
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
    $(document).ready(function () {
        $("#descripcion .txt").focus();
         $("#pc").change(function() {       
                var getVal = $(this).val();
                if ((getVal !="")|| (getVal !=0)) {
                    getVal = getVal.replace(',','.');
                    getVal = getVal.replace('$','');
                    var nuevoVal = parseFloat(getVal).toFixed(2);
                    nuevoVal = nuevoVal.replace('.',',');
                    nuevoVal = "$"+nuevoVal;
                    $(this).val(nuevoVal);
                    $(this).attr('value', nuevoVal);
                }
                else {
                   $(this).val('$0.000,00');
                }
           });
        $('#descripcion .txt').attr('spellcheck', true);
        
        $('#descripcion .txt').on('keydown paste', function(event) { //Prevent on paste as well

              //Just for info, you can remove this line
              $('#descripcion span').text('Caracteres totales:' + $(this).text().length); 

              //You can add delete key event code as well over here for windows users.
              if($(this).text().length === 115 && event.keyCode != 8) { 
                event.preventDefault();
              }
        });
        
        $("#agregar").click(function() {       
            $("#precio-contado").addClass('achicar');
            $(".consulte").addClass('ajustar');
            $("#financiacion").css('display','block');
            $(this).css('display','none');
            return false;
        });
        $(".eliminar-sda").click(function() {       
            $("#precio-contado").removeClass('achicar');
            $(".consulte").removeClass('ajustar');
            $("#financiacion").css('display','none');
            $("#agregar").css('display','block');
            return false;
        });
        
        $(".seletarjetas").click(function() { 
                precioContado = $('#pc').val();
                if (precioContado == '$0.000,00') {
                    alert ("Complete el PRECIO CONTADO del producto antes de continuar. Gracias!");
                    return false;
                }
                else {
                    $("input[name='opcion-tarjetas']:checked").prop('checked', false);
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    $('a.selebancos').html('<span>SELECCIONAR BANCO</span>'); 
                    $('a.selecuotas').html('<span>SELECCIONAR CUOTAS</span>');
                    $('#input-cuota').val('0,00');
                    $('.cft p span').html('0,00');
                    $('.ptf p span').html('0000,00');
                    $('.tea p span').html('0,00');
                }
        });
        //Seleccion tarjeta en financiacion
        $("input[name='opcion-tarjetas']").change(function() {
            var tarjetaVal = $(this).val();
            var tarjetaLogo = $(this).parent().children('img').attr('src');
            $('#tarjetas').modal('toggle');
                if (tarjetaVal != '') {
                        $('a.selebancos').removeClass('disabled');
                        $('a.seletarjetas').html('<img src="'+tarjetaLogo+'" rel="'+tarjetaVal+'" alt="" title="Click para modificar la tarjeta">');
                        $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_bancos.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                },
                                success: function(data){
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
        });
        
        // CLICKs en Seleccionar banco
        $(".selebancos").click(function() { 
                precioContado = $('#pc').val();
                if (precioContado == '$0,00') {
                    alert ("Complete el PRECIO CONTADO del producto antes de continuar. Gracias!");
                    return false;
                }
                else {
                    tarjetaVal = $('.seletarjetas').children('img').attr('rel');
                    $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_bancos.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                },
                                success: function(data){
                                    $('#listado-bancos').html(data);
                                    return false;

                                },
                                error: function(data) {
                                     return false;
                                }
                    });
                    $("input[name='opcion-bancos']:checked").prop('checked', false);
                    $("input[name='opcion-cuotas']:checked").prop('checked', false);
                    $('a.selecuotas').html('<span>SELECCIONAR CUOTAS</span>');
                    $('#input-cuota').val('$0,00');
                    $('.cft p span').html('0,00');
                    $('.ptf p span').html('0000,00');
                    $('.tea p span').html('0,00');
                }
        });
        
        //Seleccion banco en financiacion
        $('#listado-bancos').on('change', "input[name='opcion-bancos']", function() { 
            bancoVal = $(this).val();
            var bancoLogo = $(this).parent().children('img').attr('src');
            $('#bancos').modal('toggle');
                if ((tarjetaVal != '') && (bancoVal != '')) {
                        $(' a.selecuotas').removeClass('disabled');
                        $(' a.selebancos').html('<img src="'+bancoLogo+'" rel="'+bancoVal+'" alt="" title="Click para modificar el banco">');
                        $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_cuotas_input.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                    banco: bancoVal
                                },
                                success: function(data){
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
        
        // CLICKs en Seleccionar cuota
            
        $(".selecuotas").click(function() { 
          
            var estadoCuotas = $(this).children('span').length;
            tarjetaVal = $('.seletarjetas').children('img').attr('rel');
            bancoVal = $('.selebancos').children('img').attr('rel');
                if (estadoCuotas == 1) {
                    $.ajax({
                                type: "POST",
                                dataType: "html",
                                url: "buscar_cuotas_input.php",
                                data: {
                                    tarjeta: tarjetaVal,
                                    banco: bancoVal
                                },
                                success: function(data){
                                    $('#listado-cuotas').html(data);
                                    return false;

                                },
                                error: function( xhr, status ) {
                                     return false;
                                }
                    });
                }
        });
        
        //Seleccion cuotas en financiacion // 
        $('#listado-cuotas').on('change', "input[name='opcion-cuotas']", function() { 
                var getVal = $('#pc').val();
                tarjetaVal = $(' a.seletarjetas').children('img').attr('rel');
                bancoVal = $(' a.selebancos').children('img').attr('rel');
                    getVal = getVal.replace('$','');
                    if ((getVal !="")|| (getVal !=0)) {
                        getVal = getVal.replace(',','.');
                        var nuevoVal = parseFloat(getVal).toFixed(2);
                        precioContadoUnsigned = nuevoVal;
                    }
                    cuotasVal = $(this).val();
                    var cuotasTxt = $(this).parent().children('span').html();
                    $('#cuotas').modal('toggle');
                    if ((tarjetaVal != '') && (bancoVal != '')) {
                        $(' a.selecuotas').html('<span class="def" title="Click para modificar la cantidad de cuotas">'+cuotasTxt+'</span>');
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
                                        $('#datacontainer').html(data);
                                        var partes = $('#datacontainer').text().split("+");
                                        tea = partes[0];
                                        cft = partes[1];
                                        coef = partes[2];
                                        coef = coef.replace(',','.');
                                        $('#input-cuota').css('opacity','1'); 
                                        $(' .cft p span').html(cft);
                                        $(' .tea p span').html(tea);
                                        var finalCuota = ((precioContadoUnsigned * coef)/cuotasVal);
                                        finalCuota = parseFloat(finalCuota).toFixed(2);
                                        var ptf = (finalCuota * cuotasVal);
                                        ptf = parseFloat(ptf).toFixed(2);
                                        ptf = ptf.toString();
                                        ptf = ptf.replace('.',',');
                                        var finalCuota = finalCuota.toString();
                                        finalCuota = finalCuota.replace('.',',');
                                        finalCuota = ('$'+finalCuota);
                                        $('#input-cuota').val(finalCuota);
                                        $('#input-cuota').attr('value', finalCuota); 
                                        $(' .ptf p span').html(ptf);
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
        
        
        
        $(".preview").click(function() {       
                var content = $("#obtener").html();
                $('#previa .modal-body').html(content);
        });
        
        $(".print").click(function() { 
            $("#obtener").addClass('obtener_float');
            if ($(".obtener_printable").length>=3) {
                $(".obtener_printable").remove();
            } 
            $("#obtener").clone().insertAfter("#obtener:last"); 
            $("#obtener:last").addClass('obtener_printable');
            $("#obtener").clone().insertAfter("#obtener:last"); 
            $("#obtener:last").addClass('obtener_printable');  
            $("#obtener").clone().insertAfter("#obtener:last");  
            $("#obtener:last").addClass('obtener_printable');    
            window.print();
            return false;
        });
        
        $(".download").click(function() { 
            var content = $("#obtener").html();
            $("#datacontainer").html("<div style='float:left; margin-bottom:30px;'>"+content+"</div><div style='float:right; margin-bottom:30px;'>"+content+"</div><div style='float:left;'>"+content+"</div><div style='float:right;'>"+content+"</div>");
            $("#datacontainer .eliminar-sda, #datacontainer #agregar, #datacontainer #descripcion span").remove();
            content = $("#datacontainer").html();
            content = content.replace(/images/g, "../../images");
            var fecha = '<?php echo(date("Y-m-d H:i:s")); ?>';
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
                    $("#editor").attr('href',data);
                    var evt = document.createEvent("MouseEvents");
                      evt.initMouseEvent("click", true, true, window,
                        0, 0, 0, 0, 0, false, false, false, false, 0, null);
                      var a = document.getElementById("editor"); 
                      a.dispatchEvent(evt); 
                         setTimeout(
                          function() 
                          {
                            window.location.href = "etiquetas-calculador.php";
                          }, 5000);
                }
            });
            return false;
        });
    });
</script>

   <!--pie-chart--->
</head> 
<body id="forprint">
    <a href="#" id="editor" target='_blank'></a>
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
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12" style="min-width:0;">
                <!-- PAGINA ENVIADO start-->
                <div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div id="wrap-enviado" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p class="titulo-pico" style="padding-left:25px;">Calculador de Cuotas / Cartel de Precios</p><br> 
                            <p class="printhide">En esta secci&oacute;n podr&aacute;s generar un cartel de precios para imprimir y utilizar en tu local. <br>Coloc&aacute; el precio al contado para generar el cartel. Si quer&eacute;s pod&eacute;s agregar una opci&oacute;n de financiaci&oacute;n. <br>Ten&eacute; en cuenta que para obtener el cartel deber&aacute;s disponer de una impresora.</p>
                            <div class="col-xs-12 printhide">
                                <div class="row"><h1 class="titulo-2">Cartel imprimible 10,5 x 12,5 cm</h1></div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 printhide">
                                            <ol class="lista-acciones">
                                                <li>Agreg&aacute; una descripci&oacute;n al cartel.<br>Te sugerimos: PRODUCTO + MARCA + MODELO + CARACTERÍSTICA<br>Por ejemplo: LAVARROPAS DREAN NEXT 8.12 1200 RPM</li>
                                                <li>Escrib&iacute; el precio contado.</li>
                                                <li>Si quer&eacute;s agregar un plan de financiaci&oacute;n, presion&aacute; el bot&oacute;n verde <img src="images/plus.png" height="20" alt=""> y seleccion&aacute; Tarjeta, Banco y Cantidad de Cuotas.</li>
                                                <li>Para quitar la financiaci&oacute;n presion&aacute; el bot&oacute;n rojo <img src="images/menos.png" height="20" alt="">.</li>
                                                <li>Luego de imprimir, recort&aacute;, as&iacute; obtendr&aacute;s 4 carteles de 10,5 x 12,5 cm</li>
                                            </ol>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                        <div class="row" id="obtener">
                                            <form id="form-etiqueta" style="width:390px; height:509px; margin:0 auto;" action="http://api.pdflayer.com/api/convert?access_key=64fed91fc5157e21bb8cca93fdbf18ff
" method="post" autocomplete="off">
                                                <div id="wrap-etiqueta">
                                                    <img src="images/etiqueta/base.jpg" class="fondo" alt="">
                                                    <div id="inner-etiqueta">
                                                            <div id="descripcion"><div class="txt" contenteditable="true" title="Escribi aqui la descripcion" spellcheck="true"></div><span></span></div>
                                                            <div id="precio-contado">
                                                                <p class="med">PRECIO CONTADO</p>
                                                                <p class="big"><input type="text" name="pc" id="pc" value="$0.000,00" step=",01" onkeypress="return Onlynumbers(event)"></p>
                                                                <p class="gris"><a href="#" id="agregar" class="printhide" title="Click aqui para agregar un plan de financiacion"><img src="images/plus.png" alt=""></a>EFECTIVO, TARJETA DE D&Eacute;BITO &oacute; TARJETA DE CR&Eacute;DITO EN 1 PAGO</p>
                                                            </div>
                                                            <div id="financiacion" style="display:none;">
                                                                <div class="col-xs-12">
                                                                    <a href="#tarjetas" data-toggle="modal" class="sele seletarjetas" title="Click aqui para seleccionar tarjeta"><span>SELECCIONAR TARJETA</span></a> 
                                                                    <a data-toggle="modal" href="#bancos" class="sele selebancos disabled" title="Click aqui para seleccionar banco"><span>SELECCIONAR BANCO</span></a>
                                                                </div>
                                                                <div class="separador"></div>
                                                                <div class="col-xs-12" style="line-height:100%;">
                                                                    <a data-toggle="modal" href="#cuotas" class="sele selecuotas disabled" title="Click aqui para seleccionar la cantidad de cuotas"><span>SELECCIONAR CUOTAS</span></a><input id="input-cuota" onkeypress="return Onlyprices(event)" class="cuota disabled" type="text" step=",01" value="$0,00">
                                                                </div>
                                                                <div class="separador"></div>
                                                                
                                                                <div class="ptf"><p>PTF: $<span>0,00</span></p></div>
                                                                <div class="tea"><p>TEA: <span>0,00</span>%</p></div>
                                                                <div class="separador"></div>
                                                                <div class="cft"><a class="eliminar-sda printhide" href="#" title="Click aqui para eliminar esta financiacion"><img src="images/menos.png" alt=""></a><p>CFT: <span>0,00</span>%</p>COSTO FINANCIERO TOTAL</div>

                                                            </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="row printhide">
                                            <div class="botones-etiquetas">
                                                <p><a title="VISTA PREVIA" class="preview" href="#" data-toggle="modal" data-target="#previa" data-backdrop="static" data-keyboard="true"><i class="fa fa-eye" aria-hidden="true"></i> VISTA PREVIA</a></p>
                                                <!--<p><a title="IMPRIMIR" class="print" href="#"><i class="fa fa-print" aria-hidden="true"></i> IMPRIMIR CARTEL</a></p>-->
                                                <p><a title="DESCARGAR" class="download" href="#"><i class="fa fa-download" aria-hidden="true"></i> DESCARGAR PDF</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <p style="margin:15px 15px 10px 40px; color:#242F7B;">Seleccion&aacute; una tarjeta:</p>
            <ul class="listado-tarjetas">
                 <?php
                    $result_tarjetas=mysql_query("select * from tarjetas ORDER BY nombre ASC");
                    if ($row_tarjetas=mysql_fetch_array($result_tarjetas)) {
                        do {
                ?>
                        <li>
                            <label>
                                <input type="radio" name="opcion-tarjetas" value="<?php echo($row_tarjetas['Id']); ?>">
                                <img src="images/<?php echo($row_tarjetas['logo']); ?>" alt="<?php echo($row_tarjetas['nombre']); ?>">
                            </label>
                        </li>
                    <?php
                        } while ($row_tarjetas=mysql_fetch_array($result_tarjetas));	
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
            <p style="margin:15px 15px 10px 40px; color:#242F7B;">Seleccion&aacute; un banco:</p>
            <ul id="listado-bancos" class="listado-tarjetas">
            </ul>
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
            <p style="margin:15px 15px 10px 40px; color:#242F7B;">Seleccion&aacute; la cantidad de cuotas:</p>
            <ul id="listado-cuotas" class="listado-tarjetas">
            </ul>
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
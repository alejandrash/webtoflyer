<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if (!isset($_POST['pagina'])) {
	header("Location:publicitarios_2.php");
}

else {
	$datecab = date('Y-m', strtotime('+1 month')); 
	$datecab = explode("-", $datecab);
	$mes = $datecab[1];

	$pagina = $_POST['pagina'];
	$valor = $_POST['selector-plantilla'];
	$posicion = $_POST['posicion-plantilla'];
	$detalle = $_POST['detalle-plantilla'];
	$imagen = $_POST['imagen-plantilla'];
    switch ($pagina) {
    	case "pag2":
            $titpag="P&Aacute;GINA 2";
        break;
        case "pag3":
            $titpag="P&Aacute;GINA 3";
        break;
        case "pag4":
            $titpag="P&Aacute;GINA 4";
        break;
        case "pag5":
            $titpag="P&Aacute;GINA 5";
        break;
        case "pag6":
            $titpag="P&Aacute;GINA 6";
        break;
        case "pag7":
            $titpag="P&Aacute;GINA 7";
        break;
        case "contratapa":
            $titpag="CONTRATAPA";
        break;
    }

    switch ($detalle) {
    	case "1":
    	case "2":
    	case "3":
    	case "4":
    	case "8":
    	case "9":
    	case "10":
    	case "19":
    	case "20":
    	case "21":
    	case "24":
    	case "30":
    	case "31":
            $bloque1=25;
        break;
        case "11":
        case "13":
        case "15":
        case "16":
        case "17":
            $bloque1=50;
        break;
        case "22":
        case "23":
            $bloque1=75;
        break;
        case "25":
            $bloque1=100;
        break;
    }

    switch ($detalle) {
        case "2":
        case "3":
        case "4":
        case "7":
        case "9":
        case "18":
        case "20":
        case "27":
        case "28":
            $bloque2=25;
        break;
        case "14":
        case "21":
        case "31":
        case "32":
            $bloque2=50;
        break;
        case "24":
        case "38":
            $bloque2=75;
        break;
    }

    switch ($detalle) {
        case "3":
        case "4":
        case "6":
        case "7":
        case "10":
        case "15":
        case "17":
        case "29":
        case "30":
            $bloque3=25;
        break;
        case "12":
        case "13":
        case "18":
        case "19":
        case "20":
            $bloque3=50;
        break;
    }

    switch ($detalle) {
        case "4":
        case "5":
        case "6":
        case "7":
        case "8":
        case "9":
        case "10":
        case "16":
        case "17":
        case "21":
        case "23":
        case "28":
            $bloque4=25;
        break;
    }

    $partes = explode("+", $detalle);
    $cant_files = count($partes);
}	
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
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css?" rel='stylesheet' type='text/css' />
<link href="css/wtf.css?" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/simpleUpload.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    	var posicion = 0;
    	var detalle = '';
             
        $('#bloque1').change(function(){
            var nuevoNom = '<?php echo($pagina);?>_bloque1.jpg';
            //var nuevoNom = $('#fecha').val();
            var nom = $(this)[0].files[0].name;
                    //nuevoNom = nuevoNom+nom;
                    $('#filename').html(nuevoNom);
                    $('#filenam').val(nuevoNom);
                    $('#fileori').val(nom);
            		$('#bloque1').attr('name', nuevoNom);
            		$(this).simpleUpload("bloque_procesar.php", {

                start: function(file){
                    //upload started
                    $('#form-paso2 .btn-default').attr('disabled','disabled');
                    $('#progress').html("");
                    $('#progressBar').width(0);
                },

                progress: function(progress){
                    //received progress
                    $('#progressBar').width(progress + "%");
                    $('.percent').html("" + Math.round(progress) + "%");
                },

                success: function(data){
                    //upload successful
                    //console.log(data);
                    $('#thumb1').attr('src', 'flyer/banners/'+nom+'?');
                    var valorpercent = $('#valor1').val();
                    $('#thumb1').css('height', valorpercent+'%');
                    $('#form-paso2 .btn-default').removeAttr("disabled");
                },

                error: function(error){
                    //upload failed
                    $('#progress').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });
	   });

        $('#bloque2').change(function(){
            var nuevoNom = '<?php echo($pagina);?>_bloque2.jpg';
            //var nuevoNom = $('#fecha2').val();
            var nom = $(this)[0].files[0].name;
                    //nuevoNom = nuevoNom+nom;
                    $('#filename2').html(nuevoNom);
                    $('#filenam2').val(nuevoNom);
                    $('#fileori2').val(nom);
            		$('#bloque2').attr('name', nuevoNom);
            		$(this).simpleUpload("bloque_procesar.php", {
                    name: nuevoNom,
                start: function(file){
                    //upload started
                    $('#form-paso2 .btn-default').attr('disabled','disabled');
                    $('#progress2').html("");
                    $('#progressBar2').width(0);
                },

                progress: function(progress){
                    //received progress
                    $('#progressBar2').width(progress + "%");
                    $('.percent2').html("" + Math.round(progress) + "%");
                },

                success: function(data){
                    //upload successful
                    //console.log(data);
                    $('#thumb2').attr('src', 'flyer/banners/'+nom+'?');
                    var valorpercent = $('#valor2').val();
                    $('#thumb2').css('height', valorpercent+'%');
                    $('#form-paso2 .btn-default').removeAttr("disabled");
                },

                error: function(error){
                    //upload failed
                    $('#progress2').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });
	   });

        $('#bloque3').change(function(){
            var nuevoNom = '<?php echo($pagina);?>_bloque3.jpg';
            var nom = $(this)[0].files[0].name;
                    //nuevoNom = nuevoNom+nom;
                    $('#filename3').html(nuevoNom);
                    $('#filenam3').val(nuevoNom);
                    $('#fileori3').val(nom);
            		$('#bloque3').attr('name', nuevoNom);
            		$(this).simpleUpload("bloque_procesar.php", {

                start: function(file){
                    //upload started
                    $('#form-paso2 .btn-default').attr('disabled','disabled');
                    $('#progress3').html("");
                    $('#progressBar3').width(0);
                },

                progress: function(progress){
                    //received progress
                    $('#progressBar3').width(progress + "%");
                    $('.percent3').html("" + Math.round(progress) + "%");
                },

                success: function(data){
                    //upload successful
                    //console.log(data);
                    $('#thumb3').attr('src', 'flyer/banners/'+nom+'?');
                    var valorpercent = $('#valor3').val();
                    $('#thumb3').css('height', valorpercent+'%');
                    $('#form-paso2 .btn-default').removeAttr("disabled");
                },

                error: function(error){
                    //upload failed
                    $('#progress3').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });
	   });

        $('#bloque4').change(function(){
            var nuevoNom = '<?php echo($pagina);?>_bloque4.jpg';
            var nom = $(this)[0].files[0].name;
                    //nuevoNom = nuevoNom+nom;
                    $('#filename4').html(nuevoNom);
                    $('#filenam4').val(nuevoNom);
                    $('#fileori4').val(nom);
            		$('#bloque4').attr('name', nuevoNom);
            		$(this).simpleUpload("bloque_procesar.php", {

                start: function(file){
                    //upload started
                    $('#form-paso2 .btn-default').attr('disabled','disabled');
                    $('#progress4').html("");
                    $('#progressBar4').width(0);
                },

                progress: function(progress){
                    //received progress
                    $('#progressBar4').width(progress + "%");
                    $('.percent4').html("" + Math.round(progress) + "%");
                },

                success: function(data){
                    //upload successful
                    //console.log(data);
                    $('#thumb4').attr('src', 'flyer/banners/'+nom+'?');
                    var valorpercent = $('#valor4').val();
                    $('#thumb4').css('height', valorpercent+'%');
                    $('#form-paso2 .btn-default').removeAttr("disabled");
                },

                error: function(error){
                    //upload failed
                    $('#progress4').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });
	   });

        var vacios = '';
        var hayerror = 0;
	   $( "#form-paso2 .btn-default").click(function() {
	   		hayerror = 0;
	   		if($('#bloque1').length > 0) {
	   			var estado = $('#filenam').val();
	   			//var estadoImg = $('#thumb1').attr('src');
	   			if (estado == "") {
                    hayerror = 1;
	   				alert("Debes cargar todos los JPG de acuerdo a la plantilla seleccionada.");
	   				return false;
	   			}
	   		}
	   		if($('#bloque2').length > 0) {
	   			var estado = $('#filenam2').val();
	   			//var estadoImg = $('#thumb2').attr('src');
	   			if (estado == "") {
                    hayerror = 1;
	   				alert("Debes cargar todos los JPG de acuerdo a la plantilla seleccionada.");
	   				return false;
	   			}
	   		}
	   		if($('#bloque3').length > 0) {
	   			var estado = $('#filenam3').val();
	   			//var estadoImg = $('#thumb3').attr('src');
	   			if (estado == "") {
                    hayerror = 1;
	   				alert("Debes cargar todos los JPG de acuerdo a la plantilla seleccionada.");
	   				return false;
	   			}
	   		}
	   		if($('#bloque4').length > 0) {
	   			var estado = $('#filenam4').val();
	   			//var estadoImg = $('#thumb4').attr('src');
	   			if (estado == "") {
                    hayerror = 1;
	   				alert("Debes cargar todos los JPG de acuerdo a la plantilla seleccionada.");
	   				return false;
	   			}
	   		}


            if (hayerror == 0) {
                if($('#filenam').length > 0) {
                    var cadena = $('#filenam').val();
                    $('#thumb1').attr('src', 'flyer/banners/'+cadena+'?');
                }
                if($('#filenam2').length > 0) {
                    var cadena = $('#filenam2').val();
                    $('#thumb2').attr('src', 'flyer/banners/'+cadena+'?');
                }
                if($('#filenam3').length > 0) {
                    var cadena = $('#filenam3').val();
                    $('#thumb3').attr('src', 'flyer/banners/'+cadena+'?');
                }
                if($('#filenam4').length > 0) {
                    var cadena = $('#filenam4').val();
                    $('#thumb4').attr('src', 'flyer/banners/'+cadena+'?');
                }

                var content = $("#wrap-img").html();
                $("#in-plantilla").val(content);
                $("#form-paso2").submit();
            }
        });

        $(".thumb").click(function() {
        	var urlImg = $(this).attr('src');
        	if (urlImg !='') {
        		$("#imgprev img").attr('src', urlImg);
        		$('#imgprev').modal('toggle'); 
        	}
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
            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start-->
                <div class="botonera-acciones col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <ul>
                        <li><a href="publicitarios.php">PASO 1 - P&Aacute;GINAS</a></li>
                        <li><a href="publicitarios_2.php">PASO 2 - UBICAR BANNERS</a></li>
                        <li class="active"><a href="publicitarios_3.php">PASO 3 - CARGAR ARCHIVOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-container col-lg-10 col-md-9 col-sm-9 col-xs-12">
                        <div class="publicitarios-form col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h1 class="titulo-pico">PASO 3 - Cargar los archivos</h1>
                                    <form id="form-paso2" action="publicitarios_procesar.php" method="post">
                                    	<input type="hidden" name="detalle" id="detalle" value="<?php echo($detalle);?>">
                                    	<input type="hidden" name="in-plantilla" id="in-plantilla" value="">
                                    	<input type="hidden" name="posicion-plantilla" id="posicion-plantilla" value="<?php echo($posicion);?>">
                                    	<input type="hidden" name="pagina" id="pagina" value="<?php echo($pagina);?>">

                                    	<input type="hidden" id="filenam" name="filenam" value="">
		                                <input type="hidden" id="fileori" name="fileori" value="">
		                                <input type="hidden" id="fecha" name="fecha" value="<?php echo(date('m-d-Y_hia'));?>">

		                                <input type="hidden" id="filenam2" name="filenam2" value="">
		                                <input type="hidden" id="fileori2" name="fileori2" value="">
		                                <input type="hidden" id="fecha2" name="fecha2" value="<?php echo(date('m-d-Y_hia'));?>">

		                                <input type="hidden" id="filenam3" name="filenam3" value="">
		                                <input type="hidden" id="fileori3" name="fileori3" value="">
		                                <input type="hidden" id="fecha3" name="fecha3" value="<?php echo(date('m-d-Y_hia'));?>">

		                                <input type="hidden" id="filenam4" name="filenam4" value="">
		                                <input type="hidden" id="fileori4" name="fileori4" value="">
		                                <input type="hidden" id="fecha4" name="fecha4" value="<?php echo(date('m-d-Y_hia'));?>">

                                        <p class="pdleft negro">Seg&uacute;n la plantilla que elegiste debes cargar los archivos en formato JPG de alta resoluci&oacute;n (300DPI) y siguiendo las medidas especificadas a continuaci&oacute;n.</p>
                                        <div class="medidasbanners pdleft col-xs-12">
                                        	<h3>MEDIDAS AVISOS (Ancho x Alto)</h3>
                                        	<div class="col-sm-3 col-xs-6">
                                        		<h4 class="">1/4</h4>
                                        		19,69 x 6,67 cm
                                        	</div>
                                        	<div class="col-sm-3 col-xs-6">
                                        		<h4 class="">2/4</h4>
                                        		19,69 x 13,41 cm
                                        	</div>
                                        	<div class="col-sm-3 col-xs-6">
                                        		<h4 class="">3/4</h4>
                                        		19,69 x 20,16 cm
                                        	</div>
                                        	<div class="col-sm-3 col-xs-6">
                                        		<h4 class="">4/4</h4>
                                        		19,69 x 26,83 cm
                                        	</div>
                                        </div>
                                        <h2 class="pdleft titulo-bordeinferior">EDITANDO <?php echo($titpag);?></h2>
                                        <div class="text-center">
                                        	<div class="pdleft col-xs-12">
                                        		<div class="row">
                                        			<div class="col-sm-9 col-xs-12">
                                        				<div class="row">
                                        					<?php
                                        						if (isset($bloque1)) { 
                                        							if ($bloque1 == 25) { 
                                        								$tipobanner = "1/4";
                                        							}
                                        							if ($bloque1 == 50) { 
                                        								$tipobanner = "2/4"; 
                                        							}
                                        							if ($bloque1 == 75) { 
                                        								$tipobanner = "3/4"; 
                                        							}
                                        							if ($bloque1 == 100) { 
                                        								$tipobanner = "4/4"; }
                                        							?>
                                        							<label for="bloque1" class="label-gris">BANNER <?php echo($tipobanner);?></label>
                                    								<input type="file" class="form-control" id="bloque1" name="bloque1" accept="image/jpeg" data-id="">
                                    								<input type="hidden" class="form-control" id="valor1" name="valor1" value="<?php echo($bloque1);?>">
                                    								<div id="filename"></div>
									                                <div id="progress"></div>
									                                <div id="progressBar"></div>
									                                <div class="percent"></div>
									                                <script type="text/javascript">
								                                        $(document).ready(function () {
								                                            $('#thumb1').removeClass('hidden');
								                                        });
								                                    </script>
                                        					<?php
                                        						}
                                        					?>
                                        					<?php
                                        						if (isset($bloque2)) { 
                                        							if ($bloque2 == 25) { $tipobanner = "1/4";}
                                        							if ($bloque2 == 50) { $tipobanner = "2/4"; }
                                        							if ($bloque2 == 75) { $tipobanner = "3/4"; }
                                        							?>
                                        							<label for="bloque2" class="label-gris">BANNER <?php echo($tipobanner);?></label>
                                    								<input type="file" class="form-control" id="bloque2" name="bloque2" accept="image/jpeg" data-id="">
                                    								<input type="hidden" class="form-control" id="valor2" name="valor2" value="<?php echo($bloque2);?>">
                                    								<div id="filename2"></div>
									                                <div id="progress2"></div>
									                                <div id="progressBar2"></div>
									                                <div class="percent2"></div>
									                                <script type="text/javascript">
								                                        $(document).ready(function () {
								                                            $('#thumb2').removeClass('hidden');
								                                        });
								                                    </script>
                                        					<?php
                                        						}
                                        					?>
                                        					<?php
                                        						if (isset($bloque3)) { 
                                        							if ($bloque3 == 25) { $tipobanner = "1/4"; }
                                        							if ($bloque3 == 50) { $tipobanner = "2/4"; }
                                        							?>
                                        							<label for="bloque3" class="label-gris">BANNER <?php echo($tipobanner);?></label>
                                    								<input type="file" class="form-control" id="bloque3" name="bloque3" accept="image/jpeg" data-id="">
                                    								<input type="hidden" class="form-control" id="valor3" name="valor3" value="<?php echo($bloque3);?>">
                                    								<div id="filename3"></div>
									                                <div id="progress3"></div>
									                                <div id="progressBar3"></div>
									                                <div class="percent3"></div>
									                                <script type="text/javascript">
								                                        $(document).ready(function () {
								                                            $('#thumb3').removeClass('hidden');
								                                        });
								                                    </script>
                                        					<?php
                                        						}
                                        					?>
                                        					<?php
                                        						if (isset($bloque4)) { 
                                        							if ($bloque4 == 25) { $tipobanner = "1/4"; }
                                        							?>
                                        							<label for="bloque4" class="label-gris">BANNER <?php echo($tipobanner);?></label>
                                    								<input type="file" class="form-control" id="bloque4" name="bloque4" accept="image/jpeg" data-id="">
                                    								<input type="hidden" class="form-control" id="valor4" name="valor4" value="<?php echo($bloque4);?>">
                                    								<div id="filename4"></div>
									                                <div id="progress4"></div>
									                                <div id="progressBar4"></div>
									                                <div class="percent4"></div>
									                                <script type="text/javascript">
								                                        $(document).ready(function () {
								                                            $('#thumb4').removeClass('hidden');
								                                        });
								                                    </script>
                                        					<?php
                                        						}
                                        					?>
                                        				</div>
                                        			</div>
                                        			<div class="col-sm-3 col-xs-12">
                                        				<div class="row" id="wrap-img" style="min-height: 200px;">
                                        					<?php 
						                                       	$result_pag=mysql_query("select * from banners_flyer WHERE cara='$pagina' AND mes='$mes' AND id_plantilla='$detalle'");
						                                       	if($row_pag=mysql_fetch_array($result_pag)){
						                                       		$existe = $row_pag['plantilla'];
						                                       		echo($existe);
						                                       	}
						                                       	else {
						                                    ?> 
                                        					<div class="container-img">
                                        						<img src="<?php echo($imagen);?>" class="img-responsive bgimg" alt="">
                                        						<img id="thumb1" class="thumb hidden" src="" alt="" style="top:9;">
                                        						<img id="thumb2" class="thumb hidden" src="" alt="" style="top:75px;">
                                        						<img id="thumb3" class="thumb hidden" src="" alt="" style="top:145px;">
                                        						<img id="thumb4" class="thumb hidden" src="" alt="" style="top:215px;">
                                        					</div>
                                        					<?php } ?>
                                        				</div>
                                        			</div>
                                        		</div>
                                        	</div>
	                                        <div class="pdleft col-xs-12"><input class="btn btn-default" type="button" value="GUARDAR P&Aacute;GINA" disabled> </div>
                                        </div>
                                    </form>                              
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Central end-->
            </div>
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
        </div>
</div>

<!-- Modal PREVIEW -->
<div id="imgprev" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <img src="" alt="" style="width:100%!important; height:auto!important;">
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
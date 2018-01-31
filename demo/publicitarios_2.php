<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if (!isset($_POST['selector-pagina'])) {
	header("Location:publicitarios.php");
}
else {
	$pagina = $_POST['selector-pagina'];
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
<script type="text/javascript">
    $(document).ready(function () {
    	var posicion = 0;
    	var detalle = '';
    	var imagen = '';
        $("input[name='selector-plantilla']").change(function() {
        	$('.selector-plantilla').removeClass('active');
            $(this).parent('label').addClass('active');
            posicion = $(this).attr('data-posicion');
            detalle = $(this).attr('data-detalle');
            imagen = $(this).parent().children('img').attr('src');
            $("#posicion-plantilla").val(posicion);
            $("#detalle-plantilla").val(detalle);
            $("#imagen-plantilla").val(imagen);
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
                        <li class="active"><a href="publicitarios_2.php">PASO 2 - UBICAR AVISOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <?php 
                	$id_plantilla = "";
                	$ocultar = "";
                	$relat = "";
                	$datecab = date('Y-m', strtotime('+1 month')); 
					$datecab = explode("-", $datecab);
					$mes = $datecab[1];

		        	$result_pag=mysql_query("select * from banners_flyer WHERE cara='$pagina' AND mes='$mes' GROUP BY id_plantilla");
		            if($row_pag=mysql_fetch_array($result_pag)){
		            	$id_plantilla = $row_pag['id_plantilla'];
		            	$existe = $row_pag['plantilla'];
		        	}
		        ?> 
                <div class="wrap-container col-lg-10 col-md-9 col-sm-9 col-xs-12">
                        <div class="publicitarios-form col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h1 class="titulo-pico">PASO 2 - Ubicar avisos</h1>
                                    <form id="form-paso2" action="publicitarios_3.php" method="post">
                                    	<input type="hidden" name="posicion-plantilla" id="posicion-plantilla" value="">
                                    	<input type="hidden" name="detalle-plantilla" id="detalle-plantilla" value="">
                                    	<input type="hidden" name="pagina" id="pagina" value="<?php echo($pagina);?>">
                                    	<input type="hidden" name="imagen-plantilla" id="imagen-plantilla" value="">
                                        <p class="pdleft negro">Seleccion&aacute; la plantilla que se adapte a tus necesidades. Los avisos se ubicar&aacute;n en la p&aacute;gina seleccionada en el paso anterior.</p>
                                        <h2 class="pdleft titulo-bordeinferior"><?php echo($titpag);?></h2>
                                        <div class="text-center">
                                        	<?php //if($pagina!='pag6') { ?>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 1) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?>
		                                        	<img src="images/publicitarios/1.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="1" value="25" required> 
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 2) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/2.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="2" value="50" required>                                          
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 3) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/3.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="3" value="75" required>                                          
		                                        </label>
		                                        <?php if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php 
			                                        	$ocultar = ""; $relat=""; 
		                                            	if ($id_plantilla == 4) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?> 
			                                        	<img src="images/publicitarios/4.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="4" value="100" required>                                          
			                                        </label>
		                                        <?php } ?>
	                                        <?php //} ?>
	                                        <?php if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<img src="images/publicitarios/5.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="4" data-detalle="5" value="25" required>
		                                            <?php  
		                                            	if ($id_plantilla == 5) {
		                                            		echo($existe);
		                                            	}
		                                            ?>                                           
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 6) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?>
		                                            <img src="images/publicitarios/6.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">  
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" class="<?php echo($relat); ?>" data-posicion="3" data-detalle="6" value="50" required>                                        
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php 
			                                        	$ocultar = ""; $relat=""; 
		                                            	if ($id_plantilla == 29) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?>  
		                                            	<img src="images/publicitarios/29.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="3" data-detalle="29" value="50" required>
			                                                                                    
			                                        </label>
	                                        <?php } ?>

	                                        	<?php if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php  
			                                        	$ocultar = ""; $relat="";
		                                            	if ($id_plantilla == 7) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?>   
			                                        	<img src="images/publicitarios/7.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="2" data-detalle="7" value="75" required>                                       
			                                        </label>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php  
			                                        	$ocultar = ""; $relat="";
		                                            	if ($id_plantilla == 8) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?>
		                                            	<img src="images/publicitarios/8.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="8" value="50" required>
			                                                                                       
			                                        </label>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php  
			                                        	$ocultar = ""; $relat="";
		                                            	if ($id_plantilla == 9) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?>
			                                        	<img src="images/publicitarios/9.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="9" value="75" required> 
			                                                                                      
			                                        </label>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php  
			                                        	$ocultar = ""; $relat="";
		                                            	if ($id_plantilla == 10) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?>
			                                        	<img src="images/publicitarios/10.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="10" value="75" required>
			                                             
		                                            </label>
		                                            <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<img src="images/publicitarios/27.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="2" data-detalle="27" value="25" required>
			                                            <?php  
		                                            	if ($id_plantilla == 27) {
		                                            		echo($existe);
		                                            	}
		                                            	?>                                          
			                                        </label>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        		<?php
			                                        		$ocultar = ""; $relat="";  
			                                            	if ($id_plantilla == 29) {
			                                            		echo($existe);
			                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
			                                            	}
			                                            	?>
				                                        	<img src="images/publicitarios/29.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
				                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="3" data-detalle="29" value="25" required>
				                                                                                      
				                                    </label>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php  
			                                        	$ocultar = ""; $relat="";
		                                            	if ($id_plantilla == 30) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?> 
			                                        	<img src="images/publicitarios/30.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="30" value="50" required>
			                                                                                     
			                                        </label>
		                                        <?php } ?>
		                                        <?php if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        		<?php 
			                                        		$ocultar = ""; $relat=""; 
			                                            	if ($id_plantilla == 28) {
			                                            		echo($existe);
			                                            		$ocultar = "hidden";
		                                            			$relat   = "relat";
			                                            	}
			                                            	?>
				                                        	<img src="images/publicitarios/28.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
				                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="2" data-detalle="28" value="50" required>
				                                                                                      
				                                    </label>
			                                     <?php } ?>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 11) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/11.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="11" value="50" required> 
		                                                                                     
		                                        </label>

	                                        <?php if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 12) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?>
		                                        	<img src="images/publicitarios/26.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="3" data-detalle="12" value="50" required>
		                                                                                       
		                                        </label>
	                                        <?php } ?>
	                                        <?php //if($pagina!='pag6') { ?>
		                                        <?php if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
			                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php  
			                                        	$ocultar = ""; $relat="";
		                                            	if ($id_plantilla == 13) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            	?> 
			                                        	<img src="images/publicitarios/12.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="13" value="100" required> 
			                                                                                     
			                                        </label>
		                                        <?php } ?>
		                                    <?php //if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 14) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/13.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="2" data-detalle="14" value="50" required>  
		                                                                                    
		                                        </label>
		                                    <?php //} ?>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 15) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?>  
		                                        	<img src="images/publicitarios/14.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="15" value="75" required>  
		                                                                                   
		                                        </label> 
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 31) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/31.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="31" value="75" required>  
		                                                                                    
		                                        </label>
		                                    <?php if(($pagina!='pag6') && ($pagina!='pag7')&&($pagina!='contratapa')) { ?>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 16) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/15.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="16" value="75" required>
		                                                                                     
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 17) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/16.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="17" value="100" required> 
		                                                                                     
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 18) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?>
		                                        	<img src="images/publicitarios/17.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="2" data-detalle="18" value="75" required> 
		                                                                                      
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 38) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/22.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="2" data-detalle="38" value="75" required> 
		                                                                                     
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 32) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/32.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="2" data-detalle="32" value="75" required> 
		                                                                                     
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 19) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/18.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="19" value="75" required> 
		                                                                                     
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 20) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/19.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="20" value="100" required>  
		                                                                                    
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
		                                            	if ($id_plantilla == 21) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
		                                        	<img src="images/publicitarios/20.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="21" value="100" required>
		                                                                                     
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
			                                            	if ($id_plantilla == 23) {
			                                            		echo($existe);
			                                            		$ocultar = "hidden";
			                                            		$relat   = "relat";
			                                            	}
			                                            ?> 
		                                        	<img src="images/publicitarios/23.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="23" value="100" required> 
		                                                                                    
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
		                                        	<?php $ocultar = ""; $relat="";  
			                                            	if ($id_plantilla == 24) {
			                                            		echo($existe);
			                                            		$ocultar = "hidden";
			                                            		$relat   = "relat";
			                                            	}
			                                            ?> 
		                                        	<img src="images/publicitarios/24.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
		                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="24" value="100" required> 
		                                                                                    
		                                        </label>
		                                        <label class="selector-plantilla col-sm-2 col-xs-6">
			                                        	<?php  
			                                        		$ocultar = ""; $relat="";
			                                            	if ($id_plantilla == 25) {
			                                            		echo($existe);
			                                            		$ocultar = "hidden";
			                                            		$relat   = "relat";
			                                            	}
			                                            ?>
			                                        	<img src="images/publicitarios/25.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
			                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="25" value="100" required>  
			                                                                                     
			                                    </label>
	                                        <?php } ?>
	                                        <label class="selector-plantilla col-sm-2 col-xs-6">
	                                        	<?php  
	                                        			$ocultar = ""; $relat="";
		                                            	if ($id_plantilla == 22) {
		                                            		echo($existe);
		                                            		$ocultar = "hidden";
		                                            		$relat   = "relat";
		                                            	}
		                                            ?> 
	                                        	<img src="images/publicitarios/21.png" class="img-responsive center-block <?php echo($ocultar); ?>" alt="">
	                                            <input type="radio" name="selector-plantilla" class="<?php echo($relat); ?>" data-posicion="1" data-detalle="22" value="75" required> 
	                                                                                    
	                                        </label>
	                                        <?php //} ?>
	                                        <div class="pdleft col-xs-12"><input class="btn btn-default" type="submit" value="SIGUIENTE PASO"> </div>
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
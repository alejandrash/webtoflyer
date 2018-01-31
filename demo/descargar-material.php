<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if (!isset($niveluser)) {
    $user = $_SESSION['ESTADO'];
    $result_user=mysql_query("select * from usuarios WHERE email ='$user'");
    $row_user=mysql_fetch_array($result_user);
    $niveluser=$row_user['categoria'];
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
<link rel="stylesheet" href="css/datatables.min.css" type='text/css' />	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/simpleUpload.js"></script>
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
                <div class="botonera-acciones col-lg-2 col-md-12 col-xs-12">
                    <ul>
                        <?php 
                            if ($niveluser != 'operador') {
                        ?>
                        <li><a href="marquez-in.php">MATERIAL GRATUITO OFICIAL</a></li>
                        <li class="secundarias"><a href="marquez-in.php">CARGAR</a></li>
                        <li class="secundarias"><a href="#tablaMarcas">ADMINISTRAR</a></li>
                        <?php 
                                    }
                                ?>
                        <li class="active"><a href="descargar-material.php">DESCARGAR</a></li>
                        <li class="secundarias"><a href="descargar-material.php">GR&Aacute;FICA</a></li>
                        <li class="secundarias"><a href="descargar-material2.php">MULTIMEDIA</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Estadisticas start-->
                <div class="wrap-container col-lg-10 col-md-12 col-xs-12">
                    
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1 style="background:none; position:relative;">DESCARGA DE MATERIAL GRATUITO OFICIAL</h1>
                        <ul>
                            <li class="active"><a href="descargar-material.php">Gr&aacute;fica</a></li>
                            <li><a href="descargar-material2.php">Multimedia</a></li>
                        </ul>
                    </div>
                    <!-- Titular end-->
                    
                    <!-- Form start-->
                    <div class="content-form col-xs-12">
                        
                        <?php 
                            $result_pr=mysql_query("select * from material WHERE tipo='Grafica' ORDER BY Id DESC");
                            if ($row_pr=mysql_fetch_array($result_pr))
                            {
                        ?>
                        <h2>MATERIAL DE GR&Aacute;FICA</h2>
                        <!--START TABLA RESULTADOS-->
                        <table border="0" cellpadding="0" cellspacing="0" class="dataTable" id="tablaMarcas">
                                <thead>
                                <tr class="encabezado">
                                    <th width="30" style="width:60px; background:none!important; cursor:default!important;">Descargar</th>
                                    <th style="width:60px; background:none!important; cursor:default!important;">Miniatura</th>
                                    <th>T&iacute;tulo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                do {
                                    $foto = $row_pr['url'];
                                    $fototi = explode("/", $foto);
                                    $foto = explode(".", $foto);
                                    if (($foto[1]=='jpg')||($foto[1]=='jpeg')||($foto[1]=='gif')||($foto[1]=='png')) {
                                        $url = "<img title='".$fototi[1]."' src='intranet/".$row_pr['url']."' height='50' style='max-width:200px;'>";
                                    }
                                    else {
                                        $url = "<img title='".$fototi[1]."' src='images/nodisp.jpg' height='50' style='max-width:200px;'>";
                                    }
                                ?>
                                <tr class="<?php echo $stilo?>">
                                    <td><a class="descargar" href="intranet/<?php echo $row_pr['url']?>" title="Cick para descargar" download><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                    <td><?php echo $url; ?></td>
                                    <td><?php echo $row_pr['titulo']?></td>   
                                </tr>
                                <?php
                                    } while ($row_pr=mysql_fetch_array($result_pr));	
                                ?>
                                
                                </tbody>
                            </table>
                        <!--END TABLA RESULTADOS-->
                        <?php
                            }
                            else {
                                echo("<p class='col-xs-12 error text-center'><br><br>No hay material disponible.</p>");
                            }
                        ?>
                </div>
                <!-- Estadisticas ends-->
            </div>
		</div>
        
        <div id="idgpie" class="col-sm-offset-1 col-sm-10 col-xs-12 text-right">
            <img src="images/idg.png" class="img-responsive pull-right" alt="IDG Identidad Grafica">
            <p>Ideado y dise&ntilde;ado por IDG Identidad Gr&aacute;fica | &copy; Copyright | Todos los derechos reservados.</p>
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
<script type="text/javascript">
    function confirmDel() {
          var agree=confirm("¿Realmente quiere eliminar este/os material/es? ");
          if (agree) {
              document.forms['administrarpromo'].submit();
          }
          return false;
    }
    $(document).ready(function () {
        $("#tablaMarcas").dataTable( {
                responsive: true,
                "order": [[ 2, 'asc' ]]
        } );
        $('input[type=file]').change(function(){
            var nuevoNom = $('#fecha').val();
            var nom = $(this)[0].files[0].name;
                    nuevoNom = nuevoNom+nom;
                    $('#filename').html(nom);
                    $('#filenam').val(nuevoNom);
                    $('#fileori').val(nom);
            $('input[type=file]').attr('name', nuevoNom);
            $(this).simpleUpload("material_procesar.php", {

                start: function(file){
                    //upload started
                    $('#insertarmaterial input[type=submit]').attr('disabled','disabled');
                    $('#progress').html("");
                    $('#progressBar').width(0);
                },

                progress: function(progress){
                    //received progress
                    //$('#progress').html("<div class='percent'>" + Math.round(progress) + "%</div>");
                    $('#progressBar').width(progress + "%");
                    $('.percent').html("" + Math.round(progress) + "%");
                },

                success: function(data){
                    //upload successful
                    //$('#insertarmarca').submit();
                    //$('#progress').html("Success!<br>Data: " + JSON.stringify(data));
                    //$('#progress').html();
                    //console.log(data);
                    $('#insertarmaterial input[type=submit]').removeAttr("disabled");
                },

                error: function(error){
                    //upload failed
                    $('#progress').html("Error!<br>" + error.name + ": " + error.message);
                    console.log(data);
                }

            });

	   });        
        
        $( "#insertarmaterial" ).submit(function() {
            var estadoFoto = $('#filenam').val();
            if (estadoFoto == "") {
                alert("Debe agregar el archivo.");
                return false;
            }
            var estadoTit = $('#titulo').val();
            if (estadoTit == "") {
                alert("Debe agregar un titulo descriptivo al material.");
                return false;
            }
        });
    });

</script>
</body>
</html>
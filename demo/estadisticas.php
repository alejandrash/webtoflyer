<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$user = $_SESSION['ESTADO'];
$result_user=mysql_query("select * from usuarios WHERE usuario ='$user'");
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
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/chart.js"></script>
</head> 
<body>
<?php
   $mes_actual = date('F');
    if ($mes_actual=='January') { $mes_actual='Enero'; }
    if ($mes_actual=='February') { $mes_actual='Febrero'; }
    if ($mes_actual=='March') { $mes_actual='Marzo'; }
    if ($mes_actual=='April') { $mes_actual='Abril'; }
    if ($mes_actual=='May') { $mes_actual='Mayo'; }
    if ($mes_actual=='June') { $mes_actual='Junio'; }
    if ($mes_actual=='July') { $mes_actual='Julio'; }
    if ($mes_actual=='August') { $mes_actual='Agosto'; }
    if ($mes_actual=='September') { $mes_actual='Septiembre'; }
    
    //CONSULTAS GRAFICOS
    $marcas_mes = array();
    $apariciones_mes = array();
    $result_marcas_mes = mysql_query("SELECT nombre, count(nombre) AS apariciones from marcas, rating_productos WHERE rating_productos.id_marca=marcas.Id AND fecha > date_sub(NOW(), interval 1 month) group by nombre ORDER BY count(nombre) DESC LIMIT 5");
    while($row_marcas_mes = mysql_fetch_array($result_marcas_mes)){
        $marcas_mes[] = $row_marcas_mes['nombre'];
        $apariciones_mes[] = $row_marcas_mes['apariciones'];
    }
       
    $marcas_anio = array();
    $apariciones_anio = array();
    $result_marcas_anio = mysql_query("SELECT nombre, count(nombre) AS apariciones from marcas, rating_productos WHERE rating_productos.id_marca=marcas.Id AND fecha > date_sub(NOW(), interval 1 year) group by nombre ORDER BY count(nombre) DESC LIMIT 5");
    while($row_marcas_anio = mysql_fetch_array($result_marcas_anio)){
        $marcas_anio[] = $row_marcas_anio['nombre'];
        $apariciones_anio[] = $row_marcas_anio['apariciones'];
    }
    
    if (isset($_POST["select_prov"])) {
        $select_prov = $_POST["select_prov"]; 
    ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#titulo_marcaprov').addClass('active');
                $('#desp_marcaprov').slideDown();
                $("body").animate({
                         scrollTop: $("#titulo_marcaprov").offset().top
                }, 800);
            });
        </script>
    <?php
    }
    else { $select_prov = 'Buenos Aires'; }
    
    $marcas_prov = array();
    $apariciones_prov = array();
    $result_marcas_prov = mysql_query("SELECT nombre, count(*) AS apariciones from marcas, rating_productos WHERE rating_productos.id_marca=marcas.Id AND provincia='$select_prov' group by nombre order by count(*) desc LIMIT 5");
    while($row_marcas_prov = mysql_fetch_array($result_marcas_prov)){
        $marcas_prov[] = $row_marcas_prov['nombre'];
        $apariciones_prov[] = $row_marcas_prov['apariciones'];
    }
    
    $prod_mes = array();
    $aparicionesprod_mes = array();
    $result_prod_mes = mysql_query("SELECT titulo, count(titulo) AS apariciones from productos, rating_productos WHERE rating_productos.id_producto=productos.Id AND fecha > date_sub(NOW(), interval 1 month) group by titulo ORDER BY count(titulo) DESC LIMIT 5");
    while($row_prod_mes = mysql_fetch_array($result_prod_mes)){
        $prod_mes[] = $row_prod_mes['titulo'];
        $aparicionesprod_mes[] = $row_prod_mes['apariciones'];
    }
    
    $prod_anio = array();
    $aparicionesprod_anio = array();
    $result_prod_anio = mysql_query("SELECT titulo, count(titulo) AS apariciones from productos, rating_productos WHERE rating_productos.id_producto=productos.Id AND fecha > date_sub(NOW(), interval 1 year) group by titulo ORDER BY count(titulo) DESC LIMIT 5");
    while($row_prod_anio = mysql_fetch_array($result_prod_anio)){
        $prod_anio[] = $row_prod_anio['titulo'];
        $aparicionesprod_anio[] = $row_prod_anio['apariciones'];
    }
    
    if (isset($_POST["select_prov2"])) {
        $select_prov2 = $_POST["select_prov2"]; 
    ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#titulo_marcaprov2').addClass('active');
                $('#desp_marcaprov2').slideDown();
                $("body").animate({
                         scrollTop: $("#titulo_marcaprov2").offset().top
                }, 800);
            });
        </script>
    <?php
    }
    else { $select_prov2 = 'Buenos Aires'; }
    
    $prod_prov = array();
    $aparicionesprod_prov = array();
    $result_prod_prov = mysql_query("SELECT titulo, count(*) AS apariciones from productos, rating_productos WHERE rating_productos.id_producto=productos.Id AND provincia='$select_prov2' group by titulo order by count(*) desc LIMIT 5");
    while($row_prod_prov = mysql_fetch_array($result_prod_prov)){
        $prod_prov[] = $row_prod_prov['titulo'];
        $aparicionesprod_prov[] = $row_prod_prov['apariciones'];
    }
    
    $usuariosmas = array();
    $apariciones_usuariosmas = array();
    $result_usuariosmas = mysql_query("SELECT sucursal, count(*) AS apariciones from usuarios, sesiones WHERE sesiones.usuario=usuarios.email AND usuarios.categoria='operador' group by sucursal ORDER BY count(*) DESC");
    while($row_usuariosmas = mysql_fetch_array($result_usuariosmas)){
        $usuariosmas[] = $row_usuariosmas['sucursal'];
        $apariciones_usuariosmas[] = $row_usuariosmas['apariciones'];
    }
    
?>
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
                        <p class="col-xs-12"><img src="images/titulos/estadisticas.png" class="img-responsive" alt="">Estadísticas</p>
            </div>
            <div class="wrapper-prod-general">
                <!-- Estadisticas start-->
                <div class="wrap-container col-xs-12">                    
                    <div id="wrap-estadisticas" class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-xs-12 lista-preguntas">
                                <h2>Marcas con m&aacute;s apariciones durante el &uacute;ltimo mes</h2>
                                <div class="desplegable">
                                    <canvas id="chart-area1" width="300" height="100" />
                                </div>
                                <h2>Marcas con m&aacute;s apariciones en el &uacute;ltimo a&ntilde;o</h2>
                                <div class="desplegable">
                                    <canvas id="chart-area2" width="300" height="100" />
                                </div>
                                <h2 id="titulo_marcaprov">Marcas con m&aacute;s apariciones por Provincia</h2>
                                <div class="desplegable" id="desp_marcaprov">
                                    <div class="row">
                                        <h3 class="col-xs-6">Provincia: <?php echo($select_prov); ?></h3>
                                        <form class="col-xs-6" action="estadisticas.php" method="post">
                                            <div class="form-group">
                                                <select  class="form-control" id="select_prov" name="select_prov">
                                                    <option value="">Seleccione una provincia</option>
                                                    <?php
                                                        $sel_prov = mysql_query("SELECT provincia from rating_productos group by provincia ORDER BY provincia ASC");
                                                        while($row_prov = mysql_fetch_array($sel_prov)){ ?>
                                                            <option value='<?php echo ($row_prov['provincia']); ?>'><?php echo ($row_prov['provincia']); ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <canvas id="chart-area3" width="300" height="100" />
                                </div>
                                <h2>Productos con m&aacute;s apariciones durante el &uacute;ltimo mes</h2>
                                <div class="desplegable">
                                    <canvas id="chart-area4" width="300" height="100" />
                                </div>
                                <h2>Productos con m&aacute;s apariciones en el &uacute;ltimo a&ntilde;o</h2>
                                <div class="desplegable">
                                    <canvas id="chart-area5" width="300" height="100" />
                                </div>
                                <h2 id="titulo_marcaprov2">Productos con m&aacute;s apariciones por Provincia</h2>
                                <div class="desplegable" id="desp_marcaprov2">
                                    <div class="row">
                                        <h3 class="col-xs-6">Provincia: <?php echo($select_prov2); ?></h3>
                                        <form class="col-xs-6" action="estadisticas.php" method="post">
                                            <div class="form-group">
                                                <select  class="form-control" id="select_prov2" name="select_prov2">
                                                    <option value="">Seleccione una provincia</option>
                                                    <?php
                                                        $sel_prov2 = mysql_query("SELECT provincia from rating_productos group by provincia ORDER BY provincia ASC");
                                                        while($row_prov2 = mysql_fetch_array($sel_prov2)){ ?>
                                                            <option value='<?php echo ($row_prov2['provincia']); ?>'><?php echo ($row_prov2['provincia']); ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <canvas id="chart-area6" width="300" height="100" />
                                </div>
                                <h2>Usuarios m&aacute;s activos</h2>
                                <div class="desplegable">
                                    <canvas id="chart-area7" width="300" height="600" />
                                </div>
                                
                                <?php
                                    if (isset($_POST["select_usuario"])) {
                                        $select_usuario = $_POST["select_usuario"];
                                        $select_suc = '';
                                ?>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#titulo_usuario').addClass('active');
                                                $('#desp_usuario').slideDown();
                                                $("body").animate({
                                                         scrollTop: $("#titulo_usuario").offset().top
                                                }, 800);
                                            });
                                        </script>
                                <?php
                                    }
                                    else { 
                                        $sel_usuario1 = mysql_query("SELECT sucursal, rating_productos.usuario from usuarios, rating_productos where rating_productos.usuario=usuarios.email LIMIT 1");
                                        $row_usuario1 = mysql_fetch_array($sel_usuario1);
                                        $select_usuario = $row_usuario1['usuario']; 
                                        $select_suc = $row_usuario1['sucursal']; 
                                    }
                                    $usuariosel = '';
                                    $sucsel = '';
                                    $select_suc = '';
                                    $apariciones_usuariosel = array();
                                    $mes_usuariosel = array();
                                    $result_usuariosel = mysql_query("SELECT sucursal, sesiones.usuario, fecha_hora, COUNT(*) AS apariciones, MONTH(fecha_hora) AS mes, YEAR(fecha_hora) AS anio from sesiones INNER JOIN usuarios ON usuarios.email=sesiones.usuario WHERE sesiones.usuario='$select_usuario' AND fecha_hora > date_sub(NOW(), interval 1 year) GROUP BY MONTH(fecha_hora)");
                                    while($row_usuariosel = mysql_fetch_array($result_usuariosel)){
                                        $usuariosel = $row_usuariosel['usuario'];
                                        $sucsel = $row_usuariosel['sucursal'];
                                        $select_suc = $row_usuariosel['sucursal'];
                                        $apariciones_usuariosel[] = $row_usuariosel['apariciones'];
                                        $mes_usuariosel[] = $row_usuariosel['mes'];
                                    }
                                ?>
                                <h2 id="titulo_usuario">Usuarios que dise&ntilde;aron su flyer (terminado o no)</h2>
                                <div class="desplegable" id="desp_usuario">
                                    <div class="row">
                                        <h3 class="col-xs-6">Usuario: <?php echo($select_suc); ?></h3>
                                        <form class="col-xs-6" action="estadisticas.php" method="post">
                                            <div class="form-group">
                                                <select  class="form-control" id="select_usuario" name="select_usuario">
                                                    <option value="">Seleccione un usuario</option>
                                                    <?php
                                                        $sel_usuario = mysql_query("SELECT rating_productos.usuario, sucursal, rating_productos.usuario from usuarios, rating_productos where rating_productos.usuario=usuarios.email group by sucursal ORDER BY sucursal ASC");
                                                        while($row_usuario = mysql_fetch_array($sel_usuario)){ ?>
                                                            <option value='<?php echo ($row_usuario['usuario']); ?>'><?php echo ($row_usuario['sucursal']); ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <canvas id="chart-area8" width="300" height="100" />
                                </div>
                            </div>
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
    $(document).ready(function () {
        $(".lista-preguntas h2").click(function() { 
            var estado = $(this).next('.desplegable').css('display');
            if (estado == 'none'){
                $('.lista-preguntas h2').removeClass('active');
                $('.desplegable').slideUp();
                $(this).next('.desplegable').slideDown();
                $(this).addClass('active');
            }
            if (estado == 'block'){
                $('.lista-preguntas h2').removeClass('active');
                $('.desplegable').slideUp();
            }
        }); 
        
        $("#select_prov, #select_prov, #select_usuario").change(function() { 
            $(this).parent().parent('form').submit();
        }); 
        
        
        //BAR CHART (MARCA + PUBLICADA x ULTIMO MES)
        var ctx = document.getElementById("chart-area1").getContext("2d");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                label: '# of Votes',
                labels: <?php echo(json_encode($marcas_mes)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($apariciones_mes)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        //BAR CHART (MARCA + PUBLICADA x ULTIMO AÑO)
        var ctx2 = document.getElementById("chart-area2").getContext("2d");
        var myLineChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                label: '# of Votes',
                labels: <?php echo(json_encode($marcas_anio)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($apariciones_anio)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        //BAR CHART (MARCA + PUBLICADA x PROVINCIA)
        var ctx3 = document.getElementById("chart-area3").getContext("2d");
        var myLineChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                label: 'N° Apariciones',
                labels: <?php echo(json_encode($marcas_prov)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($apariciones_prov)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        //BAR CHART (PROD + PUBLICADO x ULTIMO MES)
        var ctx4 = document.getElementById("chart-area4").getContext("2d");
        var myLineChart = new Chart(ctx4, {
            type: 'horizontalBar',
            data: {
                label: '# of Votes',
                labels: <?php echo(json_encode($prod_mes)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($aparicionesprod_mes)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        //BAR CHART (PROD + PUBLICADO x ULTIMO AÑO)
        var ctx5 = document.getElementById("chart-area5").getContext("2d");
        var myLineChart = new Chart(ctx5, {
            type: 'horizontalBar',
            data: {
                label: '# of Votes',
                labels: <?php echo(json_encode($prod_anio)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($aparicionesprod_anio)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        //BAR CHART (PROD + PUBLICADO x PROVINCIA)
        var ctx6 = document.getElementById("chart-area6").getContext("2d");
        var myLineChart = new Chart(ctx6, {
            type: 'horizontalBar',
            data: {
                label: 'N° Apariciones',
                labels: <?php echo(json_encode($prod_prov)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($aparicionesprod_prov)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        //BAR CHART (USUARIOS + ACTIVOS)
        var ctx7 = document.getElementById("chart-area7").getContext("2d");
        var myLineChart = new Chart(ctx7, {
            type: 'horizontalBar',
            data: {
                label: 'N° Apariciones',
                labels: <?php echo(json_encode($usuariosmas)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($apariciones_usuariosmas)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                        ticks: {
                            beginAtZero:true
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        
        //BAR CHART (flyers x usuario)
        var ctx8 = document.getElementById("chart-area8").getContext("2d");
        var myLineChart = new Chart(ctx8, {
            type: 'line',
            data: {
                label: 'N° Apariciones',
                labels: <?php echo(json_encode($mes_usuariosel)); ?>,
                datasets : [{
                    label: 'N° Apariciones',
                    fill: false,
                    borderColor: "#1c1475",
                    backgroundColor: "rgba(28, 20, 117, 0.5)",
                    pointBorderColor: "#1c1475",
                    pointBackgroundColor: "#1c1475",
                    pointBorderWidth: 5,
                    data : <?php echo(json_encode($apariciones_usuariosel)); ?>,
                }]
            },
            options: {
              legend: {
                    display:false
              },
              title:{
                display:false
              },
                responsive: true,
                scales: {  
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false,
                            color: "#101010"
                        },
                        scaleLabel: {
                            show: true
                        }, 
                        ticks: {
                            beginAtZero:true
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    });

</script>
</body>
</html>
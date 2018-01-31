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
            <div class="col-xs-12 titulogris">
                        <p class="col-xs-12"><img src="images/titulos/preguntasfrecuentes.png" class="img-responsive" alt="">Preguntas Frecuentes</p>
            </div>
            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start-->
                <div class="botonera-acciones col-lg-2 col-md-12 col-xs-12">
                    <ul>
                        <li class="active"><a href="tutoriales.php">PREGUNTAS FRECUENTES</a></li>
                        <li><a href="preguntas.php">TUTORIALES</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-container col-lg-10 col-md-12 col-xs-12">>
                        <div id="wrap-estadisticas" class="col-lg-8 col-md-12" style="padding-top:0;">
                            <div class="row">
                                <div class="col-xs-12 lista-preguntas">
                                    <h2>&iquest;Qu&eacute; es Web To Flyer?</h2>
                                    <div class="desplegable">
                                        Web To Flyer es una plataforma creada por IDG pensando en favorecer las ventas de sus socios. Ahora tendr&aacute;s la posibilidad de publicitar tus productos a trav&eacute;s de flyers totalmente personalizados. &iquest;C&oacute;mo funciona? Simple… <strong>Solo en 3 pasos.</strong> Te registr&aacute;s, eleg&iacute;s los productos que quer&eacute;s vender, y la cantidad a imprimir. Listo!. En unos d&iacute;as los flyers estar&aacute;n en tu local.
                                    </div>
                                    <h2>&iquest;Qu&eacute; es la Intranet?</h2>
                                    <div class="desplegable">
                                        <a href="marquez-in.php" title="Click para entrar a Intranet">Intranet</a> es la INTRANET de Tu Marca. ¿C&oacute;mo pod&eacute;s ingresar? F&aacute;cil, haciendo click en el bot&oacute;n de <a href="marquez-in.php" title="Click para entrar a Intranet">Intranet</a> que se encuentra en el inicio de la p&aacute;gina. All&iacute; podes mantenerte al tanto de todas las novedades concernientes al grupo.  Adem&aacute;s podes encontrar informaci&oacute;n, datos y presupuestos de los proveedores. Y no solo eso, sino que tenes la posibilidad de descargar material oficial de Tu Marca  y de otras marcas para poder utilizarlo en tu local. Gracias a la Intranet logramos unificar la imagen de nuestro grupo y crear un nexo entre casa central y sucursales.
                                    </div>
                                     <h2>&iquest;C&oacute;mo sacar una foto a un producto?</h2>
                                    <div class="desplegable">
                                        Podes fotografiar un producto que tengas en tu local y colocarlo en tu flyer. Haciendo click <a href="preguntas.php" title="Click para ver el video">aqu&iacute;</a> veras un video paso a paso de c&oacute;mo sacar la foto del producto de la manera m&aacute;s pr&aacute;ctica y f&aacute;cil.
                                    </div>
                                    <h2>&iquest;C&oacute;mo comenzar a diseñar una revista?</h2>
                                    <div class="desplegable">
                                        Ingresá en la sección DISEÑAR FLYER y elegí el formato que querés (por ejemplo: Revista de 8 páginas). Una vez hecho esto necesitas agregar tu primer productoen la revista, para esto deberáshacer click en cualquiera de los módulos que dicen “Haz click para agregar un producto”. La página te dirigirá a la base de productos para que puedas elegir el que querés publicar. Los productos están ordenados por categorías para que los puedas encontrar fácilmente. Además contás con un buscador por nombre, marca o modelo. Una vez seleccionado el producto, éste se colocará automáticamente en la plantilla de la revista. Debés continuar agregando productos hasta completar todos los módulos. Para ver un video paso a paso, hacé click <a href="preguntas.php" title="Click para ver el video">aquí</a>.
                                    </div>
                                    <h2>&iquest;C&oacute;mo ponerle precio a un producto?</h2>
                                    <div class="desplegable">
                                        Una vez que hayas colocado un producto en el diseño de tu revistadebés colocarle el precio. Según el módulo en el que coloques el producto, tendrás la posibilidad de colocarle precio al contado o precio financiado. <br>
                                        Si elegís colocar un precio <strong>al contado</strong>, debes posicionar el mouse sobre la pastilla verde que contiene el signo $ y colocar los números correspondientes al precio que querés publicar.
                                        <br>Si elegís colocar un precio <strong>con financiación</strong>, debes posicionar el mouse sobre la pastilla verde que contiene el signo $ y colocar los números correspondientes al precio de CONTADO. Luego apretá el botón verde que dice “click para agregar una financiación”. Una vez hecho esto debes seleccionar la TARJETA, el BANCO y la CANTIDAD DE CUOTAS. El precio final de las cuotas se calcula automáticamente, lo verás en la pastilla de color celeste. ¡Y  listo! Si querés podes modificar el precio de contado y se cambiaran los valores de las cuotas y CFT.
                                    </div>
                                    <h2>El producto que quiero no está en la base de datos</h2>
                                    <div class="desplegable">
                                        Si el producto que querés colocar en tu revista no está en la base de datos, podes agregarlo fácilmente. Si estas diseñando apretá GUARDAR para no perder los avances. En el menú de la izquierda verás un botón que dice  “carga de productos”, haciendo click allí, te encontrarás con un formulario para completar con las especificaciones del producto. Elegís la categoría, escribís el modelo, marca, origen  y descripción. Tendrás que cargar una foto del producto, es importante que la imagen tenga buena resolución y fondo blanco. Lo último que queda por hacer apretar el botón insertar ¡y listo! Tu producto ya está cargado y habilitado para usarlo en tu revista.
                                    </div>
                                    <h2>&iquest;C&oacute;mo hago para poner un crédito personal</h2>
                                    <div class="desplegable">
                                        En el menú principal ingresá a la sección <strong>CFT Y TEA</strong>. Luego, en el botón <strong>CREDITO PERSONAL</strong>. Allí podés cargar los planes que ofrece su sucursal. Lo primero que debes hacer es colocarle un título al plan de crédito personal, por ejemplo: Plan 6 cuotas. Luego debes seleccionar del desplegable la cantidad de cuotas que incluye este plan. Ahora escribí el porcentaje de TEA y CFT. Por ultimo debes calcular el COEFICIENTE correspondiente para realizar el cálculo de las cuotas de tu plan. Apretá el botón aceptar. Con estos datos cargados podes ir a diseñar tu revista y colocar este plan de financiación en los productos que te lo permitan. Sólo vos podrás visualizar este plan, no lo verán los demás socios.
                                    </div>
                                    <h2>&iquest;Puedo guardar los avances del diseño?</h2>
                                    <div class="desplegable">
                                        El diseño se guardará una vez que oprimas el botón “guardar”. Si no oprimís este botón y salís del navegador o cerras sesión perderás lo avanzado hasta ahora. Si guardas tu diseño, cuando vuelvas a iniciar sesión deberás elegir si quieras continuar con el diseño que estabas realizando o si deseás comenzar uno nuevo.
                                    </div>
                                    <h2>&iquest;Puedo colocar una promoción personalizada?</h2>
                                    <div class="desplegable">
                                        Sí. En el menú que está a la izquierda de la pantalla, verás una opción que dice “Solicitar banner”. Allí podrás solicitar Promociones personalizadas según tus necesidades que serán colocadas en la web para que puedas utilizarla en tu diseño. Sólo vos visualizarás este banner.
                                    </div>
                                    <h2>&iquest;Qué legales tengo que agregar en la revista?</h2>
                                    <div class="desplegable">
                                        Los legales son una parte importante de la revista. Hay un Legal que es obligatorio que indica las bases y condiciones básicas. En ese legal deberás colocar la vigencia que quieras que tenga tu revista, es decir de qué fecha a qué fecha serán válidas las promociones. Los legales de las promociones bancarias se agregarás automáticamente según las hayas utilizado.
                                    </div>
                                    <h2>Quisiera agregar otra sucursal &iquest;Qué hago?</h2>
                                    <div class="desplegable">
                                        Si la sucursal que necesitás no aparece en el listado, comunícate con nosotros al (011) 4871.8184 ó escribirnos a través del chat online para que la agreguemos luego de chequear la información con Casa Central.
                                    </div>
                                    
                                    <h2>No encuentro la respuesta a mi pregunta &iquest;Qu&eacute; hago?</h2>
                                    <div class="desplegable">
                                        En caso de que tengas alguna duda podes comunicarte telefónicamente al (011) 4871.8184 ó escribirnos a través del chat online donde te brindaremos asesoramiento en tiempo real de Lunes a Viernes de 9 a 17hs. Si preferís que nos comuniquemos con vos dejanos tu nombre y tu teléfono, y lo haremos a la brevedad. 
                                    </div>
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
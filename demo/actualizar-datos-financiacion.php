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
<link href="css/style.css?" rel='stylesheet' type='text/css' />
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
        if (tecla > 31 && (tecla < 48 || tecla > 57)) {
            if (tecla == 44 ) {
                return true;
            }
            else {
                return false;
            }
        }
    }
    
    function confirmDel() {
          var agree=confirm("¿Realmente quiere eliminar esta/s financiacion/es? ");
          if (agree) {
              document.forms['administrarmarca'].submit();
          }
          return false;
    }
    
    $(document).ready(function () {
         $("#tea, #cft").change(function() {       
                var getVal = $(this).val();
                if ((getVal !="")|| (getVal !=0)) {
                    getVal = getVal.replace(',','.');
                    var nuevoVal = parseFloat(getVal).toFixed(2);
                    nuevoVal = nuevoVal.replace('.',',');
                    $(this).val(nuevoVal);
                    $(this).attr('value', nuevoVal);
                }
                else {
                   $(this).val('0,00');
                }
        });
        $("#coef").change(function() {       
                var getVal = $(this).val();
                if ((getVal !="")|| (getVal !=0)) {
                    getVal = getVal.replace(',','.');
                    var nuevoVal = parseFloat(getVal).toFixed(4);
                    nuevoVal = nuevoVal.replace('.',',');
                    $(this).val(nuevoVal);
                    $(this).attr('value', nuevoVal);
                }
                else {
                   $(this).val('0');
                }
        });
        
        $("#cantidad_cuotas").change(function() {
            var tarjetaVal = $("#tarjeta").val();
            var bancoVal = $("#banco").val();
            var cuotasVal = $(this).val();
            if ((tarjetaVal != '') && (bancoVal != '')) {
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
                                var tea = partes[0];
                                var cft = partes[1];
                                var coef = partes[2];
                                $("#tea").val(tea);
                                $("#cft").val(cft);
                                $("#coef").val(coef);
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
        
        $("#form-actualizar").submit(function( event ) {
              var tea = $("#tea").val();
              var cft = $("#cft").val();
              var coef = $("#coef").val();
              if (coef == '0') {
                  alert('Completá todos los datos por favor.');
                  event.preventDefault();
              }
              else {
                  $(this).submit();
              }
        });
    });
</script>
</head> 
<body>
    <div id="datacontainer"></div>
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
                        <li><a href="datos-financiacion.php">CONSULTAR CFT y TEA</a></li>
                        <li class="active"><a href="actualizar-datos-financiacion.php">ACTUALIZAR DATOS</a></li>
                        <li><a href="credito-personal.php">CR&Eacute;DITO PERSONAL</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-container col-lg-10 col-md-9 col-sm-9 col-xs-12">
                        <div id="wrap-financiacion" class="col-xs-12">
                            <div class="row">
                                <h1 class="hidden">Datos de Financiaci&oacute;n</h1>
                                <div class="col-xs-12">
                                    <h2 class="titulo-pico">Actualizar CFT - TEA - COEFICIENTE</h2>
                                    <?php if (isset($_GET["msg_error"])) { ?>
                                       <p class="error"><?php echo($_GET["msg_error"])?></p>
                                    <?php } ?>
                                    <?php if (isset($_GET["msg_ok"])) { ?>
                                        <p class="ok"><?php echo($_GET["msg_ok"])?></p>
                                    <?php } ?>
                                    <form id="form-actualizar" action="actualizar_financiacion.php" method="post">
                                        <div class="pdleft col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <label for="tarjeta">Tarjeta</label>
                                                    <select class="form-control" id="tarjeta" name="tarjeta" required>
                                                        <option value="">Seleccion&aacute; una Tarjeta</option>
                                                        <?php
                                                             $result_tarjetas=mysql_query("select * from tarjetas ORDER BY nombre ASC");
                                                            if ($row_tarjetas=mysql_fetch_array($result_tarjetas)) {
                                                                do {
                                                        ?>
                                                        <option value="<?php echo($row_tarjetas['Id']); ?>"><?php echo($row_tarjetas['nombre']); ?></option>
                                                        <?php
                                                                } while ($row_tarjetas=mysql_fetch_array($result_tarjetas));	
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12">
                                                    <label for="banco">Banco</label>
                                                    <select class="form-control" id="banco" name="banco" required>
                                                        <option value="">Seleccion&aacute; un Banco</option>
                                                        <?php
                                                             $result_bancos=mysql_query("select * from bancos ORDER BY nombre ASC");
                                                            if ($row_bancos=mysql_fetch_array($result_bancos)) {
                                                                do {
                                                        ?>
                                                        <option value="<?php echo($row_bancos['Id']); ?>"><?php echo($row_bancos['nombre']); ?></option>
                                                        <?php
                                                                } while ($row_bancos=mysql_fetch_array($result_bancos));	
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12">
                                                    <label for="banco">Cantidad de cuotas</label>
                                                    <select class="form-control" id="cantidad_cuotas" name="cantidad_cuotas" required>
                                                        <option value="">Seleccion&aacute; la cantidad de Cuotas</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="33">33</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                        <option value="41">41</option>
                                                        <option value="42">42</option>
                                                        <option value="43">43</option>
                                                        <option value="44">44</option>
                                                        <option value="45">45</option>
                                                        <option value="46">46</option>
                                                        <option value="47">47</option>
                                                        <option value="48">48</option>
                                                        <option value="49">49</option>
                                                        <option value="50">50</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-12">
                                                        <label for="tea">TEA %</label>
                                                        <input class="form-control" type="text" name="tea" id="tea" placeholder="Escrib&iacute; la Tasa Efectiva Anual" value="0,00" onkeypress="return Onlyprices(event)" step=",01" required>
                                                </div>
                                                <div class="col-xs-12">
                                                        <label for="cft">CFT %</label>
                                                        <input class="form-control" type="text" name="cft" id="cft" value="0,00" placeholder="Escrib&iacute; el Costo Financiero Total" step=",01" onkeypress="return Onlynumbers(event)">
                                                </div>
                                                <div class="col-xs-12">
                                                        <label for="coef">COEFICIENTE</label>
                                                        <input class="form-control" type="text" name="coef" id="coef" value="0" placeholder="Escrib&iacute; el Coeficiente" step=",0001" onkeypress="return Onlynumbers(event)">
                                                </div>
                                                <div class="col-xs-12">
                                                        <label for="coef">LEGALES</label>
                                                        <textarea class="form-control" id="legales" name="legales" maxlength="750" required></textarea>
                                                </div>
                                                <p class="col-sm-6 col-xs-12 relative"><input type="submit" id="continuar" class="continuar pull-left" value="ACEPTAR"><span class="icono"><i class="fa fa-check-square-o" aria-hidden="true"></i></span></p>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-xs-12"></div>
                                    <h2 class="titulo-pico" style="position:relative; top:80px;">Eliminar CFT - TEA - COEFICIENTE</h2>
                                    <p class="pdleft negro small" style="position:relative; top:80px;">Desde aqu&iacute; pod&eacute;s editar o eliminar los datos de financiaci&oacute;n.</p>
                                    <?php 
                                        $result_pr=mysql_query("select * from datos_financiacion ORDER BY Id DESC");
                                        if ($row_pr=mysql_fetch_array($result_pr))
                                        {
                                    ?>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#tablaResultados").dataTable( {
                                                responsive: true,
                                                "order": [[ 1, 'asc' ]]
                                            });
                                        });
                                    </script>
                                    <!--START TABLA RESULTADOS-->
                                    <form action="eliminar-financiacion_procesar.php" method="post" id="administrarmarca" name="administrarmarca">
                                        <table border="0" cellpadding="0" cellspacing="0" class="dataTable" id="tablaResultados" style="color:#1c1475!important;">
                                            <thead>
                                            <tr class="encabezado">
                                                <th width="30" style="width:60px; background-image:none!important; cursor:default!important;">Eliminar</th>
                                                <th>Banco</th>
                                                <th>Tarjeta</th>
                                                <th>Cuotas</th>
                                                <th>TEA %</th>
                                                <th>CFT %</th>
                                                <th>Coeficiente</th>
                                                <th>Legales</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                    do {
                                                        $idbanco = $row_pr['id_banco'];
                                                        $result_logobanco=mysql_query("select * from bancos WHERE Id='$idbanco'");
                                                        $row_logobanco=mysql_fetch_array($result_logobanco);
                                                        $logobanco = $row_logobanco['logo'];
                                                        $nombrebanco = $row_logobanco['nombre'];
                                                        
                                                        $idtarjeta = $row_pr['id_tarjeta'];
                                                        $result_logotarjeta=mysql_query("select * from tarjetas WHERE Id='$idtarjeta'");
                                                        $row_logotarjeta=mysql_fetch_array($result_logotarjeta);
                                                        $logotarjeta = $row_logotarjeta['logo'];
                                                        $nombretarjeta = $row_logotarjeta['nombre'];
                                            ?>
                                            <tr>
                                                <td><input name="id_pub[]" type="checkbox" class="chek" value="<?php echo $row_pr['Id']?>" title="Eliminar"></td>
                                                <td><img src="images/<?php echo $logobanco; ?>" class="img-responsive" alt="<?php echo $nombrebanco; ?>"></td>
                                                <td><img src="images/<?php echo $logotarjeta; ?>" class="img-responsive" alt="<?php echo $nombretarjeta; ?>"></td>
                                                <td><?php echo $row_pr['cuotas']?></td>
                                                <td><?php echo $row_pr['tea']?></td>
                                                <td><?php echo $row_pr['cft']?></td>
                                                <td><?php echo $row_pr['coef']?></td>
                                                <?php
                                                    $legales=$row_pr['legales'];
                                                    $legales=str_replace("*","'",$legales);
                                                    $legales=str_replace('&quot;','"',$legales);
                                                    $legales=str_replace('quot;','',$legales);
                                                ?>
                                                <td style="font-size:9px;"><?php echo $legales; ?></td>
                                            </tr>
                                            <?php
                                                } while ($row_pr=mysql_fetch_array($result_pr));	
                                            ?>

                                            </tbody>
                                            <tr class="pie">
                                                <td colspan="6">
                                                    <input name="volver" type="hidden" id="volver" value="<?php echo $_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"]?>">
                                                    <a class="continuar pull-left" style="text-align:left;" href="#" onclick="confirmDel(); return false;"><i class="fa fa-close" aria-hidden="true"></i> ELIMINAR</a>
                                                </td>
                                            </tr> 
                                        </table>
                                    </form>
                                    <!--END TABLA RESULTADOS-->
                                    <?php
                                        }
                                        else {
                                            echo("<p class='col-xs-12 error text-center'><br><br>No hay datos de financiación disponibles.</p>");
                                        }
                                    ?>
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
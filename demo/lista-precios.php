<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
?>
<?php 
$usuario=$_SESSION['ESTADO'];
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
<link href="css/wtf.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    function Onlynumbers(e)
    {
        return false;
    }
    $(document).ready(function () { 
        var cantVal = '';
        var dataVal = '';
        $('#select_cantidad').change(function(){
            dataVal = $(this).find('option:selected').attr('data-final');
            cantVal = $(this).val();
            dataUniVal = $(this).find('option:selected').attr('data-unitario');
            $('#total1').text(dataVal);
            $('#preunitario span').text(dataUniVal);
            $('#preunitario').css('display', 'block');
            if (cantVal == '') {
                $('#total1').text("0,00");
                alert("Selecciona una cantidad de revistas para saber el precio final");
            }
            return false;
        });
        $('#select_cantidad2').change(function(){
            dataVal = $(this).find('option:selected').attr('data-final');
            cantVal = $(this).val();
            dataUniVal = $(this).find('option:selected').attr('data-unitario');
            $('#total2').text(dataVal);
            $('#preunitario2 span').text(dataUniVal);
            $('#preunitario2').css('display', 'block');
            if (cantVal == '') {
                $('#total2').text("0,00");
                alert("Selecciona una cantidad de revistas para saber el precio final");
            }
            return false;
        });
        $('#select_cantidad3').change(function(){
            dataVal = $(this).find('option:selected').attr('data-final');
            cantVal = $(this).val();
            dataUniVal = $(this).find('option:selected').attr('data-unitario');
            $('#total3').text(dataVal);
            $('#preunitario3 span').text(dataUniVal);
            $('#preunitario3').css('display', 'block');
            if (cantVal == '') {
                $('#total3').text("0,00");
                alert("Selecciona una cantidad de flyers para saber el precio final");
            }
            return false;
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
                <p class="col-xs-12"><img src="images/titulos/preciosvigentes.png" class="img-responsive" alt="">Lista de Precios</p>
            </div>
			<!-- Diseniar start-->
            <div class="wrap-diseniar col-xs-12" id="lista-precios">
                <!-- PAGINA ENVIADO start-->
                <div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <!--START LATERAL-->
                        
                            <div class="lateral col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-right" style="padding-top:40px; max-width:none;">
                                <div class="row">
                                    <div class="col-xs-12 bloque-precio">
                                        <div class="col-xs-2">
                                            <div class="row"><img src="images/icono_print.png" class="img-responsive pull-right" alt=""></div>
                                        </div>
                                        <?php 
                                        $result_cant=mysql_query("SELECT SUM(cant_folletos) AS cantidad FROM ordenes;");
                                        if ($row_cant=mysql_fetch_array($result_cant))
                                        {
                                           $cantidad = $row_cant['cantidad'];
                                        }
                                        else {
                                            $cantidad = 150000;
                                        }
                                        ?>
                                        <div class="col-xs-10">
                                            <p>REVISTAS IMPRESAS POR TODOS LOS SOCIOS HASTA AHORA:</p>
                                            <p id="cantidad"><?php echo($cantidad);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!--END LATERAL-->
                        
                        <div id="wrap-enviado" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                            <p>En esta secci&oacute;n podr&aacute;s ver la lista de precios actualizada y la cantidad de folletos impresos hasta ahora.</p>
                            
                            <?php 

                                    /** * Verifica que una fecha esté dentro del rango de fechas establecidas * @param $start_date fecha de inicio * @param $end_date fecha final * @param $evaluame fecha a comparar * @return true si esta en el rango, false si no lo está */ function check_in_range($start_date, $end_date, $evaluame) { $start_ts = strtotime($start_date); $end_ts = strtotime($end_date); $user_ts = strtotime($evaluame); return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
                                        }

                                    $result_pr=mysql_query("select * from precios WHERE tipo=8");
                                    if ($row_pr=mysql_fetch_array($result_pr))
                                    {
                                        $today = date("Y-m-d");
                                        
                                        $originalDate = $row_pr['fecha_inicio'];
                                        $newDate_inicio = date("d/m/Y", strtotime($originalDate));
                                        $originalDate2 = $row_pr['fecha_fin'];
                                        $newDate_fin = date("d/m/Y", strtotime($originalDate2));
                                    }
                                ?>
                            
                            <div class="periodo text-center">
                                <p><strong>PER&Iacute;ODO ACTUAL DE DISE&Ntilde;O: </strong>Desde el <span class="ocre"><?php echo($newDate_inicio);?></span> hasta el <span class="ocre"><?php echo($newDate_fin);?></span> a las 23:59pm.</p>
                            </div>

                            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                                <div class="row">
                                    <p class="titulo-revista">Revista 8 P&aacute;ginas</p>
                                    <div class="col-sm-5 col-xs-12">
                                        <div class="row">
                                            <img src="images/revista.png" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-12 textos-revista">
                                        <p>INFORMACI&Oacute;N T&Eacute;CNICA:</p>
                                        <ul>
                                            <li>PAPEL OBRA 70gr</li>
                                            <li>FULL COLOR</li>
                                            <li>ABROCHADO</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12">
                                <div class="row">
                                    <table class="tabla-precios">
                                        <tr>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO UNITARIO</th>
                                            <th>PRECIO TOTAL</th>
                                        </tr>
                                        <tr>
                                            <td style="border:0;">
                                                <select class="form-control" name="select_cantidad" id="select_cantidad">
                                                    <option value="" data-final="" data-unitario="">Seleccion&aacute;...</option> 
                                                    <?php
                                                        $result_precios1=mysql_query("select * from tabla_precios WHERE tipo='8' order by cantidad ASC");
                                                        if ($row_precios1=mysql_fetch_array($result_precios1)) {
                                                            do {
                                                                $preciouni = $row_precios1['costo_unitario'];
                                                                $cantidad = $row_precios1['cantidad'];
                                                                $preciotot = ($preciouni * $cantidad);
                                                                $preciotot = number_format($preciotot, 2, ',', '.');
                                                                $preciouni = number_format($preciouni, 4, ',', '.');
                                                    ?>
                                                                <option value="<?php echo($cantidad); ?>" data-final="<?php echo($preciotot); ?>" data-unitario="<?php echo($preciouni); ?>"><?php echo($cantidad); ?></option>
                                                    <?php
                                                            } while ($row_precios1=mysql_fetch_array($result_precios1));
                                                        }

                                                        else {
                                                            echo('<option value="" data-final="" data-unitario="">No hay precios disponibles</option>');
                                                        }

                                                    ?>  
                                                </select>
                                                        
                                             </td>
                                            <td style="border:0;"><span id="preunitario" style="display: none; font-size:14px;">$<span><?php echo $preciouni;?></span> + IVA</span></td>
                                            <td style="border:0;">$ <span id="total1"></span>+ IVA</td>
                                        </tr>

                                    </table> 
                                </div>
                            </div>
                            <div class="col-xs-12"><br><br></div>
                            <!--16 paginas-->

                            <div class="col-sm-5 col-xs-12">
                                <div class="row">
                                    <p class="titulo-revista">Revista 16 P&aacute;ginas</p>
                                    <div class="col-sm-5 col-xs-12">
                                        <div class="row">
                                            <img src="images/revista.png" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-12 textos-revista">
                                        <p>INFORMACI&Oacute;N T&Eacute;CNICA:</p>
                                        <ul>
                                            <li>PAPEL OBRA 70gr</li>
                                            <li>FULL COLOR</li>
                                            <li>ABROCHADO</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-xs-12">
                                <div class="row">
                                    <table class="tabla-precios">
                                        <tr>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO UNITARIO</th>
                                            <th>PRECIO TOTAL</th>
                                        </tr>
                                        <tr>

                                            <td style="border:0;">
                                                <select class="form-control" name="select_cantidad2" id="select_cantidad2">
                                                    <option value="" data-final="" data-unitario="">Seleccion&aacute;...</option> 
                                                    <?php
                                                        $result_precios2=mysql_query("select * from tabla_precios WHERE tipo='16' order by cantidad ASC");
                                                        if ($row_precios2=mysql_fetch_array($result_precios2)) {
                                                            do {
                                                                $preciouni2 = $row_precios2['costo_unitario'];
                                                                $cantidad2 = $row_precios2['cantidad'];
                                                                $preciotot2 = ($preciouni2 * $cantidad2);
                                                                $preciotot2 = number_format($preciotot2, 2, ',', '.');
                                                                $preciouni2 = number_format($preciouni2, 4, ',', '.');
                                                    ?>
                                                                <option value="<?php echo($cantidad2); ?>" data-final="<?php echo($preciotot2); ?>" data-unitario="<?php echo($preciouni2); ?>"><?php echo($cantidad2); ?></option>
                                                    <?php
                                                            } while ($row_precios2=mysql_fetch_array($result_precios2));
                                                        }

                                                        else {
                                                            echo('<option value="" data-final="" data-unitario="">No hay precios disponibles</option>');
                                                        }

                                                    ?>
                                             </select>
                                                        
                                             </td>
                                            <td style="border:0;"><span id="preunitario2" style="display: none; font-size:14px;">$<span><?php echo $preciouni2;?></span> + IVA</span></td>
                                            <td style="border:0;">$ <span id="total2"></span> + IVA</td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                            <div class="col-xs-12"><br><br></div>
                            <!--2 paginas-->

                            <div class="col-sm-5 col-xs-12">
                                <div class="row">
                                    <p class="titulo-revista">Flyer Frente y Dorso</p>
                                    <div class="col-sm-5 col-xs-12">
                                        <div class="row">
                                            <img src="images/flyer.png" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-12 textos-revista">
                                        <p>INFORMACI&Oacute;N T&Eacute;CNICA:</p>
                                        <ul>
                                            <li>PAPEL OBRA 70gr</li>
                                            <li>FULL COLOR</li>
                                            <li>FRENTE Y DORSO</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 col-xs-12">
                                <div class="row">

                                    <table class="tabla-precios">
                                        <tr>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO UNITARIO</th>
                                            <th>PRECIO TOTAL</th>
                                        </tr>
                                        <tr>

                                            <td style="border:0;">
                                             <select class="form-control" name="select_cantidad3" id="select_cantidad3">
                                                    <option value="" data-final="" data-unitario="">Seleccion&aacute;...</option> 
                                                    <?php
                                                        $result_precios3=mysql_query("select * from tabla_precios WHERE tipo='2' order by cantidad ASC");
                                                        if ($row_precios3=mysql_fetch_array($result_precios3)) {
                                                            do {
                                                                $preciouni3 = $row_precios3['costo_unitario'];
                                                                $cantidad3 = $row_precios3['cantidad'];
                                                                $preciotot3 = ($preciouni3 * $cantidad3);
                                                                $preciotot3 = number_format($preciotot3, 2, ',', '.');
                                                                $preciouni3 = number_format($preciouni3, 4, ',', '.');
                                                    ?>
                                                                <option value="<?php echo($cantidad3); ?>" data-final="<?php echo($preciotot3); ?>" data-unitario="<?php echo($preciouni3); ?>"><?php echo($cantidad3); ?></option>
                                                    <?php
                                                            } while ($row_precios3=mysql_fetch_array($result_precios3));
                                                        }

                                                        else {
                                                            echo('<option value="" data-final="" data-unitario="">No hay precios disponibles</option>');
                                                        }

                                                    ?>
                                             </select>
                                                        
                                             </td>
                                            <td style="border:0;"><span id="preunitario3" style="display: none; font-size:14px;">$<span><?php echo $preciouni3;?></span> + IVA</span></td>
                                            <td style="border:0;">$ <span id="total3"></span> + IVA</td>
                                        </tr>
                                    </table>

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
<div id="preview" class="modal fade" role="dialog" style="width:100%!important; overflow-x:visible!important;">
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
 
<!-- Modal -->
<div id="precios-volante" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="width: auto!important;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <img class="img-responsive" src="images/precios-volante.jpg" alt="">
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
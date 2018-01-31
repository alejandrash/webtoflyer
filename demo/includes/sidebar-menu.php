<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93691845-1', 'auto');
  ga('send', 'pageview');

</script>

<?php 
if (!isset($niveluser)) {
    $user = $_SESSION['ESTADO'];
    $result_user=mysql_query("select * from usuarios WHERE email ='$user'");
    $row_user=mysql_fetch_array($result_user);
    $niveluser=$row_user['categoria'];
}
?>
<div class="sidebar-menu">
    <div id="sidebar">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="home.php" title="Home"><i class="fa fa-home"></i> <span>Home</span></a></li>
                                        <li><a href="diseniar-plantilla.php" title="Dise&ntilde;ar"><img src="images/menu/diseniar-flyer.png"> <span>Dise&ntilde;ar</span></a></li>
                                        <?php
                                            if ($niveluser!='operador') {
                                        ?>
                                        <li><a href="aviso-prediseniar.php" title="Editar Revista"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Editar Revista</span></a></li>
                                        <?php
                                            }
                                        ?>
									    <li><a href="productos.php" title="Productos"><img src="images/menu/productos.png"> <span>Productos</span></a></li>
                                        <li><a href="carga-productos.php" title="Cargar Productos"><img src="images/menu/carga-productos.png"> <span>Cargar Productos</span></a></li>
                                        <?php
                                            if ($niveluser!='operador') {
                                        ?>
									    <li><a href="promos-pie.php" title="Banners Socio"><img src="images/menu/promos.png"> <span>Banners Socio</span></a></li>
                                        <!--<li><a href="publicitarios.php" title="Avisos Publicitarios"><i class="fa fa-table" aria-hidden="true"></i> <span>Avisos Publicitarios</span></a></li>
                                        <li><a href="aviso-bloquear.php" title="Bloquear Marcas"><i class="fa fa-lock" aria-hidden="true"></i> <span>Bloquear Marcas</span></a></li>-->
                                        <li><a href="datos-financiacion.php" title="CFT y TEA"><i class="fa fa-calculator" aria-hidden="true"></i> <span>CFT y TEA</span></a></li>
                                        <li><a href="cartel-precios.php" title="Cartel de Precios"><i class="fa fa-tag" aria-hidden="true"></i> <span>Cartel de Precios</span></a></li>
                                        <li><a href="marquez-in.php" title="Intranet"><img src="images/menu/marquezin_mobile.png"> <span>Intranet</span></a></li>
                                        <li><a href="estadisticas.php"><img src="images/menu/estadisticas.png"> <span>Estad&iacute;sticas</span></a></li>
                                        <?php
                                            }
                                        if ($niveluser=='operador') {
                                        ?>
                                        <li><a href="solicitar-promos.php" title="Solicitar Banner"><img src="images/menu/promos.png"> <span>Solicitar Banner</span></a></li>
                                        <li><a href="datos-financiacion.php" title="CFT y TEA"><i class="fa fa-calculator" aria-hidden="true"></i> <span>CFT y TEA</span></a></li>
                                        <li><a href="cartel-precios.php" title="Cartel de Precios"><i class="fa fa-tag" aria-hidden="true"></i> <span>Cartel de Precios</span></a></li>
                                        <li><a href="descargar-material.php" title="Intranet"><img src="images/menu/marquezin_mobile.png"> <span>Intranet</span></a></li>
                                        <li><a href="lista-precios.php" title="Precios VIGENTES"><i class="fa fa-usd"></i> <span>Precios Vigentes</span></a></li>
                                        <?php
                                        }
                                            if ($niveluser=='superusuario') {
                                        ?>
                                        <li><a href="carga-contrato.php" title="Cargar Contrato TYC"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span>Cargar Contrato TYC</span></a></li>
									    <li><a href="carga-precios.php" title="Cargar Precios"><i class="fa fa-usd"></i> <span>Fechas / Precios</span></a></li>
                                        <?php
                                            }
                                        ?>
                                        
								  </ul>
								</div>
    </div>
</div>
							  <div class="clearfix"></div>
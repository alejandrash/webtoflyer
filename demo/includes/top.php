<?php

include("includes/conexion.php");

$usuariotop = $_SESSION['ESTADO'];
$result_top=mysql_query("select * from usuarios WHERE email ='$usuariotop'");
    if ($row_top=mysql_fetch_array($result_top)) {
        $suc = $row_top["sucursal"];
    }

date_default_timezone_set('America/Argentina/Buenos_Aires');
?>
<div class="top_bg">
    <div class="header_top col-sm-offset-1 col-sm-10 col-xs-12">
        <div class="top_right">
            <ul>
                <li class="logo">
                    <img class="img-responsive" src="images/home/logo-institucional.png" alt="">
                </li>
                <li>
                    <a href="#" class="desplegar" title="Click para ver opciones"><span><?php echo ($suc); ?></span> <img src="images/user-noimg.png" alt=""></a>
                    <ul id="menu1" class="">
                        <li><a href="editar-datos.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR DATOS</a></li>
                        <li><a href="salir.php"><i class="fa fa-sign-out" aria-hidden="true"></i> CERRAR SESI&Oacute;N</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="#" class="desplegar2 ico" title="Click para ver opciones"><span class="ico">?</span></a>
                    <ul id="menu2" class="">
                        <li><a href="tutoriales.php"><i class="fa fa-question-circle"></i> PREGUNTAS FRECUENTES</a></li>
                        <li><a href="preguntas.php"><i class="fa fa-youtube-play" aria-hidden="true"></i> TUTORIALES</a></li>
                        <li><a href="tickets.php"><i class="fa fa-ticket" aria-hidden="true"></i> SOPORTE T&Eacute;CNICO</a></li>
                    </ul>
                </li>
            </ul>
        </div>
		<div class="clearfix"> </div>
	</div>						
</div>
<div class="clearfix"></div>
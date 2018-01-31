<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
header("Content-Type:text/html; charset=utf-8");

$id=$_POST['id'];

$select_produ=mysql_query("select * from productos WHERE Id='$id'");
$row_produ=mysql_fetch_array($select_produ);

$descripcion=$row_produ['descripcion'];
$descripcion=str_replace("*","'",$descripcion);
$descripcion=str_replace('&quot;','"',$descripcion);
$descripcion=str_replace('quot;','',$descripcion);
$origen = $row_produ['origen'];
$marca=$row_produ['id_marca'];

$select_mar=mysql_query("select * from marcas WHERE Id='$marca'");
$row_mar=mysql_fetch_array($select_mar);

echo('<div class="interior">
	<div class="marca">
		<div class="titulo"><p><strong placeholder="Escribe aqui el titulo del producto, marca y modelo..." contenteditable="true">'.$row_produ['titulo'].' '.$row_produ['modelo'].'</strong></p></div>
		<a id="'.$row_produ['Id'].'" class="quitar" href="#" title="Quitar Producto">x</a>
	</div>
	<div class="descripcion">
		<p><strong style="font-weight:normal;" placeholder="Escribe aqui la descripcion..." contenteditable="true">'.$descripcion.'</strong>
		 Origen: '.$origen.'</p>
	</div>
	<div class="bottom">
		<span>PRECIO CONTADO</span>
		<input onkeypress="return Onlyprices(event)" class="auto big" type="text" step=",01" value="'.$row_produ['precio'].'">
		<div class="efectivo">Efectivo, tarjeta de débito<br>ó tarjeta de crédito en 1 pago.</div>
	</div>
	<div class="selec-financiacion-big">
		<div class="mitad" style="display:none;">
			<a href="#tarjetas" data-toggle="modal" class="sele seletarjetas" title="Click aqui para seleccionar tarjeta">Seleccionar tarjeta</a> 
			<a data-toggle="modal" href="#bancos" class="sele selebancos disabled" title="Click aqui para seleccionar banco">Seleccionar banco</a>
		</div>
		<div class="zona-cuota" style="display:none;">
			<a data-toggle="modal" href="#cuotas" class="sele selecuotas disabled" title="Click aqui para seleccionar la cantidad de cuotas" style="padding-top:8px;">Seleccionar cuotas</a>
			<input data-cft="" data-tea="" data-coef="" data-cuotas="" onkeypress="return Onlyprices(event)" class="auto disabled" type="text" step=",01" value="$0,00">
		</div> 

		<a href="#" id="agregar-sda" title="Click aqui para agregar una financiacion a este cartel"><img src="images/btn_agregar-finan.png" alt=""></a>   

		<div class="zona-valores" style="display:none;">
			<div class="cft">
				<a class="eliminar-sda" href="#" title="Click aqui para eliminar esta financiacion"><img src="images/menos.png" alt=""></a>
				<p>CFT: <span>0,00</span>%</p>
				<div class="fr_cft">COSTO FINANCIERO TOTAL</div>
			</div>
			<div class="right">
				<div class="ptf"><p>PTF: $<span>0,00</span></p></div>
				<div class="tea"><p>TEA: <span>0,00</span>%</p></div>
			</div> 
		</div> 
	</div>
	<div class="overlay"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>');
?>
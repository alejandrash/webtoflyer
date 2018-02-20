<?php 
session_start();
include("includes/conexion.php");
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



echo('<p class="titulo">'.$row_produ['titulo'].'</p>
	<a id="'.$row_produ['Id'].'" class="quitar" href="#" title="Quitar Producto">x</a>
	<div class="imagen">
        <img src="images/'.$row_produ['foto'].'" alt="">
        <a class="selecucarda cucarda1" data-toggle="modal" href="#cucardas1" title="Click aqui para agregar cucarda"><span>ELEGIR CUCARDA</span></a>
        <a class="selecucarda cucarda2" data-toggle="modal" href="#cucardas2" title="Click aqui para agregar cucarda"><span>ELEGIR CUCARDA</span></a>
    </div>
    <div class="bottom">
        <a href="#" class="agregartachado" title="Agregar precio tachado"></a>
        <a href="#" class="quitartachado" title="Quitar precio tachado"></a>
        <span>OFERTA CONTADO</span>
        <input onkeypress="return Onlyprices(event)" class="auto big" type="text" step=",01" value="$0,00"> 
        <div class="preciotach">
        	<span>ANTES</span> 
        	<input onkeypress="return Onlyprices(event)" class="auto tach" type="text" step=",01" value="$0,00">
        	<div class="linea"></div>
        </div>
    </div>
    <div class="descripcion">
        <p><strong style="font-weight:normal"; placeholder="Escribe aqui la descripcion..." contenteditable="true">'.$descripcion.'</strong> Origen: '.$origen.'</p>
    </div>
    <a href="#" id="agregar-sda" title="Click aqui para agregar una financiacion a este producto"><span>LOS PRECIOS CONTADO SON VÁLIDOS EN EFECTIVO, TARJETA DE DÉBITO ó TARJETA DE CRÉDITO EN 1 PAGO.</span><img src="images/btn_agregar-finan2.png" alt=""></a>

    <div class="selec-financiacion-big">
        <div class="mitad">
            <a href="#tarjetas" data-toggle="modal" class="sele seletarjetas" title="Click aqui para seleccionar tarjeta">Seleccionar tarjeta</a>
            <a data-toggle="modal" href="#bancos" class="sele selebancos disabled" title="Click aqui para seleccionar banco">Seleccionar banco</a>
        </div>
        <div class="zona-cuota">
            <a data-toggle="modal" href="#cuotas" class="sele selecuotas disabled" title="Click aqui para seleccionar la cantidad de cuotas">Seleccionar cuotas</a>
        </div>
        <input data-cft="" data-tea="" data-coef="" data-cuotas="" onkeypress="return Onlyprices(event)" class="auto disabled" type="text" step=",01" value="$0,00">
        <div class="zona-valores">
            <div class="cft">
                <a class="eliminar-sda" href="#" title="Click aqui para eliminar esta financiacion">
                    <img src="images/menos.png" alt="">
                </a>
                <p>CFT: <span>0,00</span>%</p>
                <div class="fr_cft">COSTO FINANCIERO TOTAL</div>
            </div>
            <div class="right">
                <div class="ptf">
                    <p>PTF: $<span>0,00</span></p>
                </div>
                <div class="tea"><p>TEA: <span>0,00</span>%</p></div>
                <div class="pcont"><p>PRECIO CONTADO:</p></div>
            </div> 
        </div> 
    </div>
	<div class="overlay"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>');
?>
<?php
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
header("Content-Type:text/html; charset=utf-8");

$cadenaopt = '';
$cadenasuc = '<a id="agregarsuc" href="#" title="Click aqui para agregar otra sucursal"><i class="fa fa-plus-circle" aria-hidden="true" title="Click aqu&iacute; para agregar otra sucursal al flyer"></i> AGREGAR OTRA SUCURSAL AL FLYER</a>';
$usuario=$_SESSION['ESTADO'];
$result_dir=mysql_query("select * from usuarios WHERE email='$usuario'");
$row_dir=mysql_fetch_array($result_dir);
$id_usuario = $row_dir['Id'];

$result_sucs1=mysql_query("select * from sucursales WHERE id_usuario='$id_usuario'");
$num_rows = mysql_num_rows($result_sucs1);
mysql_data_seek($result_sucs1, 0);
if ($row_sucs1=mysql_fetch_array($result_sucs1)) {
do {
	$cadenaopt = $cadenaopt.'<option data-tel="'.$row_sucs1['telefono'].'" value="'.$row_sucs1['direccion'].', '.$row_sucs1['provincia'].'">'.$row_sucs1['direccion'].', '.$row_sucs1['provincia'].'</option>';
    //$cadenaopt = $cadenaopt."iii";

    } while ($row_sucs1=mysql_fetch_array($result_sucs1));
}

mysql_data_seek($result_sucs1, 0);
if ($row_sucs1=mysql_fetch_array($result_sucs1)) {
	$i=1;
    do {
    $cadenasuc = $cadenasuc.'<div id="dir_'.$i.'" class="direccion_elegir col-sm-offset-2 col-sm-8">
	<select id="direccion_elegir_'.$i.'" name="direccion_elegir_'.$i.'" class="form-control">
		<option value="">Seleccione la direcci&oacute;n de la sucursal que aparecer&aacute; en el flyer</option>'.$cadenaopt.'
    </select>
    <i id="sacar-suc_<?php echo($i);?>" class="fa fa-minus-circle" aria-hidden="true" title="Click aqu&iacute; para quitar esta sucursal del flyer"></i>
    <div class="row">
        <div class="direccion_resultante">
            <p class="load_direccion"></p>
            <p class="load_telefono"></p>
        </div>
    </div>
</div>';


    $i++;
    } while ($i<=$num_rows);
}

echo($cadenasuc);
?>
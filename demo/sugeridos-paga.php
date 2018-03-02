<?php
    header("Content-Type:text/html; charset=utf-8");

session_start();
include("includes/conexion.php");
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
$usuario=$_SESSION['ESTADO'];

$estado=$_POST['estado'];
$idimg=$_POST['id'];

if ($estado == 2) {
	$result_pred=mysql_query("select * from redes_predeterminados WHERE tipo='paga' AND Id='$idimg'");
}
if ($estado == 3) {
	$result_pred=mysql_query("select * from redes_gifs WHERE tipo='paga' AND Id='$idimg'");
}
$row_pred=mysql_fetch_array($result_pred);

$resultado = '';

if (isset($row_pred['sugerido1'])) { 
$resultado = $resultado.'<div class="form-group"><label><textarea class="form-control" id="txt1" name="txt1" disabled>'.$row_pred['sugerido1'].'></textarea><input type="radio" name="optiontxt" value="'.$row_pred['sugerido1'].'"><p class="small" style="text-align: right;"><span>'.strlen($row_pred['sugerido1']).'</span> caracteres</p></label></div>';
}
if (isset($row_pred['sugerido2'])) { 
$resultado = $resultado.
'<div class="form-group">
                        <label>
                            <textarea class="form-control" id="txt2" name="txt2" disabled>'.$row_pred['sugerido2'].'</textarea>
                            <input type="radio" name="optiontxt" value="'.$row_pred['sugerido2'].'">
                            <p class="small" style="text-align: right;"><span>'.strlen($row_pred['sugerido2']).'</span> caracteres</p>
                        </label></div>';
} 
 if (isset($row_pred['sugerido3'])) { 
 $resultado = $resultado.
'<div class="form-group">
                        <label>
                            <textarea class="form-control" id="txt3" name="txt3" disabled>'.$row_pred['sugerido3'].'</textarea>
                            <input type="radio" name="optiontxt" value="'.$row_pred['sugerido3'].'">
                            <p class="small" style="text-align: right;"><span>'.strlen($row_pred['sugerido3']).'</span> caracteres</p>
                        </label></div>';
} 

$resultado = $resultado.'<a href="#" class="close cerrar" data-dismiss="modal">Seleccionar</a>';

if ((is_null($row_pred['sugerido1'])) && (is_null($row_pred['sugerido2'])) && (is_null($row_pred['sugerido3']))) {
	$resultado = '';
}

print_r($resultado);
?>
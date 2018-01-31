<?php
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
$TAMANO_PAGINA = 10;
$inicio = 0;
 $pagina = 1;
$buscar = $_POST['buscar'];
 
$select_prod=mysql_query("select productos.Id AS id_prod, productos.id_cat, productos.id_marca, productos.titulo, productos.modelo, productos.descripcion, productos.foto, productos.precio, productos.usuario, productos.tags, from productos WHERE productos.id_marca='$buscar' ORDER BY productos.Id DESC");


$lista_prod ='';
$i = 1;
if ($row_prod=mysql_fetch_array($select_prod)) {
    do { 
        $id_marca = $row_prod['id_marca'];
        $result_marca=mysql_query("select * from marcas WHERE Id='$id_marca'");
        $row_marca=mysql_fetch_array($result_marca);
        
        if (($row_prod['modelo'])!="") {
            $modelo="<p><strong>Modelo: </strong>".$row_prod['modelo']."</p>";
        }
        else {$modelo='';}
        if ($row_prod['descripcion']!="") {
                                                    $descripcion=$row_prod['descripcion'];
                                                    $descripcion=str_replace("*","'",$descripcion);
                                                    $descripcion=str_replace('&','"',$descripcion);
         $descripcion="<p><strong>Descripci&oacute;n: </strong><br>".$descripcion."</p>";
        }
        else {$descripcion='';}
        
        $lista_prod = $lista_prod."<li class='col-md-5ths col-xs-12' id='0000-".$i."'><div class='content'><label><span>Seleccionar</span> <input type='checkbox' name='seleccion' id='seleccion_".$row_prod['id_prod']."' value='".$row_prod['id_prod']."'><div class='marca'><img src='images/".$row_marca['logo']."' height='45' class='img-responsive' alt=''></div><div class='imagen'><img src='images/".($row_prod['foto'])."' height='170' class='img-responsive img-centered' alt=''></div><div class='desc'><p class='titulo'>".$row_prod['titulo']."</p>".$modelo.$descripcion.$row_prod['precio']."</div></label></div></li>";
        
        $i++;
    } while ($row_prod=mysql_fetch_array($select_prod));
}
    echo($lista_prod);
?>
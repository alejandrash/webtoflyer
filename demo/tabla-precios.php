<?php 
session_set_cookie_params(21600,"/");
session_start();
include("includes/conexion.php");
//echo($_SESSION['ESTADO']);
if (!isset($_SESSION['ESTADO'])) {
    header("Location:index.php");
}
if (!isset($niveluser)) {
    $user = $_SESSION['ESTADO'];
    $result_user=mysql_query("select * from usuarios WHERE email ='$user'");
    $row_user=mysql_fetch_array($result_user);
    $niveluser=$row_user['categoria'];
}
if ($niveluser != 'superusuario') {
    header("Location:home.php");
}
?>
<?php 
header("Content-Type:text/html; charset=utf-8");
?>
<!DOCTYPE HTML>
<html>
<head>
<title> WEB TO FLYER</title>
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
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<!-- lined-icons -->
<link rel="stylesheet" href="css/wtf.css" type='text/css' />	
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<link href='css/sweetalert.css' rel='stylesheet' type='text/css'>
<script src="js/sweetalert.min.js"></script>
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
        if (tecla > 31 && (tecla < 48 || tecla > 57)) {
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
    
    function Onlyletters(e)
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
        if (((tecla  != 32) && (tecla < 65)) || ((tecla > 90) && (tecla < 97)) || (tecla > 122)) {
            return false;
        }
    }

    $(document).ready(function () { 
        var cambiado = 0;
        $('.tabla-precios').on('click', '.modificar', function(e) {
            e.preventDefault();
            $(this).parent().parent().find('input.editar').prop("disabled", false);
            return false;
        });

        $('.tabla-precios').on('click', '.borrar', function(e) { 
            e.preventDefault();
            var id_dato = $(this).attr('href');
            if (id_dato == '') {
                $(this).parent().parent('tr').attr('id', 'borro');
            }
            id_datosin = id_dato;
            id_dato = '#'+id_dato;
            swal({
                            title: "¿Estás seguro de ELIMINAR este precio?",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#5CB223",
                            confirmButtonText: "ELIMINAR",
                            cancelButtonText: "CANCELAR",
                            closeOnConfirm: true,
                            closeOnCancel: true 
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $('#borro').remove();
                                $(id_dato).remove();
                                $.ajax({
                                       type: "POST",
                                       dataType: "html",
                                       url: "eliminar-precio.php",
                                       data: {
                                            'id_dato': id_datosin
                                        },
                                       success: function(data)
                                       {
                                            swal("", "Se eliminó el precio.", "success");                  
                                            return false;
                                       }
                                });
                            }
                            else {
                                $('#borro').attr('id', '');
                                return false;
                            }
            })
            return false;
        });

        $('.tabla-precios').on('change', 'input.precio', function() { 
            var getVal = $(this).val();
            cambiado = 1;
            getVal = getVal.replace('$','');
            if (getVal !="") {
                getVal = getVal.replace(',','.');
                var nuevoVal = parseFloat(getVal).toFixed(4);
                precioUnsigned = nuevoVal;
                nuevoVal = nuevoVal.replace('.',',');
                $(this).val('$'+nuevoVal);
                $(this).attr('value', '$'+nuevoVal);
                var cantidad = $(this).parent().parent().find('.cantidad').val();
                var totalVal = cantidad * precioUnsigned;
                totalVal = parseFloat(totalVal).toFixed(2);
                totalVal = totalVal.replace('.',',');
                $(this).parent().parent().find('.preciototal').val('$'+totalVal);
                $(this).parent().parent().find('.preciototal').attr('value', '$'+totalVal);
            }
        });
        $('.tabla-precios').on('change', 'input.cantidad', function() { 
            var getVal = $(this).val();
            cambiado = 1;
            if (getVal !="") {
                var nuevoVal = getVal.replace(/^0+/, '');
                $(this).val(nuevoVal);
                $(this).attr('value', nuevoVal);
                var preciouni = $(this).parent().parent().find('.precio').val();
                preciouni = preciouni.replace('$','');
                preciouni = preciouni.replace(',','.');
                var totalVal = nuevoVal * preciouni;
                totalVal = parseFloat(totalVal).toFixed(2);
                totalVal = totalVal.replace('.',',');
                $(this).parent().parent().find('.preciototal').val('$'+totalVal);
                $(this).parent().parent().find('.preciototal').attr('value', '$'+totalVal);
            }
        });

        $('#borrar').click(function(){
            swal({
                            title: "¿Estás seguro de CANCELAR los cambios?",
                            text: "No se guardarán las modificaciones que hiciste.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#5CB223",
                            confirmButtonText: "SI",
                            cancelButtonText: "NO",
                            closeOnConfirm: true,
                            closeOnCancel: true 
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                window.location.href = "tabla-precios.php";
                            }
                            else {
                                return false;
                            }
            })
            return false;
        });
        $('#actualizar').click(function(){
            var controlCeros = 0;
            $(".tabla-precios input").each(function() {
                if ($(this).val() == 0) {
                    controlCeros = 1;
                }
                if ($(this).val() == '$0,0000') {
                    controlCeros = 1;
                } 
            });
            if (controlCeros == 1) {
                swal("Error", "La cantidad y precio no puede ser 0, revisa los datos que cargaste.", "error");
                 return false;
            }
            else {
                var cant_volantes = $('#tab-1 .tabla-precios tbody tr').length;
                var cant_8 = $('#tab-2 .tabla-precios tbody tr').length;
                var cant_16 = $('#tab-3 .tabla-precios tbody tr').length;
                $('.tabla-precios input').prop("disabled", false);
                $('#cant_volantes').val(cant_volantes);
                $('#cant_revista8').val(cant_8);
                $('#cant_revista16').val(cant_16);
                swal({
                                title: "¿Terminaste de ACTUALIZAR la lista de precios?",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#5CB223",
                                confirmButtonText: "SI",
                                cancelButtonText: "NO",
                                closeOnConfirm: true,
                                closeOnCancel: true 
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    $("#administrarpromo").submit();
                                }
                                else {
                                    return false;
                                }
                })
            }
        });
        $('.agregar').click(function(e){
            e.preventDefault();
            cambiado = 1;
            var tab = $(this).parent().find('.tabla-precios').attr('data-tipo');
            var grupoCant = $(this).parent().find('.tabla-precios').children('tbody').children('tr').length;
            var CantInf = $(this).parent().find('.tabla-precios').children('tbody');
            if (grupoCant > 1) {
                var tr_clonar = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child');
                var elem_clonar = $(this).parent().find('.tabla-precios').children('tbody').children('tr:first-child').clone();
                $(elem_clonar).insertAfter(tr_clonar);
                var nuevo = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child');
                $(nuevo).attr('id', '');

                var nuevo_modificar = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child').children('td.icono').children('.modificar');
                $(nuevo_modificar).attr('href', '');
                var nuevo_borrar = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child').children('td.icono').children('.borrar');
                $(nuevo_borrar).attr('href', '');
                var nuevo_cantidad = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child').children('td').children('td input.cantidad');
                $(nuevo_cantidad).val('');
                $(nuevo_cantidad).attr('value', '');
                $(nuevo_cantidad).attr('id', 'cantidad_'+tab+'_'+(grupoCant+1));
                $(nuevo_cantidad).attr('name', 'cantidad_'+tab+'_'+(grupoCant+1));
                $(nuevo_cantidad).prop("disabled", false);
                var nuevo_precio = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child').children('td').children('td input.precio');
                $(nuevo_precio).val('');
                $(nuevo_precio).attr('value', '');
                $(nuevo_precio).attr('id', 'preciouni_'+tab+'_'+(grupoCant+1));
                $(nuevo_precio).attr('name', 'preciouni_'+tab+'_'+(grupoCant+1));
                $(nuevo_precio).prop("disabled", false);
                var nuevo_preciototal = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child').children('td').children('td input.preciototal');
                $(nuevo_preciototal).val('');
                $(nuevo_preciototal).attr('value', '');
                $(nuevo_precio).attr('id', 'preciotot_'+tab+'_'+(grupoCant+1));
                $(nuevo_preciototal).attr('name', 'preciotot_'+tab+'_'+(grupoCant+1));
                return false;
            }
            if (grupoCant == 1) {
                var id_clonar = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child').attr('id');
                var tr_clonar = $(this).parent().find('.tabla-precios').children('tbody').children('tr:last-child');
                if (id_clonar == 'nohay') {
                    var formarInputCant = 'cantidad_'+tab+'_'+(grupoCant);
                    var formarInputPre = 'preciouni_'+tab+'_'+(grupoCant);
                    var formarInputTot = 'preciotot_'+tab+'_'+(grupoCant);
                    var cadena = '<tr><td class="icono"><a title="Eliminar este precio" class="borrar" href=""><img src="images/menos.png" class="img-responsive" alt=""></a></td><td class="icono"><a title="Modificar este precio" class="modificar" href=""><img src="images/iconito-modificar-gris.png" class="img-responsive" alt=""></a></td><td><input type="text" class="form-control cantidad editar" id="'+formarInputCant+'" name="'+formarInputCant+'" value="" required onkeypress="return Onlynumbers(event)"></td><td><input type="text" class="form-control precio editar" id="'+formarInputPre+'" name="'+formarInputPre+'" value="" required onkeypress="return Onlyprices(event)"></td><td><input type="text" class="form-control preciototal" id="'+formarInputTot+'" name="'+formarInputTot+'" value="" disabled required onkeypress="return Onlyprices(event)"></td></tr>';
                    $(CantInf).html(cadena);
                }
                else {

                    var formarInputCant = 'cantidad_'+tab+'_'+(grupoCant+1);
                    var formarInputPre = 'preciouni_'+tab+'_'+(grupoCant+1);
                    var formarInputTot = 'preciotot_'+tab+'_'+(grupoCant+1);
                    var cadena = '<tr><td class="icono"><a title="Eliminar este precio" class="borrar" href=""><img src="images/menos.png" class="img-responsive" alt=""></a></td><td class="icono"><a title="Modificar este precio" class="modificar" href=""><img src="images/iconito-modificar-gris.png" class="img-responsive" alt=""></a></td><td><input type="text" class="form-control cantidad editar" id="'+formarInputCant+'" name="'+formarInputCant+'" value="" required onkeypress="return Onlynumbers(event)"></td><td><input type="text" class="form-control precio editar" id="'+formarInputPre+'" name="'+formarInputPre+'" value="" required onkeypress="return Onlyprices(event)"></td><td><input type="text" class="form-control preciototal" id="'+formarInputTot+'" name="'+formarInputTot+'" value="" disabled required onkeypress="return Onlyprices(event)"></td></tr>';
                    $(cadena).insertAfter(tr_clonar);
                }
            }
            if (grupoCant == 0) {
                var formarInputCant = 'cantidad_'+tab+'_'+(grupoCant+1);
                var formarInputPre = 'preciouni_'+tab+'_'+(grupoCant+1);
                var formarInputTot = 'preciotot_'+tab+'_'+(grupoCant+1);
                var cadena = '<tr><td class="icono"><a title="Eliminar este precio" class="borrar" href=""><img src="images/menos.png" class="img-responsive" alt=""></a></td><td class="icono"><a title="Modificar este precio" class="modificar" href=""><img src="images/iconito-modificar-gris.png" class="img-responsive" alt=""></a></td><td><input type="text" class="form-control cantidad editar" id="'+formarInputCant+'" name="'+formarInputCant+'" value="" required onkeypress="return Onlynumbers(event)"></td><td><input type="text" class="form-control precio editar" id="'+formarInputPre+'" name="'+formarInputPre+'" value="" required onkeypress="return Onlyprices(event)"></td><td><input type="text" class="form-control preciototal" id="'+formarInputTot+'" name="'+formarInputTot+'" value="" disabled required onkeypress="return Onlyprices(event)"></td></tr>';
                $(CantInf).html(cadena);
            }
        });

        //VERIFICO CAMBIOS GUARDADOS
        $('.botonera-acciones li a, .top_right li, #menu li').on('click', 'a', function() { 
                var proximo = $(this).attr('href');
                if (cambiado == 1) {
                    swal({
                            title: "¿Guardaste los precios antes de salir?",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#5CB223",
                            confirmButtonText: "QUEDARTE PARA GUARDAR",
                            cancelButtonText: "SALIR SIN GUARDAR",
                            closeOnConfirm: true,
                            closeOnCancel: true 
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                 return false;
                            }
                            else {
                                window.location.href = proximo;
                            }
                            return false;
                        }
                    )
                    return false;
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
            <div class="wrapper-prod-general">
                <!-- Botonera Acciones start-->
                <div class="botonera-acciones col-lg-2 col-md-12 col-xs-12">
                    <ul>
                        <li><a href="carga-precios.php">MODIFICAR FECHAS</a></li>
                        <li class="active"><a href="#">VER PRECIOS</a></li>
                    </ul>
                </div>
                <!-- Botonera Acciones ends-->
                <!-- Central start-->
                <div class="wrap-productos col-lg-10 col-md-12 col-xs-12">
                    <!-- Titular start-->
                    <div class="titular col-xs-12">
                        <h1><span class="circle"><i class="fa fa-usd" aria-hidden="true"></i></span> LISTA DE PRECIOS</h1>
                    </div>
                    <!-- Titular end-->
                    
                    <!-- Form start-->
                    <?php if (isset($_GET["msg_ok"])) { ?>
                        <script type="text/javascript">
                        $(document).ready(function () { 
                            swal("", "<?php echo($_GET["msg_ok"])?>", "success");  
                        });
                    </script>
                    <?php } ?>

                    <div class="tablaprecios col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1">VOLANTE</a></li>
                            <li><a data-toggle="tab" href="#tab-2">REVISTA 8 PÁGINAS</a></li>
                            <li><a data-toggle="tab" href="#tab-3">REVISTA 16 PÁGINAS</a></li>
                        </ul>
                        <div class="divisor"></div>
                        <form action="actualizar-precio.php" method="post" id="administrarpromo" name="administrarpromo">
                            <input type="hidden" id="cant_volantes" name="cant_volantes" value="">
                            <input type="hidden" id="cant_revista8" name="cant_revista8" value="">
                            <input type="hidden" id="cant_revista16" name="cant_revista16" value="">
                            <div class="tab-content">
                                <!-- START TAB 1-->
                                <div id="tab-1" class="tab-pane fade in active">
                                    <a href="#" class="agregar"><img src="images/plus.png" class="img-responsive" alt=""> AGREGAR FILA</a>
                                    <div class="scroller">
                                        <table class="tabla-precios" data-tipo="2">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>CANTIDAD</th>
                                                    <th>PRECIO UNITARIO SIN IVA</th>
                                                    <th>PRECIO TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            $result_precios1=mysql_query("select * from tabla_precios WHERE tipo='2' order by cantidad ASC");
                                                if ($row_precios1=mysql_fetch_array($result_precios1)) {
                                                    $i = 1;
                                                    do {
                                                        $preciouni = $row_precios1['costo_unitario'];
                                                        $cantidad = $row_precios1['cantidad'];
                                                        $preciotot = ($preciouni * $cantidad);
                                                        $preciotot = number_format($preciotot, 2, ',', '');
                                                        $preciouni = number_format($preciouni, 4, ',', '');
                                        ?>
                                                        <tr id="<?php echo($row_precios1['Id']); ?>">
                                                            <td class="icono"><a title="Eliminar este precio" class="borrar" href="<?php echo($row_precios1['Id']); ?>"><img src="images/menos.png" class="img-responsive" alt=""></a></td>
                                                            <td class="icono"><a title="Modificar este precio" class="modificar" href="<?php echo($row_precios1['Id']); ?>"><img src="images/iconito-modificar-gris.png" class="img-responsive" alt=""></a></td>
                                                            <td>
                                                                <input type="text" class="form-control cantidad editar" id="cantidad_2_<?php echo($i); ?>" name="cantidad_2_<?php echo($i); ?>" value="<?php echo($cantidad); ?>" disabled required onkeypress="return Onlynumbers(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control precio editar" id="preciouni_2_<?php echo($i); ?>" name="preciouni_2_<?php echo($i); ?>" value="$<?php echo($preciouni); ?>" disabled required onkeypress="return Onlyprices(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control preciototal" id="preciotot_2_<?php echo($i); ?>" name="preciotot_2_<?php echo($i); ?>" value="$<?php echo($preciotot); ?>" disabled required onkeypress="return Onlyprices(event)">
                                                            </td>
                                                        </tr>
                                        <?php
                                                        $i++;
                                                    } while ($row_precios1=mysql_fetch_array($result_precios1));
                                                }

                                                else {
                                                    echo('<tr id="nohay"><td>No hay precios disponibles</td></tr>');
                                                }

                                        ?>
                                        </tbody> 
                                        </table>
                                    </div>
                                </div>
                                <!-- END TAB 1-->
                                <!-- START TAB 2-->
                                <div id="tab-2" class="tab-pane fade">
                                    <a href="#" class="agregar"><img src="images/plus.png" class="img-responsive" alt=""> AGREGAR FILA</a>
                                    <div class="scroller">
                                        <table class="tabla-precios" data-tipo="8">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>CANTIDAD</th>
                                                    <th>PRECIO UNITARIO SIN IVA</th>
                                                    <th>PRECIO TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            $result_precios2=mysql_query("select * from tabla_precios WHERE tipo='8' order by cantidad ASC");
                                                if ($row_precios2=mysql_fetch_array($result_precios2)) {
                                                    $i = 1;
                                                    do {
                                                        $preciouni = $row_precios2['costo_unitario'];
                                                        $cantidad = $row_precios2['cantidad'];
                                                        $preciotot = ($preciouni * $cantidad);
                                                        $preciotot = number_format($preciotot, 2, ',', '');
                                                        $preciouni = number_format($preciouni, 4, ',', '');
                                        ?>
                                                        <tr id="<?php echo($row_precios2['Id']); ?>">
                                                            <td class="icono"><a title="Eliminar este precio" class="borrar" href="<?php echo($row_precios2['Id']); ?>"><img src="images/menos.png" class="img-responsive" alt=""></a></td>
                                                            <td class="icono"><a title="Modificar este precio" class="modificar" href="<?php echo($row_precios2['Id']); ?>"><img src="images/iconito-modificar-gris.png" class="img-responsive" alt=""></a></td>
                                                            <td>
                                                                <input type="text" class="form-control cantidad editar" id="cantidad_8_<?php echo($i); ?>" name="cantidad_8_<?php echo($i); ?>" value="<?php echo($cantidad); ?>" disabled required onkeypress="return Onlynumbers(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control precio editar" id="preciouni_8_<?php echo($i); ?>" name="preciouni_8_<?php echo($i); ?>" value="$<?php echo($preciouni); ?>" disabled required onkeypress="return Onlyprices(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control preciototal" id="preciotot_8_<?php echo($i); ?>" name="preciotot_8_<?php echo($i); ?>" value="$<?php echo($preciotot); ?>" disabled required onkeypress="return Onlyprices(event)">
                                                            </td>
                                                        </tr>
                                        <?php
                                                        $i++;
                                                    } while ($row_precios2=mysql_fetch_array($result_precios2));
                                                }

                                                else {
                                                    echo('<tr id="nohay"><td>No hay precios disponibles</td></tr>');
                                                }

                                        ?>
                                        </tbody> 
                                        </table>
                                    </div>
                                </div>
                                <!-- END TAB 2-->
                                <!-- START TAB 3-->
                                <div id="tab-3" class="tab-pane fade">
                                    <a href="#" class="agregar"><img src="images/plus.png" class="img-responsive" alt=""> AGREGAR FILA</a>
                                    <div class="scroller">
                                        <table class="tabla-precios" data-tipo="16">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>CANTIDAD</th>
                                                    <th>PRECIO UNITARIO SIN IVA</th>
                                                    <th>PRECIO TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            $result_precios3=mysql_query("select * from tabla_precios WHERE tipo='16' order by cantidad ASC");
                                                if ($row_precios3=mysql_fetch_array($result_precios3)) {
                                                    $i = 1;
                                                    do {
                                                        $preciouni = $row_precios3['costo_unitario'];
                                                        $cantidad = $row_precios3['cantidad'];
                                                        $preciotot = ($preciouni * $cantidad);
                                                        $preciotot = number_format($preciotot, 2, ',', '');
                                                        $preciouni = number_format($preciouni, 4, ',', '');
                                        ?>
                                                        <tr id="<?php echo($row_precios3['Id']); ?>">
                                                            <td class="icono"><a title="Eliminar este precio" class="borrar" href="<?php echo($row_precios3['Id']); ?>"><img src="images/menos.png" class="img-responsive" alt=""></a></td>
                                                            <td class="icono"><a title="Modificar este precio" class="modificar" href="<?php echo($row_precios3['Id']); ?>"><img src="images/iconito-modificar-gris.png" class="img-responsive" alt=""></a></td>
                                                            <td>
                                                                <input type="text" class="form-control cantidad editar" id="cantidad_16_<?php echo($i); ?>" name="cantidad_16_<?php echo($i); ?>" value="<?php echo($cantidad); ?>" disabled required onkeypress="return Onlynumbers(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control precio editar" id="preciouni_16_<?php echo($i); ?>" name="preciouni_16_<?php echo($i); ?>" value="$<?php echo($preciouni); ?>" disabled required onkeypress="return Onlyprices(event)">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control preciototal" id="preciotot_16_<?php echo($i); ?>" name="preciotot_16_<?php echo($i); ?>" value="$<?php echo($preciotot); ?>" disabled required onkeypress="return Onlyprices(event)">
                                                            </td>
                                                        </tr>
                                        <?php
                                                        $i++;
                                                    } while ($row_precios3=mysql_fetch_array($result_precios3));
                                                }

                                                else {
                                                    echo('<tr id="nohay"><td>No hay precios disponibles</td></tr>');
                                                }

                                        ?>
                                        </tbody> 
                                        </table>
                                    </div>
                                </div>
                                <!-- END TAB 3-->
                            </div>

                            <div class="col-xs-12 botonera">
                                <input type="button" class="btn" value="" id="borrar" name="borrar">
                                <input type="button" class="btn" value="" id="actualizar" name="actualizar">
                            </div>
                        </form>
                    </div>
                    <!-- Form end-->
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
<?php include("includes/conexion.php"); ?>
<?php
$usuario=$_POST['usuario'];
$usuario = strtolower($usuario); 
$clave=$_POST['clave'];

$clave = base64_encode ($clave);

$result=mysql_query("select * from usuarios WHERE email='$usuario' AND clave='$clave'") or die(mysql_error());
if ($row=mysql_fetch_array($result)){
		if ($row["clave"]==$clave){ 
			if ($row["email"]==$usuario){ 
				session_set_cookie_params(21600,"/");
			    session_start(); 
				$_SESSION['ESTADO']=$row["email"];
                $_SESSION['IDUSER']=$row["Id"];
                $fecha = date("Y-m-d H:i:s");
                $result_sesion=mysql_query("INSERT into sesiones (usuario, fecha_hora) VALUES ('$usuario', '$fecha')") or die(mysql_error());
                $result_unico=mysql_query("select * from sesiones WHERE usuario='$usuario' ORDER BY Id DESC LIMIT 1");
                $row_unico=mysql_fetch_array($result_unico);
                $_SESSION['SESIONFLY']=$row_unico["Id"];
				header("Location:home.php");
			}else{
				header("Location:index.php?msg_error=El usuario es incorrecto.");
			}
		}
}
		else{
			header("Location:index.php?msg_error=Los datos ingresados son incorrectos.");
		}
   mysql_close($link);

?>
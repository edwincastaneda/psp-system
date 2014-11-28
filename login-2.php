<?php 
session_start();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$id_usuario = "0";
include "conexion.php";
$consulta = mysql_query("select id_usuario from usuarios where nombre_usuario ='$usuario' and contrasena_usuario = '$clave'", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
$id_usuario = $resultado['id_usuario']; 
}//obtener correo igual
if ($id_usuario != "0") {
    //echo "Usuario:<strong>".$usuario."</strong>"; 
	$_SESSION["ESTADO"] = "LOGEADO";
	$_SESSION["USER"] = $usuario;
	$_SESSION["id_usuario"] = $id_usuario;
	echo "<META HTTP-EQUIV=refresh CONTENT ='0; URL =index.php' >";
 } else {
    echo "<META HTTP-EQUIV=refresh CONTENT ='0; URL =index.php?msg=err' >";
 }
include "cerrar_conexion.php";
?>


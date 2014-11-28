<?php
session_start();

$formulario = $_GET["form"];
$id = $_GET["id"];
if ($formulario == "productos") {

	include "conexion.php";
	$consulta = mysql_query("delete from productos where id_producto='$id'", $conexion);
	include "cerrar_conexion.php";


} elseif ($formulario == "proveedores") {
	
	include "conexion.php";
	$consulta = mysql_query("delete from proveedores where id_proveedor='$id'", $conexion);
	include "cerrar_conexion.php";

} elseif ($formulario == "clientes") {

    include "conexion.php";
	$consulta = mysql_query("delete from clientes where id_cliente='$id'", $conexion);
	include "cerrar_conexion.php";
	
}

 echo "<META HTTP-EQUIV=refresh CONTENT ='0; URL =consultas.php?form=$formulario' >";

?>
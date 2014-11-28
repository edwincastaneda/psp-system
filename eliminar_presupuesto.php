<?php
session_start();

$id = $_GET["id"];

    include "conexion.php";
	$consulta = mysql_query("delete from detalle_presupuesto where id_cotizacion='$id'", $conexion);
	$consulta = mysql_query("delete from encabezado_presupuesto where id_cotizacion='$id'", $conexion);
	include "cerrar_conexion.php";
	
 echo "<META HTTP-EQUIV=refresh CONTENT ='0; URL =presupuesto.php' >";

?>
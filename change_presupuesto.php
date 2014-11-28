<?php
session_start();

$id = $_GET["id"];
$status = $_GET["status"];


	
	include "conexion.php";
	$consulta = mysql_query("update encabezado_presupuesto set 	id_status = $status  where id_cotizacion='$id'", $conexion);
	include "cerrar_conexion.php";


 echo "<META HTTP-EQUIV=refresh CONTENT ='0; URL =presupuesto.php' >";

?>
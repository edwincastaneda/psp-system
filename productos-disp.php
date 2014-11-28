<?php
include "conexion.php";
$consulta = mysql_query("SELECT id_producto, nombre_producto FROM productos where id_producto not in (select id_producto from detalle_presupuesto where id_cotizacion = $id_cotizacion) ", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
echo  "<option value=".$resultado['id_producto'].">".$resultado['nombre_producto']."</option>";
}
include "cerrar_conexion.php";
?>
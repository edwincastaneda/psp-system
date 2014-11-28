<?php
include "conexion.php";
$consulta = mysql_query(" select distinct dp.id_producto,dp.cantidad, (SELECT p.nombre_producto FROM productos as p where p.id_producto=dp.id_producto) as nombre_producto , dp.precio from detalle_presupuesto as dp where dp.id_cotizacion = $id_cotizacion ", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
echo  "<option value=".$resultado['id_producto'].">".$resultado['nombre_producto']."(Cantidad:".$resultado['cantidad'].",Precio Q:".$resultado['precio'].")</option>";
}
include "cerrar_conexion.php";
?>
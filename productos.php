<?php
include "conexion.php";
$consulta = mysql_query("SELECT id_producto, nombre_producto FROM productos where id_producto ", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
echo  "<option value=".$resultado['id_producto'].">".$resultado['nombre_producto']."</option>";
}
include "cerrar_conexion.php";
?>
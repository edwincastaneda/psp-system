<?php
include "conexion.php";
$consulta = mysql_query("SELECT id_proveedor, nombre_proveedor FROM proveedores", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
$selected="";
if ($id_proveedor == $resultado['id_proveedor']) { $selected= "selected";}
echo  "<option value=".$resultado['id_proveedor']." $selected>".$resultado['nombre_proveedor']."</option>";
}
include "cerrar_conexion.php";
?>
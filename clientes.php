<?php
include "conexion.php";
$consulta = mysql_query("SELECT id_cliente, nombre_cliente FROM clientes", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
$selected="";
if ($id_cliente == $resultado['id_cliente']) { $selected= "selected";}
echo  "<option value=".$resultado['id_cliente']." $selected >".$resultado['nombre_cliente']."</option>";
}
include "cerrar_conexion.php";
?>
<?php
include "conexion.php";
$consulta = mysql_query("SELECT id_status, nombre_status FROM status", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
echo  "<option value=".$resultado['id_status'].">".$resultado['nombre_status']."</option>";
}
include "cerrar_conexion.php";
?>
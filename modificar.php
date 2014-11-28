<?php
session_start();

if ($_POST['productosF']==true){
include "conexion.php";
$insertar = mysql_query("UPDATE productos SET nombre_producto='".$_POST['nombreF']."', costo_producto=".$_POST['costoF'].", id_proveedor=".$_POST['proveedorF']." , descripcion = '".$_POST['descripcionF']."' WHERE id_producto=".$_POST['idF'], $conexion);	
include "cerrar_conexion.php";	 	 
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=consultas.php?form=productos'>";
}

if ($_POST['proveedoresF']==true){
include "conexion.php";
$insertar = mysql_query("UPDATE proveedores SET nombre_proveedor='".$_POST['nombreF']."', nit_proveedor='".$_POST['nitF']."', telefono_proveedor='".$_POST['telefonoF']."' , descripcion = '".$_POST['descripcionF']."' WHERE id_proveedor=".$_POST['idF'], $conexion);
include "cerrar_conexion.php";	 	 
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=consultas.php?form=proveedores'>";
}

if ($_POST['clientesF']==true){
include "conexion.php";
$insertar = mysql_query("UPDATE clientes SET nombre_cliente='".$_POST['nombreF']."', nit_cliente='".$_POST['nitF']."', telefono_cliente=".$_POST['telefonoF']." , descripcion = '".$_POST['descripcionF']."' WHERE id_cliente=".$_POST['idF'], $conexion);
include "cerrar_conexion.php";	 	 
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=consultas.php?form=clientes'>";
}

?>
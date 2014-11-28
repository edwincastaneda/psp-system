<?php 
session_start();

?>
<?php

if ($_POST['productosF']=="true"){
include "conexion.php";
$insertar = mysql_query("INSERT INTO productos (nombre_producto, costo_producto, id_proveedor,descripcion) VALUES('".$_POST['nombreF']."','".$_POST['costoF']."',".$_POST['proveedorF'].",'".$_POST['descripcionF']."')", $conexion);		 	
include "cerrar_conexion.php";
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=consultas.php?form=productos'>";
}

if ($_POST['clientesF']=="true"){
include "conexion.php";
$insertar = mysql_query("INSERT INTO clientes (nombre_cliente, nit_cliente, telefono_cliente,descripcion) VALUES('".$_POST['nombreF']."','".$_POST['nitF']."','".$_POST['telefonoF']."','".$_POST['descripcionF']."')", $conexion);		 	
include "cerrar_conexion.php";
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=consultas.php?form=clientes'>";
}

if ($_POST['proveedoresF']=="true"){
include "conexion.php";
$insertar = mysql_query("INSERT INTO proveedores (nombre_proveedor, nit_proveedor, telefono_proveedor,descripcion) VALUES('".$_POST['nombreF']."','".$_POST['nitF']."',".$_POST['telefonoF'].",'".$_POST['descripcionF']."')", $conexion);		 	
include "cerrar_conexion.php";
echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=consultas.php?form=proveedores'>";
}

?>
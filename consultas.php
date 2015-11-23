<?php
session_start();
?>
<?php include "verifica-logeo.php" ?>

<?php
include "index.php";
$estado = $_SESSION["ESTADO"];
$formulario = $_GET["form"];
$page_modificar = "update_forms.php";
$page_eliminar = "eliminar.php";
$page_agregar = "insert_forms.php";


if ($formulario == "productos") {
    echo "<h3>PRODUCTOS</h3>";

    include "conexion.php";
    echo "<div id= 'featured'>";
    $consulta = mysql_query("select prod.id_producto,prod.nombre_producto,prod.costo_producto,prod.id_proveedor,prod.descripcion, (select pv.nombre_proveedor  from proveedores as pv where pv.id_proveedor= prod.id_proveedor) as proveedor from productos as prod ", $conexion);
    echo '<table width="auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>Nombre</th>
    <th>Costo</th>
    <th>Proveedor</th>
	<th>Descripci&oacute;n</th>
	<th colspan="3" style="text-align: center;">Acciones</th>
  </tr>';
    while ($resultado = mysql_fetch_assoc($consulta)) {
        echo "<td>$resultado[nombre_producto]</td>";
        echo "<td>$resultado[costo_producto]</td>";
        echo "<td>$resultado[proveedor]</td>";
        echo "<td>$resultado[descripcion]</td>";
        echo "<td><a href='$page_modificar?form=$formulario&id=$resultado[id_producto]&nombre=$resultado[nombre_producto]&costo=$resultado[costo_producto]&proveedor=$resultado[id_proveedor]&descripcion=$resultado[descripcion]'><img src='iconos/editar.png' alt='modificar' title='Modificar'/></a></td>";
        echo "<td><a href='javascript:;' OnClick=\"if(confirm('Esta seguro de Eliminar?')) {location.href='$page_eliminar?form=$formulario&id=$resultado[id_producto]' }\"><img src='iconos/borrar.png' alt='eliminar' title='Eliminar'/></a></td></tr>";
    }
    include "cerrar_conexion.php";
    echo " <a href=$page_agregar?form=productos><img src='iconos/agregar.png' alt='agregar' title='Agregar'/></a></div>";
} elseif ($formulario == "proveedores") {
    echo "<h3>Proveedores</h3>";
    include "conexion.php";
    echo "<div id= 'featured'>";
    $consulta = mysql_query("select id_proveedor, nit_proveedor,nombre_proveedor,telefono_proveedor,descripcion  from proveedores ", $conexion);
    echo '<table width="auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>Nombre</th>
    <th>Nit</th>
    <th>Telefono</th>
	<th>Descripci&oacute;n</th>
	<th colspan="3" style="text-align: center;">Acciones</th>
  </tr>';
    while ($resultado = mysql_fetch_assoc($consulta)) {
        echo "<tr>";
        echo "<td>$resultado[nombre_proveedor]</td>";
        echo "<td>$resultado[nit_proveedor]</td>";
        echo "<td>$resultado[telefono_proveedor]</td>";
        echo "<td>$resultado[descripcion]</td>";
        echo "<td><a href='$page_modificar?form=$formulario&id=$resultado[id_proveedor]&nombre=$resultado[nombre_proveedor]&nit=$resultado[nit_proveedor]&telefono=$resultado[telefono_proveedor]&descripcion=$resultado[descripcion]'><img src='iconos/editar.png' alt='modificar' title='Modificar'/></a></td>";
        echo "<td><a href='javascript:;' OnClick=\"if(confirm('Esta seguro de Eliminar?')) {location.href='$page_eliminar?form=$formulario&id=$resultado[id_proveedor]'} \"><img src='iconos/borrar.png' alt='eliminar' title='Eliminar'/></a></td></tr>";
    }
    include "cerrar_conexion.php";
    echo " <a href=$page_agregar?form=proveedores><img src='iconos/agregar.png' alt='agregar' title='Agregar'/></a></div>";
} elseif ($formulario == "clientes") {
    echo "<h3>Clientes</h3>";
    include "conexion.php";
    echo "<div id= 'featured'>";
    $consulta = mysql_query("select id_cliente, nit_cliente,nombre_cliente,telefono_cliente,descripcion  from clientes ", $conexion);
    echo '<table width="auto" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th>Nombre</th>
    <th>Nit</th>
    <th>Telefono</th>
	<th>Descripci&oacute;n</th>
	<th colspan="3" style="text-align: center;">Acciones</th>
  </tr>';
    while ($resultado = mysql_fetch_assoc($consulta)) {
        echo "<td>$resultado[nombre_cliente]</td>";
        echo "<td>$resultado[nit_cliente]</td>";
        echo "<td>$resultado[telefono_cliente]</td>";
        echo "<td>$resultado[descripcion]</td>";
        echo "<td><a href='$page_modificar?form=$formulario&id=$resultado[id_cliente]&nombre=$resultado[nombre_cliente]&nit=$resultado[nit_cliente]&telefono=$resultado[telefono_cliente]&descripcion=$resultado[descripcion]'><img src='iconos/editar.png' alt='modificar' title='Modificar'/></a></td>";
        echo "<td><a href='javascript:;' OnClick=\"if(confirm('Esta seguro de Eliminar?')) {location.href='$page_eliminar?form=$formulario&id=$resultado[id_cliente]'}\"><img src='iconos/borrar.png' alt='eliminar' title='Eliminar'/></a></td></tr>";
    }
    include "cerrar_conexion.php";
    echo " <a href=$page_agregar?form=clientes><img src='iconos/agregar.png' alt='agregar' title='Agregar'/></a></div>";
}
?>
<a href="catalogos.php"><img src="iconos/regresar.png" alt="regresar" title='Regresar'></a>
<?php include "footer.php"; ?>
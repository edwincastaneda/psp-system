<?php session_start();
include "index.php";
include "verifica-logeo.php";?>

<div id="featured">
<?php
$formulario=$_GET['form'];


if ($formulario=="productos"){
$id_proveedor = "".$_GET['proveedor'];

echo '<h3>PRODUCTOS</h3>
  <frameset><legend>Modificar</legend>
  <form name="formulario" method="post" action="modificar.php">
  <label>Nombre: <input type="text" name="nombreF" value="'.$_GET['nombre'].'"></label><br/>
  <label>Costo: <input type="text" name="costoF" value="'.$_GET['costo'].'"></label><br/>
  <label>Proveedor: <select name="proveedorF" value="'.$_GET['proveedor'].'">';

include "proveedores.php";

echo '</select></label><br/>
<label>Descripción: <input type="text" name="descripcionF" value="'.$_GET['descripcion'].'"></label><br/>
  	<input name="idF" type="hidden" value="'.$_GET['id'].'">
	<input type="image" src="iconos/modificar.png" onclick="document.theform.submit();return false;" alt="modificar" title="Modificar"> 
  	<input name="productosF" type="hidden" value="true">
</form></frameset><br/><a href="catalogos.php"/><img src="iconos/regresar.png" title="Regresar"/></a>';}

if ($formulario=="clientes"){
echo '<h3>CLIENTES</h3>
  <frameset><legend>Modificar</legend>
  <form name="formulario" method="post" action="modificar.php">
  <label>Nombre: <input type="text" name="nombreF" value="'.$_GET['nombre'].'"></label><br/>
  <label>Nit: <input type="text" name="nitF" value="'.$_GET['nit'].'"></label><br/>
  <label>Telefono <input type="text" name="telefonoF" value="'.$_GET['telefono'].'"></label><br/>
  <label>Descripción: <input type="text" name="descripcionF" value="'.$_GET['descripcion'].'"></label><br/>
    <input name="idF" type="hidden" value="'.$_GET['id'].'"> 
	<input name="clientesF" type="hidden" value="true">
    <input type="image" src="iconos/modificar.png" onclick="document.theform.submit();return false;" alt="modificar" title="Modificar"> 
</form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>';}

if ($formulario=="proveedores"){

echo '<h3>PROVEEDORES</h3>
  <frameset><legend>Modificar</legend>
  <form name="formulario" method="post" action="modificar.php">
  <label>Nombre: <input type="text" name="nombreF" value="'.$_GET['nombre'].'"></label><br/>
  <label>Nit: <input type="text" name="nitF" value="'.$_GET['nit'].'"></label><br/>
  <label>Telefono: <input type="text" name="telefonoF" value="'.$_GET['telefono'].'"></label><br/>
  <label>Descripción: <input type="text" name="descripcionF" value="'.$_GET['descripcion'].'"></label><br/>
    <input name="idF" type="hidden" value="'.$_GET['id'].'">
    <input name="proveedoresF" type="hidden" value="true">
   <input type="image" src="iconos/modificar.png" onclick="document.theform.submit();return false;"alt="modificar" title="Modificar"> 
</form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>';}
?>
</div>
<?php include "footer.php";?>
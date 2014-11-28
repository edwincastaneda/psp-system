<?php session_start(); 
include "index.php";
include "verifica-logeo.php";?>

<div id="featured">
<?php
$formulario=$_GET['form'];


if ($formulario=="productos"){
echo '<h3>PRODUCTOS</h3>
  <frameset><legend>Insertar</legend>
  <form name="formulario" method="post" action="insertar.php">
  <label>Nombre: <input type="text" name="nombreF"></label><br/>
  <label>Costo: <input type="text" name="costoF"></label><br/>
  <label>Proveedor: <select name="proveedorF">';

include "proveedores.php";

echo '</select></label><br/>
	<label>Descripción: <input type="text" name="descripcionF"></label><br/>
  <input name="productosF" type="hidden" value="true">
    <input type="image" src="iconos/agregar.png" name="Submit" alt="guardar" title="Guardar"/>
    <A href="javascript:document.formulario.reset();"><img src="iconos/limpiar.png" name="Submit2" alt="limpiar" title="limpiar" /></a>
	<input type="image" src="iconos/ver2.png" onclick="window.open("consultas.php?form=productos")" name=submit3 alt="ver" title = "ver"/>  
  <br/>
</form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>';}

if ($formulario=="clientes"){
echo '<h3>CLIENTES</h3>
  <frameset><legend>Insertar</legend>
  <form name="formulario" method="post" action="insertar.php">
  <label>Nombre: <input type="text" name="nombreF"></label><br/>
  <label>Nit: <input type="text" name="nitF"></label><br/>
  <label>Telefono <input type="text" name="telefonoF"></label><br/>
  <label>Descripción: <input type="text" name="descripcionF"></label><br/>
  <input name="clientesF" type="hidden" value="true">
    <input type="image" src="iconos/agregar.png" name="Submit" alt="guardar" title="Guardar">
    <A href="javascript:document.formulario.reset();"><img src="iconos/limpiar.png" name="Submit2" alt="limpiar" title="limpiar" /></a>
	<input type="image" src="iconos/ver2.png" onclick="window.open("consultas.php?form=clientes")" name=submit3 alt="ver" title = "ver"/> 
  <br/>
</form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>';}

if ($formulario=="proveedores"){
echo '<h3>PROVEEDORES</h3>
  <frameset><legend>Insertar</legend>
  <form name="formulario" method="post" action="insertar.php">
  <label>Nombre: <input type="text" name="nombreF"></label><br/>
  <label>Nit: <input type="text" name="nitF"></label><br/>
  <label>Telefono: <input type="text" name="telefonoF"></label><br/>
  <label>Descripción: <input type="text" name="descripcionF"></label><br/>
  <input name="proveedoresF" type="hidden" value="true">
    <input type="image" src="iconos/agregar.png" name="Submit" alt="guardar" title="Guardar"/>
    <A href="javascript:document.formulario.reset();"><img src="iconos/limpiar.png" name="Submit2" alt="limpiar" title="limpiar" /></a>
	<input type="image" src="iconos/ver2.png" onclick="window.open("consultas.php?form=proveedores")" name=submit3 alt="ver" title = "ver"/>  
  <br/>
</form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>';}
?>
</div>
<?php include "footer.php";?>

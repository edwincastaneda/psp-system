<?php
session_start();
include "index.php";
include "verifica-logeo.php";
?>

<div id="featured">
    <?php
    $formulario = $_GET['form'];


    if ($formulario == "productos") {
        ?> 
        <h3>PRODUCTOS</h3>
        <frameset><legend>Insertar</legend>
            <form name="formulario" method="post" action="insertar.php">
                <label>Nombre: <input type="text" name="nombreF"></label><br/>
                <label>Costo: <input type="text" name="costoF"></label><br/>
                <label>Proveedor: <select name="proveedorF">';

    <?php include "proveedores.php"; ?>

                    </select></label><br/>
                <label>Descripción: <input type="text" name="descripcionF"></label><br/>
                <input name="productosF" type="hidden" value="true">
                <input type="image" src="iconos/agregar.png" name="Submit" alt="guardar" title="Guardar"/>
                <a href="javascript:document.formulario.reset();"><img src="iconos/limpiar.png" name="Submit2" alt="limpiar" title="limpiar" /></a>
                <a href="consultas.php?form=productos"><img src="iconos/ver2.png" name="submit3" alt="ver" title="ver" /></a>
                <br/>
            </form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>
<?php
}

if ($formulario == "clientes") {
    ?>
    <h3>CLIENTES</h3>
    <frameset><legend>Insertar</legend>
        <form name="formulario" method="post" action="insertar.php">
            <label>Nombre: <input type="text" name="nombreF"></label><br/>
            <label>Nit: <input type="text" name="nitF"></label><br/>
            <label>Telefono <input type="text" name="telefonoF"></label><br/>
            <label>Descripción: <input type="text" name="descripcionF"></label><br/>
            <input name="clientesF" type="hidden" value="true">
            <input type="image" src="iconos/agregar.png" name="Submit" alt="guardar" title="Guardar">
            <a href="javascript:document.formulario.reset();"><img src="iconos/limpiar.png" name="Submit2" alt="limpiar" title="limpiar" /></a>
            <a href="consultas.php?form=clientes"><img src="iconos/ver2.png" name="submit3" alt="ver" title="ver" /></a>
            <br/>
        </form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>
    <?php
}
if ($formulario == "proveedores") {
    ?>
    <h3>PROVEEDORES</h3>
    <frameset><legend>Insertar</legend>
        <form name="formulario" method="post" action="insertar.php">
            <label>Nombre: <input type="text" name="nombreF"></label><br/>
            <label>Nit: <input type="text" name="nitF"></label><br/>
            <label>Telefono: <input type="text" name="telefonoF"></label><br/>
            <label>Descripción: <input type="text" name="descripcionF"></label><br/>
            <input name="proveedoresF" type="hidden" value="true">
            <input type="image" src="iconos/agregar.png" name="Submit" alt="guardar" title="Guardar"/>
            <a href="javascript:document.formulario.reset();"><img src="iconos/limpiar.png" name="Submit2" alt="limpiar" title="limpiar" /></a>
            <a href="consultas.php?form=proveedores"><img src="iconos/ver2.png" name="submit3" alt="ver" title="ver" /></a>
            <br/>
        </form></frameset><br/><a href="catalogos.php" /><img src="iconos/regresar.png" title="Regresar"/></a>
<?php } ?>
</div>
<?php include "footer.php"; ?>

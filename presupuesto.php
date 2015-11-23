<?php
session_start();
include "index.php";
include "verifica-logeo.php";

?>
<div id= "featured">
<link rel=stylesheet type="text/css" media=all href="css/calendar.css">
<script src="js/calendar.js" type="text/javascript"></script>
<script src="js/jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script >
jQuery(function($){
   $("#fecha_de").mask("9999-99-99");
   $("#fecha_a").mask("9999-99-99");
});
</script>
<?php
        $page_change = "change_presupuesto.php";
	$page_eliminar = "eliminar_presupuesto.php";
	$page_editar = "nuevo_presupuesto.php";
	$page_detalle = "nuevo_presupuesto.php";
	$page_agregar = "nuevo_presupuesto.php";
        $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
        $fecha_de = isset($_POST['fecha_de']) ? $_POST['fecha_de'] : '';
        $fecha_a  = isset($_POST['fecha_a']) ? $_POST['fecha_a'] : '';
	echo "<h3>Presupuesto</h3>";
	?>
	<form action="presupuesto.php" method="post">
	<fieldset >
	<legend>Buscar:</legend>
		<strong>Cliente:</strong>
		<select id="id_cliente" name="id_cliente" >
			<option value="t">*Todos*</option>
			<?php  include "clientes.php"; ?>
		</select><br />
		<strong>Fecha de:</strong><input size="10" id="fecha_de" name="fecha_de" type="text" value = "<?php echo $fecha_de ?>"/><input type=button name=cal value=... onclick="return showCalendar('fecha_de','y-mm-dd','');"/><strong>a:</strong><input size="10" id="fecha_a" name="fecha_a" type="text" value = "<?php echo $fecha_a ?>"/><input type=button name=cal2 value=... onclick="return showCalendar('fecha_a','y-mm-dd','');"/>
		<br>
		<input type="image" src="iconos/ver2.png" name="Submit" alt="buscar" title = 'Buscar'>
		<input type="image" src="iconos/limpiar.png" name="Submit2" onClick="location.href='presupuesto.php'" alt="limpiar" title='Limpiar'>
	</fieldset>
	</form>
<?php
	include "conexion.php";
	
	echo '<table width="auto" border="0" cellspacing="0" cellpadding="0">';
	$stmt = "select ep.id_cotizacion,(select c.nombre_cliente from clientes as c where c.id_cliente = ep.id_cliente) as cliente,ep.id_cliente, ep.fecha, (select s.nombre_status from status as s where s.id_status = ep.id_status ) as status, ep.id_status, (SELECT sum(dp.precio*dp.cantidad) as total from detalle_presupuesto as dp where dp.id_cotizacion = ep.id_cotizacion) as total, (select u.nombre_usuario from usuarios as u where u.id_usuario = ep.id_usuario) as usuario from encabezado_presupuesto ep where 1=1 ";	
	if ($id_cliente !=NULL && $id_cliente !="t" ) { 
	   $stmt = $stmt. " and ep.id_cliente = $id_cliente ";
	}
	if ($fecha_de !=NULL && $fecha_de != "" ) { 
	   $stmt = $stmt. " and ep.fecha >= '$fecha_de' ";
	}
	if ($fecha_a !=NULL && $fecha_a != "" ) { 
	   $stmt = $stmt. " and ep.fecha <= '$fecha_a' ";	
	}
	$consulta = mysql_query($stmt, $conexion);
	
	echo "<tr>";
	echo "<th><strong>No. Cotizaci&oacute;n</strong> </th>";
	echo "<th ><strong>Cliente</strong> </th>";
	echo "<th ><strong>Fecha de Realizaci&oacute;n</strong> </th>";
	echo "<th ><strong>Estado</strong> </th>";
	echo "<th ><div style= 'width:60px'>Total Q.</div></th>";
	echo "<th ><strong>Usuario que Creo</strong> </th>";
	echo "<th colspan='3' style='text-align: center;'><strong>Acciones</strong> </th>";
	echo "</tr>";
	while ($resultado = mysql_fetch_assoc($consulta)) {
		echo "<tr>";
		  echo "<td >$resultado[id_cotizacion]</td>  ";
	      echo "<td >$resultado[cliente]</td>  ";
		  echo "<td >$resultado[fecha]</td>  ";
		  echo "<td >$resultado[status]</td>  ";
		  echo "<td >$resultado[total]</td>  ";
		  echo "<td >$resultado[usuario]</td>  ";
		  echo "<td ><a href='$page_detalle?action=view&id_cotizacion=$resultado[id_cotizacion]&id_cliente=$resultado[id_cliente]&fecha=$resultado[fecha]'><img src='iconos/detalle.png' alt='detalle' title='Ver Detalle'></a></td>";
		  if ($resultado["id_status"] == 1) {
			 echo "<td ><a href='$page_change?id=$resultado[id_cotizacion]&status=2'><img src='iconos/aprobar.png' alt='aprobar' title='Aprobar'></a></td>";
		  } elseif ($resultado["id_status"] == 2) {
			 echo "<td ><a href='$page_change?id=$resultado[id_cotizacion]&status=3'><img src='iconos/realizar.png' alt='realizar' title='Realizar'></a></td>";
		  } else {
		     echo "<td ></td>";
		  }
		  if ($resultado["id_status"] == 1 or $resultado["id_status"] == 2 ) {
			echo "<td ><a href='javascript:;' OnClick=\"if(confirm('Esta seguro de Eliminar?')) {location.href='$page_eliminar?id=$resultado[id_cotizacion]' } \"><img src='iconos/borrar.png' alt='eliminar' title='Eliminar'></a></td>";
		  } else {
			 echo "<td ></td>";
		  } 
		 echo "</tr>";
	}
	echo "</table>";
	include "cerrar_conexion.php";
 
echo "<br>
<a href=$page_agregar><img src='iconos/agregar.png' alt='agregar' title='Agregar Nuevo'></a>
<a href='index.php'><img src='iconos/regresar.png' alt='regresar' title='Regresar'></a>
</div>";
include "footer.php";?>
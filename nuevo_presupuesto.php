<?php
session_start();
include "index.php";
include "verifica-logeo.php";
$id_usuario=$_SESSION["id_usuario"];
?>
<div id= "featured">
<link rel=stylesheet type="text/css" media=all href="css/calendar.css">
<script src="js/jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script src="js/calendar.js" type="text/javascript"></script>
<script >
function save() {
		document.form1.elements.action.value="add";
		document.form1.submit();
}

function update() {
		document.form1.elements.action.value="update";
		document.form1.submit();
}

function add_prod() {
	if(document.form1.elements.id_producto_disp.value!=0) {
		document.form1.elements.action.value="add_prod";
		document.form1.submit();
	} else {
		alert('Debe seleccionar Producto a Agregar');
	}
}

function del_prod() {
	if(document.form1.elements.id_producto_added.value!=0) {
		document.form1.elements.action.value="del_prod";
		document.form1.submit();
	} else {
		alert('Debe seleccionar Producto a Eliminar');
	}
}

jQuery(function($){
   $("#fecha").mask("9999-99-99");
});
</script>
<?php 

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : '';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
$id_cotizacion = isset($_GET['id_cotizacion']) ? $_GET['id_cotizacion'] : '';
$total = isset($_GET['total']) ? $_GET['total'] : '';

$id_status="";

if ($id_cotizacion !=NULL && $id_cotizacion !="" ) { 
		include "conexion.php";
		$consulta = mysql_query(" SELECT dp.id_status from encabezado_presupuesto as dp where dp.id_cotizacion = $id_cotizacion ", $conexion);
		while ($resultado = mysql_fetch_assoc($consulta)) {
			$id_status=$resultado['id_status'];
		}
		include "cerrar_conexion.php";
}
$readonly="";
if ($id_status==3)  {
	$readonly = " disabled=disabled";
}
if ($action=="add") {
    include "conexion.php";	
	$insertar = mysql_query("INSERT INTO encabezado_presupuesto(id_cliente,fecha,total,id_status,id_usuario) values($id_cliente,'$fecha',0.00,1,$id_usuario)", $conexion);	
	$id_cotizacion = mysql_insert_id($conexion);
	include "cerrar_conexion.php";	 	 
} elseif ($action=="add_prod") {
	 include "conexion.php";
	 $precio = $_GET['precio'];
	 $id_producto = $_GET['id_producto_disp'];
	 $cantidad = (int) $_GET['cantidad'];
	 
	$insertar = mysql_query("INSERT INTO detalle_presupuesto (id_cotizacion,id_producto,precio,cantidad) values($id_cotizacion,$id_producto,$precio,$cantidad)", $conexion);	
	include "cerrar_conexion.php";	 	 
} elseif ($action=="del_prod") {
	 include "conexion.php";
	 $id_producto = $_GET['id_producto_added'];
	 
	$insertar = mysql_query("DELETE FROM detalle_presupuesto  WHERE id_cotizacion = $id_cotizacion AND id_producto =$id_producto", $conexion);	
	include "cerrar_conexion.php";	 	 
} elseif ($action=="update") {
	include "conexion.php";
	$consulta = mysql_query(" UPDATE encabezado_presupuesto SET id_cliente = $id_cliente,fecha = '$fecha'  where id_cotizacion = $id_cotizacion ", $conexion);
	include "cerrar_conexion.php";	 	 
}
?>

<body>
<form id="form1" name="form1" method="get" action="nuevo_presupuesto.php">
	<input type="hidden" id="id_cotizacion" name = "id_cotizacion" value="<?php echo $id_cotizacion?>">
	<input type="hidden" id="action" name = "action" value="<?php echo $action?>">
	<span>Cliente:</span>
	<select id="id_cliente" name="id_cliente" value="<?php echo $id_cliente?> " <?php echo $readonly?>>
	<?php  include "clientes.php"; ?>
	</select><br>
	<span>Fecha:</span>
	<input id="fecha" name="fecha" maxlength="10"type= "text" value="<?php echo $fecha?>" <?php echo $readonly?>/> <input type=button name=cal value=... onclick="return showCalendar('fecha','y-mm-dd','');"/><br>
	<!--<span>Total	:</span>
	<input id="total" name="total" type= "text" value="<?php echo $total; ?>"/><br>-->
	<?php  if ($action!="add" && $action!="add_prod" && $action!="del_prod" && $action!="update" && $action!="view") {?>
	<input type="button" onClick="save()" value="Guardar" <?php echo $readonly?>/>

	<?php } else {?>
		<input type="button" onClick="update()" value="Actualizar" <?php echo $readonly?>/>
	<?php }?>
	<br>
	
	<?php 
		if ($action=="add" || $action=="add_prod" || $action=="del_prod" || $action=="view" || $action=="update") {
		$total=0.00;
		include "conexion.php";
		$consulta = mysql_query(" SELECT sum(dp.precio*dp.cantidad) as total from detalle_presupuesto as dp where dp.id_cotizacion = $id_cotizacion ", $conexion);
		while ($resultado = mysql_fetch_assoc($consulta)) {
			$total=$resultado['total'];
		}
		include "cerrar_conexion.php";
		
		
	?>
	<div>
	<div style='float:left; width: 50%;'>
	<FIELDSET style="width: 95%;height: 170px;">
	<legend>Productos Disponibles:</legend>
	<div >
	<select id="id_producto_disp" name="id_producto_disp" size="5" <?php echo $readonly?>>
		<?php include "productos-disp.php";	?>
	</select>
	<br>
	</div>
	
	<div >Precio Q:<input type="text" size="10" name="precio" id="precio" value='0.00' <?php echo $readonly?>/> Cantidad:<input type="text" size="10" name="cantidad" id="cantidad" value='0' <?php echo $readonly?>/></div>
	<div ><input type="button" onClick="add_prod()" value="Agregar" <?php echo $readonly?>/></div>
	</FIELDSET>
	</div>
	<div style='float:right;width: 50%;'>
	<FIELDSET style="width: 95%;height: 170px;">
	<legend>Productos Seleccionados:</legend>
	<div >
	
	
	<div >
	<select id="id_producto_added" ONDBLCLICK="del_prod();"name="id_producto_added" size="5" <?php echo $readonly ?>>
		<?php include "productos-added.php";	?>
	</select>
	</div><div ><input type="button" onClick="del_prod()" value="Eliminar" <?php echo $readonly?>/></div>
	</div>
	</FIELDSET>
	</div>
	<div style='clear:both'></div>
	</div>
	Total Q:<input readonly=readonly type="text" size="10" name="total" id="total" value='<?php echo $total ?>' <?php echo $readonly ?>/>
	<?php }?>
	
</form>
<br/>
<a href="presupuesto.php"><img src="iconos/modificar.png" alt="finalizar"></a>
</div>

<?php include "footer.php"; ?>
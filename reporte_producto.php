<?php
session_start();
include "index.php";
include "verifica-logeo.php";
?>
<div id= "featured">
<script src="jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="jquery.maskedinput-1.3.js" type="text/javascript"></script>
<script >
jQuery(function($){
   $("#fecha_de").mask("9999-99-99");
   $("#fecha_a").mask("9999-99-99");
});
function csv (){
	document.form1.elements.csv_p.value="1";
	document.form1.submit();
}
</script>
<?php
//	$csv_p = $_POST['csv_p'];
//	$id_producto = $_POST['id_producto'];
//	$mes = $_POST['mes'];
//	$year = $_POST['year'];
//	$ordenar = $_POST['ordenar'];
        
        $csv_p = isset($_POST['csv_p']) ? $_POST['csv_p'] : '';
        $id_producto = isset($_POST['id_producto']) ? $_POST['id_producto'] : '';
        $mes = isset($_POST['mes']) ? $_POST['mes'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $ordenar = isset($_POST['ordenar']) ? $_POST['ordenar'] : '';
   // echo "$id_cliente";
	echo "<h3>Reporte Presupuestal por Producto </h3>";
	?>
	<form name="form1" id= "form1" action="reporte_producto.php" method="post">
	<fieldset >
	<input type="hidden" id="csv_p" name="csv_p" value="0">
	<legend>Buscar:</legend>
		<strong>Producto:</strong>
		<select id="id_producto" name="id_producto" >
			<option value="t">*Todos*</option>
			<?php  include "productos.php"; ?>
		</select>
		<br>
		<strong>Mes:</strong>
		<select id="mes" name="mes" >
		<option value="t">*Todos*</option>
			<option value="1" <?php if($mes =='1') { echo "selected"; }?>>Enero</option>			
			<option value="2" <?php if($mes =='2') { echo "selected"; }?>>Febrero</option>	
			<option value="3" <?php if($mes =='3') { echo "selected"; }?>>Marzo</option>			
			<option value="4" <?php if($mes =='4') { echo "selected"; }?>>Abril</option>
			<option value="5" <?php if($mes =='5') { echo "selected"; }?>>Mayo</option>			
			<option value="6" <?php if($mes =='6') { echo "selected"; }?>>Junio</option>		
			<option value="7" <?php if($mes =='7') { echo "selected"; }?>>Julio</option>			
			<option value="8" <?php if($mes =='8') { echo "selected"; }?>>Agosto</option>	
			<option value="9" <?php if($mes =='9') { echo "selected"; }?>>Septiembre</option>			
			<option value="10" <?php if($mes =='10') { echo "selected"; }?>>Octubre</option>		
			<option value="11" <?php if($mes =='11') { echo "selected"; }?>>Noviembre</option>			
			<option value="12" <?php if($mes =='12') { echo "selected"; }?>>Diciembre</option>						
		</select>
                <strong>A&ntilde;o:</strong>
		<select id="year" name="year" >
		<option value="t">*Todos*</option>
			<option value="2008" <?php if($year =='2008') { echo "selected"; }?>>2008</option>			
			<option value="2009" <?php if($year =='2009') { echo "selected"; }?>>2009</option>			
			<option value="2010" <?php if($year =='2010') { echo "selected"; }?>>2010</option>			
			<option value="2011" <?php if($year =='2011') { echo "selected"; }?>>2011</option>	
			<option value="2012" <?php if($year =='2012') { echo "selected"; }?>>2012</option>			
			<option value="2013" <?php if($year =='2013') { echo "selected"; }?>>2013</option>				
		</select><br>
		<strong>Ordenar por:</strong>
		<select id="ordenar" name="ordenar" >
			<option value="P" <?php if($ordenar =='P') { echo "selected"; }?>>Producto</option>			
			<option value="F" <?php if($ordenar =='F') { echo "selected"; }?>>Fecha</option>			
		</select><br>
		
		<input type="image" src="iconos/ver2.png" name="Submit" alt="buscar" title="Buscar">
		<input type="image" src="iconos/limpiar.png" name="Submit" onClick="location.href='reporte_producto.php'" alt="limpiar" title = "Limpiar">
	</fieldset>
	</form>
	<input type="image" src="iconos/reporte.png" onClick="csv()" alt="exportar" title="Exportar a CSV">
	<input type="image" src="iconos/icono-imprimir.jpg" onclick="javascript:window.print()" alt="Imprimir esta p�gina" title="Imprimir esta p�gina"/>  
<?php
	include "conexion.php";
	
	echo "<table width='auto' border='0' cellspacing='0' cellpadding='0'>";
		$stmt = " select distinct  EXTRACT(YEAR FROM z.fecha ) as year,  EXTRACT(MONTH FROM z.fecha ) as mes ,
				 (select a.nombre_producto from productos as a where a.id_producto= x.id_producto) producto, 
				 (select sum(b.precio*b.cantidad)from encabezado_presupuesto as a, detalle_presupuesto as b where a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and b.id_producto= x.id_producto) as cantidad_presupuestada, 
				 (select sum(b.precio*b.cantidad)from encabezado_presupuesto as a, detalle_presupuesto as b where a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status = 3 and b.id_producto= x.id_producto) as cantidad_realizada,
				 (select sum(b.precio*b.cantidad)from encabezado_presupuesto as a, detalle_presupuesto as b where a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status <> 3 and b.id_producto= x.id_producto ) as cantidad_no_realizada,
				 (select count(1)from encabezado_presupuesto as a, detalle_presupuesto as b where a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status <> 3 and b.id_producto= x.id_producto ) as num_no_realizada, 
				 (select count(1)from encabezado_presupuesto as a , detalle_presupuesto as b where a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status = 3 and b.id_producto= x.id_producto ) as num_realizada 
				 from encabezado_presupuesto as z ,detalle_presupuesto as x where z.id_cotizacion = x.id_cotizacion ";	
		
	if ($id_producto !=NULL && $id_producto !="t" ) { 
	   $stmt = $stmt. " and x.id_producto = $id_producto ";
	}
	if ($mes !=NULL && $mes != "t" ) { 
	   $stmt = $stmt. " and EXTRACT(MONTH FROM z.fecha ) = '$mes' ";
	}
	if ($year !=NULL && $year != "t" ) { 
	   $stmt = $stmt. " and EXTRACT(YEAR FROM z.fecha ) = '$year' ";	
	}
	if ($ordenar =='F') {
		$stmt = $stmt. " order by 1,2 ";	
	} else {
	   $stmt = $stmt. " order by 3 ";	
	}
	$consulta = mysql_query($stmt, $conexion);
	
	echo "<tr>";
	echo "<th><strong>A�o</strong> </th>";
	echo "<th ><strong>Mes</strong> </th>";
	echo "<th ><strong>Producto</strong> </th>";
	echo "<th ><strong>Monto Presupuestado Q.</strong> </th>";
	echo "<th ><strong>Monto Presupuestado Realizado Q.</strong> </th>";
	echo "<th ><strong>Monto Presupuestado No Realizado Q.</strong> </th>";
	echo "<th ><strong>Estado</strong> </th>";
	//echo "<th ><strong># No Realizado</strong> </th>";
	echo "</tr>";
	//echo "<br />"; 
	if ($csv_p == "1") {
		$csv_end = "  
		";  
		$csv_sep = ",";  
		$csv_file = "reporte_producto.csv";  
		$csv=""; 
		$csv.="A&ntilde;o".$csv_sep.'Mes'.$csv_sep.'Producto'.$csv_sep.'Monto Presupuestado'.$csv_sep.'Monto Presupuestado Realizado'.$csv_sep.'Monto Presupuestado No Realizado'.$csv_sep.'Estado'.$csv_end; 
	}
	while ($resultado = mysql_fetch_assoc($consulta)) {
		echo "<tr>";
		  echo "<td >$resultado[year]</td>  ";
	      echo "<td >$resultado[mes]</td>  ";
		  echo "<td >$resultado[producto]</td>  ";

		  echo "<td >$resultado[cantidad_presupuestada]</td>  ";
		  echo "<td >$resultado[cantidad_realizada]</td>  ";
		  echo "<td >$resultado[cantidad_no_realizada]</td>  ";

		  echo "<td > Realizados : $resultado[num_realizada]  Pendientes : $resultado[num_no_realizada]</td>  ";
		  //echo "<td >$resultado[num_no_realizada]</td>  ";
		  
		 echo "</tr>";
		if ($csv_p == "1") {
			  $csv.=$resultado['year'].$csv_sep.$resultado['mes'].$csv_sep.$resultado['producto'].$csv_sep.$resultado['cantidad_presupuestada'].$csv_sep.$resultado['cantidad_realizada'].$csv_sep.$resultado['cantidad_no_realizada'].$csv_sep."Realizados : $resultado[num_realizada]  Pendientes : $resultado[num_no_realizada]".$csv_end;  
		}
	}
	echo "</table>";
	//echo "<div style='clear:both'></div>";
	include "cerrar_conexion.php";
    //echo "</div>";
	if ($csv_p == "1") {
		if (!$handle = fopen($csv_file, "w")) {  
			echo "Cannot open file";  
			exit;  
		}  
		if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
			echo "Cannot write to file";  
			exit;  
		}  
		fclose($handle);  
		echo "<META HTTP-EQUIV=refresh CONTENT ='0; URL =$csv_file' >";
	}
 
?>
<br/>
<a href="reportes.php"><img src="iconos/regresar.png" alt="regresar" title='Regresar'></a>
</div>
<?php include "footer.php"; ?>
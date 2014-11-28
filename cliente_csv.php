    <?php  
	$id_cliente = $_POST['id_cliente'];
	$mes = $_POST['mes'];
	$year = $_POST['year'];
	$ordenar = $_POST['ordenar'];
	
	$stmt = " select distinct EXTRACT(YEAR FROM z.fecha ) as year, EXTRACT(MONTH FROM z.fecha ) as mes, ";
		$stmt =	$stmt ."(select a.nombre_cliente from clientes as a where a.id_cliente= z.id_cliente) as cliente, ";
		$stmt =	$stmt ." (select sum(b.precio*b.cantidad)from encabezado_presupuesto as a, detalle_presupuesto as b where  a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and  EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_cliente = z.id_cliente)  as cantidad_presupuestada,";
		$stmt =	$stmt ." (select sum(b.precio*b.cantidad)from encabezado_presupuesto as a, detalle_presupuesto as b where  a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and  EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status = 3 and a.id_cliente = z.id_cliente)  as cantidad_realizada,";
		$stmt = $stmt ." (select sum(b.precio*b.cantidad)from encabezado_presupuesto as a, detalle_presupuesto as b where  a.id_cotizacion = b.id_cotizacion and EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and  EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status <> 3 and a.id_cliente = z.id_cliente )  as cantidad_no_realizada,";
		$stmt =	$stmt ." (select count(1)from encabezado_presupuesto as a where  EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and  EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status <> 3 and a.id_cliente = z.id_cliente )  as num_no_realizada,";
		$stmt =	$stmt ." (select count(1)from encabezado_presupuesto as a where  EXTRACT(MONTH FROM a.fecha ) = EXTRACT(MONTH FROM z.fecha ) and  EXTRACT(YEAR FROM a.fecha ) = EXTRACT(YEAR FROM z.fecha ) and a.id_status = 3 and a.id_cliente = z.id_cliente )  as num_realizada ";
		$stmt =	$stmt ." from encabezado_presupuesto as z ";
		$stmt =	$stmt ." where 1=1 ";	
		
	if ($id_cliente !=NULL && $id_cliente !="t" ) { 
	   $stmt = $stmt. " and z.id_cliente = $id_cliente ";
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
	
	
    $csv_end = "  
    ";  
    $csv_sep = ",";  
    $csv_file = "reporte_cliente.csv";  
    $csv="";  
	include "conexion.php";
	$res = mysql_query($stmt, $conexion);
	
    while($row=mysql_fetch_array($res))  
    {  
        $csv.=$row['year'].$csv_sep.$row['mes'].$csv_sep.$row['cliente'].$csv_sep.$row['cantidad_presupuestada'].$csv_sep.$row['cantidad_realizada'].$csv_sep.$row['cantidad_no_realizada'].$csv_sep.$row['num_realizada'].$csv_sep.$row['num_no_realizada'].$csv_end;  
    }  
    //Generamos el csv de todos los datos  
    if (!$handle = fopen($csv_file, "w")) {  
        echo "Cannot open file";  
        exit;  
    }  
    if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
        echo "Cannot write to file";  
        exit;  
    }  
    fclose($handle);  
	include "cerrar_conexion.php";
	echo "<META HTTP-EQUIV=refresh CONTENT ='0; URL =reporte_cliente.csv' >";
    ?>  
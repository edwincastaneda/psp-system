<?php
include "index-2.php";
//Enviamos las variables por metodo post y usamos los arrays superglobales $_POST
$install = $_POST['install'];
$host = $_POST['host'];
$user = $_POST['user_db'];
$pass = $_POST['password_db'];
$dbnombre = $_POST['db_name'];

$user_ap = $_POST['user_ap'];
$password_ap = $_POST['password_ap'];
$nombre_file_conection ="conexion.php";
$sql_createdb = "CREATE DATABASE $dbnombre;";
 
if($install == 1){// Igual a 1 ejecutamos la consulta
$conexion = mysql_connect($host, $user, $pass);

if (mysql_query($sql_createdb, $conexion)) {
	echo "Database created successfully\n";
} 

//Conecto con la DB

$conexion = mysql_connect($host,$user,$pass);
if (!@mysql_select_db($dbnombre)){
echo ("Imposible Conectar");
exit();
}

//Creando tablas
$sql = 'CREATE TABLE `clientes` (
  `id_cliente` int(100) NOT NULL auto_increment,
  `nombre_cliente` varchar(3000) default NULL,
  `nit_cliente` varchar(15) default NULL,
  `telefono_cliente` varchar(10) default NULL,
  `descripcion` text,
  PRIMARY KEY  (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=16 ; ';

//Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
}

//Creando tablas
$sql = "INSERT INTO `clientes` VALUES(4, 'My room studio', 'C/F', '', NULL); ";

//Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
}

$sql = 'CREATE TABLE `encabezado_presupuesto` (
  `id_cotizacion` int(100) NOT NULL auto_increment,
  `id_cliente` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_status` int(1) NOT NULL,
  `total` float default NULL,
  `id_usuario` int(100) default NULL,
  PRIMARY KEY  (`id_cotizacion`),
  KEY `FK_encabezado_presupuesto` (`id_status`),
  KEY `FK_encabezado_presupuesto1` (`id_cliente`),
  KEY `FK_encabezado_presupuesto2` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=21 ;';

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
} 

$sql = "CREATE TABLE `detalle_presupuesto` (
  `id_detalle_cotizacion` int(100) NOT NULL auto_increment,
  `id_cotizacion` int(100) NOT NULL,
  `id_producto` int(100) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(100) default '0',
  PRIMARY KEY  (`id_detalle_cotizacion`),
  UNIQUE KEY `id_detalle_cotizacion` (`id_detalle_cotizacion`),
  KEY `FK_detalle_presupuesto` (`id_producto`),
  KEY `FK_detalle_presupuesto1` (`id_cotizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=12 ;";

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 


$sql = "CREATE TABLE `productos` (
  `id_producto` int(100) NOT NULL auto_increment,
  `nombre_producto` varchar(3000) default NULL,
  `costo_producto` float default NULL,
  `id_proveedor` int(100) NOT NULL,
  `descripcion` text,
  PRIMARY KEY  (`id_producto`),
  KEY `FK_productos` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=16  ;";

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 

$sql = "INSERT INTO `productos` VALUES(5, 'Espacio en web 120x120 (1 mes)', 300, 1, NULL);";

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 


$sql = "INSERT INTO `productos` VALUES(8, 'Spot TV (320 x 235)', 350, 1, NULL);";

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 


$sql = "CREATE TABLE `proveedores` (
  `id_proveedor` int(100) NOT NULL auto_increment,
  `nombre_proveedor` varchar(3000) default NULL,
  `nit_proveedor` varchar(15) default NULL,
  `telefono_proveedor` varchar(10) default NULL,
  `descripcion` text,
  PRIMARY KEY  (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4  ;";

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 

$sql = "INSERT INTO `proveedores` VALUES(1, 'Otra Onda Radio', 'C/F', '23382491', 'musica cristiana'); ";
 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 


$sql = "CREATE TABLE `status` (
  `id_status` int(100) NOT NULL,
  `nombre_status` varchar(3000) default NULL,
  PRIMARY KEY  (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;";

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 


$sql = "INSERT INTO `status` VALUES(1, 'No Aprobado');";

 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 

 
 
 $sql = "INSERT INTO `status` VALUES(2, 'Aprobado');";

 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 

 
 
 $sql = "INSERT INTO `status` VALUES(3, 'Realizado');";

 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 
 

$sql = "CREATE TABLE `usuarios` (
  `id_usuario` int(100) NOT NULL auto_increment,
  `nombre_usuario` varchar(3000) default NULL,
  `contrasena_usuario` varchar(20) default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3  ;";

 
 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 

$sql = "INSERT INTO `usuarios` VALUES(1, '$user_ap', '$password_ap');";

 //Quito las comillas
$sql = str_replace("`", "", $sql);
$sql = str_replace("\\", "", $sql);
 
if(!@mysql_query($sql,$conexion)){//Ejecuto la consulta y creamos la Tabla
echo "Error: ".mysql_error();
die;
} 
 mysql_close($conexion);

$archivo='
<?
$dbhost="'.$host.'";
$dbusuario="'.$user.'";
$dbpassword="'.$pass.'";
$db="'.$dbnombre.'";
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);
?>
';
 if (!$handle = fopen($nombre_file_conection, "w")) {  
			echo "Cannot open file";  
			exit;  
		}  
		if (fwrite($handle, $archivo) === FALSE) {  
			echo "Cannot write to file";  
			exit;  
}  
fclose($handle); 
}
?>

<h1>PSP-System Instalado Correctamente</h1>
<h2><a href='.' >Ir a Inicio</a></h2>
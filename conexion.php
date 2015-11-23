
<?php
$dbhost="localhost";
$dbusuario="root";
$dbpassword="";
$db="psp";
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);
?>

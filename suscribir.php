<?php 
$nombre= $_POST["nombre"];
$email= $_POST["email"];

if(($nombre!="" && $email!="") && ($email!="Escribe tu correo..." && $nombre!="Escribe tu nombre...") ){

include "conexion.php";
$consulta = mysql_query("SELECT correo FROM webmail WHERE correo='".$email."'", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
$contador=$resultado['correo'];
}//obtener correo igual
include "cerrar_conexion.php";

include "conexion.php";
$consulta = mysql_query("SELECT alta FROM webmail_estadisticas", $conexion);
while ($resultado = mysql_fetch_assoc($consulta)) {
$ultimo=$resultado['alta'];
}//obtener altas
include "cerrar_conexion.php";


if($contador==""){
include "conexion.php";
$insertar = mysql_query("INSERT INTO webmail (correo,nombre) VALUES('".$email."','".$nombre."')", $conexion);		 	 
include "cerrar_conexion.php";

include "conexion.php";
$insertar = mysql_query("UPDATE webmail_estadisticas SET alta=alta+1", $conexion);		 	 
include "cerrar_conexion.php";

echo "<script language='JavaScript'>alert('Tu correo electronico ha sido registrado en la lista de distribucion de boletines de Otra Onda Radio');</script>
<META HTTP-EQUIV=Refresh CONTENT='0; URL=suscripcion.html'>";
}

}

if($contador!="" && ($email!="Escribe tu correo..." || $nombre!="Escribe tu nombre...")){
echo "<script language='JavaScript'>alert('ERROR: Tu correo electronico YA ha sido registrado en la lista de distribucion de boletines de Otra Onda Radio');</script>
<META HTTP-EQUIV=Refresh CONTENT='0; URL=suscripcion.html'>";
}

if($email=="Escribe tu correo..." || $nombre=="Escribe tu nombre..."){
echo "<script language='JavaScript'>alert('ERROR: Debes ingresar Nombre y Correo electronico!');</script>
<META HTTP-EQUIV=Refresh CONTENT='0; URL=suscripcion.html'>";
}

if($nombre=="" && $email==""){
echo "<script language='JavaScript'>alert('ERROR: Debes ingresar Nombre y Correo electronico!');</script>
<META HTTP-EQUIV=Refresh CONTENT='0; URL=suscripcion.html'>";
}
?>
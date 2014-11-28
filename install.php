<?php	
if ( false ) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Error: PHP is not running</title>
</head>
<body>
	<h1 id="logo"><img alt="WordPress" src="images/wordpress-logo.png" /></h1>
	<h2>Error: PHP is not running</h2>
	<p>PSP-System requires that your web server is running PHP. Your server does not have PHP installed, or PHP is turned off.</p>
</body>
</html>
<?php
} else {
include "index-2.php";
?> 
<h1>Instalación de PSP-System</h1>
<script>
function validar() {
	if (document.form1.host.value=='') alert('Debe Ingresar Servidor de Base de Datos');
	else if (document.form1.user_db.value=='') alert('Debe Ingresar Usuario Root');
	else if (document.form1.password_db.value=='') alert('Debe Ingresar Password de Base de Datos');
	else if (document.form1.db_name.value=='') alert('Debe Ingresar Nombre de Base de Datos');
	else if (document.form1.user_ap.value=='') alert('Debe Ingresar Usuario de Aplicación');
	else if (document.form1.password_ap.value=='') alert('Debe Ingresar Password de Aplicación');
	else document.form1.submit();
}
</script>
<div id= "featured">
<form name='form1' id='form1' method="post" action='make-install.php'>
	<fieldset>
		<legend>Información de Servidor MySql:</legend>
		<input id='install' name='install' value='1'type='hidden' />
		<label>Servidor de Base de Datos:<input name='host' id='host' type='text' value='localhost'/></label>
		<br>
		<label>Usuario root:<input name='user_db' id='user_db' type='text'/></label>
		<br>
		<label>Password:<input name='password_db' id='password_db' type='password'/></label>
		<br>
		<label>Nombre de Base de Datos(Donde se Instalara la aplicación):<input name='db_name' id='db_name' type='text'/></label>
		<br>
	</fieldset>
	<fieldset>
		<legend>Información de Usuario que se utilizara para la aplicación:</legend>
		<label>Usuario:<input name='user_ap' id='user_ap' type='text'/></label>
		<br>
		<label>Password:<input name='password_ap' id='password_ap' type='password'/></label>
		<br>
	</fieldset>
	<input value='Instalar' type='button' onclick='validar()'>
</form>
</div>
<?php

}
?>


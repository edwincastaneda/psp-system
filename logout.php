<?php 
	session_start();
        include "index.php";
	unset($_SESSION["ESTADO"]);
	unset($_SESSION["USER"]);
	unset($_SESSION["id_usuario"]);
	session_destroy();
 
	// Para borrar las cookies asociadas a la sesi�n
	// Es necesario hacer una petici�n http para que el navegador las elimine
	if ( isset( $_COOKIE[ "ESTADO" ] ) ) {
		if ( setcookie(session_name(), '', time()-3600, '/') ) {
			header("Location: /index.php");
			exit();   
		}
	}
	if ( isset( $_COOKIE[ "USER" ] ) ) {
		if ( setcookie(session_name(), '', time()-3600, '/') ) {
			header("Location: /index.php");
			exit();   
		}
	}
	echo "Cerrando Sesion...<META HTTP-EQUIV=refresh CONTENT ='1; URL =index.php' >";
	 
?>
<?php include "footer.php";?>
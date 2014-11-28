<?php 

/* VALIDAMOS SI ESTA LOGEADO EL USUARIO*/
 $estado = $_SESSION["ESTADO"]; 
 if ($estado != 'LOGEADO') {
// include "index.php";
      echo "DEBE INICIAR SESION PARA PODER ACCESAR A ESTE MODULO<br>";
// include "footer.php";
	  //echo "Redireccionando a pagina de Login...<META HTTP-EQUIV=refresh CONTENT ='2; URL =index.php' >";
      die;
 } else {
	//echo "Usuario:<strong>".$_SESSION["USER"]."</strong> <a href='logout.php'>Cerrar Sesión</a>";
 }
?>
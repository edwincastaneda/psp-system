	<?php //session_start();
		if (!isset($_SESSION["ESTADO"])) {
	?>
		<form method="post" action="login-2.php"> 
			<label>Usuario:</label> <input name="usuario" type="text" id="nombre" size="15" />
                        <label>Contrase&ntilde;a: </label><input name="clave" type="password" id="clave" size="15" />
			<input type="submit" value="Iniciar"/>
		</form>
		<?php
                if (isset($_GET["msg"])){
			if ($_GET["msg"] == "err") {
				echo "<span style='color:red;'>Usuario o Contrase&ntilde;a Invalida</span>";
			}
                }
		?>
	<?php 
	} else {
	?>
		&nbsp;Usuario:&nbsp;<strong><?php echo $_SESSION["USER"]?></strong>&nbsp;&nbsp;<a href="logout.php">Cerrar Sesi&oacute;n</a>
	<?php
		
	} 
	?>
	
<?php session_start(); 
include "index.php";
include "verifica-logeo.php";?>
<h3>REPORTES</h3>
<div id="footer-outer" class="clear"><div id="footer-wrap">
<div class="col-a">
			<h3>Productos</h3>
			<p><a href="reporte_producto.php"><img src="iconos/reporte_productos.png"></a></p>	
			<div class="footer-list">
				<ul>				
					<li><a href="reporte_producto.php">Mostrar</a></li>		
				</ul>
		</div>
</div>	

<div class="col-a">
			<h3>Clientes</h3>
			<p><a href="reporte_cliente.php"><img src="iconos/reporte_clientes.png"></a></p>	
			<div class="footer-list">
				<ul>				
					<li><a href="reporte_cliente.php">Mostrar</a></li>		
				</ul>
		</div>
</div>	

<div class="col-a">
			<h3>General</h3>
			<p><a href="reporte_general.php"><img src="iconos/reporte_general.png"></a></p>	
			<div class="footer-list">
				<ul>				
					<li><a href="reporte_general.php">Mostrar</a></li>			
				</ul>
		</div>
</div>	

</div></div>

<?php include "footer.php";?>
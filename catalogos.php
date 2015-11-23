<?php
session_start();
include "index.php";
include "verifica-logeo.php";
?>
<h3>CATALOGOS</h3>
<div id="footer-outer" class="clear"><div id="footer-wrap">
        <div class="col-a">
            <h3>Productos</h3>
            <p><a href="consultas.php?form=productos"><img src="iconos/catalogo_productos.png"></a></p>	
            <div class="footer-list">
                <ul>				
                    <li><a href="consultas.php?form=productos">Mostrar</a></li>		
                </ul>
            </div>
        </div>	

        <div class="col-a">
            <h3>Clientes</h3>
            <p><a href="consultas.php?form=clientes"><img src="iconos/catalogo_clientes.png"></a></p>	
            <div class="footer-list">
                <ul>				
                    <li><a href="consultas.php?form=clientes">Mostrar</a></li>		
                </ul>
            </div>
        </div>	

        <div class="col-a">
            <h3>Proveedores</h3>
            <p><a href="consultas.php?form=proveedores"><img src="iconos/catalogo_proveedores.png"></a></p>	
            <div class="footer-list">
                <ul>				
                    <li><a href="consultas.php?form=proveedores">Mostrar</a></li>			
                </ul>
            </div>
        </div>	

    </div></div>

<?php include "footer.php"; ?>
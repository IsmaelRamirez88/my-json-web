<?php 
include($raiz . 'vistas/header.php');

?>
<form method="POST" action="http://<?php echo $server_name . "/" . $Server; ?>/modelo/ExportarJson.php">
    <div >
    	<div>
    		<i>ApiRest</i>
    		<select id = "sltipo" name="tipo">
			  <option value="1">PHP</option>
			  <option value="2" selected>Java</option>			  
			</select>
    	</div>
    	<div style="margin: 10px;">
	    	<button type="button" id="btnMandarCall" name="btnMandarCall" onclick="CallApiRest()">
				<i >Consumir Servicio php</i>
	        </button>	        
	        <input type="hidden" name="nombreArchivo" value="Respuesta1">
	        <button type="submit"><i>Exportar JSON</i></button>
        </div> 
        <div>                                 
            <table class="table">
            	<thead>
            		<tr>
            			<td class="encabezado">Tipo</td>
            			<td class="encabezado">Color</td>
            			<td class="encabezado">Tamaño</td>
            		</tr>
            	</thead>
            	<tbody id="filaRespuesta">
            		
            	</tbody>
            </table>
        </div>
    </div>
</form>
<?php 
    include($raiz . 'vistas/footer.php');
?>
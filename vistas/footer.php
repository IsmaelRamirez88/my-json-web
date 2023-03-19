	<input type="hidden" id="ruta" name="num_mesero" value="<?php echo $Server; ?>">
	<?php foreach ($archivos_js as $archivo_js): ?>
			<script src="<?php echo RAIZ; ?>js/<?php echo $archivo_js; ?>"></script>
			<?php echo RAIZ; ?>
	<?php endforeach; ?>	
	</body>
</html>
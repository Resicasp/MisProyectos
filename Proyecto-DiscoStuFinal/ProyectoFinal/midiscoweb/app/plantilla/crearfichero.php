<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?><br>
		<center>
		<br><br><br><br><br>
			<form enctype="multipart/form-data" method="POST" action='index.php' class="formu4">
				<h2>Creación de un fichero</h2>
							
				
				Enviar este fichero: <input name="fichero_usuario" type="file" />
				
				<br><br><br>
				<input type='submit' name="orden" class="myButton" value='Crear Fichero'>
	
			</form>
			<form action='index.php' class="formuatras">
				<input type='hidden' name='orden' value='VerFicheros'><input type='submit' class="myButton" value='Atrás'>
			</form>
		</center>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>


<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
    <br><br><br><br><h2><center>Detalles:</center></h2><br>
		<center>
			<div id="content">
				<table class="princ2">
					<tr>
						<th><b><center>Campo</center></b></th>
						<th><b><center>Detalles</center></b></th>
					</tr>
					
					<tr>
						<td>Nombre del Fichero:</td>
						<td><?php error_reporting(0); echo $_SESSION['0']?></td>
					</tr>
					<tr>
						<td>Tipo:</td>
						<td><?php echo $_SESSION['1']?></td>
					</tr>					
					<tr>
						<td>Tamaño:</td>
						<td><?php echo $_SESSION['2']?></td>
					</tr>
						
					<tr>
						<td>Extensión:</td>
						<td><?php echo $_SESSION['3']?></td>
					</tr>	
				</table>
			</div>
			<br><br>
			<form action='index.php'>
				<input type='hidden' name='orden' value='VerFicheros'> <input type='submit' class="myButton" value='Atrás'>
	
			</form>
		</center>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>


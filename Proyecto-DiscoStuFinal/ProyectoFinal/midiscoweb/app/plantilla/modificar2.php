<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
		<center>
		<br><br><br><br>
			<form action='index.php' class="formu2">
				<input type='hidden' name='iduser' value=<?php echo $_SESSION['0']?>></input>
				<!--Usuario:<input name="iduser" type="text" value=<?php echo $_SESSION['0']?> disabled><br>-->
				<h2>Usuario: <?php echo $_SESSION['0']?><br></h2>
				Nombre:<input name="nombre" type="text" value=<?php echo $_SESSION['2']?>></input><br>
				<input name="contra" type="hidden" value=<?php echo $_SESSION['1']?>></input><br>
				Correo:<input name="correo" type="text" value=<?php echo $_SESSION['3']?>></input><br>
				
				
				<br><br><br>
				<input type='submit' name="orden" class="myButton" value='Actualizar'>	
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
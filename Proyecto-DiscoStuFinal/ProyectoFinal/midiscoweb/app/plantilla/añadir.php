<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
	<section><br>
		<center>
		<form action='index.php' class="formu3">
			<h2>Alta de Usuario</h2>
			<h2><?php error_reporting(0); echo $_SESSION["MSG"] ?></h2>
			Usuario(id): <input name="iduser" type="text"><br>
			Nombre: <input style="margin-top:6px;" name="nombre" type="text"><br>
			Contraseña: <input style="margin-top:6px;" name="contra" type="text"><br>
			Repita contraseña: <input style="margin-top:6px;" name="contra2" type="text"><br>
			Correo: <input style="margin-top:6px;" name="correo" type="email"><br>
			Tipo de usuario:
			<select style="margin-top:6px;" name="tipouser">
				<option value="0" >Basico</option>
				<option value="1">Profesional</option>
				<option value="2">Premium</option>
				<option value="3">Máster</option>
			</select> <br>
			
			 Estado del usuario: 
			 <select style="margin-top:6px;" name="useracti">
				<option value="A" >Activo</option>
				<option value="I">Inactivo</option>
				<option value="B">Bloqueado</option>
			</select> <br><br><br>
			<input type='submit' name="orden" class="myButton" value='Alta Usuario'>
			
		</form>
		<form action='index.php' class="formuatras">
			<?php $_SESSION["MSG"]=""; ?>
			<input type='hidden' name='orden' value='VerUsuarios'><input type='submit' class="myButton" value='Atrás'>
		</form>
		</center>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>

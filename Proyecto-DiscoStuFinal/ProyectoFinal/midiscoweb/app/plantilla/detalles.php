<?php
// Guardo la salida en un buffer(en memoria)
// No se envia al navegador
ob_start();

?>
        <br><br><br><br><br><br><br>
		<center>
			<div id="content">
				<table class="princ2">
					<tr>
						<th><b><center>Campo</center></b></th>
						<th><b><center>Detalles</center></b></th>
					</tr>
					
					<tr>
						<td>Usuario:</td>
						<td><?php error_reporting(0); echo $_SESSION['0']?></td>
					</tr>	
					<tr>
						<td>Nombre:</td>
						<td><?php echo $_SESSION['2']?></td>
					</tr>
					<!--  <tr>
						<td>Contraseña:</td>
						<td><?php echo $_SESSION['1']?></td>
					</tr>	-->
					<tr>
						<td>Correo:</td>
						<td><?php echo $_SESSION['3']?></td>
					</tr>	
					<tr>
						<td>Tipo de usuario:</td>
						<td><?php  if($_SESSION['4']=="0"){echo "Basico";} if($_SESSION['4']=="1"){echo "Profesional";} if($_SESSION['4']=="2"){echo "Premium";} if($_SESSION['4']=="3"){echo "Máster";}?></td>
					</tr>	
					<tr>
						<td>¿Usuario activo?</td>
						<td><?php  if($_SESSION['5']=="I"){echo "Inactivo";} if($_SESSION['5']=="B"){echo "Bloqueado";} if($_SESSION['5']=="A"){echo "Activo";}?></td>
					</tr>
				</table>
			</div>
			<br><br>
			<form action='index.php'>
				<input type='hidden' name='orden' value='VerUsuarios'> <input type='submit' class="myButton" value='Atrás'>
	
			</form>
		</center>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>

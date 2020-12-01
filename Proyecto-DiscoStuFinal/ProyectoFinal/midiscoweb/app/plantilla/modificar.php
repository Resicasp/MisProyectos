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
				Contraseña:<input style="margin-top: 10px;" name="contra" type="password" value=<?php echo $_SESSION['1']?>></input><br>
				Correo:<input style="margin-top: 10px;" name="correo" type="text" value=<?php echo $_SESSION['3']?>></input><br>
				
				<?php
				error_reporting(0);
				if($_SESSION['4']=="0"){
					echo "Tipo de Usuario:";
					echo '<select style="margin-top: 10px;" name="tipouser">
						<option value="0" selected="selected" >Basico</option>
						<option value="1">Profesional</option>
						<option value="2">Premium</option>
						<option value="3">Máster</option>
					</select> <br>'; 
				}
				if($_SESSION['4']=="1"){
					echo "Tipo de Usuario:";
					echo '<select style="margin-top: 10px;" name="tipouser">
						<option value="0">Basico</option>
						<option value="1" selected="selected">Profesional</option>
						<option value="2">Premium</option>
						<option value="3">Máster</option>
					</select> <br>'; 
				}
				if($_SESSION['4']=="2"){
					echo "Tipo de Usuario:";
					echo '<select style="margin-top: 10px;" name="tipouser">
						<option value="0">Basico</option>
						<option value="1">Profesional</option>
						<option value="2" selected="selected">Premium</option>
						<option value="3">Máster</option>
					</select> <br>'; 
				}
				if($_SESSION['4']=="3"){
					echo "Tipo de Usuario:";
					echo '<select style="margin-top: 10px;" name="tipouser">
						<option value="0">Basico</option>
						<option value="1">Profesional</option>
						<option value="2" >Premium</option>
						<option value="3" selected="selected">Máster</option>
					</select><br>'; 
				}
				?>
				
				
				<?php
				if($_SESSION['5']=="I"){
					echo "Estado del Usuario:";
					echo '<select style="margin-top: 10px;" name="useracti">
					<option value="A" >Activo</option>
					<option value="I" selected="selected">Inactivo</option>
					<option value="B">Bloqueado</option>
					</select>'; 
				}
				if($_SESSION['5']=="B"){
					echo "Estado del Usuario:";
					echo '<select style="margin-top: 10px;" name="useracti">
					<option value="A" >Activo</option>
					<option value="I" >Inactivo</option>
					<option value="B" selected="selected">Bloqueado</option>
					</select>'; 
				}
				if($_SESSION['5']=="A"){
					echo "Estado  del Usuario:";
					echo '<select style="margin-top: 10px;" name="useracti">
					<option value="A" selected="selected" >Activo</option>
					<option value="I" >Inactivo</option>
					<option value="B">Bloqueado</option>
					</select>'; 
				}
				?>
				
				<br><br><br>
				<input type='submit' name="orden" class="myButton" value='Actualizar Datos'>	
			</form>
			<form action='index.php' class="formuatras">
				<input type='hidden' name='orden' value='VerUsuarios'><input type='submit' class="myButton" value='Atrás'>
			</form>
		</center>
<?php
// Vacio el bufer y lo copio a contenido
// Para que se muestre en div de contenido de la página principal

$contenido = ob_get_clean();
include_once "principal.php";

?>
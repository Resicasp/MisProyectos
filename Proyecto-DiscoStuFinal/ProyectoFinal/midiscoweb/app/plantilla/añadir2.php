<html>
	<header>
		<link rel="shortcut icon" href="../img/disco.png"/>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
		<link href="web/css/cabecera.css" rel="stylesheet" type="text/css" />
		<link href="web/css/iniciar.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="web/js/funciones.js"></script>
		<title>DiscoWeb</title>
	</header>
	
	<nav>	
		<ul id="menu-bar">
		<li><b><a href="../index.html"><img class="disco" src="../img/disco.png"></a></b></li>
		 <li><a href="../index.html">Inicio</a></li>
		
		 
		 <li class="active" id="ini"><a href="iniciar.html">Iniciar Sesion</a></li> 
		</ul>
	</nav>
	
	<section>
		<center>
		<br>
		<form action='index.php' class="formu5">
			<h2>Alta de Usuario</h2>
			<h2><?php error_reporting(0); echo $_SESSION["MSG"] ?></h2>
			Usuario(id): <input name="iduser" type="text"><br>
			Nombre: <input name="nombre" type="text"><br>
			Contraseña: <input name="contra" type="text"><br>
			Repita contraseña: <input name="contra2" type="text"><br>
			Correo: <input name="correo" type="email"><br>
			Tipo de usuario:
			<select name="tipouser">
				<option value="0" >Basico</option>
				<option value="1">Profesional</option>
				<option value="2">Premium</option>
				<option value="3">Máster</option>
			</select> <br>
			
			 Estado del usuario: 
			 <select name="useracti">
				<option value="A" disabled >Activo</option>
				<option value="I" selected>Inactivo</option>
				<option value="B" disabled>Bloqueado</option>
			</select> <br><br>
			<input type='submit' name="orden" class="myButton" value='Registrar Usuario'>
			
		</form>
		<?php $_SESSION["MSG"]=""; ?>
		<form action='index.php' class="formuatras">
			<input type='hidden' name='orden' value='Inicio'><input type='submit' class="myButton" value='Inicio'>
		</form>
		</center>
	</section>
	
	<footer class="final">	
		<center><a href="http://www.facebook.es"><img src="../img/F.png" class="fotofacebook"/></a>
		<a href="http://www.instagram.es"><img src="../img/I.png" class="fotoinsta"/></a>
		<a href="http://www.twitter.es"><img src="../img/T.png" class="fototwitter"/></a>
		<img src="../img/copi.png" class="fotocopi"/></center>
		<span class="info">&nbsp&nbsp&nbsp&nbsp&nbsp David Gómez Roldán<br>gomezdavid253@gmail.com</span>
	</footer>
</html>

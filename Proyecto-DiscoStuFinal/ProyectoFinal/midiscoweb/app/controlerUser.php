<?php
// ------------------------------------------------
// Controlador que realiza la gestión de usuarios
// ------------------------------------------------
include_once 'config.php';
//include_once 'modeloUser.php';
include_once 'modeloUserDB.php';

/*
 * Inicio Muestra o procesa el formulario (POST)
 */

function  ctlUserInicio(){
    $msg = "";
    $user ="";
    $clave ="";
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['user']) && isset($_POST['clave'])){
            $user =$_POST['user'];
            $clave=$_POST['clave'];
			if($user=="" || $clave==""){
				$_SESSION["MSGACCESO"]="Usuario o contraseña no validos.";
				include_once 'plantilla/facceso.php';
			}
			else{
			    $_SESSION['estado'] = modeloUserDB::modeloObtenerEstado($user);
			    
				if (modeloUserDB::OkUser($user,$clave)){
					if($_SESSION['estado']=="I"){
						$_SESSION["MSGACCESO"]="Usuario o contraseña no validos.";
						include_once 'plantilla/facceso.php';
					}
					else{
						$_SESSION['user'] = $user;
						$_SESSION['tipouser'] = modeloUserDB::modeloObtenerTipo($user);
						
						
						if ( $_SESSION['tipouser'] == "Máster"){
							$_SESSION['modo'] = GESTIONUSUARIOS;
							header('Location:index.php?orden=VerUsuarios');
						}
						else {	
						  // Usuario normal;
						  // PRIMERA VERSIÓN SOLO USUARIOS ADMISTRADORES
							$_SESSION['modo'] = GESTIONFICHEROS;
							$dir="app/file";
							
							if (!file_exists("app/file/".$user)) {
								mkdir("app/file/".$user, 0777, true);
							}
							 header('Location:index.php?orden=VerFicheros');
						}		
						
					}
							
				}
				else {
					$_SESSION["MSGACCESO"]="Usuario o contraseña no validos.";
					include_once 'plantilla/facceso.php';
				}  	
			}   
        }
    }

    
    include_once 'plantilla/facceso.php';
}

// Cierra la sesión y vuelca los datos
function ctlUserCerrar(){
    session_destroy();
    header('Location:index.php');
}

function ctlUserAlta(){
	include_once 'plantilla/añadir.php';
}

function ctlUserAltaError(){
	$_SESSION["MSG"] = "¡Atención!¡El usuario ya existe!";
	include_once 'plantilla/añadir.php';
}

function ctlUserAltaError2(){
	$_SESSION["MSG"] = "¡Atención!¡El usuario ya existe!";
	include_once 'plantilla/añadir2.php';
}

function ctlUserRegistrar(){
	$id = $_GET['iduser'];
	$nombre = $_GET['nombre'];
	$contra = $_GET['contra'];
	$contra2 = $_GET['contra2'];
	$correo = $_GET['correo'];
	$tipouser = $_GET['tipouser'];
	$useracti = $_GET['useracti'];
	
	if($contra==$contra2){  
	    if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $contra)) {
	        modeloUserDB::Add2($id,$nombre,$contra,$correo,$tipouser,$useracti);
	    } else {
			$_SESSION["MSG"] = "¡Atención!¡Las contraseñas no cumplen los requisitos!";
	        include_once 'plantilla/añadir2.php';
	    }    
	}
	else{
		$_SESSION["MSG"] = "¡Atención!¡Las contraseñas no son correctas!";
	    include_once 'plantilla/añadir2.php';
	}
}


function ctlUserAlta2(){
	$id = $_GET['iduser'];
	$nombre = $_GET['nombre'];
	$contra = $_GET['contra'];
	$contra2 = $_GET['contra2'];
	$correo = $_GET['correo'];
	$tipouser = $_GET['tipouser'];
	$useracti = $_GET['useracti'];
	
	
	if($contra==$contra2){
	    if( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $contra)) {
	        modeloUserDB::Add($id,$nombre,$contra,$correo,$tipouser,$useracti);
	    } else {
			$_SESSION["MSG"] = "¡Atención!¡Las contraseñas no cumplen los requisitos!";
	        include_once 'plantilla/añadir.php';
	    }
	}
	else{
		$_SESSION["MSG"] = "¡Atención!¡Las contraseñas no son correctas!";
	    include_once 'plantilla/añadir.php';
	}
}

function ctlUserDetalles(){
	$clav = $_GET['id'];
	modeloUserDB::GET($clav);	
}

function ctlUserModificar(){
	$clav = $_GET['id'];
	modeloUserDB::Update($clav);	
}

function ctlUserModificar2(){
    $clav = $_SESSION['user'];
    modeloUserDB::UpdateUsuario($clav);
}

function ctlUserActualizar(){
	$id = $_GET['iduser'];
	$nombre = $_GET['nombre'];
	$contra = $_GET['contra'];
	$correo = $_GET['correo'];
	$tipouser = $_GET['tipouser'];
	$useracti = $_GET['useracti'];
	
	modeloUserDB::Update2($id,$nombre,$contra,$correo,$tipouser,$useracti);	
}

function ctlUserActualizar2(){
    $id = $_GET['iduser'];
    $nombre = $_GET['nombre'];
    $contra = $_GET['contra'];
    $correo = $_GET['correo'];
    
    modeloUserDB::UpdateUsuario2($id,$nombre,$contra,$correo);
}


function ctlUserBorrar(){
	$clav = $_GET['id'];
	modeloUserDB::modeloUserDel($clav);

	//modeloUserDel($clav);
}


// Muestro la tabla con los usuario 
function ctlUserVerUsuarios (){
    // Obtengo los datos del modelo
    $usuarios = modeloUserDB::GetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verusuariosp.php';
   
}

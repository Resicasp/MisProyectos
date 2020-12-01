<?php 
include_once 'config.php';


	function modeloUserFileGetAll(){
	    $_SESSION['tipouser'] = modeloUserDB::modeloObtenerTipo($_SESSION['user']);
	   	
	    
	    if($_SESSION['tipouser']=="Básico"){
	        $_SESSION['contfiletotal'] = LIMITE_FICHEROS[0] ;
	        $_SESSION['sizefiletotal'] = LIMITE_ESPACIO[0] ;
	    }
	    if($_SESSION['tipouser']=="Profesional"){
	        $_SESSION['contfiletotal'] = LIMITE_FICHEROS[1] ;
	        $_SESSION['sizefiletotal'] = LIMITE_ESPACIO[1] ;
	    }
	    if($_SESSION['tipouser']=="Premium"){
	        $_SESSION['contfiletotal'] = LIMITE_FICHEROS[2] ;
	        $_SESSION['sizefiletotal'] = LIMITE_ESPACIO[2] ;
	    }
	    if($_SESSION['tipouser']=="Máster"){
	        $_SESSION['contfiletotal'] = LIMITE_FICHEROS[3] ;
	        $_SESSION['sizefiletotal'] = LIMITE_ESPACIO[3] ;
	    }
	    
	    
	    $contadorficheros = 0;
	    $pesototal = 0;
		$ficheros = [];
		$dir="app/file/".$_SESSION['user'];
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
				    if($file==".." || $file=="." ){

					}else{
					    $nombreyruta = $dir . "/" . $file;
					    $ficheros[] = [$file, filetype($nombreyruta), filesize($nombreyruta),pathinfo($nombreyruta, PATHINFO_EXTENSION)];
					    $pesototal = $pesototal + filesize($nombreyruta);
					    $contadorficheros++;
					}

				}
				closedir($dh);
			}
		}
		//unset($ficheros[0]);
		//unset($ficheros[1]);
		$_SESSION['tuficheros']=$ficheros;
		$_SESSION['contfile']=$contadorficheros;
		$_SESSION['contfilesize']=$pesototal;
		return $ficheros;
	}
	
	function modeloUserDelFile($file){
		unlink("app/file/".$_SESSION['user']."/".$file);
		header('Location:index.php?orden=VerFicheros');
	}
	
	function modeloUserDetallesFile($file, $file2){
		
		$_SESSION['0'] = $_SESSION['tuficheros'][$file2][0];
		$_SESSION['1'] = $_SESSION['tuficheros'][$file2][1];
		$_SESSION['2'] = $_SESSION['tuficheros'][$file2][2];
		$_SESSION['3'] = $_SESSION['tuficheros'][$file2][3];
		
		include_once "plantilla/detallesfichero.php";
	}
	
	
	function modeloUserModificarFile($file, $file2){
		$_SESSION['0'] = $_SESSION['tuficheros'][$file2][0];
		$_SESSION['1'] = $_SESSION['tuficheros'][$file2][1];
		$_SESSION['2'] = $_SESSION['tuficheros'][$file2][2];
		$_SESSION['3'] = $_SESSION['tuficheros'][$file2][3];
		
		include_once "plantilla/modificarfichero.php";
	}
	
	function modeloUserActualizarFile($file, $nombre){
		rename ("app/file/".$_SESSION['user']."/".$file, "app/file/".$_SESSION['user']."/".$nombre);
		header('Location:index.php?orden=VerFicheros');
	}
	
	
	function modeloUserCreateFile2($fileTmpPath,$dest_path){
	    if(move_uploaded_file($fileTmpPath, $dest_path)){
	        $message ='Fichero subido correctamente.';
	    }
	    else{
	        $message = 'El fichero no se ha podido subir correctamente.';
	    }
	    header('Location:index.php?orden=VerFicheros');
	}
?>
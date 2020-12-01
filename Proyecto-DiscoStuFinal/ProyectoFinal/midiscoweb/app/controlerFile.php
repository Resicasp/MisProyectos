<?php
// --------------------------------------------------------------
// Controlador que realiza la gestión de ficheros de un usuario
// ---------------------------------------------------------------

include_once 'config.php';
include_once 'modeloFile.php';
include_once 'Encriptador.php';

function ctlUserVerFicheros(){
	   // Obtengo los datos del modelo
    $ficheros = modeloUserFileGetAll(); 
    // Invoco la vista 
    include_once 'plantilla/verficherosp.php';
	
}

function ctlUserBorrarFichero(){
	$clav = $_GET['id'];
	modeloUserDelFile($clav);
}

function ctlUserDetallesFichero(){
	$clav = $_GET['id'];
	$clav2 = $_GET['clave'];
	modeloUserDetallesFile($clav,$clav2);
}

function ctlUserModificarFichero(){
	$clav = $_GET['id'];
	$clav2 = $_GET['clave'];
	modeloUserModificarFile($clav,$clav2);
}

function ctlUserActualizarFichero(){
	$id = $_GET['idfichero'];
	$nombre = $_GET['nombre'];
	modeloUserActualizarFile($id,$nombre);
}

function ctlUserAltaFichero(){
	include_once 'plantilla/crearfichero.php';
}


function ctlUserAltaFichero3(){
    $fileTmpPath = $_FILES['fichero_usuario']['tmp_name'];
    $fileName = $_FILES['fichero_usuario']['name'];
    $fileNameCmps = explode(".", $fileName);

    
    //echo $fileTmpPath. "/".$fileName;
        
    $uploadFileDir = "app/file/".$_SESSION['user']."/";
    $dest_path = $uploadFileDir . $fileName;
    //echo "<br>".$dest_path;
    modeloUserCreateFile2($fileTmpPath,$dest_path);
}

function ctlFileDownload(){
	$nombre = $_GET['id'];
	
	if(!empty("app/file/".$_SESSION['user']."/".$nombre)){
        $fileName = basename("app/file/".$_SESSION['user']."/".$nombre);
        $filePath = "app/file/".$_SESSION['user']."/".$nombre;
        if(!empty("app/file/".$_SESSION['user']."/".$nombre) && file_exists($filePath)){
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$fileName");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            
            readfile($filePath);
            exit;
        }else{
            echo 'El fichero no existe.';
        }
    }
}

function ctlFileDownloadShare(){
    $fichero = $_GET['id'];
    $rutaArchivo= "app/file/".$_SESSION['user']."/".$fichero;
    $rutaencriptada = Encriptador::encripta($rutaArchivo);
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
        $link = "https";
        $link .= "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        $link .="?orden=fileshare&fichero=".urlencode($rutaencriptada);
        echo "<script type='text/javascript'>alert('Fichero $fichero. Enlace de descarga: $link');".
            "document.location.href='index.php?orden=VerFicheros';</script>";
    }
    else{ 
        $link = "http";
        $link .= "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        $link .="?orden=fileshare&fichero=".urlencode($rutaencriptada);
        echo "<script type='text/javascript'>alert('Fichero $fichero. Enlace de descarga: $link');".
            "document.location.href='index.php?orden=VerFicheros';</script>";
    }
}

function ctlFileDescargaDirecta(){
    if (!empty($_GET['fichero'])) {
        $rutaArchivo = Encriptador::desencripta($_GET['fichero']);
        $pos = strrpos ( $rutaArchivo , "/");
        $fichero = substr($rutaArchivo,$pos+1);
       
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"".$fichero."\"");
        readfile($rutaArchivo);
    }
}
?>

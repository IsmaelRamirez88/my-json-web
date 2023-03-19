<?php 
$rutatemp = "temp/";
if(isset($_POST['nombreArchivo'])){	
	$_NombreArchivo =  $_POST['nombreArchivo'];
	
}
if(isset($_POST['tipo'])){	
	$_Tipo =  $_POST['tipo'];
}

ExportarJson($rutatemp, $_NombreArchivo, $_Tipo);
function callApiRestExport($_NombreArchivo = ""){
	$DominioWS = "http://localhost/my-json-server/";
	if($_NombreArchivo != ""){
		$DominioWS = "http://localhost:8080/controller/exportarobjeto?nombreArchivo=". $_NombreArchivo;
	}
	$ch = curl_init($DominioWS);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));    
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);    
    $response = curl_exec($ch);    
    curl_close($ch);    
    if (!$response) {
        return [];
    } else {
    	$Respuesta = [];
        $Objeto = json_decode($response, true);
        if(isset($Objeto) && isset($Objeto["listaobjetos"])){
        	foreach ($Objeto["listaobjetos"] as $key) {
        		if($key["color"] == "Green"){
        			$Objeto = [
						"tipo" => $key["Tipo"],
						"tamanio" => $key["Tamanio"],
						"color" => $key["Color"]
					];
					array_push($Respuesta, $Objeto);        			
        		}        		
        	}
        }
    	return $Respuesta;
    }
}

function ExportarJson($rutatemp,  $nombreArchivo = "", $tipo = ""){
	if($tipo == 1){
		$Respuesta = callApiRestExport();		
	}else{
		$Respuesta = callApiRestExport($nombreArchivo);	
	}
	$nombreArchivo = $nombreArchivo . ".json";
	file_put_contents("../".$rutatemp . $nombreArchivo, json_encode($Respuesta), FILE_APPEND | LOCK_EX);

	$fileName = basename($nombreArchivo);
	$filePath = "../".$rutatemp . $fileName;
	if(!empty($fileName) && file_exists($filePath)){
		//echo "rutatemp: " . $rutatemp . ", nombreArchivo: " . $nombreArchivo . ", filePath: " . $filePath  . ", json: " . json_encode($Respuesta);

		//Define header information
		header('Content-Description: File Transfer');
		header('Content-Type: txt/html');
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: 0");
		header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
		header('Content-Length: ' . filesize($filePath));
		header('Pragma: public');
		//Clear system output buffer
		flush();

		//Read the size of the file
		readfile($filePath);

		//Terminate from the script
		die();
	}

}
	


?>
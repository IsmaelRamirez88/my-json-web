<?php 
$_Tipo = "";
if(isset($_POST['tipo'])){	
	$_Tipo =  $_POST['tipo'];
}

callApiRest($_Tipo);
function callApiRest($tipo){
	$DominioWS = "";
	if($tipo == "1"){
		$DominioWS = "http://localhost/my-json-server/";
	}else{
		$DominioWS= "http://localhost:8080/controller/obtenerobjeto";
	}
	$ch = curl_init($DominioWS);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));    
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);    
    $response = curl_exec($ch);    
    curl_close($ch);    
    if (!$response) {
        echo "";
    } else {
    	$FilasRespuesta = "";
        $Objeto = json_decode($response, true);
        //print_r($Objeto);
        if(isset($Objeto) && isset($Objeto["listaobjetos"])){
        	foreach ($Objeto["listaobjetos"] as $key) {
        		if($key["color"] == "Green"){
        			$FilasRespuesta .= "<tr>" .
					        				"<td class = 'filas'>". $key["tipo"] ."</td>" .
					            			"<td class = 'filas'>". $key["color"] ."</td>" .
					            			"<td class = 'filas'>". $key["tamanio"] ."</td>" .
					            		"</tr>";
        		}        		
        	}
        }
    	echo $FilasRespuesta;
    }
}
	

?>
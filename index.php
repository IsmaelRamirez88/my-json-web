<?php 
/**
 * 
 */
	$nombre_modulo = "Ejercicio #1 PHP";
    $nombre_opcion = "Consumir servicio php";    
    $raiz = '';
    $server_name = $_SERVER['SERVER_NAME'];
    $phpself = explode("/", $_SERVER['PHP_SELF']);
    //print_r($server_name);
    $Server = $phpself[1];

    $niveles = substr_count($_SERVER['PHP_SELF'],"/");
    $archivos_js = array();
    $archivos_js[] = "app/funciones.js";
    $niveles = $niveles - 2;
    
    for ($i=0; $i < $niveles; $i++) 
	{ 
		$raiz .= "../";
	}	
	define('RAIZ', $raiz);	
	include("main.php");
?>
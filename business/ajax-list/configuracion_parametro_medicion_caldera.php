<?php

	include($_SERVER['DOCUMENT_ROOT'].'/calderas/procs/db_connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/medicion.php');

	$calderaId = $_POST["calderaId"];
	$nombreParametroMedicion = $_POST["parametroMedicion"];
        $nombreMedicion = $_POST["medicion"];
	$valor = $_POST["valor"];

	$medicionObj = new Medicion();
	$medicionObj->setNombre($nombreMedicion);
	$parametrosDict = array();
	$parametrosDict[$nombreParametroMedicion] = $valor;
	$medicionObj->actualizarConfiguracionParametros($calderaId, $parametrosDict);		

	echo "Received " . $calderaId . " " . $nombreParametroMedicion . " " . $nombreMedicion . " " . $valor;		
?>

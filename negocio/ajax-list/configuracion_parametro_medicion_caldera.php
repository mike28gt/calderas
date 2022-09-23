<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/medicion.php');

	$calderaId = $_POST["calderaId"];
	$nombreParametroMedicion = $_POST["parametroMedicion"];
    $nombreMedicion = $_POST["medicion"];
	$valor = $_POST["valor"];

	$medicionObj = new Medicion();
	$medicionObj->setNombre($nombreMedicion);
	$parametrosDict = array();
	$parametrosDict[$nombreParametroMedicion] = $valor;
	$resultado = $medicionObj->actualizarConfiguracionParametros($calderaId, $parametrosDict);		

	echo "Received caldera:" . $calderaId . " parametroMedicion:" . $nombreParametroMedicion . " medicion:" . $nombreMedicion . " valor:" . $valor . " resultado:" . $resultado;
?>

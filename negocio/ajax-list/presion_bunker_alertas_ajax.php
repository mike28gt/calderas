<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/presion_bunker.php');

	$calderaId = $_POST["calderaId"];
	$fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

	$presionBunkerObj = new PresionBunker();
	$alertasArray = $presionBunkerObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId);

	$resultadoArray = array();
	$resultadoArray["x"] = $alertasArray["serieX"];
	$resultadoArray["Alertas"] = $alertasArray["serieY"];
	
	echo json_encode($resultadoArray);
?>

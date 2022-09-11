<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/gas_propano.php');

	$calderaId = $_POST["calderaId"];
	$fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

	$gasPropanoObj = new GasPropano();
	$alertasArray = $gasPropanoObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId);

	$resultadoArray = array();
	$resultadoArray["x"] = $alertasArray["serieX"];
	$resultadoArray["Alertas"] = $alertasArray["serieY"];
	
	echo json_encode($resultadoArray);
?>

<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/flama.php');

	$calderaId = $_POST["calderaId"];
	$fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

	$flamaObj = new Flama();
	$alertasArray = $flamaObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId);

	$resultadoArray = array();
	$resultadoArray["x"] = $alertasArray["serieX"];
	$resultadoArray["Flama apagada"] = $alertasArray["serieY"];
	
	echo json_encode($resultadoArray);
?>

<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/nivel_agua.php');

	$calderaId = $_POST["calderaId"];
	$fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

	$nivelAguaObj = new NivelAgua();
	$alertasMayoresArray = $nivelAguaObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "mayor");
	$alertasMenoresArray = $nivelAguaObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "menor");

	$resultadoArray = array();
	$resultadoArray["x"] = $alertasMayoresArray["serieX"];
	$resultadoArray["Alertas superiores al máximo"] = $alertasMayoresArray["serieY"];
	$resultadoArray["Alertas inferiores al mínimo"] = $alertasMenoresArray["serieY"];
	
	echo json_encode($resultadoArray);
?>

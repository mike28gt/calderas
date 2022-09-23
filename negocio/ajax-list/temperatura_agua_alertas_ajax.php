<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/temperatura_agua.php');

	$calderaId = $_POST["calderaId"];
	$fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
	$temperaturaMaxima = $_POST["temperaturaMaxima"];
	$temperaturaMinima = $_POST["temperaturaMinima"];

	$temperaturaAguaObj = new TemperaturaAgua();
	$alertasMayoresArray = $temperaturaAguaObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "mayor", $temperaturaMaxima);
	$alertasMenoresArray = $temperaturaAguaObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "menor", $temperaturaMinima);

	$resultadoArray = array();
	$resultadoArray["x"] = $alertasMayoresArray["serieX"];
	$resultadoArray["Alertas superiores al máximo"] = $alertasMayoresArray["serieY"];
	$resultadoArray["Alertas inferiores al mínimo"] = $alertasMenoresArray["serieY"];
	
	echo json_encode($resultadoArray);
?>
